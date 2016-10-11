
<?php
include('admin_session.php');
?>

<?php
error_reporting(0);
?>

<?php echo date("Y-m-d");	
?>

 <font color="red">Admin User: <?php echo $login_session; ?></b></font>

<body>
			
		</div>
		<div class="navigation">
				</div>
		<div class="navigation">
			<ul>
				<li class="selected">
					<a href="index.php">Inventory</a>
					<ul>
					<li>
					<a href="bookingevent.php">Food Inventory</a>
					</li>
					<li>
					<a href="bookingroom.php">Supply Inventory</a>
					</li>
					<li>
					<a href="bookingroom.php">Equipment Inventory</a>
					</li>
					</ul>
				</li>
					<li class="booking">
					<a href="reserved.php">Reserved</a>
					<ul>
					<li>
					<a href="resort_walkin.php">Walk-in</a>
					</li>
					<li>
					<a href="event_hall_reservation.php">Event Hall Reservation</a>
					</li>
					<li>
					<a href="pending_hall_reservations.php">Pending Hall Reservations</a>
					</li>
					<li>
					<a href="pending_reservations.php">Pending Reservations</a>
					</li>
					<li>
					<a href="reserved.php">Booked Reservations</a>
					</li>
					</ul>
				</li>
				<li>
					<a href="walk_in.php">Walk-in</a> 
				</li>
				<li>
					<a href="contact.html">Reports</a>
					<ul>
					<li>
					<a href="bookingevent.php">Food Inventory Report</a>
					</li>
					<li>
					<a href="bookingroom.php">Supply Report</a>
					</li>
					<li>
					<a href="bookingroom.php">Equipment Report</a>
					</li>
					<li>
					<a href="bookingroom.php">Reservation Report</a>
					</li>
					<li>
					<a href="bookingroom.php">Sales Report</a>
					</li>
					</ul>
				</li>
					<li>
					<a href="contact.html">Price</a>
					<ul>
					<li>
					<a href="price_room.php">Room Price</a>
					</li>
					<li>
					<a href="hut_price.php">Hut and Cabana Price</a>
					</li>
					</ul>
				<li class="booking">
					<a href="admin_logout.php">Logout</a>
					<ul>
					</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	</body>

<?php
 $time = date("h", strtotime("now"-6));
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	$result = mysql_query("SELECT * FROM tblreserveevent WHERE status = 'Pending' ");

		
	
echo "</td>";

echo "<tr> ";

echo "<table> 
<br><br><br>
<h2>Pending - Event Hall Reservation</h2>
<tr bgcolor='darkgreen'>
<th width=200><font color='white'>Username </font></th>
<th width=200><font color='white'>First Name </font></th>
<th width=200><font color='white'>Last Name </font></th>
<th width=200><font color='white'>Contact </font></th>
<th width=200><font color='white'>Checkin Date</font></th>
<th width=200><font color='white'>Time </font></th>
<th width=200><font color='white'>Hours </font></th>
<th width=200><font color='white'>Hall Type </font></th>
<th width=200><font color='white'>No. of persons </font></th>
<th width=200><font color='white'>Catering </font></th>
<th width=200><font color='white'>Downpayment </font></th>
<th width=200><font color='white'>Total </font></th>
<th width=200><font color='white'>Status </font></th>
<th width=100></th>
<th width=100></th>
<th width=100></th>
</tr> ";

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

	$buttontext = $_REQUEST['box'];
	if($_REQUEST['click']=='Click Here To Views')
	{
		$result = mysql_query("SELECT * FROM tblreserve WHERE fldend = '$time'");
	}
	


while($row = mysql_fetch_array($result))
{ 
    echo "<tr >";
	$row['RegNo'];
	echo "<td align='center' width=200  class='tdpos'>" . $row['username'] . "</td>";
		echo "<td align='center' width=200  class='tdpos'>" . $row['fldfname'] . "</td>";
			echo "<td align='center' width=200  class='tdpos'>" . $row['fldlname'] . "</td>";
				echo "<td align='center' width=200  class='tdpos'>" . $row['fldcontact'] . "</td>";
	echo "<td align='center' width=200  class='tdpos'>" . $row['fldarrival'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldtime'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldhour'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldhall'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldnumpax'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldcater'] . "</td>";
	 echo "<td align='center' width=200  class='tdpos'>₱" . $row['flddownpayment'] . "</td>";
	echo "<td align='center' width=200  class='tdpos'>₱" . $row['fldtotal'] . "</td>";
	echo "<td align='center' width=200  class='tdpos'>" . $row['status'] . "</td>";

}
?>
<td align="center"><button type='button' onclick="window.location.href='cancelreservation2.php?cancel=<?php echo $row['username'];?>'" class='text'>Cancel</button></td>
<td align="center"> <button type='button' onclick="window.location.href='admin_manageevent.php?reg=<?php echo $row['RegNo'];?>'" class='text'>Update </button></td>
<td align="center"><button type='button' onclick="window.location.href='admin_checkoutevent.php?reg=<?php echo $row['RegNo'];?>'" class='text'>Checkout </button></td>	
  
<?php 


}
else
{


while($row = mysql_fetch_array($result))
  { 
    echo "<tr class='tdpos'>";
	$row['RegNo'];
    echo "<td align='center' width=200  class='tdpos'>" . $row['username'] . "</td>";
		echo "<td align='center' width=200  class='tdpos'>" . $row['fldfname'] . "</td>";
			echo "<td align='center' width=200  class='tdpos'>" . $row['fldlname'] . "</td>";
				echo "<td align='center' width=200  class='tdpos'>" . $row['fldcontact'] . "</td>";
	echo "<td align='center' width=200  class='tdpos'>" . $row['fldarrival'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldtime'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldhour'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldhall'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldnumpax'] . "</td>";
	echo "<td align='center' width=200 class='tdpos'>" . $row['fldcater'] . "</td>";
    echo "<td align='center' width=200  class='tdpos'>₱" . $row['flddownpayment'] . "</td>";
    echo "<td align='center' width=200  class='tdpos'>₱" . $row['fldtotal'] . "</td>";
	echo "<td align='center' width=200  class='tdpos'>" . $row['status'] . "</td>";

  
?>
	 <td align="center"><button type='button' onclick="window.location.href='cancelreservation2.php?cancel=<?php echo $row['username'];?>'" class='text'>Cancel </button></td>
	 <td align="center"><button type='button' onclick="window.location.href='admin_manageevent.php?reg=<?php echo $row['RegNo'];?>'" class='text'>Update </button></td>
	 <td align="center"><button type='button' onclick="window.location.href='admin_checkoutevent.php?reg=<?php echo $row['RegNo'];?>'" class='text'>Checkout </button></td>	
			
<?php
}
}
  mysql_close($con);
?> 
		
</form>
		