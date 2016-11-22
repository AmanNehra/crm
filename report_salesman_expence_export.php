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
$tbl_name="item_master_list";			
// filename for download
 $filename = "report_salesman_expence_export_" . date('Ymd') . ".xls"; 
   header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

 $state=mysql_real_escape_string($_REQUEST['state_ept']);
 $district=mysql_real_escape_string($_REQUEST['district_ept']);
 $city=mysql_real_escape_string($_REQUEST['city_ept']);
 $series=mysql_real_escape_string($_REQUEST['series_ept']);
 $department=mysql_real_escape_string($_REQUEST['department_ept']);
 $salesman_id=mysql_real_escape_string($_REQUEST['salesman_id_ept']);
 $from_date=mysql_real_escape_string($_REQUEST['from_date_ept']);
 $to_date=mysql_real_escape_string($_REQUEST['to_date_ept']);
 
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
	if(isset($series)&&$series!="" )
	  $sql = "SELECT * FROM $tbl_name WHERE series='$series' ORDER BY book_alias";
	else
	   $sql = "SELECT * FROM $tbl_name ORDER BY book_alias";


$result = mysql_query($sql);
 $title1="";
 $title1=array();
$count=0;
//echo  mysql_num_rows($result);

				if(!$flag) {
					  $title1[]="S.No.";
				  $title1[]="Book Name";
				  $title1[]="Class";
				  $title1[]="Specimen Voucher Name @";
				  $title1[]="Sale @";
				
			  echo implode("\t", $title1) . "\r\n";
			  $flag = true;
			}	
while($row = mysql_fetch_assoc($result))
		{		
					$count=$count+1;
					$rows_excel=array();
					$ag_id=$row['id'];				  				  
					$salesman_qty=0;
					$teacher_copy_qty=0;
					
					$return_qty=0;
					
					$school_given_qty=0;
					$contact_given_qty=0;
					
					$company_stock=0;
					$amount=0;
					$price=0;
					
					//For issue Items
				  if($state!="" && $district!="" && $city!=""&& isset($from) && isset($to) && isset($salesman_id) ){		    
				      $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND city='$city' AND district='$district' AND state='$state'") or die(mysql_error());					
				 }				 	 
				 else if($state!="" && $district!="" && isset($from) && isset($to) && isset($salesman_id) )
				     $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND district='$district' AND state='$state'") or die(mysql_error());
				  else if($state!="" && isset($from) && isset($to) && isset($salesman_id) )
				      $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'AND state='$state'") or die(mysql_error());
			      else if(isset($from) && isset($to) && isset($salesman_id) )
				      $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());
				  else
				     $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2") or die(mysql_error());
					   
				  while($data1=mysql_fetch_array($query1)){
				     
				     $row_uid=$data1['id'];
					 
					 $corporate_name=$data1['corporate_name'];
					 $teachercopy=$data1['teachercopy'];
					 //echo "SELECT * FROM all_voucher WHERE uid='$row_uid' AND book_id='$ag_id' AND relate='1'";die;
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND book_id='$ag_id' AND relate='1'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 //for price of item from "all voucher" Table
					 if($data2['price']!="")
					    $price=$data2['price'];
				    //End
					 //print_r($data2); die;
					 if($teachercopy=="YES")
					   $teacher_copy_qty+=$data2['qty'];
					else
					   $salesman_qty+=$data2['qty'];
					   
				  }
				  //End Issue
				  
				  //For return Items
				   if($state!="" && $district!="" && $city!="" && isset($from) && isset($to) && isset($salesman_id) )				      
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND city='$city' AND district='$district' AND state='$state'") or die(mysql_error());
					
					else if($state!="" && $district!="" && isset($from) && isset($to) && isset($salesman_id) )
					 $query1=mysql_query("SELECT * FROM return_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND district='$district' AND state='$state'") or die(mysql_error());
					
					 
				  else if($state!="" && isset($from) && isset($to) && isset($salesman_id) )
				     
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND state='$state'") or die(mysql_error());
					 
					else if(isset($from) && isset($to) && isset($salesman_id) )		   	  
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());					
				  else
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE status=2") or die(mysql_error());
					   
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];				 
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND book_id='$ag_id' AND relate='2'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 
					   $return_qty+=$data2['return_qty'];		 
					   
				  }
				  //End Return  
				  
				  
				  //for company stock and amount
				 				  				  
					$speciman=$salesman_qty-$return_qty;					
					
					$amount=$speciman*$price;

				$rows_excel[]=$count;
				$rows_excel[]=$row['item_name'];
				$rows_excel[]=$row['class'];
				$rows_excel[]=$amount;
				$rows_excel[]="";
			 
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
		
	
  exit;
  
 
}


?>