<?php include('header.php');
error_reporting(0);
$id = convert_uudecode(base64_decode($_GET['id']));
$tbl="expense_ent";
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$head=trim(strtoupper($_REQUEST['head']));
$designation=trim(strtoupper($_REQUEST['designation']));
$relate=trim(strtoupper($_REQUEST['relate'])); 
$amount=$_REQUEST['amount'];
/*$query=mysql_query("SELECT book_alias,isbn FROM  item_master_list");
  while($data=mysql_fetch_assoc($query))
    {
     if((($book_alias==$data['book_alias']) AND ($isbn==$data['isbn'])) OR ($book_alias==$data['book_alias']) OR ($isbn==$data['isbn']))
       {
       $f=1;       
       }
    }
  if($f!=1)
   {
*/ 
$sql=mysql_query("UPDATE $tbl SET head='$head' ,designation='$designation' ,relate='$relate', amount='$amount'  where id='$id'")or die(mysql_error());
	
$sql1=mysql_query("INSERT INTO expense_ent_new (head, designation,relate,amount,date1) VALUES ('$head', '$designation','$relate','$amount',now())")or die(mysql_error());

    if($sql)	
     header('location:expense_ent_listing.php');
 
  /*   }
  else  
    {$error="Data already exist";}*/

}

$query=mysql_query("SELECT * FROM $tbl WHERE id='$id'");
$row=mysql_fetch_array($query);

?>
<!-- start content-outer -->


<div id="content-outer">
<!-- start content -->
<div id="content">
<?php if($user!='1'){header('location:index.php');}?>
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
  <h1>Edit Expense Entitlement Information</h1>
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
        <th valign="top">Head:</th>
			<td><select name="head" id="pid" class="inp-form-select"> 
			      <option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT head FROM expense_list") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($resultdeg['head']==$row['head']) echo 'selected="selected"'; ?> VALUE="<?php echo $resultdeg['head']; ?>"><?php echo $resultdeg['head']; ?></option> 
			<?php }?>   </select>			
			</td>
         <th valign="top">Designation:</th>
			<td>  <select name="designation" id="pid" class="inp-form-select"> 
			      <option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT designation FROM other_designation_list order by id") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option  <?php if($resultdeg['designation']==$row['designation']) echo 'selected="selected"'; ?> VALUE="<?php echo $resultdeg['designation']; ?>"><?php echo $resultdeg['designation']; ?></option> 
			<?php } ?>   </select>
            </td> 
   
	   </tr>
	   <th valign="top">Relate </th>
	   <td>
	    <select name="relate" class="inp-form-select">
		 <option value="" selected="selected">Plz select</option>
		 <option value="TRANSPORT" <?php if($row['relate']=="TRANSPORT") echo 'selected="selected"'; ?>>Transport</option>
		 <option value="TA/DA" <?php if($row['relate']=="TA/DA") echo 'selected="selected"'; ?>>TA/DA</option>
		 <option value="LOCAL TRAVEL" <?php if($row['relate']=="LOCAL TRAVEL") echo 'selected="selected"'; ?>>LOCAL TRAVEL</option>
		 </select>
	   
	   
	   </td>
	   <th valign="top">Amount:</th>
			<td><input type="text" class="inp-form" name="amount" id="amount" value=" <?php echo $row['amount']; ?>" required/></td>
	  
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
