<?php include('header.php');?>
<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">

<div id="page-heading"><h1>Add New Customer</h1></div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="add_cut_submit.php" method="post" id="formoid" name="form">
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
			<td><input type="text" class="inp-form" name="firstname" id="fname" /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Last Name:</th>
			<td><input type="text" class="inp-form" name="lastname" id="lname" /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Contact ID:</th>
			<td><input type="text" class="inp-form" name="contactid" id="cid" maxlength="9" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Phone:</th>
			<td><input type="text" class="inp-form" name="phone" id="phone" /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" /></td>
			<td></td>
		</tr>
		
		 
		<tr>
			<th valign="top">State:</th>
			<td><input type="text" class="inp-form" name="state" id="state"  /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Zipcode:</th>
			<td><input type="text" class="inp-form" name="zip" id="zip" maxlength="14" /></td>
			<td></td>
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
 $(document).ready(function(){

   // alert('hello');
	 jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");
//alert('hello');
	
	$('#formoid').validate(
	{	
		//alert('hello');
		rules:
		{
			"firstname":
			{
				required:true,
				/*lettersonly:true,*/
			},
			"lastname":
			{
				required:true,
				/*lettersonly:true,*/
			},
			"contactid":
			{
				required:true,
				number:true,
			},			
			"email":
			{
				required:true,
				email:true,
				/*remote:'check.php',*/
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
			"zip":
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
				/*lettersonly:'Please enter only Letters',*/
			},
			"lastname":
			{
				required:'This field is required.',
				/*lettersonly:'Please enter only Letters',*/
			},
			"contactid":
			{
				required:'This field is required.',
				number:'Please enter only numbers',
			},
						
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				/*remote:'This email already exists',*/
			},
			"phone":
			{
				required:'This field is required.',
				number:'Please enter valid Phone no.',
			},
			"address":
			{
				required:'This field is required.',
			},
			"state":
			{
				required:'This field is required.',
				
			},
			"zip":
			{
				required:'This field is required.',
				number:'Please enter valid Zipcode',
			},
			
			
		}
	});
	
	
	}); 
	</script>
<?php include('footer.php');?>
<script src="js/jquery/jquery.validate.js" type="text/javascript"></script>