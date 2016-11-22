<?php $id = convert_uudecode(base64_decode($_GET['sid']));
$table = convert_uudecode(base64_decode($_GET['type'])); 
//echo "select * from `$table` where `id`='$id'";
$re_sample=mysql_fetch_object(mysql_query("select * from `$table` where `id`='$id'"));
//echo '<pre>'; print_r ($re_sample);
?>