<?php include('header.php');
include('function.php');
include('main_sampling_data.php');

$sid = convert_uudecode(base64_decode($_REQUEST['id']));
//To know code of corporate
$success="";
$query=mysql_query("SELECT * FROM book_sample where id='$sid'");
$data=mysql_fetch_object($query);

$corporate_id=$sid;
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die("submit");

	$id = convert_uudecode(base64_decode($_REQUEST['id']));
	$sampling_Date=$_REQUEST['sampling_Date'];
	$name=trim(strtoupper($_REQUEST['name']));
	$address=trim(strtoupper($_REQUEST['address']));
	$city=$_REQUEST['city'];
	$district=trim(strtoupper($_REQUEST['district']));
	$state=trim(strtoupper($_REQUEST['state']));
	$country=trim(strtoupper($_REQUEST['country']));
	$salesman_name=trim(strtoupper($_REQUEST['salesman_name']));
	$sampling_type=trim(($_REQUEST['sampling_type']));
	$group=strtoupper($_REQUEST['group']);
	$series=strtoupper($_REQUEST['series']);
	$salesman_id=$_REQUEST['salesman_id'];
	$remarks=$_REQUEST['remarks'];
	$relate=$_REQUEST['relate'];
	

	$q="UPDATE book_sample SET name='$name',address='$address', city='$city',district='$district', state='$state', country='$country',salseman_id='$salesman_id',salesman_name='$salesman_name',sampling_type='$sampling_type', group1='$group',series='$series',remarks='$remarks',sampling_Date='$sampling_Date' where id='$id'";
		
	//echo "<pre>"; print_r ($_REQUEST); die("submit");
mysql_query("START TRANSACTION");
$qq=mysql_query($q) or die(mysql_error());

$uid=$id;

$teacher_len=$_REQUEST['teacher_len'];//fro teachr length

$len=$_REQUEST['len']; // for book length

$specimen_qty=$_REQUEST['specimen_qty'];

for($i=1;$i<=$teacher_len; $i++)
 {
  $k="_".$i;
  $teacher_id=$_REQUEST['teacher_id'.$k];
  if(isset($teacher_id)){
      
  for($j=1; $j<=$len; $j++)
     {
	   $m="_".$j;
	   $book_id=$_REQUEST['book_id'.$m];
	   
	    
	   if($sampling_type!='BOOKS_GIVEN')
	    $q2=mysql_query("INSERT INTO book_sample_details (uid,salseman_id,teacher_id,relate,sampling_Date) VALUES('$uid','$salesman_id','$teacher_id','$relate','$sampling_Date')")  or die( mysql_error());
		
	   else if(isset($book_id))	     
			$q2=mysql_query("INSERT INTO book_sample_details (uid,salseman_id,teacher_id,book_id,qty,relate,sampling_Date) VALUES('$uid','$salesman_id','$teacher_id','$book_id','$specimen_qty','$relate','$sampling_Date')")  or die( mysql_error());
			if($qq && $q2){ 
			mysql_query("COMMIT"); }
			else {
			mysql_query("ROLLBACK");}    
	  
	 }
   }
 }
   
 $success="Successfully Submitted";
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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#datepicker_rv" ).datepicker();
 $(".close-green").click(function(){
	 
	    $("#message-green").hide();
    });
});
</script>
<div id="content-outer">
<!-- start content -->
<div id="content">

<?php 
if(@($_GET['error'])){?>
<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error:- <?php echo $_GET['error'];?></td>
					
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
	</div><?php } //echo ('<meta http-equiv="refresh" content="0;url=/crm/admin/add_user.php">');?>
<?php if(($success!="")){?>
	<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo $success;?></td>
					
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
	</div><?php } ?>



<div id="page-heading">
 <?php
if($data->relate=="MEMBER")
{
	$pagetitlesection="Edit Book Sampling Member Chain Of School";
}else{
	$pagetitlesection="Edit Book Sampling ".$data->relate;
}
 ?>
 
  <h1>  <?php echo $pagetitlesection; ?> </h1>
</div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

<a href="book_sampling_details.php" style="color:#FFFFFF;"><div class="addin">
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
		 <th valign="top">Visit Date:</th>
			<td><input type="text" name="sampling_Date" id="datepicker" value="<?php echo $data->sampling_Date;?>"  class="inp-form33" />
</td>
		</tr>
        <tr>
			<th valign="top">School Name:</th>
			<td><input type="text" name="name"  class="inp-form33" value="<?php echo $data->name;?>"/>
</td>
			<th valign="top">Address:</th>
			<td><input type="text"  name="address" class="inp-form33" value="<?php echo $data->address;?>"/></td>
        </tr>
        <tr>
        <th>City:</th>
        <td><input type="text" name="city"  class="inp-form33" value="<?php echo $data->city;?>"/></td>
	
    <th>Distt:</th>
        <td><input type="text"  name="district" class="inp-form33" value="<?php echo $data->district;?>"/></td>
	</tr>
    
		
        <tr>
			<th valign="top">State:</th>
			<td><input type="text" name="state"  class="inp-form33" value="<?php echo $data->state;?>"/></td>
			<th valign="top">Country:</th>
			 <td><input type="text"  name="country" class="inp-form33" value="<?php echo $data->country;?>" />
</td>
		</tr>
        
     
		<tr id="p_school_old4">
			<th valign="top">Salesman Name:</th>
			<td> <input type="hidden" id="depart" value="SALES" />
			<select name="salesman_id"  id="sal_id"  style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;" onchange="return salseman_id_name(this.value)" > 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department_list WHERE department='SALES'");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>" <?php if($data->salseman_id==$value['id']){ echo "selected";  } ?> ><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td><input type="hidden" name="salesman_id_hidden" id="salesman_id_hidden" />
                <input type="hidden" name="salesman_name" id="salseman_name"  />
		<th valign="top">Sampling type:</th>
			<td> <select style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;" name="sampling_type">
			<option value="" selected="selected">Select</option>
			<option value="books_given" <?php if($data->sampling_type=="books_given"){ echo "selected"; } ?>>Books Given</option>
			<option value="visit" <?php if($data->sampling_type=="visit"){ echo "selected"; } ?> >Visit</option>
			<option value="follow_up"  <?php if($data->sampling_type=="visit"){ echo "selected"; } ?> >Follow up</option>
			<option value="others"  <?php if($data->sampling_type=="visit"){ echo "selected"; } ?> >Others</option>
			
			</select></td>
		</tr> 
      
        
         

        
         
        
          <tr>
			<th>Group</th>
					<td><select name="group" id="group" onchange="sampleBookList();corporateList(<?php echo $data->id; ?>)" style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
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
					<td><select name="series" id="series" onchange="sampleBookList();corporateList(<?php echo $data->id; ?>)" style="width: 183px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
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
		 
        
		<tr id="tr1"  ><td colspan="2">
		 <table style="margin-left: 80px; width:50%; float:left">
		 <tr id="" >
		 <td width="100">Select</td>
		  <td width="180">Book Name/series</td>
		  <td width="80" >Class</td>
		  <td >Qty</td>		  
		 </tr>		 
		 
         <tr >
		  <td colspan="4" id="booklist"></td>
		 </tr>
		</table>
		 </td>
		 <td colspan="2" valign="top">
		<table style="margin-left: 80px; width:50%; float:right">
		 <tr id="" >
		 <td width="88">Select</td>
		  <td width="232">Corporate Name</td>	  
		  <td width="100" >Last Visit</td>	  
		 </tr>		 
		 
         <tr >
		  <td colspan="3" id="booklist1"></td>
		 </tr>
		</table>
	    </td></tr>
		
		
	   
	   <tr id="tr2" style="display:none" ><td colspan="4">
		 
	    </td></tr>
		
		<tr>
		
		<th>Specimen Voucher Name Qty</th>
		<td valign="top">
		  <input type="text"  name="specimen_qty" class="inp-form33" value=""/>		
		</td>
		<td>
		</td>
		<td>
		</td>
		</tr>
		<tr>
		<th>Remarks</th>
		<td valign="top" colspan="3">
		  <textarea class="inp-form33" style=" width:100%; height:50px" name="remarks"><?php echo $data->remarks; ?></textarea>
		 </td> 		
		</tr>
	<tr>
	
		<th>&nbsp;</th>
		<td valign="top">
		
		  <input type="hidden"  name="relate" class="inp-form33" value="<?php echo $data->relate; ?>"/>		
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
