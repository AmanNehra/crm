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
$tbl_name="expense";			
// filename for download
$filename = "report_salesman_other_expence_export_" . date('Ymd') . ".xls"; 
   header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  if(isset($_REQUEST['from_date_ept'])&&$_REQUEST['from_date_ept']!=""&&isset($_REQUEST['to_date_ept'])&&$_REQUEST['to_date_ept']!="")
  {
	 $search1=mysql_real_escape_string($_REQUEST['from_date_ept']);
	 $search1=mysql_real_escape_string($_REQUEST['to_date_ept']);
  }

 $department=mysql_real_escape_string($_REQUEST['department_ept']);
 $salesman_id=mysql_real_escape_string($_REQUEST['salesman_id_ept']);
 
if(!isset($page) || $page==""){
    $page = "1";
}else{
    $page = $page;
}	

if($page) 
$start = ($page - 1) * $limit;
else
$start = 0;		
	
  	if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
	  $sql = "SELECT * FROM $tbl_name WHERE status=2 AND report_date BETWEEN '$from' AND '$to' AND executive_id='$salesman_id' ORDER BY id desc";
	else
	   $sql = "SELECT * FROM $tbl_name WHERE status=2 ORDER BY id desc ";

$result = mysql_query($sql);
 $title1="";
 $title1=array();
$count=0;
//echo  mysql_num_rows($result);

				if(!$flag) {
				   $title1[]="S.No.";
				   $title1[]="Date";				   
				   $title1[]="From";
				   $title1[]="To";
				   $title1[]="Advance";
				   $title1[]="All Transport";
				   $title1[]="DA";
				   $title1[]="Fooding";
				   $title1[]="Boarding/Loading";
				   $title1[]="Telephone";
				   $title1[]="Stationery";
				   $title1[]="Xerox";
				   $title1[]="Courier Charges";
				   $title1[]="Internet Charges";
				   $title1[]="Paper Work";
				   $title1[]="Leave";				   
				   $title1[]="Buulty charge";
				   $title1[]="Others";
				   $title1[]="Total";
				   $title1[]="Remarks";
				
			  echo implode("\t", $title1) . "\r\n";
			  $flag = true;
			}	
while($row = mysql_fetch_assoc($result))
		{		
					$rows_excel=array();
					$ag_id=$row['id'];
					$amount=0;
					$count=$count+1;
					$amount=$row['source'];
					$amount+=$row['destination'];
					$amount+=$row['advance'];
					$amount+=$row['total_amount'];
					$amount+=$row['transport_all_details'];
					$amount+=$row['da'];
					$amount+=$row['fooding'];
				    $amount+=$row['boarding'];
					$amount+=$row['tel'];
					$amount+=$row['stationary'];
					$amount+=$row['xerox'];
					$amount+=$row['courier'];
					$amount+=$row['internet'];
					$amount+=$row['paper'];
					$amount+=$row['buulty'];
                    $amount+=$row['others'];
					

				$rows_excel[]=$count;
				$rows_excel[]=substr($row['report_date'],0,10);
				$rows_excel[]=$row['source'];
				$rows_excel[]=$row['destination'];
				$rows_excel[]=$row['advance'];
				$rows_excel[]=$row['transport_all_details'];
				$rows_excel[]=$row['da'];
				$rows_excel[]=$row['fooding'];
				$rows_excel[]=$row['boarding'];
				$rows_excel[]=$row['tel'];
				$rows_excel[]=$row['stationary'];
				$rows_excel[]=$row['xerox'];
				$rows_excel[]=$row['courier'];
				$rows_excel[]=$row['internet'];
				$rows_excel[]=$row['paper'];
				$rows_excel[]=$row['leaves'];
				$rows_excel[]=$row['buulty'];
				$rows_excel[]=$row['others'];
				$rows_excel[]=$amount;
				$rows_excel[]=$row['remarks'];
			 
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
		
	
  exit;
  
 
}


?>