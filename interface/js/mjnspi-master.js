function AddTopmenu(){
$("#topmenu").html("<div class='container'> \
                <div align='center' ><img class='logo' src='images/mjnspi-logo.png' alt='MJNS + Raspberry Pi'></div> \
                <nav class='navigation'> \
                    <ul class='sf-menu clearfix'> \
                        <li><a href='#' id='dashboard'>Status</a></li> \
                        <li><a href='#'>Tools</a> \
                                <ul> \
                                        <li><a href='#' id='cacti' >Network Health</a></li> \
                                        <li><a href='#' id='thome' >Tunnel Home</a></li> \
                                        <li><a href='#' id='connectivity' >Connectivity</a></li> \
                                        <li><a href='#' id='wol' >Wake On LAN</a></li> \
                                        <li><a href='#' id='rpc' >Remote Power Control</a></li> \
                                        <li><a href='#' id='shell' >Shell Access</a></li> \
                                </ul> \
                        </li> \
                        <li><a href='http://support.mjnshosting.com'>Remote Support</a></li> \
                        <li><a href='#' id='license'>Credit & License</a></li> \
                        <li><a href='http://www.mjnshosting.com/index-5.html' target='_blank'>Contacts</a></li> \
                    </ul> \
                </nav> \
    </div>");
}

function AddFooter(){
$("#footer").html(
'<div class="footer_top">'+
        '<div class="container">'+
            '<div class="row">'+
                '<div class="grid_3">'+
                    '<h3>NAVIGATION</h3>'+
                    '<ul class="footer_list">'+
                        '<li><a href="#" id="dashboard2">Status</a></li>'+
                        '<li><a href="http://support.mjnshosting.com">Remote Support</a></li>'+
                        '<li><a href="http://www.mjnshosting.com/index-5.html" target="_blank">Contacts</a></li>'+
                        '<li><a href="logout.php" >Logout</a></li>'+
                    '</ul>'+
                '</div>'+
                '<div class="grid_3">'+
                    '<h3>FOR CUSTOMERS</h3>'+
                    '<ul class="footer_list">'+
                       '<li><a href="https://tickets.mjnshosting.com/jira/servicedesk/customer/portal/1" target="_blank">SUPPORT TICKETS</a></li>'+
                        '<li><a href="http://portal.mjnshosting.com" target="_blank">MJNS PORTAL</a></li>'+
                    '</ul>'+
                '</div>'+
                '<div class="grid_3">'+
                    '<h3>FOLLOW US</h3>'+
                    '<ul class="socials">'+
                        '<li><a href="http://twitter.com/mjnshosting" target="_blank"><i class="fa fa-twitter-square"></i>Twitter</a></li>'+
                        '<li><a href="http://facebook.com/mjnshosting" target="_blank"><i class="fa fa-facebook-square"></i>Facebook</a></li>'+
                    '</ul>'+
                '</div>'+
                '<div class="grid_3">'+
                    '<h3>Our location</h3>'+
                    '<div class="footer_info clearfix">'+
                        '<i class="fa fa-home"></i>'+
                        '<div>Plantation, FL 33317</div>'+
                    '</div>'+
                    '<div class="footer_info clearfix">'+
                        '<i class="fa fa-phone-square"></i>'+
                        '<div>'+
                            'Telephone: <span>+1 800 760 7136</span> <br>'+
                            'FAX: <span>+1 800 760 7136</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>'+
    '<div class="container">'+
        '<div class="row">'+
            '<div class="grid_12">'+
		    '<div align="center">'+
		         '<a href="http://www.mjnshosting.com" class="logo" target="_blank">MJ Network Solutions &copy; | <a href="http://www.mjnshosting.com/index-6.html" class="logo" target="_blank">Privacy Policy | </a><a href="#" id="license2" class="logo">Credit/License</a>'+
		    '</div>'+
            '</div>'+
        '</div>'+
    '</div>'
)}

function AddTopmenu_mobile(){
$("#topmenu").html("<div class='container'> \
                <div align='center' ><img class='logo' src='images/mjnspi-logo.png' alt='MJNS + Raspberry Pi'></div> \
                <nav class='navigation'> \
                    <ul class='sf-menu clearfix'> \
                        <li><a href='dashboard-mobile.php' id='dashboard' >Status</a></li> \
                        <li><a href='#'>Tools</a> \
                                <ul> \
                                        <li><a href='cacti-mobile.php' id='cacti' >Network Health</a></li> \
                                        <li><a href='tunnel-mobile.php' id='thome' >Tunnel Home</a></li> \
                                        <li><a href='connectivity-mobile.php' id='connectivity' >Connectivity</a></li> \
                                        <li><a href='wol-mobile.php' id='wol' >Wake On LAN</a></li> \
                                        <li><a href='http://support.mjnshosting.com'>Remote Power Control</a></li> \
					<li><a href='shell-mobile.php' id='shell' >Shell Access</a></li> \
                                </ul> \
                        </li> \
                        <li><a href='support-mobile.php' id='support' >Remote Support</a></li> \
                        <li><a href='license-mobile.php' id='license' >Credit & License</a></li> \
                        <li><a href='http://www.mjnshosting.com/index-5.html' target='_blank'>Contacts</a></li> \
                    </ul> \
                </nav> \
    </div>");
}

function AddFooter_mobile(){
$("#footer").html(
'<div class="footer_top">'+
        '<div class="container">'+
            '<div class="row">'+
                '<div class="grid_3">'+
                    '<h3>NAVIGATION</h3>'+
                    '<ul class="footer_list">'+
                        '<li><a href="index.php">Status</a></li>'+
                        '<li><a href="http://support.mjnshosting.com">Remote Support</a></li>'+
                        '<li><a href="http://www.mjnshosting.com/index-5.html" target="_blank">Contacts</a></li>'+
                        '<li><a href="logout.php" >Logout</a></li>'+
                    '</ul>'+
                '</div>'+
                '<div class="grid_3">'+
                    '<h3>FOR CUSTOMERS</h3>'+
                    '<ul class="footer_list">'+
                       '<li><a href="https://tickets.mjnshosting.com/jira/servicedesk/customer/portal/1" target="_blank">SUPPORT TICKETS</a></li>'+
                        '<li><a href="http://portal.mjnshosting.com" target="_blank">MJNS PORTAL</a></li>'+
                    '</ul>'+
                '</div>'+
                '<div class="grid_3">'+
                    '<h3>FOLLOW US</h3>'+
                    '<ul class="socials">'+
                        '<li><a href="http://twitter.com/mjnshosting" target="_blank"><i class="fa fa-twitter-square"></i>Twitter</a></li>'+
                        '<li><a href="http://facebook.com/mjnshosting" target="_blank"><i class="fa fa-facebook-square"></i>Facebook</a></li>'+
                    '</ul>'+
                '</div>'+
                '<div class="grid_3">'+
                    '<h3>Our location</h3>'+
                    '<div class="footer_info clearfix">'+
                        '<i class="fa fa-home"></i>'+
                        '<div>Plantation, FL 33317</div>'+
                    '</div>'+
                    '<div class="footer_info clearfix">'+
                        '<i class="fa fa-phone-square"></i>'+
                        '<div>'+
                            'Telephone: <span>+1 800 760 7136</span> <br>'+
                            'FAX: <span>+1 800 760 7136</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>'+
    '<div class="container">'+
        '<div class="row">'+
            '<div class="grid_12">'+
		    '<div align="center">'+
		         '<a href="http://www.mjnshosting.com" class="logo" target="_blank">MJ Network Solutions &copy; | <a href="http://www.mjnshosting.com/index-6.html" class="logo" target="_blank">Privacy Policy | </a><a href="license-mobile.php" class="logo">Credit/License</a>'+
		    '</div>'+
            '</div>'+
        '</div>'+
    '</div>'
)}

$(AddTopmenu);
$(AddFooter);

function hidealldivs() {
    $("#master-cacti").hide();
    $("#master-thome").hide();
    $("#master-connectivity").hide();
    $("#master-wol").hide();
    $("#master-wol-list").hide();
    $("#master-shell").hide();
    $("#master-support").hide();
    $("#master-dashboard").hide();
    $("#master-license").hide();
    $("#master-rpc").hide();
    $("#master-rpc-list").hide();
}    

function statusdashboard() {
	var interval = $("#master-dashboard").load("scripts/dashboard.php");
}

function statustun() {
	var interval = $("#vpnstatus").load("scripts/pptp_status.php");
}

function showmaclist() {
      $('#listmac').load("scripts/list_mac.php");
}

var progress_image = "<img class='logo' src='images/processing3.gif' alt='Loading...' />";

function tunnelsave() {
                var formData = {
                    'ths': $('input[name=ths]').val(),
                    'thu': $('input[name=thu]').val(),
                    'thp': $('input[name=thp]').val(),
                    'thm': $('input[name=thm]').val()
                        };
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/tunnel_home.php',
                    data        : formData,
                    encode      : true
                })
		setInterval(statustun, 5000);
          }

function runping() {
                $('#outputconnectivity').html($(progress_image));
		var formData = {
                    'p_dest': $('input[name=destination]').val(),
                        };
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/ping.php',
                    data        : formData,
                    encode      : true,
		    success     : function(data) {
			$('#outputconnectivity').fadeOut(600, function () {
				$('#outputconnectivity').html(data)
			});
		    $('#outputconnectivity').fadeIn(600);
		    }
		})
          }

function runtrace() {
		$('#outputconnectivity').html($(progress_image));
                var formData = {
                    't_dest': $('input[name=destination]').val(),
                        };
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/trace.php',
                    data        : formData,
                    encode      : true,
		    success     : function(data) {
                        $('#outputconnectivity').fadeOut(600, function () {
                                $('#outputconnectivity').html(data)
                        });
                    $('#outputconnectivity').fadeIn(600);
                    }
                })
          }

function runwhois() {
		$('#outputconnectivity').html($(progress_image));
                var formData = {
                    'w_dest': $('input[name=destination]').val(),
                        };
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/whois.php',
                    data        : formData,
                    encode      : true,
		    success     : function(data) {
                        $('#outputconnectivity').fadeOut(600, function () {
                                $('#outputconnectivity').html(data)
                        });
                    $('#outputconnectivity').fadeIn(600);
                    }
                })
          }

function runnmap() {
		$('#outputconnectivity').html($(progress_image));
                var formData = {
                    'n_dest': $('input[name=destination]').val(),
                        };
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/nmap.php',
                    data        : formData,
                    encode      : true,
		    success     : function(data) {
                        $('#outputconnectivity').fadeOut(600, function () {
                                $('#outputconnectivity').html(data)
                        });
                    $('#outputconnectivity').fadeIn(600);
                    }
                })
          }

function runmtr() {
		$('#outputconnectivity').html($(progress_image));
                var formData = {
                    'mtr_dest': $('input[name=destination]').val(),
                        };
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/mtr.php',
                    data        : formData,
                    encode      : true,
		    success     : function(data) {
                        $('#outputconnectivity').fadeOut(600, function () {
                                $('#outputconnectivity').html(data)
                        });
                    $('#outputconnectivity').fadeIn(600);
                    }
                })
          }

function savemac() {
		var formData = {
                    'smad': $('input[name=smad]').val(),
                    'smam': $('input[name=smam]').val(),
                    'smaip': $('input[name=smaip]').val(),
                        };
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/save_mac.php',
                    data        : formData,
                    encode      : true,
		    success	: function(data) {
			$('#listmac').html(data)
			$("#master-wol-list").hide()
                    }
		})
          }

function wakemac(macaddress) {
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/wake_mac.php',
                    data        : { macaddress : macaddress },
                    encode      : true,
		    success     : function(data) {
                        $('#listmac').html(data)
                        $("#master-wol-list").hide()
		    }
                })
          }

function deletemac(macid) {
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/delete_mac.php',
                    data        : { macid : macid },
                    encode      : true,
		    success     : function(data) {
                        $('#listmac').html(data)
                        $("#master-wol-list").hide()
		    }
                })
          }

function saverpc() {
		var formData = {
		    'rpcd': $('input[name=rpcd]').val(),
		    'rpcip': $('input[name=rpcip]').val(),
		    'rpcprt': $('input[name=rpcprt]').val(),
                    'rpcu': $('input[name=rpcu]').val(),
                    'rpcpwd': $('input[name=rpcpwd]').val(),
                        };
                $.ajax({
                    type        : 'POST',
                    url         : 'scripts/save_rpc.php',
                    data        : formData,
                    encode      : true,
		    success	: function(data) {
			$('#list-rpc').html(data)
			$("#master-rpc-list").hide()
                    }
		})
          }

function deleterpc() {
		var formData = {
		    'rpcid' : $('input[name=power-radio]:checked').val(),
        	}
	        $.ajax({
                    type        : 'POST',
                    url         : 'scripts/delete_rpc.php',
                    data        : formData,
                    encode      : true,
		    success     : function(data) {
			$('#list-rpc').html(data)
			$("#master-rpc-list").hide()
		    }
                })
          }

function onrpc() {
		var formData = {
		    'rpcid' : $('input[name=power-radio]:checked').val(),
        	}
	        $.ajax({
                    type        : 'POST',
                    url         : 'scripts/on_rpc.php',
                    data        : formData,
                    encode      : true
                })
          }

function rebootrpc() {
		var formData = {
		    'rpcid' : $('input[name=power-radio]:checked').val(),
        	}
	        $.ajax({
                    type        : 'POST',
                    url         : 'scripts/reboot_rpc.php',
                    data        : formData,
                    encode      : true
                })
          }

function offrpc() {
		var formData = {
		    'rpcid' : $('input[name=power-radio]:checked').val(),
        	}
	        $.ajax({
                    type        : 'POST',
                    url         : 'scripts/off_rpc.php',
                    data        : formData,
                    encode      : true
                })
          }

function statusrpc() {
		var formData = {
		    'rpcid' : $('input[name=power-radio]:checked').val(),
        	}
	        $.ajax({
                    type        : 'POST',
                    url         : 'scripts/status_rpc_pic.php',
                    data        : formData,
                    encode      : true,
		    success     : function(data) {
			var id = $('input[name=power-radio]:checked').val()
			$("#status-" + id).html(data)
		    }
                })
          }

function loadmobile() {
	$("#master-dashboard").load("scripts/dashboard.php");
	$("#master-cacti").load("cacti-master.php");
	$("#master-thome").load("tunnel-master.php");
	$("#master-connectivity").load("connectivity-master.php");
	$("#master-wol").load("wol-master.php");
	$("#master-wol-list").load("scripts/list_mac.php");
	$("#master-shell").load("shell-master.php");
	$("#master-support").load("support-master.php");
	$("#master-license").load("license-master.php");
        $("#master-rpc").load("rpc-master.php");
	$("#master-rpc-list").load("scripts/list_rpc.php");
}

if (screen.width <= 800) {
    $(AddTopmenu_mobile);
    $(AddFooter_mobile);
}

$(document).ready(function(){
        $("#master-dashboard").load("scripts/dashboard.php");
	setInterval(statusdashboard, 5000);
	setInterval(statustun, 5000);
        $("#dashboard").click(function(){
                $(hidealldivs);
                $("#master-dashboard").show();
                $("#master-dashboard").load("scripts/dashboard.php");
        });
        $("#dashboard2").click(function(){
                $(hidealldivs);
                $("#master-dashboard").show();
                $("#master-dashboard").load("scripts/dashboard.php");
        });
        $("#cacti").click(function(){
	        $(hidealldivs);
                $("#master-cacti").show();
                $("#master-cacti").load("cacti-master.php");
        });
        $("#thome").click (function(){
                $(hidealldivs);
                $("#master-thome").show();
                $("#master-thome").load("tunnel-master.php");
        });
        $("#connectivity").click(function(){
                $(hidealldivs);
                $("#master-connectivity").show();
                $("#master-connectivity").load("connectivity-master.php");
        });
        $("#wol").click(function(){
                $(hidealldivs);
                $("#master-wol").show();
                $("#master-wol").load("wol-master.php");
                $("#master-wol-list").show();
                $("#master-wol-list").load("scripts/list_mac.php");
        });
        $("#shell").click(function(){
                $(hidealldivs);
                $("#master-shell").show();
                $("#master-shell").load("shell-master.php");
        });
        $("#support").click(function(){
                $(hidealldivs);
                $("#master-support").show();
                $("#master-support").load("support-master.php");
        });
        $("#support2").click(function(){
                $(hidealldivs);
                $("#master-support").show();
                $("#master-support").load("support-master.php");
        });
        $("#license").click(function(){
                $(hidealldivs);
                $("#master-license").show();
                $("#master-license").load("license-master.php");
        });
        $("#license2").click(function(){
                $(hidealldivs);
                $("#master-license").show();
                $("#master-license").load("license-master.php");
        });
        $("#rpc").click(function(){
                $(hidealldivs);
                $("#master-rpc").show();
                $("#master-rpc").load("rpc-master.php");
                $("#master-rpc-list").show();
                $("#master-rpc-list").load("scripts/list_rpc.php");
        });
});

