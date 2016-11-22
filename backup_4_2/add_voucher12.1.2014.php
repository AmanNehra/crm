<?php include('header.php');

if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$head=trim(strtoupper($_REQUEST['head']));
$parent=trim(strtoupper($_REQUEST['parent'])); 
//$specification=trim(strtoupper($_REQUEST['specification']));

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
*/  $sql=mysql_query("INSERT INTO expense_list (head, parent) VALUES ('$head', '$parent')")or die(mysql_error());
     header('location:expense_listing.php'); 
  /*   }
  else  
    {$error="Data already exist";}*/

}



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
  <h1>Add New Specimen Voucher Master Information</h1>
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
	   <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		   <th valign="top">Voucher NO:</th>
			<td><input type="text" class="inp-form2" name="v_no" /></td>
			
		   <th valign="top" style="width: 100px;min-width: 121px;">Date:</th>
			<td><input type="text" class="inp-form2" name="v_date" value="<?php echo date('Y-m-d');  ?>" /></td>
			
		   <th valign="top"  style="width: 100px;min-width: 121px;">Time:</th>
			<td><input type="text" class="inp-form2" name="rno" value="<?php echo date('H:i:s');  ?>" /></td>
		</tr>
	   </table>
	 <br />
	 <br />
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
        <th valign="top">Report NO:</th>
			<td><input type="text" class="inp-form" name="rno" /></td>
	    <th valign="top">Branch Office:</th>
			<td><input type="text" class="inp-form" name="branch" /></td>          
   
	   </tr>
	   <tr>
        <th valign="top">Executive Name:</th>
			<td><input type="text" class="inp-form" name="executive" /></td>
	    <th valign="top">Designation:</th>
			<td><input type="text" class="inp-form" name="designation" /></td>          
   
	   </tr>
		<tr>
        <th valign="top">Please Select:</th>
			<td>
			<select name="option" class="inp-form1" id="ch" onchange="show12(this.value)" >
			  <option value="" selected="selected">Plz Select</option>
			  <option value="town">Town Visite</option>
			  <option value="ta">TA/DA</option>
			  <option value="mode">Mode Of Transport</option>
			  <option value="stationery">Stationery</option>
			  <option value="xerox">Xerox</option>
			  <option value="courier">Courier Charges</option>
			  <option value="internet">Internet Charges</option>
			  <option value="leave">Leave</option>
			  <option value="others">Others</option>
			</select>
			</td>			
		 <th valign="top">Date:</th>
		  <td> <input type="text" class="inp-form" name="entry_date" readonly value="<?php echo date('Y-m-d');  ?>" /></td> 
   
	   </tr>	   
	    	   	
        <tr id="town" style=" display:none">
        <th valign="top">From:</th>
			<td><input type="text" class="inp-form" name="from" id="t1"  /></td>
          <th valign="top">To:</th>
			<td><input type="text" class="inp-form" name="to" id="t2"  /></td> 
   
	   </tr>	  
	   <tr id="ta" style=" display:none">
	   
          <th valign="top">Car:</th>
			<td><input type="text" class="inp-form" name="car" id="a1"  /></td>
          <th valign="top">Two Wheeler:</th>
			<td><input type="text" class="inp-form" name="twoWheel" id="a2"  /></td> 
      
	   </tr>
	   <tr id="ta1" style=" display:none">
	   
          <th valign="top">Daily Allowance (DA):</th>
			<td><input type="text" class="inp-form" name="da" id="a3"  /></td>
          <th valign="top">Boarding / Lodging:</th>
			<td><input type="text" class="inp-form" name="bord" id="a4"  /></td> 
      
	   </tr>
	   <tr id="ta2" style=" display:none">
	   
          <th valign="top">Fooding:</th>
			<td><input type="text" class="inp-form" name="food" id="a5"  /></td>
          <th valign="top"></th>
			<td></td> 
      
	   </tr>	   
	   <tr id="m" style=" display:none">
	   
          <th valign="top">Auto:</th>
			<td><input type="text" class="inp-form" name="auto" id="b1"  /></td>
          <th valign="top">Bus:</th>
			<td><input type="text" class="inp-form" name="bus" id="b2"  /></td> 
      
	   </tr>
	   <tr id="m1" style=" display:none">
	   
          <th valign="top">Rickshaw:</th>
			<td><input type="text" class="inp-form" name="rikshaw" id="b3"  /></td>
          <th valign="top">Train:</th>
			<td><input type="text" class="inp-form" name="train" id="b4"  /></td> 
      
	   </tr>   
      <tr>
        <th valign="top">Unit:</th>
			<td><input type="text" class="inp-form" name="unit" /></td>
	    <th valign="top">Total Amount:</th>
			<td><input type="text" class="inp-form" name="amount" /></td>          
   
	   </tr> 
 
       <!--<tr>      
        
			<th valign="top">Specification:</th>
			<td><input type="text" class="inp-form" name="specification" id="specification" value=""   /></td>         
	   </tr> -->
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
				 :true,
				/*lettersonly:true,*/
				remote:'check.php',
			},
			
			"email12":
			{
				 :true,
				email:true,
				
			},
			"address":
			{
				 :true
			},
			"address":
			{
				 :true
			},
			
			
			"route":
			{
				 :true
				 
			},
						
		},
		messages:
		{
			"user_name":
			{
				 :'This field is  .',
				remote:'Username Already Exists.',
			},
			
			"email":
			{
				 :'This field is  .',
				email:'Please enter valid email.',
				
			},
			"password":
			{
				 :'This field is  .',
			},
			"address":
			{
				 :'This field is  .',
			},
			
			"phone":
			{
				 :'This field is  .',
				number:'Please enter a valid phone no.'
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>
