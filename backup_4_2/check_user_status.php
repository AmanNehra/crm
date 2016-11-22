<?php 

 $total_page=mysql_query("SELECT * FROM pages "); 
 while($rowll=mysql_fetch_array($total_page)) 
    {
$resultll[] =($rowll['id']);
 
 
  
 }
// echo "<pre>";print_r($resultll);

 $page=mysql_query("SELECT * FROM dan_users WHERE id = '$userid'"); 
 while($row=mysql_fetch_array($page)) 
    {
$result = unserialize($row['user_authority']);
//echo "<pre>";print_r($result);  
 $value = (implode(",",$result)); 
  
 }
  $result2=array_intersect($resultll,$result);
//echo "<pre>";print_r($result2);  
  $allvalue[] = (implode("",$result2));  
 ?>
 <?php $page=mysql_query("SELECT * FROM pages WHERE id IN($value)");  
    $totalpage = $row['url']; 
   function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
 } 
  $curpage = curPageName();  
$matchpage=mysql_query("SELECT * FROM pages WHERE url = '$curpage'");   
$matchrow=mysql_fetch_array($matchpage); 
$valuepage[] = $matchrow['id'];  
$result22=array_intersect($result2,$valuepage);
$value23 = (implode(",",$result22));  
$resultpage=mysql_query("SELECT * FROM pages WHERE id = '$value23'");
while($resultrow=mysql_fetch_array($resultpage)) 
    {
  $resultrow =$resultrow['url'];
//echo "<pre>";print_r($result); 
 
if ($curpage != $resultrow) 
{
header('location:login.php');
}
else {
//echo "sunil";

}
 }
?>
 
  
 
 
   