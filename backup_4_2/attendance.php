<?php include('header.php');?>
<!-- start content-outer -->
<?php 
if(isset($_POST['submit'])){
$explanation=mysql_real_escape_string($_POST['query']);
$date = date('Y-m-d H:i:s');

$sql=mysql_query("INSERT INTO attendance (emp_id, date_time_at, explanation) VALUES ('$userid', '$date', '$explanation')")or die(mysql_error());
    if($sql){
	 header('location:index.php');
	}else{
	echo '<script>';
	echo "alert('Attendance could not be added please try again.')";
	echo '</script>';
	}
}
?>

<div id="content-outer">
<!-- start content -->
<div id="content">
<?php if($user=='3'){header('location:index.php');}?>
<?php if(@($_GET['error'])){?>
<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error:- <?php echo $_GET['error'];?></td>
					
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div><?php } //echo ('<meta http-equiv="refresh" content="0;url=/crm/admin/add_user.php">');?>

<div id="page-heading"><h1>Mark Your Attendance</h1></div>
<a href="atten_list.php" style="color:#FFFFFF;"><div class="addin">
    Attendance listing
    </div></a>
    <?php $type=$_GET['type']; 
	
	//if($type=='add'){?>
    
<form action="attendance.php" method="post" enctype="multipart/form-data" id="formoid" name="form">
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
       <?php  ?>
        
        
		<tr>
			<th valign="top">Name:</th>
			<td><input type="text" class="inp-form" name="user_name" readonly="readonly" value="<?php echo $r['user_name']; ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" readonly="readonly" value="<?php echo $r['user_email']; ?>" /></td>
			<td>
			
			</td>
		</tr>
		<?php $result=mysql_query("SELECT * FROM attendance WHERE date(date_time_at) = CURDATE()") or die(mysql_error()); 
		$row = mysql_fetch_array($result);
		if($row['date_time_at']=='' && $user=='2'){?>
		
        <tr>
			<th valign="top">Attendance:</th>
			<td><input type="checkbox" id="att" name="checkbox" value="present"><span style=" margin-left:8%;font-style: italic;padding-top: 5px;display: block; color:#FF0000;">*click for present</span></td>
			<td></td>

		</tr>
		
		 <tr>
			<th valign="top">Explanation:</th>
			<td><textarea style="width:390px; height:110px;border: 1px solid;border-radius: 4px;" name="query" id="query"></textarea></td>
			
		</tr>
        <tr>
	<th>&nbsp;</th>
            <td><span style="font-style: italic;display: block; color:#FF0000;">*For any explanation write in above box.</span></td>
	</tr>
    <tr>
		
		<td valign="top">
			
		</td>
		<td><input type="submit" value="" class="form-submit" name="submit" onclick="if(!this.form.checkbox.checked){alert('You must mark your attendance.');return false}" />
			<input type="reset" value="" class="form-reset" onClick="this.form.reset()"  /></td>
	</tr>
		<?php }else{?>
         <tr>
			<th valign="top">Explanation:</th>
			<?php if($user=='1'){?><td><textarea style="width:390px; height:110px;border: 1px solid;border-radius: 4px;" readonly="readonly">
            
    Your don't need to mark attendance.</textarea></td><?php }else{?>
    <td><textarea style="width:390px; height:110px;border: 1px solid;border-radius: 4px;" readonly="readonly">
            
    Your attendance has already been marked.</textarea></td><?php } ?>
			
		</tr>
		 <tr>
		
		<td valign="top">
			
		</td>
		<td><input type="submit" value="" class="form-submit" onClick="alert('Your attendance has already been marked');return false;" />
			<input type="reset" value="" class="form-reset" onclick="alert('Your attendance has already been marked')"/></td>
	</tr>
		<?php }?>

	
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

      
<?php //}?>

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>

<?php include('footer.php');?>
