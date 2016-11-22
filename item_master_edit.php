<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');

if(isset($_POST['submit'])) {
$id = $_POST['id'];

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
$date = date('Y-m-d H:i:s');//echo'</pre>';print_r($encrypt);die;
//function update
function update()
 {
  	$id = $_POST['id'];

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
	$date = date('Y-m-d H:i:s');//echo'</pre>';print_r($encrypt);die;

	 $sq=mysql_query("UPDATE item_master_list SET item_name='$item_name', subject='$subject', class='$class', price='$price', series='$series', book_alias='$book_alias',isbn='$isbn',discount='$discount',author='$author',remarks='$remark', date_added='$date' where id='$id'") or die(mysql_error());
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header('location:item_master_listing.php');
	    }
		else{ header('location:location_master_info_edit.php?id='.$id);} 
 }
 //end function
 
	$result=mysql_query("SELECT book_alias,isbn FROM  item_master_list WHERE id= '$id' ") or die(mysql_error());
	$row = mysql_fetch_array($result);
	if(($book_alias==$row['book_alias']) AND ($isbn==$row['isbn']))
      { 
	   update();
	  }
	 else
	  {
	  $query=mysql_query("SELECT book_alias,isbn FROM  item_master_list WHERE id!= '$id'");
	   while($data=mysql_fetch_assoc($query))
	    {
	     if(($book_alias==$data['book_alias']) OR ($isbn==$data['isbn']))
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
$result=mysql_query("SELECT * FROM item_master_list WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>     
			   

<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading"><h1>Edit Item Master Information</h1>
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
        <th valign="top">Item Name:</th>
			<td><input type="text" class="inp-form" name="item_name" id="item_name"  value="<?php echo $row['item_name'] ;  ?>" required/></td>
         <th valign="top">Subject:</th>
			<td><select class="inp-form-select" name="subject" id="subject" required>
			    <option value="" selected="selected">Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT subject FROM subject_master_list ORDER BY subject ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['subject']==$value['subject']) echo ' selected="selected"' ;?>  value="<?php echo $value['subject']; ?>"><?php echo $value['subject']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
			<!--<input type="text" class="inp-form" name="subject" id="subject"  value="<?php echo $row['subject'] ;  ?>" />--></td>   
	   </tr>
    <tr>
        <th valign="top">Class:</th>
			<td><input type="text" class="inp-form" name="class" id="class"  value="<?php echo $row['class'] ;  ?>" required/></td>
         <th valign="top">Price:</th>
			<td><input type="text" class="inp-form" name="price" id="price" value="<?php echo $row['price'] ;  ?>" required/></td>   
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
			<td><input type="text" class="inp-form" name="book_alias" id="book_alias"  value="<?php echo $row['book_alias'] ;  ?>"required  /></td>   
	   </tr>
	   
	   <tr>
        <th valign="top">ISBN:</th>
			<td><input type="text" class="inp-form" name="isbn" id="isbn"  value="<?php echo $row['isbn'] ;  ?>" pattern="^[0-9]{13}$" required
title="A 13 digit value ."/></td>
         <th valign="top">Discount:</th>
			<td><select class="inp-form-select" name="discount" id="discount">
			    <option value="" selected="selected">Plz Select</option>
			  <?php
			   $query=mysql_query("SELECT value from discount_grade_list");
			   while($data=mysql_fetch_array($query))
			      { 
			   ?>
			      <option value="<?php echo $data['value'];?>" <?php  if($row['discount']==$data['value'])  echo ' selected="selected"'; ?>><?php echo $data['value'];?></option>
			   <?php
			      }
			  ?>		
			
			</select></td> 
	   </tr>
        <tr>
        <th valign="top">Author Name:</th>
			<td><select class="inp-form-select" name="author" id="author">
			    <option value="" selected="selected">Plz Select</option>
					  <?php
					   $query=mysql_query("SELECT name from department_list order by name");
					   while($data=mysql_fetch_array($query))
					      {
					   ?>
					      <option <?php if(trim($row['author'])==trim($data['name'])) echo 'selected="selected"' ;?>  value="<?php echo $data['name'];?>" ><?php echo $data['name'];?></option>
					      
					   <?php
					      }
					  ?>		
					
					 </select></td>
         <th valign="top" style="height: 22px">Remarks:</th>
			<td style="height: 22px" rowspan="2">  <textarea class="inp-form" name="remark" id="remark" style="height:45px;" required><?php echo $row['remarks'] ;  ?></textarea>
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

