<?php

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
   $salesman_id=$_REQUEST['salesman_id'];    
   //for change date formate
   $from=$_REQUEST['from_date'];
   $to=$_REQUEST['to_date'];
    
   
   $_SESSION['godwon']=$godwon;
   $_SESSION['salesman_id']=$salesman_id;
   $_SESSION['from_date']=$from_date;
   $_SESSION['to_date']=$to_date;
   $_SESSION['from']=$from;
   $_SESSION['to']=$to;  
  }
  if($_REQUEST['all'])
    {	 
	  unset($_SESSION['salesman_id']);
	  unset($_SESSION['from_date']);
	  unset($_SESSION['to_date']);
	  unset($_SESSION['from']);
	  unset($_SESSION['to']);
	
	}
	$salesman_id=$_SESSION['salesman_id'];
	$from_date=$_SESSION['from_date'];
	$to_date=$_SESSION['to_date'];
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
			     <option  value="<?php echo $value['department']; ?>"><?php  echo $value['department']; ?></option>
			  <?php 
			     }   
              ?>
  </select></td>
			<th valign="top">Salesman name :</th>
			 <td><div id="departmentdiv"><select name="" class="inp-form-select"> 
		    <option value="" selected="selected"> Plz Select</option>			
  </select>
  </div> 
   
        </td>
		</tr>
	<tr>
	  <th></th>
     <th valign="top" colspan="3"><input type="submit" value="Search"  class="form-finish" name="submit" style="float:left; margin-right:15px;" />
	                  <input type="submit" value="Show All"  class="form-finish" name="all" style=" float:left;" />
					  <input type="button"  onclick="export_excel();" value="Export into Excel" class="form-finish"  style=" width:150px;float:left; margin-right:15px;"  name="Export into Excel" />
	 </th>
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
	 <form name="search_export" id="search_export" action="report_working_export.php" method="post">
	 <input type="hidden" name="salesman_id_ept" id="salesman_id_ept" class="search_textbox" value="<?php echo $salesman_id; ?>"/>
	 <input type="hidden" name="from_date_ept" id="from_date_ept" class="search_textbox" value="<?php echo $from_date; ?>"/>
	 <input type="hidden" name="to_date_ept" id="to_date_ept" class="search_textbox" value="<?php echo $to_date; ?>"/>
	  </form>
   
	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Daily Working Report </h1>
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
                    <th class="table-header-repeat line-left" ><a>Visit</a></th>

                   <!-- <th class="table-header-repeat line-left"><a>Profile Image</a></th>-->					   
				   <th class="table-header-repeat line-left" ><a>School</a></th>
				  <!--   <th class="table-header-repeat line-left" ><a>Visit</a></th> -->

					<th class="table-header-repeat line-left" ><a>Teacher</a></th>

					<th class="table-header-repeat line-left" ><a>Bookseller</a></th>
				 <!--   <th class="table-header-repeat line-left" ><a>Visit</a></th>
				   <th class="table-header-repeat line-left" ><a>Contact Person</a></th> -->

				   <th class="table-header-repeat line-left" ><a>Distributors</a></th>
				  <!--  <th class="table-header-repeat line-left" ><a>Visit</a></th>
				   <th class="table-header-repeat line-left" ><a>Contact Person</a></th> -->

				   <th class="table-header-repeat line-left" ><a>Publishers</a></th>
				   <!--  <th class="table-header-repeat line-left" ><a>Visit</a></th>				    -->
				   <th class="table-header-repeat line-left" ><a>Contact Person</a></th>
                   
                                       <th class="table-header-repeat line-left"><a>Chain</a></th>
                   <!--  <th class="table-header-repeat line-left"><a>Visit_type</a></th> -->
                    <th class="table-header-repeat line-left"><a>Member</a></th> 

                    <th class="table-header-repeat line-left"><a>Department Member</a></th> 

				   </tr>
                  
				               </thead>
                <tbody>
                <?php
	/*
		Place code to connect to your DB here.
	*/
	//include('config.php');	// include your code to connect to DB.

	$tbl_name="book_sample";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']))
	  $query = "SELECT COUNT(DISTINCT id_of_name,relate) as num FROM $tbl_name WHERE date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND relate IN('SCHOOL','TEACHER','CORPORATE','CONTACT_PERSON','CHAIN','MEMBER','DEPARTMENT')";
	else
	  $query = "SELECT COUNT(DISTINCT id_of_name,relate) as num FROM $tbl_name WHERE relate IN('SCHOOL','TEACHER','CORPORATE','CONTACT_PERSON','CHAIN','MEMBER','DEPARTMENT')";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "report_working.php"; 	//your file name  (the name of this file)
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
	if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']))
	   $sql = "SELECT DISTINCT id_of_name,relate FROM $tbl_name WHERE date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id' AND relate IN('SCHOOL','TEACHER','CORPORATE','CONTACT_PERSON','CHAIN','MEMBER','DEPARTMENT') ORDER BY relate desc LIMIT $start, $limit ";
	else
	   $sql = "SELECT DISTINCT id_of_name,relate FROM $tbl_name WHERE relate IN('SCHOOL','TEACHER','CORPORATE','CONTACT_PERSON','CHAIN','MEMBER','DEPARTMENT') ORDER BY relate desc LIMIT $start, $limit";
	 
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
				    $id_of_name=$row['id_of_name'];
					$relate= $row['relate']; 

					$visit=0;
				    $school="";
					$school_visit=0;

					$contact="";
					$contact_visit="";

					$department="";
					$department_visit="";

					$chain="";
					$chain_visit="";

					$member="";
					$member_visit="";
					
					$teacher="";
					$teacher_visit=0;
					
					$bookseller="";
					$bookseller_visit=0;
					$bookseller_contactp="";
					
					$distributor="";
					$distributor_visit=0;
					$distributor_contactp="";
					
					$publisher="";
					$publisher_visit=0;
					$publisher_contactp="";
					
					if(isset($_SESSION['from']) && isset($_SESSION['to']) && isset($_SESSION['salesman_id']))
					  $query13=mysql_query("SELECT * FROM $tbl_name WHERE id_of_name='$id_of_name' AND relate='$relate' AND date BETWEEN '$from' AND '$to' AND salseman_id='$salesman_id'") or die(mysql_error());
					else
					  $query13=mysql_query("SELECT * FROM $tbl_name WHERE id_of_name='$id_of_name' AND relate='$relate'") or die(mysql_error()); 
					$visit=mysql_num_rows($query13);//for count row
					  //$data4=mysql_fetch_array($query13);

					  //echo "<pre>";
					//print_r($data4);

					while($data13=mysql_fetch_array($query13))
					{					  			
					if($data13['relate']=="SCHOOL" )
					  {					   
					   $school=$data13['name'];						   
					   $school_visit=$visit;					   
					  }
					   else if($data13['relate']=="CHAIN" ) 
					  {
					   $chain=$data13['name'];
					   $chain_visit=$visit;
					  }	

					   else if($data13['relate']=="MEMBER") 
					  {
					   $member=$data13['name'];
					   $member_visit=$visit;
					  }	

					  else if($data13['relate']=="CONTACT_PERSON")
					  {
					   $contact=$data13['name'];
					   $contact_visit=$visit;
					  }	
					  else if($data13['relate']=="DEPARTMENT")
					  {
					   $department=$data13['name'];
					   $department_visit=$visit;
					  }			
					else if($data13['relate']=="TEACHER")
					  {
					  $teacher=$data13['name'];					  
					  $teacher_visit=$visit;
					  }					 
					  else if($data13['relate']=="CORPORATE")
					  {
					   $corporate_id=$data13['id_of_name'];
					   
					   $query12=mysql_query("SELECT category FROM corporate_list WHERE id='$corporate_id'") or die(mysql_error());
					   $data12=mysql_fetch_array($query12);
					   
					    $query_contactp=mysql_query("select persion from corporate_sub where uid='$corporate_id'") or die(mysql_error());
					   $data_contactp=mysql_fetch_array($query_contactp);
					   
					   if($data12['category']=="BOOKSELLER")
					     {
					     $bookseller=$data13['name'];
						 $bookseller_visit=$visit;
						  $bookseller_contactp=$data_contactp['persion'];
					     }
					    else if($data12['category']=="DISTRIBUTORS")
					     {
					     $distributor=$data13['name'];
						 $distributor_visit=$visit;
						 $distributor_contactp=$data_contactp['persion'];
					     }
						 else if($data12['category']=="PUBLISHERS")
					     {
					     $publisher=$data13['name'];
						 $publisher_visit=$visit;
						 $publisher_contactp=$data_contactp['persion'];
					     }
					  }						
					}
										   $kpo=$row['id_of_name'];	
										   
 					   $query987=mysql_query("select * from chain_school_list where id=$kpo") or die(mysql_error());
					   $data987=mysql_fetch_array($query987);

					   $query123=mysql_query("select * from chain_school_sub where sid=$kpo") or die(mysql_error());
					   $data123=mysql_fetch_array($query123);	
				
				  ?>
					<td><?php echo $count; ?></td>
					<td><?php if($school_visit!=0) echo $school_visit; ?>
						<?php if($contact_visit!=0) echo $contact_visit; ?>
						<?php if($department_visit!=0) echo $department_visit; ?>
						<?php if($chain_visit!=0) echo $chain_visit; ?>
						<?php if($teacher_visit!=0) echo $teacher_visit; ?>
						<?php if($bookseller_visit!=0)echo $bookseller_visit; ?>
						<?php if($distributor_visit!=0)echo $distributor_visit; ?>
						<?php if($publisher_visit!=0)echo $publisher_visit; ?>
						<?php if($member_visit!=0)echo $member_visit; ?>
						<?php //echo $data987['Visit_type']; ?></td>	

					<td><?php echo $school; ?></td>
					
					<td><?php echo $teacher; ?></td>

					<td><?php echo $bookseller; ?></td>
					
					<td><?php echo $distributor; ?></td>
					
					
					<td><?php echo $publisher; ?></td>
							
					<td><?php echo $contact; ?><?php //echo $bookseller_contactp; ?><?php //echo $distributor_contactp; ?><?php //echo $publisher_contactp; ?></td>
                    
                    <td><?php echo $chain;//$data987['Chain']; ?></td>                   
					               
					<td><?php echo $member;//$data123['member'];//$data987['Member']; ?></td> 

					<td><?php echo $department; ?></td>

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