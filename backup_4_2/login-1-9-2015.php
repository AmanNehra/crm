<?php
session_start();
require_once('config.php');
//$dir = dirname(__FILE__);
//echo "<p>Full path to this dir: " . $dir . "</p>"; die;
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Danstring CRM</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link href="css/crm-home.css" rel="stylesheet" type="text/css" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
function msg() {
    var v = document.getElementsByName("user_name");
	var w = document.getElementsByName("password");
	if(v[0].value==""){
	alert("Enter your Username/Email");
	return false;
	}
	if(w[0].value==""){
	alert("Enter your password");
	return false;
	}
	//if((/^GF/).test(v[0].value)==0){alert('Invalid UserID');return false;}
	
    //alert(v[0].value);
}
</script>
</head>
<body> 
 
<!-- Main Home Page-->

<div id="wrapper">


<!--Header-->
<div class="header-main">
<div class="header">
<div class="header-left"><img src="images/login-page-img/logo.png" alt="Danstring Logo" title="Danstring Logo" /></div>
<div class="header-middle"><img src="images/login-page-img/crm-skyland.png" alt="Danstring Logo" title="Danstring Logo" /></div>
<div class="header-right"><img src="images/login-page-img/crm.png" alt="Danstring CRM" title="Danstring CRM" /></div>
</div>
</div>
<!--Header End-->

<!--Middle Body-->
<div class="middle-body-main">
<div class="middle-body">

<div class="mb-box01">
<div class="mb-box0101"><img src="images/login-page-img/text-image.jpg" alt="Danstring Books" title="Danstring Books" /></div>
<div class="mb-box0102"><img src="images/login-page-img/books.jpg" alt="Danstring Books" title="Danstring Books" /></div>
<!--<div class="mb-box0103">
<div class="mb-box0103-text01">
This is Demo Text  Please  login  using the  assigned username<br />
and password. Once the system validates you will be allowed to<br />
perform various activities This is Demo Text.
</div>
</div>-->
</div>

<div class="mb-box02">
<div class="mb-box0201">
<form action="submit.php" method="post" id="loginform">
<table width="310" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" colspan="3" align="left" valign="middle"></td>
    </tr>
  <tr>
    <td width="32" align="left" valign="middle">&nbsp;</td>
    <td width="246" align="left" valign="middle" class="login-form-heading">Executive Login</td>
    <td width="32" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="3" align="left" valign="middle">&nbsp;</td>
    </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle"><input type="text" name="user_name" id="textfield" placeholder="User ID" class="login-form-text-one" /></td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle"><input type="password" name="password" id="textfield" placeholder="Password" class="login-form-text-one" /></td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle"><a href="#"><input type="image" src="images/login-page-img/log-in.png" onclick="msg()" alt="Log In" title="Log In" /></a></td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="3" align="left" valign="middle">&nbsp;</td>
    </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle" class="login-form-forget-pass"><a href="#">Forgot Password?</a></td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
</table>
</form>
</div>
</div>

</div>
</div>
<!--Middle Body End-->


<!--Middle Body Two-->
<div class="middle-body-two-main">
<div class="middle-body-two">

<div class="mbt-box01">
<div class="mbt-box02"><img src="images/login-page-img/sales.png" alt="Sales" title="Sales" /></div>
<div class="mbt-box03"><div class="mbt-box-text01">Sales</div></div>
</div>

<div class="mbt-box01">
<div class="mbt-box02"><img src="images/login-page-img/orders.png" alt="Orders" title="Orders" /></div>
<div class="mbt-box03"><div class="mbt-box-text01">Orders</div></div>
</div>

<div class="mbt-box01">
<div class="mbt-box02"><img src="images/login-page-img/marketing.png" alt="Marketing" title="Marketing" /></div>
<div class="mbt-box03"><div class="mbt-box-text01">Marketing</div></div>
</div>

<div class="mbt-box01">
<div class="mbt-box02"><img src="images/login-page-img/support.png" alt="Support" title="Support" /></div>
<div class="mbt-box03"><div class="mbt-box-text01">Support</div></div>
</div>

</div>
</div>
<!--Middle Body Two End-->


<!--Footer-->
<div class="footer-main">
<div class="footer">
<div class="footer-left">
<div class="footer-text01">Copyright 2014 Danstring All Right Reserved</div>
</div>
<div class="footer-right">
<div class="footer-text01">Designed & Developed by <a href="http://danstring.com/" target="_blank">Danstring Technologies Pvt. Ltd.</a></div>
</div>
</div>
</div>
<!--Footer End-->





</div>
<!-- Main Home Page-->


</body>
</html>