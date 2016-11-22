<?php include('header.php');
ini_set('display_errors', 1);
$id=convert_uudecode(base64_decode($_REQUEST['id']));
include('function.php');
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$code=trim(strtoupper($_REQUEST['code']));
$name=trim(strtoupper($_REQUEST['name']));
$address=trim(strtoupper($_REQUEST['address']));
$city=trim(strtoupper($_REQUEST['city']));
$district=trim(strtoupper($_REQUEST['district']));
$state=trim(strtoupper($_REQUEST['state']));
$country=trim(strtoupper($_REQUEST['country']));
$pin=trim(strtoupper($_REQUEST['pin']));
$std=trim(strtoupper($_REQUEST['std']));
$phone1=trim(strtoupper($_REQUEST['phone1']));
$phone2=trim(strtoupper($_REQUEST['phone2']));
$mobile1=trim(strtoupper($_REQUEST['mobile1']));
$mobile2=trim(strtoupper($_REQUEST['mobile2']));
$fax1=trim(strtoupper($_REQUEST['fax1']));
$fax2=trim(strtoupper($_REQUEST['fax2']));
$web=strtoupper($_REQUEST['web']);
$email=strtoupper($_REQUEST['email']);
$remarks=strtoupper($_REQUEST['remarks']);
				   				
   $sql=mysql_query("UPDATE misCompanyMaster SET name='$name',address='$address',city='$city',district='$district',state='$state',country='$country',pin='$pin',std='$std',phone1='$phone1',phone2='$phone2',mobile1='$mobile1',mobile2='$mobile2',fax1='$fax1',fax2='$fax2',web='$web',email='$email',remarks='$remarks' WHERE id='$id'");
   if($sql)
      header('location:company_mis_listing.php');   

}
$query=mysql_query("SELECT * FROM `misCompanyMaster` WHERE id='$id'");
$row=mysql_fetch_array($query);

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
  <h1>Add New Company MIS</h1>
</div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

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
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name']; ?>" required /></td>
			<th valign="top">Address:</th>
			 <td><input type="text" class="inp-form" name="address" id="address" value="<?php echo $row['address']; ?>" required/>
    </td>
		</tr>        
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" value="<?php echo $row['city']; ?>" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" id="district" value="<?php echo $row['district']; ?>" readonly="readonly"/></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="<?php echo $row['state']; ?>" id="state" readonly="readonly"/> </td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country"  id="country"value="<?php echo $row['country']; ?>" readonly="readonly"/> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" value="<?php echo $row['pin']; ?>"  id="pin" readonly="readonly"/> </td>
			<th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" value="<?php echo $row['std']; ?>" id="std"  readonly="readonly"/> </td>
               
		</tr>
      
        <tr>
			<th valign="top">Phone 1:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone1" value="<?php echo $row['phone1']; ?>" id="phone1"  required/></td>
			<th valign="top">Phone 2:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone2" value="<?php echo $row['phone2']; ?>" id="phone2"  /></td>
		</tr>
        
         <tr>
			<th valign="top">Mobile 1:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="mobile1" value="<?php echo $row['mobile1']; ?>" id="mobile"  /></td>
			<th valign="top">Mobile 2:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="mobile2" value="<?php echo $row['mobile2']; ?>" id="mobile"  /></td>
		</tr>
        
         <tr>
			<th valign="top">Fax No1:</th>
			<td><input type="text" class="inp-form" name="fax1" value="<?php echo $row['fax1']; ?>" id="fax" /></td>
			<th valign="top">Fax No2:</th>
			<td><input type="text" class="inp-form" name="fax2" value="<?php echo $row['fax2']; ?>" id="fax" /></td>
         </tr>
        
        
         <tr>
			<th valign="top">Website:</th>
			<td><input type="url" class="inp-form" name="web" value="<?php echo $row['web']; ?>" id="web"  /></td>
			<th valign="top">Email:</th>
			<td><input type="email" class="inp-form" name="email" value="<?php echo $row['email']; ?>" id="email" multiple /></td>
		</tr>
        <tr>
		<tr>
		<th valign="top">Remarks</th>
		<td colspan="3"><textarea class="inp-form" style="height:40px; width:99%" name="remarks" ><?php echo $row['remarks']; ?></textarea></td>			
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
