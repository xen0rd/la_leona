<?php
	require_once("../pages/connect.php");
	$result = mysqli_query($con,"SELECT * FROM tblinventory_function");
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($data);
?>