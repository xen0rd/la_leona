

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
							
						
					$sqls="UPDATE tblreportsevent SET fldtotal = '$_REQUEST[all]', fldpayment = '$_REQUEST[pays]', fldbalance = '$_REQUEST[balance1]', fldchange = '$_REQUEST[change]'  WHERE RegNo = '$_REQUEST[reg]'";
					mysql_query($sqls);
		
	
										header("location:payment_ok1.php?reg=$_REQUEST[reg]&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&checkin=$_REQUEST[checkin]&time=$_REQUEST[timw]&hour=$_REQUEST[hour]&hall=$_REQUEST[hall]&total=$_REQUEST[total]&person=$_REQUEST[person]&payment=$_REQUEST[payment]&cater=$_REQUEST[cater]&hall=$_REQUEST[hall]");

				}
					else
					{
				header("location:admin_checkoutevent.php?err=$err&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]&time=$_REQUEST[time]&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&contact=$_REQUEST[contact]&conf=1");	

	
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
	$fname = $fld['fldfname'];
		$lname = $fld['fldlname'];
	$checkin = $fld['fldarrival'];
	$time = $fld['fldtime'];
	$hour = $fld['flhour'];
	$hall = $fld['fldhall'];
	$person = $fld['fldnumpax'];
	$cater = $fld['fldcater'];
	$paym = $fld['fldpayment'];
		$bal= $fld['fldbalance'];
	$total = $fld['fldtotal'];
	

}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];
	$fname = $_REQUEST['fldfname'];
		$lname = $_REQUEST['fldlname'];
	$checkin = $_REQUEST['checkin'];
	$time = $_REQUEST['time'];
	$hour = $_REQUEST['hour'];
	$hall= $_REQUEST['hall'];
	$person = $_REQUEST['person'];
	$cater = $_REQUEST['cater'];
	$paym = $_REQUEST['paym'];
		$bal = $_REQUEST['bal'];
		$total = $_REQUEST['total'];
}

	$err = $_REQUEST['err'];
?>
<center>
<form action="admin_checkoutevent.php" method="post">
		<input type="hidden" name="form" value="1">
<center>		
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 750px; background-color: white;">

					
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">


						<h2>Customer Checkout</h2>
				<?php
				echo "<font color='red'> $err";
				echo "</font>";
				?>
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden"  name="reserve" value="<?php echo $reserve; ?>">
						<input type="hidden" name="fname" value="<?php echo $fname; ?>">
						<input type="hidden" name="lname" value="<?php echo $lname; ?>">
						<input type="hidden" name="contact" value="<?php echo $contact; ?>">
						
						<input class="textarea" type="hidden"  name="checkin" value="<?php echo $checkin; ?>">
						<input class="textarea" type="hidden" name="time" value="<?php echo $time; ?>">
						
						<input class="textarea" type="hidden" name="hour" value="<?php echo $hour; ?>">
						<input type="hidden" class="textarea" name="hall" value="<?php echo $hall; ?>"> 

						<input class="textarea" type="hidden"  name="person" value="<?php echo $person; ?>"> 
	
						 <input class="textarea" type="hidden"  name="cater" value="<?php echo $cater; ?>">
				
						 <input type="hidden" name="payment" value="<?php echo $payment; ?>">
					
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
						<input type="hidden" name="get" value="<?php echo $free['fldavailable']; ?>"></span>
						<input type="hidden" name="price" value="<?php echo $libre; ?>"></span>
								
					
					
						<tr><td align="center" width="50%">First Name: </td><th><?php echo  $fname;?> </th></tr>
						<tr><td align="center" width="50%">Last Name: </td><th><?php echo  $lname;?> </style></label>	</b></th></tr>
						<tr><td align="center" width="50%">Checkin Date: </td><th><?php echo $checkin; ?></th></tr>
						
						
					
						<tr><td align="center" width="50%">Time: </td><th><?php echo $time; ?></th></tr>
						
						
						<tr><td align="center" width="50%">Additional Hour(s): </td><th><?php echo $hour; ?></th></tr>
				
						<tr><td align="center" width="50%">Function Hall: </td><th><?php echo $hall; ?></th></tr>
						<tr><td align="center" width="50%">No. of Person: </td><th><?php echo $person; ?></th></tr>

						<tr><td align="center" width="50%">Catering: </td><th><?php echo $cater; ?></th></tr>

						
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<br><Br>
						<?php
						
						$pr = $_REQUEST['nice'] * 180;
						$all = $total + $pr + $_REQUEST['ad']+ $_REQUEST['ep'];
						$bal = $bal + $pr + $_REQUEST['ad']+ $_REQUEST['ep'];
						
						
						?>
						
						<input type="hidden"  readonly class="textarea" name="total" value="<?php echo $total; ?>">
						
						<input type="hidden" class="textarea" name="pr" value="<?php echo $pr; ?>">
						Total Payment: ₱<input type="text" class="textarea" name="payment" value="<?php echo $paym; ?>"> <br><br>

						Balance: ₱<input type="text" class="textarea" name="bal" value="<?php echo $bal; ?>"> <br><br>

						Total: ₱<input type="text" class="textarea" name="all" value="<?php echo $all; ?>"> <br><br>
						
					<tr><td align="center">Amount here: ₱ </td><th><input type="text"  class="form-control" style="width:100%" name="payment"  onchange="this.form.submit();" value="<?php echo $_REQUEST['payment']; ?>"></th></tr>

						<?php
						if ($_REQUEST['payment'] == $_REQUEST['bal'])
						{
							 $pays = $_REQUEST['payment'] +  $paym; 
							 ?>
								<input type="hidden" readonly class="form-control" style="width:100%" name="balance1" value="<?php echo  0; ?>"></th></tr>
								<input  type="hidden" name="pays" value="<?php echo $pays; ?>">

							 <?php
						}
						
						
						
						 if ($_REQUEST['payment'] > $bal)
						 {
							$bill = $_REQUEST['payment'] - $change ;
							$balance1 = $bill -  $balan; 
							$totl = $bill + $_REQUEST['downpayment'];
						
							$pays = $_REQUEST['payy'] + $bal; 			
							$change = $_REQUEST['payment'] - $bal; 
						
							
						?>
						<input  type="hidden" name="pays" value="<?php echo $pays; ?>">

						<tr><td align="center">Change: ₱</td><th> <input type="text" readonly class="form-control" style="width:100%" name="change" value="<?php echo $change; ?>"></th></tr>
						<input type="hidden" readonly class="form-control" style="width:100%" name="balance1" value="<?php echo  "0"; ?>"></th></tr>
						<input  type="hidden" name="bill" value="<?php echo $bill; ?>">

						<?php
						}
						?>
																	
</table>									

<Br><Br>
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<div class="center" align="center" style="margin-left:250px; position:absolute; top:85%; ">
							<br><input type="submit" class="btn btn-success" value="Checkout" formmethod="post"><br><br> <a href="event_hall_reserved.php"><input type="button" class="btn btn-success" name="back"value="Back"></a>
							</div>
							<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							<div class="center" style="margin-left:280px; position:absolute; top:100%; ">
							<br>Are you sure you want to checkout this?<br>
							<input type="submit" class="btn btn-success" name="confbut" value="YES" formmethod="post">
							<a href="event_hall_reserved.php"><button class="btn btn-success" type="button">NO</button></a>
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

	
						
						