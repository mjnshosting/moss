<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$wma = $_POST['macaddress'];
$cmd = shell_exec ("wakeonlan $wma");
echo $cmd;
?>
