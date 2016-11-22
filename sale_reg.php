<?php 
ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
//$id=$_GET['id'];
//echo $id;die;
$cust_id = mysql_real_escape_string($_GET['id']);
$saletype= mysql_real_escape_string($_GET['type']);
//echo'<pre>';echo $cust_id.'</br>'.$saletype;die;
$id=$_SESSION['SESS_id'];
$reg_date=date('Y-m-d H:i:s');
//echo $id.$cust_id.$reg_date;die;
$sql=mysql_query("UPDATE dan_customers SET sale_register_agent='$id',sale_registered_date='$reg_date',sale_reg_type='$saletype' where id='$cust_id'")or die(mysql_error());

if($sql){
if($saletype=='1'){
$sq=mysql_query("UPDATE dan_users SET status=status+'1',inbound_sale=inbound_sale+'1' where id='$id'")or die(mysql_error());
}elseif($saletype=='2')
{
$sq=mysql_query("UPDATE dan_users SET status=status+'1',outbound_sale=outbound_sale+'1' where id='$id'")or die(mysql_error());
}
if($sq){
header("location:customer.php");
	}}
?>