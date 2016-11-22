<?php
require_once('config.php');
if(isset($_GET['q']))
 {
 	$id=$_GET['q'];	 
	$query=mysql_query("SELECT * FROM location_maste_info_list WHERE id= '$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query);   
	$string=$value['city'].'#'.$value['district'].'#'.$value['state'].'#'.$value['country'].'#'.$value['pin'].'#'.$value['std'];
	
	echo $string; die();
 }

if(isset($_GET['p']))
 {
 	$id=$_GET['p'];	 
	$query=mysql_query("SELECT district,state FROM location_maste_info_list WHERE id= '$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query);   
	$string=$value['district'].'#'.$value['state'];
	
	echo $string; die();
 }
 
 if(isset($_GET['r']))
 {
 	$id=$_GET['r'];	 
	$query=mysql_query("SELECT distict,state FROM bank_details_list WHERE id= '$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query);   
	$string=$value['distict'].'#'.$value['state'];
	
	echo $string; die();
 }
if(isset($_GET['s']))
 {
 	$id=$_GET['s'];	 
	$query=mysql_query("SELECT subject,class FROM item_master_list WHERE id= '$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query);   
	$string=$value['subject'].'#'.$value['class'];
	
	echo $string; die();
 }
 
 if(isset($_GET['pass']))
 {
 	$id=$_GET['pass'];	 
	$query=mysql_query("SELECT user_decrypt FROM dan_users WHERE id= '$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['user_decrypt']; die();
 }

 if(isset($_GET['exe']))
 {
 	$id=$_GET['exe'];
		 
	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['designation']; die();
	
 }
 if(isset($_GET['ser']))
 {
 	$ser=$_GET['ser'];
	$string="";	 
	$query=mysql_query("SELECT item_name FROM item_master_list WHERE subject= '$ser' ") or die(mysql_error());
  while($value=mysql_fetch_array($query) )
	  {   $string.=$value['item_name']; 
	    $string.="#"; 
	  }
	echo $string; die();
 }

  if(isset($_GET['advance_bal']))
 {
 	$id=$_GET['advance_bal'];
		 
	$query=mysql_query("SELECT advance FROM tour WHERE executive_id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	if($value['advance'] != '') echo $value['advance'];  else echo '0'; die();
	
 }

 if(isset($_GET['local_da']))
 {
 	$id=$_GET['local_da'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='LOCAL DA' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

 if(isset($_GET['boarding_lodging']))
 {
 	$id=$_GET['boarding_lodging'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='BOARDING / LODGING' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

  if(isset($_GET['breakfast']))
 {
 	$id=$_GET['breakfast'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='BREAKFAST' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

  if(isset($_GET['lunch']))
 {
 	$id=$_GET['lunch'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='LUNCH' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

  if(isset($_GET['dinner']))
 {
 	$id=$_GET['dinner'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='DINNER' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

 if(isset($_GET['telephone']))
 {
 	$id=$_GET['telephone'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='TELEPHONE' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

 if(isset($_GET['stationery']))
 {
 	$id=$_GET['stationery'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='STATIONERY' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

 if(isset($_GET['xerox']))
 {
 	$id=$_GET['xerox'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='XEROX' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

  if(isset($_GET['courier_charges']))
 {
 	$id=$_GET['courier_charges'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='COURIER CHARGES' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

  if(isset($_GET['internet_charges']))
 {
 	$id=$_GET['internet_charges'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='INTERNET CHARGES' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

  if(isset($_GET['others']))
 {
 	$id=$_GET['others'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='OTHERS' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

  if(isset($_GET['transport_buulty_charge']))
 {
 	$id=$_GET['transport_buulty_charge'];

 	$query=mysql_query("SELECT designation FROM department_list WHERE id='$id' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	$designation= $value['designation'];
		 
	$query=mysql_query("SELECT amount FROM expense_ent WHERE designation='$designation' AND head='TRANSPORT / BULTY CHARGE' ") or die(mysql_error());
	$value=mysql_fetch_array($query); 
	echo $value['amount']; die();
	
 }

?>