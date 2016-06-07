<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }
?>

<SCRIPT TYPE="text/javascript">
	$('html,body').animate({scrollTop: $("#scroll").offset().top},'slow');
</SCRIPT>	

<div id="scroll"></div>
<div align="center">
	<h2 style="font-weight: 300; font-size: 33px; line-height: 35px;">man on site service (moss) Connectivity</h2>
</div>

<div align='center'>
  <div class='div-table'>
    <div class='div-table-row'>
      <div class='div-table-col' align='left'><img src='images/terminal-128.png'></div>
      <div class='div-table-col' align='left'>
        <div style='font-weight: bold;'>Enter Addres or Hostname:</div>
        <div class='div-table'>
          <div class='div-table-row'>
            <div class='div-table-col' align='left'>
              <input type="text" name="destination">
            </div>
          </div>
        </div>
      </div>
      <div class='div-table-col' align='left' style='padding-left:20px'><img src='images/tools-128.png'>
      </div>
      <div class='div-table-col' align='left'>
        <div style='font-weight: bold;'>Tool Description:</div>
        <div>The purpose of this tool is to allow the MJNS <br>MOSS device to test connectivity to devices <br>on the LAN and over the WAN. <br><p style="font-weight: bold;">**DNS lookups are disabled except for MTR tool**</p></div>
      </div>
    </div>
  </div>
</div>

<div align="center">
</br>
<table>
    <tbody>
        <tr>
            <td ><p style="font-weight: bold;">Ping:</p></td>
            <td class="td"><p style="font-weight: bold;">Trace:</p></td>
            <td class="td"><p style="font-weight: bold;">MTR:</p></td>
            <td class="td"><p style="font-weight: bold;">Whois:</p></td>
            <td class="td"><p style="font-weight: bold;">NMap:</p></td>
        </tr>
        <tr>
            <td align="center"><img onclick="runping();" src="images/cloud-server-32.png" alt="Ping" class="form-submit"></td>
            <td class="td" align="center"><img onclick="runtrace();" src="images/features-32.png" alt="Traceroute" class="form-submit"></td>
            <td class="td" align="center"><img onclick="runmtr();" src="images/code-32.png" alt="My Trace Route" class="form-submit"></td>
            <td class="td" align="center"><img onclick="runwhois();" src="images/keywords-32.png" alt="Whois" class="form-submit"></td>
            <td class="td" align="center"><img onclick="runnmap();" src="images/firewall-32.png" alt="NMap" class="form-submit"></td>
        </tr>
   </tbody>
</table>

</br>
		<h2 align="center" style="font-weight:300; font-size:33px; line-height:35px; text-align:center; padding-top:20px; padding-bottom:20px;">Results</h2>
		<div id="outputconnectivity"><img class="logo" src="images/processing3.gif"></div>
</div>
