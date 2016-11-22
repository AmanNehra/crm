<?php include('header.php');

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$chain_name=($_REQUEST['chain_name']);
$member=($_REQUEST['member']);
$designation=($_REQUEST['designation']);
$address=($_REQUEST['address']);
$dob=($_REQUEST['dob']);
$mstatus=($_REQUEST['mstatus']);
$relation=($_REQUEST['relation']);
$city=($_REQUEST['city']);
$district=($_REQUEST['district']);
$state=($_REQUEST['state']);
$country=($_REQUEST['country']);
$pin=($_REQUEST['pin']);
$std=($_REQUEST['std']);
$phone=($_REQUEST['phone']);
$email=($_REQUEST['email']);
$mobile1=($_REQUEST['mobile1']); 
$mobile2=($_REQUEST['mobile2']); 
$date = date('Y-m-d H:i:s'); 
 
$sql=mysql_query("INSERT INTO member_chain_school_list (chain_name, member, designation, address, dob, mstatus, relation,city, district, state, country, pin, std,phone,email,mobile1, mobile2,date_added) VALUES ('$chain_name', '$member', '$designation', '$address', '$dob','$mstatus', '$relation','$city','$district', '$state', '$country', '$pin', '$std', '$phone','$email','$mobile1', '$mobile2', '$date')")or die(mysql_error());
     header('location:member_chain_school_listing.php'); 
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
<?php if($user!='1'){header('location:index.php');}?>
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
  <h1>Add New Member Chain School</h1>
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
			<th valign="top">Chain Name:</th>
			<td><input type="text" class="inp-form" name="chain_name" id="chain_name" /></td>
			<th valign="top">Member:</th>
			<td><input type="text" class="inp-form" name="member" id="member" /></td>
		</tr>
        <tr>
        <th>Designation:</th>
        <td><input type="text" class="inp-form" name="designation" id="designation" /></td>
	
    <th>Adderss:</th>
        <td><input type="text" class="inp-form" name="address" id="address" /> </td>
	</tr>
    
		<tr>
			<th valign="top">DOB:</th>
			<td><input type="text" class="inp-form" name="dob" id="popupDatepicker" /></td>
			<th valign="top">M Satus:</th>
			<td><select name="mstatus" style="width: 390px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
       <option VALUE="#" selected="selected">Select M Satus</option>
        <option VALUE="married">Married</option>
         <option VALUE="unmarried">Unmarried</option>
          
           
    </select></td>
		</tr> 
        
        <tr>
			<td colspan="4"> <div id="statediv"></div></td>
		</tr>
     
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			<td> <select name="city12" id="pid" style="width: 390px;;border: 1px solid;height: 30px;border-radius: 4px;" onchange="return onchangeajax(this.value);"> 
      <?php $resultcity=mysql_query("SELECT * FROM location_maste_info_list") or die(mysql_error());
            while ($resultcty = mysql_fetch_array($resultcity))   { ?>
			  <option VALUE="<?php echo $resultcty['id']; ?>"><?php echo $resultcty['city']; ?></option> 
			<?php } ?>   </select></td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district12" value="<?php echo $row['district']; ?>" /></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state12" value="<?php echo $row['state']; ?>" /> </td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country12" value="<?php echo $row['country']; ?>" /> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin12" value="<?php echo $row['pin']; ?>" /> </td>
			<th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std12" value="<?php echo $row['std']; ?>" /> </td>
               
		</tr>
        
        <tr>
			<th valign="top">Relation:</th>
			<td><select name="relation" id="pid" style="width: 390px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Relation'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
			<th valign="top">Phone:</th>
			<td><input type="text" class="inp-form" name="phone" id="phone" /></td>
		</tr>
        
         <tr>
			<th valign="top">Email ID:</th>
			<td><input type="text" class="inp-form" name="email" id="email" /></td>
            <th valign="top">Mobile 1:</th>
			<td><input type="text" class="inp-form" name="mobile1" id="mobile1" /></td>
			
		</tr>
        
         <tr>
			<th valign="top"></th>
			<td></td>
			<th valign="top">Mobile 2:</th>
			<td><input type="text" class="inp-form" name="mobile2" id="mobile2" /></td>
		</tr>
        
    
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
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
