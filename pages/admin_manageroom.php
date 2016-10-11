
	
<?php
include('admin_session.php');
?>

<?php
error_reporting(0);
?>

<?php echo date("Y-m-d");	
?>

 <font color="red">Admin User: <?php echo $login_session; ?></b></font>

<?php
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$reserve= $_REQUEST['reg'];

	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }
			if($_REQUEST['reserve']==$_REQUEST['reg'])
			{
				if($_REQUEST['confbut'] == "YES")
				{
					
						
					$sql="UPDATE tblroom SET fldtype = '$_REQUEST[type]', fldday = '$_REQUEST[day]', fldnight = '$_REQUEST[night]', fldavailable = '$_REQUEST[avail]' WHERE fldtype= '$_REQUEST[type]'";
					mysql_query($sql);
					
					
					header("location:price_room.php");
				}
				else
				{
					header("location:admin_manageroom.php?type=$_REQUEST[type]&form=1&type=$_REQUEST[type]&day=$_REQUEST[day]&night=$_REQUEST[night]&avail=$_REQUEST[avail]&conf=1");
			}		
			}
		mysql_close($con);
				}


$err = $_REQUEST['err'];
echo "<table>";
echo "<td>";
echo "<span class='spanpos7'>";
echo $err;
echo "</span>";
echo "</td>";
echo "</table>";

if ($_REQUEST['balance']=='$bill')
{
	$insert = "Reserved";
}
?>

<?php

$type=$_REQUEST['type'];

	
						
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblroom WHERE fldtype = '$type' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];

if($form == NULL)
{
	$type = $fld['fldtype'];
	$day = $fld['fldday'];
	$night = $fld['fldnight'];
	$avail = $fld['fldavailable'];


	

}
else if($form == 1)
{
	$type = $_REQUEST['type'];
	$day = $_REQUEST['day'];
	$night = $_REQUEST['night'];
	$avail = $_REQUEST['avail'];


}




?>
<form action="admin_manageroom.php" method="post">
		<input type="hidden" name="form" value="1">
					

	

			
						<input type="text" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden" type="date" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						<input type="hidden" type="time" name="start" value="<?php echo $_REQUEST['start']; ?>">
						<input type="hidden" type="time" name="end" value="<?php echo $_REQUEST['end']; ?>">
						<input type="hidden" type="text" name="hours" value="<?php echo $_REQUEST['hours']; ?>">
						
						<input type="hidden" type="downpayment" name="end" value="<?php echo $_REQUEST['downpayment']; ?>">
							
			
						<input type="hidden"  name="reserve" value="<?php echo $reserve; ?>"><br><br>
						Hall Type: <input class="textarea" type="text"  name="type" value="<?php echo $type; ?>">&nbsp;
						Day Price: <input class="textarea"   type="text" name="day" value="<?php echo $day; ?>"><br><br>
						
						Night Price: <input type="text" class="textarea"  name="night" value="<?php echo $night; ?>"><br><br>

						Available: <input class="textarea"   type="text" name="avail" value="<?php echo $avail; ?>"><br><br>
						
								
					
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<input type="submit" value="Update" formmethod="post"> <a href="reserved.php"><input type="button" name="back"value="Back"></a>
							<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							Are you sure you want to update this Reservation?<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
							<a href="reserved.php"><button type="button" class="buttons">NO</button></a>
							<?php
							}
						?>
						</form>
						
						
						
						
						
						
						
						