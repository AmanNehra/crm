<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
require_once('config.php'); 
if(isset($_POST['submit'])) {
$id = $_POST['id'];

$code=($_REQUEST['code']);
$category=($_REQUEST['category']);
$name=($_REQUEST['name']);
$name12=($_REQUEST['name12']);
$address=($_REQUEST['address']);
$city=($_REQUEST['city']);
$district=($_REQUEST['district']);
$state=($_REQUEST['state']);
$country=($_REQUEST['country']);
$pin=($_REQUEST['pin']);
$std=($_REQUEST['std']);
$phone1=($_REQUEST['phone1']);
$phone2=($_REQUEST['phone2']);
$fax=($_REQUEST['fax']);
$route=($_REQUEST['route']);
$website=($_REQUEST['website']); 
$email=($_REQUEST['email']);
$tpt=($_REQUEST['tpt']);
$bank=($_REQUEST['bank']);
$dayoff=($_REQUEST['dayoff']);
$grade=($_REQUEST['grade']);
$shoptime=($_REQUEST['shoptime']);
$specialisation1=($_REQUEST['specialisation1']);
$specialisation2=($_REQUEST['specialisation2']);
$specialisation3=($_REQUEST['specialisation3']);
$specialisation4=($_REQUEST['specialisation4']);
$remarks=($_REQUEST['remarks']); 

//echo'</pre>';print_r($encrypt);die;

 
$sq=mysql_query("UPDATE corporate_list SET code='$code', category='$category', name='$name', address='$address', city='$city',district='$district', state='$state', country='$country',pin='$pin', std='$std',phone1='$phone1', phone2='$phone2', fax='$fax', route='$route', website='$website',email='$email', tpt='$tpt', bank='$bank',dayoff='$dayoff',shoptime='$shoptime', specialisation1='$specialisation1', specialisation2='$specialisation2', specialisation3='$specialisation3', specialisation4='$specialisation4',remark='$remarks'  where id='$id'") or die(mysql_error());

$sq=mysql_query("UPDATE corporate_sub SET name='$name' where name='$name12'") or die(mysql_error());
//echo'</pre>';print_r($sq);die;
if($sq){
     header('location:corporate_listing.php');
    }
	else{ header('location:corportae_edit.php?id='.$id);}}


$result=mysql_query("SELECT * FROM corporate_list WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>

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

<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading">
  <h1>Edit Corporate</h1>
</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formid" name="form">
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
			<th valign="top">Code:</th>
			<td><input type="text" class="inp-form" name="code" id="cod" value="<?php echo $row['code']; ?>" /></td>
			<th valign="top">Category:</th>
			<td><select name="category" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $result1=mysql_query("SELECT * FROM school_info_list WHERE category = 'Customer Category' ORDER BY name") or die(mysql_error());
            while ($result12 = mysql_fetch_array($result1))   { ?>
			  <option <?php if($row['category']==$result12['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $result12['name']; ?>"><?php echo $result12['name']; ?></option> 
			<?php } ?>   </select></td>
		</tr>         
    
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name']; ?>" />
            <input type="hidden" class="inp-form" name="name12" id="name12" value="<?php echo $row['name']; ?>" /></td>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" value="<?php echo $row['address']; ?>" /></td>
		</tr>
			
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" value="<?php echo $row['city']; ?>" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" value="<?php echo $row['district']?>" id="district" readonly="readonly"/></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="<?php echo $row['state']?>" id="state" readonly="readonly"/> </td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country"  id="country"value="<?php echo $row['country']?>"  readonly="readonly"/> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" value="<?php echo $row['pin']?>"  id="pin" readonly="readonly"/> </td>
			<th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" value="<?php echo $row['std']?>" id="std"  readonly="readonly"/> </td>
               
		</tr> 
        
        <tr>
			<th valign="top">Phone 1:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone1" id="phone1"  value="<?php echo $row['phone1']; ?>"/></td>
			<th valign="top">Phone 2:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone2" id="phone2" value="<?php echo $row['phone2']; ?>" /></td>
		</tr>
        
         <tr>
			<th valign="top">Fax No:</th>
			<td><input type="text" class="inp-form" name="fax" id="fax" value="<?php echo $row['fax']; ?>" /></td>
			<th valign="top">Route No *:<?php $row['route']; ?></th>
			<td><select name="route" id="pid" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Route No'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['route']==$resultdeg['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
		</tr>
        
         <tr>
			<th valign="top">Website:</th>
			<td><input type="text" class="inp-form" name="website" id="website" value="<?php echo $row['website']; ?>" /></td>
			<th valign="top">Email ID:</th>
			<td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $row['email']; ?>" /></td>
		</tr>
        
        
         <tr>
			<th valign="top">Tpt Details:</th>
			<td>
			<select name="tpt" id="tpt" class="inp-form-select">
			<option  selected="selected" value="">Plz select</option> 
            <?php $resultdesi=mysql_query("SELECT * FROM transport_list") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['tpt']==$resultdeg['name']) echo 'selected="selected"'; ?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select>
			</td>
			<th valign="top">Bank Details:</th>
			<td><input type="text" class="inp-form" name="bank" id="bank" value="<?php echo $row['bank']; ?>" />
			</td>
		</tr>
        
         <tr>
			<th valign="top">Day Off:<?php $row['dayoff']; ?></th>
			<td><select name="dayoff" id="pid" class="inp-form-select">
			<option value="" selected="selected"> Plz Select</option> 
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Saturday Off'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['dayoff']==$resultdeg['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
			<th valign="top">Grade:<?php $row['grade']; ?></th>
			<td><select name="grade" id="pid" class="inp-form-select">
			<option value="" selected="selected"> Plz Select</option> 
      <?php $resultdesi=mysql_query("SELECT * FROM discount_grade_list") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['grade']==$resultdeg['grade']) echo ' selected="selected"' ;?> VALUE="<?php echo $resultdeg['grade']; ?>"><?php echo $resultdeg['grade']; ?></option> 
			<?php } ?>   </select></td>
		</tr>
        
         <tr>
			<th valign="top">Shop Time:</th>
			<td><input type="text" class="inp-form" name="shoptime" id="shoptime" value="<?php echo $row['shoptime']; ?>" /></td>
			<th valign="top">Specialisation1:<?php $row['specialisation1']; ?></th>
			<td><select name="specialisation1" id="pid" class="inp-form-select"> 
			   <option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Specialisation'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['specialisation1']==$resultdeg['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
		</tr>
        
        
         <tr>
			<th valign="top">Specialisation2:<?php $row['specialisation2']; ?></th>
			<td><select name="specialisation2" id="pid" class="inp-form-select">
			    <option value="" selected="selected"> Plz Select</option> 
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Specialisation'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option  <?php if($row['specialisation2']==$resultdeg['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
			<th valign="top">Specialisation3:<?php $row['specialisation3']; ?></th>
			<td><select name="specialisation3" id="pid" class="inp-form-select"> 
			   <option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Specialisation'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['specialisation3']==$resultdeg['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
		</tr> 
        
		<tr>
			<th valign="top">Specialisation4:<?php $row['specialisation4']; ?></th>
			<td valign="top"><select name="specialisation4" id="pid" class="inp-form-select"> 
			  <option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'Specialisation'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['specialisation4']==$resultdeg['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select></td>
			<th valign="top">Remarks:</th>
			<td><textarea class="inp-form" name="remarks" id="remarks" style="height:45px;width:100%" ><?php echo $row['remark']; ?></textarea></td>
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
