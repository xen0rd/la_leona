
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
				<li class="booking">
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
	<?php
	error_reporting(0);
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if ($_REQUEST['pay']=="Paypal")
						{
							if ($_REQUEST['term']=="Downpayment")
								{
									$less = $_REQUEST['payment'] / 2;
										$num = $_REQUEST['reg'] + 1;
						
							?>
						
						<html>
						<head>
						<meta charset="utf-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						</head>
						<body>
						<div id="center" style="margin-left: 500px; position:absolute; top:109%;">
						<div id="row">
						<div class="col-lg-5">   
						<form class="paypal" action="payments.php" method="post" id="paypal_form">
						<input type="hidden" name="cmd" value="_xclick" />
						<input type="hidden" name="no_note" value="1" />
						<input type="hidden" name="currency_code" value="PHP" />
						<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
						<input type="hidden" name="first_name" value="Customer's First Name"  />
						<input type="hidden" name="last_name" value="Customer's Last Name"  />
						<input type="hidden" name="payer_email" value="customer@example.com"  />
						<input type="hidden" name="item_number"value="<?php echo $num  ?>">
						<input type="hidden" name="item_amount" value="<?php echo $less ?>" >
						<input TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" >
						</form>
						
										</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
		</body>
						</html>
						
						<?php
							
						$insert = "Pending";
						$date = date('Y-m-d'); 
						
						$sql="INSERT INTO tblreserveevent (username, RegNo, fldarrival, fldtime, fldhour, fldhall, fldnumpax, fldcater, fldpaymenttype, fldterm, fldtotal, status, fldfname, fldlname, fldcontact,flddate, fldbalance)
						 VALUES ('$login_session','$num','$_REQUEST[checkin]','$_REQUEST[time]','$_REQUEST[hours]','$_REQUEST[hall]','$_REQUEST[person]','$_REQUEST[cater]','$_REQUEST[pay]','$_REQUEST[term]','$_REQUEST[payment]','$insert','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$date','$less')";
						mysql_query($sql);
						
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);
						
								}
							else if ($_REQUEST['term']=="Full Payment")
								{
									$num = $_REQUEST['reg'] + 1;
									
							?>
								<html>
						<head>
						<meta charset="utf-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						</head>
						<body>
						<div id="center" style="margin-left: 125px;">
						<div id="row">
						<div class="col-lg-5">
					
						<form class="paypal" action="payments.php" method="post" id="paypal_form">
						<input type="hidden" name="cmd" value="_xclick" />
						<input type="hidden" name="no_note" value="1" />
						<input type="hidden" name="currency_code" value="PHP" />
						<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
						<input type="hidden" name="first_name" value="Customer's First Name"  />
						<input type="hidden" name="last_name" value="Customer's Last Name"  />
						<input type="hidden" name="payer_email" value="customer@example.com"  />
						<input type="hidden" name="item_number"value="<?php echo $num  ?>">
						<input type="hidden" name="item_amount" value="<?php echo $_POST['payment'] ?>" >
						<input TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" >
						</form>
						
										</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
		</body>
						</html>
						<?php
						
						
						$downpayment = 0;
						$insert = "Pending";
						$date = date('Y-m-d'); 
						
						$sql="INSERT INTO tblreserveevent (username, RegNo, fldarrival, fldtime, fldhour, fldhall, fldnumpax, fldcater, fldpaymenttype, fldterm, flddownpayment, fldtotal, status, fldfname, fldlname, fldcontact,flddate, fldbalance)
						 VALUES ('$login_session','$num','$_REQUEST[checkin]','$_REQUEST[time]','$_REQUEST[hours]','$_REQUEST[hall]','$_REQUEST[person]','$_REQUEST[cater]','$_REQUEST[pay]','$_REQUEST[term]','$downpayment','$_REQUEST[payment]','$insert','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$date','0')";
						mysql_query($sql);
						
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);
								}
						}
	
		else if ($_REQUEST['pay']=="Cash Deposit")	
		{
				
				$num = $_REQUEST['reg'] + 1;
										
										$avail = $_REQUEST['avail'] - $_REQUEST['cabana'];
						
						$get = $_REQUEST['get'] - $_REQUEST['numroom'];
						$date = date('Y-m-d'); 
						$insert = "Pending";
						$downpayment = 0;
			
						$sql="INSERT INTO tblreserveevent (username, RegNo, fldarrival, fldtime, fldhour, fldhall, fldnumpax, fldcater, fldpaymenttype, fldterm, flddownpayment, fldbalance, fldtotal, status, fldfname, fldlname, fldcontact,flddate, fldpayment)
						 VALUES ('$login_session','$num','$_REQUEST[checkin]','$_REQUEST[time]','$_REQUEST[hours]','$_REQUEST[hall]','$_REQUEST[person]','$_REQUEST[cater]','$_REQUEST[pay]','$_REQUEST[term]','$downpayment','$_REQUEST[payment]','$_REQUEST[payment]','$insert','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$date','0')";
						mysql_query($sql);
						
						$up ="UPDATE tblincre SET fldnum = '$number'";
						mysql_query($up);
						
						$req ="UPDATE tblhut SET fldavailable = '$avail' WHERE fldtype = '$_REQUEST[roomtype]'";
						mysql_query($req);
						
						$updt ="UPDATE tblroom SET fldavailable = '$get' WHERE fldtype = '$_REQUEST[room]'";
						mysql_query($updt);
						
						header("location:payment_cashdeposit.php?vn=1");
			
		}
}
?>
<br><br><br>
<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div>
							<br><br>
<form action="payment_details.php" method="post">
		<input type="hidden" name="form" value="1">
						
						<h2> Payment Details </h2>
						
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden" type="date" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						<input type="hidden" type="time" name="start" value="<?php echo $_REQUEST['start']; ?>">
						<input type="hidden" type="time" name="end" value="<?php echo $_REQUEST['end']; ?>">
						<input type="hidden" type="text" name="hours" value="<?php echo $_REQUEST['hours']; ?>">
						
						<div id="center" style="margin-left: 125px;">
						<div id="row">
						<div class="col-lg-5">
						First Name: <input type="text" class="form-control" name="fname" value="<?php echo $_REQUEST['fname']; ?>">
						</div>
						<div class="col-lg-5">
						Last Name: <input type="text" class="form-control" name="lname" value="<?php echo $_REQUEST['lname']; ?>">
						</div>
						</div>
						<div id="row">
						<div class="col-lg-5">
						Contact Number: <input type="text" class="form-control" name="num" value="<?php echo $_REQUEST['num']; ?>">
						</div>
						<div class="col-lg-5">
						Checkin: <input type="text" type="date" class="form-control" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						</div>
						</div>
						<div id="row">
						<div class="col-lg-5">
						Time: <input name="time" class="form-control" value="<?php echo $_REQUEST['time']; ?>">
						</div>
						<div class="col-lg-5">
						Additional Hour(s): <input type="text" class="form-control" type="text" name="hours" value="<?php echo $_REQUEST['hours']; ?>">
						</div>
						</div>
						<div id="row">
						<div class="col-lg-5">
						Function Hall: <input type="text" class="form-control" type="text" name="hall" value="<?php echo $_REQUEST['hall']; ?>">
						</div>
						
						<div class="col-lg-5">
						Number of Persons: <input type="text" class="form-control" type="text" name="person" value="<?php echo $_REQUEST['person']; ?>">
						</div>
						</div>
						<div id="row">
						<div class="col-lg-5">
						Catering: <input type="text" type="text" class="form-control" name="cater" value="<?php echo $_REQUEST['cater']; ?>">
						</div>
						<div class="col-lg-5">
						Total: <input type="text" class="form-control" name="payment" value="<?php  echo $_REQUEST['payment']; ?>">
						</div>
						</div>
						<div id="row">
						<div class="col-lg-5">
						Payment Type:  <select class="form-control" name="pay">
						<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Cash Deposit"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Cash Deposit" ? "selected" : "Cash Deposit" ?>>Cash Deposit</option>
						<option value="Paypal"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Paypal" ? "selected" : "Paypal" ?>>Paypal 
						</option></select><span class="color"></span>
						</div>
						
						<div class="col-lg-5">
							Term of Payment: <select class="form-control" name="term">
						<option value="other" <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Full Payment"  <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Full Payment" ? "selected" : "Full Payment" ?>>Full Payment</option>
						<option value="Downpayment"<?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Downpayment" ? "selected" : "Downpayment" ?>>Downpayment 
						</option></select><span class="color"><?php echo $_REQUEST['termErr']; ?></span>
					
						</div>
						</div>
						
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
					<div id="center" style="margin-left: 330px;">
						<div id="row">
						<div class="col-lg-6">
						<br>
						<input type="submit" class="btn btn-success" value="Confirm"> <a href="manage_reservation.php"><input type="button" class="btn btn-success" name="back"value="Back"></a>
										</div>
						</div>
							</div>
							</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

	 </div>
		<br><br>
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
				</form>
						</form>
							
						