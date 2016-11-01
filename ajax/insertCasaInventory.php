<?php
	require_once("../pages/connect.php");
	$facilityId = $_POST['facilityId'];
	$code = $_POST['itemCode'];
	$name = $_POST['itemName'];
	$remarks = $_POST['itemRemarks'];
	$quantity = $_POST['itemQuantity'];
	$price = $_POST['itemPrice'];
	$query = mysqli_query($con,"INSERT INTO tblinventory_casa (CODE,NAME,REMARKS,TOTAL_QUANTITY,FEE) VALUES ('$code','$name','$remarks','$quantity','$price')");
	header('location: ../pages/inventory_details.php?id='.$facilityId);
?>