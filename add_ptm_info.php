<?php include('header.php');

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
//$agent_id=
$category=strtoupper($_REQUEST['category']);
$detail=strtoupper($_REQUEST['detail']); 
$date = date('Y-m-d H:i:s'); 
$query=mysql_query("SELECT detail FROM  ptm WHERE category = '$category'");
  while($data=mysql_fetch_assoc($query))
    {
     if($detail==$data['detail'])
       {
       $f=1;       
       }
    }
  if($f!=1)
   {

$sql=mysql_query("INSERT INTO ptm (category, detail, date) VALUES ('$category', '$detail','$date')")or die(mysql_error());
     header('location:ptm_listing.php'); 
    } 
  else  
    {$error="data already exist";}

   
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
  <h1>Add New PTM Information</h1>
  <h4 style="color:red" align="center"><?php echo $error;?></h4>
  

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
   <th valign="top">Category:</th>
			<td>
            <input type="text" class="inp-form" name="category" id="Category" readonly="readonly" value="PTM" /></td>
    <th valign="top">PTM Details:</th>        
           <td> <input type="text" class="inp-form" name="detail" id="detail" /></td>
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
"detail":{
required:true,
}
},
messages: {
    category:{
                 required: "Enter PTM category",                
    },
     
     detail: {
                required: "Enter deatils",                
                }
    }
  });  
 });
 </script>
 <?php include('footer.php');?>
