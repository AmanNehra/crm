<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$id=$_POST['id']; 
$str="";
$q1=mysql_query("SELECT * FROM teacher_master_list where (id='$id')");
$value=mysql_fetch_array($q1);
$str=$value['teacher']."#".$value['phone1']."#".$value['mobile1']."#".$value['mobile2']."#".$value['designation'];
echo $str;
?>
