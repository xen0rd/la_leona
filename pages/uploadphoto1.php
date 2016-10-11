
<?php
error_reporting(0);

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);

					
if(isset($_POST['btn_upload']))
{    
	
	$roomnumber = $_POST['roomtype'];  
 $file_name = $_FILES['file']['name'];// gets file name
  $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../uploadedpicture";//dapat meron na kayo na gawang folder 
 
 move_uploaded_file($file_loc,$folder.$file_name);
 
 $sql="INSERT INTO tblphoto(`fldtype`, `imagefile`, `imagetype`, `imagesize`) 
 VALUES ('".$roomnumber."','".$file_name."','".$file_type."','".$file_size."')";
	
 $result = mysql_query($sql); 

 header("Refresh:0; url=managehut.php?reg=$roomnumber");
 						
					?> <input type="hidden" name="roomnumber" value="<?php echo $roomnumber;?>"> <?php

}

if(isset($_POST['btn_uploadevent']))
{    
	
	$roomnumber = $_POST['roomnumber'];  
 $file_name = $_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../uploadedpicture/";
 
 move_uploaded_file($file_loc,$folder.$file_name);
 
 $sql="INSERT INTO `photoevent_table`(`hall_number`, `imagefile`, `imagetype`, `imagesize`, `photo_status`) 
 VALUES ('".$roomnumber."','".$file_name."','".$file_type."','".$file_size."', '')";
 
 $result = mysql_query($sql); 

 header("Refresh:0; url=manageevent.php");
}




?>

