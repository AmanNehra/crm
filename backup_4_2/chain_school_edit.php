<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
require_once('config.php');
include_once('function.php');
if(isset($_POST['submit'])) {

$name=strupp($_REQUEST['name']);
$address=strupp($_REQUEST['address']);
$city=($_REQUEST['city']);
$district=($_REQUEST['district']);
$state=($_REQUEST['state']);
$country=($_REQUEST['country']);
$pin=($_REQUEST['pin']);
$std=($_REQUEST['std']);
$phone1=($_REQUEST['phone1']);
$phone2=($_REQUEST['phone2']);
$mobile=($_REQUEST['mobile']); 
$bs_id=$_REQUEST['bs_id'];
$fax=($_REQUEST['fax']);
$school=($_REQUEST['school']);
$web=($_REQUEST['web']);
$email=($_REQUEST['email']);
//echo'</pre>';print_r($encrypt);die; 

$sq=mysql_query("UPDATE chain_school_list SET name='$name', address='$address', city='$city', district='$district', state='$state',country='$country', pin='$pin', std='$district',state='$state', country='$country',pin='$pin', std='$std', phone1='$phone1', phone2='$phone2', mobile='$mobile',bs_id='$bs_id', fax='$fax', school='$school',web='$web', email='$email' where id='$id'") or die(mysql_error());
//echo'</pre>';print_r($sq);die;
if($sq){
     header('location:chain_school_listing.php');
    }
	else{ header('location:chain_school_edit.php?id='.base64_encode(convert_uuencode($id)));}
} 
$result=mysql_query("SELECT * FROM chain_school_list WHERE id= '$id' ") or die(mysql_error());
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
 
<div id="page-heading">
  <h1>Edit Chain School</h1>
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
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name']; ?>" /></td>
			<th valign="top">Address *:</th>
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
			<th valign="top">Phone1:</th>
			<td><input type="text" class="inp-form" name="phone1" id="phone1" value="<?php echo $row['phone1']; ?>"/></td>
			<th valign="top">Phone2:</th>
			<td><input type="text" class="inp-form" name="phone2" id="phone2" value="<?php echo $row['phone2']; ?>"/></td>
		</tr> 
        
         <tr>
			<th valign="top">Mobile:</th>
			<td><input type="text" class="inp-form" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>"/></td>
			<th valign="top">Attach B S :</th>
			<td>
			<select name="bs_id" id="bs_id" class="inp-form-select" > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT id,code,name FROM corporate_list order by name");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['bs_id']==$value['id']) echo ' selected="selected"' ;?> value="<?php echo $value['id']; ?>"><?php echo $value['name']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['code']; ?></option>
			  <?php 
			     }
              ?>
  </select>
			 </td>
		</tr>
        
         <tr>
			<th valign="top">Fax No:</th>
			<td><input type="text" class="inp-form" name="fax" id="fax" value="<?php echo $row['fax']; ?>"/></td>
			<th valign="top">School list:</th>
			<td><input type="text" class="inp-form" name="school" id="school" value="<?php echo $row['school']; ?>"/></td>
		</tr>
        
        
         <tr>
			<th valign="top">Website:</th>
			<td><input type="text" class="inp-form" name="web" id="web" value="<?php echo $row['web']; ?>"/></td>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $row['email']; ?>"/></td>
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

