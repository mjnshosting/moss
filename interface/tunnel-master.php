<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }
?>

<div id="scroll"></div>
<div align='center'>
  <h2 style="font-weight: 300; font-size: 33px; line-height: 35px;">man on site service (moss) tunnel home</h2>
</div>

<div align='center'>
  <div class='div-table'>
    <div class='div-table-row'>
      <div class='div-table-col' align='left'><img src='images/home-128.png'></div>
      <div class='div-table-col' align='left'>
	<div id='scroll-ptm'></div>
        <div style='font-weight: bold;'>Enter Tunnel Home Credentials:</div>
        <div class='div-table'>
          <div class='div-table-row'>
            <div class='div-table-col' align='left'>
              <label for="server">Server:</label>
              </br>
              <label for="user">Username:</label>
              </br>
              <label for="password">Password:</label>
              </br>
              <label for="user">Monitor:</label>
              </br>
            </div>
            <div class='div-table-col' align='left'>
              <input type="text" name="ths">
              </br>
              <input type="text" name="thu">
              </br>
              <input type="password" name="thp">
              </br>
              <input type="text" name="thm">
              </br>
              <div style="text-align: right">
                <img onclick="tunnelsave();" src="images/lock-32.png" class="form-submit">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='div-table-col' align='left'><img src='images/tools-128.png'>
      </div>
      <div class='div-table-col' align='left'>
        <div style='font-weight: bold;'>Tool Description:</div>
        <div>The purpose of this tool is to allow the MJNS</br> MOSS device to communicate with our home</br> office through a VPN Tunnel.</div>
      </div>
    </div>
  </div>
</div>

<div align="center">
  <h2 align="center" style="font-weight:300; font-size:33px; line-height:35px; text-align:center; padding-top:20px; padding-bottom:20px;">Tunnel Status</h2>
  <div id="vpnstatus"></div>
</div>

</br>
</br>

