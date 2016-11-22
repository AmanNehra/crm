<?php include('header.php');

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$item_name=trim(strtoupper($_REQUEST['item_name']));
$subject=trim(strtoupper($_REQUEST['subject'])); 
$class=trim(strtoupper($_REQUEST['class']));
$price=trim(strtoupper($_REQUEST['price'])); 
$series=trim(strtoupper($_REQUEST['series']));
$book_alias=trim(strtoupper($_REQUEST['book_alias']));
$isbn=trim(strtoupper($_REQUEST['isbn']));
$discount=trim(strtoupper($_REQUEST['discount']));
$author=trim(strtoupper($_REQUEST['author']));
$remark=trim(strtoupper($_REQUEST['remark'])); 
$date = date('Y-m-d H:i:s'); 

$query=mysql_query("SELECT book_alias,isbn FROM  item_master_list");
  while($data=mysql_fetch_assoc($query))
    {
     if((($book_alias==$data['book_alias']) AND ($isbn==$data['isbn'])) OR ($book_alias==$data['book_alias']) OR ($isbn==$data['isbn']))
       {
       $f=1;       
       }
    }
  if($f!=1)
   {
  $sql=mysql_query("INSERT INTO item_master_list (item_name, subject,class, price,series, book_alias,isbn,discount,author,remarks, date_added) VALUES ('$item_name', '$subject','$class', '$price','$series', '$book_alias','$isbn','$discount','$author','$remark','$date')")or die(mysql_error());
     header('location:item_master_listing.php'); 
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
  <h1>Add New Item Master Information</h1>
  <h4 style="color:red" align="center"><?php echo $error;?></h4>

</div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft" style="height: 34px"></th>
	<td id="tbl-border-top" style="height: 34px"></td>
	<th class="topright" style="height: 34px"></th>
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
        <th valign="top">Item Name:</th>
			<td><input type="text" class="inp-form" name="item_name" id="item_name" required/></td>
         <th valign="top">Subject:</th>
			<td><select class="inp-form-select" name="subject" id="subject" required>
			   <option value="" selected="selected">Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT subject FROM subject_master_list ORDER BY subject ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['subject']==$value['subject']) echo ' selected="selected"' ;?> value="<?php echo $value['subject']; ?>" ><?php echo $value['subject']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
</td>   
	   </tr>
    <tr>
        <th valign="top">Class:</th>
			<td><input type="text" class="inp-form" name="class" id="class" required/></td>
         <th valign="top">Price:</th>
			<td><input type="text" class="inp-form" name="price" id="price" required/></td>   
	   </tr>
        <tr>
        <th valign="top">Series:</th>
			<td><select class="inp-form-select" name="series" id="series">
			    <option value="" selected="selected">Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT series FROM series_master_list ORDER BY series ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['series']==$value['series']) echo ' selected="selected"' ;?> value="<?php echo $value['series']; ?>" ><?php echo $value['series']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>			
			</td>
         <th valign="top">Book Alias:</th>
			<td><input type="text" class="inp-form" name="book_alias" id="std" required/></td>   
	   </tr>
	   <tr>
        <th valign="top">ISBN:</th>
			<td><input type="text" class="inp-form" name="isbn" id="isbn" pattern="^[0-9]{13}$" required
title="A 13 digit value ."/></td>
         <th valign="top">Discount:</th>
			<td><select class="inp-form-select" name="discount" id="discount">
			    <option value="" selected="selected">Plz Select</option>
			  <?php
			   $query=mysql_query("SELECT value from discount_grade_list");
			   while($data=mysql_fetch_array($query))
			      {
			   ?>
			      <option value="<?php echo $data['value'];?>" ><?php echo $data['value'];?></option>
			   <?php
			      }
			  ?>		
			
			</select></td>   
	   </tr>
        <tr>
        <th valign="top" style="height: 22px">Author Name:</th>
			<td style="height: 22px">
					  <select class="inp-form-select" name="author" id="author">
					  <option value="" selected="selected">Plz Select</option>
					  <?php
					   $query=mysql_query("SELECT name from department_list order by name");
					   while($data=mysql_fetch_array($query))
					      {
					   ?>
					      <option value="<?php echo $data['name'];?>" ><?php echo $data['name'];?></option>
					   <?php
					      }
					  ?>		
					
					 </select></td>
         <th valign="top" style="height: 22px">Remarks:</th>
			<td style="height: 22px" rowspan="2">  <textarea class="inp-form" name="remark" id="remark" style="height:45px;" required></textarea>
			</td>   
	   </tr>
	   <tr>
	   <th valign="top" style="height: 22px"></th>
			<td style="height: 22px">
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
