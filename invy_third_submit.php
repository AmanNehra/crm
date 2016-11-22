<?php
require_once('config.php');

if(isset($_POST['submit']))
{
//echo 'hello'; die;
//if(empty($_POST['bill_no']) || empty($_POST['book_no'])){echo 'hello';die;}

	
$var3=array('rate'=> $_REQUEST['rate'],
	'rate_p'=> $_REQUEST['rate_p'],
	'freight'=> $_REQUEST['freight'],
	'freight_p'=> $_REQUEST['freight_p'],
	'over_load'=> $_REQUEST['over_load'],
	'over_load_p'=> $_REQUEST['over_load_p'],
	'labor_ch'=> $_REQUEST['labor_ch'],
	'labor_ch_p'=> $_REQUEST['labor_ch_p'],
	'kanta'=> $_REQUEST['kanta'],
	'kanta_p'=> $_REQUEST['kanta_p'],
	'servic_tax'=> $_REQUEST['servic_tax'],
	'servic_tax_p'=> $_REQUEST['servic_tax_p'],
	'border_ch'=> $_REQUEST['border_ch'],
	'border_ch_p'=> $_REQUEST['border_ch_p'],
	'gr'=> $_REQUEST['gr'],
	'gr_p'=> $_REQUEST['gr_p'],
	'total'=> $_REQUEST['total'],
	'total_p'=> $_REQUEST['total_p'],
	'advance'=> $_REQUEST['advance'],
	'advance_p'=> $_REQUEST['advance_p']);
	

	
//$var_meta=serialize($var2);	
$cosignor=$_REQUEST['cosignor'];	
$cosignee=$_REQUEST['cosignee'];
$no_of_pack=$_REQUEST['no_of_pack'];
$description=$_REQUEST['description'];	
$value=$_REQUEST['value'];
$actual_weight=$_REQUEST['actual_weight'];
$amount=serialize($var3);	
$sql=mysql_query("INSERT INTO `invoice_third_table`(no_of_pack,description,value,actual_weight,amountss,cosignator,cosignee) VALUES ('$no_of_pack','$description','$value','$actual_weight','$amount','$cosignor', '$cosignee')")or die(mysql_error());	
if($sql)	
	{
		$qry=mysql_query("select MAX(`third_id`) FROM `invoice_third_table`") or die(mysql_error());
		$qery=mysql_fetch_array($qry);
		 $item_id=$qery['MAX(`third_id`)'];
	
		$meta_key='invoice-third';
		
		$var2=array(
	'company'=> $_REQUEST['company'],
	'policy'=> $_REQUEST['policy'],
	'policy_date'=> $_REQUEST['policy_date'],
	'amount'=> $_REQUEST['amount'],
	'amount_date'=> $_REQUEST['amount_date'],
	
	
	'truck_no'=> $_REQUEST['truck_no'],
	'driv_desc'=> $_REQUEST['driv_desc'],
	'owner_add'=> $_REQUEST['owner_add'],
	'delivery_add'=> $_REQUEST['delivery_add'],
	
	'gr_no'=> $_REQUEST['gr_no'],
	'gr_date'=> $_REQUEST['gr_date'],
	'from'=> $_REQUEST['from'],
	'to'=> $_REQUEST['to'],
	'value_goods'=> $_REQUEST['value_goods'],
	'to_pay'=> $_REQUEST['to_pay'],
	'paid'=> $_REQUEST['paid'],
	'to_be_billed'=> $_REQUEST['to_be_billed']);
	
	
	$var_meta=serialize($var2);	


$sqli=mysql_query("INSERT INTO `meta_table`(invoice_item_id,meta_key,meta_value) VALUES ('$item_id','$meta_key','$var_meta')")or die(mysql_error());	
if($sqli){
 header('Location: http://truckwaale.in/customer.php?type=three');
}

}

  

//print_r($var1);die;

}elseif(isset($_POST['edit'])){
$ideas=$_REQUEST['thr_id'];

$var3=array('rate'=> $_REQUEST['rate'],
	'rate_p'=> $_REQUEST['rate_p'],
	'freight'=> $_REQUEST['freight'],
	'freight_p'=> $_REQUEST['freight_p'],
	'over_load'=> $_REQUEST['over_load'],
	'over_load_p'=> $_REQUEST['over_load_p'],
	'labor_ch'=> $_REQUEST['labor_ch'],
	'labor_ch_p'=> $_REQUEST['labor_ch_p'],
	'kanta'=> $_REQUEST['kanta'],
	'kanta_p'=> $_REQUEST['kanta_p'],
	'servic_tax'=> $_REQUEST['servic_tax'],
	'servic_tax_p'=> $_REQUEST['servic_tax_p'],
	'border_ch'=> $_REQUEST['border_ch'],
	'border_ch_p'=> $_REQUEST['border_ch_p'],
	'gr'=> $_REQUEST['gr'],
	'gr_p'=> $_REQUEST['gr_p'],
	'total'=> $_REQUEST['total'],
	'total_p'=> $_REQUEST['total_p'],
	'advance'=> $_REQUEST['advance'],
	'advance_p'=> $_REQUEST['advance_p']);
	
//$amount=serialize($var3);
$cosignor=$_REQUEST['cosignor'];	
$cosignee=$_REQUEST['cosignee'];
$no_of_pack=$_REQUEST['no_of_pack'];
$description=$_REQUEST['description'];	
$value=$_REQUEST['value'];
$actual_weight=$_REQUEST['actual_weight'];
$amount=serialize($var3);
$sql=mysql_query("UPDATE invoice_third_table SET no_of_pack='$no_of_pack', description='$description', value='$value', actual_weight='$actual_weight', amountss='$amount',cosignator='$cosignor',cosignee='$cosignee' where third_id='$ideas'") or die(mysql_error());

//$sql=mysql_query("INSERT INTO `invoice_item_table`(s_no,particular,itemcode,qty,rate,amount) VALUES ('$sno','$partic','$itm','$qty','$rat','$amnt')")or die(mysql_error());	
if($sql)	
	{	
//echo $id;die;
$meta_key='invoice-third';
		
		$var2=array(
	'company'=> $_REQUEST['company'],
	'policy'=> $_REQUEST['policy'],
	'policy_date'=> $_REQUEST['policy_date'],
	'amount'=> $_REQUEST['amount'],
	'amount_date'=> $_REQUEST['amount_date'],
	
	
	'truck_no'=> $_REQUEST['truck_no'],
	'driv_desc'=> $_REQUEST['driv_desc'],
	'owner_add'=> $_REQUEST['owner_add'],
	'delivery_add'=> $_REQUEST['delivery_add'],
	
	'gr_no'=> $_REQUEST['gr_no'],
	'gr_date'=> $_REQUEST['gr_date'],
	'from'=> $_REQUEST['from'],
	'to'=> $_REQUEST['to'],
	'value_goods'=> $_REQUEST['value_goods'],
	'to_pay'=> $_REQUEST['to_pay'],
	'paid'=> $_REQUEST['paid'],
	'to_be_billed'=> $_REQUEST['to_be_billed']);
	
	
	$var_meta=serialize($var2);	
	
$sqli=mysql_query("UPDATE meta_table SET meta_value='$var_meta' where meta_table.invoice_item_id='$ideas' && meta_table.meta_key='$meta_key'") or die(mysql_error());

//$sqli=mysql_query("INSERT INTO `meta_table`(invoice_item_id,meta_key,meta_value) VALUES ('$item_id','$meta_key','$var1')")or die(mysql_error());	
if($sqli){
 header('Location: http://truckwaale.in/customer.php?type=three');
}

}
}

?>