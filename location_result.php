
<?php  
require_once('config.php');
$pid = $_REQUEST['id'];  
$resultboard=mysql_query("SELECT * FROM location_maste_info_list WHERE id= '$pid' ");
$result = mysql_fetch_array($resultboard); ?>  
			<table><tr>
			<th valign="top">City:</th>
			<td> <select name="city" id="pid" style="width: 390px;;border: 1px solid;height: 30px;border-radius: 4px;" onchange="return onchangeajax(this.value);"> 
      <?php $resultcity=mysql_query("SELECT * FROM location_maste_info_list") or die(mysql_error());
            while ($resultcty = mysql_fetch_array($resultcity))   { ?>
			  <option VALUE="<?php echo $resultcty['id']; ?>"><?php echo $resultcty['city']; ?></option> 
			<?php } ?>   </select></td>
		<th valign="top">District:</th>
			<td><input type="text" class="inp-form" name="district" value="<?php echo $result['district']; ?>" /></td>
		</tr> 
        <tr id="p_school_old1">
			<th valign="top" >State:</th>
			<td><input type="text" class="inp-form" name="state" value="<?php echo $result['state']; ?>" /> </td>
			<th valign="top">Country:</th>
			<td><input type="text" class="inp-form" name="country" value="<?php echo $result['country']; ?>" /> </td>
		</tr> 
         <tr id="p_school_old2">
			<th valign="top">Pin Code:</th>
			<td><input type="text" class="inp-form" name="pin" value="<?php echo $result['pin']; ?>" /> </td>
			<th valign="top">Std Code:</th>
			<td><input type="text" class="inp-form" name="std" value="<?php echo $result['std']; ?>" /> </td> 
		</tr></table>
	 
       