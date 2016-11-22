<?php
require_once('config.php');

if(isset($_POST['submit']))
{
//echo 'hello'; die;
if(empty($_POST['to']) || empty($_POST['order_no'])){echo 'hello';die;}

	$sl_no= $_REQUEST['sl_no'];
	$description= $_REQUEST['description'];
	$part= $_REQUEST['part'];
	$qty= $_REQUEST['qty'];
	$rate= $_REQUEST['rate'];
	$amount= $_REQUEST['amount'];
	$p= $_REQUEST['p'];
		

$sql=mysql_query("INSERT INTO `invoice_sec_table`(sl_no,description,part,qty,rate,amount,p) VALUES ('$sl_no','$description','$part','$qty','$rate','$amount','$p')")or die(mysql_error());	
if($sql)	
	{
		$qry=mysql_query("select MAX(`sec_id`) FROM `invoice_sec_table`") or die(mysql_error());
		$qery=mysql_fetch_array($qry);
		 $item_id=$qery['MAX(`sec_id`)'];
	
		$meta_key='invoice-sec';

$var1=array(
	'to'=> $_REQUEST['to'],
	'order_no'=> $_REQUEST['order_no'],
	'gr_no'=> $_REQUEST['gr_no'],
	'order_date'=> $_REQUEST['order_date'],
	'gr_date'=> $_REQUEST['gr_date'],
	
	'rupee'=> $_REQUEST['rupee'],
	'total'=> $_REQUEST['total'],
	'paise'=> $_REQUEST['paise']
	
	);
$var1=serialize($var1); 

$sqli=mysql_query("INSERT INTO `meta_table`(invoice_item_id,meta_key,meta_value) VALUES ('$item_id','$meta_key','$var1')")or die(mysql_error());	
if($sqli){
 header('Location: http://truckwaale.in/customer.php?type=two');}

}

  

//print_r($var1);die;

}elseif(isset($_POST['edit'])){
$id=$_REQUEST['invoice_sec_id'];

//echo $id;die;
$sl_no= $_REQUEST['sl_no'];
	$description= $_REQUEST['description'];
	$part= $_REQUEST['part'];
	$qty= $_REQUEST['qty'];
	$rate= $_REQUEST['rate'];
	$amount= $_REQUEST['amount'];
	$p= $_REQUEST['p'];
	
	

$sql=mysql_query("UPDATE invoice_sec_table SET sl_no='$sl_no', description='$description', part='$part', qty='$qty', rate='$rate',amount='$amount',p='$p' where sec_id='$id'") or die(mysql_error());

//$sql=mysql_query("INSERT INTO `invoice_item_table`(s_no,particular,itemcode,qty,rate,amount) VALUES ('$sno','$partic','$itm','$qty','$rat','$amnt')")or die(mysql_error());	
if($sql)	
	{
		

$var1=array(
'to'=> $_REQUEST['to'],
	'order_no'=> $_REQUEST['order_no'],
	'gr_no'=> $_REQUEST['gr_no'],
	'order_date'=> $_REQUEST['order_date'],
	'gr_date'=> $_REQUEST['gr_date'],
	
	'rupee'=> $_REQUEST['rupee'],
	'total'=> $_REQUEST['total'],
	'paise'=> $_REQUEST['paise']);
$var1=serialize($var1); 
$meta_key='invoice-sec';
$sqli=mysql_query("UPDATE meta_table SET meta_value='$var1' where meta_table.invoice_item_id='$id' && meta_table.meta_key='$meta_key'") or die(mysql_error());

//$sqli=mysql_query("INSERT INTO `meta_table`(invoice_item_id,meta_key,meta_value) VALUES ('$item_id','$meta_key','$var1')")or die(mysql_error());	
if($sqli){
 header('Location: http://truckwaale.in/customer.php?type=two');}

}
}

?>