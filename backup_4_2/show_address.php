<?php
include ('config.php');
$tbl=$_REQUEST['tbl'];
$id=$_REQUEST['id'];
 
if($tbl=="Corporate")
 $tbl="corporate_list";
elseif($tbl=="School")
 $tbl="master_list";
elseif($tbl=="Chain_of_school")
 $tbl="chain_school_list";
else
 $tbl="";
 

 if($tbl!=""){
 $query=mysql_query("SELECT * FROM `$tbl` WHERE id='$id'");
 $data=mysql_fetch_array($query);
 $string=$data['address']."#".$data['city']."#".$data['district']."#".$data['state']."#".$data['country']."#".$data['name'];
 echo $string; die();
}
?>