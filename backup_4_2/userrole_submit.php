<?php 
require_once('config.php');
if(isset($_POST['submit'])) {
echo '<pre>';print_r($_REQUEST); die;

Array
(
    [role_name] => Principal
    [status] => Active
    [page] => Array
        (
            [0] => 1
            [1] => 2
        )

    [subpage] => Array
        (
            [0] => 21
            [1] => 22
            [2] => 26
            [3] => 27
        )

    [submit] => 
)

//$agent_id=
$role_name=mysql_real_escape_string($_POST['role_name']);
$status=mysql_real_escape_string($_POST['status']);
$date = date('Y-m-d H:i:s');
$page=$_POST['page']; 
$page=serialize($page); 
$rights = $_POST['rights'];
$rights=serialize($rights); 
$subpage=$_POST['subpage'];
$subpage=serialize($subpage);

$messagees='Please fill the value in role name.';
if(empty($role_name)){echo "<script>alert('$messagees')</script>";echo '<script>window.history.back()</script>';}else{
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