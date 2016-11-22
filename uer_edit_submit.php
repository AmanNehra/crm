<?php
require_once('config.php');
if(isset($_POST['submit'])) {
//echo'<pre>';print_r($_POST);die;
$id = $_POST['id'];

$name=$_POST['user_name'];
$email=mysql_real_escape_string($_POST['email']);
$password=mysql_real_escape_string($_POST['password']);
$encrypt=md5($password);
$date = date('Y-m-d H:i:s');
$activation=rand(1, 99999999);
$phone=mysql_real_escape_string($_POST['phone']);
$address=mysql_real_escape_string($_POST['address']);
$gender=mysql_real_escape_string($_POST['gender']);
$user_type=mysql_real_escape_string($_POST['agent']);
$rights = $_POST['rights'];
$rights=serialize($rights);
$page=$_POST['page']; 
$page=serialize($page); 	
$subpage=$_POST['subpage'];
$subpage=serialize($subpage); 


//echo'</pre>';print_r($encrypt);die;
$sq=mysql_query("UPDATE dan_users SET user_name='$name', user_pass='$encrypt', user_decrypt='$password', user_email='$email', user_phone='$phone',address='$address', user_registered='$date', activation_key='$activation',user_type='$user_type', user_rights='$rights',user_authority='$page',subpage='$subpage' where id='$id'") or die(mysql_error());
//echo'</pre>';print_r($sq);die;
if($sq){
     header('location:user_listing.php');
    }
	else{ header('location:user_edit.php?id='.$id);}}

/*$name=$_POST['user_name'];
 $email=mysql_real_escape_string($_POST['email']);
$password=mysql_real_escape_string($_POST['password']);
$encrypt=md5($password);
$date = date('Y-m-d H:i:s');
$activation=rand(1, 99999999);
$phone=mysql_real_escape_string($_POST['phone']);
   

 $sql=mysql_query("UPDATE dan_users SET user_name='$name', user_pass='$encrypt', user_decrypt='$password', user_email='$email', user_phone='$phone', user_registered='$date', activation_key='$activation' where id='$id'")or die(mysql_error());
if($sql){
     header('location:index.php');}}
   }*/
  

?>