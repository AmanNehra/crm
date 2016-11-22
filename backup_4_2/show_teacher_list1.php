<?php 
include ('config.php');
include('function.php'); 
$code=$_REQUEST['code']; 
$num=$_REQUEST['num'];
if($num==1){
?>
<select class="inp-form-select" name="teacher<?php echo $num;?>">
<option value="" selected="selected">Plz select</option>
<?php 
$query=mysql_query("SELECT * FROM teacher_master_list WHERE code='$code'");
while($value=mysql_fetch_array($query)){
?>
<option value="<?php echo $value['id'];?>"><?php echo $value['teacher'];?></option>
<?php
}
?>
</select>
<?php } else {
$query=mysql_query("SELECT * FROM teacher_master_list WHERE code='$code'");
$value=mysql_fetch_array($query);
?>
<input type="text" value="<?php echo $value['school']; ?>"  name="to_school"class="inp-form" readonly="" required/>
<?php } ?>
