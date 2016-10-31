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
$id = mysqli_real_escape_string($con, $_POST["typeid"]);
$facid = mysqli_real_escape_string($con, $_POST["facid"]);
$prevpath = mysqli_real_escape_string($con, $_POST["imagepath"]);
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
				$sql="UPDATE tblreservations set image='images/".$_FILES["file"]["name"]."' where trxnid=$id";
				//echo $sql;
				$result = mysqli_query($con, $sql);
				header("Refresh:1; url=reservations.php?id=".$facid);
			}
	}else{
		echo "<script>alertify.error('Invalid file detail')</script>";
		header("Refresh:1; url=reservations.php?id=".$facid);
	}
?>
</body>
</html>