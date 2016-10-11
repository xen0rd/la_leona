 <?php
include('sessionadmin.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
		<link rel="stylesheet" href="css/style1.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/ie.css">
	

	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">


	
		<link rel="stylesheet" type="text/css" href="css/ie.css">
   
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
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(empty($_REQUEST['firstname'])||empty($_REQUEST['middlename'])||empty($_REQUEST['lastname'])||empty($_REQUEST['email'])||empty($_REQUEST['contact'])||empty($_REQUEST['age'])||empty($_REQUEST['gender'])||($_REQUEST['gender']=="other"))
	{
		$err =  "* Please fill all empty fields";
	
		if(empty($_REQUEST['firstname']))
		{
			$fnameErr="*";
		}
		if(empty($_REQUEST['middlename']))
		{
			$mnameErr="*";
		}
		if(empty($_REQUEST['lastname']))
		{
			$lnameErr="*";
		}
		if(empty($_REQUEST['email']))
		{
			$emailErr="*";
		}
		if(empty($_REQUEST['contact']))
		{
			$contErr="*";
		}
		if(empty($_REQUEST['age']))
		{
			$ageErr="*";
		}
		if($_REQUEST['gender']=="other")
		{
			$genderErr="*";
		}
		if(empty($_REQUEST['address']))
		{
			$addressErr="*";
		}
		
		header("location:register6.php?err=$err&extra=$_REQUEST[extra]&payment=$_REQUEST[payment]&term=$_REQUEST[term]&checkawt=$_REQUEST[checkawt]&pay=$_REQUEST[pay]&firstname=$_REQUEST[firstname]&fnameErr=$fnameErr&middlename=$_REQUEST[middlename]&mnameErr=$mnameErr&lastname=$_REQUEST[lastname]&lnameErr=$lnameErr&email=$_REQUEST[email]&emailErr=$emailErr&contact=$_REQUEST[contact]&contErr=$contErr&age=$_REQUEST[age]&ageErr=$ageErr&gender=$_REQUEST[gender]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&numrooom=$_REQUEST[numrooom]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana=$_REQUEST[cabana]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&genderErr=$genderErr&address=$_REQUEST[address]&addressErr=$addressErr");
	}
	else
	{
		$con = mysql_connect("localhost","root","");
		if (!$con) 
		 {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("dbresort", $con);
		$dupe = mysql_query("SELECT * FROM tblregister WHERE username='$_POST[username]'") or die (mysql_error());
		$num_rows = mysql_num_rows($dupe);
		$dupee = mysql_query("SELECT * FROM tblregister WHERE fldemail='$_POST[email]'") or die (mysql_error());
		$num_rowss = mysql_num_rows($dupee);
		{
		
			
			if  ($num_rowss > 0) 
			{
			$err = "* Duplicate Email Address";
				$emailErr="*";
				header("location:register6.php?err=$err&extra=$_REQUEST[extra]&reg=$_REQUEST[reg]&change=$_REQUEST[change]&payment=$_REQUEST[payment]&checkawt=$_REQUEST[checkawt]&term=$_REQUEST[term]&pay=$_REQUEST[pay]&email=$_REQUEST[email]&emailErr=$emailErr&firstname=$_REQUEST[firstname]&middlename=$_REQUEST[middlename]&lastname=$_REQUEST[lastname]&contact=$_REQUEST[contact]&age=$_REQUEST[age]&gender=$_REQUEST[gender]&address=$_REQUEST[address]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&numrooom=$_REQUEST[numrooom]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana=$_REQUEST[cabana]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]");
			}
			if  ($_REQUEST['payment'] <  $_REQUEST['totalp']) 
			{
				$err = " * Insufficient Payment! ";
				header("location:register6.php?err=$err&extra=$_REQUEST[extra]&reg=$_REQUEST[reg]&change=$_REQUEST[change]&payment=$_REQUEST[payment]&checkawt=$_REQUEST[checkawt]&term=$_REQUEST[term]&pay=$_REQUEST[pay]&email=$_REQUEST[email]&emailErr=$emailErr&firstname=$_REQUEST[firstname]&middlename=$_REQUEST[middlename]&lastname=$_REQUEST[lastname]&contact=$_REQUEST[contact]&age=$_REQUEST[age]&gender=$_REQUEST[gender]&address=$_REQUEST[address]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&numrooom=$_REQUEST[numrooom]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana=$_REQUEST[cabana]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]");
			}
			
			else if($_REQUEST['confbut'] == "YES")
			{
					
					$change = $_REQUEST['payment'] - $_REQUEST['totalp']; 
		
						mysql_query($updt);
				
						$num = $_REQUEST['reg'] + 1;
				
						$reserved = "Reserved";
					
						$date = date ('Y-m-d');
				
						$change = $_REQUEST['payment'] - $_REQUEST['totalp']; 
					
						$ssql="INSERT INTO tblreport(RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldchange, fldpayment, fldextra)
						 VALUES ('$num','$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[contact]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numrooom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Checked in','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$change','$_REQUEST[payment]','$_REQUEST[extra]')";
					
						mysql_query($ssql);
						
						if($_REQUEST['checkawt'] > 1)
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
							$datet = $_REQUEST['checkin'];
							$dates = date('Y-m-d', strtotime($datet. "+$x days")); 						
						
						$sql="INSERT INTO tblreserve(RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldchange, fldpayment, fldextra)
						 VALUES ('$num','$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[contact]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Checked in','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$change','$_REQUEST[payment]','$_REQUEST[extra]')";
		
						mysql_query($sql);
							}
						}
						
						if($_REQUEST['checkawt'] >= 1)
						{
							for($x=0;$x<$_REQUEST['checkawt'];$x++)
							{
							$datet = $_REQUEST['checkin'];
							$dates = date('Y-m-d', strtotime($datet. "+$x days")); 						
			
						$sql="INSERT INTO tblreserve(RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldchange, fldpayment, fldextra)
						 VALUES ('$num','$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[contact]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Checked in','$_REQUEST[term]','$_REQUEST[pay]','$dates','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$change','$_REQUEST[payment]','$_REQUEST[extra]')";
						mysql_query($sql);
							}
						}
						
						if($_REQUEST['checkawt'] == 0 )
						{
							
						$datet = $_REQUEST['checkin'];
						$sql="INSERT INTO tblreserve(RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldadult, fldchild, fldstaytype, fldroom, fldroomtype, fldnumofroom, fldcottagesnum,  fldtotal, status, fldterm, fldpaymenttype, flddate, fldbalance, fldnightstay, fldcreated, fldhutnum, fldroomnum, fldroom2, fldnum2, fldroom4, fldnum4, fldhut2, fldhut3, fldhut4, fldhut5, fldh2, fldh3, fldh4, fldh5, fldchange, fldpayment, fldextra)
						 VALUES ('$num','$_REQUEST[firstname]','$_REQUEST[lastname]','$_REQUEST[contact]','$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[types]','$_REQUEST[roomtype]','$_REQUEST[room2]','$_REQUEST[numroom]','$_REQUEST[cabana]','$_REQUEST[totalp]','Checked in','$_REQUEST[term]','$_REQUEST[pay]','$datet','$less','$_REQUEST[night]','$date','$_REQUEST[hutnum]','$_REQUEST[rmnum]','$_REQUEST[room3]','$_REQUEST[numrooms]','$_REQUEST[room4]','$_REQUEST[numroomss]','$_REQUEST[roomtypes2]','$_REQUEST[roomtypes3]','$_REQUEST[roomtypes4]','$_REQUEST[roomtypes5]','$_REQUEST[cabana2]','$_REQUEST[cabana3]','$_REQUEST[cabana4]','$_REQUEST[cabana5]','$change','$_REQUEST[payment]','$_REQUEST[extra]')";
						mysql_query($sql);
						
						
						}
						
						$up ="UPDATE tblincre SET fldnum = '$num'";
						mysql_query($up);
						
						$sqls="INSERT INTO tblregister (password, fldfname, fldmname, fldlname, fldemail, fldcontact, fldage, fldgender, fldaddress)
						VALUES('$_REQUEST[password]','$_REQUEST[firstname]','$_REQUEST[middlename]','$_REQUEST[lastname]','$_REQUEST[email]','$_REQUEST[contact]','$_REQUEST[age]','$_REQUEST[gender]','$_REQUEST[address]')";
						mysql_query($sqls);
						
				header("location:reserved.php"); 	
				}
					
				else
				{
				header("location:register6.php?err=$err&extra=$_REQUEST[extra]&reg=$_REQUEST[reg]&change=$_REQUEST[change]&payment=$_REQUEST[payment]&checkawt=$_REQUEST[checkawt]&term=$_REQUEST[term]&pay=$_REQUEST[pay]&email=$_REQUEST[email]&emailErr=$emailErr&firstname=$_REQUEST[firstname]&middlename=$_REQUEST[middlename]&lastname=$_REQUEST[lastname]&username=$_REQUEST[username]&contact=$_REQUEST[contact]&age=$_REQUEST[age]&gender=$_REQUEST[gender]&address=$_REQUEST[address]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&numrooom=$_REQUEST[numrooom]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana=$_REQUEST[cabana]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&conf=1");
				}	
		}
	}
}

	
	$checks= mysql_query("SELECT * FROM tblincre");
$incre = mysql_fetch_array($checks);   
	


	$err = $_REQUEST['err'];

	echo "<td>";
	echo "<span class='colorr pos' style='margin-left:-120px; margin-top: -110px; font-size: 15px;'> ";
	echo $err;
	echo "</span>";
	echo "</td>";

	$checkin = $_REQUEST['checkin'];
	$checkout = $_REQUEST['checkout'];
	$night = $_REQUEST['night'];
	$types = $_REQUEST['types'];
	$adult = $_REQUEST['adult'];
	$child = $_REQUEST['child'];
	$totalp = $_REQUEST['totalp'];
	
	$extra = $_REQUEST['extra'];
	
	//// ROOMS
	$room4 = $_REQUEST['room4'];
	$room3 = $_REQUEST['room3'];
	$room2 = $_REQUEST['room2'];
	$numrooom = $_REQUEST['numrooom'];
	$numrooms = $_REQUEST['numrooms'];
	$numroomss = $_REQUEST['numroomss'];
	
	////COTTAGES
	
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

	?>
	<div id="body">
		<div class="content">
			<div class="section">
			
						<table border="1">
							<td  height="px" width="250px" style="border-style:dotted solid; border-width: 4px; margin-top: 100px; margin-left: 639px; position: absolute;"> 
							<font color=crimson> <h3>Accomodation Preferences </h3></font>
						
							
						<font size="4">Checkin: <?php echo $checkin; ?> <input  type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>"><br>
						Checkout: <?php echo $checkout; ?><input type="hidden" name="checkout" value="<?php echo $_REQUEST['checkout'];?>"><br>
						Night(s) of Stay:  <?php echo $night; ?><input  type="hidden"  name="night" value="<?php echo $_REQUEST['night']; ?>"><Br>
						
						Type of Stay:  <?php echo $types; ?> <input type="hidden" name="types" value="<?php echo $_REQUEST['types']; ?>"><br>
						Adult(s): <?php echo $adult; ?> <input type="hidden" name="adult" value="<?php echo $_REQUEST['adult']; ?>"><br>
																							
						<input type="hidden" name="child" value="<?php echo $_REQUEST['child']; ?>">
						<?php
						if ($child == NULL)
						{	

							?>
							Kid(s): <?php echo None; ?>  <br>
							<?php
						}
						
						if ($child != NULL)
						{	
							?>
							Kid(s):<?php echo $child; ?> <br>
							<?php
						}
						
						
						$tot = $_REQUEST['totalp'] * 0.12;
						$tots = $_REQUEST['totalp'] - $tot;
						?>					Extra Bed: <?php echo $extra; ?><input type="hidden" name="extra" value="<?php echo $_REQUEST['extra']; ?>"><br>

						<br>Vatable Sales: Php <?php echo $tots; ?><input type="hidden" name="tots" value="<?php echo $_REQUEST['tots']; ?>"><br>
						VAT (12%): Php <?php echo $tot; ?><input type="hidden" name="tot" value="<?php echo $_REQUEST['tot']; ?>"><br>
						
						
						
						
						Total: Php <?php echo $totalp; ?><input type="hidden" name="totalp" value="<?php echo $_REQUEST['totalp']; ?>">
	
						
					
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden" name="checkawt" value="<?php echo $_REQUEST['checkawt'];?>">
						<input type="hidden" name="room4" value="<?php echo $_REQUEST['room4']; ?>"> <input type="hidden" name="numroomss" value="<?php echo $_REQUEST['numroomss']; ?>">
						<input type="hidden" name="room3" value="<?php echo $_REQUEST['room3']; ?>"> <input type="hidden" name="numrooms" value="<?php echo $_REQUEST['numrooms']; ?>">
						<input type="hidden" name="room2" value="<?php echo $_REQUEST['room2']; ?>"> <input type="hidden" name="numrooom" value="<?php echo $_REQUEST['numrooom']; ?>">
						
						
						<input type="hidden" name="roomtype" value="<?php echo $_REQUEST['roomtype'];?>"><input type="hidden" name="cabana" value="<?php echo $_REQUEST['cabana'];?>">
						<input type="hidden" name="roomtypes2" value="<?php echo $_REQUEST['roomtypes2'];?>"><input type="hidden" name="cabana2" value="<?php echo $_REQUEST['cabana2'];?>">
						<input type="hidden" name="roomtypes3" value="<?php echo $_REQUEST['roomtypes3'];?>"><input type="hidden" name="cabana3" value="<?php echo $_REQUEST['cabana3'];?>">
						<input type="hidden" name="roomtypes4" value="<?php echo $_REQUEST['roomtypes4'];?>"><input type="hidden" name="cabana4" value="<?php echo $_REQUEST['cabana4'];?>">
						<input type="hidden" name="roomtypes5" value="<?php echo $_REQUEST['roomtypes5'];?>"><input type="hidden" name="cabana5" value="<?php echo $_REQUEST['cabana5'];?>">
						
						<?php 
						if ($_REQUEST['room2']|| $_REQUEST['room3'] || $_REQUEST['room4'] != NULL)
						{
						?>
						<font color=blue> <h3>Room</h3></font>

						

						<?php
						if ($_REQUEST['room4'] != NULL)
						{
					
						 echo $room4;  echo"&nbsp;($numroomss)<br>"; 

						}
						
						if ($_REQUEST['room3'] != NULL)
						{
							echo $room3;  echo"&nbsp;($numrooms)<br>"; 				
					
						}
						
						if ($_REQUEST['room2'] != NULL)
						{
							
						 echo $room2;  echo"&nbsp;($numrooom)<br>"; 
						}
						}
						?>
						
							<?php 
						if ($_REQUEST['roomtype'] || $_REQUEST['roomtypes2'] || $_REQUEST['roomtypes3'] || $_REQUEST['roomtypes4'] || $_REQUEST['roomtypes5'] != NULL)
						{
							?>
								<font color=blue> <h3>Cottages</h3></font>

		
							<?php
							if ($_REQUEST['roomtype'] != NULL)
							{	
								echo $roomtype; echo "&nbsp;( $cabana)<br>";
							}
							?> 
							<?php 
							if ($_REQUEST['roomtypes2'] != NULL)
							{	
								echo $roomtypes2;  echo "&nbsp;( $cabana2)<br>"; 
							}							
							?>
							<?php 
							if ($_REQUEST['roomtypes3'] != NULL)
							{	
								echo $roomtypes3; echo "&nbsp;( $cabana3)<br>";
							}
							?> 
							<?php 
							if ($_REQUEST['roomtypes4'] != NULL)
							{	
								echo $roomtypes4; echo "&nbsp;( $cabana4)<br>";
							}
							?>
							<?php 
							if ($_REQUEST['roomtypes5'] != NULL)
							{	
								echo $roomtypes5; echo "&nbsp;( $cabana5)<br>";
							}
							?>
							</th></tr>
						<?php
						}
						?>

						
							</td>
							
							
							</table>
				<div class="booking">
					<h2>Guest Info </h2>  
					
					<form method="post" action="register6.php">

			
						<h4>Contact information</h4>
						<div class="form1">
							<div>
							
						<input class="textarea" type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						<input class="textarea" type="hidden" name="checkout" value="<?php echo $_REQUEST['checkout'];?>">
	
						<input  type="hidden"  name="night" value="<?php echo $_REQUEST['night']; ?>">
						<input type="hidden" name="types" value="<?php echo $_REQUEST['types']; ?>">
						<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">
						<input type="hidden" name="checkawt" value="<?php echo $_REQUEST['checkawt'];?>">
						<input type="hidden" name="extra" value="<?php echo $_REQUEST['extra']; ?>">
						
					
						<input type="hidden" name="room4" value="<?php echo $_REQUEST['room4']; ?>"> <input type="hidden" name="numroomss" value="<?php echo $_REQUEST['numroomss']; ?>">
						<input type="hidden" name="room3" value="<?php echo $_REQUEST['room3']; ?>"> <input type="hidden" name="numrooms" value="<?php echo $_REQUEST['numrooms']; ?>">
						<input type="hidden" name="room2" value="<?php echo $_REQUEST['room2']; ?>"> <input type="hidden" name="numrooom" value="<?php echo $_REQUEST['numrooom']; ?>">

						<input type="hidden" name="roomtype" value="<?php echo $_REQUEST['roomtype']; ?>"> <input type="hidden" name="cabana" value="<?php echo $_REQUEST['cabana']; ?>">
						<input type="hidden" name="roomtypes2" value="<?php echo $_REQUEST['roomtypes2']; ?>"> <input type="hidden" name="cabana2" value="<?php echo $_REQUEST['cabana2']; ?>">
						<input type="hidden" name="roomtypes3" value="<?php echo $_REQUEST['roomtypes3']; ?>"> <input type="hidden" name="cabana3" value="<?php echo $_REQUEST['cabana3']; ?>">
						<input type="hidden" name="roomtypes4" value="<?php echo $_REQUEST['roomtypes4']; ?>"> <input type="hidden" name="cabana4" value="<?php echo $_REQUEST['cabana4']; ?>">
						<input type="hidden" name="roomtypes5" value="<?php echo $_REQUEST['roomtypes5']; ?>"> <input type="hidden" name="cabana5" value="<?php echo $_REQUEST['cabana5']; ?>">

					
						
						<input type="hidden" name="types" value="<?php echo $_REQUEST['types']; ?>"><br>
						<input type="hidden" name="adult" value="<?php echo $_REQUEST['adult']; ?>"><br>
																							
						<input type="hidden" name="child" value="<?php echo $_REQUEST['child']; ?>">
						<input type="hidden" name="totalp" value="<?php echo $_REQUEST['totalp']; ?>">

							
							
        First Name: <font color="red"><?php echo $_REQUEST['fnameErr']; ?></font><input type="text" name="firstname" value="<?php echo $_REQUEST['firstname']; ?>"><span class="colorr"></span>
        Middle Name: <font color="red"><?php echo $_REQUEST['mnameErr']; ?></font><input type="text" name="middlename" value="<?php echo $_REQUEST['middlename']; ?>"><span class="colorr"></span>
        Last Name:<font color="red"> <?php echo $_REQUEST['lnameErr']; ?></font><input type="text" name="lastname" value="<?php echo $_REQUEST['lastname']; ?>"><span class="colorr"></span>
        Address: <font color="red"><?php echo $_REQUEST['addressErr']; ?></font><input type="text" name="address" value="<?php echo $_REQUEST['address']; ?>"><span class="colorr"></span>
        Email: <font color="red"><?php echo $_REQUEST['emailErr']; ?></font><input type="text" name="email" value="<?php echo $_REQUEST['email']; ?>"><span class="colorr"></span>
        Contact: <font color="red"><?php echo $_REQUEST['contErr']; ?></font><input type="text" name="contact" maxlength="11" value="<?php echo $_REQUEST['contact']; ?>"><span class="colorr"></span>
        Age: <font color="red"><?php echo $_REQUEST['ageErr']; ?></font><input type="text" name="age" value="<?php echo $_REQUEST['age']; ?>"><span class="colorr"></span>
        Gender: <font color="red"><?php echo $_REQUEST['genderErr']; ?> </font><select name="gender" value="<?php echo $_REQUEST['gender']; ?>">
        <option value="other" <?php echo isset($_REQUEST["gender"]) && $_REQUEST["gender"] == "other" ? "selected" : "other" ?>> </option>
        <option value="Male" <?php echo isset($_REQUEST["gender"]) && $_REQUEST["gender"] == "Male" ? "selected" : "Male" ?>>Male</option>
        <option value="Female" <?php echo isset($_REQUEST["gender"]) && $_REQUEST["gender"] == "Female" ? "selected" : "Female" ?>>Female</option>
        </select> <span class="colorr"> </span>
		Payment Type: <select class="form-control" name="pay">
						<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Cash"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Cash" ? "selected" : "Cash" ?>>Cash</option>
						</option></select>
<br>
						<tr><td align="center" width="50%">Payment:</td><th width="50%"> <input type="text" name="payment" value="<?php echo $_REQUEST['payment']; ?>"><br><br>
							
							<?php
							$change = $totalp - $_REQUEST['payment'] ;
							?>
							
						<tr><td align="center" width="50%">Change: </td><th width="50%"><input type="text" readonly name="change" size="4" value="<?php echo $change;?>"><br><br>
					
								
							</div>
						</div>
						<div class="form2">
							<div>
							</div>
						</div>
						
						<?php
						if($_REQUEST['conf']==NULL)
						{
							?>
							<div >
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
					<a href="">admin</a>
				</li>
			</ul>
		</div>
	</div>
    

</body>
</html>