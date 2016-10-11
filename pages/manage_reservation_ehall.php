<?php
include('session.php');
?>

<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/ie.css">
		   	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
 <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
 <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
</head>
<body>
	<div id="header">
		<div>
			<a href="customer.php" class="logo"><img src="logo-trans.png" alt=""></a>
			
			</form>
		</div>
		<div class="navigation">
			<ul>
				<li >
					<a href="customer.php">Home</a>
				</li>
					<li>
					<a href="gallerylog.php">Facilities</a>
					<ul>
					<li>
					<a href="#">Amenities</a>
					</li>
				</li>
				</ul>
				<li>
					<a href="slideshows02.php">Gallery</a> 
				<li>
					<a href="#">Reservation</a>
					<ul>
					<li>
					<a href="booking_reservation.php">Booking Reservation</a>
					</li>
					<li>
					<a href="event_reservation.php">Event Reservation</a>
					</li>
					
				<li>
					<a href="manage_reservation.php">Manage Reservation</a>
</li>
</ul>
				<li>
					<a>   User&nbsp;:&nbsp; <?php echo$login_session; ?></a>
					<ul>
					<li>
					<?php 
					echo "<li> <b id='logout'><a href='logout.php'style='text-decoration:none'>Log Out</a></li>"
					?>
					</li>
					</ul>
					</li>
						</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		<div class="header">
			<ul>
				<li>
					
					<div>

					</div>
				</li>
				<li>
			<label > <font face="century gothic" color="#f3be4b" size="4"> Event Hall  </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>
<?php
error_reporting(0);
?>

<?php
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }


	mysql_select_db("dbresort", $con);
	$result = mysql_query("SELECT * FROM tblreserveevent WHERE username ='$login_session'");

	echo "<td> <center>";
echo "<form action='manage_reservation.php' method='post'>";

						?>
						Manage: <select name="term" class="form-control" style="width:60%" onchange="this.form.submit();"><br><br>
						<option value="other" <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Booked"  <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Booked" ? "selected" : "Booked" ?>>Booked</option>
						</select>
				
						<?php

						
 if($_REQUEST['term']=='Booked')
{
	header("location:manage_reservation.php");
}
			echo "<tr align='center'><br>";
		echo "<div id='white' style=' margin-left:195px;'>";
echo "<div class='row'>";
                      echo "<div class='col-lg-10'>";
					  
                   echo "<div class='panel panel-default'>";
					
                            echo "<div class='dataTable_wrapper'>";
			
	                 echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>

                                    <thead> 


<th width='500'><font color='grey'>Checkin Date</font></th>
<th width=30><font color='grey'>Time </font></th>
<th width=200><font color='grey'>Additional Hour(s) </font></th>
<th width=30><font color='grey'>Type of Payment </font></th>
<th width=30><font color='grey'>Term of Payment </font></th>
<th width=30><font color='grey'>Total Payment </font></th>
<th width=30><font color='grey'>Total </font></th>
<th width=30><font color='grey'>Status </font></th>
<th width=30><font color='grey'>Action</font></th>
<th width=30><font color='grey'>Action</font></th>
<th width=30><font color='grey'>Action</font></th>
 </thead>

</tr>";
if($_SERVER["REQUEST_METHOD"] == "POST") 
{


while($row = mysql_fetch_array($result))
{ 
     echo "<tr>";
		$row['username'];
  $row['RegNo'];
  echo "<td align='center'   class='tdpos'>" . $row['fldarrival'] . "</td>";
  echo "<td align='center'  class='tdpos'>" . $row['fldtime'] . "</td>";
  echo "<td align='center'  class='tdpos'>" . $row['fldhour'] . "</td>";
  echo "<td align='center'  class='tdpos'>" . $row['fldpaymenttype'] . "</td>";
    echo "<td align='center'  class='tdpos'>" . $row['fldterm'] . "</td>";
  echo "<td align='center'  class='tdpos'>" . $row['fldpayment'] . "</td>";
  echo "<td align='center'  class='tdpos'>" . $row['fldtotal'] . "</td>";
    echo "<td align='center'  class='tdpos'>" . $row['status'] . "</td>";
	

}
?>
	<td align='center'><button type='button' onclick="window.location.href='customer_viewevent.php?reg=<?php echo $row['RegNo'];?>'"  class="btn btn-danger"><i class="fa share-square"></i> View Details  </button></td>

<td align="center"><button type='button' onclick="window.location.href='cancel_event_reservation.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-danger"><i class="fa fa-remove"></i>Cancel</button></td>
		
		<?php
		if ($row['status']=="Pending")
		{
		?>
			<td align="center"><button type='button' onclick="window.location.href='manage_event_reservation.php?reg=<?php echo $row['RegNo'];?>' " class="btn btn-info"><i class="fa fa-edit"></i>Update</button></td>	
		<?php
		}
		?>
 
<?php 


}
else
{


while($row = mysql_fetch_array($result))
  { 
        echo "<tr class='tdpos'>";
		$row['username'];
  $row['RegNo'];
  echo "<td align='center'  class='tdpos'>" . $row['fldarrival'] . "</td>";
  echo "<td align='center'  class='tdpos'>" . $row['fldtime'] . "</td>";
  echo "<td align='center'  class='tdpos'>" . $row['fldhour'] . "</td>";
	  echo "<td align='center'  class='tdpos'>" . $row['fldpaymenttype'] . "</td>";	
	  echo "<td align='center' class='tdpos'>" . $row['fldterm'] . "</td>";
  echo "<td align='center'  class='tdpos'>₱" . $row['fldpayment'] . "</td>";
  echo "<td align='center'  class='tdpos'>₱" . $row['fldtotal'] . "</td>";
    echo "<td align='center'  class='tdpos'>" . $row['status'] . "</td>";

  
?>
	<td align='center'><button type='button' onclick="window.location.href='customer_viewevent.php?reg=<?php echo $row['RegNo'];?>'"  class="btn btn-danger"><i class="fa fa-share-square"></i> View Details  </button></td>

	<td align="center"> <button type='button' onclick="window.location.href='cancel_event_reservation.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-success"><i class="fa fa-remove"></i>Cancel</button></td>
	 	
		<?php
		if ($row['status']=="Pending")
		{
		?>
			<td align="center"><button type='button' onclick="window.location.href='manage_event_reservation.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-info"><i class="fa fa-edit"></i>Update</button></td>	
		<?php
		}
		?>
 
<?php
}
}
  mysql_close($con);
?> 

		</table>
		</div>
	


<br>



	</div>
<div id="footer">
		<div>
			<div class="contact">
				<h3>contact information</h3>
				<ul>
					<li>
						<b>address:</b> <span>Brgy. Sampaguita, Lipa City, Batangas</span>
					</li>
					<li>
						<b>landline:</b> <span>(043) 784-0153</span>
					</li>
					<li>
						<b>mobile:</b> <span>09175048667</span>
					</li>
					
				</ul>
			</div>
			<div class="tweets">
				<h3>recent tweets</h3>
				<ul>
					<li>
						<a href="https://www.twitter.com/@FIMejico">We’re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a>
					</li>
				</ul>
			</div>
			<div class="posts">
				<h3>News</h3>
				<ul>
					<li>
						<a href="https://www.laleonaresort.net/">La Leona Resort is now Online!</a>
					</li>
				</ul>
			</div>
			<div class="connect">
				<h3>stay in touch</h3>
				<p>
					Are you in search for the best venue for your event? Why not celebrate birthdays, reunions, anniversaries, and weddings or conduct corporate events like team building, seminars, fora and business meetings at La Leona Resort
				</p>
				<ul>
					<li id="facebook">
						<a href="https://www.facebook.com/">facebook</a>
					</li>
					<li id="twitter">
						<a href="https://www.twitter.com/">twitter</a>
					</li>
					<li id="googleplus">
						<a href="https://www.plus.google.com/">googleplus</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="section">
			<p>
				&copy; this is the copyright area
			</p>
	
		</div>
	</div>


</body>
</html>