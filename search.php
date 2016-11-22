<?php
include('header.php');
require_once('config.php');
if(isset($_POST['submit']))
{
$query = $_POST['query'];
?>

<?php
$min_length = 1;
if(strlen($query) >= $min_length)
{
$query = htmlspecialchars($query);
$query = mysql_real_escape_string($query);
$raw_results = mysql_query("SELECT * FROM dan_users WHERE (`user_name` LIKE '%".$query."%') OR (`user_email` LIKE '%".$query."%')");
if(mysql_num_rows($raw_results) > 0)
{
while($results = mysql_fetch_array($raw_results))
{
echo $results['user_name'].'<br>'.$results['user_email'];
}

}
else{
echo "No results";
}
}
else{
echo "Minimum length is ".$min_length;
}}

?>
<?php include('footer.php');?>