<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');

if(isset($_POST['head']))
  { $amou=0;
   $desig1=$_POST['desig1'];
   $head=$_POST['head'];
   $datepicker=$_POST['datepicker'];
   $datepicker = date('Y-m-d', strtotime($datepicker));
   
   $query=mysql_query("SELECT amount FROM expense_ent WHERE (head='$head') AND (designation='$desig1') AND (date1='$datepicker') ORDER BY id DESC;");
   $data=mysql_fetch_array($query);
   if($data['amount']==0)
   {	      
	      $query=mysql_query("SELECT amount FROM expense_ent WHERE (head='$head') AND (designation='$desig1') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data=mysql_fetch_array($query);	 
		  if($data['amount']==0)
   		  {
			  
		  }
   }
   $amou=$data['amount'];   
   echo $amou;  
  }
  
if(isset($_POST['desig']))
  { 
   $str="";    
   $datepicker=$_POST['datepicker'];
   $datepicker = date('Y-m-d', strtotime($datepicker));
   $desig=$_POST['desig'];
   $advance_bal=$_POST['advance_bal'];   
   
   $query=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='LOCAL DA') AND (date1='$datepicker') ORDER BY id DESC");
   $data=mysql_fetch_array($query);
   if($data['amount']==0)
   {	      
	  $query=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='LOCAL DA') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data=mysql_fetch_array($query);	 
		  if($data['amount']==0)
   		  {
			  
		  }
   }   
   $da=$data['amount'];
  
   $query=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='BOARDING / LODGING') AND (date1='$datepicker') ORDER BY id DESC");
   $data=mysql_fetch_array($query);
   if($data['amount']==0)
   {	      
	  $query=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='BOARDING / LODGING') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data=mysql_fetch_array($query);	 
		  if($data['amount']==0)
   		  {
			   
		  }
   } 
   $bolo=$data['amount'];
   
   $query1=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='BREAKFAST') AND (date1='$datepicker') ORDER BY id DESC");
   $data1=mysql_fetch_array($query1);
    if($data1['amount']==0)
   {	      
	  $query1=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='BREAKFAST') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data1=mysql_fetch_array($query1);	 
		  if($data1['amount']==0)
   		  {
			  
		  }
   } 
   $food1=$data1['amount'];
   
   
   $query2=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='LUNCH') AND (date1='$datepicker') ORDER BY id DESC");
   $data2=mysql_fetch_array($query2);
    if($data2['amount']==0)
   {	      
	  $query2=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='LUNCH') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data2=mysql_fetch_array($query2);	 
		  if($data2['amount']==0)
   		  {
			  
		  }
   } 
   $food2=$data2['amount'];
   
   $query3=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='DINNER') AND (date1='$datepicker') ORDER BY id DESC");
   $data3=mysql_fetch_array($query3);
    if($data3['amount']==0)
   {	      
	  $query3=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='DINNER') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data3=mysql_fetch_array($query3);	 
		  if($data3['amount']==0)
   		  {
			  
		  }
   } 
   $food3=$data3['amount'];
   
   
   $query4=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='TELEPHONE') AND (date1='$datepicker') ORDER BY id DESC");
   $data4=mysql_fetch_array($query4);
    if($data4['amount']==0)
   {	      
	 $query4=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='TELEPHONE') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data4=mysql_fetch_array($query4);	 
		  if($data4['amount']==0)
   		  {
			  
		  }
   } 
   $food4=$data4['amount'];
   
  $query5=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='STATIONERY') AND (date1='$datepicker') ORDER BY id DESC");
  $data5=mysql_fetch_array($query5);
    if($data5['amount']==0)
   {	      
	 $query5=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='STATIONERY') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data5=mysql_fetch_array($query5);	 
		  if($data5['amount']==0)
   		  {
			  
		  }
   } 
   $food5=$data5['amount'];
   
   
 $query6=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='XEROX') AND (date1='$datepicker') ORDER BY id DESC");
 $data6=mysql_fetch_array($query6);
    if($data6['amount']==0)
   {	      
	 $query6=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='XEROX') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data6=mysql_fetch_array($query6);	 
		  if($data6['amount']==0)
   		  {
			  
		  }
   } 
   $food6=$data6['amount'];
   
   
 $query7=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='COURIER CHARGES') AND (date1='$datepicker') ORDER BY id DESC");
 $data7=mysql_fetch_array($query7);
    if($data7['amount']==0)
   {	      
	 $query7=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='COURIER CHARGES') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data7=mysql_fetch_array($query7);	 
		  if($data7['amount']==0)
   		  {
			  
		  }
   } 
   $food7=$data7['amount'];
   
   
$query8=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='INTERNET CHARGES') AND (date1='$datepicker') ORDER BY id DESC");
 $data8=mysql_fetch_array($query8);
    if($data8['amount']==0)
   {	      
	 $query8=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='INTERNET CHARGES') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data8=mysql_fetch_array($query8);	 
		  if($data8['amount']==0)
   		  {
			  
		  }
   } 
   $food8=$data8['amount'];
   
   
   $query9=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='TRANSPORT / BULTY CHARGE') AND (date1='$datepicker') ORDER BY id DESC");
 $data9=mysql_fetch_array($query9);
    if($data9['amount']==0)
   {	      
	 $query9=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='TRANSPORT / BULTY CHARGE') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data9=mysql_fetch_array($query9);	 
		  if($data9['amount']==0)
   		  {
			  
		  }
   } 
   $food9=$data9['amount'];
   
 $query10=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='OTHERS') AND (date1='$datepicker') ORDER BY id DESC");
 $data10=mysql_fetch_array($query10);
   if($data10['amount']==0)
   {	      
	 $query10=mysql_query("SELECT * FROM expense_ent WHERE (designation='$desig') AND (head='OTHERS') AND (date1<'$datepicker') ORDER BY id DESC");   
	      $data10=mysql_fetch_array($query10);	 
		  if($data10['amount']==0)
   		  {
			  
		  }
   } 
   $food10=$data10['amount'];
  
   $kk=$advance_bal-($da+$bolo+$food1+$food2+$food3+$food4+$food5+$food6+$food7+$food8+$food9+$food10);
   
   $str=$da."#".$bolo."#".$food1."#".$kk."#".$food2."#".$food3."#".$food4."#".$food5."#".$food6."#".$food7."#".$food8."#".$food9."#".$food10;
   echo $str;
  
  }
?>




