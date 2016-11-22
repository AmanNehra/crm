<?php
require_once('config.php');
include('function.php');
//echo '<pre>'; print_r($_REQUEST);die;
if($_REQUEST['print']){
$rows=$_REQUEST['rows'];
for($i=0; $i<$rows; $i++){
 if(isset($_REQUEST['checkbox'.$i])){
   $id=$_REQUEST['checkbox'.$i];   
   $query="SELECT * FROM corporate_list WHERE id='$id'";
   $row=mysql_fetch_array(mysql_query($query));
   //echo '<pre>'; print_r($row);    
    
    $uid=$row['id'];
	//For owner name and contact 
	$query1="SELECT * FROM corporate_sub WHERE uid='$uid' AND designation='OWNER'";
    $row1=mysql_fetch_array(mysql_query($query1));
	$owner=$row1['persion'];
	$owner_contact=$row1['phone1'];
	if($row1['mobile1']!="")
	  $owner_contact.=",".$row1['mobile1'];
	  if($row1['mobile2']!="")
	  $owner_contact.=",".$row1['mobile2'];
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
 window.location.href="report_corporate_list.php";
 }

</script>
</head>
<body onLoad="pageprint();">
<div style="width:100%;" >

<h3 align="center" style="color:000">Mascot Education Pvt. Ltd</h3>
<h3 align="center" style="color:000">Corporate List</h3>
<div align="left" style="" id="divmain">
<div style="margin:15px 0 15px 0">

<span style="text-align : justify"><?php echo $row['code'];?>, <b><?php echo $row['name'];?>, <?php echo $row['address'];?>, <?php echo $row['city'];?>, <?php echo $row['district'];?>, <?php echo $row['state'];?> (<?php echo $row['pin'];?>) </b></span><br />

<span><b><?php echo $row['std']."-".$row['phone1'];?>, <?php echo $row['email'];?></b></span><br />

<!-- <span><b>Corporate Name:</b><?php echo $row['name'].'('.$row['code'].')';?></span><br>
<span><b>Address:</b><?php echo $row['address'].',';?><b>City:</b><?php echo $row['city'];?></span><br> -->
<span><b>Category:</b>&nbsp;<?php echo $row['category'];?></span>,<span><b>Route:</b>&nbsp;<?php echo $row['city']."&nbsp;".$row['route'];?></span>,<span><b>Route No:</b>&nbsp;<?php echo $row['route'];?></span>,<span><b>Day off:</b>&nbsp;<?php echo $row['dayoff'];?></span><br>

<span><b>Owner Name:</b>&nbsp;<?php echo $owner;?></span>, <span><b>Contact</b></span> <span><?php echo $owner_contact;?></span><br>
<span><b>TPT:</b>&nbsp;<?php echo $row['tpt'];?></span>...........................................................<br>
<span><b>Bank:</b>&nbsp;<?php echo $row['bank'];?></span>..............................................................<br>
<span><b>Remarks:</b>&nbsp;<?php echo $row['remark'];?></span>..........................................................<br>
</div>
<!--Teacher Listing-->
<div style="margin:15px;" align="center">
<table style="border:1px solid black; width:95%;font-size:12px; text-align:left;" >
<tr>

<th>S. No</th>
<!--<th></th>-->
<th>Contact Person</th>
<th>Contact No.</th>
<th>Subject</th>
<th>Class</th>
<th>Visit Date</th>
</tr>
<?php 
$query1="SELECT  * FROM corporate_sub WHERE uid='$uid'";
$query1=mysql_query($query1) or die(mysql_error());
$j=1;
while($row1=mysql_fetch_array($query1)){ 

 //To know sampling Date
 $teacher_id=$row1['id'];
 $query11="SELECT * FROM book_sample_details WHERE teacher_id='$teacher_id' AND (relate='CORPORATE' OR relate='CONTACT_PERSON') ORDER BY id DESC";
 $query11=mysql_query($query11) or die(mysql_error());
 $data11=mysql_fetch_assoc($query11);
 $visit=substr($data11['date'],0,10);
 
?>
<tr>
<td><?php echo $j; ?></td>
<!--<th>Contact Person</th>-->
<td><?php echo $row1['persion']; ?></td>
<td><?php echo $row1['phone1']; ?></td>
<td></td>
<td></td>
<td><?php echo $visit; ?></td>
</tr>
<tr>
<td></td>
<!--<th>Address</th>-->
<td><?php echo $row1['address']; ?></td>
<td><?php echo $row1['mobile1']; ?></td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<!--<th>Email ID</th>-->
<td><?php echo $row1['email']; ?></td>
<td><?php echo $row1['mobile2']; ?></td>
<td></td>
<td></td>
</tr>
<?php $j++; } ?>
</table>
</div>
<!--End Listing-->
</div>

</div>
<!--For Page Break-->
<!-- <h1 align="center" style=" page-break-after:always;"> END OF RECORD</h1> -->
<!--End Page Break-->


<?php } }  ?>
</body>
</html>
<?php } ?>

<!--For Print Contact Lable-->
<?php
if($_REQUEST['print_contact'])
 { //echo $_REQUEST['teacher_lable']; die;
  $j=1;
  $rows=$_REQUEST['rows'];
  for($i=0; $i<$rows; $i++){
  if(isset($_REQUEST['checkbox'.$i])){   
   $id=$_REQUEST['checkbox'.$i];
   //$id=12;
   $query="SELECT * FROM corporate_sub where uid='$id'";
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
  window.location.href="report_corporate_list.php";
 }

</script>
</head>
<body style="page-break-after: always;" onLoad="pageprint();">
<?php if($j%2==1){?>
<div style="float:left; margin:25px; width:40%;">
<span>To</span><br>
<span><b>Corporate Name:</b><?php echo $row['name'].'('.$row['code'].')';?></span><br>
<span><b>Address:</b><?php echo $row['address'].',';?><b>City:</b><?php echo $row['city'];?></span><br>
<span><?php echo $row['persion'];?></span><br> 
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
<span><b>Corporate Name:</b><?php echo $row['name'].'('.$row['code'].')';?></span><br>
<span><b>Address:</b><?php echo $row['address'].',';?><b>City:</b><?php echo $row['city'];?></span><br>
<span><?php echo $row['persion'];?></span><br> 
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
   }
  }
?>
</body>
</html>
<?php
 }
 
?>

<!--End Contac Lable-->

<!--For  Corporate Lable-->
<?php
 if($_REQUEST['print_corporate'])
 {
 $j=1;
  $rows=$_REQUEST['rows'];
  for($i=0; $i<$rows; $i++){
  if(isset($_REQUEST['checkbox'.$i])){   
   $id=$_REQUEST['checkbox'.$i];
   
   $query="SELECT * FROM corporate_list where id='$id'";
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
 window.location.href="report_corporate_list.php";
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
<span><?php echo $row['name'];?></span><br> 
<span><?php echo $row['address'];?></span><br>
<span><?php echo $row['city']."-".$row['pin'];?></span><br> 
<span><?php echo $row['district'];?></span><br>
<span><?php echo $row['phone1'].",".$row['phone2'];?></span><br> 
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
<!--End Contact-->
