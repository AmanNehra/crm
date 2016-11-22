<?php ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();

require_once('config.php');
$userid=$_SESSION['SESS_id'];
if(empty($userid)){header('location:login.php');}
//$id = convert_uudecode(base64_decode($_GET['id']));
//$result=mysql_query("SELECT * FROM dan_customers WHERE id='$id'") or die(mysql_error());
//$row = mysql_fetch_array($result);

 $data=mysql_query("SELECT * FROM dan_users where id='$userid'") or die(mysql_error);
 $r = mysql_fetch_array($data);
$user=$r['user_type'];
//if(!isset($_POST['submit']){header('location:index.php');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery/jquery.validate.js" type="text/javascript"></script>
<title>Add Note</title>
<link href="css/styal.css" rel="stylesheet" type="text/css">
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
		 $(document).ready(function() {

	$('#formo').validate(
	{	
		
		rules:
		{
			"note":
			{
				required:true,
				
			},
		},
		messages:
		{
			"note":
			{
				required:'This field is required.',
			},
		}
	});
	}); 
</script>

</head>

<body>
<div class="mane">
<?php 
if(isset($_POST['submit'])) {
$cust_id = $_POST['customer_id'];
	$user_id=$_POST['user_id'];
//if(empty($cust_id)){header('location:index.php');}
$result=mysql_query("SELECT * FROM dan_customers WHERE id='$cust_id'") or die(mysql_error());
$row = mysql_fetch_array($result);

}else{header('location:index.php');}
  ?>


<div class="pag-to-ouater">
<div class="page-top">

Add Note Information
</div>

<div style="height:60px; border-bottom:#999999 solid 1px;">
    <div class="top-search" >
        <div>
        <span style="font-weight:bold;">Name:</span> <?php echo $row['firstname']; ?>
        </div>
    <div>
<span style="font-weight:bold;">Email:</span> <?php echo $row['email']; ?></div>


</div>

<div style="float:right; margin-right:40px;">
<a href="note.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>"><div class="addin">
    	Back
    </div></a>
</div>

</div>
<form action="note_submit.php" method="post" id="formo">
<input type="hidden" name="id"  value="<?php echo $row['id']; ?>"/>
<div style="width:80%; margin-left:5%; margin-top:3%">
<textarea name="note" id="note"></textarea>
<?php if($user==1){?>
<div style="margin-top:10px; float:left;">
<input type="checkbox" id="refund" name="refund" value="yes">
Refund</div><?php }?>
<input type="submit" value="Submit Note" name="submit" style="margin-top:10px; float:right;" />
</div>
</form>

</div>

</div>

</body>
</html>
