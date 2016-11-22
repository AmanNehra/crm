<?php include('header.php');
//require_once('config.php');?>
<!-- start content-outer ........................................................................................................................START -->
<?php if($user=='3'){header('location:index.php');}?>
<div id="content-outer">
<!-- start content -->
<div id="content">


	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Previous Attendance Listing</h1>
	</div>
      <div class="addin">
    	<span><a href="atten_search.php?type=<?php $roe='search'; echo base64_encode(convert_uuencode($roe));?>" style="color:#FFFFFF;">Search Attendance</a></span>
    </div>
   
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
			
		 <?php
		  if($user=='1'){ $result=mysql_query("SELECT * FROM attendance ORDER BY id desc LIMIT 30") or die(mysql_error()); }else{
			  $result=mysql_query("SELECT * FROM attendance where emp_id='$userid' ORDER BY id desc LIMIT 30") or die(mysql_error()); }
		  ?>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesorter">
                <thead>
				<tr>
					<!--<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
                    <th class="table-header-repeat line-left" style="width: 95px;"><a>S. No.</a>	</th>
                    <?php if($user=='1'){ ?>
                     <th class="table-header-repeat line-left "><a>Employee</a></th><?php }?>
               
                    <th class="table-header-repeat line-left "><a>Date</a></th>
					<th class="table-header-repeat line-left"><a>Time</a>	</th>
                   
					<th class="table-header-repeat line-left minwidth-1"><a>Explanation</a></th>
                 
					<th class="table-header-options line-left" style="border-right:1px solid;padding-left: 10px;">Options</th>
                  
				</tr>
                </thead>
                <tbody>
              <?php  
			 
                $i = 0;
				$count = 0;
while($row = mysql_fetch_array($result))
		{$count++;
if ($i % 2 == 0) {
  echo "<tr>";
} else {
  echo "<tr class='alternate-row'>";
}  
				  $ag_id=$row['emp_id'];
				   $resu=mysql_query("SELECT * FROM dan_users where id='$ag_id'") or die(mysql_error());
				  $rowss= mysql_fetch_array($resu);
				  $datetim = $row['date_time_at'];
					
				$new_time = explode(" ",$datetim);
$get_date = $new_time[0];
$get_time = $new_time[1];
 $date = new DateTime($get_date);
 $explanation= $row['explanation'];
if($explanation==''){$explanation='No Explanation';};
				
				  ?>
					<td><?php echo $count; ?></td>
                    <?php if($user=='1'){?>
                    <td><?php echo $rowss['user_name']; ?></td>
                    <?php }?>
                     <td><?php echo $date->format('d-m-Y'); ?></td>
					<td><?php echo $get_time; ?></td>
                   
                    <td><?php echo $explanation; ?></td>
                   
					<td class="options-width" style="width: 210px;">
                     <?php if($user==1){?> 
                   
					<?php /*?><a href="user_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>" title="Edit" class="icon-1 info-tooltip"></a><?php */?>
                   
					<a href="delete.php?type=att&id=<?php echo base64_encode(convert_uuencode($row['id']));?>" onclick="if(!confirm('Are you sure, you want to delete this user ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a><?php }else{echo 'No options available.';}?>
				
				</td>
				<?php //}?>
					
				</tr><?php $i++;
				}?>
				</tbody>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<!--<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>-->
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td><?php
echo $pagination; 
?>
				</td>
			
			</tr>
			</table>
			<!--  end paging................ -->
			
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