<div>
<?php //echo "<pre>"; print_r($_REQUEST); die; 
$section=$_REQUEST['section'];
include ('config.php');
?>
<table id="my_table">
	<tr>
		<th valign="top" style="height: 30px">Item Name:</th>
		<td style="height: 30px">
			<select name="item[]" id="item<?php echo $section; ?>" class="inp-form2" onchange="showsubject<?php echo $section; ?>(this.value)">
				<option value="" selected="selected">Plz Select</option>
				<?php
				$query=mysql_query("SELECT id,item_name,class FROM item_master_list order by item_name");
				while($value=mysql_fetch_array($query))
					{			  
						?>			  
					<option <?php if($itme[1]==$value['item_name'])  echo 'selected="selected"';?>   value="<?php echo $value['id']; ?>"><?php echo $value['item_name']; ?></option>
					<?php 
					}
					$query=mysql_query("SELECT subject,class FROM item_master_list order by item_name");
					$data=mysql_fetch_array($query);
				   ?>
			</select>			
		</td>
        <th valign="top" style="width: 66px; height: 30px;">Subject:</th>
		<td style="height: 30px"><input type="text" class="inp-form2" name="subject[]" id="subject<?php echo $section; ?>" value="<?php echo $sub['1']; ?>" /></td>			
		<th valign="top" style="width: 66px; height: 30px;">Class:</th>
		<td style="height: 30px">
			<select class="inp-form2" name="class[]" id="class<?php echo $section; ?>" >
				<option value="" selected="selected">Plz select</option>
				<?php
			    $query=mysql_query("SELECT class FROM class ORDER BY class ");
			    while($value=mysql_fetch_array($query))
			    {
				?>			  
			    <option  <?php if($class['1']==$value['class']) echo ' selected="selected"' ;?> value="<?php echo $value['class']; ?>" ><?php echo $value['class']; ?></option>
				<?php 
			    }   
				?>
			</select>
		</td>  				
    </tr>
</table>
<input style="background-color:#407B69; color: rgb(255, 255, 255); font-size: 11px; font-weight: bold; padding: 3px 8px; border: medium none;" value="Remove" type="button" class="remove_field"  >
</div>