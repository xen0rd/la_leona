<?php 
	session_start();
	if($_SESSION['login_type']=="customer"){
		$strcancel = "for cancellation";
	}else{
		$strcancel = "cancelled";
	}	
	include "connect.php";
	$trxnid = mysql_real_escape_string($_POST["trxnid"]);
	$sql="UPDATE tblreservations set status='$strcancel' where trxnid=$trxnid";
	$result = mysql_query($sql);
	echo "success";
?>