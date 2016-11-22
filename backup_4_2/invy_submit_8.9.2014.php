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
if(empty($_POST['bill_no']) || empty($_POST['book_no'])){echo 'Data not filled properly, please try again';die;}
$var2=array(
	's_no1'=> $_REQUEST['s_no1'],
	's_no2'=> $_REQUEST['s_no2'],
	's_no3'=> $_REQUEST['s_no3'],
	's_no4'=> $_REQUEST['s_no4'],
	's_no5'=> $_REQUEST['s_no5'],
	's_no6'=> $_REQUEST['s_no6'],
	's_no7'=> $_REQUEST['s_no7'],
	's_no8'=> $_REQUEST['s_no8'],
	's_no9'=> $_REQUEST['s_no9'],
	's_no10'=> $_REQUEST['s_no10'],
	's_no11'=> $_REQUEST['s_no11'],
	's_no12'=> $_REQUEST['s_no12'],
	's_no13'=> $_REQUEST['s_no13'],
	's_no14'=> $_REQUEST['s_no14'],
	's_no15'=> $_REQUEST['s_no15']);
	
$var3=array('particular1'=> $_REQUEST['particular1'],
	'particular2'=> $_REQUEST['particular2'],
	'particular3'=> $_REQUEST['particular3'],
	'particular4'=> $_REQUEST['particular4'],
	'particular5'=> $_REQUEST['particular5'],
	'particular6'=> $_REQUEST['particular6'],
	'particular7'=> $_REQUEST['particular7'],
	'particular8'=> $_REQUEST['particular8'],
	'particular9'=> $_REQUEST['particular9'],
	'particular10'=> $_REQUEST['particular10'],
	'particular11'=> $_REQUEST['particular11'],
	'particular12'=> $_REQUEST['particular12'],
	'particular13'=> $_REQUEST['particular13'],
	'particular14'=> $_REQUEST['particular14'],
	'particular15'=> 'Sale Against Central Farm C/H/F/');

	
$var4=array('item1'=> $_REQUEST['item1'],
	'item2'=> $_REQUEST['item2'],
	'item3'=> $_REQUEST['item3'],
	'item4'=> $_REQUEST['item4'],
	'item5'=> $_REQUEST['item5'],
	'item6'=> $_REQUEST['item6'],
	'item7'=> $_REQUEST['item7'],
	'item8'=> $_REQUEST['item8'],
	'item9'=> $_REQUEST['item9'],
	'item10'=> $_REQUEST['item10'],
	'item11'=> $_REQUEST['item11'],
	'item12'=> $_REQUEST['item12'],
	'item13'=> $_REQUEST['item13'],
	'item14'=> $_REQUEST['item14'],
	'item15'=> $_REQUEST['item15']);
	
$var5=array('qty1'=> $_REQUEST['qty1'],
	'qty2'=> $_REQUEST['qty2'],
	'qty3'=> $_REQUEST['qty3'],
	'qty4'=> $_REQUEST['qty4'],
	'qty5'=> $_REQUEST['qty5'],
	'qty6'=> $_REQUEST['qty6'],
	'qty7'=> $_REQUEST['qty7'],
	'qty8'=> $_REQUEST['qty8'],
	'qty9'=> $_REQUEST['qty9'],
	'qty10'=> $_REQUEST['qty10'],
	'qty11'=> $_REQUEST['qty11'],
	'qty12'=> $_REQUEST['qty12'],
	'qty13'=> $_REQUEST['qty13'],
	'qty14'=> $_REQUEST['qty14'],
	'qty15'=> $_REQUEST['qty15']);
	
$var6=array('rate1'=> $_REQUEST['rate1'],
	'rate2'=> $_REQUEST['rate2'],
	'rate3'=> $_REQUEST['rate3'],	
	'rate4'=> $_REQUEST['rate4'],
	'rate5'=> $_REQUEST['rate5'],
	'rate6'=> $_REQUEST['rate6'],
	'rate7'=> $_REQUEST['rate7'],
	'rate8'=> $_REQUEST['rate8'],
	'rate9'=> $_REQUEST['rate9'],
	'rate10'=> $_REQUEST['rate10'],
	'rate11'=> $_REQUEST['rate11'],
	'rate12'=> $_REQUEST['rate12'],
	'rate13'=> $_REQUEST['rate13'],
	'rate14'=> $_REQUEST['rate14'],
	'rate15'=> $_REQUEST['rate15']);
	
$var7=array('amount1'=> $_REQUEST['amount1'],
	'amount2'=> $_REQUEST['amount2'],
	'amount3'=> $_REQUEST['amount3'],
	'amount4'=> $_REQUEST['amount4'],
	'amount5'=> $_REQUEST['amount5'],
	'amount6'=> $_REQUEST['amount6'],
	'amount7'=> $_REQUEST['amount7'],
	'amount8'=> $_REQUEST['amount8'],
	'amount9'=> $_REQUEST['amount9'],
	'amount10'=> $_REQUEST['amount10'],
	'amount11'=> $_REQUEST['amount11'],
	'amount12'=> $_REQUEST['amount12'],
	'amount13'=> $_REQUEST['amount13'],
	'amount14'=> $_REQUEST['amount14'],
	'amount15'=> $_REQUEST['amount15']);
	
$sno=serialize($var2);	
$partic=serialize($var3);	
$itm=serialize($var4);
$qty=serialize($var5);
$rat=serialize($var6);	
$amnt=serialize($var7);
$sql=mysql_query("INSERT INTO `invoice_item_table`(s_no,particular,itemcode,qty,rate,amount) VALUES ('$sno','$partic','$itm','$qty','$rat','$amnt')")or die(mysql_error());	
if($sql)	
	{
		$qry=mysql_query("select MAX(`item_id`) FROM `invoice_item_table`") or die(mysql_error());
		$qery=mysql_fetch_array($qry);
		 $item_id=$qery['MAX(`item_id`)'];
	
		$meta_key='invoice-item';

$var1=array(
	'bill_no'=> $_REQUEST['bill_no'],
	'book_no'=> $_REQUEST['book_no'],
	'bill_date'=> $_REQUEST['bill_date'],
	'ms'=> $_REQUEST['ms'],
	'po_no'=> $_REQUEST['po_no'],
	'po_date'=> $_REQUEST['po_date'],
	'rr_gr_no'=> $_REQUEST['rr_gr_no'],
	'w_code'=> $_REQUEST['w_code'],
	'w_date'=> $_REQUEST['w_date'],
	'carier'=> $_REQUEST['carier'],
	'time'=> $_REQUEST['time'],
	'party_tin'=> $_REQUEST['party_tin'],
	'party_tin_date'=> $_REQUEST['party_tin_date'],
	'rupees'=> $_REQUEST['rupees'],
	'total'=> $_REQUEST['total'],
	'service_tax'=> $_REQUEST['service_tax'],
	'cartage'=> $_REQUEST['cartage'],
	'grand_total'=> $_REQUEST['grand_total'],
	);
$var1=serialize($var1); 

$sqli=mysql_query("INSERT INTO `meta_table`(invoice_item_id,meta_key,meta_value) VALUES ('$item_id','$meta_key','$var1')")or die(mysql_error());	
if($sqli){
 echo "<script>";
   echo "refreshAndClose();";
   echo "</script>";
}

}

  

//print_r($var1);die;

}elseif(isset($_POST['edit'])){
$id=$_REQUEST['invoice_itm_id'];

//echo $id;die;
$var2=array(
	's_no1'=> $_REQUEST['s_no1'],
	's_no2'=> $_REQUEST['s_no2'],
	's_no3'=> $_REQUEST['s_no3'],
	's_no4'=> $_REQUEST['s_no4'],
	's_no5'=> $_REQUEST['s_no5'],
	's_no6'=> $_REQUEST['s_no6'],
	's_no7'=> $_REQUEST['s_no7'],
	's_no8'=> $_REQUEST['s_no8'],
	's_no9'=> $_REQUEST['s_no9'],
	's_no10'=> $_REQUEST['s_no10'],
	's_no11'=> $_REQUEST['s_no11'],
	's_no12'=> $_REQUEST['s_no12'],
	's_no13'=> $_REQUEST['s_no13'],
	's_no14'=> $_REQUEST['s_no14'],
	's_no15'=> $_REQUEST['s_no15']);
	
$var3=array('particular1'=> $_REQUEST['particular1'],
	'particular2'=> $_REQUEST['particular2'],
	'particular3'=> $_REQUEST['particular3'],
	'particular4'=> $_REQUEST['particular4'],
	'particular5'=> $_REQUEST['particular5'],
	'particular6'=> $_REQUEST['particular6'],
	'particular7'=> $_REQUEST['particular7'],
	'particular8'=> $_REQUEST['particular8'],
	'particular9'=> $_REQUEST['particular9'],
	'particular10'=> $_REQUEST['particular10'],
	'particular11'=> $_REQUEST['particular11'],
	'particular12'=> $_REQUEST['particular12'],
	'particular13'=> $_REQUEST['particular13'],
	'particular14'=> $_REQUEST['particular14'],
	'particular15'=> 'Sale Against Central Farm C/H/F/');

	
$var4=array('item1'=> $_REQUEST['item1'],
	'item2'=> $_REQUEST['item2'],
	'item3'=> $_REQUEST['item3'],
	'item4'=> $_REQUEST['item4'],
	'item5'=> $_REQUEST['item5'],
	'item6'=> $_REQUEST['item6'],
	'item7'=> $_REQUEST['item7'],
	'item8'=> $_REQUEST['item8'],
	'item9'=> $_REQUEST['item9'],
	'item10'=> $_REQUEST['item10'],
	'item11'=> $_REQUEST['item11'],
	'item12'=> $_REQUEST['item12'],
	'item13'=> $_REQUEST['item13'],
	'item14'=> $_REQUEST['item14'],
	'item15'=> $_REQUEST['item15']);
	
$var5=array('qty1'=> $_REQUEST['qty1'],
	'qty2'=> $_REQUEST['qty2'],
	'qty3'=> $_REQUEST['qty3'],
	'qty4'=> $_REQUEST['qty4'],
	'qty5'=> $_REQUEST['qty5'],
	'qty6'=> $_REQUEST['qty6'],
	'qty7'=> $_REQUEST['qty7'],
	'qty8'=> $_REQUEST['qty8'],
	'qty9'=> $_REQUEST['qty9'],
	'qty10'=> $_REQUEST['qty10'],
	'qty11'=> $_REQUEST['qty11'],
	'qty12'=> $_REQUEST['qty12'],
	'qty13'=> $_REQUEST['qty13'],
	'qty14'=> $_REQUEST['qty14'],
	'qty15'=> $_REQUEST['qty15']);
	
$var6=array('rate1'=> $_REQUEST['rate1'],
	'rate2'=> $_REQUEST['rate2'],
	'rate3'=> $_REQUEST['rate3'],	
	'rate4'=> $_REQUEST['rate4'],
	'rate5'=> $_REQUEST['rate5'],
	'rate6'=> $_REQUEST['rate6'],
	'rate7'=> $_REQUEST['rate7'],
	'rate8'=> $_REQUEST['rate8'],
	'rate9'=> $_REQUEST['rate9'],
	'rate10'=> $_REQUEST['rate10'],
	'rate11'=> $_REQUEST['rate11'],
	'rate12'=> $_REQUEST['rate12'],
	'rate13'=> $_REQUEST['rate13'],
	'rate14'=> $_REQUEST['rate14'],
	'rate15'=> $_REQUEST['rate15']);
	
$var7=array('amount1'=> $_REQUEST['amount1'],
	'amount2'=> $_REQUEST['amount2'],
	'amount3'=> $_REQUEST['amount3'],
	'amount4'=> $_REQUEST['amount4'],
	'amount5'=> $_REQUEST['amount5'],
	'amount6'=> $_REQUEST['amount6'],
	'amount7'=> $_REQUEST['amount7'],
	'amount8'=> $_REQUEST['amount8'],
	'amount9'=> $_REQUEST['amount9'],
	'amount10'=> $_REQUEST['amount10'],
	'amount11'=> $_REQUEST['amount11'],
	'amount12'=> $_REQUEST['amount12'],
	'amount13'=> $_REQUEST['amount13'],
	'amount14'=> $_REQUEST['amount14'],
	'amount15'=> $_REQUEST['amount15']);
	
$sno=serialize($var2);	
$partic=serialize($var3);	
$itm=serialize($var4);
$qty=serialize($var5);
$rat=serialize($var6);	
$amnt=serialize($var7);

$sql=mysql_query("UPDATE invoice_item_table SET s_no='$sno', particular='$partic', itemcode='$itm', qty='$qty', rate='$rat',amount='$amnt' where item_id='$id'") or die(mysql_error());

//$sql=mysql_query("INSERT INTO `invoice_item_table`(s_no,particular,itemcode,qty,rate,amount) VALUES ('$sno','$partic','$itm','$qty','$rat','$amnt')")or die(mysql_error());	
if($sql)	
	{
		//$qry=mysql_query("select MAX(`item_id`) FROM `invoice_item_table`") or die(mysql_error());
		//$qery=mysql_fetch_array($qry);
		 //$item_id=$qery['MAX(`item_id`)'];
	
		//$meta_key='invoice-item';

$var1=array(
	'bill_no'=> $_REQUEST['bill_no'],
	'book_no'=> $_REQUEST['book_no'],
	'bill_date'=> $_REQUEST['bill_date'],
	'ms'=> $_REQUEST['ms'],
	'po_no'=> $_REQUEST['po_no'],
	'po_date'=> $_REQUEST['po_date'],
	'rr_gr_no'=> $_REQUEST['rr_gr_no'],
	'w_code'=> $_REQUEST['w_code'],
	'w_date'=> $_REQUEST['w_date'],
	'carier'=> $_REQUEST['carier'],
	'time'=> $_REQUEST['time'],
	'party_tin'=> $_REQUEST['party_tin'],
	'party_tin_date'=> $_REQUEST['party_tin_date'],
	'rupees'=> $_REQUEST['rupees'],
	'total'=> $_REQUEST['total'],
	'service_tax'=> $_REQUEST['service_tax'],
	'cartage'=> $_REQUEST['cartage'],
	'grand_total'=> $_REQUEST['grand_total'],
	);
$var1=serialize($var1); 
$meta_key='invoice-item';
$sqli=mysql_query("UPDATE meta_table SET meta_value='$var1' where meta_table.invoice_item_id='$id' && meta_table.meta_key='$meta_key'") or die(mysql_error());

//$sqli=mysql_query("INSERT INTO `meta_table`(invoice_item_id,meta_key,meta_value) VALUES ('$item_id','$meta_key','$var1')")or die(mysql_error());	
if($sqli){
 echo "<script>";
   echo "refreshAndClose();";
   echo "</script>";
}

}
}

?>