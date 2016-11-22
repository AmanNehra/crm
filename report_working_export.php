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
	   $sql = "SELECT DISTINCT id_of_name,relate FROM $tbl_name WHERE date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND relate IN('CHAIN','SCHOOL','TEACHER','CORPORATE') ORDER BY relate desc  ";
	else
	   $sql = "SELECT DISTINCT id_of_name,relate FROM $tbl_name WHERE relate IN('CHAIN','SCHOOL','TEACHER','CORPORATE') ORDER BY relate desc "; 
	  
  
$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
		
				   $title[]="S.No.";
				   $title[]="Visit";
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
				$rows_excel=array();
				$count=$count+1;
			
			        $id_of_name=$row['id_of_name'];
					$relate= $row['relate']; 
					
					$visit=0;
				    $school="";
					$school_visit=0;

					$contact="";
					$contact_visit="";

					$department="";
					$department_visit="";

					$chain="";
					$chain_visit="";

					$member="";
					$member_visit="";
					
					
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

					if($data13['relate']=="SCHOOL" )
					  {					   
					   $school=$data13['name'];						   
					   $school_visit=$visit;					   
					  }
					   else if($data13['relate']=="CHAIN" ) 
					  {
					   $chain=$data13['name'];
					   $chain_visit=$visit;
					  }	

					   else if($data13['relate']=="MEMBER") 
					  {
					   $member=$data13['name'];
					   $member_visit=$visit;
					  }	

					  else if($data13['relate']=="CONTACT_PERSON")
					  {
					   $contact=$data13['name'];
					   $contact_visit=$visit;
					  }	
					  else if($data13['relate']=="DEPARTMENT")
					  {
					   $department=$data13['name'];
					   $department_visit=$visit;
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
			
			if($school_visit!=0) { 
				$rows_excel[]=  $school_visit;
			}
			else if($contact_visit!=0) { 
				$rows_excel[]=  $contact_visit;
			}
			else if($department_visit!=0) { 
				$rows_excel[]=  $department_visit;
			}
			else if($chain_visit!=0) { 
				$rows_excel[]=  $chain_visit;
			}
			else if($teacher_visit!=0) { 
				$rows_excel[]=  $teacher_visit;
			}
			else if($bookseller_visit!=0) { 
				$rows_excel[]=  $bookseller_visit;
			}
			else if($distributor_visit!=0) { 
				$rows_excel[]=  $distributor_visit;
			}
			else if($publisher_visit!=0) { 
				$rows_excel[]=  $publisher_visit;
			}
			else if($member_visit!=0) { 
				$rows_excel[]=  $member_visit;
			}
			else{ 
				$rows_excel[]= "";
			}
			$rows_excel[]= $school;
			$rows_excel[]= $teacher;

			$rows_excel[]= $bookseller;

			$rows_excel[]= $distributor;
			
			$rows_excel[]= $publisher;
			
			$rows_excel[]= $contact;

			
				$rows_excel[]=$chain;
				$rows_excel[]=$member;
				$rows_excel[]=$department;
			
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>