<?php 
ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
$userid=$_SESSION['SESS_id'];

if(empty($userid)){header('location:login.php');}
 $var=$_SESSION['SESS_id'];
 $data=mysql_query("SELECT * FROM dan_users where id='$var'") or die(mysql_error);
 $r = mysql_fetch_array($data);
$user=$r['user_type'];

if(isset($_GET['log']) && ($_GET['log']=='out')){
        //if the user logged out, delete any SESSION variables
	session_destroy();
	
        //then redirect to login page
	header('location:login.php');
}?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CRM</title>
<head>
<link rel="stylesheet" href="css/screen11.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/css.css" type="text/css" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<!--<script src="js/jquery/jquery-1.8.2.min.js" type="text/javascript"></script>-->

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>


<script src="js/jquery/jquery.validate.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>



<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script>
function goback() {
    history.go(-1);
}
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 



<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>
<script>
function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
};



</script>


<script src="js/jquery.tablesorter.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
 //$(".prod,.proddet").hide();
 $('.prod,.proddet').css('display','none');
 $('tr.altera td.first1')
      .click(function(){$(this).parent()
                        .next('tr.prod')
                         .toggle();
						  $(this).find('td').toggleClass('hide show');
						 });
		
		$('tr.altera td.first1').click(function(){$(this).parent()
                        .next('tr.prod').next('tr.proddet')
                         .toggle();
						 
						 });
						 
 /*jQuery('.mutebutton').live('click', function (event) {
    jQuery(this).find(jQuery('.prod,.proddet')).toggle('show');
	 $(this).find('td').toggleClass('hide show');
});
 */
/*$(".mutebutton").click(function(){
 $(".prod,.proddet").toggle();
 $(this).find('td').toggleClass('hide show');
});*/
  $("#product-table").tablesorter();   

/*--------------------*/
//$("#paso").hide();
$('#paso').css('display','none');
$("#canges").click(function(){
 $("#paso").toggle();
 //$(this).find('td').toggleClass('hide show');
});
$("#cance").click(function(){
$('#paso').css('display','none');
});

});



	
	</script>
</head>
<body>
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="index.php"><img src="images/logo_truck.png" width="250" height="60" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<!--<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr><form method="post" action="searchin.php" >
		<td><input type="text" id="text" placeholder="Search Here..." name="query"/>
             </td>
		<td>
		<select class="styledselect" id="select" name="select">
			<option value="firstname">First Name</option>
			<option value="lastname">Last Name</option>
			<option value="email">Email ID</option>
			<option value="phone">Phone No.</option>
			<option value="order">Order No.</option>
            <option value="contact">Contact ID</option>
		</select> 
		</td>
		<td>
		<input type="Submit" id="search" name="submit" value="Search" />
		</td></form>
		</tr>
		</table>
	</div>-->
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 
		
        <div>
        
        </div>
        
		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
           
			<!--<div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>-->
			<div class="nav-divider">&nbsp;</div>
           
			<a href="?log=out" id="logout"><img src="images/shared/nav/logout.png" width="100" height="40" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		 <?php
        $full_name = $_SERVER['PHP_SELF'];
        $name_array = explode('/',$full_name);
        $count = count($name_array);
        $page_name = $name_array[$count-1];
    ?>
    
		<ul class="select <?php echo ($page_name=='index.php')?'current':'';?>"><li> <a href="index.php"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<?php /*?><div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div><?php */?>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select <?php echo ($page_name=='user_listing.php')?'current':'';?>"><li><a href="user_listing.php"><b>Users</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<?php /*?><div class="select_sub show">
			<ul class="sub">
				<li><a href="user_listing.php">View all users</a></li>
				<li class="sub_show"><a href="add_user.php">Add new user</a></li>
				<li><a href="#nogo">Delete products</a></li>
			</ul>
		</div><?php */?>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select <?php echo ($page_name=='invoice.php')?'current':'';?>"><li><a href="customer.php"><b>Invoice</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<?php /*?><div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Categories Details 1</a></li>
				<li><a href="#nogo">Categories Details 2</a></li>
				<li><a href="#nogo">Categories Details 3</a></li>
			</ul>
		</div><?php */?>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<?php /*?><ul class="select <?php echo ($page_name=='my_sale_report.php')?'current':'';?>"><li><a href="my_sale_report.php"><b>My Sales Report</b><?php */?><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<?php /*?><div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Clients Details 1</a></li>
				<li><a href="#nogo">Clients Details 2</a></li>
				<li><a href="#nogo">Clients Details 3</a></li>
			 
			</ul>
		</div><?php */?>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		<?php /*?><?php if($user=='1'){ ?>
		<ul class="select <?php echo ($page_name=='all_refunds.php')?'current':'';?>"><li><a href="all_refunds.php"><b>Refunds</b><?php */?><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		<!--</li>
		</ul>-->
		<?php //} ?>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>