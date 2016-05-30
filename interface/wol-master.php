<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }
?>

<div id="scroll"></div>
<div align="center">
	<h2 style="font-weight: 300; font-size: 33px; line-height: 35px;">man on site service (moss) wake-on-lan tool</h2>
</div>

<div align="center">
  <div class='div-table'>
    <div class='div-table-row'>
      <div class='div-table-col' align='left'><img src='images/edit-128.png'></div>
      <div class='div-table-col' align='left'>
        <div id='scroll-ptm'></div>
        <div style='font-weight: bold;'>Enter MAC Information:</div>
        <div class='div-table'>
          <div class='div-table-row'>
            <div class='div-table-col' align='left'>
              <label for="description">Description:</label>
              </br>
              <label for="mac">MAC:</label>
              </br>
              <label for="ip">IP:</label>
            </div>
            <div class='div-table-col' align='left'>
              <input type="text" name="smad">
              </br>
              <input type="text" name="smam">
              </br>
              <input type="text" name="smaip">
              </br>
              <div style="text-align: right">
                <img onclick="savemac();" src="images/save-32.png" class="form-submit">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='div-table-col' align='left'><img src='images/tools-128.png'>
      </div>
      <div class='div-table-col' align='left'>
        <div style='font-weight: bold;'>Tool Description:</div>
        <div>The purpose of this tool is to allow Wake on </br>LAN magic packets to be sent over the network </br>from this device. The target device must reside </br>on the same LAN/VLAN/WLAN as this device.
      </div>
    </div>
  </div>
</div>

<div align="center">
        <h2 align="center" style="font-weight:300; font-size:33px; line-height:35px; text-align:center;">Saved MAC addresses</h2>
        <div id="listmac"></div>
</div>
