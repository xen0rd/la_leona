<?php 
	session_start();
	include "connect.php";
	$trxnid = mysql_real_escape_string($_POST["trxnid"]);
	$cancel = mysql_real_escape_string($_POST["cancel"]);
	if($cancel=="cancelled"){
		$strcancel = $cancel;
	}else{
		$strcancel = "for cancellation";
	}
	$sql="UPDATE tblreservations set status='$strcancel' where trxnid=$trxnid";
	$result = mysql_query($sql);
	echo "success";
?>