<?php
require_once('config.php');
if(isset($_POST)) {

function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  
$query="";
$tbl_name="master_list";	
$filename = "report_teacher_list_export_" . date('Ymd') . ".xls"; // filename for download 
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
	 
 $board=mysql_real_escape_string($_REQUEST['board_ept']);
 $category_ept=mysql_real_escape_string($_REQUEST['category_ept']);
 $category=str_replace(",","','",$category_ept);
 $country=mysql_real_escape_string($_REQUEST['country_ept']);
 $city=mysql_real_escape_string($_REQUEST['city_ept']);
 $district=mysql_real_escape_string($_REQUEST['district_ept']);
 $city=mysql_real_escape_string($_REQUEST['city_ept']);

 $limit = 10;

 $page="";
if(!isset($page) || $page==""){
    $page = "1";
}else{
    $page = $page;
}	

if($page) 
$start = ($page - 1) * $limit;
else
$start = 0;		
	
/* Get data. */
	if($board!="" && $category!="" && $country!="" && $state!="" && $district!="" && $city!="")
	   $sql = "SELECT * FROM $tbl_name WHERE board='$board' AND category in ('$category') AND country='$country' AND state='$state' AND district='$district' AND city='$city' ";
	else if($board!="" && $category!="" && $country!="" && $state!="" && $district!="")
	   $sql = "SELECT * FROM  $tbl_name WHERE board='$board' AND category in ('$category') AND country='$country' AND state='$state' AND district='$district' ";
	 else
	  $sql = "SELECT * FROM $tbl_name";  
	  
  
$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
	
				  $title[]="S.No.";
				  $title[]="Code";
				  $title[]="school Name";
				  $title[]="Address";
				  $title[]="City";
				  $title[]="Board";
				  $title[]="Category";
				  
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				$count=$count+1;
				$rows_excel=array();
				
				$uid=$row['id'];
				
			$rows_excel[]= $count;
			$rows_excel[]= $row['code'];
			$rows_excel[]=substr($row['name'],0,18);
			$rows_excel[]=substr($row['address'],0,33);
			$rows_excel[]=substr($row['city'],0,11);
			$rows_excel[]=substr($row['board'],0,3);
			$rows_excel[]=substr($row['category'],0,4);
			
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>