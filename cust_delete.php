<?php 
require_once('config.php');
$id = convert_uudecode(base64_decode($_GET['id']));


$result=mysql_query("DELETE from dan_customers WHERE id='$id'") or die(mysql_error());
if($result){ header('location:customer.php');}
?>
