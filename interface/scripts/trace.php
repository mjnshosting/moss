<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$t_dest = escapeshellcmd(trim($_POST['t_dest']));

if(preg_match("/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/", $t_dest)) {
        $trace = shell_exec ("traceroute -n $t_dest | awk '{\$1=\$1}1' OFS='</td><td style='padding-right:10px'>' | sed 's/\$/<\/td><\/tr>/' | sed 's/^/<tr><td style='padding-right:10px'>/'");
        $trace_6 = shell_exec ("traceroute -6 -n $t_dest | awk '{\$1=\$1}1' OFS='</td><td style='padding-right:10px'>' | sed 's/\$/<\/td><\/tr>/' | sed 's/^/<tr><td style='padding-right:10px'>/'");
} elseif (!filter_var($t_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
        $trace = shell_exec ("traceroute6 -n $t_dest | awk '{\$1=\$1}1' OFS='</td><td style='padding-right:10px'>' | sed 's/\$/<\/td><\/tr>/' | sed 's/^/<tr><td style='padding-right:10px'>/'");
} elseif (!filter_var($t_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
        $trace = shell_exec ("traceroute -n $t_dest | awk '{\$1=\$1}1' OFS='</td><td style='padding-right:10px'>' | sed 's/\$/<\/td><\/tr>/' | sed 's/^/<tr><td style='padding-right:10px'>/'");
} else {
        $trace = "This is not a valid IPv4/IPv6 Address or Hostname. Please correct this and try again.";
}

echo "<table><tr><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td></tr>";
echo "$trace";
echo "</table></br>";
echo "<table><tr><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td></tr>";
echo "$trace_6";
echo "</table></br></br>";

?>
