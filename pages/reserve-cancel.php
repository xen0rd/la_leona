<?php 
	session_start();
	include "connect.php";
	$trxnid = mysqli_real_escape_string($con, $_POST["trxnid"]);
	$cancel = mysqli_real_escape_string($con, $_POST["cancel"]);
	if($cancel=="cancelled"){
		$strcancel = $cancel;
	}else{
		$strcancel = "for cancellation";
	}
	$sql="UPDATE tblreservations set status='$strcancel' where trxnid=$trxnid";
	$result = mysqli_query($con, $sql);
	echo "success";
?>