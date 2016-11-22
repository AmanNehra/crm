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
$tbl_name="department_list";	
$filename = "report_department_export_" . date('Ymd') . ".xls"; // filename for download 
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
				  $title[]="Department Name";
				  $title[]="Name";
				  $title[]="Designation";
				  $title[]="Office Address";
				  $title[]="City";
				  $title[]="District";
				  $title[]="State";
				  $title[]="Pincode";
				  $title[]="Contact";
				  $title[]="Email";
				  $title[]="Subject";
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				
				$count=$count+1;
				$rows_excel=array();
				   $contact=""; 
				    if($row['phone1']!="") $contact=$row['phone1'];	
					if($row['mobile1']!="") $contact.=",".$row['mobile1'];
					if($row['mobile2']!="") $contact.=",".$row['mobile2'];
					$subject=$row['subject'];
					$subject=unserialize($subject);
				$rows_excel[]=$count;	
				$rows_excel[]=$row['department'];
				$rows_excel[]=$row['name'];
				$rows_excel[]=$row['designation'];
				$rows_excel[]=$row['address'];
				$rows_excel[]=$row['city'];
				$rows_excel[]=$row['district'];
				$rows_excel[]=$row['state'];
				$rows_excel[]=$row['pin'];
				$rows_excel[]=$contact;
				$rows_excel[]=$row['email'];
				if($row['department']=="AUTHOR" || $row['department']=="EDITOR")
				{ $text="";
					foreach($subject as $s)
					{ if($s!="")  $text.=$s.",";  }
					$rows_excel[]=$text;
				}
				
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>