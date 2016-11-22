<?php
session_start();
include('header.php');
include('function.php');
$id=convert_uudecode(base64_decode($_REQUEST['id']));
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die();

$godwon=strupp($_REQUEST['godwon']);

$details=strupp($_REQUEST['details']);

$query="UPDATE issue_voucher SET godwon='$godwon',details='$details' WHERE id='$id' ";

$q1=mysql_query($query) or die( mysql_error());
if($q1)
  header("location:issue_voucher_listing.php");
}

$query=mysql_query("SELECT * FROM issue_voucher WHERE id='$id'");
$data=mysql_fetch_array($query);
$uid=$data['id'];

$query1=mysql_query("SELECT * FROM all_voucher WHERE (uid='$uid') AND (relate=1) ");
?>
<!-- start content-outer -->
<script src="jscript.js"></script>
<script>
 function onchangedepartment(did)
 {
  $.ajax({
  url:"department_result.php",
  type: "POST",
  data: "department="+did,
  success:function(result){
   $("#departmentdiv").html(result);    
    //alert (result);
  }}); 
 }
 
  function onchangeissuevoucher(did)
 {
   $.ajax({
  url:"issue_voucher_contact.php",
  type: "POST",
  data: "contact="+did,
  success:function(result){
   $("#issuevoucher_contact").html(result);
    
    //alert (result);
  }});

 
 
 }
 
 
 
 function onchangetransport_type(did)
 {
  $.ajax({
  url:"voucher_transport_type.php",
  type: "POST",
  data: "transport="+did,
  success:function(result){
   $("#voucher_transport_type").html(result);    
  }});

 
 
 }


</script>
















<script>
 function onchangeajax(pid)
 { 
 //alert ("sunil");
 xmlHttp=GetXmlHttpObject()
 if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 
 var url="location_result.php",
 url=url+"?id="+pid
 url=url+"&sid="+Math.random()
 //alert (url);
 //document.getElementById("statediv").innerHTML='Please wait..<img border="0" src="images/ajax-loader.gif">'
 if(xmlHttp.onreadystatechange=stateChanged)
 {
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 $('#p_school_old1').hide();
  $('#p_school_old2').hide();
   $('#p_school_old').hide();
    $('#p_school_old4').hide();
 return true; 
	
 }
 else
 {
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 return false;
 }
 }
 
 function stateChanged()
 {
 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 document.getElementById("statediv").innerHTML=xmlHttp.responseText
 return true;
 }
 }
 
 function GetXmlHttpObject()
 {
 var objXMLHttp=null
 if (window.XMLHttpRequest)
 {
 objXMLHttp=new XMLHttpRequest()
 }
 else if (window.ActiveXObject)
 {
 objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
 }
 return objXMLHttp;
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
  <h1>Specimen Voucher View </h1>
  <h4 align="center" style="color:#990000">You Can Update Only Godown And Details Field</h4>
</div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

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
		<?php			
		$voucher_no=mt_rand(1,8).time();
		?>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Voucher No.:</th>
			<td><input type="text" class="inp-form" name="v_no" value="<?php echo $data['v_no'];?>"/></td>
			<th valign="top">Date:</th>
			<td><input type="text" name="v_date" class="inp-form" id="datepicker" value="<?php echo $data['v_date'];?>"/></td> 
        </tr>
        <tr>
        <th>Godown:</th>
        <td><select name="godwon" class="inp-form-select"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT name FROM godwon_list ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($data['godwon']==$value['name']) echo 'selected="selected"';?> value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td>
        <th>Time:</th>
        <td><input type="text" name="v_time" class="inp-form" value="<?php echo $data['v_time'];?>"/></td>
	</tr>
    
		
        <tr>
			<th valign="top">Department:</th>
			<td><input type="text" class="inp-form" name="Input2" value="<?php echo $data['department'];?>"/></td>
			<th valign="top">Salesman name :</th>
			<?php $salesman_name=salesman_name($data['salseman_id']); ?>
			 <td><input type="text" class="inp-form" name="" value="<?php  echo $salesman_name ;?>"/> </td>
		</tr>
       
     
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			<td><input type="text" class="inp-form" name="" value="<?php echo $data['city'];?>"/></td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" value="<?php echo $data['district'];?>" id="district" readonly="readonly"/></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="<?php echo $data['state'];?>" id="state" readonly="readonly"/> </td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country"  id="country"value="<?php echo $data['country'];?>"  readonly="readonly"/> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Transpotation:</th>
			<td><input type="text" class="inp-form" name="" value="<?php echo $data['transportation'];?>"/></td>
			<th valign="top">Transport Type: </th>
			<td><input type="text" class="inp-form" name="" value="<?php echo $data['transport_type'];?>"/></td>
		</tr>
      
        <tr>
			<th valign="top">Details:</th>
			<td colspan="3"><textarea name="details" class="inp-form" style="height:40px; width:99%"><?php echo $data['details'];?></textarea></td>
        </tr>
        
        
        <tr>
			<th valign="top">Contact:</th>
			<td><input type="text" class="inp-form" name="" value="<?php echo $data['corporate_name'];?>"/></td>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="Input" value="<?php echo $data['corporate_person'];?>"/></td>
        </tr>
        <tr>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="c_address"  id="address0" value="<?php echo $data['c_address'];?>" readonly="readonly" /></td>
			<th valign="top">City:</th>
			<td> 
			<input type="text" class="inp-form" name="c_city" id="city0"  value="<?php echo $data['c_city'];?>"readonly="readonly"  /></td>
        </tr>
        <tr>
			<th valign="top">District</th>
			<td>
			<input type="text" class="inp-form" name="c_district" value="<?php echo $data['c_district'];?>" id="district0"  readonly="readonly"/></td>
			<th valign="top">State:</th>
			<td>
			<input type="text" class="inp-form" name="c_state" value="<?php echo $data['c_state'];?>" id="state0" readonly="readonly"/></td>
        </tr>
        <tr>
			<th valign="top">Country</th>
			<td>
			<input type="text" class="inp-form" name="c_country" value="<?php echo $data['c_country'];?>" id="country0" readonly="readonly"/></td>
			<th valign="top">Teacher Copy:</th>
			<td><input type="text" class="inp-form" name="" value="<?php echo $data['teachercopy'];?>"/></td>
        </tr>

        
         <tr>
			<th valign="top">Remarks</th>
			<td colspan="3"><textarea class="inp-form" style="height:40px; width:99%" name="remarks"><?php echo $data['remarks'];?></textarea></td>			
		</tr>
    
          <tr>
			<th>Group</th>
				  <td><input type="text" class="inp-form" name="" value="<?php echo $data['group1'];?>"/></td>					
					<th>Series</th>
					<td><input type="text" class="inp-form" name="" value="<?php echo $data['series'];?>"/></td>
          </tr>		  
		 <tr ><td colspan="4">
		 <table style="margin-left: 80px; width:100%">
		 <tr >
		  <td width="100">S.NO</td>
		  <td width="210">Book Name/series</td>
		  <td width="80" >Class</td>
		  <td >Qty</td>
		 </tr>
		 <?php $i=1; while($row=mysql_fetch_array($query1)) { ?>
         <tr >
		  <td ><input type="text" name="" value="<?php echo $i;?>" class="textsmall" readonly=""/></td>			
			<td ><input type="text" name="" value="<?php echo $row['book_name'];?>" class="textbig"  style="width: 180px;" readonly=""/></td>
			<td  ><input type="text" name="" value="<?php echo $row['class'];?>" class="textsmall"/></td>
			<td style="margin-left:20px;" ><input type="text" name="" value="<?php echo $row['qty'];?>" class="textsmall" readonly=""/></td>
		 </tr>
		 <?php $i+=1; } ?>
		</table>
	    </td></tr>
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
<td>



</td>
</tr>
</table>
 
 
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
