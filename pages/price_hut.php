
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
					<a href="bookingevent.php">Walk-in</a>
					</li>
					<li>
					<a href="bookingroom.php">Event Hall Reservation</a>
					</li>
					<li>
					<a href="bookingroom.php">Pending Reservations</a>
					</li>
					<li>
					<a href="bookingroom.php">Booking Reservations</a>
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
					<a href="price_hut.php">Hut and Cabana Price</a>
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
$date = date("Y-m-d");
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	
	$result = mysql_query("SELECT * FROM tblhut");

echo "</td>";
echo "<tr> ";
echo "<table>  
<h2>Hut and Cabana Rate</h2>
<tr bgcolor='green'>

<th width=200><font color='white'>Room Type </font></th>
<th width=200><font color='white'>Day Price </font></th>
<th width=200><font color='white'>Night Price </font></th>
<th width=200><font color='white'>Available</font></th>

<th width=100></th>
<th width=100></th>
<th width=200></th>
</tr> ";

echo "</th>";
echo "</tr> ";

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

while($row = mysql_fetch_array($result))
{ 
     echo "<tr>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldtype'] . "</td>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldday'] . "</td>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldnight'] . "</td>";
     echo "<td align='center' width=250  class='tdpos'>" . $row['fldavailable'] . "</td>";
     
}
?>

<td align="center"><button type='button' onclick="window.location.href='admin_managehut.php?type=<?php echo $row['$fldtype'];?>'" class='text'>Update </button><br></td>
 <td align="center"><button type='button' onclick="window.location.href='admin_deletehut.php?type=<?php echo $row['fldtype'];?>'" class='text'>Delete </button></td>
<?php 

}
else
{


while($row = mysql_fetch_array($result))
  { 
     echo "<tr>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldtype'] . "</td>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldday'] . "</td>";
	 echo "<td align='center' width=200  class='tdpos'>" . $row['fldnight'] . "</td>";
     echo "<td align='center' width=250  class='tdpos'>" . $row['fldavailable'] . "</td>";

  
?>	
	 <td align="center"> <button type='button' onclick="window.location.href='admin_managehut.php?type=<?php echo $row['fldtype'];?>'" class='text'>Update </button><br></td>
	<td align="center"><button type='button' onclick="window.location.href='admin_deletehut.php?type=<?php echo $row['fldtype'];?>'" class='text'>Delete </button></td>		
<?php
}
}
  mysql_close($con);
?> 
</form>	