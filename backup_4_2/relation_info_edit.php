<?php $id = convert_uudecode(base64_decode($_GET['id']));



//echo'</pre>';print_r($id);die; 
include('header.php');
if(isset($_POST['submit'])) {
$id = $_POST['id'];

$category=strtoupper($_REQUEST['category']);
$name=strtoupper($_REQUEST['name']); 
 
//Update function
function update()
 {
  	$id = $_POST['id'];
	$category=strtoupper($_REQUEST['category']);
	$name=strtoupper($_REQUEST['name']);
	$name1=strtoupper($_REQUEST['name1']);	 
	//echo'</pre>';print_r($encrypt);die;
	$sq=mysql_query("UPDATE relation SET category='$category', name='$name' where id='$id'") or die(mysql_error());
	
    $sq1=mysql_query("UPDATE department_list SET relation='$name' where relation='$name1'");
    $sq2=mysql_query("UPDATE chain_school_sub SET relation='$name' where relation='$name1'");	
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header('location:relation_listing.php');
	    }
		else{ header('location:relation_info_edit.php?id='.$id);}
 
 }
//end of update
	$result=mysql_query("SELECT name FROM  relation WHERE (category = '$category') AND (id= '$id') ") or die(mysql_error());
	$row = mysql_fetch_array($result);
	if($row['name']==$name)
	  { 
	   update();
	  }
	 else
	  {
	  $query=mysql_query("SELECT name FROM  relation  WHERE (category = '$category')");
	   while($data=mysql_fetch_assoc($query))
	    {
	     if($name==$data['name'])
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
$result=mysql_query("SELECT * FROM relation WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>



<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading">
  <h1>Edit Relation Master</h1>
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
            <input type="text" class="inp-form" name="category" id="category" readonly="readonly" value="<?php echo $row['category'];?>"/>
            </td>
   <th valign="top">Name:</th>
			<td>
            <input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name'];?>"/>
            <input type="hidden" class="inp-form" name="name1" id="name1" value="<?php echo $row['name'];?>"/>            </td>
         
            
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
"name":{
required:true,
}
},
messages: {
    category:{
                 required: "Enter relation category",                
    },
     name: {
                required: "Enter name",
                
                }
    }
  });  
 });
 </script>
<?php include('footer.php');?>

