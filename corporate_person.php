<?php include('header.php');
include('function.php');
$salesman_area=working_area($userid);
?>
<div id="content-outer">
<!-- start content -->
<div id="content">

<?php 
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

<!--  start page-heading -->
	<div id="page-heading">
		<h1>Contact Listing</h1>
</div>
    <div style="width:100%;">
      <?php if($user==1){ ?> 
    <?php }?>
    
    <div style="width:70%; float:left; padding-left:10%;">
    <form name="search" action="#" method="post">
    <tr>
	<td> 
         <select name="searchby1" class="search_by" >
		        <option value="" selected="selected">Plz Select</option> 
				<option <?php if($searchby1=="code") echo 'selected="selected"';?>VALUE="code">Code</option>	
				<option <?php if($searchby1=="name") echo 'selected="selected"';?>VALUE="name">Corporate Name</option>
				<option <?php if($searchby1=="persion") echo 'selected="selected"';?>VALUE="persion">Contact Person</option>							
				<option <?php if($searchby1=="designation") echo 'selected="selected"';?>VALUE="designation">Designation</option>
				<option <?php if($searchby1=="phone1") echo 'selected="selected"';?>VALUE="phone1">Phone1</option>
				<option <?php if($searchby1=="mobile1") echo 'selected="selected"';?>VALUE="mobile1">Phone2</option>
				<option <?php if($searchby1=="mobile2") echo 'selected="selected"';?>VALUE="mobile2">Mobile1</option>
				<option <?php if($searchby1=="city") echo 'selected="selected"';?>VALUE="city">City</option>
				<option <?php if($searchby1=="district") echo 'selected="selected"';?>VALUE="district">District</option>
				<option <?php if($searchby1=="state") echo 'selected="selected"';?>VALUE="state">State</option>		                      
        </select>
      </td> 
    <td><input type="text" name="search1" class="search_textbox" value="<?php echo $search1; ?>"/></td>
	<td> 
         <select name="searchby2" class="search_by">
		         <option value="" selected="selected">Plz Select</option> 
				<option <?php if($searchby2=="code") echo 'selected="selected"';?>VALUE="code">Code</option>	
				<option <?php if($searchby2=="name") echo 'selected="selected"';?>VALUE="name">Corporate Name</option>
				<option <?php if($searchby2=="persion") echo 'selected="selected"';?>VALUE="persion">Contact Person</option>							
				<option <?php if($searchby2=="designation") echo 'selected="selected"';?>VALUE="designation">Designation</option>
				<option <?php if($searchby2=="phone1") echo 'selected="selected"';?>VALUE="phone1">Phone1</option>
				<option <?php if($searchby2=="mobile1") echo 'selected="selected"';?>VALUE="mobile1">Phone2</option>
				<option <?php if($searchby2=="mobile2") echo 'selected="selected"';?>VALUE="mobile2">Mobile1</option>
				<option <?php if($searchby2=="city") echo 'selected="selected"';?>VALUE="city">City</option>
				<option <?php if($searchby2=="district") echo 'selected="selected"';?>VALUE="district">District</option>
				<option <?php if($searchby2=="state") echo 'selected="selected"';?>VALUE="state">State</option>		                                     
        </select>
      </td>
     
	  <td><input type="text" name="search2" class="search_textbox" value="<?php echo $search2; ?>"/></td>
      
     
      <td><input type="submit" value="Search" class="mainsearch"  name="search" /></td>
	  <td><input type="submit" value="Show All" class="mainsearch"  name="Showall" /></td>
	</tr>
    </form>
    </div>
    
    </div>
	<!-- end page-heading -->

	<!--  start content-table-inner -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft" style="height: 43px"></th>
		<td id="tbl-border-top" style="height: 43px"></td>
		<th class="topright" style="height: 43px"></th>
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
                    <th class="table-header-repeat line-left"><a>S. No.</a>	</th>
                   <!-- <th class="table-header-repeat line-left"><a>Profile Image</a></th>-->
                   <th class="table-header-repeat line-left"><a>Corporate Name</a></th>
                   <th class="table-header-repeat line-left"><a>Contact Person</a></th>
                    <th class="table-header-repeat line-left"><a>Designation</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a>Address</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a>Email</a>	</th> 					
					<th class="table-header-repeat line-left minwidth-1"><a>Phone/Mob</a>	</th>
					<th class="table-header-options line-left" style="border-right:1px solid;"><a>Sampling</a></th>					
					<th class="table-header-options line-left" style="border-right:1px solid;"><a>Options</a></th>
                      <?php //}?>
				</tr>
                </thead>
                <tbody>
                <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="corporate_sub";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	if($searchby1!="" && $search1!="" && $searchby2!="" && $search2!="")
	  {
	  	$search_val=" AND ($searchby1 LIKE '%$search1%') AND ($searchby2 LIKE '%$search2%') ";
	  }
	else if($searchby1!="" && $search1!="")
	  {
	  	$search_val="AND ($searchby1 LIKE '%$search1%')";  
	  }
	else
	  {
	  	$search_val="";
	  }
	  	
	if($user <=4 ) 
	{  
		$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE status in ('0','1') $search_val";			
	}
	else
	{	
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE status='1' $salesman_area  $search_val";	
	}
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "corporate2.php"; 	//your file name  (the name of this file)
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
	if($user <=4)
	{ 
	 $sql = "SELECT * FROM $tbl_name WHERE status in ('0','1') $search_val ORDER BY id desc LIMIT $start, $limit";
	}
	else
	{
	 $sql = "SELECT * FROM $tbl_name WHERE status='1' $salesman_area $search_val ORDER BY id desc LIMIT $start, $limit";
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
			$pagination.= "<a href=\"$targetpage?page=$prev&id=".base64_encode(convert_uuencode($id))."\">Previous</a>";
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
					$pagination.= "<a href=\"$targetpage?page=$counter&id=".base64_encode(convert_uuencode($id))."\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage?page=$counter&id=".base64_encode(convert_uuencode($id))."\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&id=".base64_encode(convert_uuencode($id))."\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&id=".base64_encode(convert_uuencode($id))."\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1&id=".base64_encode(convert_uuencode($id))."\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&id=".base64_encode(convert_uuencode($id))."\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&id=".base64_encode(convert_uuencode($id))."\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&id=".base64_encode(convert_uuencode($id))."\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&id=".base64_encode(convert_uuencode($id))."\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1&id=".base64_encode(convert_uuencode($id))."\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&id=".base64_encode(convert_uuencode($id))."\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&id=".base64_encode(convert_uuencode($id))."\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next&id=".base64_encode(convert_uuencode($id))."\">Next</a>";
		else
			$pagination.= "<span class=\"disabled\">Next</span>";
		$pagination.= "</div>\n";		
	}

//echo $pagination;die; 

?>
 
	

                <?php  //$result=mysql_query("SELECT * FROM dan_users ORDER BY id desc") or die(mysql_error); 
				
				
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
				 /* $len=strlen($ag_id);
				  if ($len == 1){$ag_id='GF00000'.$ag_id;}elseif($len == 2){$ag_id='GF0000'.$ag_id;}elseif($len == 3){$ag_id='GF000'.$ag_id;}
				  elseif($len == 4){$ag_id='GF00'.$ag_id;}elseif($len == 5){$ag_id='GF0'.$ag_id;}elseif($len == 6){$ag_id='GF'.$ag_id;}*/
				  ?>
				  <td><?php echo $count; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['persion']; ?></td>
                     <td><?php echo $row['designation']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone1'].",".$row['mobile1'].'<br>'; $row['mobile2']; ?></td>
						
						<td align="center"><a href="book_sampling_corporate_person.php?sid=<?php echo base64_encode(convert_uuencode($row['id']));?>&type=<?php echo base64_encode(convert_uuencode($tbl_name));?>" title="Contact Person"><img src="images/sicon.png"/></a></td>
                     
					<td class="options-width">
                    
					<a href="corporate2_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>&sid=<?php echo base64_encode(convert_uuencode($sid));?>&p=21" title="Edit" class="icon-1 info-tooltip"></a>
                  <?php  if($user==1 || $user==2) { ?>
					<a href="delete.php?type=corporate2&id=<?php echo base64_encode(convert_uuencode($row['id']));?>&sid=<?php echo base64_encode(convert_uuencode($sid));?>&p=21" onClick="if(!confirm('Are you sure, you want to delete this Information ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
				   <?php } ?>
				<?php /*?>	<a href="reg_sale_info.php?id=<?php echo $row['id'];?>" title="Sales Registered" class="icon-4 info-tooltip"></a><?php */?></td>
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
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>
</form>

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
<script type="text/javascript">           
  $(document).ready(function() {

 //alert('hello');
 jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

	$('#formoid').validate(
	{	
		//alert('hello');
		rules:
		{
			"user_name":
			{
				required:true,
				/*lettersonly:true,*/
				remote:'check.php',
			},
			
			"email12":
			{
				required:true,
				email:true,
				
			},
			"address":
			{
				required:true
			},
			"address":
			{
				required:true
			},
			
			
			"route":
			{
				required:true
				 
			},
						
		},
		messages:
		{
			"user_name":
			{
				required:'This field is required.',
				remote:'Username Already Exists.',
			},
			
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				
			},
			"password":
			{
				required:'This field is required.',
			},
			"address":
			{
				required:'This field is required.',
			},
			
			"phone":
			{
				required:'This field is required.',
				number:'Please enter a valid phone no.'
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>
