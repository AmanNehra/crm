<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$id=$_POST['id'];
$depart=$_POST['depart'];

$query=mysql_query("SELECT id,name,designation FROM department_list where (`department`='$depart') AND (`id`='$id') ");
$value=mysql_fetch_array($query);
$str=$value['id']."#".$value['name']."#".$value['designation'];
echo $str;
?>
