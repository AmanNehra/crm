<?php 
ob_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
require_once('config.php');
$userid=$_SESSION['SESS_id'];

if(empty($userid)){header('location:login.php');}
 $var=$_SESSION['SESS_id'];
 $data=mysql_query("SELECT * FROM dan_users where id='$var'") or die(mysql_error());
 $r = mysql_fetch_array($data);
$user=$r['user_type'];

if(isset($_GET['log']) && ($_GET['log']=='out')){
        //if the user logged out, delete any SESSION variables
	session_destroy();
	
        //then redirect to login page
	header('location:login.php');
}?> 
<?php $term=$_REQUEST['med'];
if($term)
{
 $agncy=mysql_query("SELECT * FROM quotes where id='$term'") or die(mysql_error());
 $rs = mysql_fetch_array($agncy);
$sizes=$rs['agency_added'];
//if($sizes==''){}else{
$sizes=unserialize($sizes);
//print_r($sizes);die;
?>
<form action="quotes.php" method="post" name="agent">
<table>
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td>
    <input type="hidden" name="enq_id" value="<?php echo $term; ?>">
    <?php if($sizes==''){?>
     <input type="hidden" name="type" value="add">
     <?php }else{?>
      <input type="hidden" name="type" value="edit"><?php }?>
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="ahmedabad" <?php if (!empty($sizes) && in_array("ahmedabad", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Ahmedabad</td>
    
  </tr>
</table>

    
    
    
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="Delhi1" <?php if (!empty($sizes) && in_array("Delhi1", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Delhi1</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="mumbai" <?php if ( !empty($sizes) && in_array("mumbai", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Mumbai</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>
    
    
    
    
    </td>
    <td>
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="bangalore" <?php if (!empty($sizes) && in_array("bangalore", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Bangalore</td>
  </tr>
</table>

    
    
    
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="gurgaon" <?php if (!empty($sizes) && in_array("gurgaon", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Gurgaon</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="nagpur" <?php if (!empty($sizes) && in_array("nagpur", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Nagpur</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>

    </td>
    
    
    <td>
    
    
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="bhuvaneshwar" <?php if (!empty($sizes) && in_array("bhuvaneshwar", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Bhuvaneshwar</td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="haldwani" <?php if (!empty($sizes) && in_array("haldwani", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Haldwani</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="patna" <?php if (!empty($sizes) && in_array("patna", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Patna</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>

    
    
    </td>
    
    
    
  </tr>
  
<!------------------------------------------------------->
  <tr>
 <td>
   
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="dehradun" <?php if (!empty($sizes) && in_array("dehradun", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Dehradun</td>
  </tr>
</table>


    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="kolkata" <?php if (!empty($sizes) && in_array("kolkata", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Kolkata</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="rudrapur" <?php if (!empty($sizes) && in_array("rudrapur", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Rudrapur</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>

    
    </td>
    <td>
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="cochin" <?php if (!empty($sizes) && in_array("cochin", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Cochin</td>
  </tr>
</table>

 
    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="jaipur" <?php if (!empty($sizes) && in_array("jaipur", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Jaipur</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="ranchi" <?php if (!empty($sizes) && in_array("ranchi", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Ranchi</td>
  </tr>
</table>
    
    
    </td>
  </tr>
</table>
    
    </td>
    <td>
    
    <table border="0">
  <tr>
    <td>
    
    <table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="chennai" <?php if (!empty($sizes) && in_array("chennai", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Chennai</td>
  </tr>
</table>


    </td>
  </tr>
  <tr>
    <td><table border="0">
  <tr>
    <td style="width:25px;"><input type="checkbox" name="asign[]" value="hyderabad" <?php if (!empty($sizes) && in_array("hyderabad", $sizes)) { echo "checked";} else {echo "";} ?>></td>
    <td style="width:95px;">Hyderabad</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td>
    
    <table border="0">
              <tr>
                <td style="width:25px;"><input type="checkbox" name="asign[]" value="pune" <?php if (!empty($sizes) && in_array("pune", $sizes)) { echo "checked";} else {echo "";} ?>></td>
                <td style="width:95px;">Pune</td>
              </tr>
		</table>
 
  			  </td>
  			</tr>
		</table>
    </td>
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td style="float:right; margin-right: 10px;">
  <input type="submit" name="agency" value="OK" style=" background:#66FF00; border:1px solid #000000; cursor:pointer;" />
  </td>
  </tr>
<!------------------------------------------------------->
</table>
</form>
<?php }
?>