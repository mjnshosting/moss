<?php
session_start();

if (empty($_SESSION['user_name'])) {
    header('Location: index.php');
    exit;
    }
?>

<div id="scroll"></div>
<div style="text-align:left; display: block; font: 'Comic Sans', sans-serif; background: #fff;padding:50px;">
                <h2>License</h2>
		<p>This software and those integrated within it are subject to their respective lincense that have been determined by their authors. This project shall not be sold or modified in any way that opposes their license</p>
                <h2>Credit</h2>
		<p><a href="https://github.com/XavierBerger/RPi-Monitor" target="_blank">RPiMonitorD</a> by Xavier Berger of <a href="http://rpi-experiences.blogspot.fr/" target="_blank">RPi-Experiences</a><p>
		<p>Thank you so much for making such a great product that is easy to read and free to change so that a novice like myself can put his own touch on it. Your work is appreciated and we have and always will donate to your project. Thank you from all of us at MJ Network Solutions.</p>
		<p>This project is licensed under the <a href="http://www.gnu.org/licenses/quick-guide-gplv3.html" target="_blank">GNU General Public License</a></p>
		<p><a href="https://www.iconfinder.com/iconsets/small-n-flat" target="_blank">Small-N-Flat on IconFinder</a> by <a href="https://www.iconfinder.com/paomedia" target="_blank">Paomedia</a> <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">(License)</a></p>
		<p>The use of this iconset and images therein are licensed under the <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">Creative Commons (Attribution 3.0 Unported)</a>.
		<p><a href="http://guillaumekurkdjian.com/">Guillaume Kurkdjian</a></p>
		<p>Beautiful GIFs and videos. Simply a joy to look at.</p>
		<p><a href="http://cacti.net/" target="_blank">Cacti - RRD Based Graphing Tool</a></p>
                <p>Cacti is a complete network graphing solution designed to harness the power of RRDTool's data storage and graphing functionality. Cacti provides a fast poller, advanced graph templating, multiple data acquisition methods, and user management features out of the box. All of this is wrapped in an intuitive, easy to use interface that makes sense for LAN-sized installations up to complex networks with hundreds of devices</p>
		<h2>Thanks</h2>
		<p>Special thanks to my awesome business partners (J Boss and Silk McVelvet) for always being there both in business and personally. They say its lonely at the top but thats usually because you dont bring anyone with you. Of course our families that always have our back and give us the motivation to continue working like we do.</p>
</div>
