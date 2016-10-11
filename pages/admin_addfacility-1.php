<?php
include("connect.php");

$type = $_POST['type'];
$day = $_POST['day'];
$night = $_POST['night'];
$pax = $_POST['pax'];
$number = $_POST['number'];
$desc = $_POST['desc'];
$name = $_POST['name'];

if(isset($_POST['add-upload']))
{    
     
 $file = $_FILES['Pic']['name'];
 $file_loc = $_FILES['Pic']['tmp_name'];
 $file_size = $_FILES['Pic']['size'];
 $file_type = $_FILES['Pic']['type'];
 $folder="images/";
 // make file name in lower case 
move_uploaded_file($file_loc,$folder.$file);
mysql_query("INSERT INTO resort_rooms (fldroomname, fldtype, flddesc, fldday, fldnight, fldmaxpax, fldavailable, fldpic) VALUES ('$name','$type','$desc','$day','$night','$pax','$number','$file')");
header("location: manageroom2.php");
?>

<?php 
}
?>