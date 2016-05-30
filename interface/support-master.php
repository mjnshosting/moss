<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }
?>

<div id="scroll"></div>
    <div>
        <div>
		<h2 style="font-weight: 300; font-size: 33px; line-height: 35px;">man on site service (moss) remote support</h2>
        </div>
    </div>
	<div class="container">
            <div class="block-6">
                <h2>Microsoft Windows</h2>
                <h3>Things looking a bit cloudy?<br>Let us clear things up!</h3>
                <a href="downloads/TeamViewerQS_en.exe"><img src="images/win2012.png" alt="Windows Logo"></a>
            </div>
</br>
</br>
            <div class="block-6">
                <h2>Apple OS</h2>
                <h3>Things getting a bit rotten?<br>Let us help!</h3>
                <a href="downloads/TeamViewerQS.dmg"><img src="images/apple-logo.jpg" alt="Apple Logo"></a>
            </div>
	</div>
</br>
</br>
</br>
