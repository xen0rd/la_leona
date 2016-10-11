

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
					
					$sql="UPDATE tblreserve SET username = '$_REQUEST[user]', RegNo = '$_REQUEST[reg]', fldarrival = '$_REQUEST[checkin]', flddeparture = '$_REQUEST[checkout]', fldadult = '$_REQUEST[adult]', fldchild = '$_REQUEST[child]', fldstaytype = '$_REQUEST[types]',fldtotal = '$_REQUEST[total]', fldbalance = '$_REQUEST[balance1]', status = '$insert', fldpayment = '$_REQUEST[pays]', fldchange = '$_REQUEST[change]' WHERE RegNo = '$_REQUEST[reg]'";
					mysql_query($sql);
					
					$sqls="UPDATE tblreport SET username = '$_REQUEST[user]', RegNo = '$_REQUEST[reg]', fldarrival = '$_REQUEST[checkin]', flddeparture = '$_REQUEST[checkout]', fldadult = '$_REQUEST[adult]', fldchild = '$_REQUEST[child]', fldstaytype = '$_REQUEST[types]',fldtotal = '$_REQUEST[total]', fldbalance = '$_REQUEST[balance1]', status = '$insert', fldpayment = '$_REQUEST[pays]', fldchange = '$_REQUEST[change]' WHERE RegNo = '$_REQUEST[reg]'";
					mysql_query($sqls);
					
					header("location:reserved.php");
					}
					else
					{
					header("location:admin_managebooking.php?err&=$_REQUEST[err]&status=$_REQUEST[status]&type=$_REQUEST[type]&term=$_REQUEST[term]&contact=$_REQUEST[contact]&lname=$_REQUEST[lname]&fname=$_REQUEST[fname]&user=$_REQUEST[user]&pays=$_REQUEST[pays]&payy=$_REQUEST[payy]&reg=$_REQUEST[reg]&form=1&bal=$_REQUEST[bal]&reserve=$_REQUEST[reserve]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&room=$_REQUEST[room]&extra=$_REQUEST[extra]&numroom=$_REQUEST[numroom]&balance=$_REQUEST[balance]&total=$_REQUEST[total]&payment=$_REQUEST[payment]&status=$_REQUEST[status]&change=$_REQUEST[change]&downpayment=$_REQUEST[downpayment]&balance1=$_REQUEST[balance1]&pays=$_REQUEST[pays]&conf=1");
					}	
			mysql_close($con);
			}
	

	

?>

<?php
$reg=$_REQUEST['reg'];
$vn=$_REQUEST['vnz'];
$user=$_POST['user'];
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblreserve WHERE RegNo = '$reg' ");
$fld = mysql_fetch_array($result);
$form = $_REQUEST['form'];



$email = $select['fldemail'];
if($form == NULL)
{
	$reg = $fld['RegNo'];
	$user = $fld['username'];
	$fname= $fld['fldfname'];
		$contact= $fld['fldcontact'];
	$lname = $fld['fldlname'];
	$checkin = $fld['fldarrival'];
	$checkout = $fld['flddeparture'];
	$adult = $fld['fldadult'];
	$child = $fld['fldchild'];
	$roomtype = $fld['fldroom'];
	$cabana = $fld['fldcottagesnum'];
	
	$types = $fld['fldstaytype'];
	$total = $fld['fldtotal'];
	$balance = $fld['fldbalance'];
	$status = $fld['status'];
	$payy = $fld['fldpayment'];
	
		
	//room
	$room = $fld['fldroomtype'];
	$room3 = $fld['fldroom2'];
	$room4 = $fld['fldroom4'];
	$numroom = $fld['fldnumofroom'];
	$numrooms = $fld['fldnum2'];
	$numroomss = $fld['fldnum4'];
	$email = $fld['fldemail'];
	
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
	
	$type = $fld['fldpaymenttype'];
	$term = $fld['fldterm'];


}
else if($form == 1)
{
	$reg = $_REQUEST['reg'];
	$user = $_REQUEST['user'];
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$contact = $_REQUEST['contact'];
	$checkin = $_REQUEST['checkin'];
	$checkout = $_REQUEST['checkout'];
	$adult = $_REQUEST['adult'];
	$child = $_REQUEST['child'];
	$types = $_REQUEST['types'];
	$total = $_REQUEST['total'];
	$balance = $_REQUEST['balance'];
	$status = $_REQUEST['status'];
	$payy = $_REQUEST['payy'];
	$email = $_REQUEST['email'];

	
		//room
	$room = $_REQUEST['room'];
	$room3 = $_REQUEST['room3'];
	$room4 = $_REQUEST['room4'];
	$numroom = $_REQUEST['numroom'];
	$numrooms = $_REQUEST['numrooms'];
	$numroomss= $_REQUEST['numroomss'];
	
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
	
	$type = $_REQUEST['type'];
	$term = $_REQUEST['term'];
}

$check= mysql_query("SELECT * FROM tblregister WHERE username = '$user'");
$select = mysql_fetch_array($check);   
?>

<form action="admin_managebooking.php?reg=<?php echo $_REQUEST['reg'];?>&vnz=1"  method="post">
		<input type="hidden" name="form" value="1">
	<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 1150px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:140px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
					  <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font  color="#f3be4b" > Update Customer's Payment </font></h2>
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
							<input type="hidden" name="user" value="<?php echo $user; ?>">

						<input type="hidden"  name="reserve" value="<?php echo $reserve; ?>">
						 <input class="textarea" type="hidden"  name="checkin" value="<?php echo $checkin; ?>">
						<input class="textarea" type="hidden" name="checkout" value="<?php echo $checkout; ?>">
						 <input class="textarea" type="hidden"  name="fname" value="<?php echo $fname; ?>">
						<input class="textarea" type="hidden" name="lname" value="<?php echo $lname; ?>">
						 <input class="textarea" type="hidden"  name="contact" value="<?php echo $contact; ?>">
					

						<input class="textarea" type="hidden" name="adult"value="<?php echo $adult; ?>"> 
						 <input type="hidden" class="textarea" name="child" size="4"value="<?php echo $child; ?>">
						<input class="textarea" type="hidden"  name="types" value="<?php echo $types; ?>"> 
							<input class="textarea" type="hidden"  name="status" value="<?php echo $status; ?>">

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
						<input type="hidden"class="textarea" name="payy" value="<?php echo $payy; ?>">
				
			<?php ///////////////// POST ?>					
			
						<tr><td align="center" width="50%">Guest Name:</td><th width="50%"><?php echo $fname; ?> <?php echo $lname; ?></style></label>  </th></tr>
						<tr><td align="center">Contact:</td><th><?php echo $contact; ?></th></tr>
						<tr><td align="center">Email:</td><th><?php echo $select['fldemail']; ?></th></tr>
						<tr><td align="center">Checkin:</td><th><?php echo $checkin;?></th></tr>
						<tr><td align="center">Checkout:</td><th><?php echo $checkout;?></th></tr>
						<tr><td align="center">Adult(s):</td><th><?php echo $adult; ?></th></tr>
						
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
						
						
						<tr><td align="center">Type of stay:</td><th><?php echo $types; ?> </th></tr>
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
					
						
						<tr><td align="center">Extra Bed: </td><th><?php echo $extra; ?> </th></tr>
						<tr><td align="center">Status: </td><th><?php echo $status; ?></th></tr>
</table>	<br><br>
						        <table class="table table-bordered table-hover" id="dataTables-example">
							<font face="century gothic" color="#f3be4b" size="5"> Payment</font>
				
						<?php
						$balan = $total - $payy;
							?>
							
						<tr><td align="center">Type of Payment: </td><th> <input type="text" readonly class="form-control" style="width:100%" name="type" value="<?php echo  $type; ?>"></th></tr>
						<tr><td align="center">Term: </td><th> <input type="text" readonly class="form-control" style="width:100%" name="term" value="<?php echo  $term; ?>"></th></tr>

						<tr><td align="center">Balance: ₱</td><th> <input type="text" readonly class="form-control" style="width:100%" name="balan" value="<?php echo  $balan; ?>"></th></tr>
						<tr><td align="center">Total: ₱ </td><th><input type="text" readonly class="form-control" style="width:100%" name="total" value="<?php echo $total; ?>"></th></tr>
						<tr><td align="center">Total Payment: ₱ </td><th><input type="text" readonly class="form-control" style="width:100%" name="payy" value="<?php echo $payy; ?>"></th></tr>

						<tr><td align="center">Amount here: ₱ </td><th><input type="text"  class="form-control" style="width:100%" name="payment"  onchange="this.form.submit();" value="<?php echo $_REQUEST['payment']; ?>"></th></tr>
						<input type="hidden" class="form-control" style="width:100%" name="downpayment" value="<?php echo $downpayment; ?>"> 
			

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
							$balance1 = $bill -  $balan; 
							$totl = $bill + $_REQUEST['downpayment'];
						
							$pays = $_REQUEST['payy'] + $balan; 			
							$change = $_REQUEST['payment'] - $balan; 
						
							
						?>
						<input  type="hidden" name="pays" value="<?php echo $pays; ?>">

						<tr><td align="center">Change: ₱</td><th> <input type="text" readonly class="form-control" style="width:100%" name="change" value="<?php echo $change; ?>"></th></tr>
						<input type="text" readonly class="form-control" style="width:100%" name="balance1" value="<?php echo  "0"; ?>"></th></tr>
						<input  type="text" name="bill" value="<?php echo $bill; ?>">

						<?php
						}
						?>
					

						<input  type="hidden" name="totl" value="<?php echo $totl; ?>">
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
						<input type="hidden" name="price" value="<?php echo $libre; ?>"></span>
								
					
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							 <div class="center" align="center"style="margin-left:265px; position:absolute; top:91%; ">
							<input type="submit" class="btn btn-success" value="Update" formmethod="post"> <a href="reserved.php?vnz=1"><br><br><input type="button" class="btn btn-success" name="back"value="Back"></a>
							</div>
							<?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							<div  class="center" style="margin-left:245px; position:absolute; top:82%; ">
							<br><br><br><br><br>
							Are you sure you want to update this Reservation?<br>
							<input type="submit" class="btn btn-success" name="confbut" value="YES" formmethod="post">&nbsp;
							<a href="reserved.php?vnz=1"><button type="button" class="btn btn-success">NO</button></a>
							</div>
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


						