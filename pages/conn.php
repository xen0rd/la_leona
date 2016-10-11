<?php 

	$con = mysql_connect("x05", "laleonar_resort", "lresort123");
	
	if (!con)
	{
		die('Could not connect: ' . myslq_error());
	}
		mysql_select_db("laleonar_dbresort", $con);
?>