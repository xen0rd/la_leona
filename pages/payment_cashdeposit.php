<?php
error_reporting(0);
?>
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
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			
			</form>
		</div>
		<div class="navigation">
			<ul>
				<li class="selected">
					<a href="index.php">Home</a>
					<ul>
					<li>
					<a href="bookingevent.php">About Us</a>
					</li>
					<li>
					<a href="bookingroom.php">Contact</a>
					</li>
					</ul>
				</li>
					<li class="booking">
					<a href="about.html">Accomodation</a>
					<ul>
					<li>
					<a href="bookingevent.php">Amenities</a>
					</li>
				</li>
				</ul>
				<li>
					<a href="services.html">Gallery</a> 
				<ul>
					<li>
					<a href="bookingevent.php">Pictures</a>
					</li>
					<li>
					<a href="bookingroom.php">Videos</a>
					</li>
					</ul>
				<li>
					<a href="contact.html">Reservation</a>
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
				<li >
					<a> <?php echo $login_session; ?></a>
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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Booking </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
			
		</div>
		<div id="center" style="margin-left: 200px;" >
<div id="white" style="width: 940px; height: 500px	; background-color: white;">
		<div class="row">
                      <div class="col-lg-10">
					  
                    
					
                            <div class="dataTable_wrapper">
					<br>		
					<br>		
					<br>		
					<br>		
					<br>		
					<br>		
					<br>		
						
<div id="center" style="margin-left: 170px;" >
<?php
 $email = $_REQUEST['email'];
  $firstname = $_REQUEST['firstname'];
  $lastname = $_REQUEST['lastname'];
  $reg = $_REQUEST['reg'];
  $checkin = $_REQUEST['checkin'];
  $checkout = $_REQUEST['checkout'];
    $adult = $_REQUEST['adult'];
	  $child = $_REQUEST['child'];
	  	  $totalp= $_REQUEST['totalp'];

  $room = $_REQUEST['room2'].'<br>'.$_REQUEST['room3'].'<br>'.$_REQUEST['room4'];
  $roomtypez = $_REQUEST['roomtypes5'].''.$_REQUEST['roomtypes4'].''.$_REQUEST['roomtypes3'].''.$_REQUEST['roomtype'].''.$_REQUEST['roomtypes2'];
  
  
		?>
  	<input type="hidden" name="child" value="<?php echo $child; ?>">
	<?php
  if($child == NULL)
  {
	?>
	<input type="hidden" name="child" value="<?php echo "none"; ?>">
	<?php
  }
  if ($child != NULL)
  {	  
	?>
	<input type="hidden" name="child" value="<?php echo $child; ?>">
	<?php
  }
  						
$subject = "Reservation Details";
$message = "Thank you for your reservation";
$message = "La Leona Resort <br>
			Address: Brgy. Sampaguita, Lipa City <br>
			Landline: (043) 784-0153 / (043) 404-1976 <br>
			Mobile: (0917) 504-8667<br>
			


			<br><br>Your Registering details are as follows: <br><br>
			Guest Name: $firstname $lastname <br>
			Reservation No: $reg <br>
			Date Checkin: $checkin <br>
			Date Checkout: $checkout <br>
			No. of Adults: $adult <br>
			No. of Children: $child<br>
			Room: $room <br>
			Cottages: $roomtypez <br>
			Total: $totalp";


$from = "laleoanaresort@gmail.com";
$to =  array($email, $from);
$lp = "laleona@example.com";

$headers = "MIME-Version: 1.0\r\n"; 

$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

$headers .=  'from: '.$lp .'' . "\r\n" .

            'Reply-To: '.$lp.'' . "\r\n" .

            'X-Mailer: PHP/' . phpversion();

foreach($to as $row)
{
   mail($row,$subject,$message,$headers);
}

echo "Mail Sent.";

  
?>
	<input type="hidden" name="email" value="<?php echo $_REQUEST['email'] ?>">

	
	<h1 align="center">Thank You for your Reservation</h1>
	<p align="center">Please Email us your deposit slip for the confirmation..</p>
	<p align="center">Email us at laleonaresort@gmail.com Thank you.</p>
	<p align="center">BPI Bank</p>
	<p align="center">Account Number: 4862 9030 9688 4310 </p>
	</table>
	<a href="http://localhost/yeah/pages/CustLogin2.php"><button type="button" class="btn btn-success" style="margin-left: 290px;" class="buttons">Back</button></a></span>
		 </div>
		</div>
		
		
</form>
									
						</table>
		</div>
		</div>
		</div></div>
		
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
					<a href="booking.html">admin</a>
				</li>
			</ul>
		</div>
	</div>
	
		  <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

  

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

      <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>


						
						
	


						
						
	