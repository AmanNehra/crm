<?php include('header.php');

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$city=trim(strtoupper(($_REQUEST['city'])));
$district=trim(strtoupper(($_REQUEST['district']))); 
$state=trim(strtoupper(($_REQUEST['state'])));
$country=trim(strtoupper(($_REQUEST['country']))); 
$pin=trim(strtoupper(($_REQUEST['pin'])));
$std=trim(strtoupper(($_REQUEST['std']))); 


$query=mysql_query("SELECT * FROM  location_maste_info_list");
  while($data=mysql_fetch_assoc($query))
    {
     if(($city==$data['city']) AND ($district==$data['district']) AND ($state==$data['state']) AND ($pin==$data['pin']))
       {
       $f=1;       
       }
    }
  if($f!=1)
   {
    $sql=mysql_query("INSERT INTO location_maste_info_list (city, district,state, country,pin, std) VALUES ('$city', '$district','$state', '$country','$pin', '$std')")or die(mysql_error());
    header('location:location_master_info_listing.php'); 
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
  <h1>Add New Location Information</h1>
  <h4 style="color:red" align="center"><?php echo $error;?></h4>

</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formid" name="form">
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
        <th valign="top">City:</th>
			<td><input type="text" class="inp-form" name="city" id="city"  required/></td>
         <th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" id="district" required/></td>   
	   </tr>
    <tr>
        <th valign="top">State:</th>
			<td><input type="text" class="inp-form" name="state" id="state" required/></td>
         <th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country" id="country" required/></td>   
	   </tr>
        <tr>
        <th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" id="pin" pattern="^[1-9][0-9]{5}$" required
title="A six digit number that doesn't begin with zero."/></td>
         <th valign="top">Std Code:</th>
			<td><input type="number" class="inp-form" name="std" id="std" required /></td>   
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
<!-- jQuery Form Validation code -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$("#formoid").validate({
errorElement: 'div',
rules:{
    "city":{
    required: true,     
    },
"district":{
required:true,
},

    "state":{
    required: true,     
    },
    "country":{
    required: true,     
    },

    "pin":{
    required: true,   
        
    },

    "std":{
    required: true,     
    }

},
messages: {
    city:{
                 required: "Enter city name",                
    },
    district:{
                 required: "Enter district name",                
    },
    state:{
                 required: "Enter state name",                
    },
    country:{
                 required: "Enter country name",                
    },
    pin:{
                 required: "Enter pincode name",                            
    },

     std: {
                required: "Enter stdcode",
                
                }
    }
  });  
 });
 </script>
<?php include('footer.php');?>
