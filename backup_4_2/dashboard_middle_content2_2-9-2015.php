<?php
for($i=0; $i<3; $i++){
$day=strtotime("+$i day", time());
$date[]=date('Y-m-d', $day);
}
//For date of birth
$query="SELECT 'teacher_master_list',uid,teacher,dob FROM teacher_master_list where dob IN ('$date[0]','$date[1]','$date[2]') UNION ALL select 'corporate_sub',uid,persion,dob from corporate_sub where dob IN ('$date[0]','$date[1]','$date[2]') UNION ALL select 'department_list', id,name,dob from department_list where dob IN ('$date[0]','$date[1]','$date[2]') UNION ALL select 'chain_school_sub',sid,member,dob from chain_school_sub where dob IN ('$date[0]','$date[1]','$date[2]') LIMIT 0,3 ";
//echo $query;
$query=mysql_query($query)or die(mysql_error());
//End
//For marital status
$query11="SELECT 'teacher_master_list',uid,teacher,mstatus FROM teacher_master_list where mstatus IN ('$date[0]','$date[1]','$date[2]') UNION ALL select 'corporate_sub',uid,persion,mstatus from corporate_sub where mstatus IN ('$date[0]','$date[1]','$date[2]') UNION ALL select 'department_list', id,name,mstatus from department_list where mstatus IN ('$date[0]','$date[1]','$date[2]') UNION ALL select 'chain_school_sub',sid,member,mstatus from chain_school_sub where mstatus IN ('$date[0]','$date[1]','$date[2]') LIMIT 0,3 ";
//echo $query;
$query11=mysql_query($query11)or die(mysql_error());
//End 
?>
<div class="middle-body-two-main">
<div class="middle-body-two">
<div class="mbt-box01">
<div class="mbt-box0201"><div class="mbt-box-text01">Skyland</div></div>
<div class="mbt-box0101">
<div class="mbt-box-heading-text">Birthday
<span class="mbt-box-view-all"><a href="dob.php">View All</a></span>
</div>
<div class="mbt-box-text02">
<ol style="padding:0 0 0 15px; line-height:20px; margin:5px 0 0 0;">
<?php while($data=mysql_fetch_array($query)){
 $uid=$data['uid']; 
 $table=$data['teacher_master_list'];
 if($table=="teacher_master_list"){
    $query1="SELECT name FROM master_list WHERE id='$uid'";
	//echo $query1;
	$query1=mysql_query($query1);
	$data1=mysql_fetch_array($query1);
	$orgname=$data1['name'];
	
 }
 else if($table=="corporate_sub"){
    $query1="SELECT name FROM corporate_list WHERE id='$uid'";
	$query1=mysql_query($query1);
	$data1=mysql_fetch_array($query1);
	$orgname=$data1['name'];
 }
 else if($table=="department_list"){   
	
	$orgname="Department";
 }
 else if($table=="chain_school_sub"){
    $query1="SELECT name FROM chain_school_list WHERE id='$uid'";
	$query1=mysql_query($query1);
	$data1=mysql_fetch_array($query1);
	$orgname=$data1['name'];
 }
 ?>
<li><?php echo $data['teacher']."&nbsp;From&nbsp;".$orgname."&nbsp;(".$data['dob'].")"; ?></li>
<?php }?>
</ol>
</div>



<div class="mbt-box-heading-text">Anniversary
<span class="mbt-box-view-all"><a href="mstatus.php">View All</a></span>
</div>
<div class="mbt-box-text02">
<ol style="padding:0 0 0 15px; line-height:20px;  margin:5px 0 0 0;">
<?php while($data11=mysql_fetch_array($query11)){
 $uid=$data11['uid'];
 $table=$data11['teacher_master_list'];
 if($table=="teacher_master_list"){
    $query1="SELECT name FROM master_list WHERE id='$uid'";
	$query1=mysql_query($query1);
	$data1=mysql_fetch_array($query1);
	$orgname=$data1['name'];
 }
 else if($table=="corporate_sub"){
    $query1="SELECT name FROM corporate_list WHERE id='$uid'";
	$query1=mysql_query($query1);
	$data1=mysql_fetch_array($query1);
	$orgname=$data1['name'];
 }
 else if($table=="department_list"){
   
	$orgname="Department";
 }
 else if($table=="chain_school_sub"){
    $query1="SELECT name FROM chain_school_list WHERE id='$code'";
	$query1=mysql_query($query1);
	$data1=mysql_fetch_array($query1);
	$orgname=$data1['name'];
 }
 ?>
<li><?php echo $data11['teacher']."&nbsp;From&nbsp;".$orgname."&nbsp;(".$data11['mstatus'].")"; ?></li>
<?php }?>
</ol>
</div>
</div>
</div>
<div class="mbt-box02">

<div class="mbt-box0201"><div class="mbt-box-text01">Reports</div></div>

 <?php if($user['user_type'] ==1 || $user['user_type']==2) { ?>
<div class="mbt-box0202">
<div class="report-img-box"><img src="images/login-page-images/report1.jpg" width="60" height="60" /></div>
<div class="report-img-text">
<div class="report-img-heading">School Validate</div>
<div class="report-img-text01"><a href="master_listing_approved.php">School Master</a><br /></div>
</div>

</div>
<?php } ?>
<?php  if($user['user_type']==1 || $user['user_type']==2) { ?>
<div class="mbt-box0202">
<div class="report-img-box"><img src="images/login-page-images/report1.jpg" width="60" height="60" /></div>
<div class="report-img-text">
<div class="report-img-heading">Validate 1</div>
<div class="report-img-text01">
<a href="issue_voucher_listing_validate1.php">Specimen Voucher</a><br />
<a href="commitment_voucher_listing_validate1.php">Commitment Voucher</a><br />
<a href="expense_master_listing_approved1.php">Expense</a><br />
<a href="tour_voucher_listing_approvde1.php">Tour</a><br />
<a href="workshop_listing_approved1.php">Workshop</a></div>
</div>

</div>
<?php } ?>
<?php  if($user['user_type']==1 || $user['user_type']==2) { ?>
<div class="mbt-box0202">
<div class="report-img-box"><img src="images/login-page-images/report1.jpg" width="60" height="60" /></div>
<div class="report-img-text">
<div class="report-img-heading">Validate 2</div>
<div class="report-img-text01">
<a href="issue_voucher_listing_validate2.php">Specimen Voucher</a><br />
<a href="return_voucher_listing_validate2.php">Return Voucher</a><br />
<a href="commitment_voucher_listing_validate2.php" >Commitment Voucher</a><br />
<a href="expense_master_listing_approved2.php">Expense</a><br />
<a href="tour_voucher_listing_approvde2.php">Tour</a><br />
<a href="workshop_listing_approved2.php">Workshop</a></div>
</div>

</div>
<?php } ?>

</div>

</div>
</div>