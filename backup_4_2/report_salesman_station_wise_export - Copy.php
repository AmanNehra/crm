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
$filename = "report_salesman_station_wise_export_" . date('Ymd') . ".xls"; // filename for download 
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
 
 $state=mysql_real_escape_string($_REQUEST['state_ept']);
 $district=mysql_real_escape_string($_REQUEST['district_ept']);
 $city=mysql_real_escape_string($_REQUEST['city_ept']);
 $department=mysql_real_escape_string($_REQUEST['department_ept']);
 $salesman_id=mysql_real_escape_string($_REQUEST['salesman_id_ept']);
 $from_date=mysql_real_escape_string($_REQUEST['from_date_ept']);
 $to_date=mysql_real_escape_string($_REQUEST['to_date_ept']);
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
	
  $sql = "SELECT * FROM $tbl_name ORDER BY book_alias";

$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
				  $title[]="Book Name";
				  $title[]="Class";
				  $title[]="Price";
				  $title[]="School";
				  $title[]="Contact";
				 
				   
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				
				
				$rows_excel=array();
				
				 $ag_id=$row['id'];
								
					$school_given_qty=0;
					$contact_given_qty=0;					
					
				  //For sampling record
				  if($state!="" && $district!="" && $city!=""&& isset($from_SESSION['from']) && isset($to) && isset($salesman_id) )
				     $query1="SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND city='$city' AND district='$district' AND state='$state'";
					 
				  else if($state!="" && $district!="" && isset($from) && isset($to) && isset($salesman_id) )
				     $query1="SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'AND district='$district' AND state='$state'";
					 
				  else if($state!="" && isset($from) && isset($to) && isset($salesman_id) )
				     $query1="SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND state='$state'";
				else if(isset($from) && isset($to) && isset($salesman_id) )
				     $query1="SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' ";
				else
				     $query1="SELECT * FROM book_sample";
					
					$query1=mysql_query($query1) or die(mysql_error());
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];				 
					 
					 $relate=$data1['relate'];
					 
				     $query2=mysql_query("SELECT * FROM book_sample_details WHERE uid='$row_uid' AND book_id='$ag_id'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 	
					if($relate=="SCHOOL" || $relate=="TEACHER" )
					    $school_given_qty+=$data2['qty'];
					else
					   $contact_given_qty+=$data2['qty'];		 
					   
				  }	
					
			$rows_excel[]=$row['item_name'];
			$rows_excel[]=$row['class'];
			$rows_excel[]=$row['price'];
			$rows_excel[]=$school_given_qty;
			$rows_excel[]=$contact_given_qty;
			
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>