<?php
include('session.php');
?>
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
					<ul>
					<li>
					<a href="#">About Us</a>
					</li>
					<li>
					<a href="#">Contact</a>
					</li>
					</ul>
				</li>
					<li>
					<a href="gallerylog.php">Accomodation</a>
					<ul>
					<li>
					<a href="#">Amenities</a>
					</li>
				</li>
				</ul>
				<li>
					<a href="#">Gallery</a> 
				<ul>
					<li>
					<a href="#">Pictures</a>
					</li>
					<li>
					<a href="#">Videos</a>
					</li>
					</ul>
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

<div id="body">
	<div class="body">
 
<table class="room">
<tr>
  <th>
  </th>
  <td>
    <h2> <font face="century gothic" color="#f3be4b" size="5">Cabanas & Mushroom</font></h2>
    <span id="tab"><p style font-size="30" >Take pleasure in La Leona’s airconditioned rooms. You can choose to stay in the contemporary-styled La Leona Attic or in the native-inspired La Leona Loft. Whatever you choose, it will surely bring you that well-deserved La Leona comfort!

<p>If you want more budget-friendly accommodation, why not try La Leona’s fan-cooled rooms? The resort has four nipa hut rooms and one duplex nipa hut. These may be low-priced rooms but will still provide you a relaxing stay at La Leona. </p></span>
<span id="tab"><p>- easy access to the pool area.
				</p></span>
		<br><hr class="hr"><br> 

</td>
</tr>
<table class="room">
	<tr>
		<td>
		<img src="img2/mushroom2.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Mushroom </font> <br><br>10 pax</span>
		<span id="tab">Day use <br><br> Php 250 </span>
		<span id="tab">Overnight <br><br> Php350</span>
		<span id="tab">Day & Night use <br><br> Php 500</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br> 
	
		<img src="img2/mushroom4.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Cabanas</font> <br><br>10 pax</span>
		<span id="tab">Day use <br><br> Php 400 </span>
		<span id="tab">Overnight <br><br> Php 500</span>
		<span id="tab">Day & Night use <br><br> Php 800</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br> 

		<img src="img2/mezaninne1.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Mezaninne</font><br><br> 10 pax</span>
		<span id="tab">Day use <br><br> Php 1200 </span>
		<span id="tab">Overnight <br><br> Php 1500</span>
		<span id="tab">Day & Night use <br><br> Php 2500</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br> 

		<img src="img2/le leona cabana.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"> <br><br><font face="century gothic" color="#f3be4b" size="5">La Leona Cabana </font><br><br> 25 pax</span>
		<span id="tab">Day use <br><br> Php 1200 </span>
		<span id="tab">Overnight <br><br> Php 1500</span>
		<span id="tab">Day & Night use <br><br> Php 2500</span>

		<br> <br><br><br><br><br><hr class="hr"> <br> 

		<img src="img2/mushroom1.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"> <font face="century gothic" color="#f3be4b" size="5">Duplex </font><br><br> 15 pax</span>
		<span id="tab">Day use <br><br> Php 1250 </span>
		<span id="tab">Overnight <br><br> Php 1500</span>
		<span id="tab">Day & Night use <br><br> Php 2500</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br> 

	</td>
	</table>
    <button class="button2" onClick="location.href='gallerylog.php'"> <span>Go back</span></button>
    <br><br>
</font>
</table>

	</div>
		</div>
		</div></div>
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
					<li>
						<b>email:</b> <span>www.laleonaresort.com</span>
					</li>
				</ul>
			</div>
			<div class="tweets">
				<h3>recent tweets</h3>
				<ul>
					<li>
						<a href="#">We’re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a>
					</li>
				</ul>
			</div>
			<div class="posts">
				<h3>recent blog post</h3>
				<ul>
					<li>
						<a href="#">The Casa Leona</a>
					</li>
					<li>
						<a href="#">Mutya ng Batangan 2010 Candidates’ Pictorial at La Leona Resort</a>
					</li>
					<li>
						<a href="#">La Leona Resort is now Online!</a>
					</li>
					<li>
						<a href="#">La Leona Resort’s Recreation  </a>
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
						<a href="http://freewebsitetemplates.com/go/facebook/">facebook</a>
					</li>
					<li id="twitter">
						<a href="http://freewebsitetemplates.com/go/twitter/">twitter</a>
					</li>
					<li id="googleplus">
						<a href="http://freewebsitetemplates.com/go/googleplus/">googleplus</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="section">
			<p>
				&copy; this is the copyright area
			</p>
			<ul>
				<li>
					<a href="index.html">home</a>
				</li>
				<li>
					<a href="about.html">room</a>
				</li>
				<li>
					<a href="services.html">event</a>
				</li>
				<li>
					<a href="blog.html">manage reservation</a>
				</li>
				<li>
					<a href="#">admin</a>
				</li>
			</ul>
		</div>
	</div>


</body>
</html>
