<?php



/* Database config */

$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'dbresort';

/* End config */



$con = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

//mysql_select_db($db_database,$con);
//mysql_query("SET names UTF8");

?>