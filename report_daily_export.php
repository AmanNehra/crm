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
				  $title[]="Visit Type";
				  $title[]="School";
				  
				  $title[]="Teacher";

				  $title[]="Bookseller";
				 

				  $title[]="Distributors";
				 

				  $title[]="Publishers";

				
				  $title[]="Contact Person";
				  
				  $title[]="Chain";
				  
				  $title[]="Member";	

				  $title[]="Department Member";			  

				  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				
				$count=$count+1;
				$rows_excel=array();

				    $school="";
					$school_visit="";

					$contact="";
					$contact_visit="";

					$department="";
					$department_visit="";

					$chain="";
					$chain_visit="";

					$member="";
					$member_visit="";

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
					
					if($row['relate']=="SCHOOL" )
					  {
					   $school=$row['name'];
					   $school_visit=$row['sampling_type'];
					  }	
					  else if($row['relate']=="CHAIN" ) 
					  {
					   $chain=$row['name'];
					   $chain_visit=$row['sampling_type'];
					  }	

					  else if($row['relate']=="MEMBER") 
					  {
					   $member=$row['name'];
					   $member_visit=$row['sampling_type'];
					  }	

					  else if($row['relate']=="CONTACT_PERSON")
					  {
					   $contact=$row['name'];
					   $contact_visit=$row['sampling_type'];
					  }	
					  else if($row['relate']=="DEPARTMENT")
					  {
					   $department=$row['name'];
					   $department_visit=$row['sampling_type'];
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
					   					   
 					   $query987=mysql_query("select persion from corporate_sub where uid='$corporate_id'") or die(mysql_error());
					   $data987=mysql_fetch_array($query987);
					   
					   
					   
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



					   $query123=mysql_query("select * from chain_school_sub where sid=$kpo") or die(mysql_error());
					   $data123=mysql_fetch_array($query123);
					   	
				$rows_excel[]=$count; 
				$rows_excel[]=substr($row['sampling_Date'],0,10);
				$rows_excel[]=$row['salesman_name'];
				$rows_excel[]=$school_visit.$teacher_visit.$bookseller_visit.$distributor_visit.$publisher_visit.$chain_visit.$member_visit.$contact_visit.$department_visit;
				$rows_excel[]=$school;
				$rows_excel[]=$teacher;
				$rows_excel[]=$bookseller;
				$rows_excel[]=$distributor;
				$rows_excel[]=$publisher;
				$rows_excel[]=$contact;
				$rows_excel[]=$chain;
				$rows_excel[]=$member;
				$rows_excel[]=$department;
				
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>