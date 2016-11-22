<?php ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
$userid=$_SESSION['SESS_id'];
if(empty($userid)){header('location:login.php');}
if(empty($_GET['id'])){header('location:index.php');}else{
$id = convert_uudecode(base64_decode($_GET['id']));}
$result=mysql_query("SELECT * FROM dan_customers WHERE id='$id'") or die(mysql_error());
$row = mysql_fetch_array($result);
$idis=$row['sale_register_agent'];

 $data=mysql_query("SELECT * FROM dan_users where id='$userid'") or die(mysql_error);
$r=mysql_fetch_array($data);
$user=$r['user_type'];
//echo $user;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Note</title><br />
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/note/styal.css" type="text/css">
<script type="text/javascript">
$(document).ready(function(){
 $("#num").hide();
$("#sib").click(function(){
  $("#num").show();
   });
 $("#cancel").click(function(){
 $("#num").hide();
 });  
   
});

</script>
</head>

<body>
<div class="mane">
<?php 

$resul=mysql_query("SELECT * FROM dan_users where id='$idis'") or die(mysql_error());
$resu=mysql_fetch_array($resul)
//echo $resu['user_name'];?>
<div class="pag-to-ouater">
<div class="page-top">

View Notes Information
</div>

<div style="height:60px; border-bottom:#999999 solid 1px;">
<div class="top-search" >
<div><span style="font-weight:bold;">Name:</span> <?php echo $row['firstname']; ?></div>
<div><span style="font-weight:bold;">Email:</span> <?php echo $row['email']; ?></div>


</div>
<div style="float:right; margin-right:30px;"><div style="font-weight:bold;">Date & Time(*created)</div>
<div><?php echo $row['created_on']; ?></div>
</div>
<div style="float:right; margin-right:30px;"><div style="font-weight:bold;">Added By</div>
<div><?php if(empty($resu['user_name'])){echo 'Not yet Registered';}else{echo $resu['user_name'];} ?></div>
</div>

<div style="float:right; margin-right:20px;"><div style="font-weight:bold;">Alternate Phone No.</div>
<div><?php if(empty($row['alternate'])){echo ' No Alternate No.';}else{echo $row['alternate'];} ?></div> 
</div>




</div>
<div class="bottom">
<div style="float:left;margin-left: 3%;color: rgb(7, 7, 7);font-style: italic;font-weight: bold;">
<?php if(!empty($row['sale_reg_type'])){
if($row['sale_reg_type']=='1'){echo 'Inbound Sale';}else{echo 'Outbound Sale';}

}?></div>
<?php $check_ref=mysql_query("SELECT * FROM notes WHERE customer_id='$id'") or die(mysql_error());
$check=mysql_fetch_array($check_ref);
$check=$check['refund'];
//echo $check;
if($check==1){
//echo $user;
if($user==1){?>
<form action="add_note.php" method="post">
<input type="hidden" name="customer_id"  value="<?php echo $id; ?>"/>
<input type="hidden" name="user_id"  value="<?php echo $user_id; ?>"/>

<div class="addnote"><input type="submit" name="submit" value="Add Note"  style="padding-left:15px; padding-right:15px;"/>
</div>
</form>

<div class="addnote"><input type="button" id="sib" name="submit" value="Add Alternate Number"  style="padding-left:15px; padding-right:15px;float: left;"/>
<div style="float:left; margin-left:5px;" id="num">
<form action="add_alternate.php" method="post" id="alternate">
<input type="hidden" name="customer_id"  value="<?php echo $id; ?>"/>

<input id="alt_no" type="text" name="alternate" style="border:1px solid;"/>
<input type="submit" value="Add" name="submit" />
<input type="button" value="Cancel" id="cancel"/>
</form>
</div>
</div><?php }else{?>
<div class="addnote"><input type="button" id="sib" name="submit" value="Add Alternate Number"  style="padding-left:15px; padding-right:15px;float: left;"/>
<div style="float:left; margin-left:5px;" id="num">
<form action="add_alternate.php" method="post" id="alternate">
<input type="hidden" name="customer_id"  value="<?php echo $id; ?>"/>

<input id="alt_no" type="text" name="alternate" style="border:1px solid;"/>
<input type="submit" value="Add" name="submit" />
<input type="button" value="Cancel" id="cancel"/>
</form>
</div>
</div>

<?php }}else{?>
<form action="add_note.php" method="post">
<input type="hidden" name="customer_id"  value="<?php echo $id; ?>"/>
<input type="hidden" name="user_id"  value="<?php echo $user_id; ?>"/>

<div class="addnote"><input type="submit" name="submit" value="Add Note"  style="padding-left:15px; padding-right:15px;"/>
</div>
</form>
<div class="addnote"><input type="button" id="sib" name="submit" value="Add Alternate Number"  style="padding-left:15px; padding-right:15px;float: left;"/>
<div style="float:left; margin-left:5px;" id="num">
<form action="add_alternate.php" method="post" id="alternate">
<input type="hidden" name="customer_id"  value="<?php echo $id; ?>"/>

<input id="alt_no" type="text" name="alternate" style="border:1px solid;"/>
<input type="submit" value="Add" name="submit" />
<input type="button" value="Cancel" id="cancel"/>
</form>
</div>
</div><?php }?>

</div>



<div class="coustomer">
<div class="detail">Customer Notes Detail</div>
</div>

<div class="post-">

<div style="float:left; padding-left:20px; width:20%; padding-top:5px; color:#003399; font-weight:bold;">Agent Name</div>
<div style="float:left; width:28%;padding-top:5px; color:#003399;font-weight:bold;padding-right: 15px;">Post Date</div>
<div style="float:left; width:35%;padding-top:5px; color:#003399;font-weight:bold;padding-right: 15px;">Notes</div>
<div style="float:left;padding-top:5px; color:#003399;font-weight:bold;padding-left: 25px;">Refund</div>

</div>
<?php $resul=mysql_query("SELECT * FROM notes WHERE customer_id='$id'") or die(mysql_error());
$resu=mysql_num_rows($resul);
if($resu>0){?>
<div style="width:100%">
<table>
<?php
$i = 0;
while($rows = mysql_fetch_array($resul)){
if ($i % 2 == 0) {
  echo "<tr class='alter'>";
} else {
  echo "<tr class='alternate-row'>";
}?>
	<?php 
	$idss=$rows['user_id'];
	$res=mysql_query("SELECT * FROM dan_users WHERE id='$idss'") or die(mysql_error());
$resum=mysql_fetch_array($res);?>
            <td style="padding-left:20px; width:20%;"><?php echo $resum['user_name']; ?></td>
                <td style="padding-left:20px; width:30%"><?php echo $rows['date']; ?></td>
                <td  style="padding-left:15px; width:40%"><?php echo $rows['note']; ?></td>
                <td  style="padding-left:15px"><?php echo $rows['refund_note']; ?></td>
            </tr>
           <?php $i++;}?>
              </table>
</div>
<?php }else{echo 'No Note Data Available.';}?>





</div>

</div>
</body>
</html>
