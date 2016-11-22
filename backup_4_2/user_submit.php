<?php 
require_once('config.php');
if(isset($_POST['submit'])) {
//echo '<pre>';print_r($_REQUEST); die;
//$agent_id=
$name=mysql_real_escape_string($_POST['user_name']);
$address=mysql_real_escape_string($_POST['address']);
$email=mysql_real_escape_string($_POST['email']);
$password=mysql_real_escape_string($_POST['password']);
$encrypt=md5($password);
$date = date('Y-m-d H:i:s');
$activation=rand(1, 99999999);
$phone=mysql_real_escape_string($_POST['phone']);
$gender=mysql_real_escape_string($_POST['gender']);
$usertype=mysql_real_escape_string($_POST['agent']);
$page=$_POST['page']; 
$page=serialize($page); 
$rights = $_POST['rights'];
$rights=serialize($rights); 
$subpage=$_POST['subpage'];
$subpage=serialize($subpage);

$messagees='All Fields are required.';
if(empty($name)|| empty($email) || empty($password) || empty($phone)){echo "<script>alert('$messagees')</script>";echo '<script>window.history.back()</script>';}else{
//echo'</pre>';print_r($images);die;

$check=mysql_query("SELECT * FROM dan_users WHERE user_name = '$name'");

//$data = mysql_fetch_array($check);
$data=mysql_num_rows($check);
//echo'</pre>';print_r($data);die;
if($data>= 1) {
   $_SESSION['message']="User Name Already Exists";

header('location:add_user.php?error=User Name already exists.');
}
else{

$sql=mysql_query("INSERT INTO dan_users (user_name, user_pass, user_decrypt, user_email, user_phone,address, user_registered, gender, activation_key, user_type, user_rights,user_authority,subpage) VALUES ('$name', '$encrypt', '$password', '$email', '$phone','$address','$date', '$gender', '$activation', '$usertype', '$rights', '$page','$subpage')")or die(mysql_error());
     header('location:user_listing.php');
	 }
   
}


}

  ?>