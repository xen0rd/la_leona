<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">



		<link rel="stylesheet" type="text/css" href="css/ie.css">


</head>
<body>
	<div id="header">
		<div>
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="index.php">
				<input type="text" name="search" id="search" value="">
				<input type="submit" name="searchBtn" id="searchBtn" value="">
			</form>
		</div>
		<div class="navigation">
			<ul>
				<li>
					<a href="index.php">Home</a>
					<ul>
					<li>
					<a href="bookingevent.php">About Us</a>
					</li>
					<li>
					<a href="bookingroom.php">Contact</a>
					</li>
					</ul>
				</li>
					<li>
					<a href="facility.php">Facilities</a>
					<ul>
					<li>
					<a href="bookingevent.php">Amenities</a>
					</li>
				</li>
				</ul>
				<li>
					<a href="services.html">Gallery</a>
				<ul>
					<li>
					<a href="bookingevent.php">Pictures</a>
					</li>
					<li>
					<a href="bookingroom.php">Videos</a>
					</li>
					</ul>
				<li>
					<a href="#">Reservation</a>
					<ul>
					<li>
					<a href="register.php">Register</a>
					</li>
					<li>
					<a href="CustLogin.php">Login</a>
					</li>
				</li>
				</ul>
				<li >
					<?php 
                    	//echo $_SESSION['login_type'];
                    	if(isset($_SESSION['login_type'])){
                    		if($_SESSION['login_type']=="admin"){
                    			echo "<ul>
					                        <li>
					                            <a href=\"logout.php\">Logout</a>
					                        </li>
					                  </ul>";
                    		}
                    	}
                    ?>


					</li>

					</ul>
				</li>
			</ul>
		</div>
	</div>
	<?php
error_reporting(0);

/*$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);*/
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(empty($_REQUEST['checkin'])||empty($_REQUEST['checkout'])||$_REQUEST['types']=="other")
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

		header("location:cabanasmushroom1.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&night=$_REQUEST[night]&types=$_REQUEST[types]&inErr=$inErr&outErr=$outErr&typesErr=$typesErr");

	}
	else
	{
		if ($_REQUEST['confbut'] == "Check Availability")
		{
			$tomorrow = date("Y-m-d", time() + 259200);
			if ($_REQUEST['checkin'] <= $tomorrow)
			{
				$err = "Checkin Date is not valid!";
				$outErr = "*";
				$inErr = "*";
				header("location:cabanasmushroom1.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&night=$_REQUEST[night]&types=$_REQUEST[types]&checkawt=$_REQUEST[checkawt]");

			}
			else if ($_REQUEST['checkout'] < $_REQUEST['checkin'])
			{
				$err = "Invalid Date Input!";
				$outErr = "*";
				$inErr = "*";
				header("location:cabanasmushroom1.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&night=$_REQUEST[night]&types=$_REQUEST[types]&checkawt=$_REQUEST[checkawt]");
			}
			else
			{
			header("location:cabanasmushroom.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&night=$_REQUEST[night]&types=$_REQUEST[types]&checkawt=$_REQUEST[checkawt]");
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



	<div id="body">
		<div class="header">

<div id="body">
	<div class="body">

<table class="room">
<tr>
  <th>
  </th>
  <td>
    <h2><font face="century gothic" color="#f3be4b" size="5"> Cabanas & Mushroom </font></h2>
    <span id="tab"><p style font-size="30" >Take pleasure in La Leona’s airconditioned rooms. You can choose to stay in the contemporary-styled La Leona Attic or in the native-inspired La Leona Loft. Whatever you choose, it will surely bring you that well-deserved La Leona comfort!

<p>If you want more budget-friendly accommodation, why not try La Leona’s fan-cooled rooms? The resort has four nipa hut rooms and one duplex nipa hut. These may be low-priced rooms but will still provide you a relaxing stay at La Leona. </p></span>
<span id="tab"><p>- easy access to the pool area.
				</p></span>
		<hr>

						<form action="cabanasmushroom1.php" method="get">
							 <h2><font face="century gothic" color="#f3be4b" size="5"> Your Preferences</font></h2>
						<input type="hidden"  name="checkawt" value="<?php echo $night; ?>">
						<input type="hidden"  name="inErr" value="<?php echo $_REQUEST['inErr']; ?>">
						<input type="hidden"  name="err" value="<?php echo $_REQUEST['err']; ?>">
						<input type="hidden"  name="outErr" value="<?php echo $_REQUEST['outErr']; ?>">
						<input type="hidden"  name="typesErr" value="<?php echo $_REQUEST['typesErr']; ?>">


						<input class="textarea" type="hidden" size="4" name="reg" value="<?php echo $incre['fldnum']; ?>">
						<span id="tab"><?php
							$err = $_REQUEST['err'];

							echo "<font color='red'>$err </font>";

							?>
							<br>
						<span id="tab"><br>Checkin date <font color="red">  <?php echo $_REQUEST['inErr']; ?> </font><input  type="date" class="form-control" min="<?php echo date ("Y-m-d"); ?>" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>"></span>

						<span id="tab">Checkout date <font color="red"><?php echo $_REQUEST['outErr']; ?></font> <input  type="date" class="form-control" min="<?php echo date ("Y-m-d"); ?>" name="checkout" OnChange="this.form.submit();" value="<?php echo $_REQUEST['checkout'];?>"></span><br><br>

					<?php
						if ($_REQUEST['checkout'] != NULL)
						{
							?>
						<span id="tab">Night(s) of Stay: <input class="form-control"  readonly type="text" class="form-control"  name="night" value="<?php echo $night; ?>"></span>

						<?php
						}
						?>


						<?php
						if($night == 0 )
						{
						?>
							<span id="tab">Type of stay: <font color="red"> <?php echo $_REQUEST['typesErr']; ?></font> <select name="types"   class="form-control"  onchange="this.form.submit();">
							<option  value="other" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "other" ? "selected" : "other" ?>>Please Select..</option>
							<option  value="Day" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "Day" ? "selected" : "Day" ?>>Day</option>

							</select></span>

						<?php
						}
						?>
						<?php
						if($night ==1 )
						{
						?>
							<span id="tab">Type of stay:<font color="red"> <?php echo $_REQUEST['typesErr']; ?></font> <select name="types"  class="form-control"   onchange="this.form.submit();">
							<option  value="other" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "other" ? "selected" : "other" ?>>Please Select..</option>
							<option  value="Night" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "Night" ? "selected" : "Night" ?>>Night</option>
							<option  value="Day and Night" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "Day and Night" ? "selected" : "Day and Night" ?>>Day and Night</option>

							</select></span>
						<?php
						}
						?>
						<?php
						if($night >=2 )
						{
						?>

							<span id="tab">Type of stay:<font color="red"> <?php echo $_REQUEST['typesErr']; ?></font> <select name="types"  class="form-control">
							<option  value="other" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "other" ? "selected" : "other" ?>>Please Select..</option>
							<option value="Day and Night" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "Day and Night" ? "selected" : "Day and Night" ?>>Day and Night</option>

							</select></span>
						<?php
						}
						?>

			<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<button class="button2" type="submit"  name="confbut" value="Check Availability" formmethod="post"> Next </button></span>


<br><br><br><br>
<hr class="hr">

</td>
</tr>
<table class="room">
	<tr>
		<td>
		<img src="img2/mushroom2.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Mushroom </font><br><br>10 pax</span>
		<span id="tab">Day use <br><br> Php 250 </span>
		<span id="tab">Overnight <br><br> Php350</span>
		<span id="tab">Day & Night use <br><br> Php 500</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br>

		<img src="img2/mushroom4.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Cabanas </font><br><br>10 pax</span>
		<span id="tab">Day use <br><br> Php 400 </span>
		<span id="tab">Overnight <br><br> Php 500</span>
		<span id="tab">Day & Night use <br><br> Php 800</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br>

		<img src="img2/mezaninne1.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Mezaninne </font><br><br> 10 pax</span>
		<span id="tab">Day use <br><br> Php 1200 </span>
		<span id="tab">Overnight <br><br> Php 1500</span>
		<span id="tab">Day & Night use <br><br> Php 2500</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br>

		<img src="img2/le leona cabana.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"> <br><br><font face="century gothic" color="#f3be4b" size="5">La Leona Cabana</font> <br><br> 25 pax</span>
		<span id="tab">Day use <br><br> Php 1200 </span>
		<span id="tab">Overnight <br><br> Php 1500</span>
		<span id="tab">Day & Night use <br><br> Php 2500</span>

		<br> <br><br><br><br><br><hr class="hr"> <br>

		<img src="img2/mushroom1.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5"> Duplex</font> <br><br> 15 pax</span>
		<span id="tab">Day use <br><br> Php 1250 </span>
		<span id="tab">Overnight <br><br> Php 1500</span>
		<span id="tab">Day & Night use <br><br> Php 2500</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br>

	</td>
	</table>
	</form>
    <button class="button2" onClick="location.href='gallery.php'"> <span>Go back</span></button>
    <br><br>
</font>
</body>
</table>
</html>
