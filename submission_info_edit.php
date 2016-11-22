<?php $id = convert_uudecode(base64_decode($_GET['id']));



//echo'</pre>';print_r($id);die; 
include('header.php');
if(isset($_POST['submit'])) {
$id = $_POST['id'];

$category=strtoupper($_REQUEST['category']);
$date=strtoupper($_REQUEST['sub_date']);
// update function
function update()
 {
  	$id = $_POST['id'];

	$category=strtoupper($_REQUEST['category']);
	$date=strtoupper($_REQUEST['sub_date']);
	$date12=strtoupper($_REQUEST['sub_date12']);	
	
	  //echo'</pre>';print_r($encrypt);die;
	$sq=mysql_query("UPDATE submission SET category='$category',date='$date' where id='$id'") or die(mysql_error());
	
	$sq=mysql_query("UPDATE master_list SET submission='$date' where submission='$date12'");
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header('location:submission_listing.php');
	    }
		else{ header('location:submission_info_edit.php?id='.$id);}
 }
 //end function
$result=mysql_query("SELECT date FROM  submission  WHERE (category = '$category') AND (id= '$id') ") or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['date']==$date)
  { 
   update();
  }
 else
  {
  $query=mysql_query("SELECT date FROM  submission  WHERE (category = '$category')");
   while($data=mysql_fetch_assoc($query))
    {
     if($date==$data['date'])
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
$result=mysql_query("SELECT * FROM submission WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>



<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading">
  <h1>Edit Submission Master</h1>
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
	<td id="tbl-border-top">&nbsp;</td>
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
   <th valign="top">Category:</th>
			<td>
            <input type="text" class="inp-form" name="category" id="Category" readonly="readonly" value="<?php echo $row['category'];?>"/></td>
    <th valign="top">Submission Date:</th>
        
            <td><input type="text" class="inp-form" name="sub_date" id="sub_date" value="<?php echo $row['date'];?>"/>
                        <input type="hidden" class="inp-form" name="sub_date12" id="sub_date12"  value="<?php echo $row['date'];?>"/>
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
	</table><div class="clear"></div>
 

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
"sub_date":{
required:true,
},
"details":{
required:true,
}
},
messages: {
    category:{
                 required: "Enter submission category",                
    },
     sub_date: {
                required: "Enter date",
                
                }
    }
  });  
 });
 </script>
<?php include('footer.php');?>
