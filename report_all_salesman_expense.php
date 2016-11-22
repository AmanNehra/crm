<?php
include('header.php');
include('function.php');
$salesman_id=working_area_by_id($userid);
//require_once('config.php');?>
<!-- start content-outer ........................................................................................................................START -->
<?php 
if($_REQUEST['submit'])
  {
   //echo '<pre>'; print_r($_REQUEST); die;
  
   $from=$_REQUEST['from_date'];
   $to=$_REQUEST['to_date'];
   
   
   $_SESSION['from']=$from;
   $_SESSION['to']=$to;
   
  }
  if($_REQUEST['all'])
    {
	  unset($_SESSION['from']);
	  unset($_SESSION['to']);	 
	}

$from=$_SESSION['from'];
$to=$_SESSION['to'];

?>
<script>
function onchangedepartment(did)
 {
  $.ajax({
  url:"department_result2.php",
  type: "POST",
  data: "department="+did,
  success:function(result){
   $("#departmentdiv").html(result);    
    //alert (result);
  }}); 
 }
</script>
<div id="content-outer">
<!-- start content -->
<div id="content">
 <form method="post">   
	 <div>
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
	
	 <tr>
   <th valign="top">From Date:</th>
			<td>
            <input type="text" class="inp-form" name="from_date" id="datepicker" readonly="readonly" value="<?php echo $from;?>"/>
            </td>
   <th valign="top">To Date:</th>
			<td>
            <input type="text" class="inp-form" name="to_date" id="datepicker1" value="<?php echo $to;?>"/>            </td>
         
            
	</tr>	
	<tr>
	 <td></td>
	
    
     <th valign="top"  colspan="3"><input type="submit" value="Search"  class="form-finish" name="submit" style="float:left; margin-right:15px;" />
	                  <input type="submit" value="Show All"  class="form-finish" name="all" style=" float:left;" />
					  <input type="button"  onclick="export_excel();" value="Export into Excel"  style="float:left;width:120px; margin-left:15px;"  class="form-finish"   name="Export into Excel" />
	 </th>
	
	</tr> 
	</table>	 
	</div>
   </form>
	<script>
	function export_excel()
	{
		document.getElementById("search_export").submit();
	}
	</script>
	 <form name="search_export" id="search_export" action="report_all_salesman_expense_export.php" method="post">
	 
	 <input type="hidden" name="from_date_ept" id="from_date_ept" class="search_textbox" value="<?php echo $from; ?>"/>
	 <input type="hidden" name="to_date_ept" id="to_date_ept" class="search_textbox" value="<?php echo $to; ?>"/>
	</form>
	<!--  start page-heading -->
	<div id="page-heading">
		<h1>All Salesman Expence Report</h1>
	</div>
    <div style="width:100%;">
    
    <?php /*?><div style="width:50%; float:left; padding-left:10%;">
    <form name="search" action="#" method="post">
    <tr> 
    <td><input type="text" name="value" id="search" /></td>
     <td> 
         <select name="type" style="width: 200px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
           		 <option VALUE="Board">Board</option>
                <option VALUE="Category">Category</option>
            	<option VALUE="Customer Category">Customer Category</option>
                <option VALUE="Route No">Route No</option> 
                <option VALUE="Saturday Off">Saturday Off</option>
                <option VALUE="PTM">PTM</option>
                <option VALUE="Submission">Submission</option> 
                <option VALUE="Finalised">Finalised</option> 
        </select>
      </td> 
      <td><input type="submit" value="Search" class="mainsearch"  name="search" /></td>
	</tr>
    </form>
    </div><?php */?>
    
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
			
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesorter">
                <thead>
				<tr>
					<!--<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
                    <th class="table-header-repeat line-left" ><a>S. No.</a>	</th>
                   <!-- <th class="table-header-repeat line-left"><a>Profile Image</a></th>-->
				   <th class="table-header-repeat line-left"><a>Salesman</a></th>
				   <th class="table-header-repeat line-left"><a>Salary @</a></th>
				   <th class="table-header-repeat line-left"><a>Tour Expense @</a></th>				   
				   <th class="table-header-repeat line-left"><a>Gift @</a></th>
				   <th class="table-header-repeat line-left"><a>Workshop @</a></th>
				   <th class="table-header-repeat line-left"><a>Specimen @</a></th>
				   <th class="table-header-repeat line-left" ><a>Sale @</a></th>                    
				</tr>				
                </thead>
                <tbody>
                <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="department_list";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
    if($user <=4)
	{ 
      $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE department='SALES'";      
    }
    else
    {	
	  $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE department='SALES' AND `user` IN ($salesman_id)";
    }
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "report_all_salesman_expense.php"; 	//your file name  (the name of this file)
	$limit = 20;
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
    if($user <=4)
	{ 
	   $sql = "SELECT * FROM $tbl_name WHERE department='SALES' ORDER BY id desc LIMIT $start, $limit";
    }
    else
    {
       $sql = "SELECT * FROM $tbl_name WHERE department='SALES' AND `user` IN ($salesman_id) ORDER BY id desc LIMIT $start, $limit"; 
    }
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
 
	

                <?php  //$result=mysql_query("SELECT * FROM dan_users ORDER BY id desc") or die(mysql_error); 
				
				
                $i = 0;
				$count=number2();//for serial number. Function call from function.php file

while($row = mysql_fetch_array($result))
		{$count++;		
if ($i % 2 == 0) {
  echo "<tr>";
} else {
  echo "<tr class='alternate-row'>";
}?>
				

					<!--<td><input  type="checkbox"/></td>-->
                  <?php  
					$salesman_id=$row['id'];
					$salesman_name=$row['name'];				  				  
					$salesman_qty=0;
					$teacher_copy_qty=0;
					
					$return_qty=0;
					
					$school_given_qty=0;
					$contact_given_qty=0;
					
					$company_stock=0;
					$amount=0;
					$price=0;
					$advance=0;
					$gift=0;
					$estimated_cost=0;
					$estimated_rent=0;
					
					$issue_amount=0;
					$return_amount=0;
					$expense=0;	
					
					//For tour advance
					
					if(isset($_SESSION['from']) && isset($_SESSION['to']) )					
					  $query1="SELECT * FROM expense WHERE executive_id='$salesman_id' AND status='2' AND date BETWEEN '$from' AND '$to'";					
					else					
					  $query1="SELECT * FROM expense WHERE executive_id='$salesman_id' AND status='2'";				
					
					$query1=mysql_query($query1) or die(mysql_error());
					while($data1=mysql_fetch_array($query1)){	
							
					$expense+=$data1['advance'];
					$expense+=$data1['total_amount'];
					$expense+=$data1['transport_all_details'];
					$expense+=$data1['da'];
					$expense+=$data1['fooding'];
				    $expense+=$data1['boarding'];
					$expense+=$data1['tel'];
					$expense+=$data1['stationary'];
					$expense+=$data1['xerox'];
					$expense+=$data1['courier'];
					$expense+=$data1['internet'];
					$expense+=$data1['paper'];
					$expense+=$data1['buulty'];
                    $expense+=$data1['others'];								
					}				
					//End
					
					//For gift
					if(isset($_SESSION['from']) && isset($_SESSION['to']) )
					{
					   $query1=mysql_query("SELECT total_discount FROM commitment_voucher WHERE commited_by='$salesman_name' AND status='2' AND date BETWEEN '$from' AND '$to'");
					}
					else
					{
					$query1=mysql_query("SELECT total_discount FROM commitment_voucher WHERE commited_by='$salesman_name' AND status='2'");
					}
					while($data1=mysql_fetch_array($query1)){
					$gift+=$data1['total_discount'];					
					}	
					
					//End
					
					//For workshop
					if(isset($_SESSION['from']) && isset($_SESSION['to']) )
					  {
					  $query1=mysql_query("SELECT estimated_cost,estimated_rent FROM workshop JOIN workshopRent WHERE workshop.executive_id='$salesman_id' AND workshop.status='2' AND workshop.id=workshopRent.uid AND  workshop.date BETWEEN '$from' AND '$to' ");
					  }
					else	
					{				
					$query1=mysql_query("SELECT estimated_cost,estimated_rent FROM workshop JOIN workshopRent WHERE workshop.executive_id='$salesman_id' AND workshop.status='2' AND workshop.id=workshopRent.uid ");
					}
					while($data1=mysql_fetch_array($query1)){
						$estimated_cost+=$data1['estimated_cost'];
						$estimated_rent+=$data1['estimated_rent'];										
					}	
					
					//End
					
					//For issue Items
					if(isset($_SESSION['from']) && isset($_SESSION['to']) )	
					 {
					$query1=mysql_query("SELECT * FROM issue_voucher WHERE salseman_id='$salesman_id' AND status='2' AND date BETWEEN '$from' AND '$to'") or die(mysql_error());	
					 }
					else	
					 {					 	 
				    $query1=mysql_query("SELECT * FROM issue_voucher WHERE salseman_id='$salesman_id' AND status='2'") or die(mysql_error());	
					 }			 
				  while($data1=mysql_fetch_array($query1)){
				     
				     $row_uid=$data1['id'];
					 
					 $corporate_name=$data1['corporate_name'];
					 $teachercopy=$data1['teachercopy'];
					
					 //for price of item from "all voucher" Table
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND salseman_id='$salesman_id' AND relate='1'") or die(mysql_error());
					while($data2=mysql_fetch_array($query2)){
					 
					 if($data2['price']!="")
					    $price=$data2['price'];
				    //End					 
					 if($teachercopy=="YES")
					   $teacher_copy_qty=$data2['qty'];
					else
					   $salesman_qty=$data2['qty'];
					
					 $issue_amount+= ($salesman_qty*$price);  
					}					   
				  }
				  //End Issue
				  
				  //For return Items
				   if(isset($_SESSION['from']) && isset($_SESSION['to']) )
				    {
				   $query1=mysql_query("SELECT * FROM return_voucher WHERE salseman_id='$salesman_id' AND status='2' AND date BETWEEN '$from' AND '$to'") or die(mysql_error()); 
				    }
				   else
				    {
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE salseman_id='$salesman_id' AND status='2'") or die(mysql_error()); 
					 }
					   
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];				 
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND salseman_id='$salesman_id' AND relate='2'") or die(mysql_error());
					 while($data2=mysql_fetch_array($query2)){
					   
					    if($data2['price']!="")
					    $return_price=$data2['price'];
						
					   $return_qty=$data2['return_qty'];
					   
					   $return_amount+=($return_price*$return_qty);		 
					 }  
				  }
				  //End Return  
				  
				  
				  //for company stock and amount			
					
					$amount=$issue_amount-$return_amount;
				  
				  //

				  ?>
				    <td><?php echo $count; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td>BG</td>
					<td><?php echo $expense; ?></td>
					<td><?php echo $gift; ?></td>
					<td><?php echo $estimated_cost+$estimated_rent; ?></td>
					<td><?php echo $amount; ?></td>
					<td>BG</td>
					
				<?php //}?>
					
				</tr><?php $i++;
				}?>
				<td height="2"></tbody>
				</table>
				<!--  end product-table................................... --> 
				<input type="button" name="print" value="Print" onclick="printout();" />
				</form>
			</div>
			<script>
			function printout(){
			window.print();
			}
			</script>
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