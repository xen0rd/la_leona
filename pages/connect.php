<?php



/* Database config */

$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '1234';
$db_database	= 'dbresort';

/* End config */



$con = mysql_connect($db_host,$db_user,$db_pass,false,128) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$con);
mysql_query("SET names UTF8");

?>