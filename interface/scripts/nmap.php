<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$n_dest = escapeshellcmd(trim($_POST['n_dest']));

if(preg_match("/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/", $n_dest)) {
	$nmap = shell_exec ("nmap -Pn -n $n_dest | sed 's/$/<\/br>/'");
} elseif (!filter_var($n_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
	$nmap = shell_exec ("nmap -Pn -n -6 $n_dest | sed 's/$/<\/br>/'");
} elseif (!filter_var($n_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
	$nmap = shell_exec ("nmap -Pn -n $n_dest | sed 's/$/<\/br>/'");
} else {
	$nmap = "This is not a valid IPv4/IPv6 Address or Hostname. Please correct this and try again.";
}


echo "<div style='text-align: left; width: 500px; word-wrap: break-word; margin: 0 auto;'>";
echo "<p>";
echo "$nmap";
echo "</p>";
echo "</div>";
echo "</br>";
echo "</br>";

?>
