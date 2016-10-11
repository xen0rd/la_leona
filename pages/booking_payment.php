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
	<!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="index.php">
				<input type="text" name="search" id="search" value="">
				<input type="submit" name="searchBtn" id="searchBtn" value="">
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
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
	if ($_REQUEST['pay']=="Paypal")
		{
							if ($_REQUEST['term']=="Downpayment")
								{
									$less = $_REQUEST['totalp'] / 2;
										$num = $_REQUEST['reg'] + 1;
										
										$insert = "Pending";
										$date = date('Y-m-d'); 
										
										$networth = $transac['fldnetworth'] + $_REQUEST['less'];
						
						?>
						<div id="center" style="margin-left:269px; position:absolute; top:102%;" >
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
						<input type="hidden" name="item_number"value="<?php echo $num  ?>">
						<input type="hidden" name="item_amount" value="<?php echo $less ?>" >
						<input TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" >
						</form>
						</body>
						</html>
						</div>
						<?php
						$sqlq="INSERT INTO tblreport (username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4,, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sqlq);

						
						if($_REQUEST['checkawt'] > 1)
						{
						for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 						
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
							}
						}
						if($_REQUEST['checkawt'] <=1 )
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
						{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 						
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
						}				
						}
						if($_REQUEST['checkawt'] == 0 )
						{
						$datet = $_REQUEST['checkin'];				
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$datet','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
						}
					
						
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);
						
						
						
								}
			else if ($_REQUEST['term']=="Full Payment")
								{
									$num = $_REQUEST['reg'] + 1;
									
						
						$insert = "Pending";
						$date = date('Y-m-d'); 
						
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
						<input type="hidden" name="item_amount" value="<?php echo $_POST['totalp'] ?>" >
						<input TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" >
						</form>
						</body>
						</html>
						
						<?php
						
						$downpayment = 0;
					$sqlq="INSERT INTO tblreport (username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4,, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sqlq);
						
						if($_REQUEST['checkawt'] > 1)
						{
						for($x=0;$x<$_REQUEST['checkawt'];$x++)
						{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 						
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
						}
						}
						if($_REQUEST['checkawt'] <=1 )
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
						{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 						
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
						}				
						}
						if($_REQUEST['checkawt'] == 0 )
						{
						$datet = $_REQUEST['checkin'];				
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$datet','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
						}
					
						
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);
						
						
								}
		}
		if ($_REQUEST['pay']=="Cash Deposit")	
		{
			
			if($_REQUEST['term']=="Fullpayment")
			{
						
					$date = date('Y-m-d'); 
						$num = $_REQUEST['reg'] + 1;
						
						$sqlq="INSERT INTO tblreport (username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4,, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sqlq);
									
						if($_REQUEST['checkawt'] > 1 )
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Pending','$_REQUEST[term]','$_REQUEST[pay]','$datet','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
							}
							
						header("location:payment_cashdeposit.php");
						}
						
			
						if($_REQUEST['checkawt'] <= 1 )
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Pending','$_REQUEST[term]','$_REQUEST[pay]','$datet','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
							}
						
						header("location:payment_cashdeposit.php");
			
						}
						
					
						if($_REQUEST['checkawt'] == 0 )
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$zero','Pending','$_REQUEST[term]','$_REQUEST[pay]','$dates','$_REQUEST[totalp]','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
						
							}
						header("location:payment_cashdeposit.php");
			
						}
											
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);	
				}
	if($_REQUEST['term']=="Downpayment")
			{
						$date = date('Y-m-d'); 
						$less = $_REQUEST['totalp'] / 2;
						$num = $_REQUEST['reg'] + 1;
						
						$sqlq="INSERT INTO tblreport (username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4,, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','$insert','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sqlq);
									
						if($_REQUEST['checkawt'] > 1 )
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Pending','$_REQUEST[term]','$_REQUEST[pay]','$datet','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
							}
							
						header("location:payment_cashdeposit.php");
						}
						
			
						if($_REQUEST['checkawt'] <= 1 )
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldbalance)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Pending','$_REQUEST[term]','$_REQUEST[pay]','$datet','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$_REQUEST[totalp]')";
						mysql_query($sql);
							}
						
						header("location:payment_cashdeposit.php");
			
						}
						
					
						if($_REQUEST['checkawt'] == 0 )
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
						$datet = $_REQUEST['checkin'];
						$dates = date('Y-m-d', strtotime($datet . "+$x days")); 
						$sql="INSERT INTO tblreserve(username, RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5)
						 VALUES ('$login_session','$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$zero','Pending','$_REQUEST[term]','$_REQUEST[pay]','$dates','$_REQUEST[totalp]','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]')";
						mysql_query($sql);
						
							}
						header("location:payment_cashdeposit.php");
			
						}
											
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);	
				}
		
		}
	
}
						


$avail = mysql_query("SELECT fldavailable FROM tblhut WHERE fldtype = '$_REQUEST[roomtype]'");
$price = mysql_fetch_array($avail);
	
$get = mysql_query("SELECT fldavailable FROM tblroom WHERE fldtype = '$_REQUEST[room]'");
$free = mysql_fetch_array($get);
?>



<form action="booking_payment.php" method="post">
						<div id="center" style="margin-left:0px;" >
											 <center>		
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 750px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<h2>Booking Reservation</h2>
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>">
						<input type="hidden" name="get" value="<?php echo $free['fldavailable']; ?>">
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden"  name="fname" value="<?php echo $_REQUEST['fname']; ?>">
						<input type="hidden" name="lname" value="<?php echo $_REQUEST['lname']; ?>">
						<input  type="hidden"  min="12" name="num" value="<?php echo $_REQUEST['num']; ?>"> 
						 <input type="hidden" name="checkout" value="<?php echo $_REQUEST['checkout']; ?>">
						  <input type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">

						<input type="hidden" size="4" name="adult" value="<?php echo $_REQUEST['adult']; ?>">
						<input type="hidden"  name="child" size="4"value="<?php echo $_REQUEST['child']; ?>"> 
						<input type="hidden" name="types" size="4"value="<?php echo $_REQUEST['types']; ?>"> 
						<input type="hidden"  name="night" value="<?php echo $_REQUEST['night']; ?>">
				
						<?php /// COTTAGES ?>
						<input type="hidden" name="roomtype" value="<?php echo $_REQUEST['roomtype']; ?>">
						<input type="hidden" name="roomtypes2" value="<?php echo $_REQUEST['roomtypes2']; ?>">
						<input type="hidden" name="roomtypes3" value="<?php echo $_REQUEST['roomtypes3']; ?>">
						<input type="hidden" name="roomtypes4" value="<?php echo $_REQUEST['roomtypes4']; ?>">
						<input type="hidden" name="roomtypes5" value="<?php echo $_REQUEST['roomtypes5']; ?>">


						<?php /// Cottages number reserved ?>
						
						<input type="hidden"  name="cabana" value="<?php echo $_REQUEST['cabana']; ?>">
						<input type="hidden"  name="cabana2" value="<?php echo $_REQUEST['cabana2']; ?>">
						<input type="hidden"  name="cabana3" value="<?php echo $_REQUEST['cabana3']; ?>">
						<input type="hidden"  name="cabana4" value="<?php echo $_REQUEST['cabana4']; ?>">
						<input type="hidden"  name="cabana5" value="<?php echo $_REQUEST['cabana5']; ?>">

						<?php ///ROOMS ?>
						
						<input type="hidden" readonly name="room" value="<?php echo $_REQUEST['room']; ?>">
						<input type="hidden" readonly name="room3" value="<?php echo $_REQUEST['room3']; ?>">
						<input type="hidden" readonly name="room4" value="<?php echo $_REQUEST['room4']; ?>">

						<?php /// Rooms number reserved ?>
						<input type="hidden" readonly name="numroom" value="<?php echo $_REQUEST['numroom']; ?>">
						<input type="hidden" readonly name="numrooms" value="<?php echo $_REQUEST['numrooms']; ?>">
						<input type="hidden" readonly name="numroomss" value="<?php echo $_REQUEST['numroomss']; ?>">
						<input type="hidden" name="totalp" value="<?php  echo $_REQUEST['totalp']; ?>">


						
											
						
						
						<?php ////// POST SECTION ?>
			
						<tr><td align="center" width="50%">First Name: </td><th width="50%"><?php echo $_REQUEST['fname'];?>	</th></tr>			
						<tr><td align="center" width="50%">Last Name: </td><th width="50%"><?php echo $_REQUEST['lname'];?> </th></tr>				
						<tr><td align="center" width="50%">Contact Number:  </td><th width="50%"><?php echo $_REQUEST['num'];?> </th></tr>
						

						<tr><td align="center" width="50%">Checkin:  </td><th width="50%"><?php echo $_REQUEST['checkin'];?> </th></tr>
						<tr><td align="center" width="50%">Checkout:  </td><th width="50%"><?php echo $_REQUEST['checkout'];?> </th></tr>

						<tr><td align="center" width="50%">Adults(13 years old and above): </td><th width="50%"><?php echo $_REQUEST['adult'];?> </th></tr>
						<tr><td align="center" width="50%">Kids(3-12 years old):</td><th width="50%"><?php echo $_REQUEST['child'];?> </th></tr>
						<tr><td align="center" width="50%">Type of Stay:  </td><th width="50%"><?php echo $_REQUEST['types'];?> </th></tr>

						<tr><td align="center" width="50%">Nights of stay:</td><th width="50%"><?php echo $_REQUEST['night'];?> </th></tr>
		
						<tr><td align="center" width="50%">Nipa and Hut rental: </td><th width="50%"><?php echo $_REQUEST['roomtype'];?> 
						<?php echo $_REQUEST['roomtypes2']; ?>
						<?php echo $_REQUEST['roomtypes3']; ?>
						<?php echo $_REQUEST['roomtypes4']; ?> 
						<?php echo $_REQUEST['roomtypes5']; ?> </th></tr>					
						
						<tr><td align="center" width="50%">Number of Cottage(s): </td><th width="50%"><?php echo $_REQUEST['cabana'];?>
						<?php echo $_REQUEST['cabana2'];?> 
						 <?php echo $_REQUEST['cabana3'];?> 
						  <?php echo $_REQUEST['cabana4'];?> 
						    <?php echo $_REQUEST['cabana5'];?> </th></tr>

						<tr><td align="center" width="50%">Room Rental:  </td><th width="50%"><?php echo $_REQUEST['room2'];?>
						  <?php echo $_REQUEST['room3'];?> 
						    <?php echo $_REQUEST['room4'];?></th></tr>
						
						<tr><td align="center" width="50%">Number of Room(s):  </td><th width="50%"><?php echo $_REQUEST['numroom'];?>
						  <?php echo $_REQUEST['numrooms'];?> 
						    <?php echo $_REQUEST['numroomss'];?> </th></tr>
						
					
						<tr><td align="center" width="50%">Total: Php </td><th width="50%"><input type="text"  readonly  name="totalp" class="form-control"  value="<?php  echo $_REQUEST['totalp']; ?>"></th></tr>
						
						<tr><td align="center" width="50%">Payment Type: </td><th width="50%"> <select class="form-control" name="pay" class="form-control" >
						<option   value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option   value="Cash Deposit"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Cash Deposit" ? "selected" : "Cash Deposit" ?>>Cash Deposit</option>
						<option   value="Paypal"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Paypal" ? "selected" : "Paypal" ?>>Paypal 
						</option></th></tr>
						</div>
						
						<tr><td align="center" width="50%">Term of Payment:</td><th width="50%"> <select class="form-control" class="form-control"  name="term">
						<option  value="other" <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option   value="Full Payment"  <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Full Payment" ? "selected" : "Full Payment" ?>>Full Payment</option>
						<option   value="Downpayment"<?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Downpayment" ? "selected" : "Downpayment" ?>>Downpayment 
						</option></th></tr></select><span class="color"><?php echo $_REQUEST['termErr']; ?></span>
						<input type="hidden" name="checkawt" value="<?php echo $_REQUEST['checkawt'];?>">
						<input type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin'];?>">
					
		<div class="center" style="margin-left:265px; position:absolute; top:95%; ">
						<input type="submit" class="btn btn-success" value="Confirm"> <a href="reserved.php"><input class="btn btn-success" type="button" name="back"value="Back"></a>
					</div>
						

				</form>

						</table>
						</div></div>
                 </div></div></div>
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
						<a href="#">Weâ€™re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a>
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
						<a href="#">Mutya ng Batangan 2010 Candidatesâ€™ Pictorial at La Leona Resort</a>
					</li>
					<li>
						<a href="#">La Leona Resort is now Online!</a>
					</li>
					<li>
						<a href="#">La Leona Resortâ€™s Recreation  </a>
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
</body>
</html>
