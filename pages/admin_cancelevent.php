	<?php
error_reporting(0);
?>
	
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
				$sql="INSERT INTO tblcancelevent (username, RegNo, fldarrival, fldtime, fldhour, fldhall, fldnumpax, fldcater, fldpayment, status, fldfname, fldlname, fldcontact, flddate, fldtotal)
						 VALUES ('$_REQUEST[user]','$_REQUEST[reg]','$_REQUEST[checkin]','$_REQUEST[time]','$_REQUEST[hour]','$_REQUEST[hall]','$_REQUEST[person]','$_REQUEST[cater]','$_REQUEST[payment]','Cancelled','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$date','$_REQUEST[total]'	)";
						mysql_query($sql);
						

						$result = mysql_query("DELETE FROM tblreserveevent WHERE RegNo ='$_REQUEST[reg]'");	
				
					header("location:event_hall_reserved.php");
				}
					else
					{
					
					header("location:admin_cancelevent.php?err=$err&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]&time=$_REQUEST[time]&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&contact=$_REQUEST[contact]&total=$_REQUEST[total]&conf=1");	
	
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
	$user = $fld['username'];
		$fname = $fld['fldfname'];
		$lname = $fld['fldlname'];
	$checkin = $fld['fldarrival'];
	$time = $fld['fldtime'];
	$hour = $fld['flhour'];
	$hall = $fld['fldhall'];
	$person = $fld['fldnumpax'];
	$cater = $fld['fldcater'];
	$payment = $fld['fldpayment'];
	$total = $fld['fldtotal'];

}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];
	$user = $_REQUEST['user'];
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
	$checkin = $_REQUEST['checkin'];
	$time = $_REQUEST['time'];
	$hour = $_REQUEST['hour'];
	$hall= $_REQUEST['hall'];
	$person = $_REQUEST['person'];
	$cater = $_REQUEST['cater'];
	$payment = $_REQUEST['payment'];
	$total = $_REQUEST['total'];
}
?>
<form action="admin_cancelevent.php" method="post">
		<input type="hidden" name="form" value="1">
					<form action="admin_checkout.php" method="post">
		<input type="hidden" name="form" value="1">
						 <center>		
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 500px; background-color: white;">

					
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">



              
	                  <table class="table table-bordered table-hover" id="dataTables-example">
					 
						<h2>Cancel Event Reservation</h2>
			
											<input type="hidden"  name="user" value="<?php echo $user; ?>">

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
						 <input type="hidden" name="total" value="<?php echo $total; ?>">
					
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
						<input type="hidden" name="get" value="<?php echo $free['fldavailable']; ?>"></span>
						<input type="hidden" name="price" value="<?php echo $libre; ?>"></span>
								
					
					
						<tr><td>Guest Name: </td><th><?php echo  $fname;?> <?php echo  $lname;?></th></tr>
						<tr><td>Checkin Date: </td><th><b><?php echo $checkin; ?></th></tr>
						
						
					
						<tr><td>Time: </td><th><?php echo $time; ?></th></tr>
						
						
<?php
						if ($hr != NULL)
						{
							?>
					<tr><td>	Additional Hour(s):  </td><th><?php echo $hr; ?></th></tr>
							<?php
						}
						if ($hr == NULL)
						{
							?>
					<tr><td >	Additional Hour(s):  </td><th><?php echo "None"; ?></th></tr>
							<?php
						}
						?>					
						<tr><td>Function Hall: </td><th><?php echo $hall; ?></th></tr>
						<tr><td>No. of Person: </td><th><?php echo $person; ?> </th></tr>

						<tr><td>Catering: </td><th><?php echo $cater; ?></th></tr>

						<tr><td>Total Payment: Php</td><th><?php echo $payment; ?></th></tr>
						<tr><td>Total: Php </td><th><?php echo $total; ?></th></tr>



						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<div class="center" style="margin-left:250px; position:absolute; top:88%; ">
							<br><input type="submit" class='btn btn-success' value="Cancel" formmethod="post"> <a href="event_hall_reserved.php"><input type="button" class='btn btn-success' name="back"value="Back"></a>
							</div>
							<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							<div class="center" style="margin-left:280px; position:absolute; top:100%; ">
							<br>Are you sure you want to cancel this Reservation?<br>
							<input type="submit" name="confbut" value="YES" formmethod="post">
							<a href="event_hall_reserved.php"><button type="button">NO</button></a>
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

	
						
						