#!/usr/bin/php

<?php

$host = '192.168.209.1';
$up = ping($host);

function ping($host)
{
        exec(sprintf('ping -c 10 -W 1 -n %s', escapeshellarg($host)), $res, $rval);
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

    // Query DB and create mac list text file that will show up in the vpnstatus div
    $result = $file_db->query('SELECT thstf FROM tunnelhome');
    $trigger = $result->fetch();
    $result = $trigger[0];

    //There are two executions of the poff command ensure the vpn is not up twice 
    //which will cause issues on reconnect.

    if ($result == "1") {
	shell_exec ('/usr/bin/killall -w -s SIGKILL pppd');
	shell_exec ('/bin/mv /var/www/html/scripts/moss_tunnel /etc/ppp/peers/moss_tunnel');
	shell_exec ('/bin/chmod 750 /etc/ppp/peers/moss_tunnel');
	shell_exec ('/bin/chown root:dip /etc/ppp/peers/moss_tunnel');
        shell_exec ('pon moss_tunnel');
	$update = $file_db->query('UPDATE tunnelhome SET thstf = 0 WHERE id = 1');
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

    if ($up == false) {
	shell_exec ('/usr/bin/killall -w -s SIGKILL pppd');
        shell_exec ('pon moss_tunnel');
    }
?>

