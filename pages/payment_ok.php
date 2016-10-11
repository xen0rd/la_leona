

<?php
error_reporting(0);
include('sessionadmin.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
		<link rel="stylesheet" href="css/style1.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/ie.css">
	

	<link rel="stylesheet" type="text/css" href="css/ie.css">
   <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <link href="../bower_components/bootstrap/dist/css/slides.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   
</head>

<body>
	<div id="header">
		<div>
	<a href="admin1.php" class="logo"><img src="logo-trans.png" alt=""></a>
			
		</div>
		<div class="navigation">
			<ul>
				<li class="selected">
					<a href="itemcategory.php">Inventory</a>
					<ul>
					
				
					</ul>
				</li>
					<li >
					<a >Reserved</a>
					<ul>
					<li>
					<a href="reserved.php">Booked Reservation</a>
					</li>
					<li>
					<a href="event_hall_reserved.php">Event Hall Reservation</a>
					</li>
					<li>
				</li>
				</ul>
				<li>
					<a href="walk_in.php">Walk-in</a> 
					
				</li>
				<li>
					<a href="">Reports</a>
					<ul>
					<li>
				<a href="foodsupplyreports.php">Food Inventory Report</a>
					</li>
					<li>
					<a href="toiletries_reports.php">Toiletries Report</a>
					</li>
					<li>
					<a href="equipment_reports.php">Equipment Report</a>
					</li>
					<li>
					<a href="">Reservation Report</a>
					</li>
					<li>
					<a href="">Sales Report</a>
					</li>
					</ul>
				</li>	

				<li >
					<a> <?php echo $login_session; ?></a>
					<ul>
					
					<a href="manageroom2.php"><li><i class="fa fa-cogs fa-fw"></i> Page Maintenace</a>
                        </li>
					
					<li>
					 
					<li><a href='logout.php'><i class="fa fa-sign-out fa-fw"></i>Log Out</a></li>
					
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

<?php
$reg = $_REQUEST['reg'];

$checkin = $_REQUEST['checkin'];
	$checkout = $_REQUEST['checkout'];
	$adult = $_REQUEST['adult'];
	$child = $_REQUEST['child'];
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$contact = $_REQUEST['contact'];
	
		//cottages
	$roomtype = $_REQUEST['roomtype'];
	$roomtypes2 = $_REQUEST['roomtypes2'];
	$roomtypes3 = $_REQUEST['roomtypes3'];
	$roomtypes4 = $_REQUEST['roomtypes4'];
	$roomtypes5 = $_REQUEST['roomtypes5'];
	$cabana = $_REQUEST['cabana'];
	$cabana2 = $_REQUEST['cabana2'];
	$cabana3 = $_REQUEST['cabana3'];
	$cabana4 = $_REQUEST['cabana4'];
	$cabana5 = $_REQUEST['cabana5'];
	
	//room
	$room = $_REQUEST['room'];
	$room3 = $_REQUEST['room3'];
	$room4 = $_REQUEST['room4'];
	$numroom = $_REQUEST['numroom'];
	$numrooms = $_REQUEST['numrooms'];
	$numroomss= $_REQUEST['numroomss'];
	
	$types = $_REQUEST['types'];
	$total = $_REQUEST['total'];
	$payment = $_REQUEST['payment'];
		$bal = $_REQUEST['bal'];
		$extra = $_REQUEST['extra'];
?>		
<form action="payment_ok.php" method="post">


					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 400px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:140px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
					  <br>
					  <br>
					  <br>
					  <br>
						<h1 align="center">Check Out Successful! </h1> 
						
						
						<input type="hidden" name="reg" value="<?php echo $reg; ?>">
						<input type="hidden" name="fname" value="<?php echo $fname; ?>">
						<input type="hidden" name="lname" value="<?php echo $lname; ?>">
						<input type="hidden" name="contact" value="<?php echo $contact; ?>">
						<input class="textarea" type="hidden"  name="checkin" value="<?php echo $checkin; ?>">
						<input class="textarea" type="hidden" name="checkout" value="<?php echo $checkout; ?>">
						<input class="textarea" type="hidden" name="adult"value="<?php echo $adult; ?>"> 
						<input type="hidden" class="textarea" name="child" size="4"value="<?php echo $child; ?>">
						<input class="textarea" type="hidden"  name="types" value="<?php echo $types; ?>"> 
	
	
			<?php ///// COTTAGES ?>
						<input class="textarea" type="hidden"  name="roomtype" value="<?php echo $roomtype; ?>">
						<input class="textarea" type="hidden"  name="roomtypes2" value="<?php echo $roomtypes2; ?>">
					    <input class="textarea" type="hidden"  name="roomtypes3" value="<?php echo $roomtypes3; ?>">
						<input class="textarea" type="hidden"  name="roomtypes4" value="<?php echo $roomtypes4; ?>">
						 <input class="textarea" type="hidden"  name="roomtypes5" value="<?php echo $roomtypes5; ?>">
						<input type="hidden" class="textarea" name="cabana" value="<?php echo $cabana; ?>">
						<input type="hidden" class="textarea" name="cabana2" value="<?php echo $cabana2; ?>">
						<input type="hidden" class="textarea" name="cabana3" value="<?php echo $cabana3; ?>">
						<input type="hidden" class="textarea" name="cabana4" value="<?php echo $cabana4; ?>">
						<input type="hidden" class="textarea" name="cabana5" value="<?php echo $cabana5; ?>">
						
						
					
			<?php ///// ROOMS ?>	
						
						<input class="textarea" type="hidden"  name="room" value="<?php echo $room; ?>">
						<input class="textarea" type="hidden"  name="room3" value="<?php echo $room3; ?>">
						<input class="textarea" type="hidden"  name="room4" value="<?php echo $room4; ?>">
					
						<input type="hidden" class="textarea" name="numroom" value="<?php echo $numroom; ?>">
						<input type="hidden" class="textarea" name="numrooms" value="<?php echo $numrooms; ?>">
						<input type="hidden" class="textarea" name="numroomss" value="<?php echo $numroomss; ?>">
						
						<input type="hidden"class="textarea" name="extra" value="<?php echo $extra; ?>">
						<input type="hidden" name="total" value="<?php echo $total	; ?>">

						<input type="hidden" name="payment" value="<?php echo $payment; ?>">	
						
						<div class="center" align="center"style="margin-left:265px; position:absolute; top:70%; ">
						<button > <a target = "_blank" href="receipt.php?reg=<?php echo $reg;?>&fname=<?php echo $fname; ?>&lname=<?php echo $lname; ?>&contact=<?php echo $contact; ?>&checkin=<?php echo $checkin;?>&checkout=<?php echo $checkout;?>&types=<?php echo $types;?>&adult=<?php echo $adult;?>&child=<?php echo $child;?> 
	&roomtype=<?php echo $roomtype; ?>&cabana=<?php echo $cabana; ?>&roomtypes2=<?php echo $roomtypes2; ?>&cabana2=<?php echo $cabana2; ?>&roomtypes3=<?php echo $roomtypes3; ?>&cabana3=<?php echo $cabana3; ?>&roomtypes4=<?php echo $roomtypes4; ?>&cabana4=<?php echo $cabana4; ?>&roomtypes5=<?php echo $roomtypes5; ?>&cabana5=<?php echo $cabana5; ?>&room=<?php echo $room; ?>&numroom=<?php echo $numroom; ?>&room3=<?php echo $room3; ?>&numrooms=<?php echo $numrooms; ?>&room4=<?php echo $room4; ?>&numroomss=<?php echo $numroomsss; ?>&payment=<?php echo $payment; ?>&total=<?php echo $total; ?>"style="text-decoration: none;"> Print a Receipt</a></style></button><br><Br>

								
						<a href="reserved.php"><input class="btn btn-success" type="button" name="back"value="Back"></a>
	
						</div>

</form>
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


						