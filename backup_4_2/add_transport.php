<?php include('header.php');

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$name=trim(strtoupper($_REQUEST['name'])); 
$address=trim(strtoupper($_REQUEST['address']));
$city=trim(strtoupper($_REQUEST['city'])); 
$distict=trim(strtoupper($_REQUEST['distict']));
$state=trim(strtoupper($_REQUEST['state'])); 
$contact=trim(strtoupper($_REQUEST['contact']));
$email=trim(strtoupper($_REQUEST['email'])); 
$remarks=trim(strtoupper($_REQUEST['remarks']));
$date = date('Y-m-d H:i:s'); 

 $query=mysql_query("SELECT name,contact,email FROM  transport_list");
  while($data=mysql_fetch_assoc($query))
    {
     if(($name==$data['name'])|| ($contact==$data['contact']) || ($email==$data['email'] ))

       {
       $f=1;       
       }
    }
  if($f!=1)
   {
    //for inset data	
			    
	$sql=mysql_query("INSERT INTO transport_list (name,address, city, distict, state, contact, email,remarks,date_added) VALUES ('$name','$address', '$city','$distict', '$state','$contact', '$email','$remarks','$date')")or die(mysql_error());
     header('location:transport_details_listing.php'); 
    //end
    }
  else  
    {$error="Data already exist";}

}



?>
<!-- start content-outer -->


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
  <h1>Add New Transport Details</h1>
  <h4 style="color:red" align="center"><?php echo $error;?></h4>

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
        <th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" required/></td>
          <th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" required/></td>   
	   </tr>
       
       <tr>
       
         <th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td> 
             <th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="distict" id="district" value="" readonly="readonly" required/></td>  
	   </tr>
       
       <tr>
       
         <th valign="top">State:</th>
			<td><input type="text" class="inp-form" name="state" id="state" value="" readonly="readonly" required/></td>  
             <th valign="top">Contact No:</th>
			<td><input type="text" class="inp-form" name="contact" id="contact" required /></td> 
	   </tr>
       
       <tr>
        <th valign="top">Remarks </th>
			<td> <input type="text" class="inp-form" name="remarks" id="remarks"  required/></td>
         <th valign="top">Email ID:</th>
			<td><input type="email" multiple class="inp-form" name="email" id="email" required /></td>   
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
