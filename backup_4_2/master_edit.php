<?php $id = convert_uudecode(base64_decode($_GET['id']));
//echo'</pre>';print_r($id);die; 
include('header.php');

if(isset($_POST['submit'])) {
$id = $_POST['id'];

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
$bs_id =trim(strtoupper($_REQUEST['bs_id'])); 
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
$date = date('Y-m-d H:i:s'); 

$query=mysql_query("SELECT code,aff FROM  master_list WHERE id!= '$id'");
	   while($data=mysql_fetch_assoc($query))
	    {
	     if($code==$data['code'])
	       {
	       $f=1;       
	       }
	    }
	  if($f!=1)
	   { 	    
	    //echo'</pre>';print_r($encrypt);die;
		$sq=mysql_query("UPDATE master_list SET code='$code', aff='$aff', board='$board', category='$category', name='$name',address='$address', city='$city', district='$district',state='$state', country='$country',pin='$pin', std='$std', phone1='$phone1', phone2='$phone2', mobile='$mobile',bs_id='$bs_id', fax='$fax', schain='$schain',web='$web', email='$email',discount='$discount', route='$route', submission='$submission', finalised='$finalised', satoff='$satoff',ptm='$ptm' ,remark='$remark' where id='$id'") or die(mysql_error());
		//echo'</pre>';print_r($sq);die;
		
		//For approve school by addmin
		if($user==1){
		$sq1=mysql_query("UPDATE master_list SET status=1,approved_by='$usname' WHERE id='$id'") or die(mysql_error());
		header('location:master_listing_approved.php'); die;
		}
		//
		if($sq){
		     header('location:master_listing.php');
		    }
			else{ header('location:master_edit.php?id='.$id);}
	    }
		else  
	 {$error="Data already exist";}	
} 
require_once('config.php'); 
$result=mysql_query("SELECT * FROM master_list WHERE id= '$id' ") or die(mysql_error());
$row = mysql_fetch_array($result);
 
?>

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

<!-- start content-outer -->

<div id="content-outer">
<!-- start content -->
<div id="content">
 
<div id="page-heading">
  <h1>Edit School Master</h1>
</div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formid" name="form">
<input type="hidden" name="id"  value="<?php echo $row['id']; ?>"/>
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
	
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Code:</th>
			<td><input type="text" class="inp-form" name="code" value="<?php echo $row['code']; ?>" /></td>
			<th valign="top">Aff. No.:</th>
			<td><input type="text" class="inp-form" name="aff" id="aff" value="<?php echo $row['aff']; ?>" /></td>
		</tr>
        <tr>
        <th>Board: <?php $bord = $row['board'] ;  ?> </th>
        <td>
         <select name="board" class="inp-form-select">
		 <option value="" selected="selected"> Plz Select</option> 
        <?php $resultboard=mysql_query("SELECT * FROM school_info_list WHERE category= 'Board' ") or die(mysql_error());
            while ($result = mysql_fetch_array($resultboard))   { ?>
            <?php echo $selected = $result['name']; ?>
			  <option VALUE="<?php echo $result['name']; ?>" <?php if ($bord == $selected) { ?> selected="selected" <?php }   ?>><?php echo $result['name']; ?></option> 
			<?php } ?>   </select>
    </td>
	
    <th>Category: <?php $category = $row['category'] ;  ?></th>
        <td>
         <select name="category" class="inp-form-select"> 
		 <option value="" selected="selected"> Plz Select</option>
      <?php $resultboard=mysql_query("SELECT * FROM school_info_list WHERE category= 'Category' ") or die(mysql_error());
            while ($result = mysql_fetch_array($resultboard))   { ?>
            <?php echo $selected = $result['name']; ?>
			  <option VALUE="<?php echo $result['name']; ?>" <?php if ($category == $selected) { ?> selected="selected" <?php }   ?> ><?php echo $result['name']; ?></option> 
			<?php } ?>   </select>
    </td>
	</tr>
     
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name']; ?>" /></td>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" value="<?php echo $row['address']; ?>" /></td>
		</tr>     
		<tr id="p_school_old4">
			<th valign="top">City: <?php $city = $row['city']; ?></th>			
             <td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" value="<?php echo $row['city']; ?>" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
            
			<th valign="top">District: <?php $district = $row['district']; ?></th>
			<td><input type="text" class="inp-form" name="district" id="district" value="<?php echo $row['district']; ?>" />   </td>
		</tr>
        
        <tr id="p_school_old1">
			<th valign="top">State:</th>
			<td><input type="text" class="inp-form" name="state" id="state" value="<?php echo $row['state']; ?>" /></td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country" id="country" value="<?php echo $row['country']; ?>" /></td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" id="pin"  value="<?php echo $row['pin']; ?>"/></td>
			<th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" id="std" value="<?php echo $row['std']; ?>" /></td>
		</tr>
        
        <tr>
			<th valign="top">Phone 1:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone1" id="phone1"  value="<?php echo $row['phone1']; ?>" required/></td>
			<th valign="top">Phone 2:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="phone2" id="phone2" value="<?php echo $row['phone2']; ?>" /></td>
		</tr>
        
         <tr>
			<th valign="top">Mobile 1:</th>
			<td><input type="text" pattern="[0-9]*" title="Enter only number" class="inp-form" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>" /></td>
			<th valign="top">Attach B S :</th>
			<td><select name="bs_id" id="bs_id" class="inp-form-select"  > 
			    <option value="" selected="selected">Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT id,name FROM corporate_list order by name");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php  if($row['bs_id']==$value['code']) echo ' selected="selected"' ;?> value="<?php echo $value['id']; ?>"><?php echo $value['name']."&nbsp;&nbsp;&nbsp;&nbsp;".$value['code']; ?></option>
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
			<th valign="top" style="height: 24px">Fax No:</th>
			<td style="height: 24px"><input type="text" class="inp-form" name="fax" id="fax" value="<?php echo $row['fax']; ?>" /></td>
			<th valign="top" style="height: 24px">School Chain :</th>
			<td style="height: 24px"><select name="schain" id="schain" class="inp-form-select">
			     
			     <?php $resultrout=mysql_query("SELECT name FROM chain_school_list ") or die(mysql_error());
	            while ($resulrout = mysql_fetch_array($resultrout))   { ?>
				  <option <?php if($row['schain']==$resulrout['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resulrout['name']; ?>"><?php echo $resulrout['name']; ?></option> 
				<?php } ?>
			    
			    </select>
			</td>
		</tr>
        
        
         <tr>
			<th valign="top">Website:</th>
			<td><input type="text" class="inp-form" name="web" id="web" value="<?php echo $row['web']; ?>" /></td>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $row['email']; ?>" /></td>
		</tr>
        
         <tr>
			<th valign="top">Discount:</th>
			<td><select name="discount" id="discount" class="inp-form-select">
			    <option value="" selected="selected"> Plz Select</option>
			     
			     <?php $resultrout=mysql_query("SELECT grade FROM discount_grade_list order by grade ") or die(mysql_error());
	            while ($resulrout = mysql_fetch_array($resultrout))   { ?>
				  <option <?php if($row['discount']==$resulrout['grade']) echo 'selected="selected"'; ?> VALUE="<?php echo $resulrout['grade']; ?>"><?php echo $resulrout['grade']; ?></option> 
				<?php } ?>
			    
			    </select></td>
			<th valign="top">Route No :</th>
			<td> <select name="route" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultrout=mysql_query("SELECT * FROM school_info_list  WHERE category= 'Route No' ") or die(mysql_error());
            while ($resulrout = mysql_fetch_array($resultrout))   { ?>
			  <option <?php if($row['route']==$resulrout['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resulrout['name']; ?>"><?php echo $resulrout['name']; ?></option> 
			<?php } ?>   </select>
            </td>
		</tr>
        
         <tr>
			<th valign="top">Submission:</th>
			<td><select name="submission" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
      <?php $resultsub=mysql_query("SELECT * FROM submission  WHERE category= 'Submission' ") or die(mysql_error());
            while ($resulsubm = mysql_fetch_array($resultsub))   { ?>
			  <option <?php if($row['submission']==$resulsubm['date']) echo ' selected="selected"' ;?> VALUE="<?php echo $resulsubm['date']; ?>"><?php echo $resulsubm['date']; ?></option> 
			<?php } ?>   </select>  </td>
			<th valign="top">Finalised:</th>
			<td><select name="finalised" class="inp-form-select">
			<option value="" selected="selected"> Plz Select</option> 
      <?php $resultfinal=mysql_query("SELECT * FROM finalised  WHERE category= 'Finalised' ") or die(mysql_error());
            while ($resulfinl = mysql_fetch_array($resultfinal))   { ?>
			  <option <?php if($row['finalised']==$resulfinl['date']) echo ' selected="selected"' ;?> VALUE="<?php echo $resulfinl['date']; ?>"><?php echo $resulfinl['date']; ?></option> 
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
			  <option <?php if($row['satoff']==$resulsatoff['name']) echo ' selected="selected"' ;?> VALUE="<?php echo $resulsatoff['name']; ?>"><?php echo $resulsatoff['name']; ?></option> 
			<?php } ?>   </select> 
            </td>
			<th valign="top">PTM:</th>
			<td>
            <select name="ptm" class="inp-form-select">
			<option value="" selected="selected"> Plz Select</option> 
      <?php $resultptm=mysql_query("SELECT * FROM ptm  WHERE category= 'ptm' ") or die(mysql_error());
            while ($resulptm = mysql_fetch_array($resultptm))   { ?>
			  <option <?php if($row['ptm']==$resulptm['detail']) echo ' selected="selected"' ;?> VALUE="<?php echo $resulptm['detail']; ?>"><?php echo $resulptm['detail']; ?></option> 
			<?php } ?>   </select>  
            </td>
		</tr> 
        
		<tr>
		   <th valign="top">Remarks:</th>
			
			<td  colspan="3"> <textarea class="inp-form" name="remark" id="remark" style="height:45px;width:99%" ><?php echo $row['remark']?></textarea></td>
			
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
	$('#formid').validate(
	{	
		//alert('hello');
		rules:
		{
			"userid":
			{
				required:true
			},
			"gender":
			{
				required:true
			},
			"user_name":
			{
				required:true
			},
			
			"email":
			{
				required:true,
				email:true,
				/*remote:ajax_url+'/Home/check_email',*/
			},
			"password":
			{
				required:true
			},
			"address":
			{
				required:true
			},
			
			"phone":
			{
				required:true,
				number:true
			},
			"user_type":
			{
				required:true,
				number:true
			},
			
			
		},
		messages:
		{
			"userid":
			{
				required:'This field is required.',
			},
			"gender":
			{
				required:'This field is required.',
			},
			
			"user_name":
			{
				required:'This field is required.',
			},
			
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				//remote:'This email already exist'
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
			"user_type":
			{
				required:'This field is required.',
				number:'Please enter a valid User type in digits.'
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>

