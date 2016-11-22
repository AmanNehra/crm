<?php
//session_start();
include('header.php');
include('function.php');
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
   $state=$_REQUEST['state'];
   $district=$_REQUEST['district'];
   $city=$_REQUEST['city'];
   $department=$_REQUEST['department'];
   $salesman_id=$_REQUEST['salesman_id'];    
   //for change date formate
   $from=$_REQUEST['from_date'];
   $to=$_REQUEST['to_date'];
   
   $_SESSION['state']=$state;
   $_SESSION['district']=$district;
   $_SESSION['city']=$city;
   $_SESSION['department']=$department;
   $_SESSION['salesman_id']=$salesman_id;
   $_SESSION['from_date']=$from_date;
   $_SESSION['to_date']=$to_date;
   $_SESSION['from']=$from;
   $_SESSION['to']=$to;  
  }
  if($_REQUEST['all'])
    {
	  unset($_SESSION['state']);
	  unset($_SESSION['district']);
	  unset($_SESSION['city']);
	  unset($_SESSION['department']);
	  unset($_SESSION['salesman_id']);
	  unset($_SESSION['from_date']);
	  unset($_SESSION['to_date']);
	  unset($_SESSION['from']);
	  unset($_SESSION['to']);	
	}
$state=$_SESSION['state'];
$district=$_SESSION['district'];
$city=$_SESSION['city'];
$department=$_SESSION['department'];
$salesman_id=$_SESSION['salesman_id'];
$from_date=$_SESSION['from_date'];
$to_date=$_SESSION['to_date'];
$from=$_SESSION['from'];
$to=$_SESSION['to'];
?>

<div id="content-outer">
<!-- start content -->
<div id="content">
 <form method="post">   
	 <div>
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
	
	 <tr>
   <th valign="top">From Date:</th>
			<td>
            <input type="text" class="inp-form" name="from_date" id="datepicker" readonly="readonly" value="<?php echo $from_date;?>"/>
            </td>
   <th valign="top">To Date:</th>
			<td>
            <input type="text" class="inp-form" name="to_date" id="datepicker1" value="<?php echo $to_date;?>"/>            </td>
         
            
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
			     <option <?php if($department==$value['department']) echo 'selected="selected"';  ?> value="<?php echo $value['department']; ?>"><?php  echo $value['department']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td>
			<th valign="top">Salesman name :</th>
			 <td><div id="departmentdiv"><select  class="inp-form-select"  name="salesman_id"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department_list ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($salesman_id==$value['id']) echo 'selected="selected"';  ?>  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
  </div> 
   
        </td>
		</tr>
	<tr>
	  <th>State:</th>
        <td>
		<div id="state">
		<select name="state" onchange="return show_district(this.value)"  class="inp-form-select" > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT distinct state FROM location_maste_info_list order by state");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($state==$value['state']) echo 'selected="selected"';  ?> value="<?php echo $value['state']; ?>"><?php echo $value['state']; ?></option>
			  <?php 
			     }
			  ?>
  </select>   
   </div>
   </td>
     <th>District:</th>
					<td>
					<div id="district">
					<select name="district" onchange="return show_city2(this.value)" class="inp-form-select" > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT distinct district FROM location_maste_info_list order by district");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($district==$value['district']) echo 'selected="selected"';  ?> value="<?php echo $value['district']; ?>"><?php echo $value['district']; ?></option>
			  <?php 
			     }
			  ?>
  </select>
  </div>
  </td>
	</tr>
	<tr>
	 <th>City:</th>
	 <td>
	 <div id="city">
	 <select name="city" class="inp-form-select"  > 
			<option value="" selected="selected"> Plz Select</option>
      <?php			    
			    $query=mysql_query("SELECT distinct city FROM location_maste_info_list order by city");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($city==$value['city']) echo 'selected="selected"';  ?> value="<?php echo $value['city']; ?>"><?php echo $value['city']; ?></option>
			  <?php 
			     }
			  ?>
  </select>
  </div>
  </td>
  <td>
      </td>
 <td>
      </td>
	
	</tr> 
	<tr>
	 <td>
      </td>

	 <th colspan="3" valign="top"><input type="submit" value="Search"  class="form-finish" name="submit" style="float:left; margin-right:15px;" />
	                  <input type="submit" value="Show All"  class="form-finish" name="all" style=" float:left;" />
					<input type="button"  onclick="export_excel();" value="Export into Excel" class="form-finish"  style=" width:150px;float:left; margin-right:15px;"  name="Export into Excel" />
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
	 <form name="search_export" id="search_export" action="report_salesman_station_wise_export.php" method="post">
	 <input type="hidden" name="state_ept" id="state_ept" class="search_textbox" value="<?php echo $state; ?>"/>
	 <input type="hidden" name="district_ept" id="district_ept" class="search_textbox" value="<?php echo $district; ?>"/>
	 <input type="hidden" name="city_ept" id="city_ept" class="search_textbox" value="<?php echo $city; ?>"/>
	 <input type="hidden" name="department_ept" id="department_ept" class="search_textbox" value="<?php echo $department; ?>"/>
	 <input type="hidden" name="salesman_id_ept" id="salesman_id_ept" class="search_textbox" value="<?php echo $salesman_id; ?>"/>
	 <input type="hidden" name="from_date_ept" id="from_date_ept" class="search_textbox" value="<?php echo $from_date; ?>"/>
	 <input type="hidden" name="to_date_ept" id="to_date_ept" class="search_textbox" value="<?php echo $to_date; ?>"/>
	  </form>

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Salesman Stationwise Stock Summary Report</h1>
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
                    <th class="table-header-repeat line-left" rowspan="2"><a>S. No.</a>	</th>
                   <!-- <th class="table-header-repeat line-left"><a>Profile Image</a></th>-->
				   <th class="table-header-repeat line-left" rowspan="2"><a>Book Name  </a></th>
				   <th class="table-header-repeat line-left" rowspan="2"><a>Class</a></th>
				   <th class="table-header-repeat line-left" rowspan="2"><a>Price</a></th>
				   <th class="table-header-repeat line-left" rowspan="2"><a>Salesman Stock</a></th>
                   <th class="table-header-repeat line-left"  colspan="2"   style="border-bottom: 1px solid rgb(204, 204, 204); text-align: center;border: 1px solid #ccc;"><a>Given</a></th> 	  
                     <th class="table-header-repeat line-left"  colspan="4"   style="border-bottom: 1px solid rgb(204, 204, 204); text-align: center;border: 1px solid #ccc;"><a>Direct Issue</a></th>
                   
                   <th class="table-header-repeat line-left" rowspan="2"><a>Balance</a></th>				  
				   <th class="table-header-repeat line-left" rowspan="2"><a>Amount</a></th>		
				</tr>
				<tr>
				  <th class="table-header-repeat line-left"><a>School</a></th> 
				  <th class="table-header-repeat line-left"><a>Contact</a></th>			
					
					<th class="table-header-repeat line-left"><a>School</a></th> 
				  <th class="table-header-repeat line-left"><a>Contcat</a></th> 
				  <th class="table-header-repeat line-left"><a>Teacher Copy</a></th>
				  
				  <th class="table-header-repeat line-left"><a>Return</a></th> 				  
				</tr>
                </thead>
                <tbody>
                <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="item_master_list";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	 
	  $query = "SELECT COUNT(*) as num FROM $tbl_name";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "report_salesman_station_wise.php"; 	//your file name  (the name of this file)
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
	   $sql = "SELECT * FROM $tbl_name ORDER BY book_alias LIMIT $start, $limit";
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
	{
//print_r($row);
		$count++;		
if ($i % 2 == 0) {
  echo "<tr>";
} else {
  echo "<tr class='alternate-row'>";
}?>
				

					<!--<td><input  type="checkbox"/></td>-->
                  <?php  
					$ag_id=$row['id'];
								
					$school_given_qty=0;
					$contact_given_qty=0;	
					$salesman_qty=0;
					$teacher_copy_qty=0;
					$contact_qty=0;				  
					$school_qty=0;
					$return_qty=0;
					$company_stock=0;
					$amount=0;
					$price=0;	

					//For issue Items
				  if( $_SESSION['state']!="" && $_SESSION['district']!="" && $_SESSION['city']!=""&& isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) ){
				      $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND city='$city' AND district='$district' AND state='$state' ") or die(mysql_error());
				 }
				  else if($_SESSION['state']!="" && $_SESSION['district']!="" && isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
				  {
				      $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND district='$district' AND state='$state' ") or die(mysql_error());
				}
				 else if($_SESSION['state']!="" && isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
				 {
				     $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'  AND state='$state' ") or die(mysql_error());
				 }

				 else if( isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
				 {
				     $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2 AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'  ") or die(mysql_error());
				 }
				  else
				  {
				     $query1=mysql_query("SELECT * FROM issue_voucher WHERE status=2") or die(mysql_error());
				 }
					   
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];
					 
					 $corporate_name=$data1['corporate_name'];
					 $teachercopy=$data1['teachercopy'];
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND book_id='$ag_id' AND relate='1'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 //for price of item from "all voucher" Table
					 if($data2['price']!="")
					    $price=$data2['price'];
				    //End
					 if($teachercopy=="YES")
					   $teacher_copy_qty+=$data2['qty'];
					 
					 else if($corporate_name=="SCHOOL")
					    $school_qty+=$data2['qty'];
						
					else if($corporate_name=="CORPORATE" || $corporate_name=="CHAIN OF SCHOOL" )
					    $contact_qty+=$data2['qty'];
					else
					   $salesman_qty+=$data2['qty'];
					   
				  }
				  //End Issue


				   //For return Items
				  if( isset($_SESSION['state']) && isset($_SESSION['district']) && isset($_SESSION['city']) &&  isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) ){	
				  
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE  date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND city='$city' AND district='$district' AND state='$state' ") or die(mysql_error());
					 }
					 else if( isset($_SESSION['state']) && isset($_SESSION['district'])  &&  isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) ){	
				  
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE  date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND district='$district' AND state='$state' ") or die(mysql_error());
					 }

					 else if( isset($_SESSION['state'])  &&  isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) ){	
				  
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE  date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND state='$state'  ") or die(mysql_error());
					 }

					 else if(  isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) ){	
				  
				     $query1=mysql_query("SELECT * FROM return_voucher WHERE  date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' ") or die(mysql_error());
					 }
				  else
				  {
				     $query1=mysql_query("SELECT * FROM return_voucher") or die(mysql_error());
				 }
					   
				  while($data1=mysql_fetch_array($query1)){
				   
				     $row_uid=$data1['id'];				 
					 
				     $query2=mysql_query("SELECT * FROM all_voucher WHERE uid='$row_uid' AND book_id='$ag_id' AND relate='2'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 
					   $return_qty+=$data2['return_qty'];		 
					   
				  }
				  //End Return

					
				  //For sampling record
				  if($_SESSION['state']!="" && $_SESSION['district']!="" && $_SESSION['city']!=""&& isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
				     $query1="SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND city='$city' AND district='$district' AND state='$state'";
					 
				  else if($_SESSION['state']!="" && $_SESSION['district']!="" && isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
				     $query1="SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'AND district='$district' AND state='$state'";
					 
				  else if($_SESSION['state']!="" && isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
				     $query1="SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND state='$state'";
				else if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']) )
				     $query1="SELECT * FROM book_sample WHERE sampling_Date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' ";
				else
				     $query1="SELECT * FROM book_sample";
				 
					$query1=mysql_query($query1) or die(mysql_error());
					

				  while($data1=mysql_fetch_array($query1)){
				  
				   
				     $row_uid=$data1['id'];				 
					 
					 $relate=$data1['relate'];
					
				     $query2=mysql_query("SELECT * FROM book_sample_details WHERE uid='$row_uid' AND book_id='$ag_id'") or die(mysql_error());
					 $data2=mysql_fetch_array($query2);
					 
					if($relate=="SCHOOL" || $relate=="TEACHER" )
					    $school_given_qty+=$data2['qty'];
					else
					   $contact_given_qty+=$data2['qty'];	

					/*if($data2['price']!="")
					    $price=$data2['price'];
				    //End
					if($teachercopy=="YES")
					   $teacher_copy_qty+=$data2['qty'];
					else if($relate=="SCHOOL")
					    $school_qty+=$data2['qty'];
					else if($relate=="CORPORATE" || $relate=="CHAIN OF SCHOOL" )
					    $contact_qty+=$data2['qty'];
					
					   $salesman_qty+=$data2['qty'];*/
					   
				  }
				  	/*$company_stock=($school_given_qty+$contact_given_qty+$return_qty);
					
					
					$amount=$company_stock*$row['price'];*/
				  
				  
				  //End sampling	

				   //for company stock and amount
				 				  				  
					$company_stock=$salesman_qty-($school_given_qty+$contact_given_qty+$return_qty);
					
					
					$amount=$company_stock*$row['price'];
				  
				  //			  

				  ?>
				    <td><?php echo $count; ?></td>
					<td><?php echo $row['item_name']; ?></td>
					<td><?php echo $row['class']; ?></td>
					<td><?php echo $price; ?></td>
                    <td><?php echo $salesman_qty; ?></td>					
                    <td><?php echo $school_given_qty;  ?></td>
					<td style="width:50px;"><?php echo $contact_given_qty; ?></td>					
					<td><?php echo $school_qty; ?></td>
					<td><?php echo $contact_qty; ?></td>
					<td><?php echo $teacher_copy_qty; ?></td>
					<td><?php echo $return_qty; ?></td> 	
					<td><?php echo $company_stock;  ?></td>
					<td><?php echo $amount; ?></td>					
					
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