<?php 
ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
$userid=$_SESSION['SESS_id'];

if(empty($userid)){header('location:login.php');}
 $var=$_SESSION['SESS_id'];
 $data=mysql_query("SELECT * FROM dan_users where id='$var'") or die(mysql_error());
 $r = mysql_fetch_array($data);
$user=$r['user_type'];
$usname=$r['user_name'];
if(isset($_GET['log']) && ($_GET['log']=='out')){
        //if the user logged out, delete any SESSION variables
	session_destroy();
	
        //then redirect to login page
	header('location:login.php');
}?> 
<?php include 'check_user_status.php' ; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Skyland Publication CRM</title>
<head>
<link rel="shortcut icon" type="image/png" href="Only-Logo.png"/>
<link rel="stylesheet" href="css/screen11.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/css.css" type="text/css" />
 <link rel="stylesheet" href="stylesmenu.css">
 
 
 
 
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
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
/*$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});*/
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

 $("#invy1").click(function(){ 
 $("#invy13").removeClass('current');
 $("#invy14").removeClass('current');
 $("#invy12").addClass('current');});
 
 $("#invy2").click(function(){  $("#invy12").removeClass('current');
 $("#invy14").removeClass('current');
 $("#invy13").addClass('current');});
 
 $("#invy2").click(function(){  $("#invy12").removeClass('current');
 $("#invy14").removeClass('current');
 $("#invy13").addClass('current');});
 
 
 var url =document.URL;
		//alert (url);
    	var type = url.split('?');
        var hash = '';
        if(type.length > 1)
        hash = type[1];
		//alert(hash);
		if(hash=='type=three'){ $("#invy11").removeClass('current');
 $("#invy12").removeClass('current');
 $("#invy13").addClass('current'); }
 else{
 if(hash=='type=two')
 {
  $("#invy11").removeClass('current');
 $("#invy13").removeClass('current');
 $("#invy12").addClass('current');
 }if(hash=='type=one'){
  $("#invy12").removeClass('current');
 $("#invy13").removeClass('current');
 $("#invy11").addClass('current');
 }
 
 } 
 
 
  
});



	
	</script>
    
    
 <link href="css/jquery.datepick.css" rel="stylesheet" type="text/css" />   
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
 <script type="text/javascript" src="js/jquery.datepick.js"></script>
 <script type="text/javascript">
$(function($) {
	$('#popupDatepicker').datepick(); 
	$('#popupDatepicker1').datepick(); 
	$('#inlineDatepicker').datepick({onSelect: showDate});  
	$('#inlineDatepicker1').datepick({onSelect: showDate}); 
});
 
</script>

<script>
function showlocation(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("city").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;
    str1=str.split("#");   
    document.getElementById("district").value=str1[0];
    document.getElementById("state").value=str1[1];
    document.getElementById("country").value=str1[2];
    document.getElementById("pin").value=str1[3];
    document.getElementById("std").value=str1[4];

    }
  }
xmlhttp.open("GET","ajax_data.php?q="+str,true);
xmlhttp.send();
}

function showtransport(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;
    str1=str.split("#");   
    document.getElementById("distict").value=str1[0];
    document.getElementById("state").value=str1[1];
   

    }
  }
xmlhttp.open("GET","ajax_data.php?p="+str,true);
xmlhttp.send();
}

function showbank(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;
    str1=str.split("#");   
    document.getElementById("distict").value=str1[0];
    document.getElementById("state").value=str1[1];
   

    }
  }
xmlhttp.open("GET","ajax_data.php?r="+str,true);
xmlhttp.send();
}

function showsubject(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;
    str1=str.split("#");   
    document.getElementById("subject").value=str1[0];
    document.getElementById("class").value=str1[1];
   

    }
  }
xmlhttp.open("GET","ajax_data.php?s="+str,true);
xmlhttp.send();
}

function showsubject1(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;
    str1=str.split("#");   
    document.getElementById("subject1").value=str1[0];
    document.getElementById("class1").value=str1[1];
   

    }
  }
xmlhttp.open("GET","ajax_data.php?s="+str,true);
xmlhttp.send();
}


function showsubject2(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;
    str1=str.split("#");   
    document.getElementById("subject2").value=str1[0];
    document.getElementById("class2").value=str1[1];
   

    }
  }
xmlhttp.open("GET","ajax_data.php?s="+str,true);
xmlhttp.send();
}

function showsubject3(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;
    str1=str.split("#");   
    document.getElementById("subject3").value=str1[0];
    document.getElementById("class3").value=str1[1];
   

    }
  }
xmlhttp.open("GET","ajax_data.php?s="+str,true);
xmlhttp.send();
}

function showsubject4(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;
    str1=str.split("#");   
    document.getElementById("subject4").value=str1[0];
    document.getElementById("class4").value=str1[1];
   

    }
  }
xmlhttp.open("GET","ajax_data.php?s="+str,true);
xmlhttp.send();
}


function showpass(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;      
    document.getElementById("pass").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?pass="+str,true);
xmlhttp.send();
}

function showdesignation(str)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    str=xmlhttp.responseText;      
    document.getElementById("designation").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?exe="+str,true);
xmlhttp.send();
}

// show/hide tr in town.php
function show12(str)
{
 if(str=="")
   {
    $("#town").hide();
    $("#ta").hide();
	$("#ta1").hide();
	$("#ta2").hide();
	$("#m").hide();
	$("#m").hide();	
	
	$("#t1").val("");
	$("#t2").val("");
	
	$("#a1").val("");
	$("#a2").val("");
	$("#a3").val("");
	$("#a4").val("");
	$("#a5").val("");
	
	$("#b1").val("");
	$("#b2").val("");
   }
 
 if(str=="town")
   {
    $("#town").show();
    $("#ta").hide();
	$("#ta1").hide();
	$("#ta2").hide();
	$("#m").hide();
	$("#m").hide();	
	
	$("#t1").val("");
	$("#t2").val("");
	
	$("#a1").val("");
	$("#a2").val("");
	$("#a3").val("");
	$("#a4").val("");
	$("#a5").val("");
	
	$("#b1").val("");
	$("#b2").val("");
   }
 if(str=="ta")
   {
    $("#town").hide();
    $("#ta").show();
	$("#ta1").show();
	$("#ta2").show();
	$("#m").hide();
	$("#m").hide();
	
	$("#t1").val("");
	$("#t2").val("");	
	
	$("#a1").val("");
	$("#a2").val("");
	$("#a3").val("");
	$("#a4").val("");
	$("#a5").val("");
	
	$("#b1").val("");
	$("#b2").val("");
   }
   
   if(str=="mode")
   {
    $("#town").hide();
    $("#ta").hide();
	$("#ta1").hide();
	$("#ta2").hide();
	$("#m").show();
	$("#m").show();
	
	$("#t1").val("");
	$("#t2").val("");	
	
	$("#a1").val("");
	$("#a2").val("");
	$("#a3").val("");
	$("#a4").val("");
	$("#a5").val("");
	
	$("#b1").val("");
	$("#b2").val("");
   }
}

</script>

<!--shwo tr-->

</head>
<body>


<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="index.php"> <img src="images/logo_skyland.png" width="558" height="121" alt="" /> </a>
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
        
        <?php 
		/*function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
$vary= curPageURL();*/
		//echo $vary;
		//$ray=explode('?',$vary);
		//print_r($ray[1]);
		?>
        
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
        
        <div id='cssmenu'>
         <?php
        $full_name = $_SERVER['PHP_SELF'];
        $name_array = explode('/',$full_name);
        $count = count($name_array);
        $page_name = $name_array[$count-1];
    ?>
        
<ul>
  
  
      <?php /*?><ul>
	  <li class='active has-sub'></li>
         <li class='has-sub'><a href='#'><span>Product 1</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Product 2</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
      </ul><?php */?>
   </li>
     <?php $page=mysql_query("SELECT * FROM pages WHERE id IN($value)"); 
	  while($row=mysql_fetch_array($page)) 
    {?> 
   <li><a href='<?php echo $row['url']; ?>'><span><?php echo $page_name = $row['page_name']; ?></span></a>
	   <?php  if ($page_name == 'Master')  { ?> 
                <ul>
                <?php  $submenu=mysql_query("SELECT * FROM submenu WHERE page_name = '$page_name' "); 
                   while($submenurow=mysql_fetch_array($submenu))
                    {  ?>  <li><a href='<?php echo $submenurow['link']; ?>'><span><?php echo $submenurow['sub_menu']; ?></span></a></li> <?php } ?>
                </ul>
      <?php } ?> 
	  
	   <?php  if ($page_name == 'Transaction'){ ?> 
              <ul>
               <?php  $submenu=mysql_query("SELECT * FROM submenu WHERE page_name = '$page_name' "); 
                   while($submenurow=mysql_fetch_array($submenu))
                   {  ?> 
                    <li><a href='<?php echo $submenurow['link']; ?>'><span><?php echo $submenurow['sub_menu']; ?></span></a>  </li> 
                    <?php } ?>
              </ul>
      <?php } ?>
	  
      <?php  if ($page_name == 'Setting'){ ?> 
              <ul>
               <?php  $submenu=mysql_query("SELECT * FROM submenu WHERE page_name = '$page_name' "); 
                   while($submenurow=mysql_fetch_array($submenu))
                   {  ?> 
                    <li><a href='<?php echo $submenurow['link']; ?>'><span><?php echo $submenurow['sub_menu']; ?></span></a>  </li> 
                    <?php } ?>
              </ul>
      <?php } ?>
   
   </li>
   <?php } ?>
   
    <?php if($user=='1'){ ?> 
    <li><a href='user_listing.php'><span>Users</span></a>
     <?php }?>
   <li class='last'><a href='#'><span></span></a></li>
  <div style="float:right;"> <a href="?log=out" id="logout"><img src="images/shared/nav/logout.png" width="100" height="40" alt="" /></a></div>
</ul>

</div>
        
 <!------------------------------------------------------navigation------------------------------------------------------>       
        
        
		 
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>