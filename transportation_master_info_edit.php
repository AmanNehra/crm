<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
if(isset($_POST['submit'])) {
$id = $_POST['id'];

$category=strtoupper($_REQUEST['category']);
$transport=strtoupper($_REQUEST['transport']);
$details=strtoupper($_REQUEST['details']); 
//update function
function update()
 {
  	$id = $_POST['id'];

	$category=strtoupper($_REQUEST['category']);
	$transport=strtoupper($_REQUEST['transport']);
	$details=strtoupper($_REQUEST['details']); 
	
	
	$sq=mysql_query("UPDATE transportation SET category='$category', transport='$transport', detail='$details' where id='$id'") or die(mysql_error());
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header('location:transportation_listing.php');
	    }
		else{ header('location:transportation_master_info_edit.php?id='.$id);}

 }
//End of update function

$result=mysql_query("SELECT detail FROM transportation WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['detail']==$details)
  {
   update();
  }
 else
  {
  $query=mysql_query("SELECT detail FROM  transportation");
   while($data=mysql_fetch_assoc($query))
    {
     if($details==$data['detail'])
       {
       $f=1;       
       }
    }
  if($f!=1)
   {
    update();
	}
	else  
    {$error="Transport detail must be unique";}

  }
	

}
 
 require_once('config.php'); 
$result=mysql_query("SELECT * FROM transportation WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>     
			   

<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading"><h1>Edit Transportation Information</h1>
                       <h4 style="color:red" align="center"><?php echo $error;?></h4>

</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
<input type="hidden" name="id"  value="<?php echo $row['id']; ?>"/>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;<?php echo $error;?></td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">  
    <tr>
   <th valign="top" style="height: 22px">Category:</th>
			<td style="height: 22px">
            <!--<input type="hidden" class="inp-form" name="category" id="Category" value="Transportation" />-->
            <input type="text" class="inp-form" name="category" id="category" value="TRANSPORTATION" readonly="readonly"/></td>
            
            <th valign="top" style="height: 22px">Transport Type:</th>
			<td style="height: 22px"><select class="inp-form-select" name="transport" id="transport">
			  <option value="" selected="selected">Plz select</option>
			 <option <?php if("BY HAND"==$row['transport']) echo 'selected="selected"';?> value="By Hand">By Hand</option>
			 <option <?php if("BY COURIER"==$row['transport']) echo ' selected="selected"' ;?> value="By Courier">By Courier</option>
			 <option <?php if('BY TRANSPORT'==$row['transport']) echo ' selected="selected"' ;?> value="By Transport">By Transport</option>	  
			</select></td>
						
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
			 <option value="<?php echo $value['name'];?>" selected="<?php if($row['detail']==$value['name']) echo 'selected="selected"' ;?>"> <?php echo $value['name'];?> </option>;
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
 </script><?php include('footer.php');?>

