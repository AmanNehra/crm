<div class="middle-body-main">
<div class="middle-body">
<div class="middle-insite-box01"><div class="middle-insite-box-heading">Welcome to Mascot Education Pvt. Ltd.</div></div>
<div class="middle-insite-box02">
<div class="mb-box01"><div class="mb-box01-text01">Hello <?php echo $user['user_name']; ?>!</div>
<div class="mb-box01-date-time">Date : <?php echo date('d/m/Y'); ?></div>
<div class="mb-box01-date-time">Time : <?php echo date('h:i a '); ?></div>
</div>
<div class="mb-box02">
<div class="mb-box02-image-box"><div class="mb-box02-image-box2"><img src="images/login-page-images/photo.png" width="120" height="130" /></div></div></div>
<div class="mb-box03">
<table width="335" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="middle" class="mb-box01-text02">Login Information</td>
  </tr>
  <tr>
    <td height="15" colspan="3" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td width="120" align="left" valign="middle" class="mb-box01-text03">
    <?php  $ag_id=$user['id'];
				 // $len=strlen($ag_id);
				  //substr_replace($string, "", -1)
				 // if ($len == 1){$ag_id='GF00000'.$ag_id;}elseif($len == 2){$ag_id='GF0000'.$ag_id;}elseif($len == 3){$ag_id='GF000'.$ag_id;}
				 // elseif($len == 4){$ag_id='GF00'.$ag_id;}elseif($len == 5){$ag_id='GF0'.$ag_id;}elseif($len == 6){$ag_id='GF'.$ag_id;}
				  ?>
    Login ID</td>
    <td width="20" align="left" valign="middle" class="mb-box01-text03">:</td>
    <td width="195" align="left" valign="middle" class="mb-box01-text04"><?php echo $ag_id; ?></td>
  </tr>
  <tr>
    <td height="10" colspan="3" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="mb-box01-text03">User Name</td>
    <td align="left" valign="middle" class="mb-box01-text03">:</td>
    <td align="left" valign="middle" class="mb-box01-text04"><?php echo $user['user_name']; ?></td>
  </tr>
  <tr>
    <td height="10" colspan="3" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="mb-box01-text03">Email ID</td>
    <td align="left" valign="middle" class="mb-box01-text03">:</td>
    <td align="left" valign="middle" class="mb-box01-text04"><?php echo $user['user_email']; ?></td>
  </tr>
  <tr>
    <td height="10" colspan="3" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><span class="mb-box01-text03">Executive Name</span></td>
    <td align="left" valign="middle"><span class="mb-box01-text03">:</span></td>
    <td align="left" valign="middle"><span class="mb-box01-text04"><?php echo $data['name'];?></span></td>
  </tr>
  <tr>
    <td height="10" colspan="3" align="left" valign="middle"></td>
    </tr>
  <tr>
    <td align="left" valign="middle"><span class="mb-box01-text03">Designation</span></td>
    <td align="left" valign="middle"><span class="mb-box01-text03">:</span></td>
    <td align="left" valign="middle"><span class="mb-box01-text04"><?php echo $data['designation'];?></span>
    
    </td>
  </tr>
  <tr>
    <td height="10" colspan="3" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><span class="mb-box01-text03">Contact No.</span></td>
    <td align="left" valign="middle"><span class="mb-box01-text03">:</span></td>
    <td align="left" valign="middle"><span class="mb-box01-text04"><?php echo $contact;?></span></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="middle">&nbsp;</td>
  </tr>
  <?php /*?> <tr><td class="data">Profile Image :</td><td style="padding-left: 70px;"><img src="<?php echo $image;  ?>" width="60px" height="50px" /></td>
              </tr><?php */?>
</table>

</div>

<?php if(isset($_POST['pass'])) {
$used_id = mysql_real_escape_string($_POST['used_id']);
$newpasword=mysql_real_escape_string($_POST['newpasword']);
$encrypt=md5($newpasword);

if(!empty($used_id)&& !empty($newpasword)){
$sqlll=mysql_query("UPDATE dan_users  SET user_pass='$encrypt', user_decrypt='$newpasword' WHERE id='$used_id'");

}

}
              ?>

<div class="mb-box04">
<div class="change-password-box">
<table width="175" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="left" valign="middle" class="change-pass-form-heading">Change Password</td>
  </tr>
  <tr>
    <td height="5" colspan="2" align="left" valign="middle"></td>
  </tr>
  <form action="index.php" method="post" id="changep" name="changepassword" onsubmit="return validateForm()">
  <input type="hidden" name="used_id"  value="<?php echo $userid; ?>"/>
  <tr>
    <td width="246" colspan="2" align="left" valign="middle"><input id="new" type="text" name="newpasword" placeholder="New Password" class="change-pass-form-text-one" /></td>
  </tr>
  <tr>
    <td height="5" colspan="2" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="middle"><input id="con" type="text" name="confirmpass" placeholder="Confirm Password" class="change-pass-form-text-one" /></td>
  </tr>
  <tr>
    <td height="5" colspan="2" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><input type="image" value="Submit" name="pass" onclick="return validateForm()" src="images/login-page-images/submit.png" alt="Submit" title="Submit" width="70" height="25" /></td>
    <td align="left" valign="middle"><input type="image" value="Cancel" id="cance" src="images/login-page-images/cancel.png" alt="Cancel" title="Cancel" width="70" height="25" /></td>
  </tr>
  </form>
</table>
</div>

</div>




</div>

</div>
</div>