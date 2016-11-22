<?php 
require_once('config.php');
if(isset($_POST['submit'])) {

//$agent_id=
$name=mysql_real_escape_string($_POST['page_name']);
$address=mysql_real_escape_string($_POST['description']);
 

 $rights = $_POST['rights'];
    $rights=serialize($rights); 

$messagees='All Fields are required.';
if(empty($name)|| empty($address)){echo "<script>alert('$messagees')</script>";echo '<script>window.history.back()</script>';}else{
//echo'</pre>';print_r($images);die;

$check=mysql_query("SELECT * FROM pages WHERE page_name = '$name'");

//$data = mysql_fetch_array($check);
$data=mysql_num_rows($check);
//echo'</pre>';print_r($data);die;
if($data>= 1) {
   $_SESSION['message']="Page Already Exists";

header('location:add_user.php?error=User already exists.');
}
else{

$sql=mysql_query("INSERT INTO pages (page_name, description) VALUES ('$name', '$address')")or die(mysql_error());
     header('location:addmenu.php');
	 }
   
}


}

  ?>