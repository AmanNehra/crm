<?php include('header.php');
require_once('config.php');?>
<!-- start content-outer ........................................................................................................................START -->
<?php if($user=='3'){header('location:index.php');}?>
<div id="content-outer">
<!-- start content -->
<div id="content">
<?php $type=$_GET['type']; ?>

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Invoice Information</h1>
	</div>
    <?php 
	//$sql = mysql_query("select * from dan_users where `id`='$userid'") or die(mysql_error());;
	//$sql=mysql_fetch_array($sql);
	//$user=$sql['user_type'];
	
	//if($user==1){
	
	if($type=='one'){
	?>
  <div class="addin">
    	<span>
        <!-- <a style="color:#FFFFFF;" href="javascript:void(0);" title="Add New Invoice" onClick="PopupCenter('invy.php?type=add', 'myPop1',1000,700);" href="invy.php?type=add">Add New Invoice</a>-->
        <a style="color:#FFFFFF;"  title="Add New Invoice"  href="invy.php?type=add">Add New Invoice</a>
       </span>
    </div><?php }elseif($type=='two'){?>
    
     <div class="addin">
    	<span>
         <!--<a style="color:#FFFFFF;" href="javascript:void(0);" title="Add New Invoice" onClick="PopupCenter('invy_sec.php?type=add', 'myPop1',1000,700);">Add New Invoice</a>-->
         <a style="color:#FFFFFF;"  title="Add New Invoice"  href="invy_sec.php?type=add">Add New Invoice</a>
       </span>
    </div>
    
    <?php }else{?>
     <div class="addin">
    	<span>
        <!-- <a style="color:#FFFFFF;" href="javascript:void(0);" title="Add New Invoice" onClick="PopupCenter('invy_third.php?type=add', 'myPop1',1000,700);">Add New Invoice</a>-->
         <a style="color:#FFFFFF;"  title="Add New Invoice"  href="invy_third.php?type=add">Add New Invoice</a>
       </span>
    </div>
    
    <?php }?>
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
	<?php if($type=='one'){?>	<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				
		
		 
				<!--  start product-table ..................................................................................... -->
				 <form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesorter">
                <thead>
				<tr>
					<!--<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
                    <th class="table-header-repeat line-left"><a>InvoiceID</a> </th>
                    <th class="table-header-repeat line-left"><a>Bill No.</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a>Book No.</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a>Bill Date</a></th>
					<th class="table-header-repeat line-left"><a>M/S</a></th>
					<th class="table-header-repeat line-left"><a>P.O.No.</a></th>
					<th class="table-header-repeat line-left"><a>Carrier</a></th>
                    <th class="table-header-repeat line-left"><a>Party TIN/CST No.</a></th>
                    <th class="table-header-repeat line-left"><a>Total Amount</a></th>
                    
					<th class="table-header-options line-left"><a>Actions</a></th>
				</tr>
                </thead>
                <tbody>
                  <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="meta_table";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where meta_key='invoice-item'";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "customer.php"; 	//your file name  (the name of this file)
	$limit = 10;
	 	if(!isset($_GET['page']) || $_GET['page']==""){

    $page = "1";

}else{

    // If page is set, let's get it
    $page = $_GET['page'];

}	

    // If page is set, let's get it
   // $page = $_GET['page'];
//echo $page;die;
					//how many items to show per page
	//$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name where meta_key='invoice-item' ORDER BY meta_id desc LIMIT $start, $limit";
	$result = mysql_query($sql);
	//print_r($result);die;
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">Previous</a>";
		else
			$pagination.= "<span class=\"disabled\">Previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">Next</a>";
		else
			$pagination.= "<span class=\"disabled\">Next</span>";
		$pagination.= "</div>\n";		
	}

//echo $pagination;die; 

?>

	

                <?php  //$result2=mysql_query("SELECT * FROM meta_table ORDER BY id desc") or die(mysql_error()); 
                $i = 0;
while($row = mysql_fetch_array($result))
		{
if ($i % 2 == 0) {
  echo "<tr>";
} else {
  echo "<tr class='alternate-row'>";
}?>
				

					
                  <?php  
				  $ag_id=$row['invoice_item_id'];
				 $fulldata=unserialize($row['meta_value']);
				  ?>
					<td><?php echo $ag_id; ?></td>
                     <td><?php echo $fulldata['bill_no']; ?></td>
					<td><?php echo $fulldata['book_no']; ?></td>
                    
                    <td><?php echo $fulldata['bill_date']; ?></td>
                   
					<td><?php echo $fulldata['ms']; ?></td>
  
                    
                    <td><?php echo $fulldata['po_no']; ?></td>
					
					<td><?php echo $fulldata['carier']; ?></td>
                   
                    <td><?php echo $fulldata['party_tin']; ?></td>
                    <td><?php echo $fulldata['grand_total']; ?></td>
                    
					<td class="options-width">
               <a class="icon-1 info-tooltip" href="javascript:void(0);" title="Edit" onClick="PopupCenter('invy.php?type=edit&id=<?php echo base64_encode(convert_uuencode($ag_id));?>', 'myPop1',1000,700);"></a>
					<?php /*?><a href="user_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>" title="Edit" class="icon-1 info-tooltip"></a><?php */?>
                   
					<a href="delete.php?type=invy&id=<?php echo base64_encode(convert_uuencode($ag_id));?>" onclick="if(!confirm('Are you sure, you want to delete this entry ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
				
				</td>
				
					
				</tr><?php $i++;}?>
                </tbody>
				</table>
                </form>
			</div>
   		
   		
   
    
    
    		<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td><?php
echo $pagination; 
?>
		</td></tr>
			</table>
			
			
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
        
     <?php } elseif($type=='two'){ ?>   
        
        
        <div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				
		
		 
				<!--  start product-table ..................................................................................... -->
				 <form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesorter">
                <thead>
				<tr>
					<!--<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
                    <th class="table-header-repeat line-left"><a>InvoiceID</a> </th>
                    <th class="table-header-repeat line-left  minwidth-1"><a>To</a></th>
					<th class="table-header-repeat line-left"><a>Order No.</a>	</th>
					<th class="table-header-repeat line-left"><a>Order Date</a></th>
					<th class="table-header-repeat line-left"><a>GR No.</a></th>
					<th class="table-header-repeat line-left"><a>Total Amount</a></th>
					
                    
					<th class="table-header-options line-left"><a>Actions</a></th>
				</tr>
                </thead>
                <tbody>
                  <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="meta_table";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where meta_key='invoice-sec'";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "customer.php"; 	//your file name  (the name of this file)
	$limit = 10;
	 	if(!isset($_GET['page']) || $_GET['page']==""){

    $page = "1";

}else{

    // If page is set, let's get it
    $page = $_GET['page'];

}	

    // If page is set, let's get it
   // $page = $_GET['page'];
//echo $page;die;
					//how many items to show per page
	//$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name where meta_key='invoice-sec' ORDER BY meta_id desc LIMIT $start, $limit";
	$result = mysql_query($sql);
	//print_r($result);die;
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">Previous</a>";
		else
			$pagination.= "<span class=\"disabled\">Previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">Next</a>";
		else
			$pagination.= "<span class=\"disabled\">Next</span>";
		$pagination.= "</div>\n";		
	}

//echo $pagination;die; 

?>

	

                <?php  //$result2=mysql_query("SELECT * FROM meta_table ORDER BY id desc") or die(mysql_error()); 
                $i = 0;
while($row = mysql_fetch_array($result))
		{
if ($i % 2 == 0) {
  echo "<tr>";
} else {
  echo "<tr class='alternate-row'>";
}?>
				

					
                  <?php  
				  $ag_id=$row['invoice_item_id'];
				 $fulldata=unserialize($row['meta_value']);
				  ?>
					<td><?php echo $ag_id; ?></td>
                     <td><?php echo $fulldata['to']; ?></td>
					<td><?php echo $fulldata['order_no']; ?></td>
                   
					<td><?php echo $fulldata['order_date']; ?></td>
                     <td><?php echo $fulldata['gr_no']; ?></td>
  
                    
                    <td><?php echo $fulldata['total'].'.'.$fulldata['paise']; ?></td>
					
					<td class="options-width">
               <a class="icon-1 info-tooltip" href="javascript:void(0);" title="Edit" onClick="PopupCenter('invy_sec.php?type=edit&id=<?php echo base64_encode(convert_uuencode($ag_id));?>', 'myPop1',1000,700);"></a>
					<?php /*?><a href="user_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>" title="Edit" class="icon-1 info-tooltip"></a><?php */?>
                   
					<a href="delete.php?type=invy_sec_del&id=<?php echo base64_encode(convert_uuencode($ag_id));?>" onclick="if(!confirm('Are you sure, you want to delete this entry ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
				
				</td>
				
					
				</tr><?php $i++;}?>
                </tbody>
				</table>
                </form>
	</div>
    		<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td><?php
echo $pagination; 
?>
		</td></tr>
			</table>
			
			
			
			<div class="clear"></div>
		 
		</div>
        <?php }elseif($type=='three'){?>
        
        <div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				
		
		 
				<!--  start product-table ..................................................................................... -->
				 <form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesorter">
                <thead>
				<tr>
					<!--<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
                    <th class="table-header-repeat line-left"><a>InvoiceID</a> </th>
                    <th class="table-header-repeat line-left"><a>Company</a></th>
					<th class="table-header-repeat line-left"><a>Policy No.</a>	</th>
					<th class="table-header-repeat line-left"><a>Truck No.</a></th>
					<th class="table-header-repeat line-left"><a>Driver Name/License</a></th>
					<th class="table-header-repeat line-left"><a>Delivery address</a></th>
					<th class="table-header-repeat line-left"><a>G.R.No.</a></th>
                    <th class="table-header-repeat line-left"><a>Date</a></th>
                     <th class="table-header-repeat line-left"><a>To</a></th>
                       <th class="table-header-repeat line-left"><a>From</a></th>
                    <th class="table-header-repeat line-left"><a>Paid</a></th>
                    
					<th class="table-header-options line-left"><a>Actions</a></th>
				</tr>
                </thead>
                <tbody>
                  <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="meta_table";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where meta_key='invoice-third'";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "customer.php"; 	//your file name  (the name of this file)
	$limit = 10;
	 	if(!isset($_GET['page']) || $_GET['page']==""){

    $page = "1";

}else{

    // If page is set, let's get it
    $page = $_GET['page'];

}	

    // If page is set, let's get it
   // $page = $_GET['page'];
//echo $page;die;
					//how many items to show per page
	//$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name where meta_key='invoice-third' ORDER BY meta_id desc LIMIT $start, $limit";
	$result = mysql_query($sql);
	//print_r($result);die;
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">Previous</a>";
		else
			$pagination.= "<span class=\"disabled\">Previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{

				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">Next</a>";
		else
			$pagination.= "<span class=\"disabled\">Next</span>";
		$pagination.= "</div>\n";		
	}

//echo $pagination;die; 

?>

	

                <?php  //$result2=mysql_query("SELECT * FROM meta_table ORDER BY id desc") or die(mysql_error()); 
                $i = 0;
while($row = mysql_fetch_array($result))
		{
if ($i % 2 == 0) {
  echo "<tr>";
} else {
  echo "<tr class='alternate-row'>";
}?>
				

					
                  <?php  
				  $ag_id=$row['invoice_item_id'];
				 $fulldata=unserialize($row['meta_value']);
				  ?>
					<td><?php echo $ag_id; ?></td>
                     <td><?php echo $fulldata['company']; ?></td>
					<td><?php echo $fulldata['policy']; ?></td>
                    
                    <td><?php echo $fulldata['truck_no']; ?></td>
                   
					<td><?php echo $fulldata['driv_desc']; ?></td>
  
                    
                    <td><?php echo $fulldata['delivery_add']; ?></td>
					
					<td><?php echo $fulldata['gr_no']; ?></td>
                   
                    <td><?php echo $fulldata['gr_date']; ?></td>
                    <td><?php echo $fulldata['to']; ?></td>
                    <td><?php echo $fulldata['from']; ?></td>
                     
                     <td><?php echo $fulldata['paid']; ?></td>
                    
					<td class="options-width">
               <a class="icon-1 info-tooltip" href="javascript:void(0);" title="Edit" onClick="PopupCenter('invy_third.php?type=edit&id=<?php echo base64_encode(convert_uuencode($ag_id));?>', 'myPop1',1000,700);"></a>
					<?php /*?><a href="user_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>" title="Edit" class="icon-1 info-tooltip"></a><?php */?>
                   
					<a href="delete.php?type=invy_third_del&id=<?php echo base64_encode(convert_uuencode($ag_id));?>" onclick="if(!confirm('Are you sure, you want to delete this entry ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
				
				</td>
				
					
				</tr><?php $i++;}?>
                </tbody>
				</table>
                </form>
			</div>
   		
   		
   
    
    
    		<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td><?php
echo $pagination; 
?>
		</td></tr>
			</table>
			
			
			
			<div class="clear"></div>
		 
		</div>
        
        
        
        <?php }?>
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
