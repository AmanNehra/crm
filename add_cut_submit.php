<?php 
require_once('config.php');
if(isset($_POST['submit'])) {

$firstname=mysql_real_escape_string($_POST['firstname']);
$lastname=mysql_real_escape_string($_POST['lastname']);
$contactid=mysql_real_escape_string($_POST['contactid']);
$state=mysql_real_escape_string($_POST['state']);
$zip=mysql_real_escape_string($_POST['zip']);
$email=mysql_real_escape_string($_POST['email']);
$address=mysql_real_escape_string($_POST['address']);
$date_created = date('Y-m-d H:i:s');
$phone=mysql_real_escape_string($_POST['phone']);
$sale_register_agent='';
$alternate='';
$messagees='All Fields are required.';
if(empty($firstname)|| empty($email)){echo "<script>alert('$messagees')</script>";echo '<script>window.history.back()</script>';}else{
  //echo'</pre>';print_r($images);die;
$sql=mysql_query("INSERT INTO `dan_customers`(firstname,lastname,contact_id,email,phone,state,zipcode,created_on,address) 
VALUES ('$firstname','$lastname','$contactid','$email','$phone','$state','$zip','$date_created','$address')")or die(mysql_error());
   if($sql)
   { 
	 header('location:customer.php');
	 }
	else
  {
  echo "Error! Please try again.";
  header('location:add_cust.php');
  }

}}
  ?>