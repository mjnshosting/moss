<?php
 session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

$mtr_dest = escapeshellcmd(trim($_POST['mtr_dest']));

if(preg_match("/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/", $mtr_dest)) {
        $mtr = shell_exec ("mtr --report --report-wide --report-cycles 5 $mtr_dest | awk '{\$1=\$1}1' OFS='</td><td style='padding-right:10px'>' | sed 's/\$/<\/td><\/tr>/' | sed 's/^/<tr><td style='padding-right:10px'>/'");
        $mtr_6 = shell_exec ("mtr --report --report-wide --report-cycles 5 -6 $mtr_dest | awk '{\$1=\$1}1' OFS='</td><td style='padding-right:10px'>' | sed 's/\$/<\/td><\/tr>/' | sed 's/^/<tr><td style='padding-right:10px'>/'");
} elseif (!filter_var($mtr_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
        $mtr = shell_exec ("mtr --report --report-wide --report-cycles 5 -6 $mtr_dest | awk '{\$1=\$1}1' OFS='</td><td style='padding-right:10px'>' | sed 's/\$/<\/td><\/tr>/' | sed 's/^/<tr><td style='padding-right:10px'>/'");
} elseif (!filter_var($mtr_dest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
        $mtr = shell_exec ("mtr --report --report-wide --report-cycles 5 $mtr_dest | awk '{\$1=\$1}1' OFS='</td><td style='padding-right:10px'>' | sed 's/\$/<\/td><\/tr>/' | sed 's/^/<tr><td style='padding-right:10px'>/'");
} else {
        $mtr = "This is not a valid IPv4/IPv6 Address or Hostname. Please correct this and try again.";
}

echo "<table><tr><td style='padding-right:5px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td></tr>";
echo "$mtr";
echo "</table></br>";
echo "<table><tr><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td><td style='padding-right:10px'></td></tr>";
echo "$mtr_6";
echo "</table></br></br>";

?>
