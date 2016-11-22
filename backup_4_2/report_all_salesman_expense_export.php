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
$tbl_name="department_list";			
// filename for download
$filename = "report_all_salesman_export_" . date('Ymd') . ".xls"; 
   header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  if(isset($_REQUEST['from_date_ept'])&&$_REQUEST['from_date_ept']!=""&&isset($_REQUEST['to_date_ept'])&&$_REQUEST['to_date_ept']!="")
  {
	  $from=$_REQUEST['from_date_ept'];
	  $to=$_REQUEST['to_date_ept'];
  }
   
 
if(!isset($page) || $page==""){
    $page = "1";
}else{
    $page = $page;
}	

if($page) 
$start = ($page - 1) * $limit;
else
$start = 0;		
	
   $sql = "SELECT * FROM $tbl_name WHERE department='SALES' ORDER BY id desc ";

$result = mysql_query($sql);
 $title1="";
 $title1=array();
$count=0;
//echo  mysql_num_rows($result);

				if(!$flag) {
				  $title1[]="S. No.";
				  $title1[]="Salesman ";
				  $title1[]="Salary @";
				  $title1[]="Tour Expense @";
				  $title1[]="Gift @";
				  $title1[]="Workshop @";
				  $title1[]="Specimen Voucher Name @";
				  $title1[]="Sale @";
				
			  echo implode("\t", $title1) . "\r\n";
			  $flag = true;
			}	
while($row = mysql_fetch_assoc($result))
		{		
					$count=$count+1;
					$rows_excel=array();
					$salesman_id=$row['id']; 
					$salesman_name=$row['name'];				  				  
					$salesman_qty=0;
					$teacher_copy_qty=0;
					$return_qty=0;
					$school_given_qty=0;
					$contact_given_qty=0;
					$company_stock=0;
					$amount=0;
					$price=0;
					$advance=0;
					$gift=0;
					$estimated_cost=0;
					$estimated_rent=0;
					$issue_amount=0;
					$return_amount=0;
					$expense=0;	
					//For tour advance
					if(isset($from) && isset($to) )					
					  $query1="SELECT * FROM expense WHERE executive_id='$salesman_id' AND status='2' AND date BETWEEN '$from' AND '$to'";else					
					  $query1="SELECT * FROM expense WHERE executive_id='$salesman_id' AND status='2'";				
					
					$query1=mysql_query($query1) or die(mysql_error());
					while($data1=mysql_fetch_array($query1)){	
							
					$expense+=$data1['advance'];
					$expense+=$data1['total_amount'];
					$expense+=$data1['transport_all_details'];
					$expense+=$data1['da'];
					$expense+=$data1['fooding'];
				    $expense+=$data1['boarding'];
					$expense+=$data1['tel'];
					$expense+=$data1['stationary'];
					$expense+=$data1['xerox'];
					$expense+=$data1['courier'];
					$expense+=$data1['internet'];
					$expense+=$data1['paper'];
					$expense+=$data1['buulty'];
                    $expense+=$data1['others'];								
					}				
					//End
					
					//For gift
					if(isset($from) && isset($to) )
					{
					   $query1=mysql_query("SELECT total_discount FROM commitment_voucher WHERE commited_by='$salesman_name' AND status='2' AND date BETWEEN '$from' AND '$to'");
					}
					else
					{
						$query1=mysql_query("SELECT total_discount FROM commitment_voucher WHERE commited_by='$salesman_name' AND status='2'");
					}
					while($data1=mysql_fetch_array($query1)){
						$gift+=$data1['total_discount'];					
					}	
					//End
					//For workshop
					if(isset($from) && isset($to) )
					  {
					  $query1=mysql_query("SELECT estimated_cost,estimated_rent FROM workshop JOIN workshopRent WHERE workshop.executive_id='$salesman_id' AND workshop.status='2' AND workshop.id=workshopRent.uid AND  workshop.date BETWEEN '$from' AND '$to' ");
					  }
					else	
					{				
					$query1=mysql_query("SELECT estimated_cost,estimated_rent FROM workshop JOIN workshopRent WHERE workshop.executive_id='$salesman_id' AND workshop.status='2' AND workshop.id=workshopRent.uid ");
					}
					while($data1=mysql_fetch_array($query1)){
						$estimated_cost+=$data1['estimated_cost'];
						$estimated_rent+=$data1['estimated_rent'];										
					}	
					//End
					//For issue Items
					if(isset($from) && isset($to) )	
					 {
					$query1=mysql_query("SELECT * FROM issue_voucher WHERE salseman_id='$salesman_id' AND status='2' AND date BETWEEN '$from' AND '$to'") or die(mysql_error());	
					 }
					else	
					 {					 	 
				    $query1=mysql_query("SELECT * FROM issue_voucher WHERE salseman_id='$salesman_id' AND status='2'") or die(mysql_error());	
					 }			 
				  while($data1=mysql_fetch_array($query1)){
				     $row_uid=$data1['id'];
					 $corporate_name=$data1['corporate_name'];
					 $teachercopy=$data1['teachercopy'];
					
					 //for price of item from "all voucher" Table
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND salseman_id='$salesman_id' AND relate='1'") or die(mysql_error());
					while($data2=mysql_fetch_array($query2)){
					 
					 if($data2['price']!="")
					    $price=$data2['price'];
				    //End					 
					 if($teachercopy=="YES")
					   $teacher_copy_qty=$data2['qty'];
					else
					   $salesman_qty=$data2['qty'];
					
					 $issue_amount+= ($salesman_qty*$price);  
					}					   
				  }
				  //End Issue
				  
				  //For return Items
				   if(isset($from) && isset($to) )
				    {
				   $query1=mysql_query("SELECT * FROM return_voucher WHERE salseman_id='$salesman_id' AND status='2' AND date BETWEEN '$from' AND '$to'") or die(mysql_error()); 
				    }
				   else
				    {
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE salseman_id='$salesman_id' AND status='2'") or die(mysql_error()); 
					 }
					   
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];				 
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND salseman_id='$salesman_id' AND relate='2'") or die(mysql_error());
					 while($data2=mysql_fetch_array($query2)){
					   
					    if($data2['price']!="")
					    $return_price=$data2['price'];
						
					   $return_qty=$data2['return_qty'];
					   
					   $return_amount+=($return_price*$return_qty);		 
					 }  
				  }
					$amount=$issue_amount-$return_amount;

				$rows_excel[]=$count;
				$rows_excel[]=$row['name'];
				$rows_excel[]="BG";
				$rows_excel[]=$expense;
				$rows_excel[]=$gift;
				$rows_excel[]=$estimated_cost+$estimated_rent;
				$rows_excel[]=$amount;
				$rows_excel[]="BG";
			 
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
		
	
  exit;
  
 
}


?>