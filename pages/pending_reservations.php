
<?php
include('admin_session.php');
?>

<font color="red">System User: <?php echo $login_session; ?></b></font><br><br>

<?php echo date("Y-m-d");	
echo "</font> <b><font color='black'>|</font></b><font size='2px' class='font'>";
echo date("h:i:sa", strtotime("now"-6));

?>

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
					<a href="pending_reservation.php">Pending Reservations</a>
					</li>
					<li>
					<a href="booked_reservation.php">Booking Reservations</a>
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
error_reporting(0);
?>

<?php

$user = $row['username'];
$date = date('Y-m-d');

$results = mysql_query("SELECT * FROM tblreserve WHERE status = 'Pending'");
$res = mysql_fetch_array($results); 

$datetime1 = ($date);
$datetime2 = ($res['flddate']);

$secs = $datetime2 - $datetime1;// == <seconds between the two times>
$night = $secs / 86400;  
?>

<input type='text' name='night' value="<?php echo $night; ?>"></span>
<input type='text' name='tim' value="<?php echo $res['flddate']; ?>"></span>
<?php
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	
	$result = mysql_query("SELECT * FROM tblreserve WHERE status = 'Pending'");

	
	if ($night > 2)
{


	
	$dis =  mysql_query("SELECT * FROM tblreserve WHERE flddeparture = '$date'");
	while(mysql_fetch_array($dis))
	{
		$red = $red + 1;
	}

echo " <form action='pending_reservations.php' method='post'>";
	echo "<td  align='center'>";
	
	if($red > 0)
	{
		
		echo "There are $red reservation ready for checkout. <br>";
		echo "<input type='submit' name='click' my value='Click Here To View'> ";
		
	}
}
echo "</td>";
echo "<tr> ";
echo "<table>  
<h2>Pending Reservations</h2>
<tr bgcolor='green'>

		
<th width=200><font color='white'>Username </font></th>
<th width=200><font color='white'>Guest Name</font></th>
<th width=150><font color='white'>Contact</font></th>
<th width=600><font color='white'>Checkin Date</font></th>
<th width=600><font color='white'>Checkout Date </font></th>
<th width=200><font color='white'>Adult</font></th>
<th width=200><font color='white'>Children </font></th>
<th width=200><font color='white'>Nipa and Hut </font></th>
<th width=200><font color='white'>Cottages </font></th>
<th width=200><font color='white'>Room Rental </font></th>
<th width=200><font color='white'>No. of Cottage </font></th>
<th width=200><font color='white'>Stay Type </font></th>
<th width=200><font color='white'>Downpayment </font></th>
<th width=200><font color='white'>Total </font></th>
<th width=200><font color='white'>Total Payment </font></th>
<th width=200><font color='white'>Status </font></th>
<th width=100></th>
<th width=100></th>
<th width=200></th>
</tr> ";

echo "</th>";
echo "</tr> ";

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

	$buttontext = $_REQUEST['box'];
	if($_REQUEST['click']=='Click Here To View')
	{
		$result = mysql_query("SELECT status = 'Pending' FROM tblreserve WHERE flddeparture = '$date'");
	}
	

while($row = mysql_fetch_array($result))
{ 
     echo "<tr>";
	 $row['RegNo'] ;
	 echo "<td align='center' width=200  class='tdpos'>" . $row['username'] . "</td>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldfname' ] , $row[ 'fldlname'] . "</td>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldcontact'] . "</td>";
     echo "<td align='center' width=250  class='tdpos'>" . $row['fldarrival'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['flddeparture'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldadult'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldchild'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldroom'] . "</td>";
	 echo "<td align='center' width=200 class='tdpos'>" . $row['fldcottagesnum'] . "</td>";
	 echo "<td align='center' width=200 class='tdpos'>" . $row['fldroomtype'] . "</td>";
	 echo "<td align='center' width=200 class='tdpos'>" . $row['fldnumofroom'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldstaytype'] . "</td>";
	    echo "<td align='center' width=200 class='tdpos'>" . $row['flddownpayment'] . "</td>"; 
    echo "<td align='center' width=200 class='tdpos'>" . $row['fldtotal'] . "</td>";
	 echo "<td align='center' width=200 class='tdpos'>" . $row['fldpayment'] . "</td>";
	   echo "<td align='center' width=200 class='tdpos'>" . $row['status'] . "</td>";

}
?>
<td align="center"><button type='button' onclick="window.location.href='cancelreservation.php?cancel=<?php echo $row['username'];?>'" class='text'>Cancel Reservation </button></td>
<td align="center"><button type='button' onclick="window.location.href='admin_managebooking.php?reg=<?php echo $row['$RegNo'];?>'" class='text'>Update Reservation</button><br></td>
 <td align="center"><button type='button' onclick="window.location.href='admin_checkout.php?reg=<?php echo $row['RegNo'];?>'" class='text'>Checkout </button></td>
<?php 

}
else
{


while($row = mysql_fetch_array($result))
  { 
     echo "<tr>";
	 $row['RegNo'];
	 echo "<td align='center' width=200  class='tdpos'>" . $row['username'] . "</td>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldfname' ] ,  $row[ 'fldlname']. "</td>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldcontact'] . "</td>";
     echo "<td align='center' width=250  class='tdpos'>" . $row['fldarrival'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['flddeparture'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldadult'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldchild'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldroom'] . "</td>";
	 echo "<td align='center' width=200 class='tdpos'>" . $row['fldcottagesnum'] . "</td>";
	  echo "<td align='center' width=200 class='tdpos'>" . $row['fldroomtype'] . "</td>";
	   echo "<td align='center' width=200 class='tdpos'>" . $row['fldnumofroom'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldstaytype'] . "</td>";
	    echo "<td align='center' width=200 class='tdpos'>" . $row['flddownpayment'] . "</td>";
     echo "<td align='center' width=200 class='tdpos'>" . $row['fldtotal'] . "</td>";
	  echo "<td align='center' width=200 class='tdpos'>" . $row['fldpayment'] . "</td>";
	    echo "<td align='center' width=200 class='tdpos'>" . $row['status'] . "</td>";

  
?>	
	 <td align="center"> <button type='button' onclick="window.location.href='cancelreservation1.php?cancel=<?php echo $row['username'];?>'" class='text'>Cancel </button></td>
	 <td align="center"> <button type='button' onclick="window.location.href='admin_managebooking.php?reg=<?php echo $row['RegNo'];?>'" class='text'>Update </button><br></td>
	<td align="center"><button type='button' onclick="window.location.href='admin_checkout.php?reg=<?php echo $row['RegNo'];?>'" class='text'>Checkout </button></td>		
<?php
}
}
  mysql_close($con);
?> 

</form>





		