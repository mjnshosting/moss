<?php
//GET ALL INTERFACES
$interfaces = array_values(array_filter(explode(" ", trim(preg_replace('/\s+/', ' ', shell_exec('ifconfig | sed "s/[ \t].*//;/^\(lo\|\)$/d"'))))));

foreach($interfaces as $row) {
	$ipv4 = shell_exec ("ifconfig $row | grep 'inet addr:' | cut -d ':' -f2 | awk '{ print $1}'");
	$ipv6 = shell_exec ("ifconfig $row | grep -Po '(?>(?>([a-f\d]{1,4})(?>:(?1)){3}|(?!(?:.*[a-f\d](?>:|$)){})((?1)(?>:(?1)){0,6})?::(?2)?)|(?>(?>(?1)(?>:(?1)){5}:|(?!(?:.*[a-f\d]:){6,})(?3)?::(?>((?1)(?>:(?1)){0,4}):)?)?(25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)(?>\.(?4)){3}))\/\d{1,2}'");
	$traffic = array_values(array_filter(explode(" ", shell_exec ("ifconfig $row | grep 'bytes'"))));
	echo "<div class='div-table-row'><p style='font-weight: bold;'>IP Address Info:</p><div class='div-table'><div class='div-table-row'><div style='padding-right:17px' class='div-table-col' align='left'>eth0</div><div style='padding-right:8px' class='div-table-col' align='left'>IPv4:</div><div style='padding-right:8px' class='div-table-col' align='left'>$ipv4</div></div><div class='div-table-row'><div class='div-table-col'></div><div style='padding-left:44px;padding-right:8px' class='div-table-col' align='left'>IPv6:</div><div style='padding-right:8px' class='div-table-col' align='left'>$ipv6</div></div></div></div>";
	echo "<div class='div-table-row'><p style='font-weight: bold;'>Interface Statistics:</p></div><div class='div-table-row'><div style='padding-right:16px' class='div-table-col' align='left'>eth0</div><div class='div-table-col' style='padding-left:8px; padding-right:2px'>Transmit:</div><div style='padding-right:16px' class='div-table-col' align='left'>$traffic[6] $traffic[7]</div><div class='div-table-col' style='padding-left:8px; padding-right:2px'>Receive:</div><div style='padding-right:16px' class='div-table-col' align='left'>$traffic[2] $traffic[3]</div></div>";
    }
?>
