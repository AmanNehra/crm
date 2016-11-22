<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
require_once('config.php');
$result=mysql_query("SELECT * FROM dan_customers WHERE id='$id'") or die(mysql_error());
$row = mysql_fetch_array($result);?>
<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">

<div id="page-heading"><h1>Edit Customer</h1></div>
<a href="customer.php" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>

<form action="cust_edit_submit.php" method="post" enctype="multipart/form-data" id="formid" name="form">
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
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">First Name:</th>
			<td><input type="text" class="inp-form" name="firstname" id="name" value="<?php echo $row['firstname']; ?>" /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Last Name:</th>
			<td><input type="text" class="inp-form" name="lastname" id="lname" value="<?php echo $row['lastname']; ?>" /></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">Contact ID:</th>
			<td><input type="text" class="inp-form" name="contactid" id="cid" value="<?php echo $row['contact_id']; ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $row['email']; ?>" /></td>
			<td></td>
		</tr>
		
        <tr>
			<th valign="top">Phone:</th>
			<td><input type="text" class="inp-form" name="phone" id="phone" maxlength="12" value="<?php echo $row['phone']; ?>" /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" value="<?php echo $row['address']; ?>"  /></td>
			<td></td>
		</tr>
		 <tr>
			<th valign="top">State:</th>
			<td><input type="text" class="inp-form" name="state" id="state" value="<?php echo $row['state']; ?>"  /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Zipcode:</th>
			<td><input type="text" class="inp-form" name="zipcode" id="zipcode" value="<?php echo $row['zipcode']; ?>"  /></td>
			<td></td>
		</tr>
	
	
	
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			
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
	$('#formid').validate(
	{	
		//alert('hello');
		rules:
		{
			"firstname":
			{
				required:true,
			},
			"lastname":
			{
				required:true,
			},
			"contactid":
			{
				required:true,
			},
						
			"email":
			{
				required:true,
				email:true,
				/*remote:ajax_url+'/Home/check_email',*/
			},
			"phone":
			{
				required:true,
				number:true,
			},
			"address":
			{
				required:true,
			},
			"state":
			{
				required:true,
			},
			
			
			"zipcode":
			{
				required:true,
				number:true,
			},
			
			
		},
		messages:
		{
			"firstname":
			{
				required:'This field is required.',
			},
			"lastname":
			{
				required:'This field is required.',
			},
			"contactid":
			{
				required:'This field is required.',
			},
			
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				//remote:'This email already exist'
			},
			"phone":
			{
				required:'This field is required.',
				number:'Please enter a valid phone no.',
			},
			
			"address":
			{
				required:'This field is required.',
				
			},
			"state":
			{
				required:'This field is required.',
				
			},
			"zipcode":
			{
				required:'This field is required.',
				
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>

