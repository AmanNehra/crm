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
$filename = "report_working_export_" . date('Ymd') . ".xls"; // filename for download 
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
	 
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
	
/* Get data. */
	if(isset($from) && isset($to) && isset($salesman_id))
	   $sql = "SELECT DISTINCT id_of_name,relate FROM $tbl_name WHERE date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND relate IN('CHAIN','SCHOOL','TEACHER','CORPORATE') ORDER BY relate desc LIMIT $start, $limit ";
	else
	   $sql = "SELECT DISTINCT id_of_name,relate FROM $tbl_name WHERE relate IN('CHAIN','SCHOOL','TEACHER','CORPORATE') ORDER BY relate desc LIMIT $start, $limit"; 
	  
  
$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
		
				   $title[]="S.No.";
				   $title[]="School";
				  $title[]="Visit";
				  $title[]="Teacher";
				  $title[]="Bookseller";
				  $title[]="Visit";
				  $title[]="Contact Person";

				  $title[]="Distributors";
				  $title[]="Visit";
				  $title[]="Contact Person";

				  $title[]="Publishers";
				  $title[]="Visit";
				  $title[]="Contact Person";
				  
				  				  $title[]="Chain";
				  $title[]="Visit Type";
				  $title[]="Member";
				  
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				$rows_excel=array();
				$count=$count+1;
			$id_of_name=$row['id_of_name'];
					$relate= $row['relate']; 
					$visit=0;
				    $school="";
					$school_visit=0;
					
					$teacher="";
					$teacher_visit=0;
					
					$bookseller="";
					$bookseller_visit=0;
					$bookseller_contactp="";
					
					$distributor="";
					$distributor_visit=0;
					$distributor_contactp="";
					
					$publisher="";
					$publisher_visit=0;
					$publisher_contactp="";
					
					if(isset($from) && isset($to) && isset($salesman_id))
					  $query13=mysql_query("SELECT * FROM $tbl_name WHERE id_of_name='$id_of_name' AND relate='$relate' AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());
					else
					  $query13=mysql_query("SELECT * FROM $tbl_name WHERE id_of_name='$id_of_name' AND relate='$relate'") or die(mysql_error()); 
					$visit=mysql_num_rows($query13);//for count row
					  
					while($data13=mysql_fetch_array($query13))
					{					  			
					if($data13['relate']=="SCHOOL" || $data13['relate']=="CHAIN")
					  {					   
					   $school=$data13['name'];						   
					   $school_visit=$visit;					   
					  }
					else if($data13['relate']=="TEACHER")
					  {
					  $teacher=$data13['name'];					  
					  $teacher_visit=$visit;
					  }					 
					  else if($data13['relate']=="CORPORATE")
					  {
					   $corporate_id=$data13['id_of_name'];
					   
					   $query12=mysql_query("SELECT category FROM corporate_list WHERE id='$corporate_id'") or die(mysql_error());
					   $data12=mysql_fetch_array($query12);
					   
					    $query_contactp=mysql_query("select persion from corporate_sub where uid='$corporate_id'") or die(mysql_error());
					   $data_contactp=mysql_fetch_array($query_contactp);
					   
					   if($data12['category']=="BOOKSELLER")
					     {
					     $bookseller=$data13['name'];
						 $bookseller_visit=$visit;
						  $bookseller_contactp=$data_contactp['persion'];
					     }
					    else if($data12['category']=="DISTRIBUTORS")
					     {
					     $distributor=$data13['name'];
						 $distributor_visit=$visit;
						 $distributor_contactp=$data_contactp['persion'];
					     }
						 else if($data12['category']=="PUBLISHERS")
					     {
					     $publisher=$data13['name'];
						 $publisher_visit=$visit;
						 $publisher_contactp=$data_contactp['persion'];
					     }
					  }						
					}
					   $kpo=$row['id_of_name'];	   
 					   $query987=mysql_query("select * from chain_school_list where id=$kpo") or die(mysql_error());
					   $data987=mysql_fetch_array($query987);
				
			$rows_excel[]= $count;
			$rows_excel[]= $school;
			if($school_visit!=0) { $rows_excel[]=  $school_visit;}else{ $rows_excel[]= "";}
			$rows_excel[]= $teacher;

			$rows_excel[]= $bookseller;
			if($bookseller_visit!=0) { $rows_excel[]=  $bookseller_visit;}else{ $rows_excel[]= "";}
			$rows_excel[]=$bookseller_contactp;
			
			$rows_excel[]= $distributor;
			if($distributor_visit!=0) { $rows_excel[]=  $distributor_visit;}else{ $rows_excel[]= "";}
			$rows_excel[]=$distributor_contactp;
			
			$rows_excel[]= $publisher;
			if($publisher_visit!=0) { $rows_excel[]=  $publisher_visit;}else{ $rows_excel[]= "";}
			$rows_excel[]= $row['code'];
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