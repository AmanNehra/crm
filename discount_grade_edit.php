<?php $id = convert_uudecode(base64_decode($_GET['id']));



//echo'</pre>';print_r($id);die; 
include('header.php');
if(isset($_POST['submit'])) {
$id = $_POST['id'];
$grade=trim(strtoupper($_REQUEST['grade']));
$value=trim(strtoupper($_REQUEST['value']));   
$date = date('Y-m-d H:i:s');  
//update function
function update()
 { 
 	 $id = $_POST['id'];
	$grade=trim(strtoupper($_REQUEST['grade']));
	$value=trim(strtoupper($_REQUEST['value']));   
	$date = date('Y-m-d H:i:s');
	//echo'</pre>';print_r($encrypt);die; 
	$sq=mysql_query("UPDATE discount_grade_list SET grade='$grade',value='$value',date_added='$date' where id='$id'") or die(mysql_error());
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header('location:discount_grade_listing.php');
	    }
		else{ header('location:discount_grade_edit.php?id='.$id);}
 }
//end function
$result=mysql_query("SELECT * FROM  discount_grade_list WHERE  (id= '$id') ") or die(mysql_error());
$data = mysql_fetch_array($result);
if(($grade==$data['grade']) && ($value==$data['value'])) 
  { 
   update();
  }
 else
  {
  $query=mysql_query("SELECT * FROM  discount_grade_list WHERE  (id!= '$id')");
   while($data=mysql_fetch_assoc($query))
    {
     if((($grade==$data['grade']) && ($value==$data['value'])) ||($grade==$data['grade']) || ($value==$data['value']))       {
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
$result=mysql_query("SELECT * FROM discount_grade_list WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>



<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading">
  <h1>Edit Discount Grade</h1>
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
        <th valign="top">Grade:</th>
			<td><input type="text" class="inp-form" name="grade" id="grade" value="<?php echo $row['grade']; ?>" required /></td>
         <th valign="top">Account:</th>
			<td><input type="text" class="inp-form" name="value" id="value" value="<?php echo $row['value']; ?>"  /></td>  
	  
	 
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

