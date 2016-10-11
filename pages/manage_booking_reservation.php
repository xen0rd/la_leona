
<?php
error_reporting(0);
?>
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
?>
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
						<form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">
						<input type="hidden" name="cmd" value="_xclick" />
						<input type="hidden" name="no_note" value="1" />
						<input type="hidden" name="currency_code" value="PHP" />
						<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
						<input type="hidden" name="first_name" value="Customer's First Name"  />
						<input type="hidden" name="last_name" value="Customer's Last Name"  />
						<input type="hidden" name="payer_email" value="customer@example.com"  />
						<input type="hidden" name="item_number"value="<?php echo $_REQUEST['reg'];  ?>">
						<input type="hidden" name="item_amount" value="<?php echo $less ?>" >
						<input style="margin-top:800px; margin-left: 240px; position: absolute;" TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" ></style>
						</form>
						</body>
						</html>
						
						<?php
							
						$reqs ="UPDATE tblreport SET fldpaymenttype= '$_REQUEST[pay]', fldterm= '$_REQUEST[term]'  WHERE RegNo = '$_REQUEST[reg]'";
						mysql_query($reqs);
						$req ="UPDATE tblreserve SET fldpaymenttype= '$_REQUEST[pay]', fldterm= '$_REQUEST[term]'  WHERE RegNo = '$_REQUEST[reg]'";
						mysql_query($req);
						
						
								}
			else if ($_REQUEST['term']=="Full Payment")
			{
			
						
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
						<input type="hidden" name="item_number"value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden" name="item_amount" value="<?php echo $_POST['total'] ?>" >
						<input style="margin-top:700spx; margin-left: 400px; position: absolute;"  TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" ></style>
						</form>
						</body>
						</html>
						
						<?php
						
								
						$reqs ="UPDATE tblreport SET fldpaymenttype= '$_REQUEST[pay]', fldterm= '$_REQUEST[term]'  WHERE RegNo = '$_REQUEST[reg]'";
						mysql_query($reqs);
						$req ="UPDATE tblreserve SET fldpaymenttype= '$_REQUEST[pay]', fldterm= '$_REQUEST[term]'  WHERE RegNo = '$_REQUEST[reg]'";
						mysql_query($req);
						
								}
		}
		else if ($_REQUEST['pay']=="Cash Deposit")	
		{
								
						$reqs ="UPDATE tblreport SET fldpaymenttype= '$_REQUEST[pay]', fldterm= '$_REQUEST[term]'  WHERE RegNo = '$_REQUEST[reg]'";
						mysql_query($reqs);	
						$req ="UPDATE tblreserve SET fldpaymenttype= '$_REQUEST[pay]', fldterm= '$_REQUEST[term]' WHERE RegNo = '$_REQUEST[reg]'";
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
$result = mysql_query("SELECT * FROM tblreserve WHERE RegNo = '$reg' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];

if($form == NULL)
{

	$reg = $fld['RegNo'];
	$fname = $fld['fldfname'];
	$lname = $fld['fldlname'];
	$contact = $fld['fldcontact'];
	$checkin = $fld['fldarrival'];
	$checkout = $fld['flddeparture'];
	$adult = $fld['fldadult'];
	$child = $fld['fldchild'];
	$roomtype = $fld['fldroom'];
	$cabana = $fld['fldcottagesnum'];
	$room = $fld['fldroomtype'];
	$numroom = $fld['fldnumofroom'];
	$types = $fld['fldstaytype'];
	$total = $fld['fldtotal'];
	$balance = $fld['fldbalance'];
	$status = $fld['status'];
	$downpayment = $fld['flddownpayment'];
	
		//room
	$room = $fld['fldroomtype'];
	$room3 = $fld['fldroom2'];
	$room4 = $fld['fldroom4'];
	$numroom = $fld['fldnumofroom'];
	$numrooms = $fld['fldnum2'];
	$numroomss = $fld['fldnum4'];
	
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
	


}
else if($form == 1)
{

	$reg = $_REQUEST['reg'];
	$checkin = $_REQUEST['checkin'];
	$checkout = $_REQUEST['checkout'];
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$contact= $_REQUEST['contact'];
	$adult = $_REQUEST['adult'];
	$child = $_REQUEST['child'];
	$roomtype = $_REQUEST['roomtype'];
	$room = $_REQUEST['room'];
	$numroom = $_REQUEST['numroom'];
	$cabana = $_REQUEST['cabana'];
	$types = $_REQUEST['types'];
	$total = $_REQUEST['total'];
	$balance = $_REQUEST['balance'];
	$status = $_REQUEST['status'];
	$downpayment = $_REQUEST['downpayment'];
	
	
	
		//room
	$room = $_REQUEST['room'];
	$room3 = $_REQUEST['room3'];
	$room4 = $_REQUEST['room4'];
	$numroom = $_REQUEST['numroom'];
	$numrooms = $_REQUEST['numrooms'];
	$numroomss= $_REQUEST['numroomss'];
	
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

}
?>

					<?php
	$err = $_REQUEST['err'];

	echo "<td>";
	echo "<span class='color'> ";
	echo $err;
	echo "</span>";
	echo "</td>";
?>
<form action="manage_booking_reservation.php" method="post">
		<input type="hidden" name="form" value="1">
								<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 1150px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:140px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
					  <h2><font  color="#f3be4b" > Update Payment </font></h2>
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
							<input type="hidden" name="user" value="<?php echo $_REQUEST['user']; ?>">
						<input type="hidden"  name="reserve" value="<?php echo $reserve; ?>">
						 <input class="textarea" type="hidden"  name="checkin" value="<?php echo $checkin; ?>">
						<input class="textarea" type="hidden" name="checkout" value="<?php echo $checkout; ?>">
						<input type="hidden" name="user" value="<?php echo $user; ?>">
						 <input class="textarea" type="hidden"  name="fname" value="<?php echo $fname; ?>">
						<input class="textarea" type="hidden" name="lname" value="<?php echo $lname; ?>">
						 <input class="textarea" type="hidden"  name="contact" value="<?php echo $contact; ?>">
					

						<input class="textarea" type="hidden" name="adult"value="<?php echo $adult; ?>"> 
						 <input type="hidden" class="textarea" name="child" size="4"value="<?php echo $child; ?>">
						<input class="textarea" type="hidden"  name="types" value="<?php echo $types; ?>"> 
	
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
						<input type="hidden"class="textarea" name="payy" value="<?php echo $payy; ?>">
				
			<?php ///////////////// POST ?>					
			
						<tr><td align="center" width="50%">Guest Name:</td><th width="50%"><?php echo $fname; ?> <?php echo $lname; ?></style></label>  </th></tr>
						<tr><td align="center">Contact:</td><th><?php echo $contact; ?></th></tr>
					
						<tr><td align="center">Checkin:</td><th><?php echo $checkin;?></th></tr>
						<tr><td align="center">Checkout:</td><th><?php echo $checkout;?></th></tr>
						<tr><td align="center">Adult(s):</td><th><?php echo $adult; ?></th></tr>
						
						<?php
						if ($child == NULL)
						{	

							?>
							<tr><td align="center" width="50%">Kids(s): </td><th><?php echo None; ?>  </th></tr>
							<?php
						}
						
						if ($child != NULL)
						{	
							?>
							<tr><td align="center" width="50%">Kids(s): </td><th><?php echo $child; ?>  </th></tr>
							<?php
						}
						
						?>	
						
						
						<tr><td align="center">Type of stay:</td><th><?php echo $types; ?> </th></tr>
						<?php 
						if ($roomtype || $roomtypes2 || $roomtypes3 || $roomtypes4 || $roomtypes5 != NULL)
						{
							?>
							<tr><td align="center" width="50%">Nipa and Hut rental: </td><th>
		
							<?php
							if ($roomtype != NULL)
							{	
								echo $roomtype; echo "&nbsp;( $cabana)<br>";
							}
							?> 
							<?php 
							if ($roomtypes2 != NULL)
							{	
								echo $roomtypes2;  echo "&nbsp;( $cabana2)<br>"; 
							}							
							?>
							<?php 
							if ($roomtypes3 != NULL)
							{	
								echo $roomtypes3; echo "&nbsp;( $cabana3)<br>";
							}
							?> 
							<?php 
							if ($roomtypes4 != NULL)
							{	
								echo $roomtypes4; echo "&nbsp;( $cabana4)<br>";
							}
							?>
							<?php 
							if ($roomtypes5 != NULL)
							{	
								echo $roomtypes5; echo "&nbsp;( $cabana5)<Br>";
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
								echo $room; echo"&nbsp;($numroom)"; 
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
					
						
						<tr><td align="center">Extra Bed: </td><th><?php echo $extra; ?> </th></tr></table>	<br><br>
						    </table>   <table class="table table-bordered table-hover" id="dataTables-example">
							<font face="century gothic" color="#f3be4b" size="5"> Payment</font>
				
						<?php
						$balan = $total - $payy;
							?>
	
						<tr><td align="center">Balance: ₱</td><th> <input type="text" readonly class="form-control" style="width:100%" name="balan" value="<?php echo  $balan; ?>"></th></tr>
						<tr><td align="center">Total: ₱ </td><th><input type="text" readonly class="form-control" style="width:100%" name="total" value="<?php echo $total; ?>"></th></tr>
						<tr><td align="center">Total Payment: ₱ </td><th><input type="text" readonly class="form-control" style="width:100%" name="payy" value="<?php echo $payy; ?>"></th></tr>

						<tr><td align="center">Status: </td><th><input type="text" readonly class="form-control" style="width:100%" name="status" value="<?php echo $status; ?>"></th></tr>
						<input type="hidden" class="form-control" style="width:100%" name="downpayment" value="<?php echo $downpayment; ?>"> 
			

						<?php 
						if ($_REQUEST['payment'] < $balan)
						 {
							 $pays = $_REQUEST['payment'] +  $payy; 
							 $balance1 = $total - $_REQUEST['payment'] ;
							?>
								<input type="hidden" readonly class="form-control" style="width:100%" name="balance1" value="<?php echo  $balance1; ?>"></th></tr>

							<?php

									
						 }
						
						
						 else if ($_REQUEST['payment'] > $balan)
						 {
						$bill = $_REQUEST['payment'] - $change ;
						$balance1 = $bill -  $balan; 
						$totl = $bill + $_REQUEST['downpayment'];
						
						$pays = $_REQUEST['payy'] + $balan; 			
						$change = $_REQUEST['payment'] - $balan; 
						?>
						
						<tr><td align="center">Change: ₱</td><th> <input type="text" readonly class="form-control" style="width:100%" name="change" value="<?php echo $change; ?>"></th></tr>
						<input type="text" readonly class="form-control" style="width:100%" name="balance1" value="<?php echo  "0"; ?>"></th></tr>
						<input  type="text" name="bill" value="<?php echo $bill; ?>">

						<?php
						}
						?>
					
						
					
						<tr><td align="center" width="50%">Payment Type: </td><th width="50%"> <select class="form-control" style="width:100%" name="pay"> 
							
						<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Cash Deposit"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Cash Deposit" ? "selected" : "Cash Deposit" ?>>Cash Deposit</option>
						<option value="Paypal"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Paypal" ? "selected" : "Paypal" ?>>Paypal 
						</option></select><span class="color"><?php echo $_REQUEST['payErr']; ?></span> </th></tr>
				
						<tr><td align="center" width="50%">Term of Payment:</td><th width="50%"> <select class="form-control" style="width:100%" name="term"><br><br>
						<option value="other" <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Full Payment"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["term"] == "Full Payment" ? "selected" : "Full Payment" ?>>Full Payment</option>
						<option value="Downpayment"<?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Downpayment" ? "selected" : "Downpayment" ?>>Downpayment 
						</option></select><span class="color"><?php echo $_REQUEST['termErr']; ?></span> </th></tr>
					
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
								
					
						<div class="center" style="margin-left:265px; position:absolute; top:95%; ">
							<input type="submit" class="btn btn-success" name="update" value="Update" formmethod="post"> <a href="manage_reservation.php"><input type="button" class="btn btn-success" name="back"value="Back"></a>
							</div>
							</form>
								
						</table>
		</div>
		</div>
		</div></div>
		</div>
	
		 					  <div id="white" style="width: 940px; height: 50px; background-color: white; margin-left: 280px; margin-top:-20px;"></div><br>

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


					