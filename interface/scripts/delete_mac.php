<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$dmaid = escapeshellcmd($_POST['macid']);

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
    * Modify tables and rebuild MAC List  *
    **************************************/
    
	// Delete record from the table.
	$file_db->query("DELETE FROM macaddresses WHERE id = '$dmaid'");
	
	// Rebuild Mac Address List after changes.
	$result = $file_db->query('SELECT * FROM macaddresses');

        // Insert static lines before and after dynamic line into the file.
	$list_mac_line_first = "<table class='table'><tr><td></td><td style='padding-left:10px;'></td><td style='padding-left:10px;'><p style='font-weight: bold;'>Description:</p></td><td style='padding-left:10px;'><p style='font-weight: bold;'>MAC:</p></td><td style='padding-left:10px;'><p style='font-weight: bold;'>IP:</p></td></tr>";
//<table><tr><td style='padding-right:40px;'></td><td style='padding-right:40px;'></td><td style='padding-right:40px;'><p style='font-weight: bold;'>Description:</p></td><td style='padding-right:40px;'><p style='font-weight: bold;'>MAC:</p></td><td style='padding-right:40px;'><p style='font-weight: bold;'>IP:</p></td></tr>";
	$list_mac_line_last = "</table>";

	echo "$list_mac_line_first";

	foreach($result as $row) {
		$list_mac_line_loop = "<tr><td><img onclick='wakemac(" . $row['smamf'] . ");' src=images/bulb-32.png class='form-submit'></td><td><img onclick='deletemac(" . $row['id'] . ");' src='images/delete-32.png' class='form-submit'></td><td style='padding-left:10px;vertical-align: middle;'>" . $row['smanf'] . "</td><td style='padding-left:10px;vertical-align: middle;'>" . $row['smamf'] . "</td><td style='padding-left:10px;vertical-align: middle;'>" . $row['smaipf'] . "</td></tr>";
//<tr><td><img onclick='wakemac(" . $row['smamf'] . ");' src=images/bulb-32.png class='form-submit'></td><td><img onclick='deletemac(" . $row['id'] . ");' src='images/delete-32.png' class='form-submit'></td><td style='padding-right:40px;vertical-align: middle;'>" . $row['smanf'] . "</td><td style='padding-right:40px;vertical-align: middle;'>" . $row['smamf'] . "</td><td style='padding-right:40px;vertical-align: middle;'>" . $row['smaipf'] . "</td></tr>";
		echo "$list_mac_line_loop";
	}
        echo "$list_mac_line_last";
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
