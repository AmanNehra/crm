<?php include('header.php');
include('function.php');
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
$rno=$_REQUEST['rno'];
$branch_city=strupp($_REQUEST['branch_city']);
$executive=strupp($_REQUEST['executive']);
$designation=strupp($_REQUEST['designation']);
$entry_date=strupp($_REQUEST['entry_date']);
$advance_bal=strupp($_REQUEST['advance_bal']);
$visited=strupp($_REQUEST['visited']);
$from=strupp($_REQUEST['from']);
$to=strupp($_REQUEST['to']);
$trans_mode=strupp($_REQUEST['trans_mode']);
$km=strupp($_REQUEST['km']);
$amount=strupp($_REQUEST['amount']);
$da=strupp($_REQUEST['da']);
$bord=strupp($_REQUEST['bord']);
$food=strupp($_REQUEST['food']);
$tel=strupp($_REQUEST['tel']);
$sta=strupp($_REQUEST['sta']);
$xer=strupp($_REQUEST['xer']);
$cor=strupp($_REQUEST['cor']);
$int=strupp($_REQUEST['int']);
$paper=strupp($_REQUEST['paper']);
$leave=strupp($_REQUEST['leave']);
$other=strupp($_REQUEST['other']);
$leave=strupp($_REQUEST['leave']);
$buulty=strupp($_REQUEST['buulty']);
//$q=;
$q=mysql_query("SELECT * FROM department_list where id='$executive'");
$d=mysql_fetch_array($q);
$executive=$d['name'];

 $sql=mysql_query("INSERT INTO expense (report_no,branch,executive_name,designation,report_date,advance,town_visited,source, destination , mode,km,total_amount,da,boarding,fooding,tel,stationary,xerox,courier,internet,paper,leaves,others,buulty) VALUES ('$rno', '$branch_city','$executive', '$designation','$entry_date', '$advance_bal','$visited', '$from','$to','$trans_mode', '$km','$amount', '$da','$bord', '$food','$tel', '$sta','$xer', '$cor','$int', '$paper','$leave','$other','$buulty')")or die(mysql_error());
     header('location:expense_maseter_listing.php'); 
 

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
  <h1>Add New Expense Master Information</h1>
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
		<?php
		$q11=mysql_query("select id from expense order by id desc limit 1"); 
		$d11=mysql_fetch_array($q11);	
		$report_no=mt_rand(1,8).time();
		?>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
        <th valign="top">Report NO:</th>
			<td><input type="text" class="inp-form" name="rno" value="<?php echo "E".$report_no; ?>" readonly="" /></td>
	    <th valign="top">Branch Office:</th>
			<td>
			  <select name="branch_city" id="city" class="inp-form-select" onchange="showlocation(this.value)" > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT id,city,district,state FROM location_maste_info_list order by city");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option value="<?php echo $value['city']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['district']; ?>"><?php echo $value['city']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['district']; ?></option>
			  <?php 
			     }			     
 
              ?>
  </select>
			<input type="hidden" class="inp-form" name="branch_dis" value="" id="district" readonly="readonly"/>         </td>          
	   </tr>
	   <tr>
        <th valign="top">Executive Name:</th>
			<td>
			<select name="executive" id="exe" class="inp-form-select"  onchange="showdesignation(this.value)" > 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department_list");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
        </select>			</td>
	    <th valign="top">Designation:</th>
			<td><input type="text" class="inp-form" name="designation" id="designation" readonly="" /></td>          
	   </tr>
		<tr>
						
		 <th valign="top">Date:</th>
		  <td> <input type="text" class="inp-form" name="entry_date" value="<?php echo date('Y-m-d');  ?>" /></td> 
        <th valign="top">Tour Advance  Bal Rs:</th>			
			<td> <input type="text" class="inp-form" name="advance_bal" value="" /></td>  
	   </tr>	   
	   <tr>
	     <th valign="top">Expence Head:</th>
			<td>
			<select name="option" class="inp-form-select" id="ch" onchange="show12(this.value)" >
			  <option value="" selected="selected">Plz Select</option>
			  <option value="town">Town Visite</option>
			   <option value="mode">Mode Of Transport</option>
			  <option value="ta">Daily Allowance</option>			 
			  <option value="others">Others Expense</option>
			</select>	
		  </td>			 		
	   </tr>	  
	    <tr id="d11" style="display:none">
		  <th valign="top">Town Visited:</th>
			<td><input type="text" class="inp-form"  name="visited" /></td> 
		</tr>	   	
        <tr id="d12" style="display:none">
        <th valign="top">From:</th>
			<td><input type="text" class="inp-form" name="from" id="t1"  /></td>
          <th valign="top">To:</th>
			<td><input type="text" class="inp-form" name="to" id="t2"  /></td> 
	   </tr>	  
	   
	   <tr id="d21" style="display:none">
	    <th valign="top" id="trans">Mode Of Transport:</th>
			<td>			
			<select name="trans_mode" class="inp-form-select" id="tr11" >
       
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM expense_list WHERE parent='MODE OF TRANSPORT'");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['head']; ?>"><?php echo $value['head']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
					</td>	
        <th valign="top" id="unit" >KM:</th>
			<td><input type="text" class="inp-form"  id="unit "name="km" onkeyup="show14(this.value)" /></td>
	   </tr>
	  <tr id="d22" style="display:none">
	    <th valign="top">Total Amount:</th>
			<td><input type="text" class="inp-form" id="amount" name="amount" /><span style="font-size:25px"><sub>&#8377;</sub></span></td>
	   </tr> 
	   <tr id="d31" style=" display:none">
	   
          <th valign="top">Daily Allowance (DA):</th>
			<td><input type="text" class="inp-form" name="da" id="a3"  /></td>
			<th valign="top">Boarding / Lodging:</th>
			<td><input type="text" class="inp-form" name="bord" id="a4"  /></td> 
	   </tr>
	   <tr id="d32" style=" display:none">
	   
          <th valign="top">Fooding:</th>
			<td><input type="text" class="inp-form" name="food" id="a5"  /></td>
	   </tr>	   
	   <input type="hidden" name="am" id="am" value="" /> 
	   
      
	   <tr id="d41" style=" display:none">
	   
          <th valign="top">Telephone:</th>
			<td><input type="text" class="inp-form" name="tel" /></td>
           <th valign="top">Stationery:</th>
			<td><input type="text" class="inp-form" name="sta" /></td>
	   </tr>
	   
	   <tr id="d42" style=" display:none">
	   
          <th valign="top">Xerox:</th>
			<td><input type="text" class="inp-form" name="xer" /></td>
           <th valign="top">Courier Charges:</th>
			<td><input type="text" class="inp-form" name="cor" /></td>
	   </tr>
	   
	   <tr id="d43" style=" display:none">
	   
          <th valign="top">Internet Charges:</th>
			<td><input type="text" class="inp-form" name="int" /></td>
           <th valign="top">Paper Work</th>
			<td><input type="text" class="inp-form" name="paper" /></td>
	   </tr>
	   
	   <tr id="d44" style=" display:none">
	   
          <th valign="top">Leave:</th>
			<td><input type="text" class="inp-form" name="leave" /></td>
           <th valign="top">Others:</th>
			<td><input type="text" class="inp-form" name="other" /></td>
	   </tr>
	  <tr id="d45" style=" display:none">
	   
          <th valign="top">TRANSPORT / BUULTY CHARGE:</th>
			<td><input type="text" class="inp-form" name="buulty" /></td>
           
	   </tr>
 
       <!--<tr>      
        
			<th valign="top">Specification:</th>
			<td><input type="text" class="inp-form" name="specification" id="specification" value=""   /></td>         
	   </tr> -->
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />		</td>
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
