<?php 
error_reporting(0);
include('header.php');
include('function.php');

ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
//require_once('config.php');?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<?php

$user=mysql_query("SELECT * FROM dan_users where id='$userid'") or die(mysql_error()); 
$user= mysql_fetch_array($user);

//For executive name

$query="SELECT * FROM department_list WHERE user='$userid'";
$query=mysql_query($query);
$data=mysql_fetch_array($query);

if($data['phone1']!="")
  $contact=$data['phone1'];
if($data['mobile1']!="")
  $contact.=",".$data['mobile1'];
if($data['mobile2']!="")
  $contact.=",".$data['mobile2'];


//end

?>
<!-- start content -->

<!--Middle Body-->
<?php include ('dashboard_middle_content1.php');?>
<!--Middle Body End-->


<!--Middle Body Two-->
<?php include ('dashboard_middle_content2.php');?>
<!--Middle Body Two End-->









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
    
    