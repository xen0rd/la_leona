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
$id = mysql_real_escape_string($_POST["facid"]);
$name = mysql_real_escape_string($_POST["txtname"]);
$desc = mysql_real_escape_string($_POST["txtdes"]);
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
				header("Refresh:1; url=facility-maintenance.php");
		}else {
				if (file_exists("images/".$_FILES["file"]["name"])){
					echo "<script>alertify.error('Image already exists!')</script>";
				}else{
					move_uploaded_file($_FILES["file"]["tmp_name"],"images/". $_FILES["file"]["name"]);
					echo "<script>alertify.success('Image uploaded!')</script>";
				}
				$sql="UPDATE tblfacilities set name ='$name', description='$desc', image='images/".$_FILES["file"]["name"]."' where id=$id";
				$result = mysql_query($sql);
				header("Refresh:1; url=facility-maintenance.php");
			}
	}else{
		echo "<script>alertify.error('Invalid file detail')</script>";
		header("Refresh:1; url=facility-maintenance.php");
	}
?>
</body>
</html>