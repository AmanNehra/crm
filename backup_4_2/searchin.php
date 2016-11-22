<?php 
if(!isset($_POST['submit']))
{ header('location:index.php');}
include('header.php');?>
<?php 
require_once('config.php');?>


<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">


	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Search Results</h1>
	</div>
    <a href="customer.php" style="color:#FFFFFF;"><div class="addin">
    	<span>Back</span>
    </div></a>
   
	<!-- end page-heading -->

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
			
			
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <thead>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
                    <th class="table-header-repeat line-left" style="min-width: 90px;"><a href="">First Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Last Name</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Contact ID</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					
					<th class="table-header-repeat line-left"><a href="">Phone</a></th>
                    <th class="table-header-repeat line-left"><a href="">Address</a></th>
                    <th class="table-header-repeat line-left"><a href="">State</a></th>
                    <th class="table-header-repeat line-left"><a href="">Zipcode</a></th>
					<th class="table-header-options line-left"><a href="">Actions</a></th>
				</tr>
                </thead>
                <tbody>
<?php

if(isset($_POST['submit']))
{
$query = $_POST['query'];
$column=$_POST['select'];
$messagees='Please enter customer information.';
if(empty($query)){echo "<script>alert('$messagees')</script>";echo '<script>window.history.back()</script>';}


$min_length = 1;
if(strlen($query) >= $min_length)
{
$query = htmlspecialchars($query);
$query = mysql_real_escape_string($query);
$column= mysql_real_escape_string($column);
//echo $column;

if($column=='firstname')
			{   
       			 $raw_results = mysql_query("SELECT * FROM dan_customers WHERE (`firstname` LIKE '%".$query."%')");
      		 }
	elseif($column=='lastname')
			{
          	 $raw_results = mysql_query("SELECT * FROM dan_customers WHERE (`lastname` LIKE '%".$query."%')");
    		 }
	elseif($column=='email')
			{
        $raw_results = mysql_query("SELECT * FROM dan_customers WHERE (`email` LIKE '%".$query."%')");
         }
	elseif($column=='phone')
			{
        $raw_results = mysql_query("SELECT * FROM dan_customers WHERE (`phone` LIKE '%".$query."%') OR (`alternate` LIKE '%".$query."%') ");
         }
	elseif($column=='contact')
			{
        $raw_results = mysql_query("SELECT * FROM dan_customers WHERE (`contact_id` LIKE '%".$query."%')");
        }
	elseif($column=='order')
			{
			 $raw_results = mysql_query("SELECT * FROM dan_customers JOIN transactions ON dan_customers.id=transactions.cust_id WHERE (transactions.order_no LIKE '%".$query."%')");
			//print_r($raw_results); echo 'hello';
			}	



 $i = 0;
	if(mysql_num_rows($raw_results) > 0)
	{
		while($row = mysql_fetch_array($raw_results))
	{

if ($i % 2 == 0) {
  echo "<tr class='altera'>";
} else {
  echo "<tr class='altera alternate-row'>";
} 
	?>

					<td class="first1" title="Transaction Details"><table class="mutebutton"><tr><td class="hide" style="border:none; border:0px;"></td></tr></table></td>
					<td><?php echo  $row['firstname']; ?></td>
					<td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['contact_id']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['state']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                   
					<td class="options-width">
					 <?php
					 $var=$_SESSION['SESS_id'];
					 $data=mysql_query("SELECT * FROM dan_users where id='$var'") or die(mysql_error);
					 $r = mysql_fetch_array($data);
					 $user=$r['user_type'];
					 //echo $user;
					 
					  if($user==1){?>
					<a href="cust_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="cust_delete.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>" onclick="if(!confirm('Are you sure, you want to delete this user ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
					<a href="javascript:void(0);" title="Note" class="icon-3 info-tooltip" onClick="PopupCenter('note.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>', 'myPop1',800,500);"></a>
					
					<?php }else{?>
                    <a href="cust_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>" title="Edit" class="icon-1 info-tooltip"></a>
					 <a href="javascript:void(0);" title="Note" class="icon-3 info-tooltip" onClick="PopupCenter('note.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>', 'myPop1',800,500);"></a>
					<?php }?>
					</td>
				</tr>
              <!--<div id="head" style="font-size:16px; font-weight:bold; color:#0099CC;">Transaction Details</div>-->
             
                <tr class="prod">
               
                    <!--<td>-->
               <!--      <div id="head" style="font-size:16px; font-weight:bold; color:#0099CC;">Transaction Details</div>-->
                   <!-- <table border="0" width="100%" cellpadding="0" cellspacing="0" id="prod">
                
               <tbody>
                <tr>-->
                <th class="table-header-check"></th>
					<th class="table-header-repeat line-left" style="width:80px;"><a>Order No</a></th>
                    <th class="table-header-repeat line-left"><a>Product Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a>Amount	</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a>Status</a></th>
					<th class="table-header-repeat line-left"><a>Order Date</a></th>
					
                    <th class="table-header-repeat line-left"><a>Payment Mode</a></th>
                    <th class="table-header-repeat line-left"><a>Actions</a></th>
               
               
				</tr>
                <tr class="proddet">
            
                <?php $cust_id= $row['id'];
				 $datas=mysql_query("SELECT * FROM transactions where cust_id='$cust_id'") or die(mysql_error);
					$v= mysql_num_rows($datas);
					if(!empty($v)){
					 $resul = mysql_fetch_array($datas);
                ?>
               		<td></td>
					<td><?php echo  $resul['order_no']; ?></td>
					<td><?php echo $resul['product_name']; ?></td>
                    <td><?php echo $resul['amount']; ?></td>
					<td><?php echo $resul['status']; ?></td>
					<td><?php echo $resul['order_date']; ?></td>
                    
                    <td><?php echo $resul['payment_mode']; ?></td>
                    <td>
					<?php  $dats=$row['sale_register_agent']; if($dats==0){?>
					<a class="toggleii" href="#" style="color:#0066FF; text-decoration:underline; border-right:1px solid; padding-right:4px;">Sale Register</a>	
                    <div class="thissi"><label for="Inbound"> <input type="radio" name="salein" id="Inbound" onclick="if(!confirm('You have selected Inbound sale')){return false;}" value="sale_reg.php?id=<?php echo $cust_id; ?>&type=1" /> Inbound</label><br />
<label for="Outbound"> <input type="radio" name="salein" id="Outbound" onclick="if(!confirm('You have selected Outbound sale')){return false;}" value="sale_reg.php?id=<?php echo $cust_id; ?>&type=2" />Outbound</label></div>
					<?php }else {echo '<span style="border-right:1px solid; padding-right:4px;">Registered</span>';}?>
                  
                     <a href="javascript:void(0);" onClick="PopupCenter('note.php?id=<?php echo base64_encode(convert_uuencode($cust_id));?>', 'myPop1',800,500);" style="text-decoration:underline;">Refund</a>
                    </td>
                    <?php }?>
                </tr>
				
				<!--</tbody>
				</table>
				
				</td>-->
				</tr>
				<?php $i++;}}else{
echo "No results";
}}else{
echo "Minimum length is ".$min_length;


}}?>
				</tbody>
				</table>
				<!--  end product-table................................... --> 
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
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<?php include('footer.php');?>
<script>
$(document).ready(function(){
$('#Inbound,#Outbound' ).removeClass( "ui-helper-hidden-accessible" );

$('span' ).removeClass( "ui-radio ui-radio-state-checked" );

$('.thissi').css('display','none');
$("a.toggleii").click(function () {
    $(".thissi").toggle();
});


});
$(function(){
    $("input[name=salein]").click(function(e) {
        e.preventDefault();
        //window.location = $(this).find('input[type="radio"]:checked').val();
		 window.location = $('input[name=salein]:checked').val(); // get the selected radio box's value
    //alert(selectedValue); // display it
    });
});

</script>