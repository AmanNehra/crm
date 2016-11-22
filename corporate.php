<?php include('header.php');
include('function.php');
$id = convert_uudecode(base64_decode($_REQUEST['id']));
if(isset($_POST['submit'])) {

$code=strupp($_REQUEST['code']);
$category=strupp($_REQUEST['category']);
$name=strupp($_REQUEST['name']);
$address=strupp($_REQUEST['address']);
$city=strupp($_REQUEST['city']);
$district=strupp($_REQUEST['district']);
$state=strupp($_REQUEST['state']);
$country=strupp($_REQUEST['country']);
$pin=strupp($_REQUEST['pin']);
$std=strupp($_REQUEST['std']);
$phone1=strupp($_REQUEST['phone1']);
$phone2=strupp($_REQUEST['phone2']);
$fax=strupp($_REQUEST['fax']);
$route=strupp($_REQUEST['route']);
$website=strupp($_REQUEST['website']);
$email=strupp($_REQUEST['email']); 
$tpt=strupp($_REQUEST['tpt']);
$bank=strupp($_REQUEST['bank']);
$dayoff=strupp($_REQUEST['dayoff']);
$grade=strupp($_REQUEST['grade']);
$shoptime=strupp($_REQUEST['shoptime']);
$specialisation1=($_REQUEST['specialisation1']);
$specialisation2=($_REQUEST['specialisation2']);
$specialisation3=($_REQUEST['specialisation3']);
$specialisation4=($_REQUEST['specialisation4']); 
$remark=($_REQUEST['remarks']);
$date = date('Y-m-d H:i:s'); 
 
$query=mysql_query("SELECT code FROM  corporate_list");
  while($data=mysql_fetch_assoc($query))
    {
     if($code==$data['code'])
       {
       $f=1;       
       }
    }
  if($f!=1)
   { 
 
$sql=mysql_query("INSERT INTO corporate_list (code, category, name, address, city, district, state, country,pin, std, phone1, phone2, fax, route,website,email,tpt, bank, dayoff, shoptime, specialisation1, specialisation2, specialisation3, specialisation4,	remark, date_added) VALUES ('$code', '$category', '$name', '$address', '$city', '$district','$state', '$country','$pin','$std', '$phone1', '$phone2', '$fax', '$route', '$website','$email', '$tpt', '$bank', '$dayoff', '$shoptime','$specialisation1', '$specialisation2', '$specialisation3', '$specialisation4', '$remark','$date')")or die(mysql_error());
     header('location:corporate_listing.php'); 
  }
   else  
    {$error="Data already exist";}
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
  <h1>Add New Corporate</h1>
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
	
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Code:</th>
			<td><input type="text" class="inp-form" name="code" id="cod" value=""  required/></td>
			<th valign="top">Category:</th>
			<td> <select name="category" class="inp-form-select">
			<option value="" selected="selected"> Plz Select</option> 
      <?php $result1=mysql_query("SELECT * FROM school_info_list WHERE category = 'Customer Category' ORDER BY name") or die(mysql_error());
            while ($result12 = mysql_fetch_array($result1))   { ?>
			  <option  VALUE="<?php echo $result12['name']; ?>"><?php echo $result12['name']; ?></option> 
			<?php } ?>   </select>				</td>
		</tr> 
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="" required/></td>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" value="" required/></td>
		</tr>		
     
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" value="" id="district" readonly="readonly"/></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="" id="state" readonly="readonly"/></td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country"  id="country"value=""  readonly="readonly"/> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" value=""  id="pin" readonly="readonly"/> </td>
			<th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" value="" id="std"  readonly="readonly"/> </td>
		</tr>        
        <tr>
			<th valign="top">Phone1:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone1" id="phone1"  value=""/></td>
			<th valign="top">Phone2:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone2" id="phone2" value="" /></td>
		</tr>
        
         <tr>
			<th valign="top">Fax No:</th>
			<td><input type="text" class="inp-form" name="fax" id="fax" value="" /></td>
			<th valign="top">Route No *:</th>
			<td><select name="route" id="pid" class="inp-form-select">
			<option value="" selected="selected"> Plz Select</option> 
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Route No'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
		</tr>
        
         <tr>
			<th valign="top">Website:</th>
			<td><input type="text" class="inp-form" name="website" id="website" value="" /></td>
			<th valign="top">Email ID:</th>
			<td><input type="email" class="inp-form" name="email" id="email" value="" /></td>
		</tr>
        
        
         <tr>
			<th valign="top">Tpt Details:</th>
			<td>
			<select name="tpt" id="tpt" class="inp-form-select">
			<option selected="selected" value="">Plz select</option> 
      <?php $resultdesi=mysql_query("SELECT * FROM transport_list") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select>			</td>
			<th valign="top">Bank Details:</th>
			<td><input type="text" class="inp-form" name="bank" id="bank" value="" />
			</td>
		</tr>
        
         <tr>
			<th valign="top">Day Off:</th>
			<td><select name="dayoff" id="pid" class="inp-form-select">
			<option value="" selected="selected"> Plz Select</option> 
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Saturday Off'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
			<th valign="top">Grade:</th>
			<td><select name="grade" id="pid" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM discount_grade_list") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['grade']; ?>"><?php echo $resultdeg['grade']; ?></option> 
			<?php } ?>   </select></td>
		</tr> 
        
         <tr>
			<th valign="top">Shop Time:</th>
			<td><input type="text" class="inp-form" name="shoptime" id="shoptime" value="" /></td>
			<th valign="top">Specialisation1:</th>
			<td><select name="specialisation1" id="pid" class="inp-form-select">
			<option value="" selected="selected"> Plz Select</option> 
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'SPECIALISATION'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
		</tr>
        
        
         <tr>
			<th valign="top">Specialisation2:</th>
			<td><select name="specialisation2" id="pid" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'SPECIALISATION'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
			<th valign="top">Specialisation3:</th>
			<td><select name="specialisation3" id="pid" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'SPECIALISATION'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
		</tr>
        
         <tr>
			<th valign="top">Specialisation4:</th>
			<td valign="top"><select name="specialisation4" id="pid" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'SPECIALISATION'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
			<th valign="top">Remarks:</th>
			<td ><textarea class="inp-form" name="remarks" id="remarks" style="height:45px;" ></textarea></td>
		</tr> 
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />		</td>
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
