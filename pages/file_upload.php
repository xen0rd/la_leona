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
$name = mysql_real_escape_string($_POST["txtname"]);
$desc = mysql_real_escape_string($_POST["txtdes"]);
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
				//echo "File Error : " . $_FILES["file"]["error"] . "<br />";
				echo "<script>alertify.error('File error!')</script>";
				header("Refresh:1; url=facility-new.php");
		}else {
				//echo "Upload File Name: " . $_FILES["file"]["name"] . "<br />";
				//echo "File Type: " . $_FILES["file"]["type"] . "<br />";
				//echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br /><br />";

				if (file_exists("images/".$_FILES["file"]["name"])){
					//echo "<b>".$_FILES["file"]["name"] . " already exists. </b>";
					echo "<script>alertify.error('Image already exists!')</script>";
				}else{
					move_uploaded_file($_FILES["file"]["tmp_name"],"images/". $_FILES["file"]["name"]);
					//echo "Stored in: " . "images/" . $_FILES["file"]["name"]."<br />";
					//echo "Uploaded File:<br>";
					//echo "<img src=\"images/".$_FILES["file"]["name"]. "\" alt=\"Image path Invalid\">";
					echo "<script>alertify.success('Image uploaded!')</script>";
				}
				$sql="INSERT INTO tblfacilities(name,description,image) VALUES ('$name','$desc','images/".$_FILES["file"]["name"]."')";
					//echo $sql;
				$result = mysql_query($sql);
				header("Refresh:1; url=facility-maintenance.php");
			}
	}else{
		//echo "Invalid file detail ::<br> file type ::".$_FILES["file"]["type"]." , file size::: ".$_FILES["file"]["size"];
		echo "<script>alertify.error('Invalid file detail')</script>";
		header("Refresh:1; url=facility-new.php");
	}
?>
</body>
</html>