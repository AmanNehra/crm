<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$transport=$_POST['transport'];


?>
<select name="transport_type" class="inp-form-select" > 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			 // echo "SELECT * FROM transportation where `transport`='$transport'";
			   $query=mysql_query("SELECT * FROM transportation where `transport`='$transport'");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['detail']; ?>"><?php echo $value['detail']; ?></option>
			  <?php 
			     }   
              ?>
  </select>
