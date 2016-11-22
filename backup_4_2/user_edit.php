<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
require_once('config.php');
include_once('function.php');

$result=mysql_query("SELECT * FROM dan_users WHERE id='$id'") or die(mysql_error());
$row = mysql_fetch_array($result);
/*$right=$row['user_rights'];
//if($sizes==''){}else{
$right=unserialize($right);
*/

//for Main menu checkbos list
$main_menu=$row['user_authority'];
$main_menu=unserialize($main_menu);

//End

//For menu item checkbox list
$subpages=$row['subpage'];
$subpages=unserialize($subpages);

//End

?>



<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">

<div id="page-heading"><h1>Edit User</h1></div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="uer_edit_submit.php" method="post" enctype="multipart/form-data" id="formid" name="form">
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
			<th valign="top">User name:</th>
			<td><input type="text" class="inp-form" name="user_name" id="name" value="<?php echo $row['user_name']; ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">User Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $row['user_email']; ?>" /></td>
			<td>
			
			</td>
		</tr>
		
		 
		<tr>
			<th valign="top">Password:</th>
			<td><input type="password" class="inp-form" name="password" id="password" value="<?php echo $row['user_decrypt']; ?>"  /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Phone:</th>
			<td><input type="text" class="inp-form" name="phone" id="phone" maxlength="15" value="<?php echo $row['user_phone']; ?>" /></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" value="<?php echo $row['address']; ?>" /></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">Gender:<?php $gender = $row['gender']; ?></th>
			<td><select name="gender" class="inp-form-select"> 
       <option VALUE="Male" <?php if ($gender =='Male') { ?> selected="selected" <?php } ?>>Male</option>
        <option VALUE="Female" <?php if ($gender =='Female') { ?> selected="selected" <?php } ?>>Female</option>
    </select></td>
			<td></td>
		</tr>
        <tr>
        <th>User Type:<?php $user_type = $row['user_type']; ?></th>
        <td>
         <select name="agent" class="inp-form-select"> 
      <option value="" >Select User Role Type</option>
		 <?php
				$query=mysql_query("SELECT * FROM `dan_users_role_type` where status='Active' order by id asc");
				while($value=mysql_fetch_array($query))
				  {
			  ?>			  
				 <option <?php if($user_type==$value['id']) echo 'selected="selected"'; ?> value="<?php echo $value['id']; ?>"><?php echo $value['rolename']; ?></option>
			  <?php 
				 }   
			  ?>
    </select>
    </td>
	
	</tr>
    <tr>
        <th>User Authority:</th>
        <td>
         
       <?php  $page=mysql_query("SELECT * FROM pages"); 
	   ?>
       <?php while($row=mysql_fetch_array($page)) 
    {?> 
 <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($main_menu,$row['id']); echo $val;?> type="checkbox" name="page[]" value="<?php echo $row['id']; ?>"><span style="padding-right: 20px;"><?php echo $row['page_name']; ?> 
<?php } ?>
       
        </span>
    </td>
	
	</tr>
	
	<tr id="21" style="line-height: 35px;">
	<th valign="top">Master</th>
	  <td>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,21); echo $val;?> type="checkbox" name="subpage[]" value="<?php echo 21; ?>"><span style="padding-right: 20px;">School</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,22); echo $val;?> type="checkbox" name="subpage[]" value="<?php echo 22; ?>"><span style="padding-right: 20px;">Teacher</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,23); echo $val;?> type="checkbox" name="subpage[]" value="<?php echo 23; ?>"><span style="padding-right: 20px;">Corporate</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,24); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 24; ?>"><span style="padding-right: 20px;">Contact</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,25); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 25; ?>"><span style="padding-right: 20px;">Department</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,26); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 26; ?>"><span style="padding-right: 20px;">Chain</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,27); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 27; ?>"><span style="padding-right: 20px;">Member</span>
	  </td>
	</tr>
	
	<tr id="31" style="line-height: 35px;">
	<th valign="top">Transection</th>
	  <td>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,31); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 31; ?>"><span style="padding-right: 20px;">Sampling Listing</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,32); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 32; ?>"><span style="padding-right: 20px;">Commitment</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,33); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 33; ?>"><span style="padding-right: 20px;">Expense</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,34); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 34; ?>"><span style="padding-right: 20px;">Issue</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,35); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 35; ?>"><span style="padding-right: 20px;">Return</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,36); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 36; ?>"><span style="padding-right: 20px;">Tour</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,37); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 37; ?>"><span style="padding-right: 20px;">Workshop</span>
	  </td>
	</tr>
	
	<tr id="41" style="line-height: 35px;">
	<th valign="top">Report</th>
	  <td>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,414); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 414; ?>"><span style="padding-right: 20px;">All Salesman Expense</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,41); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 41; ?>"><span style="padding-right: 20px;">Company Stock</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,42); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 42; ?>"><span style="padding-right: 20px;">Corporate List</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,43); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 43; ?>"><span style="padding-right: 20px;">Daily Report</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,44); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 44; ?>"><span style="padding-right: 20px;">Department Report</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,413); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 413; ?>"><span style="padding-right: 20px;">Expense Report</span><br />
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,45); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 45; ?>"><span style="padding-right: 20px;">Item Report</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,46); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 46; ?>"><span style="padding-right: 20px;">Requirenment Chart</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,47); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 47; ?>"><span style="padding-right: 20px;">Salesman Stationwise</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,48); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 48; ?>"><span style="padding-right: 20px;">Salesman Summary</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,49); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 49; ?>"><span style="padding-right: 20px;">Salesman Expense</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,410); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 410; ?>"><span style="padding-right: 20px;">Strength List</span><br />
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,411); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 411; ?>"><span style="padding-right: 20px;">Teacher List</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,412); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 412; ?>"><span style="padding-right: 20px;">Working Report</span>	  
	  </td>
	</tr>
	
	<tr id="51" style="line-height: 35px;">
	 <th valign="top">Mis</th>
	  <td >
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,51); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 51; ?>"><span style="padding-right: 20px;">Company Master</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,52); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 52; ?>"><span style="padding-right: 20px;">Mailing System</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,53); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 53; ?>"><span style="padding-right: 20px;">Teacher Subject</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,54); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 54; ?>"><span style="padding-right: 20px;">Teacher Transfer</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,55); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 55; ?>"><span style="padding-right: 20px;font-size: 16px;"><b>User</b></span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,56); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 56; ?>"><span style="padding-right: 20px;">Working Area</span>	 
	  </td>
	</tr>
	
	<tr id="61" style="line-height: 35px;">
	<th valign="top">Settings</th>
	  <td>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,61); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 61; ?>"><span style="padding-right: 20px;">Bank Details</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,62); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 62; ?>"><span style="padding-right: 20px;">Board</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,63); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 63; ?>"><span style="padding-right: 20px;">Class</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,64); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 64; ?>"><span style="padding-right: 20px;">Customer Category</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,65); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 65; ?>"><span style="padding-right: 20px;">Department</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,66); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 66; ?>"><span style="padding-right: 20px;">Designation</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,67); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 67; ?>"><span style="padding-right: 20px;">Discount Grade</span>	<br />
	  
	   <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,68); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 68; ?>"><span style="padding-right: 20px;">Expense Entitlement</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,69); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 69; ?>"><span style="padding-right: 20px;">Expense Head</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,610); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 610; ?>"><span style="padding-right: 20px;">Finalised</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,611); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 611; ?>"><span style="padding-right: 20px;">Godown</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,612); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 612; ?>"><span style="padding-right: 20px;">Item Master</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,613); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 613; ?>"><span style="padding-right: 20px;">Location Master</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,614); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 614; ?>"><span style="padding-right: 20px;">Other Designation</span>	<br />
	  
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,615); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 615; ?>"><span style="padding-right: 20px;">PTM</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,616); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 616; ?>"><span style="padding-right: 20px;">Relation</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,617); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 617; ?>"><span style="padding-right: 20px;">Route Details</span>  
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,618); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 618; ?>"><span style="padding-right: 20px;">Saturday Off</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,619); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 619; ?>"><span style="padding-right: 20px;">School Category</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,620); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 620; ?>"><span style="padding-right: 20px;">Series Master</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,621); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 621; ?>"><span style="padding-right: 20px;">Specialisation</span><br />	  
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,622); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 622; ?>"><span style="padding-right: 20px;">Subject Master</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,623); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 623; ?>"><span style="padding-right: 20px;">Submission</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,624); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 624; ?>"><span style="padding-right: 20px;">Transport Details</span>
	  <input style="height: 13px; margin-right:6px;" <?php $val=checkbox($subpages,625); echo $val;?>type="checkbox" name="subpage[]" value="<?php echo 625; ?>"><span style="padding-right: 20px;">Transportation</span>
	  </td>
	</tr>
	
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

