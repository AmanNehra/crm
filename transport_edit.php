<?php $id = convert_uudecode(base64_decode($_GET['id']));



//echo'</pre>';print_r($id);die; 
include('header.php');
if(isset($_POST['submit'])) {
$id = $_POST['id'];
$name=trim(strtoupper($_REQUEST['name'])); 
$address=trim(strtoupper($_REQUEST['address']));
$city=trim(strtoupper($_REQUEST['city'])); 
$distict=trim(strtoupper($_REQUEST['distict']));
$state=trim(strtoupper($_REQUEST['state'])); 
$contact=trim(strtoupper($_REQUEST['contact']));
$email=trim(strtoupper($_REQUEST['email'])); 
$remarks=trim(strtoupper($_REQUEST['remarks']));
$date = date('Y-m-d H:i:s'); 
//function update
function update()
 {  
	$id = $_POST['id'];
	$name=trim(strtoupper($_REQUEST['name'])); 
	$address=trim(strtoupper($_REQUEST['address']));
	$city=trim(strtoupper($_REQUEST['city'])); 
	$distict=trim(strtoupper($_REQUEST['distict']));
	$state=trim(strtoupper($_REQUEST['state'])); 
	$contact=trim(strtoupper($_REQUEST['contact']));
	$email=trim(strtoupper($_REQUEST['email'])); 
	$remarks=trim(strtoupper($_REQUEST['remarks']));
	$date = date('Y-m-d H:i:s'); 

	//echo'</pre>';print_r($encrypt);die;	
	$sq=mysql_query("UPDATE transport_list SET name='$name',address='$address', city='$city',distict='$distict', state='$state', contact='$contact', email='$email',remarks='$remarks',date_added='$date' where id='$id'") or die(mysql_error());
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header('location:transport_details_listing.php');
	    }
		else{ header('location:transport_edit.php?id='.$id);}	 
 }
//end function
$result=mysql_query("SELECT name,contact,email FROM  transport_list WHERE (id= '$id') ") or die(mysql_error());
$data = mysql_fetch_array($result);
if(($name==$data['name']) AND ($contact==$data['contact']) AND ($email==$data['email'] ))
  { echo "hey";
   update();
  }
 else
  {
  $query=mysql_query("SELECT name,contact,email FROM  transport_list WHERE (id!= '$id')");
   while($data=mysql_fetch_assoc($query))
    {
     if(($name==$data['name'])|| ($contact==$data['contact']) || ($email==$data['email'] ))
       {
       $f=1;       
       }
    }
  if($f!=1)
   { 
    update();
	}
	else  
    {$error="Data already exist";}
  }

}



require_once('config.php'); 
$result=mysql_query("SELECT * FROM transport_list WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>



<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading">
  <h1>Edit Transport Details</h1>
  <h4 style="color:red" align="center"><?php echo $error;?></h4>

</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formid" name="form">
<input type="hidden" name="id"  value="<?php echo $row['id']; ?>"/>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft" style="height: 34px"></th>
	<td id="tbl-border-top" style="height: 34px"></td>
	<th class="topright" style="height: 34px"></th>
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
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name']; ?>"  required/></td>
         <th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" value="<?php echo $row['address']; ?>" required /></td>  
	   </tr>
       
       <tr>
       
         <th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" value="<?php echo $row['city']; ?>" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td> 
         <th valign="top">Distict:</th>
			<td><input type="text" class="inp-form" name="distict" id="district" value="<?php echo $row['distict']; ?>" required readonly="readonly"/></td>     
	   </tr>
       
       <tr>
        
         <th valign="top">State:</th>
			<td><input type="text" class="inp-form" name="state" id="state" value="<?php echo $row['state']; ?>" required readonly="readonly"/></td> 
            
          <th valign="top">Contact No:</th>
			<td><input type="text" class="inp-form" name="contact" id="contact" value="<?php echo $row['contact']; ?>" required /></td>     
	   </tr>
       
       <tr>
        <th valign="top">Remarks </th>
			<td> <input type="text" class="inp-form" name="remarks" id="remarks" value="<?php echo $row['remarks']; ?>" required /></td>
         <th valign="top">Email ID:</th>
			<td><input type="email" multiple class="inp-form" name="email" id="email" value="<?php echo $row['email']; ?>" required /></td>   
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

