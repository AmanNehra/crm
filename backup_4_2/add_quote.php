<?php include('header.php');?>
<!-- start content-outer -->
<?php if(isset($_POST['submit'])){
				$name=mysql_real_escape_string($_POST['user_name']);
				$email=mysql_real_escape_string($_POST['email']);
				$mobile=mysql_real_escape_string($_POST['phone']);
				$query=mysql_real_escape_string($_POST['query']);
				
				$type=$_POST['type'];
				$from=mysql_real_escape_string($_POST['from']);
				$scity=mysql_real_escape_string($_POST['scity']);
				$sarea=mysql_real_escape_string($_POST['sarea']);
				$to=mysql_real_escape_string($_POST['to']);
				$dcity=mysql_real_escape_string($_POST['dcity']);
				$darea=mysql_real_escape_string($_POST['darea']);
				$date = date('Y-m-d H:i:s');


$sql=mysql_query("INSERT INTO quotes (type, name, email, mobile, frm, scity, sarea, tu, dcity, darea, quote, date_added) VALUES ('$type', '$name', '$email', '$mobile', '$from', '$scity', '$sarea', '$to', '$dcity', 'darea', '$query', '$date')")or die(mysql_error());
    if($sql){
			 header('location:quotes.php');
			}else{
					echo '<script>';
					echo "alert('Quote could not be added please try again.')";
					echo '</script>';
					}
   
		} 
if(isset($_POST['edit'])){
			$id=$_POST['id'];
			$name=mysql_real_escape_string($_POST['user_name']);
			$email=mysql_real_escape_string($_POST['email']);
			$mobile=mysql_real_escape_string($_POST['phone']);
			$query=mysql_real_escape_string($_POST['query']);
			
			$type=$_POST['type'];
			$frm=mysql_real_escape_string($_POST['from']);
			$scity=mysql_real_escape_string($_POST['scity']);
			$sarea=mysql_real_escape_string($_POST['sarea']);
			$to=mysql_real_escape_string($_POST['to']);
			$dcity=mysql_real_escape_string($_POST['dcity']);
			$darea=mysql_real_escape_string($_POST['darea']);
			$date = date('Y-m-d H:i:s');
			
$sql=mysql_query("UPDATE quotes SET type='$type', name='$name', email='$email', mobile='$mobile', frm='$frm', tu='$to', quote='$query', date_added='$date', scity='$scity', sarea='$sarea', dcity='$dcity', darea='$darea' where id='$id'") or die(mysql_error());

 if($sql){
	 header('location:quotes.php');
		}else{
				echo '<script>';
				echo "alert('Quote could not be added please try again.')";
				echo '</script>';
			  }
   
		} 

?>
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
				</div><?php }?>

<div id="page-heading"><h1>Add New Quote</h1></div>
<a href="javascript:goback()" style="color:#FFFFFF;"><div class="addin">
    	Back
    </div></a>
    <?php $type=$_GET['type']; 
	
	if($type=='add'){?>
    
<form action="add_quote.php" method="post" enctype="multipart/form-data" id="formoid" name="form">
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
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
       	 <th>Enquiry Type:</th>
                <td>
                 <select name="type" style="width: 390px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
               <option VALUE="Packers Movers" selected="selected">Packers Movers</option>
                <option VALUE="Car Transportation">Car Transportation</option>
                 <option VALUE="Truck Booking">Truck Booking</option>
            </select>
            </td>
		</tr>
        
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="user_name" id="name" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" /></td>
			<td>
			
			</td>
		</tr>
		 
		<tr>
			<th valign="top">Mobile:</th>
			<td><input type="text" class="inp-form" name="phone" id="phone" maxlength="12" /></td>
			<td></td>
		</tr>
          <tr>
			<th valign="top">Source state:</th>
			<td><input type="text" class="inp-form" name="from" id="from" placeholder="Source state"/></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Source city:</th>
			<td><input type="text" class="inp-form" name="scity" id="scity" placeholder="Source city" /></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">Source area:</th>
			<td><input type="text" class="inp-form" name="sarea" id="sarea" placeholder="Source area" /></td>
			<td></td>
		</tr>
       
        
        <tr>
			<th valign="top">Destination state:</th>
			<td><input type="text" class="inp-form" name="to" id="to" placeholder="Destination state"/></td>
			<td></td>
		</tr>
          <tr>
			<th valign="top">Destination city:</th>
			<td><input type="text" class="inp-form" name="dcity" id="dcity" placeholder="Destination city" /></td>
			<td></td>
		</tr>
          <tr>
			<th valign="top">Destination area:</th>
			<td><input type="text" class="inp-form" name="darea" id="darea" placeholder="Destination area" /></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">Query:</th>
			<td><textarea style="width:390px; height:110px;border: 1px solid;border-radius: 4px;" name="query" id="query"></textarea></td>
			<td></td>
		</tr>
    
	<tr>
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
	<td>

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
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
<?php }elseif($type=='edit'){
$id=$_GET['id'];
$id = convert_uudecode(base64_decode($id));
 $result=mysql_query("SELECT * FROM `quotes` WHERE id='$id'") or die(mysql_error());
$row = mysql_fetch_array($result); 
 ?>

<form action="add_quote.php" method="post" enctype="multipart/form-data" id="formoid" name="form">
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
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">Enquiry Type:</th>
			 <td>
                 <select name="type" style="width: 390px;;border: 1px solid;height: 30px;border-radius: 4px;"> 
              		<option value="Packers Movers"<?php if($row['type'] == 'Packers Movers') { ?> selected="selected"<?php } ?>>Packers Movers</option>
  					<option value="Car Transportation"<?php if($row['type'] == 'Car Transportation') { ?> selected="selected"<?php } ?>>Car Transportation</option>
 					 <option value="Truck Booking"<?php if($row['type'] == 'Truck Booking') { ?> selected="selected"<?php } ?>>Truck Booking</option>
            </select>
            </td>
		</tr>
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="user_name" id="name" value="<?php echo $row['name']; ?>" />
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            </td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $row['email']; ?>" /></td>
			<td>
			
			</td>
		</tr>
		 
		<tr>
			<th valign="top">Mobile:</th>
			<td><input type="text" class="inp-form" name="phone" id="phone" maxlength="12"  value="<?php echo $row['mobile']; ?>" /></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">Source state:</th>
			<td><input type="text" class="inp-form" name="from" id="from" value="<?php echo $row['frm']; ?>" /></td>
			<td></td>
		</tr>
       
        <tr>
			<th valign="top">Source city:</th>
			<td><input type="text" class="inp-form" name="scity" id="scity" value="<?php echo $row['scity']; ?>" /></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">Source area:</th>
			<td><input type="text" class="inp-form" name="sarea" id="sarea" value="<?php echo $row['sarea']; ?>" /></td>
			<td></td>
		</tr>
        
        
         <tr>
			<th valign="top">Destination state:</th>
			<td><input type="text" class="inp-form" name="to" id="to" value="<?php echo $row['tu']; ?>"/></td>
			<td></td>
		</tr>
          <tr>
			<th valign="top">Destination city:</th>
			<td><input type="text" class="inp-form" name="dcity" id="dcity" value="<?php echo $row['dcity']; ?>" /></td>
			<td></td>
		</tr>
          <tr>
			<th valign="top">Destination area:</th>
			<td><input type="text" class="inp-form" name="darea" id="darea" value="<?php echo $row['darea']; ?>" /></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Query:</th>
			<td><textarea style="width:390px; height:110px;border: 1px solid;border-radius: 4px;" name="query" id="query"><?php echo $row['quote']; ?></textarea></td>
			<td></td>
		</tr>
	
    
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="edit" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  />
		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td>
</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
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
<?php }?>

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
				//remote:'check.php',
			},
			
			"email":
			{
				required:true,
				email:true,
				
			},
			"query":
			{
				required:true,
			},
			"from":
			{
				required:true,
			},
			
			"scity":
			{
				required:true,
			},
			"sarea":
			{
				required:true,
				
			},
			
			"to":
			{
				required:true,
			},
			
			"dcity":
			{
				required:true,
			},
			"darea":
			{
				required:true,
				
			},
			
			"phone":
			{
				required:true,
				number:true,
			},
						
		},
		messages:
		{
			"user_name":
			{
				required:'This field is required.',
				//remote:'Username Already Exists.',
			},
			
			"email":
			{
				required:'This field is required.',
				email:'Please enter valid email.',
				
			},
			"query":
			{
				required:'This field is required.',
			},
			"from":
			{
				required:'This field is required.',
			},
			
			"scity":
			{
				required:'This field is required.',
			},
			"sarea":
			{
				required:'This field is required.',
				number:'Please enter a valid Zipcode.',
			},
			"to":
			{
				required:'This field is required.',
			},
			
			"dcity":
			{
				required:'This field is required.',
			},
			"darea":
			{
				required:'This field is required.',
				number:'Please enter a valid Zipcode.',
			},
						
			"phone":
			{
				required:'This field is required.',
				number:'Please enter a valid phone no.',
			},
			
			
		}
	});
	}); 
	</script>
<?php include('footer.php');?>