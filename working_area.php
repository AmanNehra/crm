<?php include('header.php'); include('function.php'); ?>

<?php 
require_once('config.php');
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die; 
$salesman_id=$_REQUEST['salesman_id'];
$state=$_REQUEST['state'];
$district=$_REQUEST['district'];
$city=$_REQUEST['city'];

$working_city = $city;


$city=serialize($city);

$query=mysql_query("INSERT INTO working_area (salesman_id,state,district,city) VALUES ('$salesman_id','$state','$district','$city')");
if($query)
 {
  $WAID = mysql_insert_id();
  foreach($working_city as $wa)
    {
      $query=mysql_query("INSERT INTO working_area_city (working_area_id,city) VALUES ('$WAID','$wa')");  
    }
  
  header("location:working_area_listring.php");
 }
 

}

  ?>
<!-- start content-outer -->
<script>
 function onchangeajax(pid)
 { 
 //alert ("sunil");
 xmlHttp=GetXmlHttpObject()
 if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 
 var url="location_result.php",
 url=url+"?id="+pid
 url=url+"&sid="+Math.random()
 //alert (url);
 //document.getElementById("statediv").innerHTML='Please wait..<img border="0" src="images/ajax-loader.gif">'
 if(xmlHttp.onreadystatechange=stateChanged)
 {
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 $('#p_school_old1').hide();
  $('#p_school_old2').hide();
   $('#p_school_old').hide();
    $('#p_school_old4').hide();
 return true; 
	
 }
 else
 {
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 return false;
 }
 }
 
 function stateChanged()
 {
 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 document.getElementById("statediv").innerHTML=xmlHttp.responseText
 return true;
 }
 }
 
 function GetXmlHttpObject()
 {
 var objXMLHttp=null
 if (window.XMLHttpRequest)
 {
 objXMLHttp=new XMLHttpRequest()
 }
 else if (window.ActiveXObject)
 {
 objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
 }
 return objXMLHttp;
 }
 
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	
	$("#item1").val("");
    $("#subject1").val("");
    $("#class1").val("");
    
    $("#item2").val("");
    $("#subject2").val("");
    $("#class2").val("");
    
    $("#item3").val("");
    $("#subject3").val("");
    $("#class3").val("");
    
    $("#item4").val("");
    $("#subject4").val("");
    $("#class4").val("");



	
	$("#add").click(function(){
    $("#a1").show();
    $("#b1").show();
    $("#add").hide();    
    });
    $("#remove1").click(function(){
    $("#a1").hide();
    $("#b1").hide();
    $("#add").show();
    
    $("#item1").val("");
    $("#subject1").val("");
    $("#class1").val("");
    
   });
   
   $("#add1").click(function(){
    $("#a2").show();
    $("#b2").show();
    $("#add1").hide();
    });
    $("#remove2").click(function(){
    $("#a2").hide();
    $("#b2").hide();
    $("#add1").show();
    
    $("#item2").val("");
    $("#subject2").val("");
    $("#class2").val("");
   });
   
    $("#add2").click(function(){
    $("#a3").show();
    $("#b3").show();
    $("#add2").hide();
    });
    $("#remove3").click(function(){
    $("#a3").hide();
    $("#b3").hide();
    $("#add2").show();
    
    $("#item3").val("");
    $("#subject3").val("");
    $("#class3").val("");

   });
   
   $("#add3").click(function(){
    $("#a4").show();
    $("#b4").show();
    $("#add3").hide();
    });
    $("#remove4").click(function(){
    $("#a4").hide();
    $("#b4").hide();
    $("#add3").show();
    
    $("#item4").val("");
    $("#subject4").val("");
    $("#class4").val("");

   });



   
});
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});

 $(function() {
$( "#datepicker1" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});

 $(function() {
$( "#datepicker2" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});

</script>

<div id="content-outer">
<!-- start content -->
<div id="content">

<?php if(@($_GET['error'])){?>
<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error:- <?php echo $_GET['error'];?></td>
					
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div><?php } //echo ('<meta http-equiv="refresh" content="0;url=/crm/admin/add_user.php">');?>

<div id="page-heading">
  <h1>Add Salesman working Area </h1>
</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Department:</th>
			<td><select name="department" id="depart" class="inp-form-select" onchange="return onchangedepartment_workingarea(this.value);"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department ");
			    while($value=mysql_fetch_array($query))
			      {			  
			  ?>			  
			     <option <?php if($department==$value['department']) echo 'selected="selected"';  ?> value="<?php echo $value['department']; ?>"><?php  echo $value['department']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td>
			<th valign="top">Salesman name :</th>
			 <td><div id="departmentdiv"><select  class="inp-form-select"  name="salesman_id"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT u.id as id,d.name as name FROM dan_users as u  join department_list as d on u.id=d.user ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($salesman_id==$value['id']) echo 'selected="selected"';  ?>  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
  </div> 
   
        </td>
		</tr>
        <tr>			
			<th valign="top">State:</th>
			<td> <select name="state" id="state" onchange="return show_district(this.value)" class="inp-form-select" required>
			     <option value="" selected="selected"> Plz Select</option> 
                 <?php
			    $query=mysql_query("SELECT DISTINCT(state) FROM location_maste_info_list ORDER BY state");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['state']; ?>"><?php echo $value['state']; ?></option>
			  <?php 
			     }   
              ?>

           
    </select></td>
	<th valign="top">District:</th>
			<td>
			<div id="district">
			 <select name="district" id="district" onchange="return show_city(this.value);"class="inp-form-select">
			     <option value="" selected="selected"> Plz Select</option> 
                 <?php
			    $query=mysql_query("SELECT DISTINCT(district) FROM location_maste_info_list ORDER BY district");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['district']; ?>"><?php echo $value['district']; ?></option>
			  <?php 
			     }   
              ?>

           
    </select>
	</div>
	</td>
		</tr> 
        <tr> 
		 <th valign="top">Select City</th>
		 <td colspan="3"><div id="fill" class="inp-form" style="width:95%; height:auto; padding:15px;display:none;"></div></td>
		</tr> 
		
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>
</form>

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
<script type="text/javascript">           
  $(document).ready(function() {

 //alert('hello');
 jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

	$('#formoid').validate(
	{	
		//alert('hello');
		rules:
		{
			"user_name":
			{
				required:true,
				/*lettersonly:true,*/
				remote:'check.php',
			},
			
			"email12":
			{
				required:true,
				email:true,
				
			},
			"address":
			{
				required:true
			},
			"address":
			{
				required:true
			},
			
			
			"route":
			{
				required:true
				 
			},
						
		},
		messages:
		{
			"user_name":
			{
				required:'This field is required.',
				remote:'Username Already Exists.',
			},
			
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				
			},
			"password":
			{
				required:'This field is required.',
			},
			"address":
			{
				required:'This field is required.',
			},
			
			"phone":
			{
				required:'This field is required.',
				number:'Please enter a valid phone no.'
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>
