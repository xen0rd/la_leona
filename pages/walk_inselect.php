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
			<ul>
				<li>
					
					<div>

					</div>
				</li>
				<li>
			<label > <font face="century gothic" color="#f3be4b" size="4"> Walk-In </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
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
	
	if(empty($_REQUEST['checkin'])||empty($_REQUEST['checkout'])||$_REQUEST['pay']=="other"||$_REQUEST['types']=="other")
	{
		$err = "Please fill all empty fields";
		if(empty($_REQUEST['checkin']))
		{
			$inErr = "*";
		}
		if(empty($_REQUEST['checkout']))
		{
			$outErr="*";
			
		}
	
		if($_REQUEST['types']=="other")
		{
			$typesErr = "*";
		}
		
		header("location:walk_inselect.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&night=$_REQUEST[night]&types=$_REQUEST[types]&inErr=$inErr&outErr=$outErr&typesErr=$typesErr");

	}
	else
	{	
		if ($_REQUEST['confbut'] == "Check Availability")
		{
			if ($_REQUEST['checkout'] < $_REQUEST['checkin'])
			{
				$err = "Invalid Date Input!";
				$outErr = "*";
				$inErr = "*";
				header("location:walk_inselect.php?err=$err&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&email=$_REQUEST[email]&num=$_REQUEST[num]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&night=$_REQUEST[night]&types=$_REQUEST[types]");
			}
			else
			{
			header("location:walk_in.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&night=$_REQUEST[night]&types=$_REQUEST[types]&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&num=$_REQUEST[num]&email=$_REQUEST[email]&checkawt=$_REQUEST[checkawt]");
			}
		}
	}
}



$check= mysql_query("SELECT * FROM tblregister WHERE username = '$login_session'");
$select = mysql_fetch_array($check);   

$checks= mysql_query("SELECT * FROM tblincre");
$incre = mysql_fetch_array($checks);   


$datetime1 = strtotime ($_REQUEST['checkin']);
$datetime2 = strtotime ($_REQUEST['checkout']);

$secs = $datetime2 - $datetime1;// == <seconds between the two times>
$night = $secs / 86400;



?>

<br><br><br>

<div id="page-wrapper" style="width: 940px; height: 20px; margin-left: 205px;" >
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">

							
	  <?php 
							$err = $_REQUEST['err'];
							echo "<span style='margin-left:-750px;'>";
							echo "<font color='red'>$err</font>";
							echo "</span>";
							?>

<center>
							<div>
							
						<form action="walk_inselect.php" method="get">
						<input type="hidden"  name="checkawt" value="<?php echo $night; ?>">
						<input type="hidden"  name="inErr" value="<?php echo $_REQUEST['inErr']; ?>">
						<input type="hidden"  name="err" value="<?php echo $_REQUEST['err']; ?>">
						<input type="hidden"  name="outErr" value="<?php echo $_REQUEST['outErr']; ?>">
						<input type="hidden"  name="adultErr" value="<?php echo $_REQUEST['adultErr']; ?>">
						<input type="hidden"  name="typesErr" value="<?php echo $_REQUEST['typesErr']; ?>">
						<input type="hidden"  name="typeErr" value="<?php echo $_REQUEST['typeErr']; ?>">
				
				
						
						<input class="textarea" type="hidden" size="4" name="reg" value="<?php echo $incre['fldnum']; ?>">
						 
					<br><br><br><br><br><br><br><br>	 
					<div id="center" style="margin-left: 125px;">
						<div id="row">
						<div class="col-lg-5">
						Checkin date <font color="red">  <?php echo $_REQUEST['inErr']; ?> </font><input  type="date" class="form-control" min="<?php echo date ("Y-m-d"); ?>" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">&nbsp;&nbsp;
						</div>
					
						<div class="col-lg-5">
						Checkout date <font color="red"><?php echo $_REQUEST['outErr']; ?></font> <input  type="date" class="form-control" min="<?php echo date ("Y-m-d"); ?>" name="checkout" OnChange="this.form.submit();" value="<?php echo $_REQUEST['checkout'];?>"><br><br>
						</div>
						</div>
						<div id="row">
						<div class="col-lg-5">
						<?php
						if ($_REQUEST['checkout'] != NULL)
						{
							?>
						Night(s) of Stay: <input class="form-control"  readonly type="text" class="form-control"  name="night" value="<?php echo $night; ?>"><br><br>
						
						<?php
						}
						?>
						</div>
						</div>
						
						

						<div class="col-lg-5">
						
						<?php
						if($night == 0 )
						{
						?>
							Type of stay: <font color="red"> <?php echo $_REQUEST['typesErr']; ?></font> <select name="types"  class="form-control"  onchange="this.form.submit();"> 
							<option  value="other" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "other" ? "selected" : "other" ?>>Please Select..</option>
							<option  value="Day" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "Day" ? "selected" : "Day" ?>>Day</option>

							</select><br><br>
						
						<?php
						}
						?>
						<?php
						if($night >=1 )
						{
						?>
						</div>
							<div class="col-lg-5">
							Type of stay:<font color="red"> <?php echo $_REQUEST['typesErr']; ?></font> <select name="types"  class="form-control"   onchange="this.form.submit();">
							<option  value="other" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "other" ? "selected" : "other" ?>>Please Select..</option>
							<option   value="Night" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "Night" ? "selected" : "Night" ?>>Night</option>
						<option   value="Day and Night" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "Day and Night" ? "selected" : "Day and Night" ?>>Day and Night</option>

							</select><br><br>
						<?php
						}
						?>
							</div>
						</div>
						
						
						<div id="row" style="margin-left:110px;" >
						<div class="col-lg-10">
						<input type="submit"  style="margin-left:20px;" class="btn btn-success" name="confbut" value="Check Availability" formmethod="post"> <a href="booking_reservation.php"><input type="button" name="back" class="btn btn-success"  value="Back"></a></span>
					
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
	 <br>
	 <br>
	 <br>
	 <br>
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
					<a href="customer.php">home</a>
				</li>
				<li>
					<a href="gallerylog.php">room</a>
				</li>
				<li>
					<a href="#">event</a>
				</li>
				<li>
					<a href="manage_reservation.php">manage reservation</a>
				</li>
				
			</ul>
		</div>
	</div>
</body>
</html>
	
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
