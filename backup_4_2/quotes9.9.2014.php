<?php include('header.php');
?>
<!-- start content-outer ........................................................................................................................START -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});

$('.click').click(function(){
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
//var id=$(this).attr('href');
// var med=$(this).data('medidnum');
 //alert(med);
return false;
});
});
function ajaxfunc(cuids)  
{  

  $.ajax({  
        type: "GET",  
        url: "popfol.php",  
        data: "med="+cuids,  
		success: function(msg){ 
		
            $(".para").html(msg); 
		}  
    });
 }
</script>
<style type="text/css">
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 100;
display: none;
}
.content2 a{
text-decoration: none;
}
.popup{
width: 100%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 1000;
}
.content2{
	min-width: 350px;
	width: 355px;
	min-height: 150px;
	margin: -31px auto;
	background: #f3f3f3;
	position: relative;
	z-index: 103;
	padding: 10px;
	padding-left: 20px;
	border-radius: 5px;
	box-shadow: 0 2px 5px #000;
	overflow: auto;
	height: 195px;
}
.content2 p{
clear: both;
color: #555555;
text-align: justify;
}
/*.content2 p a{
color: #d91900;
font-weight: bold;
}*/
.content2 .x{
float: right;

left: 7px;
position: relative;
top: -7px;
}
.content2 .x:hover{
cursor: pointer;
}
/*.we{display: block;
height: 39px;
padding-left: 10px;}*/


/*.text{padding-left: 46px;
padding-top: 0px;
display: block;
width: 300px;}
*/
</style>
<?php 
if(isset($_POST['agency']))
{
	/*$agncy=array(
	'ahmedabad'=> $_REQUEST['ahmedabad'],
	'delhi'=> $_REQUEST['delhi'],
	'mumbai'=> $_REQUEST['mumbai'],
	'bangalore'=> $_REQUEST['bangalore'],
	'gurgaon'=> $_REQUEST['gurgaon'],
	'nagpur'=> $_REQUEST['nagpur'],
	'bhuvaneshwar'=> $_REQUEST['bhuvaneshwar'],
	'haldwani'=> $_REQUEST['haldwani'],
	'patna'=> $_REQUEST['patna'],
	'dehradun'=> $_REQUEST['dehradun'],
	'kolkata'=> $_REQUEST['kolkata'],
	'rudrapur'=> $_REQUEST['rudrapur'],
	'cochin'=> $_REQUEST['cochin'],
	'jaipur'=> $_REQUEST['jaipur'],
	'ranchi'=> $_REQUEST['ranchi'],
	'chennai'=> $_REQUEST['chennai'],
	'hyderabad'=> $_REQUEST['hyderabad']
	);*/
	 $sizes = $_POST['asign'];
    $sizes=serialize($sizes); 
	$id = $_POST['enq_id'];
	//print_r($sizes); die;
	$type=$_POST['type'];
	if($type=='edit'){
    $quer = "UPDATE quotes SET agency_added='$sizes' WHERE id = '$id'";
				mysql_query($quer);
	}elseif($type=='add'){
	 $quer = "UPDATE quotes SET agency_added='$sizes' WHERE id = '$id'";
				mysql_query($quer);
				//$quer=mysql_query("INSERT INTO `quotes`(agency_added) VALUES ('$sizes') where id='$id'")or die(mysql_error());
  
	}
	
	}
?>
<div id="content-outer">
<!-- start content -->
<div id="content">
<div class='popup'>
<div class='content2'>
<img src="images/cro.png" alt='quit' class='x' id='x' />
<p style="padding-left:10px;" class="para">

</p>

</div>
</div>
<?php  $right=$r['user_rights'];
		$right=unserialize($right);?>
	<!--  start page-heading -->
	<div id="page-heading">
		<h1>All Enquiries</h1>
	</div>
      <?php if($user!=3){ if (!empty($right) && in_array("en_add", $right)) { ?>
    <div class="addin">
    	<span><a href="add_quote.php?type=add" style="color:#FFFFFF;">Add New Enquiry</a></span>
    </div><?php }}?>
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
                    <th class="table-header-repeat line-left"><a>S.No.</a></th>
                     <th class="table-header-repeat line-left"><a>Enquiry Code</a></th>
                     <th class="table-header-repeat line-left"><a>Date</a></th>
                        <th class="table-header-repeat line-left"><a>Type</a></th>
                    <th class="table-header-repeat line-left"><a>Name</a></th>
                 
                    <th class="table-header-repeat line-left "><a>Email</a></th>
					<th class="table-header-repeat line-left"><a>Mobile No.</a>	</th>
                     <?php //if($user==1){ ?>
					
                    <th class="table-header-repeat line-left"><a>Source</a>	</th>
                    <th class="table-header-repeat line-left"><a>Destination</a>	</th>
                   <!-- <th class="table-header-repeat line-left" style="width: 250px;"><a>Query</a></th>-->
                    <?php //}?>
                 <?php if($user!=3){ ?>
					<th class="table-header-options line-left" style="border-right:1px solid;"><a>Options</a></th>
                      <?php }?>
				</tr>
                </thead>
                <tbody>
                <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="quotes";		//your table name
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
	$targetpage = "quotes.php"; 	//your file name  (the name of this file)
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
		$start = 0;
		//$rar=in_array($usname, $sizes)								//if no page var is given, set start to 0
	
	/* Get data. */
	if($user=='1'){
			$sql = "SELECT * FROM $tbl_name ORDER BY id desc LIMIT $start, $limit";
	}else{
		$sql = "SELECT * FROM $tbl_name where agency_added LIKE '%$usname%' ORDER BY id desc LIMIT $start, $limit";
	}
	
	//$sql = "SELECT * FROM $tbl_name ORDER BY id desc LIMIT $start, $limit";
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
				$count = 0;
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
				 $source = $row['date_added'];
				  $date = new DateTime($source);
				 
				 $type=$row['type'];
				 if($type=='Packers Movers'){$code='PM';}elseif($type=='Car Transportation'){$code='CT';}elseif($type=='Truck Booking'){$code='TB';}
				 $code.= $date->format('dmY');
				 $dcty= $row['dcity'];
				  if(!empty($dcty)){
				 $rest = substr($dcty, 0, 3);
				  $code.= $rest;
				 }
				
				  ?>
                   <td><?php echo $count; ?></td>
                    <td> <a href="javascript:void(0);" style="color:#FF0000; text-decoration:underline; font-weight:bold" title="View Detail" onClick="PopupCenter('detail.php?id=<?php echo base64_encode(convert_uuencode($ag_id));?>', 'myPop1',1000,700);"><?php echo $code; ?></a></td>
                 
                    <td><?php echo $date->format('d-m-Y'); ?></td>
                    <td><?php echo $type; ?></td>
                    
                     <td><?php echo $row['name']; ?></td>
					<td><?php echo $row['email']; ?></td>
                    
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['frm']; ?></td>
                    <td><?php echo $row['tu']; ?></td>
                  <?php //$sentence=$row['quote'];
				  //$sentence=implode(' ', array_slice(explode(' ', $sentence), 0, 10));
				   //echo $sentence; 
				   ?>
					<!--<td></td>-->
                    
                   <?php if($user!=3){ 
                  ?>
               
					<td class="options-width">
                    <?php   if (!empty($right) && in_array("en_edit", $right)) {?> 
					<a href="add_quote.php?type=edit&id=<?php echo base64_encode(convert_uuencode($row['id']));?>" title="Edit" class="icon-1 info-tooltip"></a>
                    <?php } if (!empty($right) && in_array("en_delete", $right)) {?>
                  
					<a href="delete.php?type=quote&id=<?php echo base64_encode(convert_uuencode($row['id']));?>" onclick="if(!confirm('Are you sure, you want to delete this quote?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
                    <?php }if (!empty($right) && in_array("en_assign", $right)) {?>
					<a href="#" title="Assign Agency" class="icon-3 info-tooltip click" onclick="ajaxfunc('<?php echo $row['id'];?>')"></a>  <?php } ?>
			</td><?php }?>
				
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