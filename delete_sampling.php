<?php 
require_once('config.php');

$delete=$_GET['delete'];

if($delete=='SD'){
$id = convert_uudecode(base64_decode($_GET['id']));
$tbl_name=convert_uudecode(base64_decode($_GET['type']));
$t_page=$_REQUEST['t_page'];

//echo $id.'<br>'.$sid.'<br>'.$tbl_name.'<br>'.$t_page; die;
mysql_query("START TRANSECTION");
$q1=mysql_query("DELETE from book_sample WHERE id='$id'") or die(mysql_error());

$q2=mysql_query("DELETE from book_sample_details WHERE uid='$id'") or die(mysql_error());
if($q1 && q2){
mysql_query("COMMIT");
 header('location:'.$t_page);
 }
 else
  mysql_query("ROLLBACK");
    header('location:'.$t_page);
}

?>