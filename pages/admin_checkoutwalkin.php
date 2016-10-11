
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
					
				
				$avail = mysql_query("SELECT fldavailable FROM tblhut WHERE fldtype = '$_REQUEST[roomtype]'");
				$price = mysql_fetch_array($avail);
				$get = mysql_query("SELECT fldavailable FROM tblroom WHERE fldtype = '$_REQUEST[room]'");
				$free = mysql_fetch_array($get);

				$avail = $price['fldavailable'] + $_REQUEST['cabana'];
				$get = $free['fldavailable'] + $_REQUEST['numroom'];
	
				
				$req ="UPDATE tblhut SET fldavailable = '$avail' WHERE fldtype = '$_REQUEST[roomtype]'";
						mysql_query($req);
				$updt ="UPDATE tblroom SET fldavailable = '$get' WHERE fldtype = '$_REQUEST[room]'";
						mysql_query($updt);
					
					$result = mysql_query("DELETE FROM tblwalkin WHERE RegNo ='$_REQUEST[reg]' ");	
				
					header("location:reserved.php");
				}
					else
					{
					
					header("location:admin_checkoutwalkin.php?reg=$_REQUEST[reg]&form=1&reserve=$_REQUEST[reserve]&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&night=$_REQUEST[night]&roomtype=$_REQUEST[roomtype]&cabana=$_REQUEST[cabana]&room=$_REQUEST[room]&payment=$_REQUEST[payment]&numroom=$_REQUEST[numroom]&totalp=$_REQUEST[totalp]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&conf=1");
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
<form action="admin_checkoutwalkin.php" method="post">
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
						
					
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
						<input type="hidden" name="get" value="<?php echo $free['fldavailable']; ?>"></span>
						<input type="hidden" name="price" value="<?php echo $libre; ?>"></span>
								
					
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<input type="submit" value="Checkout" formmethod="post"> <a href="resort_walkin.php"><input type="button" name="back"value="Back"></a>
							<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							Are you sure you want to Checkout this Reservation?<br>
							<input type="submit" name="confbut" value="YES" formmethod="post">
							<a href="resort_walkin.php"><button type="button">NO</button></a>
							<?php
							}
						?>
						</form>
						
						
						