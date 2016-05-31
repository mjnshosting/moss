<?php

/*
 * This is the installation file for the 0-one-file version of the php-login script.
 * It simply creates a new and empty database.
 */

// error reporting config
error_reporting(E_ALL);

// config
$db_type = "sqlite";
$db_sqlite_path = "../../dbs/moss_users_db.sqlite3";

// create new database file / connection (the file will be automatically created the first time a connection is made up)
$db_connection = new PDO($db_type . ':' . $db_sqlite_path);

// create new empty table inside the database (if table does not already exist)
$sql = 'CREATE TABLE IF NOT EXISTS `users` (
        `user_id` INTEGER PRIMARY KEY,
        `user_name` varchar(64),
        `user_password_hash` varchar(255));
        CREATE UNIQUE INDEX `user_name_UNIQUE` ON `users` (`user_name` ASC);
        ';

// execute the above query
$query = $db_connection->prepare($sql);
$query->execute();

// check for success
if (file_exists($db_sqlite_path)) {
    echo "Database $db_sqlite_path was created, installation was successful.\n";
    shell_exec ('/bin/chmod 644 ../../dbs/moss_users_db.sqlite3');
    shell_exec ('/bin/chown www-data:www-data ../../dbs/moss_users_db.sqlite3');
} else {
    echo "Database $db_sqlite_path was not created, installation was NOT successful. Missing folder write rights ?";
}

