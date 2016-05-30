<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$rpcd = $_POST['rpcd'];
$rpcip = $_POST['rpcip'];;
$rpcprt = $_POST['rpcprt'];
$rpcu = $_POST['rpcu'];
$rpcpwd = $_POST['rpcpwd'];

  try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:moss_db.sqlite3');
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
    $file_db->exec("CREATE TABLE IF NOT EXISTS rpc (
                    id INTEGER PRIMARY KEY,
                    rpcdf TEXT,
                    rpcipf TEXT,
                    rpcprtf TEXT,
                    rpcuf TEXT,
                    rpcpwdf TEXT)");
//		    rpcstf INTEGER)");

    // Insert information into table
    $insert = $file_db->prepare('INSERT INTO rpc (rpcdf, rpcipf, rpcprtf, rpcuf, rpcpwdf) VALUES (?, ?, ?, ?, ?)');
    $insert->execute(array($rpcd, $rpcip, $rpcprt, $rpcu, $rpcpwd));

    // Query DB and create mac list text file that will show up in the iFrame
    $result = $file_db->query('SELECT * FROM rpc');

    // Insert static lines before and after dynamic line into the file.
    $list_rpc_line_first = "<form id='rpc-table'><table> <tbody> <tr> <td class='td'></td><td class='td'><p style='font-weight: bold;'>Description:</p></td><td class='td'><p style='font-weight: bold;'>IP:</p></td><td class='td'><p style='font-weight: bold;'>Port:</p></td><td class='td'><p style='font-weight: bold;'>Status:</p></td></tr>";
    $list_rpc_line_last = "</td></tr></tbody></table></form>";

    // Output Lines
    echo "$list_rpc_line_first";
    foreach($result as $row) {
	$list_rpc_line_loop = "<tr><td class='td'><input type='radio' name='power-radio' value='" . $row['id'] . "'></td><td class='td' id='desc-" . $row['id'] . "'>" . $row['rpcdf'] . "</td><td class='td' id='ip-" . $row['id'] . "'>" . $row['rpcipf'] . "</td><td class='td' id='port-" . $row['id'] . "'>" . $row['rpcprtf'] . "</td><td class='td' id='status-" . $row['id'] . "' align='center'><div id='status-img-" . $row['id'] . "'><img src='images/info-32.png' alt='info'>";
	echo "$list_rpc_line_loop";
    }
    echo "$list_rpc_line_last";
    echo "</br>";
    echo "</br>";
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
