<?php
define('HTTP_admin_ROOT',"http://".$_SERVER['HTTP_HOST']."/crm/admin/");
mysql_connect("localhost", "newtruck_truck", "truck@123") or die(mysql_error()); 
mysql_select_db("newtruck_truckcrm") or die(mysql_error()); 

?>