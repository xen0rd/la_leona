

<?php
error_reporting(0);
?>
	
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
$reg=$_REQUEST['reg'];

	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }
mysql_select_db("dbresort", $con);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	 if ($_REQUEST['conf']=="Checkin")
						{
						$in = "Check In";
						$upd ="UPDATE tblreserve SET status = 'Checked in' WHERE RegNo = '$reg'";
						mysql_query($upd);
						header("location:reserved.php");
						
						}
}
	
	mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblreserve WHERE RegNo = '$reg' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];
if($form == NULL)
{
	$user = $fld['username'];
	$fname = $fld['fldfname'];
	$lname = $fld['fldlname'];
	$reg = $fld['RegNo'];
	$adult = $fld['fldadult'];
	$child = $fld['fldchild'];
	$night = $fld['fldnightstay'];
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
	
	$status = $fld['status'];
	$bal = $fld['fldbalance'];
	$total = $fld['fldtotal'];
	$payment = $fld['fldpayment'];
	


}
else if($form == 1)
{
	$user = $_REQUEST['user'];
	$reg = $_REQUEST['reg'];
	
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
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

	$night = $_REQUEST['night'];
	$status = $_REQUEST['status'];
	
	$bal = $_REQUEST['bal'];
	$total = $_REQUEST['total'];
	$payment = $_REQUEST['payment'];
}	
$check= mysql_query("SELECT * FROM tblregister WHERE username = '$user'");
$select = mysql_fetch_array($check);   
?>  <center>
	<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 800px; background-color: white;">

					
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">



              
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<h2>Customer Amenities Details</h2>
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						
						<tr><td align="center" style="width:50%">Guest Name: </td><th style="width:50%"><?php echo $fname; ?> <?php echo $lname; ?>		
						<tr><td align="center" style="width:50%">Adult(s): </td><th style="width:50%"><?php echo $adult; ?></th></tr>
						
						<?php
						if ($child == NULL)
						{	

							?>
							<tr><td align="center" width="50%">Kid(s): </td><th><?php echo None; ?>  </th></tr>
							<?php
						}
						
						if ($child != NULL)
						{	
							?>
							<tr><td align="center" width="50%">Kid(s): </td><th><?php echo $child; ?>  </th></tr>
							<?php
						}
						
						?>	
						
						<tr><td align="center" style="width:50%">Type of stay: </td><th style="width:50%"><?php echo $types; ?></th></tr>
					<tr><td align="center" style="width:50%">Night(s) of stay: </td><th style="width:50%"><?php echo $night; ?></th></tr>
						
						
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
						
						<tr><td align="center">Extra Bed: </td><th><?php echo $extra; ?></th></tr>
						<tr><td align="center">Status: </td><th><?php echo $status; ?></th></tr>
						
							                  <table class="table table-bordered table-hover" id="dataTables-example">
							<?php 
							if ($bal != NULL)
							{
							?>
							<tr><td align="center">Balance: ₱</td><th><?php echo $bal; ?></th></tr>
							<?php
							}
							if ($bal == NULL)
							{
								?>
							<tr><td align="center">Balance: ₱</td><th><?php echo 0; ?></th></tr>
							<?php
							}
							?>
							
						<tr><td align="center">Total: ₱</td><th><?php echo $total; ?></th></tr>
						<tr><td align="center">Total Payment: ₱</td><th><?php echo $payment; ?></th></tr>


						<div class="center" style="margin-left:290px; position:absolute; top:80%; ">
						<form action="admin_viewbooking.php" method="post">
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">

						<?php
						if($status == "Reserved")
						{
						?>
						<input type="submit" name="conf" class="btn btn-success" value="Checkin">  <br><br>
						<?php
						}
						?>

						<a href="reserved.php" onClick="self.close()"><input type="button" class="btn btn-success" name="close"value="Close"></a>
						</div>
				
						
						</table>
						</form>
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

