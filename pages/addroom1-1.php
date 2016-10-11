<?php
include('connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str)
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc())
			{
			$str = stripslashes($str);
			}
		return mysql_real_escape_string($str);
	}
 $roomno = $_POST['fldroomname'];
$roomname = $_POST['fldroomnumber'];
$equipmentcode = $_POST['fldequipmentcode'];
$equipname = $_POST['fldequipname'];	
$equipquantity = $_POST['fldequipquantity'];	
$statuss = $_POST['fldstatuss'];		
mysql_query("INSERT INTO room (fldroomnumber, fldroomname, fldequipname, fldequipmentcode,fldequipquantity,fldstatuss) VALUES('$roomname','$roomno','$equipname', '$equipmentcode','$equipquantity','$statuss')");

header("location: roomlist.php");
?>