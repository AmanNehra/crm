<?php include('header.php');
include('function.php');
require_once('config.php');
$id = convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));

if(isset($_POST['submit'])) {
$name=trim(strtoupper($_REQUEST['name']));
$code=trim(strtoupper($_REQUEST['code']));
$year_code=($_REQUEST['year_code']);
$from_date=($_REQUEST['from_date']);
$short_name=trim(strtoupper($_REQUEST['short_name']));
$to_date=($_REQUEST['to_date']);

$sq=mysql_query("UPDATE misCompanyMaster_sub SET company_name='$name',company_code='$code',year_code='$year_code', from_date='$from_date', short_name='$short_name',to_date='$to_date' where id='$id'") or die(mysql_error());
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header("location:company_mis_sub.php?sid=".base64_encode(convert_uuencode($sid)));
	    }
		else{ header('location:company_mis_sub_edit.php?id='.base64_encode(convert_uuencode($id)));}
		
				    


}

	$result=mysql_query("SELECT * FROM misCompanyMaster_sub WHERE id= '$id' ") or die(mysql_error());
	$row = mysql_fetch_array($result);


?>
<!-- start content-outer -->
 <title>jQuery UI Datepicker - Display month &amp; year menus</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#from_date" ).datepicker({
changeMonth: true,
changeYear: true
});
});

$(function() {
$( "#to_date" ).datepicker({
changeMonth: true,
changeYear: true
});
});
</script>
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




<div id="page-heading"><h1>Edit Company MIS Sub</h1></div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td style="height: 96px">
	
	
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form"> 
        <tr>
        <th valign="top">MIS Company Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php  echo $row['company_name']; ?>" readonly="readonly" required/></td>   
        <th valign="top">MIS Company Code:</th>
			<td><input type="text" class="inp-form" name="code"  value="<?php echo $row['company_code'];?>"id=""  readonly="readonly" required/></td>
         
	   </tr>
    <tr>
	     <th valign="top">Year code:</th>
			<td><select name="year_code" id="year_code" class="inp-form-select"  required>
			    <option value="">Plz Select</option>
				<option <?php if($row['year_code']== "2013-2014") echo 'selected="selected"';?> value="2013-2014">2013-2014</option>
				<option  <?php if($row['year_code']== "2014-2015") echo 'selected="selected"';?> value="2014-2015">2014-2015</option> 
		        <option <?php if($row['year_code']== "2015-2016") echo 'selected="selected"';?> value="2015-2016">2015-2016</option>
                </select>
			
			</td>
        <th valign="top">From Date:</th>			 
			<td><input type="text" class="inp-form" name="from_date" value="<?php echo $row['from_date']; ?>" id="from_date" required/></td> 
	   </tr>
	   <tr>
	     <th valign="top">Short Name:</th>
			<td><input type="text" class="inp-form" name="short_name" value="<?php echo $row['short_name']; ?>" id="short_name" required/></td>
        <th valign="top">To Date:</th>			 
			<td><input type="text" class="inp-form" name="to_date" value="<?php echo $row['to_date']; ?>"  id="to_date" required/></td> 

	   </tr>
        
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td></td>
	</tr>
	</table>
	</form>
	<!-- end id-form  -->

	</td>
	<td style="height: 96px">

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
</form>
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
