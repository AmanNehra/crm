<?php
session_start();
require_once('config.php');


if(isset($_POST)) {

function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

 $query="";
$tbl_name="corporate_list";			
// filename for download
$filename = "report_corporate_export_" . date('Ymd') . ".xls"; 
   header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

   if(isset($_REQUEST['category_ept'])&&$_REQUEST['category_ept']!="")
   {
	     $category=$_REQUEST['category_ept'];
   }
   if(isset($_REQUEST['specialisation_ept'])&&$_REQUEST['specialisation_ept']!="")
   {
	    $specialisation=$_REQUEST['specialisation_ept'];
   }
   if(isset($_REQUEST['country_ept'])&&$_REQUEST['country_ept']!="")
   {
	    $country=$_REQUEST['country_ept'];
   }
   if(isset($_REQUEST['state_ept'])&&$_REQUEST['state_ept']!="")
   {
	    $state=$_REQUEST['state_ept'];
   }
   if(isset($_REQUEST['district_ept'])&&$_REQUEST['district_ept']!="")
   {
	    $district=$_REQUEST['district'];
   }
   if(isset($_REQUEST['city_ept'])&&$_REQUEST['city_ept']!="")
   {
	    $city=$_REQUEST['city_ept'];
   }

if(!isset($page) || $page==""){
    $page = "1";
}else{
    $page = $page;
}	

if($page) 
$start = ($page - 1) * $limit;
else
$start = 0;		
	
if($specialisation!="" && $category!="" && $country!="" && $state!="" && $district!="" && $city!="")
	   $query = "SELECT * FROM $tbl_name WHERE(specialisation1='$specialisation' OR specialisation2='$specialisation' OR specialisation3='$specialisation' OR specialisation4='$specialisation') AND category='$category' AND country='$country' AND state='$state' AND district='$district' AND city='$city' ORDER BY id desc";
	else if($specialisation!="" && $category!="" && $country!="" && $state!="" && $district!="")
	   $query = "SELECT * FROM  $tbl_name WHERE (specialisation1='$specialisation' OR specialisation2='$specialisation' OR specialisation3='$specialisation' OR specialisation4='$specialisation') AND category='$category' AND country='$country' AND state='$state' AND district='$district' ORDER BY id desc";
	 else
	  $query = "SELECT * FROM $tbl_name ORDER BY id desc";  

$result = mysql_query($query);
 $title1="";
 $title1=array();
$count=0;
//echo  mysql_num_rows($result);

				if(!$flag) {
					
				  $title1[]="S.No.";
				  $title1[]="Code";
				  $title1[]="Corporate Name";
				  $title1[]="Address";
				  $title1[]="City";
				  $title1[]="Specialisation";
				  $title1[]="Category";

				  echo implode("\t", $title1) . "\r\n";
			  $flag = true;
			}	
while($row = mysql_fetch_assoc($result))
		{		
					$count=$count+1;
					$rows_excel=array();
					$ag_id=$row['id'];				  				  
					$spec="";
					$specialisation1=$row['specialisation1'];
					$specialisation2=$row['specialisation2'];
					$specialisation3=$row['specialisation3'];
					$specialisation4=$row['specialisation4'];
					
					if($specialisation1!="")
					 $spec=substr($specialisation1,0,5);
					if($specialisation2!="")
					 $spec.=",".substr($specialisation2,0,5);
				   if($specialisation3!="")
				     $spec.=",".substr($specialisation3,0,5);
				   if($specialisation4!="")
				     $spec.=",".substr($specialisation4,0,5);
					
					
				$rows_excel[]=$count;
				$rows_excel[]=$row['code'];
				$rows_excel[]= substr($row['name'],0,18);
				$rows_excel[]=substr($row['address'],0,33);
				$rows_excel[]=substr($row['city'],0,11);
				$rows_excel[]=$spec;
				$rows_excel[]=substr($row['category'],0,4);

				array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
		
	
  exit;
  
 
}


?>