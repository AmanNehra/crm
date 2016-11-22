<?php 
require_once('config.php');
if(isset($_POST['submit'])) {
$id = $_POST['id'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$contactid=$_POST['contactid'];
 $email=$_POST['email'];
$state=$_POST['state'];
$address=$_POST['address'];
$date = date('Y-m-d H:i:s');
$phon=$_POST['phone'];
$zipcode=$_POST['zipcode'];
   
//echo'</pre>';print_r($encrypt);die;
$sq=mysql_query("UPDATE dan_customers SET firstname='$firstname', lastname='$lastname', contact_id='$contactid', email='$email', phone='$phon',state='$state',zipcode='$zipcode', created_on='$date', address='$address' where id='$id'") or die(mysql_error());
//echo'</pre>';print_r($sq);die;
if($sq){
     header('location:customer.php');}
   }
  ?>