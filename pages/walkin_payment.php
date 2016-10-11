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
					<a href="walk_inselect.php">Walk-in</a> 
					
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
			<ul>
				<li>
					
					<div>

					</div>
				</li>
				<li>
			<label > <font face="century gothic" color="#f3be4b" size="4"> Payment Details </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
			
		</div>

<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if($_REQUEST['confbut'] == "YES")
				{
					
					
					$change = $_REQUEST['payment'] - $_REQUEST['totalp']; 
		
						mysql_query($updt);
				
						$num = $_REQUEST['reg'] + 1;
				
						$reserved = "Reserved";
					
						$date = date ('Y-m-d');
				
						$change = $_REQUEST['payment'] - $_REQUEST['totalp']; 
					
							$ssql="INSERT INTO tblreport (RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldnightstay, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum, fldchange, fldpayment, fldtotal, status, fldpaymenttype, flddate, fldroomnum, fldcreated, fldhutnum,  fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4 , fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldpayment)
						 VALUES ('$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[night]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room]','$_REQUEST[numroom]','$_REQUEST[cabana]','$change','$_REQUEST[payment]','$_REQUEST[totalp]','$reserved','$_REQUEST[pay]','$dates','$_REQUEST[rmnum]','$date','$_REQUEST[hutnum]','$_REQUEST[payment]')";
						
						mysql_query($ssql);
						
						if($_REQUEST['checkawt'] > 1)
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
							$datet = $_REQUEST['checkin'];
							$dates = date('Y-m-d', strtotime($datet. "+$x days")); 						
						
						$sql="INSERT INTO tblreserve(RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldchange, fldpayment)
						 VALUES ('$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Reserved','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$change','$_REQUEST[payment]')";
		
						mysql_query($sql);
							}
						}
						
						if($_REQUEST['checkawt'] >= 1)
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
							$datet = $_REQUEST['checkin'];
							$dates = date('Y-m-d', strtotime($datet. "+$x days")); 						
			
						$sql="INSERT INTO tblreserve(RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldchange, fldpayment)
						 VALUES ('$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Reserved','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$change','$_REQUEST[payment]')";
						mysql_query($sql);
							}
						}
						
						if($_REQUEST['checkawt'] == 0 )
						{
							
						$datet = $_REQUEST['checkin'];
						$sql="INSERT INTO tblreserve(RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldchange, fldpayment)
						 VALUES ('$num','$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[num]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Reserved','$_REQUEST[term]','$_REQUEST[pay]','$datet','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$change','$_REQUEST[payment]')";
						mysql_query($sql);
						
						
						}
						
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);
							header("location:walk_in.php");
						
				}
				else
				{
				header("location:walkin_payment.php?hutnum=$_REQUEST[hutnum]&rmnum=$_REQUEST[rmnum]&reg=$_REQUEST[reg]&checkawt=$_REQUEST[checkawt]&fname=$_REQUEST[fname]&lname=$_REQUEST[lname]&num=$_REQUEST[num]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&night=$_REQUEST[night]&roomtype=$_REQUEST[roomtype]&cabana=$_REQUEST[cabana]&room=$_REQUEST[room]&payment=$_REQUEST[payment]&numroom=$_REQUEST[numroom]&totalp=$_REQUEST[totalp]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&payment=$_REQUEST[payment]&room3=$_REQUEST[room3]&numrooms=$_REQUEST[numrooms]&cabana=$_REQUEST[cabana]&numroom=$_REQUEST[numroom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&conf=1");
			}	
	mysql_close($con);			
			}

		
						$change =  $_REQUEST['payment'] - $_REQUEST['totalp'] ; 
						
			
$avail = mysql_query("SELECT fldavailable FROM tblhut WHERE fldtype = '$_REQUEST[roomtype]'");
$price = mysql_fetch_array($avail);
	
$get = mysql_query("SELECT fldavailable FROM tblroom WHERE fldtype = '$_REQUEST[room]'");
$free = mysql_fetch_array($get);
?>


              
		 <center>		
					<div class="row">
                      <div class="col-lg-12">
					  <div id="white" style="width: 940px; height: 1300px; background-color: white;">
                           <div class="dataTable_wrapper" style="margin-left:0px; width:70%">
	                  <table class="table table-bordered table-hover" id="dataTables-example">
						<h2>Payment Details</h2>
						
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>">
						<input type="hidden" name="get" value="<?php echo $free['fldavailable']; ?>">
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden"  name="fname" value="<?php echo $_REQUEST['fname']; ?>">
						<input type="hidden" name="lname" value="<?php echo $_REQUEST['lname']; ?>">
						<input  type="hidden"  min="12" name="num" value="<?php echo $_REQUEST['num']; ?>"> 
						 <input type="hidden" name="checkout" value="<?php echo $_REQUEST['checkout']; ?>">
						  <input type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">

						<input type="hidden" size="4" name="adult" value="<?php echo $_REQUEST['adult']; ?>">
						<input type="hidden"  name="child" size="4"value="<?php echo $_REQUEST['child']; ?>"> 
						<input type="hidden"name="types" size="4"value="<?php echo $_REQUEST['types']; ?>"> 
						<input type="hidden"  name="night" value="<?php echo $_REQUEST['night']; ?>">
				
						<?php /// COTTAGES ?>
						<input type="hidden" name="roomtype" value="<?php echo $_REQUEST['roomtype']; ?>">
						<input type="hidden" name="roomtypes2" value="<?php echo $_REQUEST['roomtypes2']; ?>">
						<input type="hidden" name="roomtypes3" value="<?php echo $_REQUEST['roomtypes3']; ?>">
						<input type="hidden" name="roomtypes4" value="<?php echo $_REQUEST['roomtypes4']; ?>">
						<input type="hidden" name="roomtypes5" value="<?php echo $_REQUEST['roomtypes5']; ?>">


						<?php /// Cottages number reserved ?>
						
						<input type="hidden" type="hidden" name="cabana" value="<?php echo $_REQUEST['cabana']; ?>">
						<input type="hidden" type="hidden" name="cabana2" value="<?php echo $_REQUEST['cabana2']; ?>">
						<input type="hidden" type="hidden" name="cabana3" value="<?php echo $_REQUEST['cabana3']; ?>">
						<input type="hidden" type="hidden" name="cabana4" value="<?php echo $_REQUEST['cabana4']; ?>">
						<input type="hidden" type="hidden" name="cabana5" value="<?php echo $_REQUEST['cabana5']; ?>">

						<?php ///ROOMS ?>
						
						<input type="hidden" readonly name="room" value="<?php echo $_REQUEST['room']; ?>">
						<input type="hidden" readonly name="room3" value="<?php echo $_REQUEST['room3']; ?>">
						<input type="hidden" readonly name="room4" value="<?php echo $_REQUEST['room4']; ?>">

						<?php /// Rooms number reserved ?>
						<input type="hidden" readonly name="numroom" value="<?php echo $_REQUEST['numroom']; ?>">
						<input type="hidden" readonly name="numrooms" value="<?php echo $_REQUEST['numrooms']; ?>">
						<input type="hidden" readonly name="numroomss" value="<?php echo $_REQUEST['numroomss']; ?>">
	
						<input type="hidden" name="totalp" value="<?php  echo $_REQUEST['totalp']; ?>">


						
											
						
						
						<?php ////// POST SECTION ?>
			
						<tr><td align="center" width="50%">First Name: </td><th width="50%"><?php echo $_REQUEST['fname'];?> </th></tr>				
						<tr><td align="center" width="50%">Last Name:</td><th width="50%"> <?php echo $_REQUEST['lname'];?> </th></tr>				
						<tr><td align="center" width="50%">Contact Number: </td><th width="50%"> <b> <label style="text-decoration:underline;"><?php echo $_REQUEST['num'];?> </th></tr>
						

						<tr><td align="center" width="50%">Checkin:  </td><th width="50%"><b> <label style="text-decoration:underline;"><?php echo $_REQUEST['checkin'];?> </th></tr>
						<tr><td align="center" width="50%">Checkout: </td><th width="50%"> <b> <label style="text-decoration:underline;"><?php echo $_REQUEST['checkout'];?> </th></tr>

						<tr><td align="center" width="50%">Adults(13 years old and above): </td><th width="50%"><b> <label style="text-decoration:underline;"><?php echo $_REQUEST['adult'];?> </th></tr>
						<tr><td align="center" width="50%">Kids(3-12 years old):</td><th width="50%"> <b> <label style="text-decoration:underline;"><?php echo $_REQUEST['child'];?> </style></label><br><br>	</b>
						<tr><td align="center" width="50%">Type of Stay: </td><th width="50%"> <b> <label style="text-decoration:underline;"><?php echo $_REQUEST['types'];?> </style></label><br><br>	</b>

						<tr><td align="center" width="50%">Nights of stay: </td><th width="50%"><b> <label style="text-decoration:underline;"><?php echo $_REQUEST['night'];?> </style></label><br><br>	</b>
		
						<tr><td align="center" width="50%">Nipa and Hut rental:</td><th width="50%"> <b> <label style="text-decoration:underline;"><?php echo $_REQUEST['roomtype'];?> </style></label><br> &nbsp; 
						<label style="text-decoration:underline;"><?php echo $_REQUEST['roomtypes2']; ?> </style></label> &nbsp; 
						<label style="text-decoration:underline;"><?php echo $_REQUEST['roomtypes3']; ?> </style></label> &nbsp; 
						<label style="text-decoration:underline;"><?php echo $_REQUEST['roomtypes4']; ?> </style></label> &nbsp;
						<label style="text-decoration:underline;"><?php echo $_REQUEST['roomtypes5']; ?> </style></label></b><br><br>						
						
						<tr><td align="center" width="50%">Number of Cottage(s):</td><th width="50%">  <b> <label style="text-decoration:underline;"><?php echo $_REQUEST['cabana'];?> </style></label> &nbsp;
						 <label style="text-decoration:underline;"><?php echo $_REQUEST['cabana2'];?> </style></label> &nbsp;
						 <label style="text-decoration:underline;"><?php echo $_REQUEST['cabana3'];?> </style></label> &nbsp;
						  <label style="text-decoration:underline;"><?php echo $_REQUEST['cabana4'];?> </style></label> &nbsp;
						    <label style="text-decoration:underline;"><?php echo $_REQUEST['cabana5'];?> </style></label><br><br>	</b>

						<tr><td align="center" width="50%">Room Rental: </td><th width="50%"> <b> <label style="text-decoration:underline;"><?php echo $_REQUEST['room2'];?> </style></label> &nbsp;
						  <label style="text-decoration:underline;"><?php echo $_REQUEST['room3'];?> </style></label> &nbsp;
						    <label style="text-decoration:underline;"><?php echo $_REQUEST['room4'];?> </style></label><br><br> </b>
						
						<tr><td align="center" width="50%">Number of Room(s): </td><th width="50%"> <b> <label style="text-decoration:underline;"><?php echo $_REQUEST['numroom'];?> </style></label> &nbsp;
						   <label style="text-decoration:underline;"><?php echo $_REQUEST['numrooms'];?> </style></label> &nbsp;
						    <label style="text-decoration:underline;"><?php echo $_REQUEST['numroomss'];?> </style></label> &nbsp; </b>

						<hr>
						<tr><td align="center" width="50%">Total: <b> Php</td><th width="50%">  <label style="text-decoration:underline;"><?php echo $_REQUEST['totalp'];?> </style></label> &nbsp; </b>
						<hr>
						<tr><td align="center" width="50%">Payment Type: </td><th width="50%"> <select name="pay"><br><br>
						<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Cash"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Cash" ? "selected" : "Cash" ?>>Cash</option>
						</select><br><br>
					
						<tr><td align="center" width="50%">Payment:</td><th width="50%"> <input type="text" name="payment" value="<?php echo $_REQUEST['payment']; ?>"><br><br>
							
							
						<tr><td align="center" width="50%">Change: Php </td><th width="50%"><input type="text" readonly name="change" size="4" value="<?php echo $change;?>"><br><br>
					
						<input type="hidden" name="checkawt" value="<?php echo $_REQUEST['checkawt'];?>">
						<input type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin'];?>">
					
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<div class="center" style="margin-left:400px; position:absolute; top:100%; ">
							<br><input type="submit" value="Confirm" formmethod="post"> <a href="reserved.php"><input type="button" name="back"value="Back"></a>
							</div><?php
						}
						else if($_REQUEST['conf']==1)
							{
							?>	
							<div class="center" style="margin-left:280px; position:absolute; top:100%; ">
							<br>Are you sure you want to update this Reservation?<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
							<a href="reserved.php"><button type="button" class="buttons">NO</button></a>
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


						