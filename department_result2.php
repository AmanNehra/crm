<?php //echo "<pre>"; print_r($_REQUEST); die; 
include ('config.php');
$dep=$_POST['department'];
session_start();
?>
<select  class="inp-form-select" name="salesman_id" > 
		    <option value="" selected="selected"> Plz Select</option>
        <?php 
		    $query=mysql_query("SELECT d.id as id ,d.name as name FROM dan_users as u left join department_list as d ON u.id=d.user where d.department='$dep' ");
			    while($value=mysql_fetch_array($query))
			      {
			  
			  ?>			  
			     <option  value="<?php echo $value['id']; ?>" <?php if($value['user']==$_SESSION['SESS_id']){ echo "selected"; } ?>><?php echo $value['name']; ?></option>
			  <?php 
			     }   
              ?>
  </select>