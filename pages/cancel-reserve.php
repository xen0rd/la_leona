<?php 
	session_start();
	if($_SESSION['login_type']=="customer"){
		$strcancel = "for cancellation";
	}else{
		$strcancel = "cancelled";
	}	
	include "connect.php";
	$trxnid = mysqli_real_escape_string($con, $_POST["trxnid"]);
	$reason = mysqli_real_escape_string($con, $_POST["reason"]);

	$sql="UPDATE tblreservations set status='$strcancel', reason='$reason' where trxnid='$trxnid'";
	$result = mysqli_query($con, $sql);
	echo "success";
?>