<?php include('header.php');
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
?> 
<div id="content-outer">
<!-- start content -->
<div id="content"> 
	<!--  start page-heading -->
	<div id="page-heading">
	<form name="search113" method="post">
		<h1><span style="float:left"> All Submission Listing </span> <span style="float: left; margin-left:70px"><input type="text" name="search112" class="searchboxs" value="<?php if($_REQUEST['all']) echo" "; ?>"></span><span style="float:left; margin-left:25px;"><input type="submit" name="search111" value="Search" class="searchboxs"></span></h1>
		</form>
	</div>
    <div style="width:100%;">
     
    <div class="addin" style="width:auto; float:right;">
    	<span><a href="add_submission_info.php" style="color:#FFFFFF;">Add New Submission Information</a></span>
    </div>
	<div class="addin" style="width:auto; float:right;">
    	<span><a href="submission_listing.php" style="color:#FFFFFF;">Show All</a></span>
    </div>
	
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
                    <th class="table-header-repeat line-left" style="height: 19px"><a>S. No.</a>	</th>
                   <!-- <th class="table-header-repeat line-left"><a>Profile Image</a></th>-->
                    <th class="table-header-repeat line-left" style="height: 19px"><a>Category</a></th>
					<th class="table-header-repeat line-left minwidth-1" style="height: 19px">
					<b style="mso-bidi-font-weight:normal">
					<span style="font-size:11.0pt;line-height:115%;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:Calibri;mso-fareast-theme-font:
minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;
mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA">Submission Date</span></b>	</th>
                     
					<th class="table-header-options line-left" style="height: 19px; border-right-style: solid; border-right-color: inherit; border-right-width: 1px;"><a>Options</a></th> 
				</tr>
                </thead>
                <tbody>
                <?php 
				$search112=mysql_real_escape_string($_REQUEST['search112']);   //Variable for searching Data
				
	$tbl_name="submission";	 
	$adjacents = 3;  
	if($search112!=NULL)
	{
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE  (category LIKE '%$search112%') OR (date LIKE '%$search112%') ";
	}
	else
	$query = "SELECT COUNT(*) as num FROM $tbl_name "; 
	
	$total_pages = mysql_fetch_array(mysql_query($query)); 
	
	$total_pages = $total_pages['num']; 
	
	$targetpage = "submission_listing.php"; 
	 
	$limit = 10;
	 	if(!isset($_GET['page']) || $_GET['page']==""){ 
    $page = "1"; 
}else{  
    $page = $_GET['page']; 
}	 
    
	if($page) 
		$start = ($page - 1) * $limit; 		 
	else
		$start = 0;	 
	if($search112!=NULL)
	{
	$sql = "SELECT * FROM $tbl_name WHERE (category LIKE '%$search112%') OR (date LIKE '%$search112%') ORDER BY id desc LIMIT $start, $limit";
	}
	else
	$sql = "SELECT * FROM $tbl_name ORDER BY id desc LIMIT $start, $limit";
	$result = mysql_query($sql); 
	if ($page == 0) $page = 1;					 
	$prev = $page - 1;							 
	$next = $page + 1;							 
	$lastpage = ceil($total_pages/$limit);		 
	$lpm1 = $lastpage - 1;		
		
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
			$pagination.= "<a href=\"$targetpage?page=$prev&search112=$search112\">Previous</a>";
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
					$pagination.= "<a href=\"$targetpage?page=$counter&search112=$search112\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage?page=$counter&search112=$search112\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&search112=$search112\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&search112=$search112\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1&search112=$search112\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&search112=$search112\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&search112=$search112\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&search112=$search112\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&search112=$search112\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1&search112=$search112\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&search112=$search112\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&search112=$search112\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next&search112=$search112\">Next</a>";
		else
			$pagination.= "<span class=\"disabled\">Next</span>";
		$pagination.= "</div>\n";		
	}

//echo $pagination;die; 

?>
                <?php  
                $i = 0;
				$count=number();//for serial number. Function call from function.php file

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
				  ?>
					<td><?php echo $count; ?></td>
                     <td><?php echo $row['category']; ?></td>
					<td><?php echo $row['date']; ?></td> 
					<td class="options-width"> 
					<a href="submission_info_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>" title="Edit" class="icon-1 info-tooltip"></a> 
				<?php  if($user==1 || $user==2) { ?>  	
					<a href="delete.php?type=submission11&id=<?php echo base64_encode(convert_uuencode($row['id']));?>" onClick="if(!confirm('Are you sure, you want to delete this Information ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a> 
				<?php } ?>	
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

<?php } ?>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<?php include('footer.php');?>