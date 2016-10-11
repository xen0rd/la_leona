
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
		
				if($_REQUEST['confbut'] == "YES")
				{
					
				$sql="UPDATE tblwalkin SET username = '$login_session', RegNo = '$_REQUEST[reg]', fldarrival = '$_REQUEST[checkin]', flddeparture = '$_REQUEST[checkout]', fldadult = '$_REQUEST[adult]', fldchild = '$_REQUEST[child]', fldstaytype = '$_REQUEST[types]', fldroomtype = '$_REQUEST[roomtype]' WHERE RegNo = '$_REQUEST[reg]'";
					mysql_query($sql);
					header("location:resort_walkin.php");
					}
					else
					{
					header("location:admin_managewalkin.php?reg=$_REQUEST[reg]&form=1&reserve=$_REQUEST[reserve]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&conf=1");
					}	
			mysql_close($con);
			}
	

?>

<?php
$reg=$_REQUEST['reg'];

	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblwalkin WHERE RegNo = '$reg' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];

if($form == NULL)
{
	$reg = $fld['RegNo'];
	$checkin = $fld['fldarrival'];
	$checkout = $fld['flddeparture'];
	$adult = $fld['fldadult'];
	$child = $fld['fldchild'];
	$roomtype = $fld['fldroom'];
	$cabana = $fld['fldcottagesnum'];
	$room = $fld['fldroomtype'];
	$numroom = $fld['fldnumofroom'];
	$types = $fld['fldstaytype'];
	$total = $fld['fldtotal'];


}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];
	$checkin = $_REQUEST['checkin'];
	$checkout = $_REQUEST['checkout'];
	$adult = $_REQUEST['adult'];
	$child = $_REQUEST['child'];
	$roomtype = $_REQUEST['roomtype'];
	$room = $_REQUEST['room'];
	$numroom = $_REQUEST['numroom'];
	$cabana = $_REQUEST['cabana'];
	$types = $_REQUEST['types'];
	$total = $_REQUEST['total'];
}
?>
<form action="admin_managewalkin.php" method="post">
		<input type="hidden" name="form" value="1">
					
						
							<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden"  name="reserve" value="<?php echo $reserve; ?>">
						Checkin date: <input class="textarea" type="date"  name="checkin" value="<?php echo $checkin; ?>"><br><br>
						Checkout date: <input class="textarea" type="date" name="checkout" value="<?php echo $checkout; ?>"><br><br>
						
						Adults(13 years old and above): <input class="textarea" type="text" name="adult"value="<?php echo $adult; ?>"> <br><br>
						Kids(3-12 years old): <input type="text" class="textarea" name="child" size="4"value="<?php echo $child; ?>"> <br><br>

						Type of stay: <input class="textarea" type="text"  name="types" value="<?php echo $types; ?>"> <br><br>
	
						Nipa and Hut rental: <input class="textarea" type="text"  name="roomtype" value="<?php echo $roomtype; ?>"><br><br>
					
						Number of Cottage(s): <input type="text" class="textarea" name="cabana" value="<?php echo $cabana; ?>"><br><br>
						Room rental: <input class="textarea" type="text"  name="room" value="<?php echo $room; ?>"><br><br>
					
						Number of Room(s): <input type="text" class="textarea" name="numroom" value="<?php echo $numroom; ?>"><br><br>
						Extra Bed: <input type="text"class="textarea" name="extra" value="<?php echo $extra; ?>"><br><br>
						Total: <input disabled type="text" class="textarea" name="price" value="<?php echo $totalprice; ?>"><br><br>
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
						<input type="hidden" name="price" value="<?php echo $libre; ?>"></span>
								
					
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<input type="submit" value="Update" formmethod="post"> <a href="resort_walkin.php"><input type="button" name="back"value="Back"></a>
							<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							Are you sure you want to update this Reservation?<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
							<a href="resort_walkin.php"><button type="button" class="buttons">NO</button></a>
							<?php
							}
						?>
						</form>
						
						
						