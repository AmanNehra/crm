<?php 
include_once("config.php");
$val=$_REQUEST['val'];
if($val!=""){
$query="SELECT * FROM location_maste_info_list WHERE city LIKE '$val%' order by city ";
$query=mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_array($query)){
?>
<label id="<?php echo $row['id']; ?>" onclick="showlocation(this.id)"><b><?php echo $row['city']; ?></b></label><br />
<?php } }?>
<style type="text/css">
label:hover{
    background:#C2F0C2;
	width: 257px;
	cursor:pointer;
	 }

</style>