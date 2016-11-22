<?php 
$id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
$city=($_REQUEST['city']);
if(isset($_POST['submit'])) {
$id = strtoupper($_POST['id']);
$city=trim(strtoupper($_REQUEST['city']));
$district=trim(strtoupper($_REQUEST['district'])); 
$state=trim(strtoupper($_REQUEST['state']));
$country=trim(strtoupper($_REQUEST['country'])); 
$pin=trim(strtoupper($_REQUEST['pin']));
$std=trim(strtoupper($_REQUEST['std'])); 

//updeate function
 function update()
  {
    $id = strtoupper($_POST['id']);
	$city=trim(strtoupper($_REQUEST['city']));
	$district=trim(strtoupper($_REQUEST['district'])); 
	$state=trim(strtoupper($_REQUEST['state']));
	$country=trim(strtoupper($_REQUEST['country'])); 
	$pin=trim(strtoupper($_REQUEST['pin']));
	$std=trim(strtoupper($_REQUEST['std'])); 
	$date = date('Y-m-d H:i:s'); 		 
	$city1=trim(strtoupper($_REQUEST['city1']));
	//echo'</pre>';print_r($encrypt);die;
	
	$sq=mysql_query("UPDATE location_maste_info_list SET city='$city', district='$district', state='$state', country='$country', pin='$pin', std='$std' where id='$id'") or die(mysql_error());
	
   $sq1=mysql_query("UPDATE master_list SET city='$city' where city='$city1'");
   $sq2=mysql_query("UPDATE teacher_master_list SET city='$city' where city='$city1'");
   $sq3=mysql_query("UPDATE corporate_list SET city='$city' where city='$city1'");
   $sq4=mysql_query("UPDATE department_list SET city='$city' where city='$city1'");      
   $sq5=mysql_query("UPDATE chain_school_list SET city='$city' where city='$city1'");
   $sq6=mysql_query("UPDATE miscompanymaster SET city='$city' where city='$city1'");
   $sq7=mysql_query("UPDATE issue_voucher SET city='$city' where city='$city1'");
   $sq8=mysql_query("UPDATE return_voucher SET city='$city' where city='$city1'");
   $sq9=mysql_query("UPDATE tour_detail SET city='$city' where city='$city1'");
   $sq10=mysql_query("UPDATE expense SET source='$city' where source='$city1'");
   $sq11=mysql_query("UPDATE expense SET destination='$city' where destination='$city1'");                           
   $sq12=mysql_query("UPDATE bank_details_list SET city='$city' where city='$city1'");   
	
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header('location:location_master_info_listing.php');
	    }
		else{ header('location:location_master_info_edit.php?id='.$id);}

  
  } 
//end function
    $result=mysql_query("SELECT * FROM  location_maste_info_list WHERE id= '$id' ") or die(mysql_error());
	$row = mysql_fetch_array($result);
	if(($city==$row['city']) AND ($district==$row['district']) AND ($state==$row['state']) AND ($pin==$row['pin']))	  { 
	   update();
	  }
	 else
	  {
	  $query=mysql_query("SELECT * FROM  location_maste_info_list WHERE id!='$id'");
	   while($data=mysql_fetch_assoc($query))
	    {
	     if(($city==$data['city']) AND ($district==$data['district']) AND ($state==$data['state']) AND ($pin==$data['pin']))	       {
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
$result=mysql_query("SELECT * FROM location_maste_info_list WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>



<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading"><h1>Edit Location Master Information</h1>
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
	<th class="topleft" style="height: 38px"></th>
	<td id="tbl-border-top" style="height: 38px"></td>
	<th class="topright" style="height: 38px"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form"> 
        <tr>
        <!--Auto fill form field aftere select item in dropdown list-->
        <th valign="top">City:</th>
			<td>
			   <input type="text" name="city" class="inp-form" id="city" value="<?php echo $row['city'] ;  ?>" required/>
			         
			<input type="hidden" class="inp-form" name="city1" id="city1" value="<?php echo $row['city'] ;  ?>"/></td>
			
			<!--End dropdown-->
         <th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" id="district" value="<?php echo $row['district'] ;  ?>" required/></td>   
	   </tr>
    <tr>
        <th valign="top">State:</th>
			<td><input type="text" class="inp-form" name="state" id="state" value="<?php echo $row['state'] ;  ?>" required/></td>
         <th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country" id="country" value="<?php echo $row['country'] ;  ?>" required/></td>   
	   </tr>
        <tr>
        <th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" id="pin" value="<?php echo $row['pin'] ;  ?>" pattern="^[1-9][0-9]{5}$" required
title="A six digit number that doesn't begin with zero."/></td>
         <th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" id="std" value="<?php echo $row['std'] ;  ?>"required/></td>   
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

