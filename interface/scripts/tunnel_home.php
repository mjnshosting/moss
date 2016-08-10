<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$ths = escapeshellcmd($_POST['ths']); 
$thu = escapeshellcmd($_POST['thu']); 
$thp = escapeshellcmd($_POST['thp']);
$thm = escapeshellcmd($_POST['thm']);

  try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:../../dbs/moss_db.sqlite3');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
 
    // Create new database in memory
    $memory_db = new PDO('sqlite::memory:');
    // Set errormode to exceptions
    $memory_db->setAttribute(PDO::ATTR_ERRMODE, 
                              PDO::ERRMODE_EXCEPTION);
 
 
    /**************************************
    * Create tables                       *
    **************************************/
 
    // Create table macaddresses
    $file_db->exec("CREATE TABLE IF NOT EXISTS tunnelhome (
                    id INTEGER PRIMARY KEY,
                    thsf TEXT,
                    thuf TEXT,
                    thpf TEXT,
                    thmf TEXT)");
    
    // Delete old record from the table.
    $file_db->query('DELETE FROM tunnelhome WHERE id = 1');
    
    // Insert information into table
    $insert = $file_db->prepare('INSERT INTO tunnelhome (thsf, thuf, thpf, thmf, thsf) VALUES (?, ?, ?, ?, ?)');
    $insert->execute(array($ths, $thu, $thp, $thm, '1'));

    // Query DB and create mac list text file that will show up in the iFrame
    $result = $file_db->query('SELECT * FROM tunnelhome');
    $myfile = fopen("moss_tunnel", "w") or die("Unable to open file!");

    // Put all variables together
    foreach($result as $row) {
            $pptp_conf = "pty \"pptp " . $row['thsf'] . " --nolaunchpppd\"\nname " . $row['thuf'] . "\npassword " . $row['thpf'] . "\nremotename pptpd\nnoauth\nlock\npersist\nnodefaultroute\nnobsdcomp\nnodeflate\nlcp-echo-failure 30\nlcp-echo-interval 10\n";
    fwrite($myfile, $pptp_conf);
    }

    // Close file
    fclose($myfile);

    /**************************************
    * Close db connections                *
    **************************************/
 
    // Close file db connection
    $file_db = null;
    // Close memory db connection
    $memory_db = null;
  }
  catch(PDOException $e) {
    // Print PDOException smam
    echo $e->getMessage();
  }

?>
