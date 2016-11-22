<?php 
include('config.php');

	$ssn = '60';
	$_SESSION['SESS_id'] = $ssn;

	$query = mysql_query("select city from working_area where salesman_id in (".$ssn.")");
	while ($row = mysql_fetch_assoc($query)) {
  	$r =   unserialize($row["city"]);
	}
	foreach ($r as $key => $value) {
	echo $value."<br>";
	}


?>