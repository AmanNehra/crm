<?php  include('header.php');
require_once('config.php');?>
<!-- start content-outer ........................................................................................................................START -->
<?php
//$types = convert_uudecode(base64_decode($_GET['type']));
//$types=$_GET['type'];
//if($types!='search'){header('location:index.php');}
 ?>
<div id="content-outer">
<!-- start content -->
<div id="content">
 
	<!--  start page-heading -->
	<div id="page-heading">
		<h1><a style="text-decoration:underline;">Attendance Report</a></h1>
	</div>
  <div>  
    
    <form id="form1" name="form1" method="post" action="atten_search.php" style="margin-bottom:10px; margin-left:35%;">
    <div style="margin-bottom:5px;">*Please select a date.</div>
    <div style="float:left;">
<label for="from">From</label>
<input name="from" type="text" id="from" size="10" class="date" />

</div>
<div style="float:left; padding-right:5px;">
<label for="to">to</label>
<input name="to" type="text" id="to" size="10" class="date"/>
 </div>
 <?php if($user==1){ ?>
 <div style="float:left; padding-right:5px;">

 <select id="sele" name="selu">sale_register_agent
 
			<option value="all">All</option>
            <?php $sqli = mysql_query("SELECT * FROM dan_users where user_type='2' ORDER BY id asc");
	while($resulti = mysql_fetch_array($sqli)){ ?> 
			<option value="<?php echo $resulti['id']; ?>"><?php echo $resulti['user_name']; ?></option>
			  <?php }?>
		</select> 
        
 </div><?php }?>
<input type="submit" name="submit" id="button" value="Filter" />

  <a href="atten_search.php" style="text-decoration:underline;"> 
  Reset</a>
</form>
 
  <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
 
  <form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesort">
                <thead>
				<tr>
					
                    <th class="table-header-repeat line-left" style="width: 95px;"><a>S. No.</a></th>
					<th class="table-header-repeat line-left"><a>Date</a>	</th>
					
					<th class="table-header-repeat line-left"><a>Time</a></th>
                    <th class="table-header-repeat line-left  minwidth-1"><a>Explanation</a></th>
                   
                   
				</tr>
                </thead>
                <tbody>
                <?php
if(isset($_POST['submit'])) {
//echo $_POST["from"];die;
$from=mysql_real_escape_string($_POST["from"]);
$to=mysql_real_escape_string($_POST["to"]);
$user_report=mysql_real_escape_string($_POST["selu"]);
//echo $from; die;
$id=$_SESSION['SESS_id'];
$messagees='Please enter dates to filter Attendance Report.';
if(empty($from)&&empty($to)){echo "<script>alert('$messagees')</script>";echo '<script>window.history.back()</script>';}
if($user==1){

if($user_report=='all'){
if ($_POST["from"]<>'' and $_POST["to"]<>'') {
	//$sql = "SELECT * FROM dan_customers WHERE sale_registered_date BETWEEN '$from' AND '$to'";
		$sql = "SELECT * FROM attendance WHERE date(date_time_at) >='$from' AND date(date_time_at) <='$to'";

} else if ($_POST["from"]<>'') {
	$sql = "SELECT * FROM attendance WHERE date(date_time_at) >= '$from'";
} else if ($_POST["to"]<>'') {
	$sql = "SELECT * FROM attendance WHERE date(date_time_at) <= '$to'";
}
}else{
if ($_POST["from"]<>'' and $_POST["to"]<>'') {
	//$sql = "SELECT * FROM dan_customers WHERE sale_registered_date BETWEEN '$from' AND '$to'";
		$sql = "SELECT * FROM attendance WHERE emp_id='$user_report' AND date(date_time_at) >='$from' AND date(date_time_at) <='$to'";

} else if ($_POST["from"]<>'') {
	$sql = "SELECT * FROM attendance WHERE emp_id='$user_report' AND date(date_time_at) >= '$from'";
} else if ($_POST["to"]<>'') {
	$sql = "SELECT * FROM attendance WHERE emp_id='$user_report' AND date(date_time_at) <= '$to'";
}


}

}else{

if ($_POST["from"]<>'' and $_POST["to"]<>'') {
	//$sql = "SELECT * FROM dan_customers WHERE sale_registered_date BETWEEN '$from' AND '$to'";
		$sql = "SELECT * FROM attendance WHERE emp_id='$id' AND date(date_time_at) >='$from' AND date(date_time_at) <='$to'";

} else if ($_POST["from"]<>'') {
	$sql = "SELECT * FROM attendance WHERE emp_id='$id' AND date(date_time_at) >= '$from'";
} else if ($_POST["to"]<>'') {
	$sql = "SELECT * FROM attendance WHERE emp_id='$id' AND date(date_time_at) <= '$to'";
}}

$sql_result = mysql_query($sql) or die ('request "Could not execute SQL query" '.$sql);
if (mysql_num_rows($sql_result)>0) {
//echo 'hello';die;
 $i = 0;$count = 0;
	while ($row = mysql_fetch_array($sql_result)) {$count++;
	
	if ($i % 2 == 0) {
  echo "<tr>";
} else {
  echo "<tr class='alternate-row'>";
}

 $datetim = $row['date_time_at'];
				//echo $datetim;die;
				$new_time = explode(" ",$datetim);
$get_date = $new_time[0];
$get_time = $new_time[1];
 $date = new DateTime($get_date);
 $explanation= $row['explanation'];
if($explanation==''){$explanation='No Explanation';};
?>
  <td><?php echo $count; ?></td>
    <td><?php echo $date->format('d-m-Y'); ?></td>
	<td><?php echo $get_time; ?></td>
    <td><?php echo $explanation; ?></td>
    
    </tr><?php $i++;}
    } }else {?>
<tr><td colspan="5">No results found.</td>
<?php }?>
 </tbody>
				</table>
                </form>
 </div>
 
 <div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>

 
</div>
	
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<div style="margin-top:18%"></div>

<?php include('footer.php');?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( ".date" ).datepicker({dateFormat: "yy-mm-dd"});
  });
  </script>
  <style>.ui-datepicker{font-size:11px;}</style>