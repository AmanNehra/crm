<?php
require_once('config.php');
$query=mysql_query("select * from working_area WHERE salesman_id='36'") or die(mysql_error());
while($data=mysql_fetch_assoc($query))
{
 $state[]=$data['state'];
 $district[]=$data['district'];
 $city[]=unserialize($data['city']);
 //echo '<pre>';print_r($data);

}
$state=array_unique($state);
$district=array_unique($district);
$std="";
$did="";
$cid="";
foreach($state as $st)
  $std .="'".$st."',";
  $std=rtrim($std,",");
foreach($district as $di)
  $did .="'".$di."',";
  $did=rtrim($did,",");
$size=sizeof($city);
for($i=0;$i<$size; $i++)
  {
   foreach($city[$i] as $ci)
     $cid .="'".$ci."',";  
  }
$cid=rtrim($cid,",");
  
  

echo "<pre>";print_r($std);echo "<br>";
echo "<pre>";print_r($did);echo "<br>";
echo "<pre>";print_r($cid);


?>