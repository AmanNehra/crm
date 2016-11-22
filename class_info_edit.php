<?php $id = convert_uudecode(base64_decode($_GET['id']));



//echo'</pre>';print_r($id);die; 
include('header.php');
if(isset($_POST['submit'])) {
$id = $_POST['id'];

$category=strtoupper($_REQUEST['category']);
$class=strtoupper($_REQUEST['class']); 

//Update function
 function update()
  {
  	$id = $_POST['id'];

	$category=strtoupper($_REQUEST['category']);
	$class=strtoupper($_REQUEST['class']);
	$class12=strtoupper($_REQUEST['class12']);	 

   $sq=mysql_query("UPDATE class SET category='$category', class='$class' where id='$id'") or die(mysql_error());
   
   $sq=mysql_query("UPDATE strength SET class='$class' where class='$class12'");
   $sq=mysql_query("UPDATE book_master SET class='$class' where class='$class12'");   	
	
   $query121=mysql_query("SELECT * FROM `department_list`") or die(mysql_error());
   while($data121=mysql_fetch_assoc($query121))
   {
		$working_city=$data121['class'];
		echo $working_city_new=str_replace($class12, $class, $working_city);
		$sq=mysql_query("UPDATE department_list SET class='$working_city_new' where class='$working_city'"); 
   }
   $query121=mysql_query("SELECT * FROM `teacher_master_list`") or die(mysql_error());
   while($data121=mysql_fetch_assoc($query121))
   {
		$working_city=$data121['class'];
		echo $working_city_new=str_replace($class12, $class, $working_city);
		$sq=mysql_query("UPDATE teacher_master_list SET class='$working_city_new' where class='$working_city'"); 
   }

	if($sq)
	{
     header('location:class_listing.php');
    }
	else{ header('location:class_info_edit.php?id='.$id);}
  
  }
//end of function
$result=mysql_query("SELECT class FROM  class WHERE (category = '$category') AND (id= '$id') ") or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['class']==$class)
  { 
   update();
  }
 else
  {
  $query=mysql_query("SELECT class FROM  class WHERE (category = '$category')");
   while($data=mysql_fetch_assoc($query))
    {
     if($class==$data['class'])
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
$result=mysql_query("SELECT * FROM class WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>



<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading">
  <h1>Edit Class Master</h1>
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
			<td> <input type="text" class="inp-form" name="category" id="category" value="<?php echo $row['category'];?>"  readonly="readonly"/></td>
   <th valign="top">Class:</th>
			<td>             
            <input type="text" class="inp-form" name="class" id="class" value="<?php echo $row['class'];?>" />
			<input type="text" class="inp-form" name="class12" id="class12" value="<?php echo $row['class'];?>" />            
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
"class":{
required:true,
}
},
messages: {
    category:{
                 required: "Enter Class category",                
    },
     class: {
                required: "Enter Class",
                
                }
    }
  });  
 });
 </script><?php include('footer.php');?>
