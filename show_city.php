<?php
require_once('config.php');
$state=$_REQUEST['state'];
$district=$_REQUEST['district'];
$i=1;
$query=mysql_query("SELECT city FROM location_maste_info_list WHERE state='$state' AND district='$district' ORDER BY city");
while($row=mysql_fetch_assoc($query) or die(mysql_error())) {
?>
<input style="height: 13px; margin-right:6px;" <?php /*$val=checkbox($subpages,21); echo $val;*/?> type="checkbox" name="city[]" value="<?php echo $row['city']; ?>"><span style="padding-right: 20px;line-height: 20px;"><?php echo $row['city']; ?></span>
<?php $i++; if($i%5==0) echo '<br>'; } ?>