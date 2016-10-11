
<?php
//include('session.php');
?>

<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	

	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">


	
		<link rel="stylesheet" type="text/css" href="css/ie.css">


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
			<label > <font face="century gothic" color="#f3be4b" size="4"> Booking Reservation </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
			
		</div>
<div id="body">
	<div class="body">
 
<table class="room">
<tr>
  <th><br><br>
    <img src="img2/5.png" alt="Note" style="height:200px;width:250px">
  </th>
  <td>
    <h1><font face="century gothic" color="#f3be4b" size="5"> Casa Leona </font></h1>

    <p>Take pleasure in La Leona’s airconditioned rooms. You can choose to stay in the contemporary-styled La Leona Attic or in the native-inspired La Leona Loft. Whatever you choose, it will surely bring you that well-deserved La Leona comfort!.... </p>
<br>
    <button class="button" onClick="location.href='booking_room.php'"> <span>Book Here</span></button>

</td>
</tr>

<tr>
  <th><br><br>
    <img src="img2/mezaninne1.png" alt="Note" style="height:200px;width:250px">
  </th>
  <td><br><br><hr>
    <h1><font face="century gothic" color="#f3be4b" size="5">Cabanas & Mezaninne</font></h1>
    <p style font-size="30" >The cabanas in La Leona are all personally designed by the owners and are all intended be built with adequate spaces from each other. Large group of guests often prefer renting a cabana because it can accommodate 10 or more persons and they could also have easy access of the pool area.... </p>
<br>
    <button class="button" onClick="location.href='booking_cabana.php'"> <span>Book Here</span></button>
</td>
</tr>



</div>

  


</table>

</font>
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