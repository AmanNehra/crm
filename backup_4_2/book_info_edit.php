<?php include('header.php');
include('function.php');
$id = convert_uudecode(base64_decode($_GET['id']));
$sid = convert_uudecode(base64_decode($_GET['sid']));
if(isset($_POST['submit'])) {
//echo "<pre>"; print_r ($_REQUEST); die;
$name=trim(strtoupper($_REQUEST['name']));
$code=trim(strtoupper($_REQUEST['code']));
$class=trim(strtoupper($_REQUEST['class']));
$subject=trim(strtoupper($_REQUEST['subject']));
$corporate=trim(strtoupper($_REQUEST['corporate']));
//$date = date('Y-m-d H:i:s');

	if($_FILES['f']['name']!="")
	{
	$f_name=$_FILES['f']['name'];
	$temp=$_FILES['f']['tmp_name'];
	$dirname=time();
	$createdir=$_SERVER['DOCUMENT_ROOT']."/demo/crm/upload/book_master/".$dirname;
	mkdir($createdir);
	$target="$createdir/".$f_name;
	move_uploaded_file($temp,$target);
	
	//For remove file
	 $query=mysql_query("SELECT file_name FROM book_master where id='$id'");
	   $data=mysql_fetch_array($query);  
	   $dir=$data['file_name'];  
	   $path=$_SERVER['DOCUMENT_ROOT']."/demo/crm/upload/book_master/".$dir;
	   if ($handle = opendir($path))
	   {
		while (false !== ($file = readdir($handle)))
		 {
			if ('.' === $file) continue;
			if ('..' === $file) continue;
			$f=$file;
			unlink("$path/$f");			
	      }
	    closedir($handle);
		//end remove file function
      $sq=mysql_query("UPDATE book_master SET school_name='$name',code='$code',class='$class', subject='$subject', corporate='$corporate',file_name='$dirname' where id='$id'") or die(mysql_error());
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header("location:book_master.php?sid=".base64_encode(convert_uuencode($sid)));
	    }
		else{ header('location:book_info_edit.php?id='.base64_encode(convert_uuencode($id)));}
      }
   }
  else
 { 
  $sq=mysql_query("UPDATE book_master SET school_name='$name',code='$code',class='$class', subject='$subject', corporate='$corporate' where id='$id'") or die(mysql_error());
	//echo'</pre>';print_r($sq);die;
	if($sq){
	     header("location:book_master.php?sid=".base64_encode(convert_uuencode($sid)));
	    }
		else{ header('location:book_info_edit.php?id='.base64_encode(convert_uuencode($id)));}  
  }

}
require_once('config.php');
$result=mysql_query("SELECT * FROM book_master WHERE id= '$id' ") or die(mysql_error());
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




<div id="page-heading"><h1>Edit Book Master</h1></div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form"> 
        <tr>
        <th valign="top" style="height: 22px">School Name:</th>
			<td style="height: 22px"><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['school_name']; ?>" readonly="readonly" required/></td>   
        <th valign="top" style="height: 22px">Code:</th>
			<td style="height: 22px"><input type="text" class="inp-form" name="code"  value="<?php echo $row['code'];?>"id=""  readonly="readonly" required/></td>
         
	   </tr>
    <tr>
        <th valign="top">Class:</th>
			<td><select class="inp-form-select" name="class" id="class" required>
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT class FROM class ORDER BY class ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['class']==$value['class']) echo ' selected="selected"' ;?> value="<?php echo $value['class']; ?>" ><?php echo $value['class']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
</td>
         <th valign="top">Subject:</th>
			<td><select class="inp-form-select" name="subject" id="subject" required>
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT subject FROM subject_master_list ORDER BY subject ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['subject']==$value['subject']) echo ' selected="selected"' ;?> value="<?php echo $value['subject']; ?>" ><?php echo $value['subject']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
 </td>   
	   </tr>
	   <tr>
	     <th valign="top">Corporate:</th>
			<td><select class="inp-form-select" name="corporate" id="corporate" required>
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT name FROM corporate_list ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['corporate']==$value['name']) echo 'selected="selected"' ;?> value="<?php echo $value['name']; ?>" ><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
</td>
	    <th valign="top">Upload File:</th>
			<td><input  type="file" name="f"/><input type="hidden" name="dir" value="<?php echo $row['file_name']; ?>"</td>


	   </tr>
        
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
