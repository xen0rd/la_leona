
<?php
error_reporting(0);
?>
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
					<a href="slideshows02.php">Gallery</a> 
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
		
		

<?php
$reg=$_REQUEST['reg'];

	$con = mysql_connect("localhost","root","1234");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblreserve WHERE RegNo = '$reg' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];
if($form == NULL)
{
	$reg = $fld['RegNo'];
	$adult = $fld['fldadult'];
	$child = $fld['fldchild'];
	//cottages
	$roomtype = $fld['fldroom'];
	$roomtypes2 = $fld['fldhut2'];
	$roomtypes3 = $fld['fldhut3'];
	$roomtypes4 = $fld['fldhut4'];
	$roomtypes5 = $fld['fldhut5'];
	$cabana = $fld['fldcottagesnum'];
	$cabana2 = $fld['fldh2'];
	$cabana3 = $fld['fldh3'];
	$cabana4 = $fld['fldh4'];
	$cabana5 = $fld['fldh5'];
	
	
	//room
	$room = $fld['fldroomtype'];
	$room3 = $fld['fldroom2'];
	$room4 = $fld['fldroom4'];
	$numroom = $fld['fldnumofroom'];
	$numrooms = $fld['fldnum2'];
	$numroomss = $fld['fldnum4'];
	
	$types = $fld['fldstaytype'];
	$night = $fld['fldnightstay'];
	$extra = $fld['fldextra'];
	$pay = $fld['fldpaymenttype'];
	$term = $fld['fldterm'];
	


}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];
	$adult = $_REQUEST['adult'];
	$child = $_REQUEST['child'];
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
	$night = $_REQUEST['night'];
	$extra = $_REQUEST['extra'];
	$pay = $_REQUEST['pay'];
	$term = $_REQUEST['term'];


}	
?>
			 <center>		
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 500px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<h2>Customer Amenities Details</h2>
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						
				
						<tr><td align="center" width="50%">Adults(13 years old and above): </td><th><?php echo $adult; ?></th></tr>
						
						<?php
						if ($child == NULL)
						{	

							?>
							<tr><td align="center" width="50%">Kids(3-12 years old): </td><th><?php echo None; ?>  </th></tr>
							<?php
						}
						
						if ($child != NULL)
						{	
							?>
							<tr><td align="center" width="50%">Kids(3-12 years old): </td><th><?php echo $child; ?>  </th></tr>
							<?php
						}
						
						?>
						<tr><td align="center" width="50%">Type of stay: </td><th><?php echo $types; ?>   </th></tr>
					
						
						<?php 
						if ($roomtype || $roomtypes2 || $roomtypes3 || $roomtypes4 || $roomtypes5 != NULL)
						{
							?>
							<tr><td align="center" width="50%">Nipa and Hut rental: </td><th>
		
							<?php
							if ($roomtype != NULL)
							{	
								echo $roomtype; echo "&nbsp;( $cabana)";
							}
							?> 
							<?php 
							if ($roomtypes2 != NULL)
							{	
								echo $roomtypes2;  echo "&nbsp;( $cabana2)"; 
							}							
							?>
							<?php 
							if ($roomtypes3 != NULL)
							{	
								echo $roomtypes3; echo "&nbsp;( $cabana3)";
							}
							?> 
							<?php 
							if ($roomtypes4 != NULL)
							{	
								echo $roomtypes4; echo "&nbsp;( $cabana4)";
							}
							?>
							<?php 
							if ($roomtypes5 != NULL)
							{	
								echo $roomtypes5; echo "&nbsp;( $cabana5)";
							}
							?>
							</th></tr>
						<?php
						}
						?>

						
						
						<?php 
						if ($room || $room3 || $room4 != NULL)
						{
						?>
							<tr><td align="center" width="50%">Room rental: </td><th>
						
							<?php 
							if ($room != NULL)
							{	
								echo $room; echo"&nbsp;( $numroom )"; 
							}
							?>
							<br>
						
							<?php 
							if ($room3 != NULL)
							{	
								echo $room3;   echo "&nbsp;( $numrooms )"; 
							}
							?> 
							<br>
						
							<?php 
							if ($room4 != NULL)
							{	
							echo $room4; echo"&nbsp;($numroomss)";
							}
						}
						?></th></tr>
				
						
						<tr><td align="center" width="50%">Extra Bed: </td><th><?php echo $extra; ?></th></tr>
				
					
					<div class="center" style="margin-left:295px; position:absolute; top:93%; ">
						<a href="manage_reservation.php" onClick="self.close()"><input class="btn btn-success"type="button" name="close"value="Close"></a>
						</div>
				
						
					</form>
		
		
			</table>
		</div></div></div></div></div>
		
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

