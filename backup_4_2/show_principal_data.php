<?php
include ('config.php');
$str="";
if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];
$q=mysql_query("SELECT code,name,address,phone1,phone2,mobile FROM master_list WHERE (id='$id')");
$d=mysql_fetch_array($q);

$school=$d['name'];
$str=$d['address']."#".$d['phone1']."#".$d['phone2']."#".$d['mobile']."#".$code;
$q1=mysql_query("SELECT teacher FROM teacher_master_list where (uid='$id') AND (designation='PRINCIPAL')");
$d1=mysql_fetch_array($q1);
$name=$d1['teacher']; 
$str.="#".$name."#".$school;
echo $str;
}
else
 echo $str="";
?>