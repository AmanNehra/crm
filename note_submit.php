<?php 
ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
if(isset($_POST['submit'])) {
$id = mysql_real_escape_string($_POST['id']);
$note=mysql_real_escape_string($_POST['note']);
//$ref=mysql_real_escape_string($_POST['refund']);
if (isset($_POST['refund']))
	 {
			//$ref=mysql_real_escape_string($_POST['refund']);
			$ref='1';
			//echo $ref;die;
	}
		else
	 {
	 		 $ref = "0";
			 //echo $ref;die;
	 }
	
	if($note==''){$ids=base64_encode(convert_uuencode($id));
	   header('location:note.php?id='.$ids);}else{
	if($ref=='1'){
	
	
$user_id=$_SESSION['SESS_id'];	
$date=date('Y-m-d H:i:s');	
$sql=mysql_query("INSERT INTO notes (`customer_id`, `user_id`, `date`, `refund_note`, `refund`) VALUES ('$id', '$user_id', '$date', '$note', '$ref')")or die(mysql_error());
  if($sql){
		$ids=base64_encode(convert_uuencode($id));
			header('location:note.php?id='.$ids);
		}
		}
		else{
		$user_id=$_SESSION['SESS_id'];	
		$date=date('Y-m-d H:i:s');	
		$sql=mysql_query("INSERT INTO notes (`customer_id`, `user_id`, `date`, `note`, `refund`) VALUES ('$id', '$user_id', '$date', '$note', '$ref')")or die(mysql_error());
  if($sql){
		$ids=base64_encode(convert_uuencode($id));
			header('location:note.php?id='.$ids);
		}}
	}
   }
  ?>