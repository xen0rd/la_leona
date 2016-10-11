
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
			<ul>
				<li>
					
					<div>

					</div>
				</li>
				<li>
			<label > <font face="century gothic" color="#f3be4b" size="4"> Event Hall Reservation </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
			
		</div>
    <?php
	error_reporting(0);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$con = mysql_connect("localhost","root","");
		if (!$con) 
		 {
		  die('Could not connect: ' . mysql_error());
		  }

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
						<input style="margin-top:785px; margin-left: 300px; position: absolute;"TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" ></style>
						</form>
						</html>
						
						<?php
							
						$insert = "Pending";
						$date = date('Y-m-d'); 
						
						$sql="INSERT INTO tblreserveevent (username, RegNo, fldarrival, fldtime, fldhour, fldhall, fldnumpax, fldcater, fldpaymenttype, fldterm, fldtotal, status, fldfname, fldlname, fldcontact,flddate, fldbalance)
						 VALUES ('$login_session','$num','$_REQUEST[checkin]','$_REQUEST[time]','$_REQUEST[hours]','$_REQUEST[hall]','$_REQUEST[person]','$_REQUEST[cater]','$_REQUEST[pay]','$_REQUEST[term]','$_REQUEST[payment]','$insert','$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[num]','$date','$less')";
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
						<input style="margin-top:785px; margin-left: 240px; position: absolute;"  TYPE="image" SRC="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" value="Payment via Paypal" ></style>
						</form>
						</html>
						<?php
						
						
						$downpayment = 0;
						$insert = "Pending";
						$date = date('Y-m-d'); 
						
						$sql="INSERT INTO tblreserveevent (username, RegNo, fldarrival, fldtime, fldhour, fldhall, fldnumpax, fldcater, fldpaymenttype, fldterm, flddownpayment, fldtotal, status, fldfname, fldlname, fldcontact,flddate, fldbalance)
						 VALUES ('$login_session','$num','$_REQUEST[checkin]','$_REQUEST[time]','$_REQUEST[hours]','$_REQUEST[hall]','$_REQUEST[person]','$_REQUEST[cater]','$_REQUEST[pay]','$_REQUEST[term]','$downpayment','$_REQUEST[payment]','$insert','$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[num]','$date','0')";
						mysql_query($sql);
						
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);
				}
			}
	
			else if ($_REQUEST['pay']=="Cash Deposit")	
			{
				
						$num = $_REQUEST['reg'] + 1;
			
						$date = date('Y-m-d'); 
						$insert = "Pending";
						$downpayment = 0;
			
						$sql="INSERT INTO tblreserveevent (username, RegNo, fldarrival, fldtime, fldhour, fldhall, fldnumpax, fldcater, fldpaymenttype, fldterm, flddownpayment, fldbalance, fldtotal, status, fldfname, fldlname, fldcontact,flddate, fldpayment)
						 VALUES ('$login_session,'$num','$_REQUEST[checkin]','$_REQUEST[time]','$_REQUEST[hours]','$_REQUEST[hall]','$_REQUEST[person]','$_REQUEST[cater]','$_REQUEST[pay]','$_REQUEST[term]','$downpayment','$_REQUEST[payment]','$_REQUEST[payment]','$insert','$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[num]','$date','0')";
						mysql_query($sql);
						
						$up ="UPDATE tblincre SET fldnum = '$number'";
						mysql_query($up);
						
						header("location:payment_cashdeposit1.php?vn=1");
			}
		}
	



	

	$errr = $_REQUEST['errr'];

	echo "<td>";
	echo "<span class='colorr pos' style='margin-left:-120px; margin-top: -200px; font-size: 15px;'> ";
	echo $errr;
	echo "</span>";
	echo "</td>";

	$checkin = $_REQUEST['checkin'];
	$time = $_REQUEST['time'];
	$hours = $_REQUEST['hours'];
	$hall = $_REQUEST['hall'];
	$person = $_REQUEST['person'];
	$cater = $_REQUEST['cater'];
	$payment = $_REQUEST['payment'];

	
$check= mysql_query("SELECT * FROM tblregister WHERE username = '$login_session'");
$select = mysql_fetch_array($check); 
	
	
	$checks= mysql_query("SELECT * FROM tblincre");
$incre = mysql_fetch_array($checks);   
	
	?>
	<div id="body">
		<div class="content">
			<div class="section">
			
						<table border="1">
							<td  height="350px" width="280px" style="border-style:dotted solid; border-width: 4px; margin-top: 100px; margin-left: 639px; position: absolute;"> 
							<font color=crimson> <h3>Accomodation Preferences </h3></font>
							
							
						<font size="4">
						
						<input type="hidden" type="time" name="start" value="<?php echo $_REQUEST['start']; ?>">
						<input type="hidden" type="time" name="end" value="<?php echo $_REQUEST['end']; ?>">						
						<input type="hidden" name="reg" value="<?php echo $incre['fldnum']; ?>">
						
						Checkin: <?php echo $checkin; ?><input type="hidden" type="date" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>"><br>
						Time:  <?php echo $time; ?><input name="time" type="hidden" value="<?php echo $_REQUEST['time']; ?>"><br>
						<input class="form-control" type="hidden" name="hours" value="<?php echo $_REQUEST['hours']; ?>">
						<?php 
						if ($hours != NULL)
						{
							?>
							Additional Hour(s): <?php echo $hours; ?><br>
							<?php
						}
						if($hours == NULL)
						{	
							?>
							Additional Hour(s): <?php echo None;  ?><br>
							<?php
						}
						?>
						
						Number of Persons:  <?php echo $person; ?><input type="hidden" name="person" value="<?php echo $_REQUEST['person']; ?>"><br>
						Catering:<?php echo $cater; ?> <input type="hidden" name="cater" value="<?php echo $_REQUEST['cater']; ?>"><br>
						
						<?php
						$tot = $_REQUEST['payment'] * 0.12;
						$tots = $_REQUEST['payment'] - $tot;
						?>
						Vatable Sales: Php <?php echo $tots; ?><input type="hidden" name="tots" value="<?php echo $_REQUEST['tots']; ?>"><br>
						VAT (12%): Php <?php echo $tot; ?><input type="hidden" name="tot" value="<?php echo $_REQUEST['tot']; ?>"><br>
						
						Total:  <?php echo $payment; ?><input type="hidden" name="payment" value="<?php echo $_REQUEST['payment']; ?>"><Br>
	
						<font color=blue> <h3>Function Hall</h3></font>

						<?php echo $hall; ?><input  type="hidden" name="hall" value="<?php echo $_REQUEST['hall']; ?>"><br>
						
						

							</td>
							
							
							</table>
				<div class="booking">
					<h2>Guest Info </h2>
		
					<form method="post" action="register3.php">

						<h4>Contact information</h4>
						<div class="form1">
							<div>
							
							<input class="textarea" type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						<input class="textarea" type="hidden" name="time" value="<?php echo $_REQUEST['time'];?>">
	
						<input  type="hidden"  name="hours" value="<?php echo $_REQUEST['hours']; ?>">
						<input type="hidden" name="person" value="<?php echo $_REQUEST['person']; ?>">
						
						<input type="hidden" name="cater" value="<?php echo $_REQUEST['cater']; ?>">
						<input type="hidden" name="payment" value="<?php echo $_REQUEST['payment']; ?>">
						<input  type="hidden" name="hall" value="<?php echo $_REQUEST['hall']; ?>"><br>
						<input type="hidden" name="reg" value="<?php echo $incre['fldnum']; ?>">

							
							
							
						<input type="text" name="firstname" value="<?php echo $select['fldfname']; ?>"><br>
						<input type="text" name="lastname" value="<?php echo $select['fldlname']; ?>"><br>
						<input type="text" name="num" value="<?php echo $select['fldcontact']; ?>"><br>
						<input type="text" name="email" value="<?php echo $select['fldemail']; ?>"><br>
							
							
        </select> <span class="colorr"> </span>
		Payment Type: <select class="form-control" name="pay">
						<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Cash Deposit"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Cash Deposit" ? "selected" : "Cash Deposit" ?>>Cash Deposit</option>
						<option value="Paypal"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Paypal" ? "selected" : "Paypal" ?>>Paypal 
						</option></select>
						
		Term of Payment:<select class="form-control" name="term">
						<option value="other" <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Full Payment"  <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Full Payment" ? "selected" : "Full Payment" ?>>Full Payment</option>
						<option value="Downpayment"<?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Downpayment" ? "selected" : "Downpayment" ?>>Downpayment 
						</option></select><span class="color"><?php echo $_REQUEST['termErr']; ?></span>
						
								
							</div>
						</div>
						<div class="form2">
							<div>
							</div>
						</div>
						
						<button type="submit" value="submit" onclick="send" class="btn btn-default">Submit<a href="register3.php"></button><button type="button" class="btn btn-default">Clear</button></a></span>
        </form>
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
						<a href="">facebook</a>
					</li>
					<li id="twitter">
						<a href="">twitter</a>
					</li>
					<li id="googleplus">
						<a href="">googleplus</a>
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
					<a href="">admin</a>
				</li>
			</ul>
		</div>
	</div>
    

</body>
</html>