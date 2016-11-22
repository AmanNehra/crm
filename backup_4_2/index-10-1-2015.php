<?php include('header.php');
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
//require_once('config.php');?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<?php

$user=mysql_query("SELECT * FROM dan_users where id='$userid'") or die(mysql_error()); 
$user= mysql_fetch_array($user);

?>
<!-- start content -->
<div id="content">
	<!--  start page-heading -->
	<div id="page-heading">
   <h2> Welcome to Skyland Publication.</h2>
		<h1>Hello <?php echo $user['user_name']; ?>!</h1>
	</div>
  
  <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
    <tr>
		<td id="tbl-border-left"></td>
		<td>
		<div id="content-table-inner">
			<div id="table-content">
				<div class="toby" style="float:left;margin-left:10%;">
                	<div style="font-family: Tahoma;font-size: 18px;font-weight: bold; color:#0099CC; margin-bottom:10px;">
					<a style="text-decoration:underline;">Login Information</a>
                        </div>
    		
            <table class="taby">
            <tr>
            <td class="data">
             <?php  $ag_id=$user['id'];
				 // $len=strlen($ag_id);
				  //substr_replace($string, "", -1)
				 // if ($len == 1){$ag_id='GF00000'.$ag_id;}elseif($len == 2){$ag_id='GF0000'.$ag_id;}elseif($len == 3){$ag_id='GF000'.$ag_id;}
				 // elseif($len == 4){$ag_id='GF00'.$ag_id;}elseif($len == 5){$ag_id='GF0'.$ag_id;}elseif($len == 6){$ag_id='GF'.$ag_id;}
				  ?>
                  
            Login ID :</td><td style="padding-left: 70px;"><?php echo $ag_id; ?></td></tr>
            <tr><td class="data">
            UserName :</td><td style="padding-left: 70px;"><?php echo $user['user_name']; ?></td></tr>
             <tr><td class="data">Email ID :</td><td style="padding-left: 70px;"><?php echo $user['user_email']; ?></td></tr>
              				 
             <?php /*?> <tr><td class="data">Profile Image :</td><td style="padding-left: 70px;"><img src="<?php echo $image;  ?>" width="60px" height="50px" /></td>
              </tr><?php */?>
              </table>
              </div>
             <!-- <div class="toby2" style="float:left;margin-left:10%;">
              	<div style="font-family: Tahoma;font-size: 18px;font-weight: bold; color:#0099CC; margin-bottom:10px;">
					<a style="text-decoration:underline;">My Registered Sales</a>
                        </div>
                        
                        
              
              </div>-->
              <?php if(isset($_POST['pass'])) {
$used_id = mysql_real_escape_string($_POST['used_id']);
$newpasword=mysql_real_escape_string($_POST['newpasword']);
$encrypt=md5($newpasword);

if(!empty($used_id)&& !empty($newpasword)){
$sqlll=mysql_query("UPDATE dan_users  SET user_pass='$encrypt', user_decrypt='$newpasword' WHERE id='$used_id'");

}

}
              ?>
              
              <div class="toby3" style="float:left;margin-left:10%;">
              	<div style="font-family: Tahoma;font-size: 18px;font-weight: bold; color:#0099CC; margin-bottom:10px;" id="canges">
					<a href="#" style="text-decoration:underline;">Change Password</a>
                        </div>
                        <div id="paso">
                        <form action="index.php" method="post" id="changep" name="changepassword" onsubmit="return validateForm()">
                        <div>
<input type="hidden" name="used_id"  value="<?php echo $userid; ?>"/>
<input id="new" type="text" name="newpasword" style="border:1px solid;height: 20px;width: 160px;margin-bottom: 5px;" placeholder="New Password.."/></div>
<div>
<input id="con" type="text" name="confirmpass" style="border:1px solid;height: 20px;width: 160px;margin-bottom: 5px;" placeholder="Confirm Password.."/></div>
<div>
<input style="margin-right:8px; cursor:pointer; background:#00FF00;" type="submit" value="Submit" name="pass" onclick="return validateForm()" />
<input type="reset" value="Cancel" id="cance" style="cursor:pointer; background:#00FF00;"/></div>
</form>
                        
              </div>
              </div>
              
              
              
             </div>
            </div>
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>

			<div class="clear"></div>
		<!--  end content-table-inner ............................................END  -->
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<?php include('footer.php');?>
<script>
$(document).ready(function(){
$('#changep').validate(
	{	
		
		rules:
		{
			"newpasword":
			{
				required:true,
				
			},
			"confirmpass":
			{
				required:true,
				
			},
		},
		messages:
		{
			"newpasword":
			{
				required:'This field is required.',
			},
			"confirmpass":
			{
				required:'This field is required.',
			},
		}
	});	
	});
	
	function validateForm()
{
  var a=document.getElementById('new').value;
  var b=document.getElementById('con').value;
  if(a!=b)
  {
    alert("Passwords are not matching");
    return false;
  }
  return true;
}
	</script>