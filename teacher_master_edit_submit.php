<?php
require_once('config.php');
if(isset($_POST['submit'])) {
$id = $_POST['id'];

$school=mysql_real_escape_string($_REQUEST['school']);
$teacher=mysql_real_escape_string($_REQUEST['teacher']);
$designation=mysql_real_escape_string($_REQUEST['designation']);
$address=mysql_real_escape_string($_REQUEST['address']);
$dob=mysql_real_escape_string($_REQUEST['dob']);
$mstatus=mysql_real_escape_string($_REQUEST['mstatus']);
$relation=mysql_real_escape_string($_REQUEST['relation']);
$city=mysql_real_escape_string($_REQUEST['city']);
$district=mysql_real_escape_string($_REQUEST['district']);
$state=mysql_real_escape_string($_REQUEST['state']);
$country=mysql_real_escape_string($_REQUEST['country']);
$pin=mysql_real_escape_string($_REQUEST['pin']);
$std=mysql_real_escape_string($_REQUEST['std']);
$phone1=mysql_real_escape_string($_REQUEST['phone1']);
$mobile1=mysql_real_escape_string($_REQUEST['mobile1']); 
$mobile2=mysql_real_escape_string($_REQUEST['mobile2']);
$email=mysql_real_escape_string($_REQUEST['email']);
$subject=mysql_real_escape_string($_REQUEST['subject']);
$item=mysql_real_escape_string($_REQUEST['item']);
$class=mysql_real_escape_string($_REQUEST['class']); 
$date = date('Y-m-d H:i:s'); 
//echo'</pre>';print_r($encrypt);die;
$sq=mysql_query("UPDATE teacher_master_list SET school='$school', teacher='$teacher', designation='$designation', address='$address', dob='$dob',mstatus='$mstatus', relation='$relation', city='$city',district='$district', state='$state',country='$country', pin='$pin', std='$std', phone1='$phone1', mobile1='$mobile1',mobile2='$mobile2', email='$email', subject='$subject',item='$item', class='$class',date_added='$date' where id='$id'") or die(mysql_error());
//echo'</pre>';print_r($sq);die;
if($sq){
     header('location:teacher_master_listing.php');
    }
	else{ header('location:teacher_master_edit.php?id='.$id);}}


  

?>