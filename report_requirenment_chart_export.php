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
$tbl_name="teacher_master_list";	
$filename = "report_requirenment_chart_export_" . date('Ymd') . ".xls"; // filename for download 
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
 
 $subject=mysql_real_escape_string($_REQUEST['subject_ept']);
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
	
 
	   $sql = "SELECT * FROM $tbl_name WHERE subject LIKE '%$subject%' ORDER BY id";	 

$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
				  $title[]="S.No.";
				  $title[]="Code";
				  $title[]="School Name";
				  $title[]="City";
				  $title[]="District";
				  $title[]="State";
				  $title[]="Number of Teachers()";
				
				 
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				
				$count=$count+1;
				$rows_excel=array();
				  $all_subject=$row['subject'];
				   $all_subject=unserialize($all_subject);
				   //for count teacher of particular subject  
				   $j=0;
				   for($k=0; $k<5; $k++)
					   {
					    
					    if($subject==$all_subject[$k] && $subject!="")
						   $j+=1;				   
					   }
					   
					//End
				    
				    $row_uid=$row['uid'];					
					$query1=mysql_query("SELECT * FROM master_list WHERE id='$row_uid'") or die(mysql_error());
					$data1=mysql_fetch_array($query1);	
	
			$rows_excel[]=$count;		
			$rows_excel[]=$data1['code'];
			$rows_excel[]=$data1['name'];
			$rows_excel[]=$data1['city'];
			$rows_excel[]=$data1['district'];
			$rows_excel[]=$data1['state'];
			$rows_excel[]=$j;
			
		
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>