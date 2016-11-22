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
 $tbl_name="book_sample";	
// filename for download
 $filename = "report_daily_export_" . date('Ymd') . ".xls"; 
 $search1=mysql_real_escape_string($_REQUEST['search1_ept']);
   
   
 $from=mysql_real_escape_string($_REQUEST['from_date_ept']);
 $to=mysql_real_escape_string($_REQUEST['to_date_ept_ept']);
 $salesman_id=mysql_real_escape_string($_REQUEST['salesman_id_ept']);
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
	
 
		if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']))
	   $sql = "SELECT * FROM $tbl_name WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' ORDER BY id desc  ";
	else
	   $sql = "SELECT * FROM $tbl_name ORDER BY id desc";
	


  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
	
				  $title[]="S.No.";
				  $title[]="Visit Date";
				  $title[]="Executive Name";
				  $title[]="School";
				  $title[]="Visit Type";
				  $title[]="Teacher";

				  $title[]="Bookseller";
				  $title[]="Visit Type";
				  $title[]="Contact Person";

				  $title[]="Distributors";
				  $title[]="Visit Type";
				  $title[]="Contact Person";

				  $title[]="Publishers";
				  $title[]="Visit Type";
				  $title[]="Contact Person";
				  
				  $title[]="Chain";
				  $title[]="Visit Type";
				  $title[]="Member";				  

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
					$bookseller_contactp="";
					
					$distributor="";
					$distributor_visit="";
					$distributor_contactp="";
					
					$publisher="";
					$publisher_visit="";
					$publisher_contactp="";
					
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
					   
					    $query_contactp=mysql_query("select persion from corporate_sub where uid='$corporate_id'") or die(mysql_error());
					   $data_contactp=mysql_fetch_array($query_contactp);
					   
					    if($data12['category']=="BOOKSELLER")
					     {
					     $bookseller=$row['name'];
					     $bookseller_visit=$row['sampling_type'];
						 $bookseller_contactp=$data_contactp['persion'];
						 					
					     }
					    else if($data12['category']=="DISTRIBUTORS")
					     {
					     $distributor=$row['name'];
					     $distributor_visit=$row['sampling_type'];
						 $distributor_contactp=$data_contactp['persion'];
					     }
						 else if($data12['category']=="PUBLISHERS")
					     {
					     $publisher=$row['name'];
					     $publisher_visit=$row['sampling_type'];
						 $publisher_contactp=$data_contactp['persion'];
					     }
					  }		
					   $kpo=$row['id_of_name'];	   
 					   $query987=mysql_query("select * from chain_school_list where id=$kpo") or die(mysql_error());
					   $data987=mysql_fetch_array($query987);
					   	
				$rows_excel[]=$count; 
				$rows_excel[]=substr($row['sampling_Date'],0,10);
				$rows_excel[]=$row['salesman_name'];
				$rows_excel[]=$school;
				$rows_excel[]=$school_visit;
				$rows_excel[]=$teacher;
				$rows_excel[]=$bookseller;
				$rows_excel[]=$bookseller_visit;
				$rows_excel[]=$bookseller_contactp;

				$rows_excel[]=$distributor;
				$rows_excel[]=$distributor_visit;
				$rows_excel[]=$distributor_contactp;

				$rows_excel[]=$publisher;
				$rows_excel[]=$publisher_visit;
				$rows_excel[]=$publisher_contactp;
				
				$rows_excel[]=$data987['Chain'];
				$rows_excel[]=$data987['Visit_type'];
				$rows_excel[]=$data987['Member'];
				
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>