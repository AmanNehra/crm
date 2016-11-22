<?php include('header.php');
include('function.php');
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die();
	 $q="select v_no from return_voucher order by id desc LIMIT 1";
   $r=mysql_query($q);
   $row=mysql_fetch_row($r);
   if($row!=0)
   {
   		 $old_num=$row[0];
		$a=substr($old_num, 6);
		$b=$a+1;
		$v_no = "RV0000".$b;
   }
   else{
   	$v_no = "RV00001";
   }

//$v_no=strupp($_REQUEST['v_no']);
$v_date=strupp($_REQUEST['v_date']);
$godwon=strupp($_REQUEST['godwon']);
$v_time=strupp($_REQUEST['v_time']);
$department=strupp($_REQUEST['department']);
$salseman_id=strupp($_REQUEST['salseman_id']);
$salseman=strupp($_REQUEST['salseman']);
$city=($_REQUEST['city']);
$district=strupp($_REQUEST['district']);
$state=strupp($_REQUEST['state']);
$country=strupp($_REQUEST['country']);
$transportation=strupp($_REQUEST['transportation']);
$transport_type=strupp($_REQUEST['transport_type']);
$details=strupp($_REQUEST['details']);
$remarks=strupp($_REQUEST['remarks']);
$len=$_REQUEST['len'];

mysql_query("START TRANSACTION");
$q1=mysql_query("INSERT INTO return_voucher (v_no,v_date,godwon,v_time,department,salseman_id,salseman,city,district,state,country,transportation,transport_type,details,remarks) VALUES('$v_no','$v_date','$godwon','$v_time','$department','$salseman_id','$salseman','$city','$district','$state','$country','$transportation','$transport_type','$details','$remarks')") or die( mysql_error());

$uid=mysql_insert_id();
for($i=1;$i<$len; $i++){

$j="_".$i;//for name of item
$book_id=($_REQUEST['book_id'.$j]);
//echo $book_id; die;

$book_name=($_REQUEST['book_name'.$j]);

$class=($_REQUEST['class'.$j]);

$qty=($_REQUEST['qty'.$j]);

$price=($_REQUEST['price'.$j]);

$return=($_REQUEST['return'.$j]);


if($return!=""){
echo "INSERT INTO all_voucher (uid,salseman_id,book_id,book_name,class,price,return_qty,relate) VALUES('$uid','$salseman_id','$book_id','$book_name','$class','$price','$return','2')";
$q2=mysql_query("INSERT INTO all_voucher (uid,salseman_id,book_id,book_name,class,price,return_qty,relate) VALUES('$uid','$salseman_id','$book_id','$book_name','$class','$price','$return','2')")  or die( mysql_error());
}
if($q1 && $q2){ 
mysql_query("COMMIT"); 
header("location:return_voucher_listing.php");
}
else {
mysql_query("ROLLBACK");}
 }
}
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
  <h1>Return Voucher</h1>
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

		/* $q="select v_no from return_voucher order by id desc LIMIT 1";
   $r=mysql_query($q);
   $row=mysql_fetch_row($r);
   if($row!=0)
   {
   		 $old_num=$row[0];
		$a=substr($old_num, 6);
		$b=$a+1;
		$new_num = "RV0000".$b;
   }
   else{
   	$new_num = "RV00001";
   }*/
			
		//$voucher_no=mt_rand(1,8).time();
		?>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Voucher No.:</th>
			<td>Auto Generate<!--<input type="text" class="inp-form" name="v_no" value="<?php echo 	$new_num;//"VC".$voucher_no; ?>"  required />--></td>
			<th valign="top">Date:</th>
			<td><input type="text" name="v_date" class="inp-form" id="datepicker" value="<?php
echo date("Y-m-d"); 
?>"/></td>
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
			     <option  value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>    </td>
	
    <th>Time:</th>
        <td><input type="text" name="v_time" class="inp-form" value="<?php
echo date("h:i:s"); 
?>"/></td>
	</tr>
        <?php
	$user_type1=$_SESSION['user_type'];
	$rt=$_SESSION['SESS_id'];
    list($d,$n,$k)=mysql_fetch_array(mysql_query("SELECT department,name,id FROM department_list where user=$rt"));
	?>	
		
        <tr>
			<th valign="top">Department:</th>
			<td><select name="department" class="inp-form-select" onchange="return department1(this.value);"> 
      <?php
				if($user_type1==1 || $user_type1==2)
				{
			    	$query=mysql_query("SELECT * FROM department");
					echo "<option value='' selected='selected'> Plz Select</option>";
				}
				else
				{
			    	$query=mysql_query("SELECT * FROM department where `department`='$d'");
				}
			    
			    while($value=mysql_fetch_array($query))
			      {			  
			  ?>			  
<option <?php if($value['department']==$d){ echo "selected"; } ?> value="<?php echo $value['department']; ?>"><?php echo $value['department']; ?></option>                 
			  <?php 
			     }   
              ?>
  </select></td>
			<th valign="top">Salesman name :</th>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
			<script type="text/javascript">
			$( document ).ready(function() {
			show_book('<?php echo $k; ?>');
			});
			</script>

			 <td><div id="departmentdiv"><select name="" class="inp-form-select" onchange="return show_book(this.value);"> 
		    <option value="<?php echo $k; ?>" selected="selected"><?php echo $n; ?></option>
      
  </select>
  </div>  
  </td>
		</tr>
        <tr id="p_school_old4">
		<th>Station:</th>
        <td><input type="text" name="station" id="station" class="inp-form" value=""/></td>
			<th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
     </tr>
	 <tr id="p_school_old1">
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" value="" id="district" readonly="readonly"/></td>
		
       
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="" id="state" readonly="readonly"/> </td>
	 <tr id="p_school_old1">
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country"  id="country"value=""  readonly="readonly"/> </td>			
	 </tr>
	 <tr id="p_school_old1">	
			<th valign="top">Transpotation:</th>
			<td><select class="inp-form-select" name="transportation" id="transport" onchange="return onchangetransport_type(this.value);">
			<option value="">Select</option>

			 <option value="By HAND">By HAND</option>
			 <option value="By COURIER">By COURIER</option>
			 <option value="By TRANSPORT">By TRANSPORT</option>	  
			</select></td>	 
	 
			<th valign="top">Transport Type: </th>
			<td>
			
			<div id="voucher_transport_type">
			<select name="board" class="inp-form-select" > 
		   

 <option value="" selected="selected"> Plz Select</option>
  </select></div></td>
		</tr>
      
        <tr>
			<th valign="top">Details:</th>
			<td colspan="3"><textarea name="details" class="inp-form" style="height:40px; width:96%"></textarea></td>
			
        </tr>
         <tr>
			<th valign="top">Remarks</th>
			<td colspan="3"><textarea class="inp-form" style="height:40px; width:96%" name="remarks"></textarea></td>			
		</tr>     
        <tr ><td colspan="4">  
		 <table style="margin-left: 80px; width:100%">
		 <tr >
		  <td width="74">S.NO</td>
		  <td width="512">Book Name/series</td>
		  <td width="74" >Class</td>
		  <td width="72" >Balance Qty</td>
		  <td width="" >Return Qty</td>
		 </tr>
         <tr >
		  <td colspan="5" id="booklist"></td>
		 </tr>
		</table>
	    </td></tr>
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
