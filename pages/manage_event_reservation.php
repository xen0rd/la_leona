
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
	
	if ($_REQUEST['pay']=="Paypal")
						{
							if ($_REQUEST['term']=="Downpayment")
								{
									$less = $_REQUEST['total'] / 2;
						
							?>
						
						<html>
						<head>
						<meta charset="utf-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						</head>
						<body>
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
						</body>
						</html>
						</div>
						<?php
						
						
								}
							else if ($_REQUEST['term']=="Full Payment")
								{
									$num = $_REQUEST['reg'] + 1;
									
							?>
						<div class="center" style="margin-left:400px; position:absolute; top:150%; ">
						<html>
						<head>
						<meta charset="utf-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						</head>
						<body>
						<form class="paypal" action="payments.php" method="post" id="paypal_form">
						<input type="hidden" name="cmd" value="_xclick" />
						<input type="hidden" name="no_note" value="1" />
						<input type="hidden" name="currency_code" value="PHP" />
						<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
						<input type="hidden" name="first_name" value="Customer's First Name"  />
						<input type="hidden" name="last_name" value="Customer's Last Name"  />
						<input type="hidden" name="payer_email" value="customer@example.com"  />
						<input type="hidden" name="item_number"value="<?php echo $num  ?>">
						<input type="hidden" name="item_amount" value="<?php echo $_POST['total'] ?>" >
						<input TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" >
						</form>
						</body>
						</html>
						</div>
						<?php
					
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
			
						$req ="UPDATE tblreserveevent SET fldpaymenttype = '$_REQUEST[pay]', fldterm = '$_REQUEST[term]' WHERE RegNo = '$_REQUEST[reg]'";
						mysql_query($req);
						
						
						
						header("location:payment_cashdeposit.php?vn=1");
			
		}
}
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
	$reserve = $fld['RegNo'];
	$checkin = $fld['fldarrival'];
	$time = $fld['fldtime'];
	$hours = $fld['fldhour'];
	$hall = $fld['fldhall'];
	$person = $fld['fldnumpax'];
	$cater = $fld['fldcater'];
	$total = $fld['fldtotal'];

	

}
else if($form == 1)
{
	$reserve = $_REQUEST['reserve'];
	$checkin = $_REQUEST['checkin'];
	$time = $_REQUEST['time'];
	$hours = $_REQUEST['hours'];
	$hall = $_REQUEST['hall'];
	$person = $_REQUEST['person'];
	$cater = $_REQUEST['cater'];
	$total = $_REQUEST['total'];

}
?>
<form action="manage_event_reservation.php" method="post">
		<input type="hidden" name="form" value="1">
					
 <center>		
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 700px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<h2>Manage Event Reservation</h2>
	

			
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden" type="date" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						<input type="hidden" type="time" name="start" value="<?php echo $_REQUEST['start']; ?>">
						<input type="hidden" type="time" name="end" value="<?php echo $_REQUEST['end']; ?>">
						<input type="hidden" type="text" name="hours" value="<?php echo $_REQUEST['hours']; ?>">
							
			
						<input type="hidden"  name="reserve" value="<?php echo $reserve; ?>"><br><br>
						
						<tr><td align="center" width="50%">Checkin date:</td><th width="50%"> <input class="form-control" type="date"  name="checkin" value="<?php echo $checkin; ?>"></th></tr>
						<tr><td align="center" width="50%">Time: </td><th width="50%"><input class="form-control"   type="text" name="time" value="<?php echo $time; ?>"></th></tr>
						
				
						<tr><td align="center" width="50%">Hours:</td><th width="50%"> <input type="text" READONLY class="form-control"  name="hours" size="4"value="<?php echo $hours; ?>"></th></tr>

						<tr><td align="center" width="50%">Function Hall: </td><th width="50%"><input class="form-control" type="text" name="hall" value="<?php echo $hall; ?>"></th></tr>
					   <tr><td align="center" width="50%">Number of Persons: </td><th width="50%"><input type="text" class="form-control" name="person"  value="<?php echo $person; ?>"></th></tr>
						<tr><td align="center" width="50%">Catering:</td><th width="50%"> <input type="text" READONLY class="form-control"  name="cater" size="4"value="<?php echo $cater; ?>"></th></tr>
			
						<tr><td align="center" width="50%">Total: </td><th width="50%"><input type="text" class="form-control" name="total" value="<?php echo $total; ?>"></th></tr>
						
						
						<tr><td align="center" width="50%">Payment Type: </td><th width="50%"> <select class="form-control" name="pay">
						<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Credit Card"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Credit Card" ? "selected" : "Credit Card" ?>>Credit Card</option>
						<option value="Paypal"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Paypal" ? "selected" : "Paypal" ?>>Paypal 
						</option></select><span class="color"><?php echo $_REQUEST['payErr']; ?></span></th></tr>
						
						<tr><td align="center" width="50%">Term of Payment:</td><th width="50%"> <select class="form-control" name="term">
						<option value="other" <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Full Payment"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["term"] == "Full Payment" ? "selected" : "Full Payment" ?>>Full Payment</option>
						<option value="Downpayment"<?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Downpayment" ? "selected" : "Downpayment" ?>>Downpayment 
						</option></select><span class="color"><?php echo $_REQUEST['termErr']; ?></span></th></tr>	
					
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
								
					
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<div class="center" style="margin-left:265px; position:absolute; top:93%; ">
							<input type="submit" class="btn btn-success" value="Update" formmethod="post"> <a href="manage_reservation.php"><input type="button" class="btn btn-success" name="back"value="Back"></a>
							</div>
							<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							<div class="overlay6">
							Are you sure you want to update this Reservation?<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
							<a href="manage_reservation.php"><button type="button" class="buttons">NO</button></a>
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
		<br>
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