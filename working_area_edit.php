<?php 
include('header.php');
include('function.php');
require_once('config.php');
$id=convert_uudecode(base64_decode($_REQUEST['id']));
$salesman_id=convert_uudecode(base64_decode($_REQUEST['salesman_id']));


if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die; 
$salesman_id=$_REQUEST['salesman_id'];
$state=$_REQUEST['state'];
$district=$_REQUEST['district'];
$city=$_REQUEST['city'];

$working_city = $city;

$city=serialize($city);

$query=mysql_query("UPDATE working_area SET salesman_id='$salesman_id',state='$state',district='$district',city='$city'  WHERE id='$id'") or die(mysql_error());
if($query)
  {
    $query=mysql_query("DELETE FROM working_area_city WHERE working_area_id = '$id'");
    foreach($working_city as $wa)
    {
      $query=mysql_query("INSERT INTO working_area_city (working_area_id,city) VALUES ('$id','$wa')");  
    }
    header("location:working_area_listring.php");
  }
  

}
$query="SELECT * FROM department_list WHERE `user`='$salesman_id'";
$query=mysql_query($query) or die(mysql_error());
$rowsalesman=mysql_fetch_assoc($query);
$department=$rowsalesman['department'];
$name=$rowsalesman['name'];
$query="SELECT * FROM working_area WHERE id='$id'";
$query=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_assoc($query);

$state=$row['state'];
$district=$row['district'];
$city=unserialize($row['city']);  
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
  <h1>Edit Salesman working Area </h1>
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
			<th valign="top">Department:</th>
			<td><select name="department" id="depart" class="inp-form-select" onchange="return onchangedepartment_workingarea(this.value);"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department ");
			    while($value=mysql_fetch_array($query))
			      {			  
			  ?>			  
			     <option <?php if($department==$value['department']) echo 'selected="selected"';  ?> value="<?php echo $value['department']; ?>"><?php  echo $value['department']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td>
			<th valign="top">Salesman name :</th>
			 <td><div id="departmentdiv"><select  class="inp-form-select"  name="salesman_id"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT u.id as id ,d.name as name FROM dan_users as u join department_list as d on u.id=d.user ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($name==$value['name']) echo 'selected="selected"';  ?>  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
  </div> 
   
        </td>
		</tr>
        <tr>			
			<th valign="top">State:</th>
			<td> <select name="state" id="state" onchange="return show_district(this.value)" class="inp-form-select">
			     <option value="" selected="selected"> Plz Select</option> 
                 <?php
			    $query=mysql_query("SELECT DISTINCT(state) FROM location_maste_info_list ORDER BY state");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($row['state']==$value['state']) echo 'selected="selected"';  ?> value="<?php echo $value['state']; ?>"><?php echo $value['state']; ?></option>
			  <?php 
			     }   
              ?>

           
    </select></td>
	<th valign="top">District:</th>
			<td>
			<div id="district">
			 <select name="district" id="district" onchange="return show_city(this.value);"class="inp-form-select">
			     <option value="" selected="selected"> Plz Select</option> 
                 <?php
			    $query=mysql_query("SELECT DISTINCT(district) FROM location_maste_info_list ORDER BY district");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($row['district']==$value['district']) echo 'selected="selected"';  ?>  value="<?php echo $value['district']; ?>"><?php echo $value['district']; ?></option>
			  <?php 
			     }   
              ?>

           
    </select>
	 </div>
	</td>
		</tr> 
        <tr> 
		 <th valign="top">Select City</th>
		 <td colspan="3">
		 <div id="fill" class="inp-form" style="width:95%; height:auto; padding:15px;">
		 <?php
		  $query2=mysql_query("SELECT city FROM location_maste_info_list WHERE state='$state' AND district='$district' ORDER BY city");
while($row2=mysql_fetch_assoc($query2)) {
?>
<input style="height: 13px; margin-right:6px;" <?php $val=checkbox1($city,$row2['city']); echo $val;?> type="checkbox" name="city[]" value="<?php echo $row2['city']; ?>"><span style="padding-right: 20px;line-height: 20px;"><?php echo $row2['city']; ?></span>
<?php $i++; if($i%4==0) echo '<br>'; } ?>
		 
		 </div>
		 </td>
		</tr> 
		
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />		</td>
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
