<?php include ('config.php');
if($_REQUEST['val']==1){
$country=$_REQUEST['country'];
?>
<select name="state"  onchange="return show_district(this.value)"class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
		<?php
				$query=mysql_query("SELECT DISTINCT state FROM location_maste_info_list WHERE country='$country' ORDER BY state");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option  <?php if($state==$value['state']) echo 'selected="selected"'; ?> value="<?php echo $value['state']; ?>"><?php echo $value['state']; ?></option>
			  <?php 
				 }   
			  ?>
	</select>
<?php } 

if($_REQUEST['val']==2){
$state=$_REQUEST['state'];
?>
<select name="district" onchange="show_city(this.value);show_city2(this.value);" class="inp-form-select"> 
		    <option  value="" selected="selected"> Plz Select</option>			
        <?php
			    $query=mysql_query("SELECT DISTINCT district FROM location_maste_info_list WHERE state='$state' ORDER BY district");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option <?php if($district==$value['district']) echo 'selected="selected"'; ?> value="<?php echo $value['district']; ?>"><?php echo $value['district']; ?></option>
			  <?php 
			     }   
              ?>
  </select>

<?php } 
if($_REQUEST['val']==3){
$district=$_REQUEST['district'];
?>
<select name="city" id="series" class="inp-form-select"> 
			<option value="" selected="selected"> Plz Select</option>
		<?php
				$query=mysql_query("SELECT DISTINCT city FROM location_maste_info_list WHERE district='$district' ORDER BY city");
				while($value=mysql_fetch_array($query))
				  {
			  
			  ?>			  
				 <option <?php if($city==$value['city']) echo 'selected="selected"'; ?> value="<?php echo $value['city']; ?>"><?php echo $value['city']; ?></option>
			  <?php 
				 }   
			  ?>
	</select>
<?php } ?>