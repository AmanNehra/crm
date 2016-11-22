<?php
session_start();
include('header.php');
include('function.php');

if(isset($_SESSION['issue_voucher_session']))
 {
  $uid=$_SESSION['issue_voucher_session'];   
  $que12=mysql_query("SELECT * FROM issue_voucher WHERE id='$uid'");
  $dat12=mysql_fetch_array($que12);
  $salseman_id=$dat12['salseman_id'];
  $v_no=$dat12['v_no'];  
 }

if(isset($_POST['submit'])) {

$len=$_REQUEST['len'];
//echo "<pre>"; print_r ($_REQUEST); die();
if(!isset($_SESSION['issue_voucher_session']))
  {

  	 $q="select v_no from issue_voucher order by id desc LIMIT 1";
		   $r=mysql_query($q);
		   $row=mysql_fetch_row($r);
		   if($row!=0)
		   {
		   		 $old_num=$row[0];
				$a=substr($old_num, 6);
				$b=$a+1;
				$v_no = "SV0000".$b;
		   }
		   else{
		   	$v_no = "SV00001";
		   }

//$v_no=strupp($_REQUEST['v_no']);
$v_date=strupp($_REQUEST['v_date']);
$godwon=strupp($_REQUEST['godwon']);
$v_time=strupp($_REQUEST['v_time']);
$department=strupp($_REQUEST['department']);
$salseman_id=($_REQUEST['salseman_id']);
$salseman=($_REQUEST['salseman']);
$city=($_REQUEST['city']);
$district=strupp($_REQUEST['district']);
$state=strupp($_REQUEST['state']);
$country=strupp($_REQUEST['country']);
$transportation=strupp($_REQUEST['transportation']);
$transport_type=strupp($_REQUEST['transport_type']);
$details=strupp($_REQUEST['details']);
$corporate_name=strupp($_REQUEST['corporate_name']);
$corporate_person=strupp($_REQUEST['corporate_person']);
$c_address=strupp($_REQUEST['c_address']);
$c_city=strupp($_REQUEST['c_city']);
$c_district=strupp($_REQUEST['c_district']);
$c_state=strupp($_REQUEST['c_state']);
$c_country=strupp($_REQUEST['c_country']);
$teachercopy=strupp($_REQUEST['teachercopy']);
$remarks=strupp($_REQUEST['remarks']);
$group=strupp($_REQUEST['group']);
$series=strupp($_REQUEST['series']);

mysql_query("START TRANSACTION");
$q1=mysql_query("INSERT INTO issue_voucher (v_no,v_date,godwon,v_time,department,salseman_id,salseman,city,district,state,country,transportation,transport_type,details,corporate_name,corporate_person,c_address,c_city,c_district,c_state,c_country,teachercopy,remarks,group1,series) VALUES('$v_no','$v_date','$godwon','$v_time','$department','$salseman_id','$salseman','$city','$district','$state','$country','$transportation','$transport_type','$details','$corporate_name','$corporate_person','$c_address','$c_city','$c_district','$c_state','$c_country','$teachercopy','$remarks','$group','$series')") or die( mysql_error());

$uid=mysql_insert_id();
$_SESSION['issue_voucher_session']=$uid;

}
//After create session they store value

//End
for($i=1; $i<$len; $i++){
$j="_".$i;//for name of item
$book_id=($_REQUEST['book_id'.$j]);
$book_name=($_REQUEST['book_name'.$j]);


$class=($_REQUEST['class'.$j]);

$qty=($_REQUEST['qty'.$j]);

$price=($_REQUEST['price'.$j]);

$q2=mysql_query("INSERT INTO all_voucher (uid,salseman_id,book_id,book_name,class,qty,price,relate) VALUES('$uid','$salseman_id','$book_id','$book_name','$class','$qty','$price','1')")  or die( mysql_error());

}


}

if(isset($_REQUEST['finish'])){
 
  unset($_SESSION['issue_voucher_session']);
}
?>
<!-- start content-outer -->
<script src="jscript.js"></script>
<script>
 function onchangedepartment(did)
 {
  $.ajax({
  url:"department_result.php",
  type: "POST",
  data: "department="+did,
  success:function(result){
   $("#departmentdiv").html(result);    
    //alert (result);
  }}); 
 }
 
  function onchangeissuevoucher(did)
 {
   $.ajax({
  url:"issue_voucher_contact.php",
  type: "POST",
  data: "contact="+did,
  success:function(result){
   $("#issuevoucher_contact").html(result);
    
    //alert (result);
  }});

 
 
 }
 
 
 
 function onchangetransport_type(did)
 {
  $.ajax({
  url:"voucher_transport_type.php",
  type: "POST",
  data: "transport="+did,
  success:function(result){
   $("#voucher_transport_type").html(result);    
  }});

 
 
 }


</script>
















<script>
 function onchangeajax(pid)
 { 
 //alert ("sunil");
 xmlHttp=GetXmlHttpObject()
 if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
 
 var url="location_result.php",
 url=url+"?id="+pid
 url=url+"&sid="+Math.random()
 //alert (url);
 //document.getElementById("statediv").innerHTML='Please wait..<img border="0" src="images/ajax-loader.gif">'
 if(xmlHttp.onreadystatechange=stateChanged)
 {
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 $('#p_school_old1').hide();
  $('#p_school_old2').hide();
   $('#p_school_old').hide();
    $('#p_school_old4').hide();
 return true; 
	
 }
 else
 {
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 return false;
 }
 }
 
 function stateChanged()
 {
 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {
 document.getElementById("statediv").innerHTML=xmlHttp.responseText
 return true;
 }
 }
 
 function GetXmlHttpObject()
 {
 var objXMLHttp=null
 if (window.XMLHttpRequest)
 {
 objXMLHttp=new XMLHttpRequest()
 }
 else if (window.ActiveXObject)
 {
 objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
 }
 return objXMLHttp;
 } 
</script>

<div id="content-outer">
<!-- start content -->
<div id="content">

<?php if(@($_GET['error'])){?>
<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error:- <?php echo $_GET['error'];?></td>
					
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div><?php } //echo ('<meta http-equiv="refresh" content="0;url=/crm/admin/add_user.php">');?>




<div id="page-heading">
  <h1>Specimen Voucher </h1>
</div>
<h4 style="color:red" align="center"><?php echo $error;?></h4>

<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
<form action="" method="post" enctype="multipart/form-data" id="formoid" name="form">
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
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
	
		<!-- start id-form -->
		<?php	

		 /* $q="select v_no from issue_voucher order by id desc LIMIT 1";
		   $r=mysql_query($q);
		   $row=mysql_fetch_row($r);
		   if($row!=0)
		   {
		   		 $old_num=$row[0];
				$a=substr($old_num, 6);
				$b=$a+1;
				$new_num = "SV0000".$b;
		   }
		   else{
		   	$new_num = "SV00001";
		   }*/
			

		//$voucher_no=mt_rand(1,8).time();
		?>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Voucher No.:</th>
			<td>Auto Generate<!--<input type="text" class="inp-form" name="v_no" value="<?php if(!isset($_SESSION['issue_voucher_session'])) {echo $new_num; //"VC".$voucher_no; 
		    }else
			{ echo $v_no; }?>"   />--></td>
			<th valign="top">Date:</th>
			<td><input type="text" name="v_date" class="inp-form" id="datepicker" value="<?php
echo date("Y-m-d"); 
?>"/></td>
  <?php if(!isset( $_SESSION['issue_voucher_session'])){?>
        </tr>
        <tr>
        <th>Godown:</th>
        <td><select name="godwon" class="inp-form-select"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT name FROM godwon_list ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>    </td>
	
    <th>Time:</th>
        <td><input type="text" name="v_time" class="inp-form" value="<?php
echo date("h:i:s"); 
?>"/></td>
	</tr>
    <?php
	$user_type1=$_SESSION['user_type'];
	$rt=$_SESSION['SESS_id'];
    list($d,$n)=mysql_fetch_array(mysql_query("SELECT department,name FROM department_list where user=$rt"));
	?>	
        <tr>
			<th valign="top">Department:</th>
			<td><select name="department" id="depart" class="inp-form-select" onchange="return onchangedepartment(this.value);"> 
		    
        <?php
				if($user_type1==1 || $user_type1==2)
				{
			    	$query=mysql_query("SELECT * FROM department");
					echo "<option value='' selected='selected'> Plz Select</option>";
				}
				else
				{
			    	$query=mysql_query("SELECT * FROM department where `department`='$d'");
				}
			    
			    while($value=mysql_fetch_array($query))
			      {			  
			  ?>			  
<option <?php if($value['department']==$d){ echo "selected"; } ?> value="<?php echo $value['department']; ?>"><?php echo $value['department']; ?></option>                 
			  <?php 
			     }   
              ?>
  </select></td>
			<th valign="top">Salesman name :</th>
			 <td><div id="departmentdiv"><select name="" class="inp-form-select"> 
		    <option value="<?php echo $n; ?>" selected="selected"><?php echo $n; ?></option>
      
  </select>
  </div>
   <input type="hidden" name="salseman_id" id="salseman_id" />
   <input type="hidden" name="salseman" id="salseman" />   
   
        </td>
		</tr>
       
     
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" value="" id="district" readonly="readonly"/></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="" id="state" readonly="readonly"/> </td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country"  id="country"value=""  readonly="readonly"/> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Transpotation:</th>
			<td><select class="inp-form-select" name="transportation" id="transport" onchange="return onchangetransport_type(this.value);">
			<option value="">Select</option>

			 <option value="By HAND">By HAND</option>
			 <option value="By COURIER">By COURIER</option>
			 <option value="By TRANSPORT">By TRANSPORT</option>	  
			</select></td>
			<th valign="top">Transport Type: </th>
			<td>
			
			<div id="voucher_transport_type">
			<select name="board" class="inp-form-select" > 
		   

 <option value="" selected="selected"> Plz Select</option>
  </select></div></td>
		</tr>
      
        <tr>
			<th valign="top">Details:</th>
			<td colspan="3"><textarea name="details" class="inp-form" style="height:40px; width:99%"></textarea></td>
			
        </tr>
        
        
        <tr>
			<th valign="top">Contact:</th>
			<td><select name="corporate_name" class="inp-form-select" id="tbl1" onchange="return onchangeissuevoucher(this.value);">
			<option value="">Select contact</option>

			<option value="Corporate">Corporate</option>
			<option value="School">School</option>
			<option value="Chain_of_school">Chain of school</option>
			
			</select></td>
			<th valign="top">Name:</th>
			<td><div id="issuevoucher_contact"><select class="inp-form-select" name="name_iv"><option>Select</option></select></div><input type="hidden" name="corporate_person" value="" id="corporate_person"/></td>
        </tr>
        <tr>
			<th valign="top">Address:</th>
			<td><input type="text" class="inp-form" name="c_address"  id="address0" readonly="readonly" /></td>
			<th valign="top">City:</th>
			<td> 
			<input type="text" class="inp-form" name="c_city" id="city0" readonly="readonly"  /></td>
        </tr>
        <tr>
			<th valign="top">District</th>
			<td>
			<input type="text" class="inp-form" name="c_district" value="" id="district0" readonly="readonly"/></td>
			<th valign="top">State:</th>
			<td>
			<input type="text" class="inp-form" name="c_state" value="" id="state0" readonly="readonly"/></td>
        </tr>
        <tr>
			<th valign="top">Country</th>
			<td>
			<input type="text" class="inp-form" name="c_country" value="" id="country0" readonly="readonly"/></td>
			<th valign="top">Teacher Copy:</th>
			<td>
			<select name="teachercopy" class="inp-form-select" >
			<option value="" selected="selected">Select </option>

			<option value="Yes">Yes</option>
			<option value="No">No</option>
			<option value="Nill">Nill</option>
			</select></td>
        </tr>

        
         <tr>
			<th valign="top">Remarks</th>
			<td colspan="3"><textarea class="inp-form" style="height:40px; width:99%" name="remarks"></textarea></td>			
		</tr>
        <?php } ?>
          <tr>
			<th>Group</th>
					<td><select name="group" id="group" class="inp-form-select "> 
			<option value="" selected="selected"> Plz Select</option>
			<option value="all" >Select All</option>
		<?php
				$query=mysql_query("SELECT DISTINCT subject FROM `item_master_list`");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option  value="<?php echo $value['subject']; ?>"><?php echo $value['subject']; ?></option>
			  <?php 
				 }   
			  ?>
	</select>      </td>					
					<th>Series</th>
					<td><select name="series" id="series" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
			<option value="all" >Select All</option>
		<?php
				$query=mysql_query("SELECT DISTINCT series FROM `series_master_list`");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option  value="<?php echo $value['series']; ?>"><?php echo $value['series']; ?></option>
			  <?php 
				 }   
			  ?>
	</select></td>
	      </tr>
		  <tr>
		   <th>Quantity</th> 
		   <td><input type="text" name="quantity" onkeyup="showbooklist()"  id="quantity"class="inp-form"/></td>
		   
			<th></th>			
					
         </tr>
		 <tr ><td colspan="4">
		 <table style="margin-left: 80px; width:100%">
		 <tr >
		  <td width="100">S.NO</td>
		  <td width="485">Book Name/series</td>
		  <td width="80" >Class</td>
		  <td >Qty</td>
		 </tr>
         <tr >
		  <td colspan="4" id="booklist"></td>
		 </tr>
		</table>
	    </td></tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />	
			
		</td>
		<td></td>
		<td><input type="submit" value="Finish" class="form-finish" name="finish" style="float:right"/></td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td>



</td>
</tr>
</table>
 
 <!--  start page-heading -->
	<div id="page-heading">
		<h1>Salesman's Specimen Voucher Listing</h1>
	</div>    
	<!-- end page-heading -->
    
	<table border="0"  width="100%" cellpadding="0" cellspacing="0" id="content-table">
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
                   <th class="table-header-repeat line-left"><a>Book Name</a></th>
                   <th class="table-header-repeat line-left"><a>Class</a></th>
                    <th class="table-header-repeat line-left"><a>Quantity</a></th>
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

	$tbl_name="all_voucher";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$code=$row['code'];
	if($search!=NULL)
	{$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE ($type= '$search') and (salseman_id='$salseman_id') and (relate=1) and (uid='$uid')";
	}
	else
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE (salseman_id='$salseman_id') and (relate=1)  and (uid='$uid')";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "add_voucher.php"; 	//your file name  (the name of this file)
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
	$sql = "SELECT * FROM $tbl_name WHERE (salseman_id='$salseman_id') AND ($type= '$search') AND (relate=1)  AND (uid='$uid')ORDER BY uid desc LIMIT $start, $limit";
	else
	$sql = "SELECT * FROM $tbl_name where (salseman_id='$salseman_id') AND (relate=1)  AND (uid='$uid') ORDER BY uid desc LIMIT $start, $limit";
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
					<td><?php echo $row['book_name']; ?></td>					
                     <td><?php echo $row['class']; ?></td>
					<td><?php echo $row['qty']; ?></td>                    
					<td class="options-width">      
					
                  
					<a href="delete.php?type=item_del&id=<?php echo base64_encode(convert_uuencode($row['id']));?>" onClick="if(!confirm('Are you sure, you want to delete this Information ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
				
				</td>
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
