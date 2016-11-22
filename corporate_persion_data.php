<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$id=$_POST['id']; 
$str="";
$q1=mysql_query("SELECT * FROM corporate_sub where (id='$id')");
$value=mysql_fetch_array($q1);
$str=$value['persion']."#".$value['address']."#".$value['phone1']."#".$value['mobile1']."#".$value['mobile2'];
echo $str;
?>
