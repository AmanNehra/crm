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
$tbl_name="item_master_list";	
$filename = "report_salesman_summary_export_" . date('Ymd') . ".xls"; // filename for download 
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
 	
	
 $godwon=mysql_real_escape_string($_REQUEST['godwon_ept']);
 $series=mysql_real_escape_string($_REQUEST['series_ept']);
 $department=mysql_real_escape_string($_REQUEST['department_ept']);
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
	
  if(isset($series) && $series!="" )
	  $sql = "SELECT * FROM $tbl_name WHERE series='$series' ORDER BY book_alias";
	else
	   $sql = "SELECT * FROM $tbl_name ORDER BY book_alias";

$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
	
				  /*$title[]="S.No.";
				  $title[]="Book Name";
				  $title[]="Class";
				  $title[]="Price";
				  $title[]="Salesman Stock";
				  $title[]="School [Given]";
				  $title[]="Contact [Given]";
				  $title[]="School [Direct Issue]";
				  $title[]="Contcat [Direct Issue]";
				  $title[]="Teacher Copy [Direct Issue]";
				  $title[]="Return [Direct Issue]";
				  $title[]="Balance";
				  $title[]="Amount";*/
				  
				  echo $title = '
<table class="sticky-enabled" border="1">
 <thead>
				<tr>
   		  <td rowspan="2">S. No.</td>
      		<td rowspan="2">Book Name</td>
    		<td rowspan="2">Class</td>
    		<td rowspan="2">Price</td>
    		<td rowspan="2">Salesman Stock</td>            
   		  <td colspan="2"><div align="center">Given</div></td>
   		  <td colspan="4"><div align="center">Direct Issue</div></td>
  		<td rowspan="2">Balance</td>
    		<td rowspan="2">Amount</td>        
	    </tr>	


		<tr>
    		<td width="41">School</td>
    		<td width="75">Contact</td>
    		<td width="101">School</td>
    		<td width="99">Contact</td>
    		<td width="48">Teacher Copy</td>
      		<td width="31">Return</td>
  		</tr>
 </thead>'; 
				    
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				
				
				$rows_excel=array();
				$count=$count+1;
				$ag_id=$row['id'];				  				  
					$salesman_qty=0;
					$teacher_copy_qty=0;
					$contact_qty=0;				  
					$school_qty=0;
					$return_qty=0;
					
					$school_given_qty=0;
					$contact_given_qty=0;
					
					$company_stock=0;
					$amount=0;
					$price=0;
					
					//For issue Items
				  if(isset($godwon) && isset($from) && isset($to) && isset($salesman_id) ){
				    if($godwon=="all")
				      $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());
					else
					  $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND godwon='$godwon' AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());
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
				  if(isset($godwon) && isset($from) && isset($to) && isset($salesman_id) ){	
				   if($godwon=="all")	  
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());
				   else
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE godwon='$godwon' AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());
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
				  
				  //For sampling record
				  if(isset($godwon) && isset($from) && isset($to) && isset($salesman_id))
				     $query1=mysql_query("SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());
				  else
				     $query1=mysql_query("SELECT * FROM book_sample") or die(mysql_error());
					   
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];				 
					 
					 $relate=$data1['relate'];
					 
				     $query2=mysql_query("SELECT * FROM book_sample_details WHERE uid='$row_uid' AND book_id='$ag_id'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 	
					if($relate=="SCHOOL" || $relate=="TEACHER" )
					    $school_given_qty+=$data2['qty'];
					else
					   $contact_given_qty+=$data2['qty'];		 
					   
				  }
				  
					$company_stock=$salesman_qty-($school_given_qty+$contact_given_qty+$return_qty);
					$amount=$company_stock*$row['price'];
					
					$asd=$row['item_name'];
					$asd1=$row['class'];

				  
		/*	$rows_excel[]=$count;
			$rows_excel[]=$row['item_name'];
			$rows_excel[]=$row['class'];
			$rows_excel[]=$price;
			$rows_excel[]=$salesman_qty;
			$rows_excel[]=$school_given_qty;
			$rows_excel[]=$contact_given_qty;
			$rows_excel[]=$school_qty;
			$rows_excel[]=$contact_qty;
			$rows_excel[]=$teacher_copy_qty;
			$rows_excel[]=$return_qty;
			$rows_excel[]=$company_stock;
			$rows_excel[]=$amount;*/
			
			echo $rows_excel = '

 			<tr class="odd">
    		<td>'.$count.'</td>
    		<td>'.$asd.'</td>
    		<td>'.$asd1.'</td>
    		<td>'.$price.'</td>
	   		<td>'.$salesman_qty.'</td>
    		<td>'.$school_given_qty.'</td>
    		<td>'.$contact_given_qty.'</td>
    		<td>'.$school_qty.'</td>
    		<td>'.$contact_qty.'</td>			
    		<td>'.$teacher_copy_qty.'</td>
    		<td>'.$return_qty.'</td>
    		<td>'.$company_stock.'</td>
    		<td>'.$amount.'</td>			
  			</tr>
';
			
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>