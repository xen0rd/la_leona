
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
				<li class="booking">

					<ul>
					<li>
					<?php 
				
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
	
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		if ($_REQUEST['conf']=="Back to Account")
		{	
			
						$insert = "Reserved";
						
						$bal = $_REQUEST['item_amount'] - $tots;
						
						$up ="UPDATE tblreserveevent SET status = '$insert', transaction_id = '$_REQUEST[txn_id]', fldpayment = '$_REQUEST[item_amount]', fldbalance = '$bal' WHERE RegNo = '$_REQUEST[item_number]'";
						mysql_query($up);
						$upq ="UPDATE tblreportsevent SET status = '$insert', transaction_id = '$_REQUEST[txn_id]', fldpayment = '$_REQUEST[item_amount]', fldbalance = '$bal' WHERE RegNo = '$_REQUEST[item_number]'";
						mysql_query($upq);
						
						$upd ="UPDATE tblreserve SET status = '$insert', transaction_id = '$_REQUEST[txn_id]', fldpayment = '$_REQUEST[item_amount]', fldbalance = '$bal' WHERE RegNo = '$_REQUEST[item_number]'";
						mysql_query($upd);
						
						$ups ="UPDATE tblreport SET status = '$insert', transaction_id = '$_REQUEST[txn_id]',  fldpayment = '$_REQUEST[item_amount]', fldbalance = '$bal' WHERE RegNo = '$_REQUEST[item_number]'";
						mysql_query($ups);
						
						
$subject = "Reservation Complete";
$message = "Thank you for your reservation";
$message = "Your Registering details are as follows:";


$from = "laleoanaresort@gmail.com";
$to =  array('$_REQUEST[email]', $from);
$lp = "notification@example.com";

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





						header("location:index.php");
						

					
		}
}
								
					
$check= mysql_query("SELECT * FROM tblregister WHERE username = '$login_session'");
$select = mysql_fetch_array($check); 

$checks= mysql_query("SELECT * FROM tblreserve WHERE RegNo = '$_REQUEST[item_number]'");
$selects = mysql_fetch_array($checks); 

?>





<form action="payment-successful.php" method="post">
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 400px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:140px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
					  <br>
					  <br>
					  <br>
					  <br>
						<h1 align="center">Thank You For Your Reservation</h1> 
						<input type="hidden"  name="tots" value="<?php echo $selects['fldtotal']; ?>">

						<input type="hidden"  name="item_number" value="<?php echo $_REQUEST['item_number']; ?>">
						<input type="hidden" name="email" value="<?php echo $select['fldemail']; ?>">
						<input type="hidden" name="txn_id" value="<?php echo $_REQUEST['txn_id']; ?>">
						<input type="hidden"  name="item_amount" value="<?php echo $_REQUEST['mc_gross']; ?>">
						<div class="center" style="margin-left:265px; position:absolute; top:89%; ">
						<input type="submit" name="conf" value="Back to Account"> 
						</div>

<form>
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


						