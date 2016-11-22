<?php include('header.php');
include('function.php');
include('main_sampling_data.php');
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die();

$school_name=trim(strtoupper($_REQUEST['school_name']));
$address=trim(strtoupper($_REQUEST['address']));
$city=$_REQUEST['city'];
$district=trim(strtoupper($_REQUEST['district']));
$state=trim(strtoupper($_REQUEST['state']));
$country=trim(strtoupper($_REQUEST['country']));
$salesman_name=trim(strtoupper($_REQUEST['salesman_name']));
$sampling_type=trim(strtoupper($_REQUEST['sampling_type']));
$group=strtoupper($_REQUEST['group']);
$series=strtoupper($_REQUEST['series']);
$class_main=strtoupper($_REQUEST['class_main']);

$salesman_id=$_REQUEST['salesman_id'];
$book_name=($_REQUEST['book_name']);
$book_name=serialize($book_name);
$class=($_REQUEST['class']);
$class=serialize($class);
$qty=($_REQUEST['qty']);
$qty=serialize($qty);
$price=($_REQUEST['price']);
$price=serialize($price);

$query=mysql_query("SELECT city FROM location_maste_info_list WHERE id='$city'");
$data=mysql_fetch_array($query);
$city=$data['city'];

mysql_query("START TRANSACTION");
$q="INSERT INTO book_sample (name, address, city,district, state, country,salesman_name,sampling_type,group1,series,main_class,relate) VALUES ('$school_name','$address','$city', '$district','$state', '$country','$salesman_name','$sampling_type','$group','$series','$class_main','SCHOOL' )";

$qq=mysql_query($q) or die(mysql_error());

$uid=mysql_insert_id();

$q2=mysql_query("INSERT INTO all_voucher (uid,salseman_id,book_name,class,qty,price,relate) VALUES('$uid','$salesman_id','$book_name','$class','$qty','$price','SCHOOL')")  or die( mysql_error());
if($qq && $q2){ 
mysql_query("COMMIT"); }
else {
mysql_query("ROLLBACK");}
//echo $q; die();

//$sql=mysql_query()or die(mysql_error());
     //header('location:master_listing.php'); 
  
}
 





?>
<!-- start content-outer -->
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
 
 alert(did);
 

  $.ajax({
  url:"voucher_transport_type.php",
  type: "POST",
  data: "transport="+did,
  success:function(result){
   $("#voucher_transport_type").html(result);
    
    alert (result);
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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#datepicker_rv" ).datepicker();
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




<div id="page-heading">
  <h1>Book Sampling School </h1>
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
	
	<?php //echo '<pre>'; print_r ($re_sample);?>
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">School Name:</th>
			<td><input type="text" name="school_name"  class="inp-form33" value="<?php echo $re_sample->name;?>"/>
</td>
			<th valign="top">Address:</th>
			<td><input type="text"  name="address" class="inp-form33" value="<?php echo $re_sample->address;?>"/></td>
        </tr>
        <tr>
        <th>City:</th>
        <td><input type="text" name="city"  class="inp-form33" value="<?php echo $re_sample->city;?>"/></td>
	
    <th>Distt.:</th>
        <td><input type="text"  name="district" class="inp-form33" value="<?php echo $re_sample->district;?>"/></td>
	</tr>
    
		
        <tr>
			<th valign="top">State:</th>
			<td><input type="text" name="state"  class="inp-form33" value="<?php echo $re_sample->state;?>"/></td>
			<th valign="top">Country:</th>
			 <td><input type="text"  name="country" class="inp-form33" value="<?php echo $re_sample->country;?>" />
</td>
		</tr>
        
     
		<tr id="p_school_old4">
			<th valign="top">Salesman Name:</th>
			<td> <input type="hidden" id="depart" value="SALES" />
			<select   style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;" onchange="return salseman_id_name(this.value)" > 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department_list WHERE department='SALES'");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td><input type="hidden" name="salesman_id" id="salseman_id" />
                <input type="hidden" name="salesman_name" id="salseman_name"  />
		<th valign="top">Sampling type:</th>
			<td> <select style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;" name="sampling_type">
			<option>Select</option>
			<option value="books_given">Books Given</option>

<option value="visit">Visit</option>

<option value="follow_up">Follow up</option>
<option value="others">Others</option>


			
			</select></td>
		</tr> 
      
        
         

        
         
        
          <tr>
			<th>Group</th>
					<td><select name="group" id="group" style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
			<option value="" selected="selected"> Plz Select</option>
		<?php
				$query=mysql_query("SELECT DISTINCT subject FROM `item_master_list`");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option  value="<?php echo $value['subject']; ?>"><?php echo $value['subject']; ?></option>
			  <?php 
				 }   
			  ?>
	</select>      </td>					
					<th>Series</th>
					<td><select name="series" id="series" style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
			<option value="" selected="selected"> Plz Select</option>
		<?php
				$query=mysql_query("SELECT DISTINCT series FROM `series_master_list`");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option  value="<?php echo $value['series']; ?>"><?php echo $value['series']; ?></option>
			  <?php 
				 }   
			  ?>
	</select></td>
	      </tr>
		  
		  <tr>
		   <th>Class</th> 
		   <td><select name="class_main" id="class_main" style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
			<option value="" selected="selected"> Plz Select</option>
		<?php
				$query=mysql_query("SELECT class FROM `class`");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option  value="<?php echo $value['class']; ?>"><?php echo $value['class']; ?></option>
			  <?php 
				 }   
			  ?>
	</select></td>
		   
			<th></th>
			<td><input type="button" value="Show Book List" name="show" style=" height:30px;text-align:center; font-weight:bold; color: #006600" onclick="sampleBookList()" /></td>
					
         </tr>
        
		<tr ><td colspan="4">
		 <table style="margin-left: 80px; width:100%">
		 <tr >
		 <td width="100">S.NO</td>
		  <td width="485">Book Name/series</td>
		  <td width="80" >Class</td>
		  <td >Qty</td>		  
		 </tr>
         <tr >
		  <td colspan="4" id="booklist"></td>
		 </tr>
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
