<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$contact=$_POST['contact'];


if ($contact=='Corporate')
{
?>
<select name="corporate_person" class="inp-form-select" onchange="showaddres(this.value)"> 
		    <option value="" selected="selected" > Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM corporate_list");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
<?php } ?>

<?php
if ($contact=='School')
{
?>
<select name="corporate_person" class="inp-form-select" onchange="showaddres(this.value)" > 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM master_list");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
<?php } ?>

<?php
if ($contact=='Chain_of_school')
{
?>
<select name="" class="inp-form-select" onchange="showaddres(this.value)"> 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM chain_school_list ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
<?php } ?>