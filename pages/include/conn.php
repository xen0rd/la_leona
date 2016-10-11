<?php
$con = mysql_connect();
if(!$con)
{
	die('could not connect: ' . mysql_connect());
}

	mysql_select_db("dbprint", $con);
	?>