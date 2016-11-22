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
$tbl_name="master_list";	
$filename = "report_strength_export_" . date('Ymd') . ".xls"; // filename for download 
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
 	
 $state=mysql_real_escape_string($_REQUEST['state_ept']);
 $district=mysql_real_escape_string($_REQUEST['district_ept']);
 $city=mysql_real_escape_string($_REQUEST['city_ept']);

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
	
if($state!="" && $district!="" && $city!="")
	   $sql = "SELECT * FROM $tbl_name WHERE state='$state' AND district='$district' AND city='$city'";
	else if($state!="" && $district!="")
	   $sql = "SELECT * FROM  $tbl_name WHERE state='$state' AND district='$district' ";
	 else
	  $sql = "SELECT * FROM $tbl_name ";  
  
$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
	
	//for year
$next=date('Y')+1;	
$cur=date('Y');
$prev=$cur-1;
$prev1=$cur-2;
$prev2=$cur-3; 
				  /*$title[]="S.No.";
				  $title[]="Code";
				  $title[]="School Name";
				  $title[]="City";
				  $title[]="District";
				  $title[]="State";				  
 				  $title[]="Year-".$next;
				  $title[]="Year-".$cur;
				  $title[]="Year-".$prev;
				  $title[]="Year-".$prev1;
				  $title[]="Year-".$prev2;*/
				  
				  
				   echo $title = '
<table class="sticky-enabled" border="1">
 <thead>				   
 <tr>
    <td rowspan="2">S. No.</td>
    <td rowspan="2">Code</td>
    <td rowspan="2">School Name</td>
    <td rowspan="2">City</td>
    <td rowspan="2">District</td>
    <td rowspan="2">State</td>
    <td colspan="5"><div align="center">Year</div></td>
  </tr>
  <tr>
    <td>'.$next.'</td>
    <td>'.$cur.'</td>
    <td>'.$prev.'</td>
    <td>'.$prev1.'</td>
	<td>'.$prev2.'</td>
  </tr>
   </thead>
  '
  ; 
				  
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				
				
				$rows_excel=array();
				
				$uid=$row['id'];
					$count=$count+1;
					$cur_totalstrength=0;
					$pre_totalstrength1=0;
					$pre_totalstrength2=0;
					$pre_totalstrength3=0;
			
 //For current year strength				
					 $query11=mysql_query("select strength from strength where (uid='$uid') AND date BETWEEN '$cur-1-1' AND '$cur-12-31' ") or die(mysql_error());
					 
					 while($data11=mysql_fetch_array($query11))
					   {// print_r($data11); die();
						$cur_totalstrength+=$data11['strength'];						
					   }
					  //End current year
					  
					  //For prev year
					  $query11=mysql_query("select strength from strength where (uid='$uid') AND date BETWEEN '$prev-1-1' AND '$prev-12-31' ") or die(mysql_error());
					 
					 while($data11=mysql_fetch_array($query11))
					   {// print_r($data11); die();
						$pre_totalstrength1+=$data11['strength'];						
					   }
					  //End
					  
					  //For prev year
					  $query11=mysql_query("select strength from strength where (uid='$uid') AND date BETWEEN '$prev1-1-1' AND '$prev1-12-31' ") or die(mysql_error());
					 
					 while($data11=mysql_fetch_array($query11))
					   {// print_r($data11); die();
						$pre_totalstrength2+=$data11['strength'];						
					   }
					  //End
					  
					  //For prev year
					  $query11=mysql_query("select strength from strength where (uid='$uid') AND date BETWEEN '$prev2-1-1' AND '$prev2-12-31' ") or die(mysql_error());
					 
					 while($data11=mysql_fetch_array($query11))
					   {// print_r($data11); die();
						$pre_totalstrength3+=$data11['strength'];						
					   }
					   
				    $asd=$row['code'];
					$asd1=$row['name'];
					$asd2=$row['city'];
					$asd3=$row['district'];
					$asd4=$row['state'];
				
			/*$rows_excel[]=$count;
			$rows_excel[]=$row['code'];
			$rows_excel[]=$row['name'];
			$rows_excel[]=$row['city'];
			$rows_excel[]=$row['district'];
			$rows_excel[]=$row['state'];			
			$rows_excel[]=0;
			$rows_excel[]=$cur_totalstrength;			
			$rows_excel[]=$pre_totalstrength1;
			$rows_excel[]=$pre_totalstrength2;
			$rows_excel[]=$pre_totalstrength3;									
			*/
			
			echo $rows_excel = '

 <tr class="odd">
    		<td>'.$count.'</td>
    		<td>'.$asd.'</td>
    		<td>'.$asd1.'</td>
    		<td>'.$asd2.'</td>
	   		<td>'.$asd3.'</td>
    		<td>'.$asd4.'</td>
    		<td>0</td>
    		<td>'.$cur_totalstrength.'</td>
    		<td>'.$pre_totalstrength1.'</td>
    		<td>'.$pre_totalstrength2.'</td>
    		<td>'.$pre_totalstrength3.'</td>
  		</tr>
';

			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";
		}
  exit;
  
 
}


?>