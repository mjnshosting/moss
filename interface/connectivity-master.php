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
	      <label for="ping">Ping:</label>
              </br>
              <label for="trace">Trace:</label>
              </br>
              <label for="trace">Whois:</label>
              </br>
              <label for="trace">NMap:</label>
            </div>
            <div class='div-table-col' align='left'>
              <input type="text" name="p_dest">
              </br>
              <input type="text" name="t_dest">
              </br>
              <input type="text" name="w_dest">
              </br>
              <input type="text" name="n_dest">
            </div>
            <div class='div-table-col' align='left'>
               <img onclick="runping();" src="images/cogs-24.png" class="form-submit">
	       </br>
               <img onclick="runtrace();" src="images/cogs-24.png" class="form-submit">
	       </br>
               <img onclick="runwhois();" src="images/cogs-24.png" class="form-submit">
	       </br>
               <img onclick="runnmap();" src="images/cogs-24.png" class="form-submit">
            </div>
          </div>
        </div>
      </div>
      <div class='div-table-col' align='left'><img src='images/tools-128.png'>
      </div>
      <div class='div-table-col' align='left'>
        <div style='font-weight: bold;'>Tool Description:</div>
        <div>The purpose of this tool is to allow the MJNS <br>MOSS device to test connectivity to devices <br>on the LAN and over the WAN. <br><p style="font-weight: bold;">**DNS lookups are disabled**</p></div>
      </div>
    </div>
  </div>
</div>

<div align="center">
		<h2 align="center" style="font-weight:300; font-size:33px; line-height:35px; text-align:center; padding-top:20px; padding-bottom:20px;">Results</h2>
		<div id="outputconnectivity"><img class="logo" src="images/processing3.gif"></div>
</div>
