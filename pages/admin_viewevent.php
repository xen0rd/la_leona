	
<?php
include('sessionadmin.php');
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
		<link rel="stylesheet" href="css/style1.css" type="text/css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie.css">
	<![endif]-->
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

<?php
error_reporting(0);
?>

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
					<li>
					<a href="reserved.php">Reserved</a>
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
					<a href="">Supply Report</a>
					</li>
					<li>
					<a href="">Equipment Report</a>
					</li>
					<li>
					<a href="">Reservation Report</a>
					</li>
					<li>
					<a href="">Sales Report</a>
					</li>
					</ul>
				</li>	

				<li class="booking">
					<a> <?php echo $login_session; ?></a>
					<ul>
					<li>
					<?php 
					echo "<li> <b id='logout'><a href='logout.php'style='text-decoration:none'>Log Out</a></li>"
					?>	</ul>
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
						$upd ="UPDATE tblreserveevent SET status = 'Checked in' WHERE RegNo = '$reg'";
						mysql_query($upd);
						header("location:event_hall_reserved.php");
						
						}
}
		mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblreserveevent WHERE RegNo = '$reg' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];

if($form == NULL)
{
	$reg = $fld['RegNo'];
	$hall = $fld['fldhall'];
	$person = $fld['fldnumpax'];
	$cater = $fld['fldcater'];
	$user = $fld['username'];
	$hr = $fld['fldhour'];
	$occasion = $fld['fldoccasion'];
	$fname = $fld['fldfname'];
		$lname = $fld['fldlname'];
			$bal = $fld['fldbalance'];
	$total = $fld['fldtotal'];
	$payment = $fld['fldpayment'];
	$status = $fld['status'];
			
	


}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];
	$hall= $_REQUEST['hall'];
	$person = $_REQUEST['person'];
	$cater = $_REQUEST['cater'];
	$user = $_REQUEST['user'];
	$hr = $_REQUEST['hr'];
	$occasion = $_REQUEST['occasion'];
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		
			$bal = $_REQUEST['bal'];
	$total = $_REQUEST['total'];
	$payment = $_REQUEST['payment'];
	$status = $_REQUEST['status'];

}

?>
<form action="admin_viewevent.php?reg=<?php echo $_REQUEST['reg'];?>"  method="post">
		<input type="hidden" name="form" value="1">
					
	<center>
	<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 640px; background-color: white;">

					
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">



              
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<h2>Customer Amenities Details</h2>
						
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						
						
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<tr><td>Username:  </td><th><?php echo $user; ?></th></tr>
						<tr><td>Guest Name:  </td><th><?php echo $fname; ?> <?php echo $lname; ?></th></tr>
						
						
						<?php
						if ($hr != NULL)
						{
							?>
						<tr><td>Additional Hour(s):  </td><th><?php echo $hr; ?></th></tr>
							<?php
						}
						if ($hr == NULL)
						{
							?>
						<tr><td>Additional Hour(s):  </td><th><?php echo "None"; ?></th></tr>
							<?php
						}
						?>

						<tr><td>Function Hall:  </td><th><?php echo $hall; ?></th></tr>
						<tr><td>No. of person: </td><th><?php echo $person; ?> </th></tr>

						<tr><td>Catering: </td><th><?php echo $cater; ?> </th></tr>
						<tr><td>Occasion: </td><th><?php echo $occasion; ?> </th></tr>
						<tr><td>Status: </td><th><?php echo $status; ?> </th></tr></table>
						     <table class="table table-bordered table-hover" id="dataTables-example">
							<?php 
							if ($bal != NULL)
							{
							?>
							<tr><td align="center">Balance: PHP</td><th><?php echo $bal; ?></th></tr>
							<?php
							}
							if ($bal == NULL)
							{
								?>
							<tr><td align="center">Balance: PHP</td><th><?php echo 0; ?></th></tr>
							<?php
							}
							?>
							
						<tr><td align="center">Total: PHP</td><th><?php echo $total; ?></th></tr>
						<tr><td align="center">Total Payment: PHP</td><th><?php echo $payment; ?></th></tr>

						<div class="center" style="margin-left:290px; position:absolute; top:85%; ">
						
						<?php
						if($status == "Reserved")
						{
						?>
						<input type="submit" name="conf" class="btn btn-success" value="Checkin">  <br><br>
						<?php
						}
						?>
						<a href="event_hall_reserved.php" onClick="self.close()"><input type="button" class="btn btn-success" name="close"value="Close"></a>
							</div>
						</form>
									
						</table>
		</div>
		</div>
		</div></div></div>
		
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
						
						
						