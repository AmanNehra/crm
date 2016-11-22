<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$id=$_POST['id']; 
			 
$q=mysql_query("SELECT code,address,phone1,phone2,mobile FROM master_list WHERE (id='$id')");
$d=mysql_fetch_array($q);

$q1=mysql_query("SELECT * FROM teacher_master_list where (uid='$id')");
?>
<select name="" id="given"  class="inp-form-select" onchange="return teacher_data(this.value);">
<option selected="selected" value="">Select</option>
<?php
while($value=mysql_fetch_array($q1))
{ 
?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['teacher']; ?></option>

 <?php }?>
</select>