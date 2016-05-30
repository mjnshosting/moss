<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }
?>

<div id="scroll"></div>
<iframe src="/cacti" name="iframe_a" width=100% height="896" style="border:none"></iframe>

