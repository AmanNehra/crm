<script type="text/javascript">
function refreshAndClose() {
            window.opener.location.reload(true);
            window.close();
}
</script>
<?php
require_once('config.php');

if(isset($_POST['submit']))
{
//echo 'hello'; die;
if(empty($_POST['to']) || empty($_POST['phones'])){echo 'data not filled properly, try again';die;}
	$to= $_REQUEST['to'];
	
	$phones= $_REQUEST['phones'];
	$sr_no= $_REQUEST['sr_no'];
	$date_q= $_REQUEST['date_q'];
	$sor= $_REQUEST['source'];
	$des= $_REQUEST['destin'];
	$gtotal= $_REQUEST['grand'];
	$valid_till= $_REQUEST['offer_v'];

$sql=mysql_query("INSERT INTO `quotations`(tuu, sr_no, phone, date_q, sor, des, gtotal, valid_till) VALUES ('$to','$sr_no','$phones','$date_q','$sor','$des', '$gtotal', '$valid_till')")or die(mysql_error());	
if($sql)
	{
		$qry=mysql_query("select MAX(`id`) FROM `quotations`") or die(mysql_error());
		$qery=mysql_fetch_array($qry);
		 $item_id=$qery['MAX(`id`)'];
	
		$meta_key='quotation-item';

$var2=array(
	'tc'=> $_REQUEST['tc'],
	'pc'=> $_REQUEST['pc'],
	'lc'=> $_REQUEST['lc'],
	'uc'=> $_REQUEST['uc'],
	'un_c'=> $_REQUEST['un_c'],
	'ec'=> $_REQUEST['ec'],
	'ctc'=> $_REQUEST['ctc'],
	'sc'=> $_REQUEST['sc'],
	'octroi'=> $_REQUEST['octroi'],
	'transit'=> $_REQUEST['transit'],
	'comprehensive'=> $_REQUEST['comprehensive'],
	'service'=> $_REQUEST['service'],
	'total'=> $_REQUEST['total']
	);
	
$sno=serialize($var2);

$sqli=mysql_query("INSERT INTO `meta_table`(invoice_item_id,meta_key,meta_value) VALUES ('$item_id','$meta_key','$sno')")or die(mysql_error());	
if($sqli){
 echo "<script>";
   echo "refreshAndClose();";
   echo "</script>";
}

}

  

//print_r($var1);die;

}elseif(isset($_POST['edit'])){
$id=$_REQUEST['q_id'];
$to= $_REQUEST['to'];
	
	$phones= $_REQUEST['phones'];
	$sr_no= $_REQUEST['s_no'];
	$date_q= $_REQUEST['date_q'];
	$sor= $_REQUEST['source'];
	$des= $_REQUEST['destin'];
	$gtotal= $_REQUEST['grand'];
	$valid_till= $_REQUEST['offer_v'];

$sql=mysql_query("UPDATE quotations SET tuu='$to', sr_no='$sr_no', phone='$phones', date_q='$date_q', sor='$sor',des='$des', gtotal='$gtotal', valid_till='$valid_till' where id='$id'") or die(mysql_error());

//$sql=mysql_query("INSERT INTO `invoice_item_table`(s_no,particular,itemcode,qty,rate,amount) VALUES ('$sno','$partic','$itm','$qty','$rat','$amnt')")or die(mysql_error());	
if($sql)	
	{
		

$meta_key='quotation-item';

$var2=array(
	'tc'=> $_REQUEST['tc'],
	'pc'=> $_REQUEST['pc'],
	'lc'=> $_REQUEST['lc'],
	'uc'=> $_REQUEST['uc'],
	'un_c'=> $_REQUEST['un_c'],
	'ec'=> $_REQUEST['ec'],
	'ctc'=> $_REQUEST['ctc'],
	'sc'=> $_REQUEST['sc'],
	'octroi'=> $_REQUEST['octroi'],
	'transit'=> $_REQUEST['transit'],
	'comprehensive'=> $_REQUEST['comprehensive'],
	'service'=> $_REQUEST['service'],
	'total'=> $_REQUEST['total']
	);
	
$sno=serialize($var2);
$sqli=mysql_query("UPDATE meta_table SET meta_value='$sno' where meta_table.invoice_item_id='$id' && meta_table.meta_key='$meta_key'") or die(mysql_error());

//$sqli=mysql_query("INSERT INTO `meta_table`(invoice_item_id,meta_key,meta_value) VALUES ('$item_id','$meta_key','$var1')")or die(mysql_error());	
if($sqli){
 echo "<script>";
   echo "refreshAndClose();";
   echo "</script>";
}

}
}

?>