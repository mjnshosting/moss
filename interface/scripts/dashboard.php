<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }

// This file is use to collect static data such as
// Version: OS, kernel Info, and firmware
// CPU: Info Speed/Name
// Memory: Total
// Storage: root and mounted dirs with Total. The free will be dynamic
// Network: IP address(es) IPv4/6

//NOTE: Used should be placed in the DB twice once as human readable and again as a string
//      of numbers.
//Use an IF statement later on to see if the returned value of the command "ifconfig wlan0" returns anything greater
//than zero. If so then don’t display it on page.

//GET ALL INTERFACES
//ifconfig -a | sed 's/[ \t].*//;/^\(lo\|\)$/d'

//STATIC INFO
$sys_info = explode(" ", shell_exec ("uname -a"));
$sys_ip_eth0 = shell_exec ("ifconfig eth0 | grep 'inet addr:' | cut -d ':' -f2 | awk '{ print $1}'");
$sys_ip_eth0_6 = shell_exec ("ifconfig eth0|grep -Po '(?>(?>([a-f\d]{1,4})(?>:(?1)){3}|(?!(?:.*[a-f\d](?>:|$)){})((?1)(?>:(?1)){0,6})?::(?2)?)|(?>(?>(?1)(?>:(?1)){5}:|(?!(?:.*[a-f\d]:){6,})(?3)?::(?>((?1)(?>:(?1)){0,4}):)?)?(25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)(?>\.(?4)){3}))\/\d{1,2}'");
$sys_ip_wlan0 = shell_exec ("ifconfig wlan0 | grep 'inet addr:' | cut -d ':' -f2 | awk '{ print $1}'");
$sys_ip_wlan0_6 = shell_exec ("ifconfig wlan0|grep -Po '(?>(?>([a-f\d]{1,4})(?>:(?1)){3}|(?!(?:.*[a-f\d](?>:|$)){})((?1)(?>:(?1)){0,6})?::(?2)?)|(?>(?>(?1)(?>:(?1)){5}:|(?!(?:.*[a-f\d]:){6,})(?3)?::(?>((?1)(?>:(?1)){0,4}):)?)?(25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)(?>\.(?4)){3}))\/\d{1,2}'");
$sys_ip_ppp0 = shell_exec ("ifconfig ppp0 | grep 'inet addr:' | cut -d ':' -f2 | awk '{ print $1}'");
$sys_cpu = shell_exec ("cat /proc/cpuinfo|grep 'model name'|cut -d ':' -f2");
$sys_distribution = preg_match('/"([^"]+)"/', shell_exec ("cat /etc/os-release|grep 'PRETTY_NAME'"), $sys_drib);
$sys_mem_human = array_values(array_filter(explode(" ", shell_exec ("free -h | grep Mem"))));
$sys_swap_human = array_values(array_filter(explode(" ", shell_exec ("free -h | grep Swap"))));
$sys_freq = shell_exec ("cat /sys/devices/system/cpu/cpu0/cpufreq/cpuinfo_cur_freq")/1000;
//DYNAMIC INFO
$sys_mem_dynamic = array_values(array_filter(explode(" ", shell_exec ("free | grep Mem"))));
$sys_swap_dynamic = array_values(array_filter(explode(" ", shell_exec ("free | grep Swap"))));
$mem_per = round(($sys_mem_dynamic[2]/$sys_mem_dynamic[1])*100);
$swap_per = round(($sys_swap_dynamic[2]/$sys_swap_dynamic[1])*100);
$sys_ip_stats_eth0 = array_values(array_filter(explode(" ", shell_exec ("ifconfig eth0 | grep 'bytes'"))));
$sys_ip_stats_wlan0 = array_values(array_filter(explode(" ", shell_exec ("ifconfig wlan0 | grep 'bytes'"))));
$sys_ip_stats_ppp0 = array_values(array_filter(explode(" ", shell_exec ("ifconfig ppp0 | grep 'bytes'"))));
//Probably use this as a clause to write a value to the DB that turns on or auto detects and updates the WebUI
//that the interface is active and now data should be collected for it. I only care about wlan0 for now.
$sys_ip_stats_wlan0_exist = shell_exec ("cat /proc/net/dev|grep 'wlan0'");
$sys_ip_stats_ppp0_exist = shell_exec ("cat /proc/net/dev|grep 'ppp0'");
$sys_temp = round(shell_exec ("cat /sys/devices/virtual/thermal/thermal_zone0/temp")/1000*9/5+32);
$sys_load = explode(" ", shell_exec ("cat /proc/loadavg"));
//$ambient_temp =
$sys_time = date("l F j Y g:i a T");

//Uptime
$uptime = shell_exec("cut -d. -f1 /proc/uptime");
$days = floor($uptime/60/60/24);
$hours = $uptime/60/60%24;
$mins = $uptime/60%60;
$secs = $uptime%60;

//BOTH?!
//Mount Info some portions of these arrays will be placed in the dynamic-collector.php script
$sys_rootfs = array_values(array_filter(explode(" ", shell_exec ("df -h|grep root"))));
$sys_boot = array_values(array_filter(explode(" ", shell_exec ("df -h|grep boot"))));
$sys_sda = array_values(array_filter(explode(" ", shell_exec ("df -h|grep sda1"))));

//Battery Info - way to man variables to track but its a bit easier this way because of
//               the way the data is presented with spaces and ":" -__-
$batt_exists =  shell_exec ("which apcaccess");
$batt_name = shell_exec ("cat ./apcaccess-sample|grep UPSNAME|cut -d ':' -f2");
$batt_model = shell_exec ("cat ./apcaccess-sample|grep -m 1 MODEL|cut -d ':' -f2");
$batt_status = shell_exec ("cat ./apcaccess-sample|grep STATUS|cut -d ':' -f2");
$batt_load = shell_exec ("cat ./apcaccess-sample|grep LOADPCT|cut -d ':' -f2|cut -d ' ' -f3");
$batt_charge = shell_exec ("cat ./apcaccess-sample|grep BCHARGE|cut -d ':' -f2|cut -d ' ' -f2");
$batt_remaining = shell_exec ("cat ./apcaccess-sample|grep TIMELEFT|cut -d ':' -f2");

//var_dump($batt_exists);

//Start Output of HTML
echo "<div align='center'>";
echo "<h2 style='font-weight: 300; font-size: 33px; line-height: 35px;'>man on site service (moss) system dashbord</h2>";
echo "<div class='div-table'>";
//System Info
echo "<div class='div-table-row'>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'><img src='images/pc-128.png'></div>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'><p style='font-weight: bold;'>System Info:</p>Hostname: $sys_info[1] </br>Distribution: $sys_drib[1] </br>Processor: $sys_cpu </br>Kernel: $sys_info[0] $sys_info[2] $sys_info[11]</br>Firmware: $sys_info[3]</div>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'></div>";
//System Resources
echo "<div style='padding-right:16px' class='div-table-col' align='left'><img src='images/tachometer-128.png'></div>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'><p style='font-weight: bold;'>System Resources:</p>Total Memory: Used: $sys_mem_human[2] ($mem_per%) Free: $sys_mem_human[3] Total: $sys_mem_human[1] </br>Total Swap: Used: $sys_swap_human[2] ($swap_per%) Free: $sys_swap_human[3] Total: $sys_swap_human[1] </br>System Temperature: $sys_temp F&deg;</br>System Load Averages: $sys_load[0] [1Min] - $sys_load[1] [5Min] - $sys_load[2] [15Min]</br>";
if ($sys_freq > 999) {
        $sys_freq = round($sys_freq,2);
        echo "System CPU Frequency: $sys_freq GHz</br>";
}
else {
        echo "System CPU Frequency: $sys_freq MHz</br>";
}
echo "</div></div>";
echo "<div class='div-table-row'><div style='padding-right:16px' class='div-table-col' align='left'></br></div></div>";

//Network Info
echo "<div class='div-table-row'>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'><img src='images/globe-128.png'></div>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'>";
echo "<div class='div-table-row'><p style='font-weight: bold;'>IP Address Info:</p><div class='div-table'> <div class='div-table-row'> <div style='padding-right:17px' class='div-table-col' align='left'>eth0</div><div style='padding-right:8px' class='div-table-col' align='left'>IPv4:</div><div style='padding-right:8px' class='div-table-col' align='left'>$sys_ip_eth0</div></div><div class='div-table-row'> <div class='div-table-col'></div><div style='padding-left:44px;padding-right:8px' class='div-table-col' align='left'>IPv6:</div><div style='padding-right:8px' class='div-table-col' align='left'>$sys_ip_eth0_6</div></div></div></div>";
if (empty($sys_ip_stats_wlan0_exist) == false) {
	echo "<div class='div-table'> <div class='div-table-row'> <div style='padding-right:8px' class='div-table-col' align='left'>wlan0</div><div style='padding-right:8px' class='div-table-col' align='left'>IPv4:</div><div style='padding-right:8px' class='div-table-col' align='left'>$sys_ip_wlan0</div></div><div class='div-table-row'> <div class='div-table-col'></div><div style='padding-left:46px;padding-right:8px' class='div-table-col' align='left'>IPv6:</div><div style='padding-right:8px' class='div-table-col' align='left'>$sys_ip_wlan0_6</div></div></div>";        
}
if (empty($sys_ip_stats_ppp0_exist) == false) {
        echo "<div class='div-table'> <div class='div-table-row'> <div style='padding-right:14px' class='div-table-col' align='left'>ppp0</div><div style='padding-right:8px' class='div-table-col' align='left'>IPv4:</div><div style='padding-right:8px' class='div-table-col' align='left'>$sys_ip_ppp0</div></div><div class='div-table-row'> <div class='div-table-col'></div><div style='padding-left:47px;padding-right:8px' class='div-table-col' align='left'>IPv6:</div><div style='padding-right:8px' class='div-table-col' align='left'>$sys_ip_ppp0_6</div></div></div>";
}
echo "</div>";

//Interface Statistics
echo "<div style='padding-right:16px' class='div-table-col' align='left'><img src='images/monitor-128.png'></div>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'>";
echo "<div class='div-table-row'><p style='font-weight: bold;'>Interface Statistics:</p></div><div class='div-table-row'><div style='padding-right:16px' class='div-table-col' align='left'>eth0</div><div class='div-table-col' style='padding-left:8px; padding-right:2px'>Transmit:</div><div style='padding-right:16px' class='div-table-col' align='left'>$sys_ip_stats_eth0[6] $sys_ip_stats_eth0[7]</div><div class='div-table-col' style='padding-left:8px; padding-right:2px'>Receive:</div><div style='padding-right:16px' class='div-table-col' align='left'>$sys_ip_stats_eth0[2] $sys_ip_stats_eth0[3]</div></div>";
if (empty($sys_ip_stats_wlan0_exist) == false) {
        echo "<div class='div-table-row'><div style='padding-right:8px' class='div-table-col' align='left'>wlan0</div><div class='div-table-col' style='padding-left:8px; padding-right:2px'>Transmit:</div><div style='padding-right:16px' class='div-table-col' align='left'>$sys_ip_stats_wlan0[6] $sys_ip_stats_wlan0[7]</div><div class='div-table-col' style='padding-left:8px; padding-right:2px'>Receive:</div><div style='padding-right:16px' class='div-table-col' align='left'>$sys_ip_stats_wlan0[2] $sys_ip_stats_wlan0[3]</div></div>";
}
if (empty($sys_ip_stats_ppp0_exist) == false) {
        echo "<div class='div-table-row'><div style='padding-right:12px' class='div-table-col' align='left'>ppp0</div><div class='div-table-col' style='padding-left:8px; padding-right:2px'>Transmit:</div><div style='padding-right:16px' class='div-table-col' align='left'>$sys_ip_stats_ppp0[6] $sys_ip_stats_ppp0[7]</div><div class='div-table-col' style='padding-left:8px; padding-right:2px'>Receive:</div><div style='padding-right:16px' class='div-table-col' align='left'>$sys_ip_stats_ppp0[2] $sys_ip_stats_ppp0[3]</div></div>";
}
echo "</div></div>";
echo "<div class='div-table-row'><div style='padding-right:16px' class='div-table-col' align='left'></br></div></div>";

//System Time
echo "<div class='div-table-row'>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'><img src='images/clock-128.png'></div>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'><p style='font-weight: bold;'>System Time:</p>Time: $sys_time </br>Uptime: $days days $hours hrs $mins mins and $secs sec</br></div>";

//Mount Points
echo "<div style='padding-right:16px' class='div-table-col' align='left'><img src='images/folder-128.png'></div>";
echo "<div style='padding-right:16px' class='div-table-col' align='left'><p style='font-weight: bold;'>Mount Points:</p>SD Card Boot: Mount: $sys_rootfs[5] Used: $sys_rootfs[2] ($sys_rootfs[4]) Free: $sys_rootfs[3] Total: $sys_rootfs[1] </br>SD Card: Mount: $sys_boot[5] Used: $sys_boot[2] ($sys_boot[4]) Free: $sys_boot[3] Total: $sys_boot[1] </br>";
if (empty($sys_sda) !== false) {
                echo "";
}
else {
        echo "USB Storage: Mount: $sys_sda[5] Used: $sys_sda[2] ($sys_sda[4]) Free: $sys_sda[3] Total: $sys_sda[1] </br>";
}
echo "</div>";
echo "</div>";
echo "<div class='div-table-row'><div style='padding-right:16px' class='div-table-col' align='left'></br></div></div>";

//UPS Info
echo "<div class='div-table-row'>";
if ($batt_exists == NULL) {
        echo "";
}
else {
        echo "<div style='padding-right:16px' class='div-table-col' align='left'><img src='images/bulb-128.png'></div>";
        echo "<div style='padding-right:16px' class='div-table-col' align='left'><p style='font-weight: bold;'>UPS Info:</p>UPS Name: $batt_name </br> Model: $batt_model</br>Status: $batt_status</br> Load: $batt_load %</br> Charge: $batt_charge %</br> Time Left: $batt_remaining</br></div>";
}
//Other Item Here

echo "</div></div>";
echo "</br></br>";
echo "</div>";

//The comment bellow is no longer relevant but its funny as fuck!
//The @ sign is not best practice who gives a flying fuck right now...not me BITCH!

?>
