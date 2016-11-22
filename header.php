<?php 
session_start();
ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
require_once('config.php');
$userid=$_SESSION['SESS_id'];
date_default_timezone_set("Asia/Kolkata"); 
 
if(empty($userid)){header('location:login.php');}
 $var=$_SESSION['SESS_id'];

 $data=mysql_query("SELECT dan_users.*,department_list.id FROM dan_users INNER JOIN department_list ON dan_users.id='$var' AND department_list.user='$var'") or die(mysql_error());
 $r = mysql_fetch_array($data);

$user=$r['user_type'];
$_SESSION['user_type']=$user;
$usname=$r['user_name'];
$subpage=$r['subpage'];
$salesman_id=$r['id'];

$subpage=unserialize($subpage);

//For store data of page number which show
foreach($subpage as $s) 
$subpages.=$s.',';
$subpages=rtrim($subpages,",");//For remove last coma
//End

//For stroe state, district, city name of woring of salesman
$query121=mysql_query("SELECT * FROM `working_area` WHERE salesman_id='$salesman_id'") or die(mysql_error());
while($data121=mysql_fetch_assoc($query121)){
$working_state.="'".$data121['state']."',";//for add single cote in string.
$working_district.="'".$data121['district']."',";//for add single cote in string.
$working_city=$data121['city'];
$working_city=unserialize($working_city);
foreach($working_city as $v) 
$working_area.="'".$v."',";//for add single cote in string.
}
$working_area=rtrim($working_area,",");//For remove last coma
$working_state=rtrim($working_state,",");//For remove last coma
$working_district=rtrim($working_district,",");//For remove last coma
//End

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
<title>Mascot Education Pvt. Ltd.</title>

<link rel="shortcut icon" type="image/png" href="images/login-page-img/logo.png"/>
<link rel="icon"  type="image/png"   href="images/login-page-img/logo.png">
<link rel="stylesheet" href="css/screen11.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/css.css" type="text/css" />
 <!--<link rel="stylesheet" href="stylesmenu.css">-->
 
 <!--tab css-->
<link rel="stylesheet" href="css/css-for-inner-page/stylesmenu-inner-page.css">
<!--Tab css-->
 
 <!--main css-->
<link href="css/css-for-inner-page/crm-home-two.css" rel="stylesheet" type="text/css" />
<!--main css-->
 
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <script src="jscript.js"></script>
   
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
 
  
<!--Date Picker-->	
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
changeYear: true });
$( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
changeYear: true });
$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
changeYear: true });
$( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
changeYear: true });
});
</script>  
<!--End Date Picker-->

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
	$("#fill").hide();
    str=xmlhttp.responseText;
    str1=str.split("#");
	document.getElementById("city").value=str1[0];   
    document.getElementById("district").value=str1[1];
    document.getElementById("state").value=str1[2];
    document.getElementById("country").value=str1[3];
    document.getElementById("pin").value=str1[4];
    document.getElementById("std").value=str1[5];

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

function showsubject5(str)
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
    document.getElementById("subject5").value=str1[0];
    document.getElementById("class5").value=str1[1];
   

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

function showtouradvance(str)
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
    document.getElementById("advance_bal").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?advance_bal="+str,true);
xmlhttp.send();
}

function showlocalda(str)
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
    //alert(str);  
    document.getElementById("a3").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?local_da="+str,true);
xmlhttp.send();
}

function showboardinglodging(str)
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
    //alert(str);  
    document.getElementById("a4").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?boarding_lodging="+str,true);
xmlhttp.send();
}

function showbreakfast(str)
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
    //alert(str);  
    document.getElementById("a5").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?breakfast="+str,true);
xmlhttp.send();
}

function showlunch(str)
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
    //alert(str);  
    document.getElementById("a25").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?lunch="+str,true);
xmlhttp.send();
}

function showdinner(str)
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
    //alert(str);  
    document.getElementById("a26").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?dinner="+str,true);
xmlhttp.send();
}


function showtelephone(str)
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
    //alert(str);  
    document.getElementById("a6").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?telephone="+str,true);
xmlhttp.send();
}

function showstationery(str)
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
    //alert(str);  
    document.getElementById("a7").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?stationery="+str,true);
xmlhttp.send();
}

function showxerox(str)
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
    //alert(str);  
    document.getElementById("a8").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?xerox="+str,true);
xmlhttp.send();
}

function showcourier_charges(str)
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
    //alert(str);  
    document.getElementById("a9").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?courier_charges="+str,true);
xmlhttp.send();
}

function showinternet_charges(str)
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
    //alert(str);  
    document.getElementById("a10").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?internet_charges="+str,true);
xmlhttp.send();
}

function showothers(str)
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
    //alert(str);  
    document.getElementById("a13").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?others="+str,true);
xmlhttp.send();
}

function showtransport_buulty_charge(str)
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
    //alert(str);  
    document.getElementById("a14").value=str;  

    }
  }
xmlhttp.open("GET","ajax_data.php?transport_buulty_charge="+str,true);
xmlhttp.send();
}



// show/hide tr in town.php
function show12(str)
{
 if($("#designation").val()=="")
   {
    alert("Please select Executive Name");
	$("#exe").focus();
  }   
 else
 {
 if(str=="")
   {
    $("#d11").hide();
    $("#d12").hide();
	
	$("#d21").hide();
    $("#d22").hide();
	
	$("#d31").hide();
    $("#d32").hide();
	
	$("#d41").hide();
    $("#d42").hide();
	$("#d43").hide();
    $("#d44").hide();
	$("#d45").hide();
   }
 
 if(str=="town")
   {
    $("#d11").show();
	$("#d12").show();
	
    $("#d21").hide();
	$("#d22").hide();
	$("#d23").hide();
	
	$("#d31").hide();
    $("#d32").hide();
	
	$("#d41").hide();
    $("#d42").hide();
	$("#d43").hide();
    $("#d44").hide();
	$("#d45").hide();
	
	$("#t1").val("");
	$("#t2").val("");	
   }
 if(str=="ta")
   {    
      var desig=$("#designation").val();	  	  
      $.ajax({
	  url:"transport_result.php",
	  type: "POST",
	  data: "desig="+desig,
	  success:function(result){	  
	  var val=result.split("#");
	  
	  $("#a3").val(val[0]);
	  $("#a4").val(val[1]);
	  $("#a5").val(val[2]);    
		
	  }});
    
    $("#d11").hide();
	$("#d12").hide();
	
    $("#d21").hide();
	$("#d22").hide();
	$("#d23").hide();
	
	$("#d31").show();
    $("#d32").show();
	
	$("#d41").hide();
    $("#d42").hide();
	$("#d43").hide();
    $("#d44").hide();
	$("#d45").hide();
 }
   
   if(str=="mode")
   {  
    $("#trans").show();
      
    $("#d11").hide();
	$("#d12").hide();
	
    $("#d21").show();
	$("#d22").show();
	$("#d23").show();
	
	$("#d31").hide();
    $("#d32").hide();
	
	$("#d41").hide();
    $("#d42").hide();
	$("#d43").hide();
    $("#d44").hide();
	$("#d45").hide();
   }
 if(str=="others")
   {
    $("#d11").hide();
	$("#d12").hide();
	
    $("#d21").hide();
	$("#d22").hide();
	$("#d23").hide();
	
	$("#d31").hide();
    $("#d32").hide();
	
	$("#d41").show();
    $("#d42").show();
	$("#d43").show();
    $("#d44").show();
	$("#d45").show();
  }  
 }
} 

function show13(str)
{
      var desig=$("#designation").val();
	  var datepicker=$("#datepicker").val();
	  var advance_bal=$("#advance_bal").val();	  	  	  
      $.ajax({
	  url:"transport_result.php",
	  type: "POST",
	  data: "desig="+desig+"&datepicker="+datepicker+"&advance_bal="+advance_bal,
	  success:function(result){	  
	  var val=result.split("#");
	  
	  $("#a3").val(val[0]);
	  $("#a4").val(val[1]);
	  $("#a5").val(val[2]);
	  $("#a15").val(val[3]);	  	  	      
	  $("#a25").val(val[4]);
	  $("#a26").val(val[5]);
	  $("#a6").val(val[6]);
	  $("#a7").val(val[7]);
	  $("#a8").val(val[8]);
	  $("#a9").val(val[9]);
	  $("#a10").val(val[10]);
	  $("#a14").val(val[11]);
	  $("#a13").val(val[12]);	  	  	  	  	  	  	  	  	  		
	  }});
	  sum3(5);
}


function show14(str)
{ 
 if($("#tr11").val()=="")
  {
    $("#unit").val("");
   alert("Please Select Mode of Transport");
  
  }
 else {
 var str=$("#km").val();	
 var desig1=$("#designation").val();
 var head=$("#tr11").val();
 var datepicker=$("#datepicker").val();
  $.ajax({
  url:"transport_result.php",
  type: "POST",
  data: "head="+head+"&desig1="+desig1+"&datepicker="+datepicker,
  success:function(result){ 	 
  var total=result*str;
  $("#amount").val(total); 
  }}); 
 
 
 }
}
</script>

<!--shwo tr-->

</head>
<body>


<div id="wrapper-for-inner-page">


<!--Header-->
<div class="header-main">
<div class="header">
<div class="header-left"><img src="images/login-page-img/logo.png" alt="Mascot Education Pvt. Ltd." title="Mascot Education Pvt. Ltd." /></div>
<div class="header-middle"><img src="images/login-page-img/crm-mascot.png" alt="Mascot Education Pvt. Ltd." title="Mascot Education Pvt. Ltd." /></div>
<div class="header-right"><img src="images/login-page-img/crm.png" alt="Mascot Education Pvt. Ltd." title="Mascot Education Pvt. Ltd." /></div>
</div>
</div>
<!--Header End-->




	
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
        
          <div class="menu-main">
      
        
		<!-- start nav-right -->
		<div id="nav-right">
<div style="float:right; margin:0px 20px 0 0; z-index:999;"> <a href="?log=out" id="logout"><img src="images/login-page-images/logout.png" alt="Log Out" title="Log Out" /></a></div>
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
        
        
        <div class="menu">
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
    
     <?php $page=mysql_query("SELECT * FROM pages WHERE id IN($value)"); 
	  while($row=mysql_fetch_array($page)) 
    {?> 
   <li><a href='<?php echo $row['url']; ?>'><span><?php echo $page_name = $row['page_name']; ?></span></a>
	   <?php  if ($page_name == 'Master')  { ?> 
                <ul>
                <?php  $submenu=mysql_query("SELECT * FROM submenu WHERE page_name = '$page_name' AND page_no IN($subpages)  "); 
                   while($submenurow=mysql_fetch_array($submenu))
                    {  ?>  <li><a href='<?php echo $submenurow['link']; ?>'><span><?php echo $submenurow['sub_menu']; ?></span></a></li> <?php } ?>
                </ul>
      <?php } ?> 
	  
	   <?php  if ($page_name == 'Transaction'){ ?> 
              <ul>
               <?php  $submenu=mysql_query("SELECT * FROM submenu WHERE page_name = '$page_name' AND page_no IN($subpages) ORDER BY sub_menu "); 
                   while($submenurow=mysql_fetch_array($submenu))
                   {  ?> 
                    <li><a href='<?php echo $submenurow['link']; ?>'><span><?php echo $submenurow['sub_menu']; ?></span></a>  </li> 
                    <?php } ?>
              </ul>
      <?php } ?>
	  
	  <?php  if ($page_name == 'Report'){ ?> 
              <ul>
               <?php  $submenu=mysql_query("SELECT * FROM submenu WHERE page_name = '$page_name' AND page_no IN($subpages) ORDER BY sub_menu "); 
                   while($submenurow=mysql_fetch_array($submenu))
                   {  ?> 
                    <li><a href='<?php echo $submenurow['link']; ?>'><span><?php echo $submenurow['sub_menu']; ?></span></a>  </li> 
                    <?php } ?>
              </ul>
      <?php } ?>
	  
      <?php  if ($page_name == 'Setting'){ ?> 
              <ul>
               <?php  $submenu=mysql_query("SELECT * FROM submenu WHERE page_name = '$page_name' AND page_no IN($subpages) ORDER BY sub_menu "); 
                   while($submenurow=mysql_fetch_array($submenu))
                   {  ?> 
                    <li><a href='<?php echo $submenurow['link']; ?>'><span><?php echo $submenurow['sub_menu']; ?></span></a>  </li> 
                    <?php } ?>
              </ul>
      <?php } ?>
	  
	  <?php  if ($page_name == 'MIS'){ ?> 
              <ul>
               <?php  $submenu=mysql_query("SELECT * FROM submenu WHERE page_name = '$page_name' AND page_no IN($subpages) ORDER BY sub_menu "); 
                   while($submenurow=mysql_fetch_array($submenu))
                   {  ?> 
                    <li><a href='<?php echo $submenurow['link']; ?>'><span><?php echo $submenurow['sub_menu']; ?></span></a>  </li> 
                    <?php } ?>
              </ul>
      <?php } ?>
   
   </li>
   <?php } ?>
   
   
   <!--<li class='last'><a href='#'><span></span></a></li>-->
  
  
  
</ul>

</div>

</div> 
</div>  
 <!------------------------------------------------------navigation------------------------------------------------------>       
        
        
		 
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>