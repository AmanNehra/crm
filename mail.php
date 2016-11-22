<?php 
require_once('config.php');
$to=$_GET['mail'];
//echo $to;die;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<title>Send Mail</title>
<link href="css/styal.css" rel="stylesheet" type="text/css">
<style>label.error{ color:#FF0000;}</style>
<script type="text/javascript">           
  $(document).ready(function() {

 //alert('hello');
	$('#formo').validate(
	{	
		//alert('hello');
		rules:
		{
			"subject":
			{
				required:true,
			},
			"message":
			{
				required:true,
			},
			"tomail":
			{
				required:true,
				email:true,
			},
						
		},
		messages:
		{
			"subject":
			{
				required:'This field is required.',
			},
			"message":
			{
				required:'This field is required.',
			},
			"tomail":
			{
				required:'This field is required.',
				email:'Please fill a valid email.',
			},
						
		}
	});
	}); 
	</script>

</head>

<body>
<div class="mane">



<div class="pag-to-ouater">
<div class="page-top">
Send Mail
</div>
<form action="mail.php" method="post" id="formo">
<div class="mailin">

        <div style="float:left;padding-right:10%; margin-left:20%; padding-bottom:20px;">
        <span style="font-weight:bold;">To:</span> <input type="text" class="inp-form" name="tomail" id="tom" value="<?php echo $to; ?>"/>
        </div>
        <div style="padding-bottom:20px;">
        <span style="font-weight:bold;">From:</span> <!--<input type="text" class="inp-form" name="fromail" id="frm" value="danstring@gmail.com" />-->
        <select name="fromail" id="frm"> 
       <option VALUE="support@genuinefix.com" selected="selected">support@genuinefix.com</option>
        <option VALUE="sales@genuinefix.com">sales@genuinefix.com</option>
        <option VALUE="danstring@gmail.com">danstring@gmail.com</option>
    </select>
        </div>

<div style=" margin-top:10px;margin-left:16.5%;padding-bottom:20px;">
<span style="font-weight:bold; margin-right:2px;">Subject:</span><input type="text" class="inp-form" name="subject" id="subject" />
</div>
<div style=" margin-top:10px;margin-left:15%;padding-bottom:20px;">
<span style="font-weight:bold; margin-right:2px;">Message:</span><textarea name="message" id="message" rows="6"></textarea>
</div>
<input type="submit" value="Send" name="submit" style="margin-top:10px; float:right; margin-right:23.2%" />
</div>
</form>



</div>

</div>
<?php 
if(isset($_POST['submit'])){
//print_r($row);die;
$name ="GENUINEFIX";
	$email_from =$name.$_POST['fromail']; // Who the email is from  
  $email_subject = $_POST['subject']; // The Subject of the email  
  $email_message = $_POST['message'];
 
  
  $email_to = $_POST['tomail']; // Who the email is to  
  
  $headers = "From: ".$email_from;  
   
  $semi_rand = md5(time());  
  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
   
  $headers .= "\nMIME-Version: 1.0\n" .  
     "Content-Type: multipart/mixed;\n" .  
     " boundary=\"{$mime_boundary}\"";  
  
  $email_message .= "This is a multi-part message in MIME format.\n\n" .  
                "--{$mime_boundary}\n" .  
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" .  
               "Content-Transfer-Encoding: 7bit\n\n" .  
  $email_message .= "\n\n";  
  
  $email_message .= "--{$mime_boundary}\n";  
        
   $ok = @mail($email_to, $email_subject, $email_message, $headers);  
  
  if($ok) { 
  $succ="Mail Sent!";
  echo "<script>alert('$succ')</script>";
 echo "<script>window.close();</script>";
  
  } else {  
  die("Sorry but the email could not be sent. Please go back and try again!");  
  } }  
  ?>
</body>
</html>
