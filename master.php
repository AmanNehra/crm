<?php include('header.php');
include('function.php');
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
 
//$agent_id=
$code=trim(strtoupper($_REQUEST['code']));
$aff=trim(strtoupper($_REQUEST['aff']));
$board=trim(strtoupper($_REQUEST['board']));
$category=trim(strtoupper($_REQUEST['category']));
$name=trim(strtoupper($_REQUEST['name']));
$address=trim(strtoupper($_REQUEST['address']));
$city=trim(strtoupper($_REQUEST['city']));
$district=trim(strtoupper($_REQUEST['district']));
$state=trim(strtoupper($_REQUEST['state']));
$country=trim(strtoupper($_REQUEST['country']));
$pin=trim(strtoupper($_REQUEST['pin']));
$std=trim(strtoupper($_REQUEST['std']));
$phone1=trim(strtoupper($_REQUEST['phone1']));
$phone2=trim(strtoupper($_REQUEST['phone2']));
$mobile=trim(strtoupper($_REQUEST['mobile']));
$bs_id =($_REQUEST['bs_id']);
$fax=trim(strtoupper($_REQUEST['fax']));
$schain=trim(strtoupper($_REQUEST['schain']));
$web=strtoupper($_REQUEST['web']);
$email=strtoupper($_REQUEST['email']);
$discount=strtoupper($_REQUEST['discount']);
$route=strtoupper($_REQUEST['route']);
$submission=strtoupper($_REQUEST['submission']);
$finalised=strtoupper($_REQUEST['finalised']);
$satoff=strtoupper($_REQUEST['satoff']);
$ptm=strtoupper($_REQUEST['ptm']);
$remark=strtoupper($_REQUEST['remark']);

$query=mysql_query("SELECT code,aff FROM  master_list");
  while($data=mysql_fetch_assoc($query))
    {
     if($code==$data['code'])
       {
       $f=1;       
       }
    }
  if($f!=1)
   {   
$sql=mysql_query("INSERT INTO master_list (code, aff, board, category, city, name, address,district, state, country, pin, std, phone1,phone2,mobile, bs_id, fax, schain, web, email, discount, route, submission, finalised, satoff, ptm, remark)VALUES ('$code', '$aff', '$board', '$category', '$city','$name', '$address','$district','$state', '$country', '$pin', '$std', '$phone1', '$phone2','$mobile', '$bs_id', '$fax', '$schain', '$web','$email','$discount', '$route', '$submission', '$finalised', '$satoff', '$ptm', '$remark')")or die(mysql_error());
     header('location:master_listing.php'); 
  }
  else  
    {$error="Data already exist";}

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




<div id="page-heading"><h1>Add New Master</h1></div>
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
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Code:</th>
			<td><input type="text" class="inp-form" name="code"  required /></td>
			<th valign="top">Aff. No.:</th>
			<td><input type="text" class="inp-form" name="aff" id="aff" /></td>
		</tr>
        <tr>
        <th>Board:</th>
        <td><select name="board" class="inp-form-select"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT name FROM school_info_list WHERE category = 'BOARD' ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
    </td>
	
    <th>Category:</th>
        <td>
         <select name="category" class="inp-form-select">
		 <option value="" selected="selected"> Plz Select</option> 
      <?php $resultboard=mysql_query("SELECT * FROM school_info_list WHERE category= 'Category' ") or die(mysql_error());
            while ($result = mysql_fetch_array($resultboard))   { ?>
			  <option VALUE="<?php echo $result['name']; ?>"><?php echo $result['name']; ?></option> 
			<?php } ?>   </select>
    </td>
	</tr>
    
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" required /></td>
			<th valign="top">Address:</th>
			 <td><input type="text" class="inp-form" name="address" id="address" required/>
    </td>
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
			    $query=mysql_query("SELECT id,name FROM corporate_list order by name");
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
			<th valign="top">School Chain :</th>
			<td><select name="schain" id="schain" class="inp-form-select">
			    <option value="" selected="selected"> Plz Select</option>
			     
			     <?php $resultrout=mysql_query("SELECT name FROM chain_school_list ") or die(mysql_error());
	            while ($resulrout = mysql_fetch_array($resultrout))   { ?>
				  <option VALUE="<?php echo $resulrout['name']; ?>"><?php echo $resulrout['name']; ?></option> 
				<?php } ?>
			    
			    </select></td>
		</tr>
        
        
         <tr>
			<th valign="top">Website:</th>
			<td><input type="url" class="inp-form" name="web" id="web"  /></td>
			<th valign="top">Email:</th>
			<td><input type="email" class="inp-form" name="email" id="email" multiple /></td>
		</tr>
        
         <tr>
			<th valign="top">Discount:</th>
			<td><select name="discount" id="discount" class="inp-form-select">
			    <option value="" selected="selected"> Plz Select</option>
			     
			     <?php $resultrout=mysql_query("SELECT grade FROM discount_grade_list order by grade ") or die(mysql_error());
	            while ($resulrout = mysql_fetch_array($resultrout))   { ?>
				  <option VALUE="<?php echo $resulrout['grade']; ?>"><?php echo $resulrout['grade']; ?></option> 
				<?php } ?>
			    
			    </select></td>
			<th valign="top">Route No :</th>
			<td> <select name="route" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultrout=mysql_query("SELECT * FROM school_info_list  WHERE category= 'Route No' ") or die(mysql_error());
            while ($resulrout = mysql_fetch_array($resultrout))   { ?>
			  <option VALUE="<?php echo $resulrout['name']; ?>"><?php echo $resulrout['name']; ?></option> 
			<?php } ?>   </select>
            </td>
		</tr>
        
         <tr>
			<th valign="top">Submission:</th>
			<td><select name="submission" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultsub=mysql_query("SELECT * FROM submission  WHERE category= 'Submission' ") or die(mysql_error());
            while ($resulsubm = mysql_fetch_array($resultsub))   { ?>
			  <option VALUE="<?php echo $resulsubm['date']; ?>"><?php echo $resulsubm['date']; ?></option> 
			<?php } ?>   </select>  </td>
			<th valign="top">Finalised:</th>
			<td><select name="finalised" class="inp-form-select"> 
			    <option value="" selected="selected"> Plz Select</option>
      <?php $resultfinal=mysql_query("SELECT * FROM finalised  WHERE category= 'Finalised' ") or die(mysql_error());
            while ($resulfinl = mysql_fetch_array($resultfinal))   { ?>
			  <option VALUE="<?php echo $resulfinl['date']; ?>"><?php echo $resulfinl['date']; ?></option> 
			<?php } ?>   </select>  
            </td>
		</tr>
        
        
         <tr>
			<th valign="top">Sat off:</th>
			<td> 
            <select name="satoff" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultsatoff=mysql_query("SELECT * FROM school_info_list  WHERE category= 'Saturday Off' ") or die(mysql_error());
            while ($resulsatoff = mysql_fetch_array($resultsatoff))   { ?>
			  <option VALUE="<?php echo $resulsatoff['name']; ?>"><?php echo $resulsatoff['name']; ?></option> 
			<?php } ?>   </select> 
            </td>
			<th valign="top">PTM:</th>
			<td>
            <select name="ptm" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultptm=mysql_query("SELECT * FROM ptm  WHERE category= 'ptm' ") or die(mysql_error());
            while ($resulptm = mysql_fetch_array($resultptm))   { ?>
			  <option VALUE="<?php echo $resulptm['detail']; ?>"><?php echo $resulptm['detail']; ?></option> 
			<?php } ?>   </select>  
            </td>
		</tr> 
        
		<tr>
		   <th valign="top">Remarks:</th>
			
			<td colspan="3"> <textarea class="inp-form" name="remark" id="remark" style="height:45px; width:99%" ></textarea></td>
			
		</tr>
		<tr>
		<th></th>
		<td></td>
		<th></th>
		<td></td>
		</tr>
	 
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
