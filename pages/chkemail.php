<?php
	include "connect.php";

	$email = mysql_real_escape_string($_POST["email"]);
	$res = mysql_query("SELECT * FROM tblregister where fldemail='$email'");
		if(mysql_num_rows($res)){
			$out="not_ok";
		}else{
			$out="ok";
		}

	echo $out;
?>