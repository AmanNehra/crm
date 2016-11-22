<?php include('header.php');

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;   
//$agent_id=
$category=strtoupper($_REQUEST['category']);
$transport=strtoupper($_REQUEST['transport']);
$details=strtoupper($_REQUEST['details']); 
$date = date('Y-m-d H:i:s'); 
//For duplicay check
$query="select detail from transportation";
$data=mysql_query($query);
while($value=mysql_fetch_array($data))
    { if($details==$value['detail'])
        {
         $f=1;
        }    
     
    }
if($f!=1)
  {
   mysql_query("INSERT INTO transportation (id,category, transport, detail, date ) VALUES ('$id','$category', '$transport','$details','$date')") or die("Category should be unique");
   header('location:transportation_listing.php'); 
  }
 else
  $error="Transport detail must be unique"; 
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
  <h1>Add New Transportation Information</h1>
  <h4 style="color:red" align="center"><?php echo $error;?></h4>
</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form" novalidate="novalidate">
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft" style="height: 38px"></th>
	<td id="tbl-border-top" style="height: 38px">&nbsp;<?php echo $error;?></td>
	<th class="topright" style="height: 38px"></th>
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
   <th valign="top" style="height: 22px">Category:</th>
			<td style="height: 22px">
            <!--<input type="hidden" class="inp-form" name="category" id="Category" value="Transportation" />-->
            <input type="text" class="inp-form" name="category" id="category" value="TRANSPORTATION" readonly="readonly"/></td>
            
            <th valign="top" style="height: 22px">Transport Type:</th>
			<td style="height: 22px">
			<select class="inp-form-select" name="transport" id="transport">
			<option value="" selected="selected">Plz select</option>
			 <option value="By HAND">By HAND</option>
			 <option value="By COURIER">By COURIER</option>
			 <option value="By TRANSPORT">By TRANSPORT</option>	  
			</select>			
	</tr> 
	 <tr>
     <th valign="top">Transport Details:</th>
			<td>
            <!--<input type="hidden" class="inp-form" name="category" id="Category" value="Transportation" />-->
            <select class="inp-form-select" name="details" id="details">
			<option value="" selected="selected">Plz select</option>
			 <?php
			 $query=mysql_query("Select name from transport_list order by name");
			 
			 while($value=mysql_fetch_array($query))			 
			  {
			 ?>
			 <option value="<?php echo $value['name'];?>"> <?php echo $value['name'];?> </option>;
			 <?php
			  }
			?>			  
			</select></td>            
           
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
    "category":{
    required: true,     
    },
"transport":{
required:true,
},
"details":{
required:true,
}
},
messages: {
    category:{
                 required: "Enter transport category",                
    },
     transport: {
                required: "Enter transport",
                
                },
     details: {
                required: "Enter deatils",                
                }
    }
  });  
 });
 </script>