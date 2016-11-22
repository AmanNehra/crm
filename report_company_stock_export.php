<?php
session_start();
require_once('config.php');


if(isset($_POST)) 
{

function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

 $query="";
$tbl_name="item_master_list";			
// filename for download
$filename = "report_company_export_" . date('Ymd') . ".xls"; 
   header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  if(isset($_REQUEST['from_date_ept'])&&$_REQUEST['from_date_ept']!=""&&isset($_REQUEST['to_date_ept'])&&$_REQUEST['to_date_ept']!="")
  {
	  $from=$_REQUEST['from_date_ept'];
	  $to=$_REQUEST['to_date_ept'];
  }
   if(isset($_REQUEST['godwon_ept'])&&$_REQUEST['godwon_ept']!="")
   {
	     $godwon=$_REQUEST['godwon_ept'];
   }
   if(isset($_REQUEST['series_ept'])&&$_REQUEST['series_ept']!="")
   {
	    $series=$_REQUEST['series_ept'];
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
	
if(isset($series) )	
	  $sql = "SELECT * FROM $tbl_name WHERE series='$series' ORDER BY book_alias";
	else
	  $sql = "SELECT * FROM $tbl_name ORDER BY book_alias";


$result = mysql_query($sql);
 $title1="";
 $title2="";
 $title3=""; 
 $title1=array();
$count=0;
//echo  mysql_num_rows($result);

if(!$flag) 
{	
			      /*$title1[]="S.No.";
				  $title1[]="Book Name";
				  $title1[]="Class";
				  $title1[]="Price";
				  $title1[]="Salesmen";
				  $title1[]="School";
				  $title1[]="Contcat";
				  $title1[]="Teacher Copy";
				  $title1[]="Salesmen Return";
				  $title1[]="Stock Company";
				  $title1[]="Amount";*/
				  
				  echo $title1 = '
<table class="sticky-enabled" border="1">
 <thead>
		<tr>
    		<td rowspan="2">S. No.</td>
    		<td rowspan="2">Book Name</td>
    		<td rowspan="2">Class</td>
    		<td rowspan="2">Price</td>
    		<td colspan="4"><div align="center">Issue</div></td>
    		<td rowspan="2">Salesmen Return</td>
    		<td rowspan="2">Stock Company</td>
    		<td rowspan="2">Amount</td>
  		</tr>
		 <tr>
    		<td>Salesman</td>
    		<td>School</td>
    		<td>Contcat</td>
    		<td>Teacher Copy</td>
  		</tr>
 </thead>'; 

				 				
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
					$contact_qty=0;				  
					$school_qty=0;
					$return_qty=0;
					$company_stock=0;
					$amount=0;
					$price=0;
					
					//For issue Items
				  if(isset($godwon) && isset($from) && isset($to) ){
				    if($godwon=="all")
					  $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to'") or die(mysql_error());
					else
				     $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND godwon='$godwon' AND date BETWEEN '$from' AND '$to'") or die(mysql_error());
					 }
				  else
				     $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2") or die(mysql_error());
					   
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];
					 
					 $corporate_name=$data1['corporate_name'];
					 $teachercopy=$data1['teachercopy'];
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND book_id='$ag_id' AND relate='1'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 //for price of item from "all voucher" Table
					 if($data2['price']!="")
					    $price=$data2['price'];
				    //End
					 if($teachercopy=="YES")
					   $teacher_copy_qty+=$data2['qty'];
					 
					 else if($corporate_name=="SCHOOL")
					    $school_qty+=$data2['qty'];
						
					else if($corporate_name=="CORPORATE" || $corporate_name=="CHAIN OF SCHOOL" )
					    $contact_qty+=$data2['qty'];
					else
					   $salesman_qty+=$data2['qty'];
					   
				  }
				  //End Issue
				  
				  //For return Items
				  if(isset($godwon) && isset($from) && isset($to) ){
				     if($godwon=="all")
					    $query1=mysql_query("SELECT * FROM return_voucher WHERE date BETWEEN '$from' AND '$to'") or die(mysql_error()); 
					 else
				       $query1=mysql_query("SELECT * FROM return_voucher WHERE godwon='$godwon' AND date BETWEEN '$from' AND '$to'") or die(mysql_error());
					 }
				  else
				     $query1=mysql_query("SELECT * FROM return_voucher") or die(mysql_error());
					   
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];				 
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND book_id='$ag_id' AND relate='2'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 
					   $return_qty+=$data2['return_qty'];		 
					   
				  }
				  //End Return
				  //for company stock and amount
				 				  				  
					$company_stock=($salesman_qty+$teacher_copy_qty+$contact_qty+$school_qty)-$return_qty;
					
					
					$amount=$company_stock*$row['price'];
					
					$asd=$row['item_name'];
					$asd1=$row['class'];
					
					
					echo $rows_excel = '

 <tr class="odd">
    		<td>'.$count.'</td>
    		<td>'.$asd.'</td>
    		<td>'.$asd1.'</td>
    		<td>'.$price.'</td>
	   		<td>'.$salesman_qty.'</td>
    		<td>'.$school_qty.'</td>
    		<td>'.$contact_qty.'</td>
    		<td>'.$teacher_copy_qty.'</td>
    		<td>'.$return_qty.'</td>
    		<td>'.$company_stock.'</td>
    		<td>'.$amount.'</td>
  		</tr>
';
				  
				/*$rows_excel[]=$count;
				$rows_excel[]=$row['item_name'];
				$rows_excel[]=$row['class'];
				$rows_excel[]=$price;
				$rows_excel[]=$salesman_qty;
				$rows_excel[]=$school_qty;
				$rows_excel[]=$contact_qty;
				$rows_excel[]=$teacher_copy_qty;
				$rows_excel[]=$return_qty;
				$rows_excel[]=$company_stock;
				$rows_excel[]=$amount;*/
				
					
			/*array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";*/
			
			echo implode("\t", $rows_excel) . "\r\n"; 
			$flag = true;
		}
		
	
  exit;
  
 
}


?>