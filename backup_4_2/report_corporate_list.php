<?php
session_start();
include('header.php');
include('function.php');
$salesman_area=working_area($userid);
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
   $specialisation=$_REQUEST['specialisation'];
   $category=$_REQUEST['category'];
   $country=$_REQUEST['country'];    
   //for change date formate
   $state=$_REQUEST['state'];
   $district=$_REQUEST['district'];
   $city=$_REQUEST['city'];
   
   $_SESSION['specialisation']=$board;
   $_SESSION['category']=$category;
   $_SESSION['country']=$country;
   $_SESSION['state']=$state;
   $_SESSION['district']=$district;
   $_SESSION['city']=$city;  
  }
  if($_REQUEST['all'])
    {
	  unset($_SESSION['specialisation']);
	  unset($_SESSION['category']);
	  unset($_SESSION['country']);
	  unset($_SESSION['state']);
	  unset($_SESSION['district']);
	  unset($_SESSION['city']);	  
	}
$board=$_SESSION['specialisation'];
$category=$_SESSION['category'];
$country=$_SESSION['country'];
$state=$_SESSION['state'];
$district=$_SESSION['district'];
$city=$_SESSION['city'];
//echo '<pre>';print_r($_SESSION);
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
	   <th>Category:</th>
        <td><select name="category" class="inp-form-select">
			<option value="" selected="selected"> Please Select</option> 
      <?php $result1=mysql_query("SELECT * FROM school_info_list WHERE category = 'Customer Category' ORDER BY name") or die(mysql_error());
            while ($result12 = mysql_fetch_array($result1))   { ?>
			  <option  <?php if($category==$result12['name']) echo 'selected="selected"'; ?> VALUE="<?php echo $result12['name']; ?>"><?php echo $result12['name']; ?></option> 
			<?php } ?>   </select>
    </td>
	<th>Specialization:</th>
	<td><select name="specialisation" id="pid" class="inp-form-select">
			<option value="" selected="selected"> Please Select</option> 
      <?php $resultdesi=mysql_query("SELECT * FROM school_info_list WHERE category = 'SPECIALISATION'") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option <?php if($specialisation==$resultdeg['name']) echo 'selected="selected"'; ?> VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select>
	</td>
	</tr>
	<tr>
	  <th>Country:</th>
        <td><select name="country" onchange="return show_state(this.value)" class="inp-form-select"> 
		    <option  value="" selected="selected"> Please Select</option>			
        <?php
			    $query=mysql_query("SELECT DISTINCT country FROM location_maste_info_list ORDER BY country ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($country==$value['country']) echo 'selected="selected"'; ?> value="<?php echo $value['country']; ?>"><?php echo $value['country']; ?></option>
			  <?php 
			     }   
              ?>
  </select>    </td>
     <th>State</th>	     
					<td>
					<div id="state">
					<select name="state" onchange="return show_district(this.value)" class="inp-form-select"> 
			<option value="" selected="selected"> Please Select</option>
		<?php
				$query=mysql_query("SELECT DISTINCT state FROM location_maste_info_list ORDER BY state");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option  <?php if($state==$value['state']) echo 'selected="selected"'; ?> value="<?php echo $value['state']; ?>"><?php echo $value['state']; ?></option>
			  <?php 
				 }   
			  ?>
	</select>
	</div>
	</td>
	</tr>
	
	<tr>
	  <th>District:</th>
        <td>
		 <div id="district">
		<select name="district" onchange="return show_city2(this.value)" class="inp-form-select"> 
		    <option  value="" selected="selected"> Please Select</option>			
        <?php
			    $query=mysql_query("SELECT DISTINCT district FROM location_maste_info_list ORDER BY district");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($district==$value['district']) echo 'selected="selected"'; ?> value="<?php echo $value['district']; ?>"><?php echo $value['district']; ?></option>
			  <?php 
			     }   
              ?>
  </select>  
   </div>
    </td>
     <th>City</th>
					<td>
					<div id="city">
					<select name="city" id="series" class="inp-form-select"> 
			<option value="" selected="selected"> Please Select</option>
		<?php
				$query=mysql_query("SELECT DISTINCT city FROM location_maste_info_list ORDER BY city");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option <?php if($city==$value['city']) echo 'selected="selected"'; ?> value="<?php echo $value['city']; ?>"><?php echo $value['city']; ?></option>
			  <?php 
				 }   
			  ?>
	</select>
	</div>
	</td>
	</tr>
	
	<tr>
	 <td></td>
     <th colspan="3" valign="top"><input type="submit" value="Search"  class="form-finish" name="submit" style="float:left; margin-right:15px;" />
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
	 <form name="search_export" id="search_export" action="report_corporate_list_export.php" method="post">
	           
	 <input type="hidden" name="category_ept" id="category_ept" class="search_textbox" value="<?php echo $category; ?>"/>
	 <input type="hidden" name="specialisation_ept" id="specialisation_ept" class="search_textbox" value="<?php echo $specialisation; ?>"/>
	 <input type="hidden" name="country_ept" id="country_ept" class="search_textbox" value="<?php echo $country; ?>"/>
	 <input type="hidden" name="state_ept" id="state_ept" class="search_textbox" value="<?php echo $state; ?>"/>
	 <input type="hidden" name="district_ept" id="district_ept" class="search_textbox" value="<?php echo $district; ?>"/>
	 <input type="hidden" name="city_ept" id="city_ept" class="search_textbox" value="<?php echo $city; ?>"/>
	</form>

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Corporate List  Report</h1>
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
				<form id="mainform" action="print_corporate.php" method="GET" 	onsubmit="return validateForm();">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesorter">
                <thead>
				<tr>
					<!--<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
					<th class="table-header-repeat line-left" style=" width: 68px;  padding-left: 5px;" ><a>Select All</a><br/><input type="checkbox" id="selecctall"/></th>
                    <th class="table-header-repeat line-left" ><a>S. No.</a>	</th>
                   <!-- <th class="table-header-repeat line-left"><a>Profile Image</a></th>-->
				   <th class="table-header-repeat line-left" ><a>Code</a></th>
				   <th class="table-header-repeat line-left" ><a>Corporate Name</a></th>
				   <th class="table-header-repeat line-left" ><a>Address</a></th>
				   <th class="table-header-repeat line-left"><a>City</a></th>
                   <th class="table-header-repeat line-left"><a>Specialisation</a></th>
				   <th class="table-header-repeat line-Board"><a>Category</a></th>            
				</tr>				
                </thead>
                <tbody>
                <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="corporate_list";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
    $search_val="";
    if($specialisation!="")
       {
        $search_val .=" AND (specialisation1='$specialisation' OR specialisation2='$specialisation' OR specialisation3='$specialisation' OR specialisation4='$specialisation')";
       }
    if($category!="") 
       {
        $search_val .=" AND category='$category' ";
       }
    if($country!="" && $state!="" && $district!="")  
       {
        $search_val .=" AND country='$country' AND state='$state' AND district='$district' ";
       }
    if($city!="")  
       {
        $search_val .=" AND city='$city' ";
       }
             
    
	if($user <=4 ) 
	{  
		$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE status='1' $search_val  ";			
	}
	else
	{	
	   $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE status='1' $salesman_area  $search_val";	
	}
	   
	
	//echo $query.'<br>';
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "report_teacher_list.php"; 	//your file name  (the name of this file)
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
	 $sql = "SELECT * FROM $tbl_name WHERE status='1' $search_val ORDER BY id desc LIMIT $start, $limit";
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
				    $spec="";
					$specialisation1=$row['specialisation1'];
					$specialisation2=$row['specialisation2'];
					$specialisation3=$row['specialisation3'];
					$specialisation4=$row['specialisation4'];
					
					if($specialisation1!="")
					 $spec=substr($specialisation1,0,5);
					if($specialisation2!="")
					 $spec.=",".substr($specialisation2,0,5);
				   if($specialisation3!="")
				     $spec.=",".substr($specialisation3,0,5);
				   if($specialisation4!="")
				     $spec.=",".substr($specialisation4,0,5);
				  ?>
				    <td><input type="checkbox" class="checkbox1" name="checkbox<?php echo $i;?>"  id="checkbox<?php echo $i;?>" value="<?php echo $row['id'];?>" /></td>
				    <td><?php echo $count; ?></td>
					<td><?php echo $row['code']; ?></td>
					<td><?php echo substr($row['name'],0,18); ?></td>
					<td><?php echo substr($row['address'],0,33); ?></td>
					<td><?php echo substr($row['city'],0,11); ?></td>
                    <td><?php echo $spec;  ?></td>		
					<td><?php echo substr($row['category'],0,4);  ?></td>	
				</tr><?php $i++;
				}?>
				<td height="2"></tbody>
				</table>
				<!--  end product-table................................... --> 
				<input type="hidden" name="rows" id="rows" value="<?php echo $i;?>"  />
				<input type="submit" name="print" value="Print" />
				<input type="submit" name="print_contact" value="Print Contact Label" />
				<input type="submit" name="print_corporate" value="Print Corporate Label" />
				</form>
			</div>
			<script>
			
function validateForm()
{

    var checked = $("#mainform input:checked").length > 0;
    if (!checked){
        alert("Please check at least one checkbox");
        return false;
    }

}

$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});

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