<?php include('header.php');
include('function.php');
require_once('config.php');
$sid = convert_uudecode(base64_decode($_REQUEST['sid']));

if(isset($_POST['submit'])) {
$name=trim(strtoupper($_REQUEST['name']));
$code=trim(strtoupper($_REQUEST['code']));
$year_code=($_REQUEST['year_code']);
$from_date=($_REQUEST['from_date']);
$short_name=trim(strtoupper($_REQUEST['short_name']));
$to_date=($_REQUEST['to_date']);

		    
$sql=mysql_query("INSERT INTO misCompanyMaster_sub(company_name,company_code,year_code,from_date,short_name,to_date) VALUES ('$name','$code','$year_code','$from_date','$short_name','$to_date')")or die(mysql_error());
     header("location:company_mis_sub.php?sid=".base64_encode(convert_uuencode($sid)));
 
 /* }
  else  
    {$error="Data already exist";}*/

}

	$result=mysql_query("SELECT * FROM misCompanyMaster WHERE id= '$sid' ") or die(mysql_error());
	$row = mysql_fetch_array($result);


?>
<!-- start content-outer -->
 <title>jQuery UI Datepicker - Display month &amp; year menus</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#from_date" ).datepicker({
changeMonth: true,
changeYear: true
});
});

$(function() {
$( "#to_date" ).datepicker({
changeMonth: true,
changeYear: true
});
});
</script>
<div id="content-outer">
<!-- start content -->
<div id="content">
<?php if($user!='1'){header('location:index.php');}?>
<?php if(@($_GET['error'])){?>
<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error:- <?php echo $_GET['error'];?></td>
					
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div><?php } //echo ('<meta http-equiv="refresh" content="0;url=/crm/admin/add_user.php">');?>




<div id="page-heading"><h1>Add New Company MIS Sub</h1></div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td style="height: 96px">
	
	
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form"> 
        <tr>
        <th valign="top">MIS Company Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php  echo $row['name']; ?>" readonly="readonly" required/></td>   
        <th valign="top">MIS Company Code:</th>
			<td><input type="text" class="inp-form" name="code"  value="<?php echo $row['code'];?>"id=""  readonly="readonly" required/></td>
         
	   </tr>
    <tr>
	     <th valign="top">Year code:</th>
			<td><select name="year_code" id="year_code" class="inp-form-select"  required>
			    <option value="">Plz Select</option>
				<option value="2013-2014">2013-2014</option>
				<option value="2014-2015">2014-2015</option> 
		        <option value="2015-2016">2015-2016</option>
                </select>
			
			</td>
        <th valign="top">From Date:</th>			 
			<td><input type="text" class="inp-form" name="from_date" id="from_date" required/></td> 
	   </tr>
	   <tr>
	     <th valign="top">Short Name:</th>
			<td><input type="text" class="inp-form" name="short_name" id="short_name" required/></td>
        <th valign="top">To Date:</th>			 
			<td><input type="text" class="inp-form" name="to_date" id="to_date" required/></td> 

	   </tr>
        
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td></td>
	</tr>
	</table>
	</form>
	<!-- end id-form  -->

	</td>
	<td style="height: 96px">

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" />
<div id="content">


	<!--  start page-heading -->
	<div id="page-heading">
		<h1>All Company MIS Sub Listing</h1>
	</div>    
	<!-- end page-heading -->
    <div style="width:100%;">
	<?php  
if(isset($_POST['search'])) {
 $search=mysql_real_escape_string($_REQUEST['value']);
 $type=mysql_real_escape_string($_REQUEST['type']); 
 }
  

?>
    <div style="width:50%; float:left; padding-left:10%;">
    <form name="search" method="post">
	<table>
    <tr> 
    <td><input type="text" name="value" id="search" /></td>
     <td> 
         <select name="type" style="width: 200px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
           		 
                <option VALUE="code">Code</option>
                <option VALUE="name">Name</option>
            	<option VALUE="email">Email id</option>
                <option VALUE="category">Category</option> 
                <option VALUE="mobile">Mobile</option> 
        </select>
      </td> 
      <td><input type="submit" value="Search" class="mainsearch"  name="search" /></td>
	  <td><input type="submit" value="Show All" class="mainsearch"  name="Showall" /></td>
	</tr>
	</table>
    </form>
    </div>
    
    </div>
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
                   <th class="table-header-repeat line-left"><a>MIS Company Name</a></th>
                   <th class="table-header-repeat line-left"><a>Year Code </a></th>
                    <th class="table-header-repeat line-left"><a>From Date </a></th>
					<th class="table-header-repeat line-left minwidth-1"><a>To Date</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a>Short Name</a>	</th>
 
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

	$tbl_name="misCompanyMaster_sub";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$code=$row['code'];	
	if($search!=NULL)
	{$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE (company_code='$code') AND ($type= '$search')";
	}
	else
	$query = "SELECT COUNT(*) as num FROM $tbl_name where company_code='$code'";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "company_mis_sub.php"; 	//your file name  (the name of this file)
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
	if($search!=NULL)
	$sql = "SELECT * FROM $tbl_name WHERE (company_code='$code') AND ($type= '$search') ORDER BY id desc LIMIT $start, $limit";
	else
	$sql = "SELECT * FROM $tbl_name where company_code='$code' ORDER BY id desc LIMIT $start, $limit";
	
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
			$pagination.= "<a href=\"$targetpage?page=$prev&sid=".base64_encode(convert_uuencode($sid))."\">Previous</a>";
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
					$pagination.= "<a href=\"$targetpage?page=$counter&sid=".base64_encode(convert_uuencode($sid))."\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage?page=$counter&sid=".base64_encode(convert_uuencode($sid))."\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&sid=".base64_encode(convert_uuencode($sid))."\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&sid=".base64_encode(convert_uuencode($sid))."\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1&sid=".base64_encode(convert_uuencode($sid))."\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&sid=".base64_encode(convert_uuencode($sid))."\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&sid=".base64_encode(convert_uuencode($sid))."\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&sid=".base64_encode(convert_uuencode($sid))."\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&sid=".base64_encode(convert_uuencode($sid))."\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1&sid=".base64_encode(convert_uuencode($sid))."\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&sid=".base64_encode(convert_uuencode($sid))."\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&sid=".base64_encode(convert_uuencode($sid))."\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next&sid=".base64_encode(convert_uuencode($sid))."\">Next</a>";
		else
			$pagination.= "<span class=\"disabled\">Next</span>";
		$pagination.= "</div>\n";		
	}


//echo $pagination;die; 

?>
 
	

                <?php  //$result=mysql_query("SELECT * FROM dan_users ORDER BY id desc") or die(mysql_error); 
				
				
			   function unserial($var)
			     {
			      $var=unserialize($var);
			      return $var;		      
			     
			     }
                $i = 0;               
				$count = 0;
				
				$count = number();
				
				

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
				  $sub=$row['subject'];
				  $sub=unserial($sub);
				  
                  $class=$row['class'];
				  $class=unserial($class);
  	
								
				
				 /* $len=strlen($ag_id);
				  if ($len == 1){$ag_id='GF00000'.$ag_id;}elseif($len == 2){$ag_id='GF0000'.$ag_id;}elseif($len == 3){$ag_id='GF000'.$ag_id;}
				  elseif($len == 4){$ag_id='GF00'.$ag_id;}elseif($len == 5){$ag_id='GF0'.$ag_id;}elseif($len == 6){$ag_id='GF'.$ag_id;}*/
				  ?>
					<td><?php echo $count; ?></td>
					<td><?php echo $row['company_name']; ?></td>					
                     <td><?php echo $row['year_code']; ?></td>
					<td><?php echo $row['from_date']; ?></td>
					<td><?php echo $row['to_date']; ?></td>
                    <td><?php echo $row['short_name']; ?></td>
                     
					<td class="options-width">
                    
					<a href="company_mis_sub_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>&sid=<?php echo base64_encode(convert_uuencode($sid));?>" title="Edit" class="icon-1 info-tooltip"></a>
                  

					<a href="delete.php?type=com_mis_sub&id=<?php echo base64_encode(convert_uuencode($row['id']));?>&sid=<?php echo base64_encode(convert_uuencode($sid));?>" onClick="if(!confirm('Are you sure, you want to delete this Information ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
				
				<?php /*?>	<a href="reg_sale_info.php?id=<?php echo $row['id'];?>" title="Sales Registered" class="icon-4 info-tooltip"></a><?php */?></td>
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



</td>
<td></td>
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
