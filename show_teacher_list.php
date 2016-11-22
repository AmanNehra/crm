<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
include('function.php');       
$sid=$_REQUEST['sid'];

$query=mysql_query("SELECT * FROM teacher_master_list WHERE uid='$sid'");
$t=1;
while($value=mysql_fetch_array($query))
{ 
 $teacher_id=$value['id'];// for know id of Teacher for last visit detail
 $sub=$value['subject'];
 $sub=unserialize($sub);
  
 $qu=mysql_query("SELECT sampling_Date FROM book_sample_details WHERE teacher_id='$teacher_id' AND relate='SCHOOL' order by date desc");
 $d2=mysql_fetch_array($qu);
 $date=substr($d2['sampling_Date'],0,10); 
 //end of date
 
?>
<tr>
			<td ><input type="checkbox" name="teacher_id_<?php echo $t; ?>" value="<?php echo $value['id'];?>" class="textsmall"/></td>		
			
			<td ><input type="text" name="" value="<?php echo $value['teacher'];?>" class="textbig2" style=" width:150px;" /></td>			
			<td style="margin-left:20px;" ><input type="text" name="" value="<?php  foreach($sub as $s) if($s!="") echo $s.','; ?>" class="textbig2" /></td>
			<td style="margin-left:20px;" ><input  type="text" name="" value="<?php echo $date ;?>" class="textsmall" style="width:75px" /></td>	
			<input type="hidden" name="teacher_len" value="<?php echo $t; ?>"  />		
 </tr>
<?php $t+=1; } die();?>
