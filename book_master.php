<?php 
error_reporting(0);
include('header.php');
include('function.php');
require_once('config.php');

$sid = convert_uudecode(base64_decode($_REQUEST['sid']));

if(isset($_POST['submit'])) {
$name=trim(strtoupper($_REQUEST['name']));
$code=trim(strtoupper($_REQUEST['code']));
$class=trim(strtoupper($_REQUEST['class']));
$subject=trim(strtoupper($_REQUEST['subject']));
$corporate=trim(strtoupper($_REQUEST['corporate']));
if($_FILES['f']['name']!="")
{
	$f_name=$_FILES['f']['name'];
	$temp=$_FILES['f']['tmp_name'];
	$dirname=time();
	$createdir=$_SERVER['DOCUMENT_ROOT']."/demo/crm/upload/book_master/".$dirname;
	mkdir($createdir);
	$target="$createdir/".$f_name;
	move_uploaded_file($temp,$target);
}
else
 { 
  $dirname="";  
 }
 
	$sql=mysql_query("INSERT INTO book_master(uid,school_name,code,class,subject,corporate,file_name) VALUES ('$sid','$name','$code','$class','$subject','$corporate','$dirname')")or die(mysql_error());
	     
	     
	     header("location:book_master.php?sid=".base64_encode(convert_uuencode($sid))); 


}
	$result=mysql_query("SELECT * FROM master_list WHERE id= '$sid' ") or die(mysql_error());
	$row = mysql_fetch_array($result);


if(isset($_REQUEST['download']))
 {
  $dir=$_REQUEST['download'];
  
 $path =$_SERVER['DOCUMENT_ROOT']."/demo/crm/upload/book_master/$dir";

if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;
       $f=$file;
        // do something with the file
    }
    closedir($handle);
	
}
$file ="$path/$f";
 if (file_exists($file)) {
 header('Content-Description: File Transfer');
 header('Content-Type: application/octet-stream');
 header("Content-Type: application/force-download");
 header('Content-Disposition: attachment; filename=' . urlencode(basename($file)));
// header('Content-Transfer-Encoding: binary');
 header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
 header('Pragma: public');
header('Content-Length: ' . filesize($file));
ob_clean();
flush();
 readfile($file);
 exit;
   }
/*if (file_exists($file)) {
    ob_start();
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');	
    header('Content-Length: ' . filesize($file));
	ob_flush();
	ob_clean();
    readfile($file);
    exit;
}
*/
}
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




<div id="page-heading"><h1>Add New Book Master</h1></div>
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
        <th valign="top" style="height: 22px">School Name:</th>
			<td style="height: 22px"><input type="text" class="inp-form" name="name" id="name" value="<?php if($_REQUEST['type']=="edit")
  {echo $row['school_name'];} else echo $row['name']; ?>" readonly="readonly" required/></td>   
        <th valign="top" style="height: 22px">Code:</th>
			<td style="height: 22px"><input type="text" class="inp-form" name="code"  value="<?php echo $row['code'];?>"id=""  readonly="readonly" required/></td>
         
	   </tr>
    <tr>
        <th valign="top">Class:</th>
			<td><select class="inp-form-select" name="class" id="class" >
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT class FROM class ORDER BY class ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['class']==$value['class']) echo ' selected="selected"' ;?> value="<?php echo $value['class']; ?>" ><?php echo $value['class']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
</td>
         <th valign="top">Subject:</th>
			<td><select class="inp-form-select" name="subject" id="subject" required>
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT subject FROM subject_master_list ORDER BY subject ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['subject']==$value['subject']) echo ' selected="selected"' ;?> value="<?php echo $value['subject']; ?>" ><?php echo $value['subject']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
 </td>   
	   </tr>
	   <tr>
	     <th valign="top">Corporate:</th>
			<td><select class="inp-form-select" name="corporate" id="corporate" required>
			<option value="" selected="selected"> Plz Select</option>
			 <?php
			    $query=mysql_query("SELECT name FROM corporate_list ORDER BY name ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  <?php if($row['corporate']==$value['name']) echo ' selected="selected"' ;?> value="<?php echo $value['name']; ?>" ><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
			   </select>
</td>
	    <th valign="top">Upload File:</th>
			<td><input  type="file" name="f"/></td>


	   </tr>
        
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td style="height: 96px">

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" />
<div id="content">
</form>

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Book Information Listing</h1>
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
   <table
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
                   <th class="table-header-repeat line-left"><a>School Name</a></th>
                   <th class="table-header-repeat line-left"><a>Code</a></th>
                    <th class="table-header-repeat line-left"><a>Class</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a>Subject</a>	</th>
                    <th class="table-header-repeat line-left minwidth-1"><a>Corporate</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a>Download</a>	</th>
 
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

	$tbl_name="book_master";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$uid=$row['id'];
	$uid_schlname=$row['name'];
	if($search!=NULL)
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE (uid='$uid') AND ($type= '$search')";
	else
	$query = "SELECT COUNT(*) as num FROM $tbl_name where (uid='$uid') ";
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	
	$total_pages = $total_pages['num'];
	//print_r($total_pages);die;
	/* Setup vars for query. */
	$targetpage = "book_master.php"; 	//your file name  (the name of this file)
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
	$sql = "SELECT * FROM $tbl_name WHERE (uid='$uid') AND ($type= '$search') ORDER BY id desc LIMIT $start, $limit";
	else
	$sql = "SELECT * FROM $tbl_name where (uid='$uid') ORDER BY id desc LIMIT $start, $limit";
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
					<td><?php echo $uid_schlname; ?></td>
					<td><?php echo $row['code']; ?></td>
                     <td><?php echo $row['class']; ?></td>
					<td><?php echo $row['subject']; ?></td>
					<td><?php echo $row['corporate']; ?></td>
                    <td><?php if($row['file_name']!="") {?><a href="book_master.php?download=<?php echo $row['file_name']; ?>&id=<?php echo base64_encode(convert_uuencode($id)); ?>" ><?php echo "Download File"; }else {?></a><?php  echo $row['file_name']; }?></td>
                     
					<td class="options-width">
                    
					<a href="book_info_edit.php?id=<?php echo base64_encode(convert_uuencode($row['id']));?>&sid=<?php echo base64_encode(convert_uuencode($sid));?>" title="Edit" class="icon-1 info-tooltip"></a>
                  <?php  if($user==1 || $user==2) { ?>
					<a href="delete.php?type=book11&id=<?php echo base64_encode(convert_uuencode($row['id']));?>&sid=<?php echo base64_encode(convert_uuencode($sid));?>" onClick="if(!confirm('Are you sure, you want to delete this Information ?')){return false;}" title="Delete" class="icon-2 info-tooltip" ></a>
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
