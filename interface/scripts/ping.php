<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$p_dest = escapeshellcmd(trim($_POST['p_dest']));

if(preg_match("/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/", $p_dest)) {
	$ping = shell_exec ("ping -n -c 5 $p_dest | sed 's/$/<\/br>/'");
	$ping_6 = shell_exec ("ping6 -n -c 5 $p_dest | sed 's/$/<\/br>/'");
} elseif (!filter_var($p_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
	$ping = shell_exec ("ping6 -n -c 5 $p_dest | sed 's/$/<\/br>/'");
} elseif (!filter_var($p_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
	$ping = shell_exec ("ping -n -c 5 $p_dest | sed 's/$/<\/br>/'");
} else {
	$ping = "This is not a valid IPv4/IPv6 Address or Hostname. Please correct this and try again.";
}

echo "<p>";
echo "$ping";
echo "</br>" . $ping_6;
echo "</p>";
echo "</br>";
echo "</br>";
?>
