<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
require_once('config.php');

if(isset($_POST['submit'])) {
$id = $_POST['id'];

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
//echo'</pre>';print_r($encrypt);die;
$sq=mysql_query("UPDATE member_chain_school_list SET chain_name='$chain_name', member='$member', designation='$designation', address='$address', dob='$dob',mstatus='$mstatus', relation='$relation', city='$city',district='$district', state='$state',country='$country', pin='$pin', std='$std', phone='$phone', email='$email',mobile1='$mobile1', mobile2='$mobile2', date_added='$date' where id='$id'") or die(mysql_error());
//echo'</pre>';print_r($sq);die;
if($sq){
     header('location:member_chain_school_listing.php');
    }
	else{ header('location:master_edit.php?id='.$id);}} 

 
$result=mysql_query("SELECT * FROM member_chain_school_list WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
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
 
<div id="page-heading"><h1>Edit Master</h1></div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="member_chain_school_edit_submit.php" method="post" enctype="multipart/form-data" id="formid" name="form">
<input type="hidden" name="id"  value="<?php echo $row['id']; ?>"/>
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
			<th valign="top">Chain Name:</th>
			<td><input type="text" class="inp-form" name="chain_name" id="chain_name" value="<?php echo $row['chain_name']; ?>" /></td>
			<th valign="top">Member:</th>
			<td><input type="text" class="inp-form" name="member" id="member" value="<?php echo $row['member']; ?>"/></td>
		</tr>
        <tr>
        <th>Designation:</th>
        <td><input type="text" class="inp-form" name="designation" id="designation" value="<?php echo $row['designation']; ?>"/></td>
	
    <th>Adderss:</th>
        <td><input type="text" class="inp-form" name="address" id="address" value="<?php echo $row['address']; ?>" /> </td>
	</tr>
    
		<tr>
			<th valign="top">DOB:</th>
			<td><input type="text" class="inp-form" name="dob" id="popupDatepicker" value="<?php echo $row['dob']; ?>" /></td>
			<th valign="top">M Satus: <?php $mstatus = $row['mstatus'] ;  ?></th>
			<td><select name="mstatus" style="width: 390px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
       
        <option VALUE="married"  <?php if ($mstatus == 'married') { ?> selected="selected" <?php }   ?>>Married</option>
         <option VALUE="unmarried"  <?php if ($mstatus == 'unmarried') { ?> selected="selected" <?php }   ?>>Unmarried</option>
          
           
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
			<td><input type="text" class="inp-form" name="phone" id="phone" value="<?php echo $row['phone']; ?>"/></td>
		</tr>
        
         <tr>
			<th valign="top">Email ID:</th>
			<td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $row['email']; ?>" /></td>
            <th valign="top">Mobile 1:</th>
			<td><input type="text" class="inp-form" name="mobile1" id="mobile1" value="<?php echo $row['mobile1']; ?>"/></td>
			
		</tr>
        
         <tr>
			<th valign="top"></th>
			<td></td>
			<th valign="top">Mobile 2:</th>
			<td><input type="text" class="inp-form" name="mobile2" id="mobile2" value="<?php echo $row['mobile2']; ?>" /></td>
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
	$('#formid').validate(
	{	
		//alert('hello');
		rules:
		{
			"userid":
			{
				required:true
			},
			"gender":
			{
				required:true
			},
			"user_name":
			{
				required:true
			},
			
			"email":
			{
				required:true,
				email:true,
				/*remote:ajax_url+'/Home/check_email',*/
			},
			"password":
			{
				required:true
			},
			"address":
			{
				required:true
			},
			
			"phone":
			{
				required:true,
				number:true
			},
			"user_type":
			{
				required:true,
				number:true
			},
			
			
		},
		messages:
		{
			"userid":
			{
				required:'This field is required.',
			},
			"gender":
			{
				required:'This field is required.',
			},
			
			"user_name":
			{
				required:'This field is required.',
			},
			
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				//remote:'This email already exist'
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
			"user_type":
			{
				required:'This field is required.',
				number:'Please enter a valid User type in digits.'
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>

