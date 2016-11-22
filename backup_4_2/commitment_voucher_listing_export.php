<?php
require_once('config.php');
//include('function.php');
if(isset($_POST)) {

function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

 $query="";
$tbl_name="commitment_voucher";			
// filename for download
$filename = "commitment_voucher_export_" . date('Ymd') . ".xls"; 
   header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

 $show_list=$_REQUEST['show_list_ept'];
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
	
 
	if($show_list!=""){
	  if($show_list=="all")
	   $sql ="SELECT * FROM $tbl_name ORDER BY c_no desc";
	  else if($show_list=="approved")
	   $sql = "SELECT * FROM $tbl_name WHERE (status='1' Or status='2') ORDER BY c_no desc";	  
	  else if($show_list=="not approved")
	    $sql = "SELECT * FROM $tbl_name WHERE (status NOT IN('1','2')) ORDER BY c_no desc";
	}else if($searchby1!="" && $search1!="" &&  $searchby2!="" && $search2!="")
	$sql = "SELECT * FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') AND ($searchby2 LIKE '%$search2%') ORDER BY c_no desc ";
	else if($searchby1!="" && $search1!="")
	$sql = "SELECT * FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') ORDER BY c_no desc ";
	else
	$sql = "SELECT * FROM $tbl_name ORDER BY c_no desc ";
	

$result = mysql_query($sql);
 $title1="";
 $title1=array();
$count=0;
//echo  mysql_num_rows($result);
if(!$flag) {
				  $title1[]="S.No.";
				  $title1[]="Commitment Number";
				  $title1[]="Date";
				  $title1[]="Commitment By ";
				  $title1[]="Year";
				  $title1[]="Pay Mode";
				  $title1[]="School";
				  $title1[]="To Be Given ";
				  $title1[]="Designation";
				  $title1[]="Corporate";
				  $title1[]="C.Person";
				  $title1[]="Gift Paid";
				  $title1[]="Gift %";
				  $title1[]="Total Amount";
				  $title1[]="Remarks";
				  $title1[]="Download File";
				  $title1[]="Status";
				  $title1[]="Approved By";
				 
			  echo implode("\t", $title1) . "\r\n";
			  $flag = true;
			}	
while($row = mysql_fetch_assoc($result))
		{		
				$count=$count+1;	
				$rows_excel=array();
				$ag_id=$row['id'];
				$query=mysql_query("SELECT name FROM department_list where (`id`='".$row['salseman_id']."') ");
				$value=mysql_fetch_array($query);
				$salesman_name=$value['name'];
				$salesman_name=$salesman_name;
				
				$rows_excel[]=$count;
				$rows_excel[]=$row['c_no'];
				$rows_excel[]=$row['c_date'];
				$rows_excel[]=$row['commited_by'];
				$rows_excel[]=$row['c_year'];
				$rows_excel[]=$row['pay_mode'];
				$rows_excel[]=$row['school'];
				$rows_excel[]=$row['given'];;
				$rows_excel[]=$row['designation_teacher'];;
				$rows_excel[]=$row['corporate'];
				$rows_excel[]=$row['c_persion'];
				$rows_excel[]=$row['gift_pad'];
				$rows_excel[]=$row['gift_percent'];
				$rows_excel[]=$row['total_discount'];
				$rows_excel[]=$row['remarks'];
				$rows_excel[]=$_SERVER['HTTP_HOST']."/crm/upload/".$row['attachment'];
				
				if( ($row['status']==1) || ($row['status']==2) ) {$rows_excel[]="Approved";} else {$rows_excel[]="Not Approved";  }
				$rows_excel[]=$row['approved_by'];
					
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
		
	
  exit;
  
 
}


?>