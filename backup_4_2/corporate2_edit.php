<?php include('header.php');
include('function.php');
$id = convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));
$p=$_REQUEST['p'];
if(isset($_POST['submit'])) {

$code=$_REQUEST['code'];
$name=strupp($_REQUEST['name']);
$persion=strupp($_REQUEST['persion']);
$designation=strupp($_REQUEST['designation']);
$address=strupp($_REQUEST['address']);
$dob=$_REQUEST['dob'];
$mstatus=$_REQUEST['mstatus'];
$relation=strupp($_REQUEST['relation']);
$city=strupp($_REQUEST['city']);
$district=($_REQUEST['district']);
$state=strupp($_REQUEST['state']);
$country=strupp($_REQUEST['country']);
$pin=strupp($_REQUEST['pin']);
$std=strupp($_REQUEST['std']);
$phone1=strupp($_REQUEST['phone1']);
$mobile1=strupp($_REQUEST['mobile1']); 
$mobile2=strupp($_REQUEST['mobile2']);
$email=$_REQUEST['email'];

$sq=mysql_query("UPDATE corporate_sub SET code='$code',name='$name',persion='$persion', designation='$designation', address='$address',dob='$dob',mstatus='$mstatus',relation='$relation', city='$city', district='$district',state='$state',country='$country',pin='$pin', std='$std', phone1='$phone1',mobile1='$mobile1', mobile2='$mobile2', email='$email' where id='$id'") or die(mysql_error());
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     if($p==21)
		    header("location:corporate_person.php");
	     else
	       header("location:corporate2.php?sid=".base64_encode(convert_uuencode($sid)));
	    }
		else{ header('location:corporate2_edit.php?id='.base64_encode(convert_uuencode($id)));}


}
require_once('config.php');
$result=mysql_query("SELECT * FROM corporate_sub WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
 <script>
$(function() {
$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});


$(function() {
$( "#datepicker1" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});
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
  <h1>Edit Corporate Master</h1>
</div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
	   <input type="hidden" name="code" value="<?php echo $row['code']; ?>"  />
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Corporate Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name']; ?>"  readonly/></td>
			<th valign="top" style="width: 66px">Contact Person:</th>
			<td><input type="text" class="inp-form" name="persion" id="persion" value="<?php echo $row['persion']; ?>" /></td>
		</tr> 
		<tr>
			<th valign="top">Designation:</th>
			<td>  <select name="designation" id="pid" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT name FROM school_designation") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['designation']==$resultdeg['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select>
            </td>
			<th valign="top" style="width: 66px">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" value="<?php echo $row['address']; ?>" /></td>
		</tr>
    
		<tr>
			<th valign="top">DOB:</th>
			<td> <input type="text" class="inp-form"  id="datepicker" name="dob" value="<?php echo $row['dob']; ?>"/>			
			</td>
			<th valign="top" style="width: 66px">M Satus:</th>
			<td> <input type="text" class="inp-form"  id="datepicker1" name="mstatus"  value="<?php echo $row['mstatus']; ?>"/></td>
		</tr>         
        
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" value="<?php echo $row['city']; ?>" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
			
		<th valign="top" style="width: 66px">District:</th>
			<td><input type="text" class="inp-form" name="district"  id="district"value="<?php echo $row['district']; ?>" /></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state"  id="state"value="<?php echo $row['state']; ?>" /> </td>
			<th valign="top" style="width: 66px">Country:</th>
			<td><input type="text" class="inp-form" name="country" id="country" value="<?php echo $row['country']; ?>" /> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" id="pin" value="<?php echo $row['pin']; ?>" /> </td>
			<th valign="top" style="width: 66px">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" id="std" value="<?php echo $row['std']; ?>" /> </td>
               
		</tr>
        
         <tr>
			<th valign="top">Relation:</th>
			<td> <select name="relation" id="relation" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT name FROM relation") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($row['relation']==$resultdeg['name']) echo ' selected="selected"' ;?>VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select>
            </td>
			<th valign="top" style="width: 66px">Phone1:</th>
			<td><input type="text" class="inp-form" name="phone1" id="phone1" value="<?php echo $row['phone1']; ?>" /></td>
		</tr>
        
         <tr>
			<th valign="top">Phone 2:</th>
			<td><input type="text" class="inp-form" name="mobile1" id="mobile1" value="<?php echo $row['mobile1']; ?>" /></td>
			<th valign="top" style="width: 66px">Mobile 1:</th>
			<td><input type="text" class="inp-form" name="mobile2" id="mobile2" value="<?php echo $row['mobile2']; ?>" /></td>

		</tr>
        
        
         <tr>
			<th valign="top">Email ID:</th>
			<td><input type="email" class="inp-form" name="email" id="email"  multiple value="<?php echo $row['email']; ?>" /></td>
			<th valign="top" style="width: 66px"></th>
			<td><td>
		</tr>
        
          
	       
       
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td style="width: 66px"></td>
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
