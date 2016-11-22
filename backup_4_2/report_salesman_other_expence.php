<?php
session_start();
include('header.php');
include('function.php');
$salesman_ids=department_id($userid);
//require_once('config.php');?>
<!-- start content-outer ........................................................................................................................START -->

<?php  
if(isset($_POST['search'])) {
 $search=mysql_real_escape_string($_REQUEST['value']);
 $type=mysql_real_escape_string($_REQUEST['type']); 
 
 $resultsearch=mysql_query("SELECT * FROM school_info_list WHERE $type= '$search' ") or die(mysql_error());
 $searchrow = mysql_fetch_array($resultsearch);
   $searchid = $searchrow[$type];
  
   
    ?>
 
  
  <?php }
else {


if($_REQUEST['submit'])
  {
   //echo '<pre>'; print_r($_REQUEST); die;
   
   $department=$_REQUEST['department'];
   $salesman_id=$_REQUEST['salesman_id'];    
   
   $from=$_REQUEST['from_date'];
   $to=$_REQUEST['to_date'];
   
   
 
   $_SESSION['department']=$department;
   $_SESSION['salesman_id']=$salesman_id;  
   $_SESSION['from']=$from;
   $_SESSION['to']=$to;  
  }
  if($_REQUEST['all'])
    {
	  unset($_SESSION['department']);
	  unset($_SESSION['salesman_id']);	  
	  unset($_SESSION['from']);
	  unset($_SESSION['to']);	
	}

$department=$_SESSION['department'];
$salesman_id=$_SESSION['salesman_id'];
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
			<th valign="top">Department:</th>
			<td><select name="department" id="depart" class="inp-form-select" onchange="return onchangedepartment(this.value);"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department ");
			    while($value=mysql_fetch_array($query))
			      {			  
			  ?>			  
			     <option <?php if($department==$value['department']) echo 'selected="selected"'; ?> value="<?php echo $value['department']; ?>"><?php  echo $value['department']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td>
			<th valign="top">Salesman name :</th>
			 <td><div id="departmentdiv"><select  class="inp-form-select" name="salesman_id" > 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department_list ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($salesman_id==$value['id']) echo 'selected="selected"'; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
  </div> 
   
        </td>
		</tr>
	<tr>
	 <td></td>
	
     <th valign="top" colspan="3"><input type="submit" value="Search"  class="form-finish" name="submit" style="float:left; margin-right:15px;" />
	                  <input type="submit" value="Show All"  class="form-finish" name="all" style=" float:left;" />
					  <input type="button"  onclick="export_excel();" value="Export into Excel"  style="float:left;width:120px; margin-left:15px;"  class="form-finish"   name="Export into Excel" />
	 </th>
	 <td></td>
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
	 <form name="search_export" id="search_export" action="report_salesman_other_expence_export.php" method="post">
	 <input type="hidden" name="from_date_ept" id="from_date_ept" class="search_textbox" value="<?php echo $from; ?>"/>
	 <input type="hidden" name="to_date_ept" id="to_date_ept" class="search_textbox" value="<?php echo $to; ?>"/>
	 <input type="hidden" name="department_ept" id="department_ept" class="search_textbox" value="<?php echo $department; ?>"/>
	 <input type="hidden" name="salesman_id_ept" id="salesman_id_ept" class="search_textbox" value="<?php echo $salesman_id; ?>"/>
	 <input type="hidden" name="search2_ept" id="search2_ept" class="search_textbox" value="<?php if(isset($_GET['page'])){echo $_GET['page'];}else {echo "0";} ?>"/>
	 
	   </form>	

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Expence Report</h1>
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
				   <th class="table-header-repeat line-left"><a>Date </a></th>
				   <th class="table-header-repeat line-left"><a>From</a></th>
				   <th class="table-header-repeat line-left" ><a>To</a></th>
				   
				   <th class="table-header-repeat line-left"><a>Advance </a></th>
				   <th class="table-header-repeat line-left"><a>All Transport</a></th>
				   <th class="table-header-repeat line-left" ><a>DA</a></th>
				   
				   <th class="table-header-repeat line-left"><a>Fooding </a></th>
				   <th class="table-header-repeat line-left"><a>Boarding/Loading</a></th>
				   <th class="table-header-repeat line-left" ><a>Telephone</a></th>
				   
				   <th class="table-header-repeat line-left"><a>Stationery </a></th>
				   <th class="table-header-repeat line-left"><a>Xerox</a></th>
				   <th class="table-header-repeat line-left" ><a>Courier Charges</a></th>
				   
				   <th class="table-header-repeat line-left"><a>Internet Charges </a></th>
				   <th class="table-header-repeat line-left"><a>Paper Work</a></th>
				   <th class="table-header-repeat line-left" ><a>Leave</a></th>
				   
				   <th class="table-header-repeat line-left"><a>Buulty charge </a></th>
				   <th class="table-header-repeat line-left"><a>Others</a></th>
				   <th class="table-header-repeat line-left" ><a>Total</a></th>				   
				   <th class="table-header-repeat line-left"><a>Remarks </a></th>
				                       
				</tr>				
                </thead>
                <tbody>
                <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="expense";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
    if($user <=4)
	{ 
    	if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
    	   $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE status=2 AND report_date BETWEEN '$from' AND '$to' AND executive_id='$salesman_id'";
    	else
    	  $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE status=2";
    }
    else
    {
        if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
    	   $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE status=2 AND report_date BETWEEN '$from' AND '$to' AND executive_id='$salesman_id' AND `executive_id` IN ($salesman_ids)";
    	else
    	  $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE status=2 AND `executive_id` IN ($salesman_ids)";
                  
                
    }
                
	
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "report_salesman_ohter_expence.php"; 	//your file name  (the name of this file)
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
    	 if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
    	  $sql = "SELECT * FROM $tbl_name WHERE status=2 AND report_date BETWEEN '$from' AND '$to' AND executive_id='$salesman_id' ORDER BY id desc LIMIT $start, $limit";
    	else
    	   $sql = "SELECT * FROM $tbl_name WHERE status=2 ORDER BY id desc LIMIT $start, $limit";    
     
	}
	else
	{
    	 if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
    	  $sql = "SELECT * FROM $tbl_name WHERE status=2 AND report_date BETWEEN '$from' AND '$to' AND executive_id='$salesman_id' AND `executive_id` IN ($salesman_ids) ORDER BY id desc LIMIT $start, $limit";
    	else
    	   $sql = "SELECT * FROM $tbl_name WHERE status=2 AND `executive_id` IN ($salesman_ids) ORDER BY id desc LIMIT $start, $limit";     
     
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
					$ag_id=$row['id'];
					$amount=0;
					
					$amount=$row['source'];
					$amount+=$row['destination'];
					$amount+=$row['advance'];
					$amount+=$row['total_amount'];
					$amount+=$row['transport_all_details'];
					$amount+=$row['da'];
					$amount+=$row['fooding'];
				    $amount+=$row['boarding'];
					$amount+=$row['tel'];
					$amount+=$row['stationary'];
					$amount+=$row['xerox'];
					$amount+=$row['courier'];
					$amount+=$row['internet'];
					$amount+=$row['paper'];
					$amount+=$row['buulty'];
                    $amount+=$row['others'];
				  ?>
				    <td><?php echo $count; ?></td>
					<td><?php echo substr($row['report_date'],0,10); ?></td>
					<td><?php echo $row['source']; ?></td>
					<td><?php echo $row['destination']; ?></td>
					<td><?php echo $row['advance']; ?></td>
					<td><?php echo $row['transport_all_details']; ?></td>
					<td><?php echo $row['da']; ?></td>
					<td><?php echo $row['fooding']; ?></td>
					<td><?php echo $row['boarding']; ?></td>
					<td><?php echo $row['tel']; ?></td>
					<td><?php echo $row['stationary']; ?></td>
					<td><?php echo $row['xerox']; ?></td>
					<td><?php echo $row['courier']; ?></td>
					<td><?php echo $row['internet']; ?></td>
					<td><?php echo $row['paper']; ?></td>
					<td><?php echo $row['leaves']; ?></td>
					<td><?php echo $row['buulty']; ?></td>
					<td><?php echo $row['others']; ?></td>
					<td><?php echo $amount; ?></td>
					<td><?php echo $row['remarks']; ?></td>
					
					
					
					
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

<?php } ?>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<?php include('footer.php');?>