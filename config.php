<?php
error_reporting(0);
define('HTTP_admin_ROOT',"http://".$_SERVER['HTTP_HOST']."/crm/");

		$full_name = $_SERVER['PHP_SELF'];
        $name_array = explode('/',$full_name);
        $count = count($name_array);
        $page_name = $name_array[$count-1];


mysql_connect("localhost", "root", "root") or die(mysql_error()); 
mysql_select_db("nitu_crm") or die(mysql_error());

?>