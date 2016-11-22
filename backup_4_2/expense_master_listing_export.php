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
$tbl_name="expense";			
// filename for download
$filename = "expense_master_export_" . date('Ymd') . ".xls"; 
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
	   $sql ="SELECT * FROM $tbl_name ORDER BY id desc";
	  else if($show_list=="approved")
	   $sql = "SELECT * FROM $tbl_name WHERE (status='1' Or status='2') ORDER BY id desc";	  
	  else if($show_list=="not approved")
	    $sql = "SELECT * FROM $tbl_name WHERE (status NOT IN('1','2')) ORDER BY id desc";
	}else if($searchby1!="" && $search1!="" &&  $searchby2!="" && $search2!="")
	$sql = "SELECT * FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') AND ($searchby2 LIKE '%$search2%') ORDER BY id desc ";
	else if($searchby1!="" && $search1!="")
	$sql = "SELECT * FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') ORDER BY id desc ";
	else
	$sql = "SELECT * FROM $tbl_name ORDER BY id desc ";
	

$result = mysql_query($sql);
 $title1="";
 $title1=array();
$count=0;
//echo  mysql_num_rows($result);
	if(!$flag) {
				  $title1[]="S.No.";
				  $title1[]="Report Number";
				  $title1[]="Date";
				  $title1[]="Branch Office ";
				  $title1[]="Executive Name";
				  $title1[]="Designation";
				  $title1[]="Tour Advance";
				  $title1[]="Grand Total";
				  $title1[]="Advance Remaining";
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
				
				  $grand_total=0;
				  //For Grand total of amount
				  
				 	$grand_total+=$row['total_amount'];
					$grand_total+=$row['da'];
					$grand_total+=$row['boarding'];
					$grand_total+=$row['fooding'];
					$grand_total+=$row['tel'];
					$grand_total+=$row['stationary'];
					$grand_total+=$row['xerox'];
					$grand_total+=$row['courier'];
					$grand_total+=$row['internet'];
					$grand_total+=$row['others'];
					$grand_total+=$row['buulty'];	

					$rg=$row['advance']-$grand_total;

				$rows_excel[]=$count;
				$rows_excel[]=$row['report_no'];
				$rows_excel[]=substr($row['date'],0,10);;
				$rows_excel[]=$row['branch'];
				$rows_excel[]=$row['executive_name'];
				$rows_excel[]=$row['designation'];
				$rows_excel[]=$row['advance'];
				$rows_excel[]=$grand_total;
				$rows_excel[]=$rg;
				if( ($row['status']==1) || ($row['status']==2) ) {$rows_excel[]="Approved";} else {$rows_excel[]="Not Approved";  }
				$rows_excel[]=$row['approved_by'];
				
					
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
		
	
  exit;
  
 
}


?>