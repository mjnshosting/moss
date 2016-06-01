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
        <h2 style="font-weight: 300; font-size: 33px; line-height: 35px;">man on site service (moss) remote power control</h2>

<div class='div-table'>
	<div class='div-table-row'>
		<div class='div-table-col' style="padding-right:17px;"><img src="images/bulb-128.png">
		</div>
		<div class='div-table-col' style="text-align: right">
			<p style="font-weight: bold;text-align: left">Enter APC Information:</p>
			<div class='div-table-row'>
				<div class='div-table-col' style="text-align: left">
					<label for="description">Description:</label>
					</br>
					<label for="ip">IP:</label>
					</br>
					<label for="port">Port:</label>
					</br>
					<label for="username">User:</label>
					</br>
					<label for="password">Password:</label>
				</div>
				<div class='div-table-col' style="text-align: left">
					<input type="text" placeholder="Ex: Server01" name="rpcd" maxlength="17">
					</br>
					<input type="text" placeholder="Ex: 192.168.1.1 / ::1" name="rpcip" maxlength="45">
					</br>
					<input type="text" placeholder="Ex: Port #" name="rpcprt" min="1" maxlength="20">
					</br>
					<input type="text" name="rpcu">
					</br>
					<input type="password" name="rpcpwd">
					</br>
					<img onclick="saverpc();" src="images/save-32.png" alt="Save RPC" class="form-submit" align="right">
				</div>
			</div>
		</div>
		<div class='div-table-col' style="padding-right:17px;">
			<img src="images/tools-128.png">		
		</div>
		<div class='div-table-col' style="text-align: left">
			<p style="font-weight: bold">Tool Description:</p>
				<p>This tool allows this device to control network
				</br>capable APC Power Distribution Units.  
				</br>This tool allows you to control the ports and 
				</br>check if the port is ON or OFF by selecting the desired 
				</br>entry's radio button and pressing the <img src="images/info-24.png" alt="status icon"> which will update 
				</br>the "Status" column for the selected entry.</p>
				<p style="font-weight:bold">**This tool passes credentials via telnet and should only 
				</br>be used on a trusted network and the PDU should not be 
				</br>given a gateway unless absolutely necessary. Please view 
				</br>README and notes concernning PDU setup.**</p>
		</div>

	</div>
</div>
</div>
    <h2 style="font-weight:300; font-size:33px; line-height:35px; text-align:center; padding-top:20px; padding-bottom:20px;">RPC Device List</h2>

<table>
    <tbody>
        <tr>
            <td ><p style="font-weight: bold;">On:</p></td>
            <td class="td"><p style="font-weight: bold;">Cycle:</p></td>
            <td class="td"><p style="font-weight: bold;">Off:</p></td>
            <td class="td"><p style="font-weight: bold;">Status:</p></td>
            <td class="td"><p style="font-weight: bold; padding-left: 50px">Delete:</p></td>
        </tr>
        <tr>
            <td align="center"><img onclick="onrpc();" src="images/bulb-32.png" alt="Power On" class="form-submit"></td>
            <td class="td" align="center"><img onclick="rebootrpc();" src="images/cycle-32.png" alt="Reboot" class="form-submit"></td>
            <td class="td" align="center"><img onclick="offrpc();" src="images/ban-32.png" alt="Power Off" class="form-submit"></td>
            <td class="td" align="center"><img onclick="statusrpc();" src="images/info-32.png" alt="Port Status" class="form-submit"></td>
            <td class="td" align="center" style="padding-left: 70px"><img onclick="deleterpc();" src="images/delete-32.png" alt="Delete Entry" class="form-submit"></td>
        </tr>
   </tbody>
</table>
</br>
<div id="list-rpc"></div>
</div>
