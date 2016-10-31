<?php
	include "connect.php";

	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$res = mysqli_query("SELECT * FROM tblregister where fldemail='$email'");
		if(mysqli_num_rows($res)){
			$out="not_ok";
		}else{
			$out="ok";
		}

	echo $out;
?>