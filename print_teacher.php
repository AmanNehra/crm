<?php
//echo '<pre>'; print_r($_REQUEST); die;
require_once('config.php');
include('function.php');

if($_REQUEST['print'])
{ 
	$rows=$_REQUEST['rows'];
	
for($i=0; $i<$rows; $i++)
{
 if(isset($_REQUEST['checkbox'.$i])){
   $id=$_REQUEST['checkbox'.$i];
    $query="SELECT * FROM master_list WHERE id='$id'";
   $row=mysql_fetch_array(mysql_query($query));
  // echo '<pre>'; print_r($row);
    $principal="";
	$pricipal_mobile="";
	$key_person="";
	$key_person_mobile="";
  $uid=$row['id'];  
  
   $query1="SELECT * FROM teacher_master_list where uid='$uid' AND (designation='PRINCIPAL' OR designation='KEY PERSION') ";  
  $query1=mysql_query($query1) or die(mysql_error());
  while($row1=mysql_fetch_array($query1)){
  if($row1['designation']=="PRINCIPAL"){
    $principal=$row1['teacher'];
	$pricipal_mobile=$row1['mobile1'].",".$row1['mobile2'];
   }
  if($row1['designation']=="KEY PERSION"){
    $key_person=$row1['teacher'];
	$key_person_mobile=$row1['mobile1'].",".$row1['mobile2'];
   } 
  }
  
  //for strength of students in school
  $nur=0;$lkg=0;$ukg=0;$oneto5=0;$oneto8=0;$one=0;$two=0;$three=0;$four=0;$five=0;$six=0;$seven=0;$eight=0;$total_strength=0;
   $query1="SELECT * FROM strength where uid='$uid'";  
  $query1=mysql_query($query1) or die(mysql_error());
  while($row1=mysql_fetch_array($query1)){
     if($row1['class']=="NUR"){
	  $nur+=$row1['strength'];
	 }
	 if($row1['class']=="LKG"){
	  $lkg+=$row1['strength'];
	 }
	 if($row1['class']=="UKG"){
	  $ukg+=$row1['strength'];	 
	 }
	 if($row1['class']=="1 TO 5"){
	  $oneto5+=$row1['strength'];	   
	 }
	 
	 if($row1['class']=="1 TO 8"){
	  $oneto8+=$row1['strength'];	  		 
	 }
	 
	 if($row1['class']=="1"){
	  $one+=$row1['strength'];
	 }
	  if($row1['class']=="2"){
	  $two+=$row1['strength'];
	 }
	  if($row1['class']=="3"){
	  $three+=$row1['strength'];
	 }
	  if($row1['class']=="4"){
	  $four+=$row1['strength'];
	 }
	  if($row1['class']=="5"){
	  $five+=$row1['strength'];
	 }
	  if($row1['class']=="6"){
	  $six+=$row1['strength'];
	 }
	  if($row1['class']=="7"){
	  $seven+=$row1['strength'];
	 }
	  if($row1['class']=="1"){
	  $one+=$row1['strength'];
	 }
	  if($row1['class']=="8"){
	  $eight+=$row1['strength'];
	 }  
  } 
  $total_strength=$nur+$lkg+$ukg+$oneto5+$oneto8+$one+$two+$three+$four+$five+$six+$seven+$eight;
  //End
  
  //For Bookbookseller record
   $bs_id=$row['bs_id'];   
   
    $query1="SELECT * FROM corporate_list where id='$bs_id' ";     
   $query1=mysql_query($query1) or die(mysql_error());
   $row1=mysql_fetch_array($query1);
  
   $bs_name=$row1['name'];
   $bs_address=$row1['address'];
   $bs_city=$row1['city'];
   $bs_district=$row1['district'];
   $bs_state=$row1['state'];    
  //End
  
  //For running item
  $runnig_item="";
   $query1="SELECT * FROM strength where uid='$uid'";  
  $query1=mysql_query($query1) or die(mysql_error());
  while($row1=mysql_fetch_array($query1))
  {
    $runnig_item.=$row1['subject']."/".$row1['class'].",";
  }
  
  //End
  
   
?>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="Only-Logo.png"/>
<link rel="stylesheet" href="css/screen11.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/css.css" type="text/css" />
 <!--<link rel="stylesheet" href="stylesmenu.css">-->
 
 <!--tab css-->
<link rel="stylesheet" href="css/css-for-inner-page/stylesmenu-inner-page.css">
<!--Tab css-->
 
 <!--main css-->
<link href="css/css-for-inner-page/crm-home-two.css" rel="stylesheet" type="text/css" />
<!--main css-->
<script>
function pageprint(){
 window.print();
 window.location.href="report_teacher_list.php";
 }

</script>
</head>
<body onLoad="pageprint();" >
<div style="width:100%;" >
<h3 align="center" style="color:000">Mascot Education Pvt. Ltd</h3>
<h3 align="center" style="color:000">Teacher List</h3>
<div align="left" style="" id="divmain">
<div style="margin:15px 0 15px 0">
<?php /* ?>
<span><?php echo $row['code'];?></span>,<span><?php echo $row['name'];?></span>,<span><?php echo $row['address'];?></span>,
<span><?php echo $row['city'];?></span>,<span><?php echo $row['district'];?></span>,<span><?php echo $row['state'];?></span>,<?php echo $row['phone1'].",".$row['phone2'];?>,<span><?php echo $row['email'];?></span><br />

<span><b>School Name:</b><?php echo $sn=$row['name'].'('.$c=$row['code'].')';?></span><br>


<span><b>Address:</b><?php echo $ad=$row['address'].',';?><b>City:</b><?php echo $ct=$row['city'];?></span><br>
<span><?php echo $row['std']."-".$row['phone1'].", ".$row['email'];?></span><br>
<?php */ ?>

<span style="text-align : justify"><?php echo $c=$row['code'];?>, <b><?php echo $sn=$row['name'].', ';?><?php echo $ad=$row['address'].', ';?><?php echo $row['city'];?>, <?php echo $row['district'];?>, <?php echo $row['state'];?> (<?php echo $row['pin'];?>) </b></span><br>

<span><b><?php echo $row['std']."-".$row['phone1'].", ".$row['email'];?></b></span><br>

<span><b>Board:</b>&nbsp;<?php echo $row['board'];?></span>,<span><b>Category:</b>&nbsp;<?php echo $row['category'];?></span>,<span><b>Route:</b>&nbsp;<?php echo $row['city']."&nbsp;".$row['route'];?></span>,<span><b>Route No:</b>&nbsp;<?php echo $row['route'];?></span><br>

<span><b>Principal Name:</b>&nbsp;<?php echo $principal;?></span> <span><b>Mob. No. </b></span><span><?php echo $pricipal_mobile;?></span><br>
<span><b>Key Person:</b>&nbsp;<span><?php echo $key_person;?></span> </span><span><b>Mob. No. </b></span><span><?php echo $key_person_mobile;?></span><br />

<span><b>Strength (up  to VIII):</b></span><span><?php echo $total_strength;?></span><span><b>Nur ( <?php echo $nur;?>  )</b></span><span><b>LKG ( <?php echo $lkg;?>  )</b></span><span><b>UKG (  <?php echo $ukg;?>  )</b></span><span><b>I (  <?php echo $one;?>  )</b></span><span><b>II (  <?php echo $two;?>  )</b></span><span><b>III (  <?php echo $three;?>  )</b></span><span><b>IV (  <?php echo $four;?>  )</b></span><span><b>V (  <?php echo $five;?>  )</b></span><span><b>VI (  <?php echo $six;?>  )</b></span><span><b>VII   (  <?php echo $seven;?>  )</b></span><span><b>VIII  (  <?php echo $eight;?>  )</b></span><br />

<span><b>Bookseller Name </b></span> <span><?php echo $bs_name; ?>, <?php echo $bs_address; ?>, <?php echo $bs_city; ?>, <?php echo $bs_district; ?></span><br />

<span><b>Submission Date:</b>&nbsp;<?php echo $row['submission']?></span><br />

<span><b>List Finalised Date:</b>&nbsp;<?php echo $row['finalised']; ?></span><br />

<span><b>Running Titles:</b> &nbsp; <?php echo $runnig_item;?></span><br />
<span><b>Scope:</b></span><br />
<span><b>Remarks:</b>&nbsp;<?php echo $row['remark'];?></span>..........................................................<br>
</div>
<!--Teacher Listing-->
<div style="margin:15px;">
<table style="border:1px solid black; width:100%;font-size:12px;text-align:left;" >
<tr>

<th>S. No</th>
<!--<th></th>-->
<th>Teacher Name</th>
<th>Contact No.</th>
<th>Subject</th>
<th>Class</th>
<th>Visit Date</th>
</tr>
<?php 
$query1="SELECT  * FROM teacher_master_list WHERE uid='$uid'";
$query1=mysql_query($query1) or die(mysql_error());
$j=1;
while($row1=mysql_fetch_array($query1)){
 //To know sampling Date
 $teacher_id=$row['id'];
 $query11="SELECT * FROM book_sample_details WHERE teacher_id='$teacher_id' AND (relate='TEACHER' OR relate='SCHOOL') ORDER BY id DESC";
 $query11=mysql_query($query11) or die(mysql_error());
 $data11=mysql_fetch_assoc($query11);
 $visit=substr($data11['date'],0,10);
 
 
 //End
 $subject=unserialize($row1['subject']);
 $class=unserialize($row1['class']);
 
?>
<tr>
<td><?php echo $j; ?></td>
<!--<th>Teacher Name</th>-->
<td><?php echo $row1['teacher']; ?></td>
<td><?php echo $row1['phone1']; ?></td>
<td><?php echo $subject[0]; ?> <br /><?php echo $subject[1]; ?></td>
<td><?php echo $class[0]; ?> <br /><?php echo $class[1]; ?></td>
<td><?php echo $visit;?></td>
</tr>
<tr>
<td></td>
<!--<th>Address</th>-->
<td><?php echo $row1['address']; ?></td>
<td><?php echo $row1['mobile1']; ?></td>
<td><?php echo $subject[2]; ?> <br /><?php echo $subject[3]; ?></td>
<td><?php echo $class[2]; ?> <br /><?php echo $class[3]; ?></td>
</tr>
<tr>
<td></td>
<!--<th>Email ID</th>-->
<td><?php echo $row1['email']; ?></td> 
<td><?php echo $row1['mobile2']; ?></td>
<td><?php echo $subject[5]; ?></td>
<td><?php echo $class[5]; ?> </td>
</tr>
<?php $j++; } ?>
</table>
</div>
<!--End Listing-->
</div>

</div>
<!--For Page Break-->
<h1 align="center" style=" page-break-after:always;"> </h1>
<!--End Page Break-->

<?php } }  ?>
</body>
</html>
<?php } ?>
<!--For Print Teacher Lable-->
<?php
if($_REQUEST['teacher_lable'])
 { // echo $_REQUEST['teacher_lable']; die;

  $j=1;
  $rows=$_REQUEST['rows'];
  for($i=0; $i<$rows; $i++){
  if(isset($_REQUEST['checkbox'.$i])){   
   $id=$_REQUEST['checkbox'.$i];   
   $query="SELECT * FROM teacher_master_list where uid='$id'";
   $query1=mysql_query($query) or die(mysql_error());
   $countnum=mysql_num_rows($query1);
   if($countnum)   
   {	     ?>
   <?php 
	$query55="SELECT * FROM master_list where id='$id'";
	$query55=mysql_query($query55) or die(mysql_error());
   	$row55=mysql_fetch_array($query55); ?>
<span><b>School Name:</b><?php echo $row55['name'].'('.$row55['code'].')';?></span><br>
<span><b>Address:</b><?php echo $row55['address'].',';?><b>City:</b><?php echo $row55['city'];?></span><br>
<?php
   while($row=mysql_fetch_assoc($query1)){
 // echo '<pre>';print_r($row);
     
?>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="Only-Logo.png"/>
<link rel="stylesheet" href="css/screen11.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/css.css" type="text/css" />
 <!--<link rel="stylesheet" href="stylesmenu.css">-->
 
 <!--tab css-->
<link rel="stylesheet" href="css/css-for-inner-page/stylesmenu-inner-page.css">
<!--Tab css-->
 
 <!--main css-->
<link href="css/css-for-inner-page/crm-home-two.css" rel="stylesheet" type="text/css" />
<!--main css-->
<script>
function pageprint(){
 window.print();
 window.location.href="report_teacher_list.php";
 }

</script>
</head>
<body style="page-break-after: always;" onLoad="pageprint();">
<?php if($j%2==1){?>
<div style="float:left; margin:25px; width:40%;">
<span>To</span><br>
<span><?php echo $row['teacher'];?></span><br> 
<span><?php echo $row['address'];?></span><br>
<span><?php echo $row['city']."-".$row['pin'];?></span><br> 
<span><?php echo $row['district'];?></span><br>
<span><?php echo $row['phone1'].",".$row['mobile1'];?></span><br> 
<span><?php echo $row['email'];?></span><br>
</div>
<?php }?>

<?php if($j%2==0){?>
<div style="float:right; margin:25px;width:40%;">
<span>To</span><br>
<span><?php echo $row['teacher'];?></span><br> 
<span><?php echo $row['address'];?></span><br>
<span><?php echo $row['city']."-".$row['pin'];?></span><br> 
<span><?php echo $row['district'];?></span><br>
<span><?php echo $row['phone1'].",".$row['mobile1'];?></span><br> 
<span><?php echo $row['email'];?></span><br>
</div>
<?php }?>

<?php
  $j++;  echo '<br>';
	}  
	}else{ ?> <script>window.location.href="report_teacher_list.php";</script><?php }
   }
  }
?>
</body>
</html>
<?php
 }
 
?>

<!--End Teacher Lable-->


<!--For School Lable-->
<?php
 if($_REQUEST['school_lable'])
 {
 $j=1;
  $rows=$_REQUEST['rows'];
  for($i=0; $i<$rows; $i++){
  if(isset($_REQUEST['checkbox'.$i])){   
   $id=$_REQUEST['checkbox'.$i];
   
   $query="SELECT * FROM master_list where id='$id'";
   $query=mysql_query($query) or die(mysql_error());
   while($row=mysql_fetch_assoc($query)){
   //echo '<pre>';print_r($row);
     
?>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="Only-Logo.png"/>
<link rel="stylesheet" href="css/screen11.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/css.css" type="text/css" />
 <!--<link rel="stylesheet" href="stylesmenu.css">-->
 
 <!--tab css-->
<link rel="stylesheet" href="css/css-for-inner-page/stylesmenu-inner-page.css">
<!--Tab css-->
 
 <!--main css-->
<link href="css/css-for-inner-page/crm-home-two.css" rel="stylesheet" type="text/css" />
<!--main css-->
<script>
function pageprint(){
 window.print();
 window.location.href="report_teacher_list.php";
 }

</script>
</head>
<body style="page-break-after: always;" onLoad="pageprint();">
<?php if($j%2==1){?>
<div style="float:left; margin:25px; width:40%;">
<span>To</span><br>
<span><?php echo $row['name'];?></span><br> 
<span><?php echo $row['address'];?></span><br>
<span><?php echo $row['city']."-".$row['pin'];?></span><br> 
<span><?php echo $row['district'];?></span><br>
<span><?php echo $row['phone1'].",".$row['phone2'];?></span><br> 
<span><?php echo $row['email'];?></span><br>
</div>
<?php }?>

<?php if($j%2==0){?>
<div style="float:right; margin:25px;width:40%;">
<span>To</span><br>
<span><?php echo $row['teacher'];?></span><br> 
<span><?php echo $row['address'];?></span><br>
<span><?php echo $row['city']."-".$row['pin'];?></span><br> 
<span><?php echo $row['district'];?></span><br>
<span><?php echo $row['phone1'].",".$row['mobile1'];?></span><br> 
<span><?php echo $row['email'];?></span><br>
</div>
<?php }?>

<?php
  $j++;  
	} 
   }
  } 
?>
</body>
</html>
<?php
 }

?>
<!--End School-->
