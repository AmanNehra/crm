<?php include('header.php');
include('function.php');
error_reporting(0);
$sid = convert_uudecode(base64_decode($_REQUEST['sid']));

if(isset($_POST['submit'])) {
//echo '<pre>'; print_r($_REQUEST); die();
$code=$_REQUEST['code'];
$name=strupp($_REQUEST['name']);
$member=strupp($_REQUEST['member']);
$designation=strupp($_REQUEST['designation']);
$address=strupp($_REQUEST['address']);
$dob=$_REQUEST['dob'];
$mstatus=$_REQUEST['mstatus'];
$relation=strupp($_REQUEST['relation']);
$city=strupp($_REQUEST['city']);
$district=($_REQUEST['district']);
$state=strupp($_REQUEST['state']);
$country=strupp($_REQUEST['country']);
$pin=strupp($_REQUEST['pin']);
$std=strupp($_REQUEST['std']);
$phone1=strupp($_REQUEST['phone1']);
$mobile1=strupp($_REQUEST['mobile1']); 
$mobile2=strupp($_REQUEST['mobile2']);
$email=$_REQUEST['email'];

$sql=mysql_query("INSERT INTO chain_school_sub (sid,name, member, designation, address, dob, mstatus, relation,city, district, state, country, pin, std,phone1,mobile1, mobile2, email) VALUES ('$sid','$name', '$member', '$designation', '$address', '$dob','$mstatus', '$relation','$city','$district', '$state', '$country', '$pin', '$std', '$phone1','$mobile1', '$mobile2', '$email')")or die(mysql_error());
     header('location:chain_school2.php?sid='.base64_encode(convert_uuencode($sid))); 
}

   $result=mysql_query("SELECT * FROM chain_school_list WHERE id= '$sid' ") or die(mysql_error());
   $row = mysql_fetch_array($result);

 

?>
<!-- start content-outer -->
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	
	$("#item1").val("");
    $("#subject1").val("");
    $("#class1").val("");
    
    $("#item2").val("");
    $("#subject2").val("");
    $("#class2").val("");
    
    $("#item3").val("");
    $("#subject3").val("");
    $("#class3").val("");
    
    $("#item4").val("");
    $("#subject4").val("");
    $("#class4").val("");



	
	$("#add").click(function(){
    $("#a1").show();
    $("#b1").show();
    $("#add").hide();    
    });
    $("#remove1").click(function(){
    $("#a1").hide();
    $("#b1").hide();
    $("#add").show();
    
    $("#item1").val("");
    $("#subject1").val("");
    $("#class1").val("");
    
   });
   
   $("#add1").click(function(){
    $("#a2").show();
    $("#b2").show();
    $("#add1").hide();
    });
    $("#remove2").click(function(){
    $("#a2").hide();
    $("#b2").hide();
    $("#add1").show();
    
    $("#item2").val("");
    $("#subject2").val("");
    $("#class2").val("");
   });
   
    $("#add2").click(function(){
    $("#a3").show();
    $("#b3").show();
    $("#add2").hide();
    });
    $("#remove3").click(function(){
    $("#a3").hide();
    $("#b3").hide();
    $("#add2").show();
    
    $("#item3").val("");
    $("#subject3").val("");
    $("#class3").val("");

   });
   
   $("#add3").click(function(){
    $("#a4").show();
    $("#b4").show();
    $("#add3").hide();
    });
    $("#remove4").click(function(){
    $("#a4").hide();
    $("#b4").hide();
    $("#add3").show();
    
    $("#item4").val("");
    $("#subject4").val("");
    $("#class4").val("");

   });



   
});
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

<script>
 

    $(function() {

        $( "#datepicker" ).datepicker( {

            changeMonth: true,

        changeYear: true, yearRange: '-40:+10'});

    });

 $(function() {
$( "#datepicker1" ).datepicker({
changeMonth: true,
changeYear: true, yearRange: '-40:+10'
});
});
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

<div id="page-heading"><h1>Add New Member </h1></div>
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
		
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Chain Name:</th>
			<td><input type="text" class="inp-form" name="name" id="name" value="<?php echo $row['name']; ?>"  readonly/></td>
			<th valign="top" style="width: 66px">Member Name:</th>
			<td><input type="text" class="inp-form" name="member" id="member" /></td>
		</tr> 
		<tr>
			<th valign="top">Designation:</th>
			<td>  <select name="designation" id="pid" class="inp-form-select"> 
			     <option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT name FROM school_designation") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select>
            </td>
			<th valign="top" style="width: 66px">Address:</th>
			<td><input type="text" class="inp-form" name="address" id="address" value="" /></td>
		</tr>
    
		<tr>
			<th valign="top">DOB:</th>
			<td> <input type="text" class="inp-form"  id="datepicker"name="dob" />			
			</td>
			<th valign="top" style="width: 66px">M Satus:</th>
			<td> <input type="text" class="inp-form"  id="datepicker1" name="mstatus" /></td>
		</tr> 
      
		<tr id="p_school_old4">
			<th valign="top">City:</th>
			<td><input type="text" name="city" id="city" onkeyup="return pridiction(this.value);" autocomplete="off" class="inp-form" />
			    <div id="fill" class="fill" style="display:none;" >
				
				</div>		
			</td>
		<th valign="top" style="width: 66px">District:</th>
			<td><input type="text" class="inp-form" name="district"  id="district"value="" /></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state"  id="state"value="" /> </td>
			<th valign="top" style="width: 66px">Country:</th>
			<td><input type="text" class="inp-form" name="country" id="country" value="" /> </td>
		</tr>
        
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" id="pin" value="" /> </td>
			<th valign="top" style="width: 66px">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" id="std" value="" /> </td>
               
		</tr>
        
         <tr>
			<th valign="top">Relation:</th>
			<td> <select name="relation" id="relation" class="inp-form-select"> 
			    <option value="" selected="selected"> Plz Select</option>
      <?php $resultdesi=mysql_query("SELECT name FROM relation") or die(mysql_error());
            while ($resultdeg = mysql_fetch_array($resultdesi))   { ?>
			  <option VALUE="<?php echo $resultdeg['name']; ?>"><?php echo $resultdeg['name']; ?></option> 
			<?php } ?>   </select>
            </td>
			<th valign="top" style="width: 66px">Phone1:</th>
			<td><input type="text" class="inp-form" name="phone1" id="phone1" value="" /></td>
		</tr>
        
         <tr>
			<th valign="top">Phone 2:</th>
			<td><input type="text" class="inp-form" name="mobile1" id="mobile1" value="" /></td>
			<th valign="top" style="width: 66px">Mobile 1:</th>
			<td><input type="text" class="inp-form" name="mobile2" id="mobile2" value="" /></td>

		</tr>
	     <tr>
			<th valign="top">Email ID:</th>
			<td><input type="email" class="inp-form" name="email" id="email"  multiple  /></td>
			<th valign="top" style="width: 66px"></th>
			<td><td>
		</tr>   
       
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td style="width: 66px"></td>
	</tr>
	</table>
 <!--  start page-heading -->
	<div id="page-heading">
		<h1>Member Listing</h1>
	</div>
    <div style="width:100%;">
      <?php if($user==1){ ?><?php }?>    
     <?php
	if(isset($_POST['search'])) {
	 $search=mysql_real_escape_string($_REQUEST['value']);
	 $type=mysql_real_escape_string($_REQUEST['type']); 
	 }
	?>   
    </div>
	<!-- end page-heading -->
    
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
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesorter">
                  <thead>
                    <tr>
                      <!--<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
                      <th class="table-header-repeat line-left"><a>S. No.</a> </th>
                      <!-- <th class="table-header-repeat line-left"><a>Profile Image</a></th>-->
                      <th class="table-header-repeat line-left"><a>Chain Name</a></th>
                      <th class="table-header-repeat line-left"><a>Member Name</a></th>
                      <th class="table-header-repeat line-left"><a>Designation</a></th>
                      <th class="table-header-repeat line-left minwidth-1"><a>Address</a> </th>
                      <th class="table-header-repeat line-left minwidth-1"><a>Email</a> </th>
                      <th class="table-header-repeat line-left minwidth-1"><a>Phone/Mob</a> </th>
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

	$tbl_name="chain_school_sub";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	if($search!=NULL)
	{$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE(sid='$sid') AND ($type= '$search')";
	}
	else
	$query = "SELECT COUNT(*) as num FROM $tbl_name where sid='$sid' ";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "chain_school_sub"; 	//your file name  (the name of this file)
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
	$sql = "SELECT * FROM $tbl_name WHERE (sid='$sid') AND ($type= '$search') ORDER BY id desc LIMIT $start, $limit";
	else
	$sql = "SELECT * FROM $tbl_name where sid='$sid' ORDER BY id desc LIMIT $start, $limit";
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
                  </tbody>
                  <td><?php echo $count; ?></td>
                      <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['member']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone1'].",".$row['mobile1'].'<br>'; $row['mobile2']; ?></td>
                    <td class="options-width"><a href="chain_school2_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>&sid=<?php echo base64_encode(convert_uuencode($sid));?>" title="Edit" class="icon-1 info-tooltip"></a>
                          <?php  if($user==1 || $user==2) { ?>
                          <a href="delete.php?type=chain2&id=<?php echo base64_encode(convert_uuencode($row['id']));?>&sid=<?php echo base64_encode(convert_uuencode($sid));?>" onclick="if(!confirm('Are you sure, you want to delete this Information ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
                          <?php } ?>
                          <?php /*?>	<a href="reg_sale_info.php?id=<?php echo $row['id'];?>" title="Sales Registered" class="icon-4 info-tooltip"></a><?php */?></td>
                    <?php //}?>
                  </tr>                <?php $i++;
				}?>
                </table>
		<form id="mainform" action="">
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
