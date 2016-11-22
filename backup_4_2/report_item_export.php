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
$tbl_name="item_master_list";	
$filename = "report_item_export_" . date('Ymd') . ".xls"; // filename for download 
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
 
 $search1=mysql_real_escape_string($_REQUEST['search1_ept']);
 $search2=mysql_real_escape_string($_REQUEST['search2_ept']);
 $searchby1=mysql_real_escape_string($_REQUEST['searchby1_ept']);
 $searchby2=mysql_real_escape_string($_REQUEST['searchby2_ept']);
 $page=mysql_real_escape_string($_REQUEST['page']);
 $limit = 10;

if(!isset($page) || $page==""){
    $page = "1";
}else{
    $page = $page;
}	

if($page) 
$start = ($page - 1) * $limit;
else
$start = 0;		
	
 
	if($searchby1!="" && $search1!="" &&  $searchby2!="" && $search2!="")
	$sql = "SELECT * FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') AND ($searchby2 LIKE '%$search2%') ORDER BY id desc";
	else if($searchby1!="" && $search1!="")
	$sql = "SELECT * FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') ORDER BY id desc";
	else
	$sql = "SELECT * FROM $tbl_name ORDER BY id desc ";
	


$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
				  $title[]="S.No.";
				  $title[]="Item Name";
				  $title[]="Subject";
				  $title[]="Class";
				  $title[]="Price";
				  $title[]="Series";
				  $title[]="Book Alias";
				  $title[]="ISBN";
				  $title[]="Discount";
				  $title[]="Author";
				  $title[]="Remarks";
				  $title[]="Date";
				 
				   
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				
				$count=$count+1;
				$rows_excel=array();
				
				  $school="";
					$school_visit="";
					
					$teacher="";
					$teacher_visit="";
					
					$bookseller="";
					$bookseller_visit="";
					
					$distributor="";
					$distributor_visit="";
					
					$publisher="";
					$publisher_visit="";
					
					if($row['relate']=="SCHOOL" || $row['relate']=="CHAIN")
					  {
					   $school=$row['name'];
					   $school_visit=$row['sampling_type'];
					  }					
					  else if($row['relate']=="TEACHER")
					  {
					   $teacher=$row['name'];
					   $teacher_visit=$row['sampling_type'];
					  }	
					  else if($row['relate']=="CORPORATE")
					  {
					   $corporate_id=$row['id_of_name'];
					   
					   $query12=mysql_query("SELECT category FROM corporate_list WHERE id='$corporate_id'") or die(mysql_error());
					   $data12=mysql_fetch_array($query12);
					   if($data12['category']=="BOOKSELLER")
					     {
					     $bookseller=$row['name'];
					     $bookseller_visit=$row['sampling_type'];
					     }
					    else if($data12['category']=="DISTRIBUTORS")
					     {
					     $distributor=$row['name'];
					     $distributor_visit=$row['sampling_type'];
					     }
						 else if($data12['category']=="PUBLISHERS")
					     {
					     $publisher=$row['name'];
					     $publisher_visit=$row['sampling_type'];
					     }
					  }						
			$rows_excel[]=$count; 		
			$rows_excel[]=$row['item_name'];
			$rows_excel[]=$row['subject'];
			$rows_excel[]=$row['class'];
			$rows_excel[]=$row['price'];
			$rows_excel[]=$row['series'];
			$rows_excel[]=$row['book_alias'];
			$rows_excel[]=$row['isbn'];
			$rows_excel[]=$row['discount'];
			$rows_excel[]=$row['author'];
			$rows_excel[]=$row['remarks'];
			$rows_excel[]=substr($row['date_added'],0,10);
			
				
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>