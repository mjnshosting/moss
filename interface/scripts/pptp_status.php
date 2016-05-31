<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

//Taken from http://www.thecave.info/php-ping-script-to-check-remote-server-or-website/ 
//and modified for our use.

$sys_ip_ppp0 = shell_exec ("ifconfig ppp0 | grep 'inet addr:' | cut -d ':' -f2 | awk '{ print $1}'");

  function ping($monitor)
	{
	        exec(sprintf('ping -c 2 -W 1 -n %s', escapeshellarg($monitor)), $res, $rval);
	        return $rval === 0;
	}

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

    // Query DB and create mac list text file that will show up in the iFrame
    $monitor = $file_db->query('SELECT thmf FROM tunnelhome');
    $trigger = $monitor->fetch();
    $monitor = $trigger[0];

    $up = ping($monitor);


    // Put all variables together
    $result = $file_db->query('SELECT * FROM tunnelhome');

    foreach($result as $row) {
		echo "<div class='div-table'> <div class='div-table-row'> <div class='div-table-col' align='left' style='padding-right:60px;'> <p style='font-weight: bold;padding-bottom:0px;'>Status:</p><div class='div-table-col' align='left' style='padding-right:60px'><img src=" .($up ? 'images/success-32.png' : 'images/error-32.png'). " alt=test> </div></div><div class='div-table-col' align='left' style='padding-right:40px;'> <p style='font-weight: bold;padding-bottom:0px;'>Endpoint:</p><div class='div-table-col' align='left' style='padding-right:40px;vertical-align: middle;'>" . $row['thsf'] . "</div></div><div class='div-table-col' align='left' style='padding-right:40px;'> <p style='font-weight: bold;padding-bottom:0px;'>Monitor:</p><div class='div-table-col' align='left' style='padding-right:40px;vertical-align: middle;'>" . $row['thmf'] . "</div></div><div class='div-table-col' align='left' style='padding-right:40px;'> <p style='font-weight: bold;padding-bottom:0px;'>VPN IP:</p><div class='div-table-col' align='left' style='vertical-align: middle;'>" .$sys_ip_ppp0. "</div></div></div></div>";
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
