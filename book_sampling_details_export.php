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
// filename for download
 $filename = "book_sample_export_" . date('Ymd') . ".xls"; 
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
	


  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

$result = mysql_query($sql);
 $title=array();
$count=0;

if(!$flag) {
				  $title[]="S. No.";
				  $title[]="Relate";
				  $title[]="Name";
				  $title[]="Address";
				  $title[]="City";
				  $title[]="District";
				  $title[]="Salesman Name";
				  $title[]="Item/Class/Qty";
				  $title[]="Given";
				  $title[]="Visit";
				  $title[]="Remarks";
				  $title[]="Approve";				  
			  echo implode("\t", $title) . "\r\n";
			  $flag = true;
			}
while($row = mysql_fetch_assoc($result))
		{
				
				
				$rows_excel=array();
				$ag_id=$row['id'];
				$cut=0; 
				$book_id=""; 
				$given="";
				$given1="";
				$relate="";
				$item="";
				$name="";
				$query12=mysql_query("SELECT DISTINCT(teacher_id) FROM book_sample_details WHERE uid='$ag_id'");
				while($data12=mysql_fetch_array($query12))
				{
					$given=$data12['teacher_id'];
					$qs=mysql_query("SELECT * FROM book_sample_details WHERE uid='$ag_id' AND teacher_id='$given' ");	  
					
					while($ds=mysql_fetch_array($qs))
					{
						$book_id.=$ds['book_id'].",";
						$qty=$ds['qty'];
						$relate=$row['relate'];
				   }
				   $book_id=rtrim($book_id,",");
				   if(($relate=="SCHOOL") || ($relate=="TEACHER") )
				    {					 
						$q12=mysql_query("SELECT school,teacher FROM teacher_master_list WHERE id='$given'");
						$val12=mysql_fetch_array($q12);
					
						$given1.=$val12['teacher'].",";	
						$name=$val12['school'];			
					}
					else if(($relate=="CORPORATE") || ($relate=="CONTACT_PERSON"))
				    {			 
						$q12=mysql_query("SELECT name,persion FROM corporate_sub WHERE id='$given'");
						$val12=mysql_fetch_array($q12);
						$given1.=$val12['persion'].",";
						$name=$val12['name'];				
					}
					else if($relate=="DEPARTMENT") 
				    {					 
						$q12=mysql_query("SELECT name FROM department_list WHERE id='$given'");
						$val12=mysql_fetch_array($q12);
						$given1.=$val12['name'].",";
						$name=$val12['name'];				
					}					
					else if(($relate=="CHAIN") || ($relate=="MEMBER"))
				    {					 
						$q12=mysql_query("SELECT name,member FROM chain_school_sub WHERE id='$given'");
						$val12=mysql_fetch_array($q12);
						$given1.=$val12['member'].",";
						$name=$val12['name'];				
					}

					$qi=mysql_query("SELECT * FROM item_master_list WHERE id IN($book_id)");
				    while($di=mysql_fetch_array($qi)){
				    $item_name=$di['item_name'];
				    $class=$di['class'];
				    $item.=$item_name."/".$class."/".$qty.",";
				  				   
					$cut+=1;
					}
					$item.='';
					$given1.='';
			  			   
				 }
				  $given1=rtrim($given1,",");
				  $item=rtrim($item,",");
				 
				$rows_excel[]=$count+1;
				$rows_excel[]=$row['relate'];
				$rows_excel[]=$row['name'];
				$rows_excel[]=$row['address'];
				$rows_excel[]=$row['city'];
				$rows_excel[]=$row['district'];
				$rows_excel[]=$row['salesman_name'];
				$rows_excel[]=$item;
				$rows_excel[]=$given1;
				$rows_excel[]=$row['sampling_Date'];
				$rows_excel[]=$row['remarks'];
				$rows_excel[]=$row['app'];
				
			array_walk($rows_excel, 'cleanData');
			echo implode("\t", array_values($rows_excel)) . "\r\n";

			$count++;
		}
  exit;
  
 
}


?>