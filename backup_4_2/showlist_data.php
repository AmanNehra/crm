<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');

$group=$_POST['group'];
$series=mysql_real_escape_string($_POST['series']);
$quantity=mysql_real_escape_string($_POST['quantity']);
$discount=mysql_real_escape_string($_POST['discount']);

if(($group=="all") || ($series=="all"))
$query=mysql_query("SELECT * FROM item_master_list");   
else			 
$query=mysql_query("SELECT * FROM item_master_list where (`subject`='$group') OR (`series`='$series')");
$i=1;
$net=0;
$gross=0;
while($value=mysql_fetch_array($query))
{ 
 $amount=($value['price']-(($value['price']*$discount)/100))*$quantity;//for amount of item after discount;
 
 $net+=$amount;
 $gross+=$value['price']*$quantity;
?>
<tr>
			<td ><input type="text" name="" value="<?php echo $i;?>"  class="textsmall"/></td>
			<td ><input type="hidden" name="book_id_<?php echo $i; ?>" value="<?php echo $value['id'];?>"  class="textsmall"/></td>
			<td ><input type="text" name="book_name_<?php echo $i; ?>" value="<?php echo $value['item_name'];?>" class="textbig" style="width: 300px;"  readonly=""/></td>
			<td  ><input type="text" name="class_<?php echo $i; ?>" value="<?php echo $value['class'];?>" class="textsmall" readonly=""/></td>
			<td style="margin-left:20px;" ><input type="text" name="qty_<?php echo $i; ?>" value="<?php echo $quantity ;?>" class="textsmall" readonly=""/></td>
			<td style="margin-left:20px;" ><input  type="text" name="price_<?php echo $i; ?>" value="<?php echo $value['price'] ;?>" class="textsmall" readonly="" /></td>	
			<td style="margin-left:20px;" ><input  type="text" name="discount_<?php echo $i; ?>" value="<?php echo $discount ;?>" class="textsmall" readonly="" /></td>	
			<td style="margin-left:20px;" ><input  type="text" name="amount_<?php echo $i; ?>" value="<?php echo $amount ;?>" class="textsmall" readonly="" /></td>				
 </tr>
<?php $i+=1; } ?>
<tr>
<td colspan="7">
<table>
<tr>
<th style="padding-left: 0px;">Net Amount</th>
<td><input name="net_amount" id="net_amount" type="text" class="inp-form" value="<?php echo $net; ?>" readonly="" style="width: 236px;"/></td>
<th>Gross Amount</th>
<td><input name="gross_amount" id="gross_amount" type="text" value="<?php echo $gross; ?>" class="inp-form" readonly="" style="width: 205px;"/></td>
</tr>
</table>
</td>
</tr>
<input type="hidden" name="len" value="<?php echo $i; ?>"  />
<?php die(); ?>