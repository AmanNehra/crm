<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$id=$_POST['id'];
$q=mysql_query("SELECT code,name FROM corporate_list WHERE (id='$id')");
$d=mysql_fetch_array($q);

$corporate=$d['name']; 

$q1=mysql_query("SELECT * FROM corporate_sub where (uid='$id')");
?>
<select name="" id="corporate_id"  class="inp-form-select" onchange="return corporate_persion_data(this.value);">
<option selected="selected" value="">Select</option>
<?php
while($value=mysql_fetch_array($q1))
{ 
?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['persion']; ?></option>
<?php }?>
</select>
<input type="hidden" name="corporate" id="corporate" value="<?php echo $corporate; ?>"  />