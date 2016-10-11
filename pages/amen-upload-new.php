<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<link rel="stylesheet" href="css/alertify.core.css">
    <link rel="stylesheet" href="css/alertify.default.css">
    <script src="js/alertify.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
</head>
<body>
<?php
include "connect.php";
$facid = mysql_real_escape_string($_POST["facid"]);
$code = mysql_real_escape_string($_POST["txtcode"]);
$name = mysql_real_escape_string($_POST["txtname"]);
$remarks = mysql_real_escape_string($_POST["txtremarks"]);
$status = mysql_real_escape_string($_POST["txtstatus"]);
$items = mysql_real_escape_string($_POST["txtitems"]);
$price1 = mysql_real_escape_string($_POST["txtprice1"]);
$price2 = mysql_real_escape_string($_POST["txtprice2"]);
$price3 = mysql_real_escape_string($_POST["txtprice3"]);
$disc = mysql_real_escape_string($_POST["txtdisc"]);
$errors     = array();
$maxsize    = 2097152;

	$sql="INSERT into tblamenities(facid,devcode,devname,remarks,status,pieces,price1,price2,price3,disc) VALUES($facid,'$code','$name','$remarks','$status','$items','$price1','$price2','$price3','$disc')";

	//echo $sql;
	$result = mysql_query($sql);
	header("Refresh:1; url=amenities-maintenance.php?facid=".$facid);
?>
</body>
</html>