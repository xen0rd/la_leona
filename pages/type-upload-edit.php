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
$id = mysql_real_escape_string($_POST["typeid"]);
$facid = mysql_real_escape_string($_POST["facid"]);
$code = mysql_real_escape_string($_POST["txtcode"]);
$name = mysql_real_escape_string($_POST["txtname"]);
$remarks = mysql_real_escape_string($_POST["txtremarks"]);
$status = mysql_real_escape_string($_POST["txtstatus"]);
$items = mysql_real_escape_string($_POST["txtitems"]);
$price1 = mysql_real_escape_string($_POST["txtprice1"]);
$price2 = mysql_real_escape_string($_POST["txtprice2"]);
$price3 = mysql_real_escape_string($_POST["txtprice3"]);
$perhead = mysql_real_escape_string($_POST["txtperhead"]);
$pax = mysql_real_escape_string($_POST["txtpax"]);
$disc = mysql_real_escape_string($_POST["txtdisc"]);
$prevpath = mysql_real_escape_string($_POST["imagepath"]);
$errors     = array();
$maxsize    = 2097152;

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 1000000))
	{
		if ($_FILES["file"]["error"] > 0)
			{
				echo "<script>alertify.error('File error!')</script>";
				//header("Refresh:1; url=type-maintenance.php?id=".$facid);
		}else {
				if (file_exists("images/".$_FILES["file"]["name"])){
					echo "<script>alertify.error('Image already exists!')</script>";
				}else{
					move_uploaded_file($_FILES["file"]["tmp_name"],"images/". $_FILES["file"]["name"]);
					echo "<script>alertify.success('Image uploaded!')</script>";
				}
				$sql="UPDATE tbltype set code ='$code', name ='$name', remarks='$remarks', status ='$status', pieces ='$items', price1 ='$price1', price2 ='$price2', price3 ='$price3', perhead ='$perhead', pax ='$pax', disc='$disc', image='images/".$_FILES["file"]["name"]."' where id=$id";
				//echo $sql;
				$result = mysql_query($sql);
				header("Refresh:1; url=type-maintenance.php?id=".$facid);
			}
	}else{
		echo "<script>alertify.error('Invalid file detail')</script>";
		header("Refresh:1; url=type-maintenance.php?id=".$facid);
	}
?>
</body>
</html>