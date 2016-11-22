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
 $tbl_name="workshop";	
// filename for download
 $filename = "workshop_export_" . date('Ymd') . ".xls"; 
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
				  $title[]="Executive Name";
				  $title[]="Designation";
				  $title[]="School Detail";
				  $title[]="Vanue Detail";
				  $title[]="Proposed Date";
				  $title[]="Resource Person";
				  $title[]="Estimated Cost";
				  $title[]="Estimated Rent";
				  $title[]="Business Goal";
				  $title[]="Remarks";
				  $title[]="Status";
				  $title[]="Approved By";
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				$count=$count+1;
				$rows_excel=array();
				$ag_id=$row['id'];
				$query1=mysql_query("SELECT estimated_rent FROM workshopRent WHERE id='$ag_id'");
				$data1=mysql_fetch_array($query1);
				$estimated_rent=$data1['estimated_rent'];

				$rows_excel[]=$count;
				$rows_excel[]=$row['executive'];
				$rows_excel[]=$row['designation'];
				$rows_excel[]=$row['school'];
				$rows_excel[]=$row['v_detail'];
				$rows_excel[]=$row['proposed_date'];
				$rows_excel[]=$row['resource_person'];
				$rows_excel[]=$row['estimated_cost'];
				$rows_excel[]=$estimated_rent;
				$rows_excel[]=$row['goal'];
				$rows_excel[]=$row['remarks'];
				if( ($row['status']==1) || ($row['status']==2) ) {$rows_excel[]="Approved";} else {$rows_excel[]="Not Approved";  }
				$rows_excel[]=$row['approved_by'];
				
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>