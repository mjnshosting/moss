<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$w_dest = trim($_POST['w_dest']);

if(preg_match("/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/", $w_dest)) {
	$whois = shell_exec ("whois -H $w_dest | sed 's/$/<\/br>/'");
} elseif (!filter_var($w_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
	$whois = shell_exec ("whois -H $w_dest | sed 's/$/<\/br>/'");
} elseif (!filter_var($w_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
	$whois = shell_exec ("whois -H $w_dest | sed 's/$/<\/br>/'");
} else {
	$whois = "This is not a valid IPv4/IPv6 Address or Hostname. Please correct this and try again.";
}

echo "<p>";
echo "$whois";
echo "</p>";
echo "</br>";
echo "</br>";
?>
