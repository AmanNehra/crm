<?php 
$id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');
if(isset($_POST['submit'])) {
$category=strtoupper($_REQUEST['category']);
$department=strtoupper($_REQUEST['department']); 
 
//update function
 function update()
 {
  $id = convert_uudecode(base64_decode($_GET['id']));
 $category=strtoupper($_REQUEST['category']);
 $department=strtoupper($_REQUEST['department']);
 $department12=strtoupper($_REQUEST['department12']); 
 
 $sq=mysql_query("UPDATE department SET category='$category', department='$department' where id='$id'") or die(mysql_error());
 $sq=mysql_query("UPDATE department_list SET department='$department' where department='$department12'");
 
 $sq1=mysql_query("UPDATE issue_voucher SET department='$department' where department='$department12'");

 $sq2=mysql_query("UPDATE return_voucher SET department='$department' where department='$department12'"); 
 
//echo'</pre>';print_r($sq);die;
if($sq){
     header('location:department_setting_listing.php');
    }
	else{ header('location:department_master_info_edit.php?id='.$id);}

 
 }

//End function
$result=mysql_query("SELECT department FROM  department  WHERE (category = '$category') AND (id= '$id') ") or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['department']==$department)
  { 
   update();
  }
 else
  {
  $query=mysql_query("SELECT department FROM  department  WHERE (category = '$category')");
   while($data=mysql_fetch_assoc($query))
    {
     if($department==$data['department'])
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
$result=mysql_query("SELECT * FROM department WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>



<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading"><h1>Edit Department Information</h1>
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
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">  
    <tr>
   <th valign="top">Category:</th>
			<td>
           
            <input type="text" class="inp-form" name="category" id="category" value="<?php echo $row['category'];?>" readonly="readonly"/></td>
            
   <th valign="top">Department Name:</th>
			<td>
           
            <input type="text" class="inp-form" name="department" id="department" value="<?php echo $row['department'];?>" />
            <input type="hidden" class="inp-form" name="department12" id="department12" value="<?php echo $row['department'];?>" />
            </td>
        

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
"departmeent":{
required:true,
}
},
messages: {
    category:{
                 required: "Enter transport category",                
    },
     departmeent: {
                required: "Enter departmeent",
                            
                }
    }
  });  
 });
 </script><?php include('footer.php');?>
