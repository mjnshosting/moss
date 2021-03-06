<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$rpcid = $_POST['rpcid'];
//$rpcid = '1';

  try {
    /**************************************
    * Open databases and connectons       *
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

    // Put all variables together
    $result = $file_db->query("SELECT * FROM rpc WHERE id = $rpcid");
    foreach($result as $row) {
		$status = trim(shell_exec ("fence_apc -o status -a " . $row['rpcipf'] . " -l " . $row['rpcuf'] . " -p " . $row['rpcpwdf'] . " -n " . $row['rpcprtf'] . "| cut  -d ':' -f2"));
		switch ($status) {
		    case "OFF":
		        echo "<img src='images/ban-32.png' alt='off'>";
		        break;
		    case "ON":
		        echo "<img src='images/bulb-32.png' alt='on'>";
		        break;
		    default:
		        echo "<img src='images/cloud-32.png' alt='uknown'>";
		}
    }
	
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
