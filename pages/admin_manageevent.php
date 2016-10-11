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
					
							$insert = "Reserved";
							
						$change = $_REQUEST['payment'] - $_REQUEST['balance']; 
						$bill = $_REQUEST['payment'] - $change ;
						$balance1 = $bill -  $_REQUEST['balance']; 
						$totl = $bill + $_REQUEST['downpayment'];
					
					$sql="UPDATE tblreserveevent SET username = '$_REQUEST[user]', RegNo = '$_REQUEST[reg]', fldarrival = '$_REQUEST[checkin]', fldtime = '$_REQUEST[time]', fldhour = '$_REQUEST[hours]', fldhall = '$_REQUEST[hall]', fldnumpax = '$_REQUEST[person]',fldcater = '$_REQUEST[cater]', fldtotal = '$_REQUEST[total]', fldbalance = '$_REQUEST[balance1]', status = '$insert', fldpayment = '$_REQUEST[pays]' WHERE RegNo = '$_REQUEST[reg]'";
					mysql_query($sql);					
					$sqls="UPDATE tblreportsevent SET username = '$_REQUEST[user]', RegNo = '$_REQUEST[reg]', fldarrival = '$_REQUEST[checkin]', fldtime = '$_REQUEST[time]', fldhour = '$_REQUEST[hours]', fldhall = '$_REQUEST[hall]', fldnumpax = '$_REQUEST[person]',fldcater = '$_REQUEST[cater]', fldtotal = '$_REQUEST[total]', fldbalance = '$_REQUEST[balance1]', status = '$insert', fldpayment = '$_REQUEST[pays]' WHERE RegNo = '$_REQUEST[reg]'";
					mysql_query($sqls);
					
					
					header("location:event_hall_reserved.php");
				}
				else
				{
					header("location:admin_manageevent.php?user=$_REQUEST[user]&reg=$_REQUEST[reg]&form=1&lname=$_REQUEST[lname]&fname=$_REQUEST[fname]&reserve=$_REQUEST[reserve]&checkin=$_REQUEST[checkin]&time=$_REQUEST[time]&hours=$_REQUEST[hours]&hall=$_REQUEST[hall]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&pay=$_REQUEST[pay]&total=$_REQUEST[total]&balance=$_REQUEST[balance]&payment=$_REQUEST[payment]&status=$_REQUEST[status]&bill=$_REQUEST[bill]&change=$_REQUEST[change]&totl=$_REQUEST[totl]&pay=$_REQUEST[pay]&pays=$_REQUEST[pays]&payy=$_REQUEST[payy]&conf=1");
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
	$hours = $fld['fldhours'];
	$hall = $fld['fldhall'];
	$person = $fld['fldnumpax'];
	$cater = $fld['fldcater'];
	$balance = $fld['fldbalance'];
	$total = $fld['fldtotal'];
	$status = $fld['status'];
	$payy=  $fld['fldpayment'];
	$type = $fld['fldpaymenttype'];
	$term = $fld['fldterm'];

	

}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];
	$user = $_REQUEST['user'];
	$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
	$checkin = $_REQUEST['checkin'];
	$time = $_REQUEST['time'];
	$hours = $_REQUEST['hours'];
	$hall = $_REQUEST['hall'];
	$person = $_REQUEST['person'];
	$cater = $_REQUEST['cater'];
	$balance = $_REQUEST['balance'];
	$total = $_REQUEST['total'];
	$status = $_REQUEST['status'];
	$payy = $_REQUEST['payy'];
$type = $_REQUEST['type'];
	$term = $_REQUEST['term'];
}
?>
<center>
<form action="admin_manageevent.php" method="post">
		<input type="hidden" name="form" value="1">
<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 950px; background-color: white;">

					
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">
				<h2>Update Customer's Payment</h2>
				 <table class="table table-bordered table-hover" id="dataTables-example">
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden" name="user" value="<?php echo $_REQUEST['user']; ?>">
						<input type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						<input type="hidden" name="start" value="<?php echo $_REQUEST['start']; ?>">
						<input type="hidden"  name="end" value="<?php echo $_REQUEST['end']; ?>">
						<input type="hidden"  name="hours" value="<?php echo $_REQUEST['hours']; ?>">
						
						<input type="hidden" type="text" name="downpayment" value="<?php echo $_REQUEST['downpayment']; ?>">
							
						<input type="hidden" name="fname" value="<?php echo $_REQUEST['fname']; ?>">
						<input type="hidden" name="lname" value="<?php echo $_REQUEST['lname'] ?> ">
						 <input class="textarea" type="hidden"  name="checkin" value="<?php echo $checkin; ?>">
						<input class="textarea"   type="hidden" name="time" value="<?php echo $time; ?>">
						
						<input type="hidden" class="textarea"  name="hours" size="4"value="<?php echo $hours; ?>">

						<input class="textarea"   type="hidden" name="hall" value="<?php echo $hall; ?>">
						
							

						<input type="hidden" class="textarea" name="person"  value="<?php echo $person; ?>">
						
						<input type="hidden" class="textarea" name="cater"  value="<?php echo $cater; ?>">
						<input type="hidden" class="textarea" name="status"  value="<?php echo $status; ?>">
						
						
						<tr><td align="center">Guest Name: </td><th><?php echo  $fname;?> <?php echo  $lname;?></th></tr>
						<tr><td align="center">Checkin Date: </td><th><?php echo $checkin; ?></th></tr>
						<tr><td align="center">Time:</td><th> <?php echo $time; ?></th></tr>
						
						<?php
						if ($hr != NULL)
						{
							?>
					<tr><td align="center">	Additional Hour(s):  </td><th><?php echo $hr; ?></th></tr>
							<?php
						}
						if ($hr == NULL)
						{
							?>
					<tr><td align="center">	Additional Hour(s):  </td><th><?php echo "None"; ?></th></tr>
							<?php
						}
						?>	
							
						<tr><td align="center">Function Hall: </td><th><?php echo $hall; ?></th></tr>
						<tr><td align="center">No. of Person: </td><th><?php echo $person; ?></th></tr>
						<tr><td align="center">Catering: </td><th><?php echo $cater; ?></th></tr>
						<tr><td align="center">Status: </td><th><?php echo $status; ?></th></tr>

						        <table class="table table-bordered table-hover" id="dataTables-example"><br>
									<font face="century gothic" color="#f3be4b" size="5"> Payment</font>

						<?php
						$balan = $total - $payy;
							?>
					
						<tr><td align="center">Type of Payment: </td><th> <input type="text" readonly class="form-control" style="width:100%" name="type" value="<?php echo  $type; ?>"></th></tr>
						<tr><td align="center">Term: </td><th> <input type="text" readonly class="form-control" style="width:100%" name="term" value="<?php echo  $term; ?>"></th></tr>

						<tr><td align="center">Balance: ₱</td><th> <input type="text" readonly  class="form-control" style="width:100%" name="balan" value="<?php echo $balan; ?>"></th></tr>
						<tr><td align="center">Total Payment: ₱</td><th> <input type="text" readonly  class="form-control" style="width:100%" name="payy" value="<?php echo $payy; ?>"></th></tr>

						<tr><td align="center">Total: ₱</td><th> <input type="text" readonly  class="form-control" style="width:100%" name="total" value="<?php echo $total; ?>"></th></tr>
						
						<tr><td align="center">Amount here: ₱ </td><th><input type="text" 	class="form-control" style="width:100%" name="payment"  onchange="this.form.submit();" value="<?php echo $_REQUEST['payment']; ?>"></th></tr>

						
						<?php

						if ($_REQUEST['payment'] == $total)
						{
							 $pays = $_REQUEST['payment'] +  $payy; 
							 ?>
								<input type="hidden" readonly class="form-control" style="width:100%" name="balance1" value="<?php echo  0; ?>"></th></tr>
											<input  type="hidden" name="pays" value="<?php echo $pays; ?>">

							 <?php
						}

						
						 if ($_REQUEST['payment'] < $balan)
						 {
							 $pays = $_REQUEST['payment'] +  $payy; 
							 $balance1 = $total - $_REQUEST['payment'] ;
							?>
								<input type="hidden" readonly class="form-control" style="width:100%" name="balance1" value="<?php echo  $balance1; ?>"></th></tr>
								<input  type="hidden" name="pays" value="<?php echo $pays; ?>">
							<?php

									
						 }
						
			
						 if ($_REQUEST['payment'] > $balan)
						 {
							$bill = $_REQUEST['payment'] - $change ;	
							$totl = $bill + $_REQUEST['downpayment'];
						
							$pays = $_REQUEST['payy'] + $balan; 			
							$change = $_REQUEST['payment'] - $balan; 
							
							?>
						<input  type="hidden" name="pays" value="<?php echo $pays; ?>">

						<tr><td align="center">Change: ₱</td><th> <input type="text" readonly class="form-control" style="width:100%" name="change" value="<?php echo $change; ?>"></th></tr>
						<input type="hidden" readonly class="form-control" style="width:100%" name="balance1" value="<?php echo  "0"; ?>"></th></tr>
						<input  type="hidden" name="bill" value="<?php echo $bill; ?>">
	
							<?php
						}
						
								?>
								
						<input  type="hidden" name="pays" value="<?php echo $pays; ?>">

						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
								
					
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<div class="center" align="center"style="margin-left:265px; position:absolute; top:87%; ">
							<input type="submit" class="btn btn-success" value="Update" formmethod="post"> <br><Br><a href="event_hall_reserved.php"><input type="button" class="btn btn-success" name="back"value="Back"></a>
							</div>
							<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							<div class="overlay6">
							<br><br><br><br><br>
							Are you sure you want to update?<br>
							<input type="submit" class="btn btn-success" name="confbut" value="YES" formmethod="post">&nbsp;
							<a href="event_hall_reserved.php"><button class="btn btn-success" type="button" >NO</button></a>
							
							<?php
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

	
						
						
						
						
						
						
						
						