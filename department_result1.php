<?php //echo "<pre>"; print_r($_REQUEST); die; 
session_start();
include ('config.php');
$dep=$_POST['department'];

?>
<select  class="inp-form-select" onchange="return show_book(this.value);" > 
		    <option value="" selected="selected"> Plz Select</option>
        <?php
			    $query=mysql_query("SELECT * FROM department_list where `department`='$dep' ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>" <?php if($value['user']==$_SESSION['SESS_id']){ echo "selected"; } ?>><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>