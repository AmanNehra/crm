<?php 
ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
$userid=$_SESSION['SESS_id'];

if(empty($userid)){header('location:login.php');}
 $var=$_SESSION['SESS_id'];
 $data=mysql_query("SELECT * FROM dan_users where id='$var'") or die(mysql_error);
 $r = mysql_fetch_array($data);
$user=$r['user_type'];

if(isset($_GET['log']) && ($_GET['log']=='out')){
        //if the user logged out, delete any SESSION variables
	session_destroy();
	
        //then redirect to login page
	header('location:login.php');
}?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="css/screen11.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/css.css" type="text/css" />
</head>
<body>
<?php $id=$_GET['id'];
$id = convert_uudecode(base64_decode($id));
 $result=mysql_query("SELECT * FROM `quotes` WHERE id='$id'") or die(mysql_error());
$row = mysql_fetch_array($result); 
 ?>
 <div style="margin-top:2%"></div>
<div id="page-heading"><h1>Full Detail</h1></div>
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
			<th valign="top">Enquiry Type:</th>
			 <td><input type="text" class="inp-form" name="type" id="type" value="<?php echo $row['type']; ?>" readonly="readonly" />
                 
            </td>
		</tr>
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="user_name" id="name" value="<?php echo $row['name']; ?>" readonly="readonly" />
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            </td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $row['email']; ?>" readonly="readonly" /></td>
			<td>
			
			</td>
		</tr>
		
		 
		<tr>
			<th valign="top">Mobile:</th>
			<td><input type="text" class="inp-form" name="phone" id="phone" maxlength="12"  value="<?php echo $row['mobile']; ?>" readonly="readonly" /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Source state:</th>
			<td><input type="text" class="inp-form" name="from" id="from" value="<?php echo $row['frm']; ?>" readonly="readonly" /></td>
			<td></td>
		</tr>
       
        <tr>
			<th valign="top">Source city:</th>
			<td><input type="text" class="inp-form" name="scity" id="scity" value="<?php echo $row['scity']; ?>" readonly="readonly" /></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">Source Zipcode:</th>
			<td><input type="text" class="inp-form" name="sarea" id="sarea" value="<?php echo $row['sarea']; ?>" readonly="readonly" /></td>
			<td></td>
		</tr>
        
        
         <tr>
			<th valign="top">Destination state:</th>
			<td><input type="text" class="inp-form" name="to" id="to" value="<?php echo $row['tu']; ?>" readonly="readonly"/></td>
			<td></td>
		</tr>
          <tr>
			<th valign="top">Destination city:</th>
			<td><input type="text" class="inp-form" name="dcity" id="dcity" value="<?php echo $row['dcity']; ?>" readonly="readonly" /></td>
			<td></td>
		</tr>
          <tr>
			<th valign="top">Destination Zipcode:</th>
			<td><input type="text" class="inp-form" name="darea" id="darea" value="<?php echo $row['darea']; ?>" readonly="readonly" /></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Query:</th>
			<td><textarea style="width:390px; height:110px;border: 1px solid;border-radius: 4px;" name="query" id="query" readonly="readonly"> <?php echo $row['quote']; ?></textarea></td>
			<td></td>
		</tr>
	
	
	
	
    
	<?php /*?><tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="edit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td></td>
	</tr><?php */?>
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



</body>
</html>
