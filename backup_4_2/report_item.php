<?php
session_start();
include('header.php');
include('function.php');
//require_once('config.php');?>
<!-- start content-outer ........................................................................................................................START -->

<?php  
if(isset($_POST['abcsearch'])) {   
    ?>
 
  
  <?php }
else {

if(isset($_POST['search'])) {
 //echo '<pre>'; print_r($_REQUEST); die;
 $search1=mysql_real_escape_string($_REQUEST['search1']);
 $search2=mysql_real_escape_string($_REQUEST['search2']);
 $searchby1=mysql_real_escape_string($_REQUEST['searchby1']);
 $searchby2=mysql_real_escape_string($_REQUEST['searchby2']);
 
 $_SESSION['search1']=$search1;
 $_SESSION['search2']=$search2;
 $_SESSION['searchby1']=$searchby1;
 $_SESSION['searchby2']=$searchby2;
 }
if($_REQUEST['Showall']){

 unset($_SESSION['search1']);
 unset($_SESSION['search2']);
 unset($_SESSION['searchby1']);
 unset($_SESSION['searchby2']);
}
 $search1=$_SESSION['search1'];
 $search2=$_SESSION['search2'];
 $searchby1=$_SESSION['searchby1'];
 $searchby2=$_SESSION['searchby2'];

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

  
	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Item Report</h1>
	</div>
	
    <div style="width:100%;">
      
    <form name="search" action="#" method="post">
    <div style="width:90%; float:left; padding-left:10%;">    
    <tr>
	<td> 
         <select name="searchby1" class="search_by" >
		        <option value="" selected="selected">Plz Select</option> 			
				<option <?php if($searchby1=="item_name") echo 'selected="selected"';?>VALUE="item_name">Item Name</option>	
				<option <?php if($searchby1=="class") echo 'selected="selected"';?>VALUE="class">Class</option>
				
				<option <?php if($searchby1=="price") echo 'selected="selected"';?>VALUE="price">Price</option>						
				<option <?php if($searchby1=="series") echo 'selected="selected"';?>VALUE="series">Series</option>
				<option <?php if($searchby1=="book_alias") echo 'selected="selected"';?>VALUE="book_alias">Book Alias</option>					
        </select>
      </td> 
    <td><input type="text" name="search1" class="search_textbox" value="<?php echo $search1; ?>"/></td>
	<td> 
         <select name="searchby2" class="search_by">
		        <option value="" selected="selected">Plz Select</option> 			
				<option <?php if($searchby1=="item_name") echo 'selected="selected"';?>VALUE="item_name">Item Name</option>	
				<option <?php if($searchby1=="class") echo 'selected="selected"';?>VALUE="class">Class</option>
				
				<option <?php if($searchby1=="price") echo 'selected="selected"';?>VALUE="price">Price</option>						
				<option <?php if($searchby1=="series") echo 'selected="selected"';?>VALUE="series">Series</option>
				<option <?php if($searchby1=="book_alias") echo 'selected="selected"';?>VALUE="book_alias">Book Alias</option>					          
        </select>
      </td>
     
	  <td><input type="text" name="search2" class="search_textbox" value="<?php echo $search2; ?>"/></td>      
     
      <td><input type="submit" value="Search" class="mainsearch"  name="search" /></td>
	  <td><input type="submit" value="Show All" class="mainsearch"  name="Showall" /></td>
	    <td><input type="button"  onclick="export_excel();" value="Export into Excel" class="mainsearch"  name="Export into Excel" /></td>
	</tr>
    
    </div>
    </form>
	<script>
	function export_excel()
	{
		document.getElementById("search_export").submit();
	}
	</script>
	 <form name="search_export" id="search_export" action="report_item_export.php" method="post">
	 <input type="hidden" name="searchby1_ept" id="searchby1_ept" class="search_textbox" value="<?php echo $searchby1; ?>"/>
	 <input type="hidden" name="search1_ept" id="search1_ept" class="search_textbox" value="<?php echo $search1; ?>"/>
	 <input type="hidden" name="searchby2_ept" id="searchby2_ept" class="search_textbox" value="<?php echo $searchby2; ?>"/>
	 <input type="hidden" name="search2_ept" id="search2_ept" class="search_textbox" value="<?php echo $search2; ?>"/>
	 <input type="hidden" name="search2_ept" id="search2_ept" class="search_textbox" value="<?php if(isset($_GET['page'])){echo $_GET['page'];}else {echo "0";} ?>"/>
	 
	   </form>
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
				   <th class="table-header-repeat line-left" ><a>Item Name</a></th>
				   <th class="table-header-repeat line-left" ><a>Subject</a></th>
				   <th class="table-header-repeat line-left" ><a>Class</a></th>
				    <th class="table-header-repeat line-left" ><a>Price</a></th>
					<th class="table-header-repeat line-left" ><a>Series</a></th>
				    <th class="table-header-repeat line-left" ><a>Book Alias</a></th>
				   <th class="table-header-repeat line-left" ><a>ISBN</a></th>
				   <th class="table-header-repeat line-left" ><a>Discount</a></th>
				    <th class="table-header-repeat line-left" ><a>Author</a></th>
				   <th class="table-header-repeat line-left" ><a>Remarks</a></th>
				   <th class="table-header-repeat line-left" ><a>Date</a></th>				    				   
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
	  if($searchby1!="" && $search1!="" && $searchby2!="" && $search2!="")
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') AND ($searchby2 LIKE '%$search2%')";	
	else if($searchby1!="" && $search1!="")
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%')";	
	else	
	  $query = "SELECT COUNT(*) as num FROM $tbl_name";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "report_item.php"; 	//your file name  (the name of this file)
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
	    if($searchby1!="" && $search1!="" &&  $searchby2!="" && $search2!="")
	$sql = "SELECT * FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') AND ($searchby2 LIKE '%$search2%') ORDER BY book_alias  LIMIT $start, $limit";
	else if($searchby1!="" && $search1!="")
	$sql = "SELECT * FROM $tbl_name WHERE ($searchby1 LIKE '%$search1%') ORDER BY book_alias  LIMIT $start, $limit";
	else
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
		{$count++;		
if ($i % 2 == 0) {
  echo "<tr>";
} else {
  echo "<tr class='alternate-row'>";
}?>
				

					<!--<td><input  type="checkbox"/></td>-->
                  <?php  
				    $school="";
					$school_visit="";
					
					$teacher="";
					$teacher_visit="";
					
					$bookseller="";
					$bookseller_visit="";
					
					$distributor="";
					$distributor_visit="";
					
					$publisher="";
					$publisher_visit="";
					
					if($row['relate']=="SCHOOL" || $row['relate']=="CHAIN")
					  {
					   $school=$row['name'];
					   $school_visit=$row['sampling_type'];
					  }					
					  else if($row['relate']=="TEACHER")
					  {
					   $teacher=$row['name'];
					   $teacher_visit=$row['sampling_type'];
					  }	
					  else if($row['relate']=="CORPORATE")
					  {
					   $corporate_id=$row['id_of_name'];
					   
					   $query12=mysql_query("SELECT category FROM corporate_list WHERE id='$corporate_id'") or die(mysql_error());
					   $data12=mysql_fetch_array($query12);
					   if($data12['category']=="BOOKSELLER")
					     {
					     $bookseller=$row['name'];
					     $bookseller_visit=$row['sampling_type'];
					     }
					    else if($data12['category']=="DISTRIBUTORS")
					     {
					     $distributor=$row['name'];
					     $distributor_visit=$row['sampling_type'];
					     }
						 else if($data12['category']=="PUBLISHERS")
					     {
					     $publisher=$row['name'];
					     $publisher_visit=$row['sampling_type'];
					     }
					  }						
					
				  ?>
					<td><?php echo $count; ?></td>
					<td><?php echo $row['item_name']; ?></td>
					<td><?php echo $row['subject'];  ?></td>
					<td><?php echo $row['class']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><?php echo $row['series']; ?></td>
					<td><?php echo $row['book_alias']; ?></td>					
					<td><?php echo $row['isbn']; ?></td>
					<td><?php echo $row['discount'];  ?></td>
					<td><?php echo $row['author']; ?></td>
					<td><?php echo $row['remarks']; ?></td>
					<td><?php echo substr($row['date_added'],0,10); ?></td>
					
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

<?php } ?>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<?php include('footer.php');?>