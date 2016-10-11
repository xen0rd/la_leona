
<?php
include('session.php');
?>
<?php
error_reporting(0);
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
					
						
				$sql="INSERT INTO tblcancelevent (username, RegNo, fldarrival, fldtime, fldhour, fldhall, fldnumpax, fldcater, fldpayment, status, fldfname, fldlname, fldcontact, flddate)
						 VALUES ('$login_session','$_REQUEST[reg]','$_REQUEST[checkin]','$_REQUEST[time]','$_REQUEST[hour]','$_REQUEST[hall]','$_REQUEST[person]','$_REQUEST[cater]','$_REQUEST[payment]','Cancelled','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$date')";
						mysql_query($sql);
						

						
				$result = mysql_query("DELETE FROM tblreserveevent WHERE RegNo ='$_REQUEST[reg]' ");	

				$results = mysql_query("DELETE FROM tblreportsevent WHERE RegNo ='$_REQUEST[reg]' ");	

				
					header("location:manage_reservation_ehall.php");
				}
					else
					{
					
					header("location:cancel_event_reservation.php?err=$err&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]&time=$_REQUEST[time]&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&contact=$_REQUEST[contact]&conf=1");	
	
			}	
			mysql_close($con);
			}
	

$check= mysql_query("SELECT * FROM tblregister WHERE username = '$login_session'");
$select = mysql_fetch_array($check);   


?>

<?php
$reg=$_REQUEST['reg'];

	$con = mysql_connect("localhost","root","");
	if (!$con) 
	{
	  die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblreserveevent WHERE RegNo = '$reg' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];

if($form == NULL)
{
	$reg = $fld['RegNo'];
	$checkin = $fld['fldarrival'];
	$time = $fld['fldtime'];
	$hour = $fld['flhour'];
	$hall = $fld['fldhall'];
	$person = $fld['fldnumpax'];
	$cater = $fld['fldcater'];
	$payment = $fld['fldpayment'];

}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];
	$checkin = $_REQUEST['checkin'];
	$time = $_REQUEST['time'];
	$hour = $_REQUEST['hour'];
	$hall= $_REQUEST['hall'];
	$person = $_REQUEST['person'];
	$cater = $_REQUEST['cater'];
	$payment = $_REQUEST['payment'];
}
?>

<form action="cancel_event_reservation.php" method="post">
		<input type="hidden" name="form" value="1">
		 <center>		
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 480px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<h2>Cancellation Details</h2>

					
			
					
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden"  name="reserve" value="<?php echo $reserve; ?>">
						<input type="hidden" name="fname" value="<?php echo $select['fldfname']; ?>">
						<input type="hidden" name="lname" value="<?php echo $select['fldlname']; ?>">
						<input type="hidden" name="contact" value="<?php echo $select['fldcontact']; ?>">
						
						<input class="textarea" type="hidden"  name="checkin" value="<?php echo $checkin; ?>">
						<input class="textarea" type="hidden" name="time" value="<?php echo $time; ?>">
						
						<input class="textarea" type="hidden" name="hour" value="<?php echo $hour; ?>">
						<input type="hidden" class="textarea" name="hall" value="<?php echo $hall; ?>"> 

						<input class="textarea" type="hidden"  name="person" value="<?php echo $person; ?>"> 
	
						 <input class="textarea" type="hidden"  name="cater" value="<?php echo $cater; ?>">
				
						 <input type="hidden" name="payment" value="<?php echo $payment; ?>">
					
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
						<input type="hidden" name="get" value="<?php echo $free['fldavailable']; ?>"></span>
						<input type="hidden" name="price" value="<?php echo $libre; ?>"></span>
								
					
					
						<tr><td align="center" width="50%">First Name: </td><th><?php echo  $select['fldfname'];?> </style></label></b></th></tr>
						<tr><td align="center" width="50%">Last Name: </td><th><?php echo  $select['fldlname'];?> </style></label>	</b></th></tr>
						<tr><td align="center" width="50%">Checkin Date: </td><th><?php echo $checkin; ?></style></label>   </th></tr>
						
						
					
						<tr><td align="center" width="50%">Time: </td><th><?php echo $time; ?> </style></label>  </th></tr>
						
						
						<tr><td align="center" width="50%">Additional Hour(s): </td><th><?php echo $hour; ?> </style></label>  </th></tr>
				
						<tr><td align="center" width="50%">Function Hall: </td><th><?php echo $hall; ?> </style></label>  </th></tr>
						<tr><td align="center" width="50%">No. of Person: </td><th><?php echo $person; ?> </style></label>  </th></tr>

						<tr><td align="center" width="50%">Catering: </td><th><?php echo $cater; ?> </style></label>  </th></tr>

						<tr><td align="center" width="50%">Payment: </td><th><?php echo $payment; ?> </style></label>  </th></tr>


						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<div class="center" style="margin-left:265px; position:absolute; top:85%; ">
							<br><input type="submit" class="btn btn-success" value="Cancel" formmethod="post"> <a href="manage_reservation_ehall.php"><input class="btn btn-success" type="button" name="back"value="Back"></a>
							</div><?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							
							<div class="overlay7">
						
							<br><br><br><br><br>
							<font color="white">Are you sure you want to cancel this Reservation?</font><br>
							<br>
							<input type="submit" class="btn btn-success" name="confbut" value="YES" formmethod="post">
							
							<a href="manage_reservation_ehall.php"><button class="btn btn-success" type="button">NO</button></a>
							</div>
							
							<?php
							}
						?>
						
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

	