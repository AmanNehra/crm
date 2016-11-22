<?php
require_once('config.php');
$username = $_REQUEST["user_name"];
//echo $email;die;

	$sql = mysql_query("select * from dan_users where `user_name`='$username'") or die(mysql_error());;
	
	//$row=mysql_fetch_array($sql);
	//echo $row['firstname'];die;
	   if(mysql_num_rows($sql)>=1)
    {
         echo "false";die;
    }
    else
    {
        echo "true";die;
    }
	

?>