<?php
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
					
						
						$date = date ('Y-m-d');
			$sql="INSERT INTO tblcancel(username, RegNo, fldfname, fldlname, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldpayment, fldchange)
						 VALUES ('$_REQUEST[user]','$_REQUEST[reg]','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[total]','Reserved','$_REQUEST[term]','$_REQUEST[type]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$_REQUEST[payment]','$_REQUEST[change]')";
						mysql_query($sql);

				$result = mysql_query("DELETE FROM tblreserve WHERE RegNo ='$_REQUEST[reg]' ");	

				$results = mysql_query("DELETE FROM tblreport WHERE RegNo ='$_REQUEST[reg]' ");	

					header("location:reserved.php");
				}
					else
					{
					
					header("location:admin_cancelbooking.php?reg=$_REQUEST[reg]&form=1&reserve=$_REQUEST[reserve]&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&night=$_REQUEST[night]&roomtype=$_REQUEST[roomtype]&cabana=$_REQUEST[cabana]&room=$_REQUEST[room]&payment=$_REQUEST[payment]&numroom=$_REQUEST[numroom]&totalp=$_REQUEST[totalp]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&numroom=$_REQUEST[numroom]&totalp=$_REQUEST[totalp]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&payment=$_REQUEST[payment]&room3=$_REQUEST[room3]&numrooms=$_REQUEST[numrooms]&cabana=$_REQUEST[cabana]&numroom=$_REQUEST[numroom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&user=$_REQUEST[user]&total=$_REQUEST[total]&change=$_REQUEST[change]&status=$_REQUEST[status]&term=$_REQUEST[term]&type=$_REQUEST[type]&conf=1");
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
$result = mysql_query("SELECT * FROM tblreserve WHERE RegNo = '$reg' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];

if($form == NULL)
{
	$reg = $fld['RegNo'];

	$user = $fld['username'];
	$checkin = $fld['fldarrival'];
	$checkout = $fld['flddeparture'];
	$adult = $fld['fldadult'];
	$child = $fld['fldchild'];
		$fname= $fld['fldfname'];
		$contact= $fld['fldcontact'];
	$lname = $fld['fldlname'];

	
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
	$total = $fld['fldtotal'];
	$payment = $fld['fldpayment'];
	
	$change = $fld['fldchange'];
	$type = $fld['fldpaymenttype'];
		$term = $fld['fldterm'];
	$status = $fld['status'];

}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];


	$user = $_REQUEST['user'];
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
	
	$change = $_REQUEST['change'];
	$type = $_REQUEST['type'];
	$term = $_REQUEST['term'];
	$status = $_REQUEST['status'];
}
?>

		
<form action="admin_cancelbooking.php" method="post">
		<input type="hidden" name="form" value="1">
						 <center>		
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 950px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<h2>Cancel Reservation</h2>
						<input type="hidden" name="user" value="<?php echo $user; ?>">

						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden"  name="reserve" value="<?php echo $reserve; ?>">
						<input type="hidden" name="fname" value="<?php echo $select['fldfname']; ?>">
						<input type="hidden" name="lname" value="<?php echo $select['fldlname']; ?>">
						<input type="hidden" name="contact" value="<?php echo $select['fldcontact']; ?>">
						
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
						
						<input type="hidden"class="textarea" name="type" value="<?php echo $type; ?>">
						<input type="hidden" name="term" value="<?php echo $term	; ?>">

						<input type="hidden" name="status" value="<?php echo $status; ?>">
					
					
						<tr><td align="center" width="50%">Guest Name:</td><th width="50%"><?php echo $fname; ?> <?php echo $lname; ?></style></label>  </th></tr>

						<tr><td align="center" width="50%">Contact:</td><th width="50%"><?php echo $contact; ?>  </th></tr>
					
						<tr><td align="center" width="50%">Checkin:</td><th width="50%"><?php echo $checkin;?></th></tr>
						<tr><td align="center" width="50%">Checkout:</td><th width="50%"><?php echo $checkout;?></th></tr>
						<tr><td align="center" width="50%">Adult(s):</td><th width="50%"><?php echo $adult; ?></th></tr>
						
						
					
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
						
					<?php 
						if ($roomtype || $roomtypes2 || $roomtypes3 || $roomtypes4 || $roomtypes5 != NULL)
						{
							?>
							<tr><td align="center" width="50%">Nipa and Hut rental: </td><th>
		
							<?php
							if ($roomtype != NULL)
							{	
								echo $roomtype; echo "&nbsp;(x$cabana)<br>";
							}
							?> 
							<?php 
							if ($roomtypes2 != NULL)
							{	
								echo $roomtypes2;  echo "&nbsp;(x$cabana2)<br>"; 
							}							
							?>
							<?php 
							if ($roomtypes3 != NULL)
							{	
								echo $roomtypes3; echo "&nbsp;(x$cabana3)<br>";
							}
							?> 
							<?php 
							if ($roomtypes4 != NULL)
							{	
								echo $roomtypes4; echo "&nbsp;(x$cabana4)<br>";
							}
							?>
							<?php 
							if ($roomtypes5 != NULL)
							{	
								echo $roomtypes5; echo "&nbsp;(x$cabana5)<Br>";
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
								echo $room; echo"&nbsp;(x$numroom)"; 
							}
							?>
							<br>
						
							<?php 
							if ($room3 != NULL)
							{	
								echo $room3;   echo "&nbsp;(x$numrooms )"; 
							}
							?> 
							<br>
						
							<?php 
							if ($room4 != NULL)
							{	
							echo $room4; echo"&nbsp;(x$numroomss)";
							}
						}
						?></th></tr>
						
						<tr><td align="center" width="50%">Extra Bed:</td><th width="50%"><?php echo $extra; ?> </th></tr>
							                 <table class="table table-bordered table-hover" id="dataTables-example">
						
							
						<tr><td align="center">Total: PHP</td><th><?php echo $total; ?></th></tr>
						<tr><td align="center">Total Payment: PHP</td><th><?php echo $payment; ?></th></tr>

					
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<div class="center" align="center" style="margin-left:265px; position:absolute; top:89%; ">
							<input type="submit" class="btn btn-success" value="Cancel" formmethod="post"> <br><br><a href="reserved.php"><input type="button" class="btn btn-success" name="back"value="Back"></a>
									</div>
									<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							<div class="overlay6">
							
							<Br>Are you sure you want to cancel this Reservation?<br>
							<input type="submit" name="confbut" value="YES" formmethod="post">
							<a href="reserved.php"><button type="button">NO</button></a>
							</div><?php
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

