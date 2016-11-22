<?php ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
if(isset($_POST['submit'])) {
$id = mysql_real_escape_string($_POST['customer_id']);
$alternate=mysql_real_escape_string($_POST['alternate']);
	//echo $alternate.$id;die;
$user_id=$_SESSION['SESS_id'];	
if(empty($alternate)){$ids=base64_encode(convert_uuencode($id));
    header('location:note.php?id='.$ids);}else{

$sql=mysql_query("UPDATE dan_customers SET alternate='$alternate' where id='$id'")or die(mysql_error());
if($sql){
$ids=base64_encode(convert_uuencode($id));
    header('location:note.php?id='.$ids);
	}
	}

   }
  ?>