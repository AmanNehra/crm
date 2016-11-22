<?php
include('header.php');
include('function.php');
$id=convert_uudecode(base64_decode($_REQUEST['id']));

$query="SELECT * FROM commitment_voucher WHERE id='$id'";
$query=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($query);

if(isset($_POST['submit'])) { 
//echo '<pre>'; print_r($_REQUEST); die();
$c_no=strupp($_REQUEST['c_no']);
$c_date=strupp($_REQUEST['c_date']);
$c_year=($_REQUEST['c_year']);
$ref=($_REQUEST['ref']);
$ref_date=strupp($_REQUEST['ref_date']);
$pay_mode=($_REQUEST['pay_mode']);
$school=($_REQUEST['school']);
$principal=strupp($_REQUEST['principal']);
$address=strupp($_REQUEST['address']);
$contact_school=strupp($_REQUEST['contact_school']);
$given=($_REQUEST['given']);
$contact_teacher=strupp($_REQUEST['contact_teacher']);
$designation_teacher=strupp($_REQUEST['designation_teacher']);
$corporate=strupp($_REQUEST['corporate']);
$c_persion=strupp($_REQUEST['c_persion']);
$c_address=strupp($_REQUEST['c_address']);
$c_contact=strupp($_REQUEST['c_contact']);
$commited_by=($_REQUEST['commited_by']);
$remarks=strupp($_REQUEST['remarks']);
$gross_amount=$_REQUEST['gross_amount'];
$book_discount=$_REQUEST['book_discount'];
$net_amount=$_REQUEST['net_amount'];
$gift_pad=($_REQUEST['gift_pad']);
$gift_percent=($_REQUEST['gift_percent']);
$total_discount=($_REQUEST['total_discount']);

//for file Upload
	if(!empty($_FILES["attachment"]['name'])){	   
		$target_dir = "upload/";
		unlink($target_dir.$row['attachment']);		 
		$attachment=basename(time().$_FILES["attachment"]["name"]);//For file name;
		$target_file = $target_dir . basename(time().$_FILES["attachment"]["name"]);
		move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file);			
		
	}
	else
	 $attachment=$row['attachment'];	
//End

//INsert
mysql_query("START TRANSACTION");
		$q1=mysql_query("UPDATE commitment_voucher  SET c_date='$c_date',c_year='$c_year',ref='$ref',ref_date='$ref_date',pay_mode='$pay_mode',school='$school',principal='$principal',address='$address',contact_school='$contact_school',given='$given',contact_teacher='$contact_teacher',designation_teacher='$designation_teacher',corporate='$corporate',c_persion='$c_persion',c_address='$c_address',c_contact='$c_contact',commited_by='$commited_by',remarks='$remarks',gross_amount='$gross_amount',book_discount='$book_discount',net_amount='$net_amount',attachment='$attachment',gift_pad='$gift_pad',gift_percent='$gift_percent',total_discount='$total_discount',status=1,approved_by='$usname' WHERE id='$id'") or die( mysql_error());			
		
		if($q1){
		 mysql_query("COMMIT");	
		 header("location:commitment_voucher_listing_validate1.php");
		 }
		 else
		 mysql_query("ROLLBACK");
	
		

//End
}


?>
<!-- start content-outer -->
<script>
function showprincipal(id){
if(id==""){ 
 $("#address").val("");
   $("#contact").val("");
   $("#school").val("");
   $("#principal").val("");
   }
else{
$.ajax({
  url:"show_principal_data.php",
  type: "POST",
  data: "id="+id,
  success:function(result){ 
  var result=result.split("#"); 
   $("#principal").val(result[5]);
   var contact=result[1];
   if(result[2]!="")
     {
	  contact=contact+","+result[2];	 
	 }
   if(result[3]!="")
     {
	  contact=contact+","+result[2];
	 }	
   $("#address").val(result[0]);
   $("#contact").val(contact);
   $("#school").val(result[6]);    
  }}); 
  showgiven(id);
 }
}
function showgiven(id){
$.ajax({
  url:"show_teacher_data.php",
  type: "POST",
  data: "id="+id,
  success:function(result){
  $("#teacherdiv").html(result);
   }});
}
function teacher_data(id){
	$.ajax({
	  url:"teacher_data.php",
	  type: "POST",
	  data: "id="+id,
	  success:function(result){ 
	  result=result.split("#");
	  $("#given1").val(result[0]);
	  var contact=result[1];
	   if(result[2]!="")
		 {
		  contact=contact+","+result[2];	 
		 }
	   if(result[3]!="")
		 {
		  contact=contact+","+result[2];
		 }
	  $("#contact_teacher").val(contact);
	  $("#designation_teacher").val(result[4]);	  	  
	   }});
}
function showcorporate(id){
	$.ajax({
		  url:"show_corporate_data.php",
		  type: "POST",
		  data: "id="+id,
		  success:function(result){
		  $("#corporatediv").html(result);
   }});		  
		 
}
function corporate_persion_data(id){ 
	$.ajax({
	  url:"corporate_persion_data.php",
	  type: "POST",
	  data: "id="+id,
	  success:function(result){
	  result=result.split("#");
	  $("#c_persion").val(result[0]);
	  $("#c_address").val(result[1]);
	  var contact=result[2];
	   if(result[3]!="")
		 {
		  contact=contact+","+result[3];	 
		 }
	   if(result[4]!="")
		 {
		  contact=contact+","+result[4];
		 }  
	   $("#c_contact").val(contact);
	   }});

}
function showlist(){ 
var school=$("#school").val();
var corporate=$("#corporate").val();
$.ajax({
	  url:"showlist_data.php",
	  type: "POST",
	  data: "school="+school+"&corporate="+corporate,
	  success:function(result){  
	  $("#showlist").html(result);
   }});
}
function TotalDiscount(id,val){
var qty=$("#"+id+"c").val();
var amu=$("#"+id+"a").val();
var dis=$("#"+id).val();
var discount=(dis*amu)/100;
var total=amu-discount;
var grandtotal=total*qty;
$("#"+id+"b").val(grandtotal);
}
</script>
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
  <h1>Commitment Voucher Approved 1 </h1>
</div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data"  onsubmit="if(!validate()){return false;};" id="formoid" name="form">
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
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
        <tr>
			<td colspan="4">
</td>
		</tr>
        <tr>
        <th width="26%">Commitment No</th>
        <td width="17%"><input type="text" name="c_no" class="inp-form" value="<?php echo $row['c_no']; ?>"/></td>
	
    <th width="27%">Commitment Date</th>
        <td width="14%"><input name="c_date" type="text" class="inp-form" id="datepicker1" value="<?php echo $row['c_date']; 
?>"></td>
		</tr>
	   <tr> 
        <th width="10%">Year</th>
        <td width="6%"><select name="c_year" class="inp-form-select">
		<option selected="selected" value="">Select</option>
		<?php
		 $current_year=date('Y');	 
		 for($k=2014; $k<$current_year; $k++){
		  $c=$k;
		  $d=$c+1;		  
		?>
          <option <?php if($row['c_year']==$c."-".$d) echo 'selected="selected"'; ?> value="<?php echo $c."-".$d;?>"><?php echo $c."-".$d;?></option>
        <?php } ?>  
        </select></td>	
        <th width="26%">Refrence by</th>
        <td width="17%"><select name="ref" class="inp-form-select">
		<option selected="selected" value="">Select</option>
		<option <?php if($row['ref']=="By Mail") echo 'selected="selected"'; ?> value="By Mail">By Mail</option>
		<option <?php if($row['ref']=="By Fax") echo 'selected="selected"'; ?>value="By Fax">By Fax</option>
		<option <?php if($row['ref']=="By Hand") echo 'selected="selected"'; ?>value="By Hand">By Hand</option>
		<option <?php if($row['ref']=="By Telephonic") echo 'selected="selected"'; ?>value="By Telephonic">By Telephonic</option>
		</select>
		</td>
	   </tr>
	   <tr>
       <th width="27%">Refrence Date</th>
        <td width="14%"><input name="ref_date" id="datepicker" type="text" value="<?php echo $row['ref_date'];?>" class="inp-form"/></td> 
        <th width="10%">Pay mode</th>
        <td width="6%">
		<select name="pay_mode" class="inp-form-select">
		<option selected="selected" value="">Select</option>
		<option <?php if($row['pay_mode']=="Cash") echo 'selected="selected"'; ?> value="Cash">Cash</option>
		<option <?php if($row['pay_mode']=="Cheque") echo 'selected="selected"'; ?> value="Cheque">Cheque</option>
		<option <?php if($row['pay_mode']=="Gift") echo 'selected="selected"'; ?> value="Gift">Gift</option>
		</select>
		</td>
	   </tr>
	  <tr>
        <th width="26%">School</th>
        <td width="44%" ><select class="inp-form-select" id="v1" onchange="return showprincipal(this.value); "> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT id,name FROM master_list ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($row['school']==$value['name']) echo 'selected="selected"'; ?>  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td> <input type="hidden" name="school"  value="<?php echo $row['school']; ?>" id="school" />       
        <th width="10%">Principal</th>
        <td width="6%"><input name="principal" id="principal" type="text" class="inp-form" value="<?php echo $row['principal']; ?>" readonly=""/></td>
	 </tr>
	  <tr>
        <th width="26%">Address</th>
        <td width="17%"><input name="address"  id="address"type="text" class="inp-form" value="<?php echo $row['address']; ?>" readonly=""/></td>         
        <th width="10%">Contact No. </th>
        <td width="6%"><input name="contact_school" id="contact" type="text" class="inp-form" value="<?php echo $row['contact_school']; ?>" readonly=""/></td>
	  </tr>	  
	  <tr>
        <th width="26%">To be given</th>
		
        <td>
		<div id="teacherdiv"><select name="" id="" class="inp-form-select" > 
		<option value="" selected="selected">Select</option>
		
  </select>
       </div>
	   <input type="hidden" name="given"  value="<?php echo $row['given'];?>" id="given1" />
	</td>
	
        <th width="27%">Contact No. </th>
        <td width="14%"><input name="contact_teacher" id="contact_teacher" type="text" class="inp-form" value="<?php echo $row['contact_teacher'];?>" readonly=""/></td> 
      </tr>
	  <tr>
        <th width="10%">Designation</th>
        <td width="6%"><input name="designation_teacher" id="designation_teacher" type="text" class="inp-form" value="<?php echo $row['designation_teacher']; ?>" readonly=""/></td>	
        
	  </tr> 
	    <th width="26%">Corporate</th>
        <td width="17%"><select  class="inp-form-select" id="v2" onchange="return showcorporate(this.value); "> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT id,name FROM corporate_list ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($row['corporate']==$value['name']) echo 'selected="selected"'; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td>  
        <th width="10%">C. Person </th>
        <td width="6%"><div id="corporatediv"><select name="" id="" class="inp-form-select" > 
		<option value="" selected="selected">Select</option>
		
       </select>
	   <input type="hidden" name="corporate" id="corporate" value="<?php echo $row['corporate']; ?>"  />
       </div><input type="hidden" name="c_persion"  id="c_persion" value="<?php echo $row['c_persion']; ?>" class="inp-form"/></td>
        
	  </tr> 
	    <th width="26%">Address</th>
        <td width="17%"><input name="c_address" id="c_address" type="text" value="<?php echo $row['c_address']; ?>" class="inp-form"/></td>        
        <th width="10%">Contact No. </th>
        <td width="6%"><input name="c_contact" id="c_contact" type="text" value="<?php echo $row['c_contact']; ?>"class="inp-form"/></td>
	    
	  </tr>
	  <tr>
	    <th width="26%">Commited By</th>
        <td width="17%"><select name="commited_by" class="inp-form-select">
		<option value="" selected="selected">Select</option>
		<?php
			    $query=mysql_query("SELECT name FROM department_list WHERE department='SALES' ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($row['commited_by']==$value['name']) echo 'selected="selected"'; ?> value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
		</select>
		</td>      
        <th valign="top">Remarks</th>
		<td ><textarea class="inp-form" style="height:40px; width:99%" name="remarks"><?php echo $row['remarks']; ?></textarea></td>
	</tr>
	
	
		  <tr>		  
		 
         </tr>
		 <tr>
	   <th width="27%">Gross Amount</th>
        <td width="14%"><input name="gross_amount" type="text" id="gross" value="<?php echo $row['gross_amount']; ?>" class="inp-form"/></td> 
		 <th>Book Discount&nbsp;&nbsp;(Fill)</th>			
		   <td><input type="text" name="book_discount" id="discount" onkeyup="return discountOnGross(this.value);" value="<?php echo $row['book_discount']; ?>" class="inp-form"/></td>
						
	</tr>
	<tr>
	  
	    <th width="10%">Net Amount</th>
        <td width="6%"><input name="net_amount" id="net" type="text" class="inp-form" value="<?php echo $row['net_amount']; ?>" readonly=""/></td>
		
		<th width="26%">Gift Pad</th>
        <td width="17%"><select name="gift_pad" id="gift_pad" class="inp-form-select">
          <option value="" selected="selected">Select</option>
          <option <?php if($row['gift_pad']=="Net") echo 'selected="selected"'; ?> value="Net">Net</option>
          <option <?php if($row['gift_pad']=="Gross") echo 'selected="selected"'; ?> value="Gross">Gross</option>          
        </select></td>
		
	</tr>	  
	  <tr>         
        
		 <th width="27%">Gift %&nbsp;&nbsp;(Fill)</th>
        <td width="14%"><input type="text" name="gift_percent" id="gift_percent" value="<?php echo $row['gift_percent']; ?>" onkeyup="return discountOnGift(this.value);" class="inp-form"  /></td>
		<th width="10%">Total Amount </th>
        <td width="6%"><input name="total_discount" id="total_discount" value="<?php echo $row['total_discount']; ?>" type="text" class="inp-form" readonly=""/></td>
	  </tr>
	  <tr>       
        	
		
		<th>Attach Document</th>
		<td><input type="file" name="attachment" class="inp-form" /></td>	
	</tr>
       
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>		
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
