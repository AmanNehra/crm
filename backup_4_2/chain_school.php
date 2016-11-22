<?php include('header.php');
include_once('function.php');
if(isset($_POST['submit'])) {

$name=strupp($_REQUEST['name']);
$address=strupp($_REQUEST['address']);
$city=($_REQUEST['city']);
$district=($_REQUEST['district']);
$state=($_REQUEST['state']);
$country=($_REQUEST['country']);
$pin=($_REQUEST['pin']);
$std=($_REQUEST['std']);
$phone1=($_REQUEST['phone1']);
$phone2=($_REQUEST['phone2']);
$mobile=($_REQUEST['mobile']); 
$bs_id=$_REQUEST['bs_id'];
$fax=($_REQUEST['fax']);
$school=($_REQUEST['school']);
$web=($_REQUEST['web']);
$email=($_REQUEST['email']);

$Chain=($_REQUEST['Chain']);
$Visit_type=($_REQUEST['Visit_type']);
$Member=($_REQUEST['Member']);

   $query=mysql_query("SELECT name FROM corporate_list where id='$bs'") or die(mysql_error());
   
   $value=mysql_fetch_assoc($query);
			    $bs=$value['name'];

$sql=mysql_query("INSERT INTO chain_school_list (name, address, city, district, state, country, pin,std, phone1, phone2, mobile, bs_id, fax, school,web,email,Chain,Visit_type,Member) VALUES ('$name', '$address', '$city', '$district', '$state','$country', '$pin','$std','$phone1','$phone2', '$mobile', '$bs_id', '$fax', '$school', '$web','$email','$Chain','$Visit_type','$Member')")or die(mysql_error());
     header('location:chain_school_listing.php'); 
}


?>
<!-- start content-outer -->
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
  <h1>Add Chain of School</h1>
</div>
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
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" /></td>
			<th valign="top">Address *:</th>
			<td><input type="text" class="inp-form" name="address" id="address" /></td>
		</tr>
        
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" value="" id="district" readonly="readonly"/></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="" id="state" readonly="readonly"/> </td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country"  id="country"value=""  readonly="readonly"/> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" value=""  id="pin" readonly="readonly"/> </td>
			<th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" value="" id="std"  readonly="readonly"/> </td>
               
		</tr>
        
        <tr>
			<th valign="top">Phone 1:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone1" id="phone1" required/></td>
			<th valign="top">Phone 2:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone2" id="phone2"  /></td>
		</tr>
        
         <tr>
			<th valign="top">Mobile 1:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="mobile" id="mobile"  /></td>
			<th valign="top">Attach B S :</th>
			<td>
			<select name="bs_id" id="bs_id" class="inp-form-select"  > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT id,code,name FROM corporate_list order by name");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['code']; ?></option>
			  <?php 
			     }
			     //for first time fill district and state  
			      $query=mysql_query("SELECT district,state,country,pin,std FROM location_maste_info_list order by city"); 
			    $value=mysql_fetch_assoc($query);
 
              ?>
  </select>
			 </td>
		</tr>

        
         <tr>
			<th valign="top">Fax No:</th>
			<td><input type="text" class="inp-form" name="fax" id="fax" /></td>
			<th valign="top">School list:</th>
			<td><input type="text" class="inp-form" name="school" id="school" /></td>
		</tr>
        
        
         <tr>
			<th valign="top">Website:</th>
			<td><input type="text" class="inp-form" name="web" id="web" /></td>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" /></td>
		</tr>
        
        
       <!--  <tr>
			<th valign="top">Chain:</th>
			<td><input type="text" class="inp-form" name="Chain" id="Chain" /></td>
			<th valign="top">Visit Type:</th>
			<td><input type="text" class="inp-form" name="Visit_type" id="Visit_type" /></td>
		</tr>
        
         <tr>
			<th valign="top">Member:</th>
			<td><input type="text" class="inp-form" name="Member" id="Member" /></td>
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
