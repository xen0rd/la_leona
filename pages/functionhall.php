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
				<li >
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
					<li >
					<a href="gallery.php">Accomodation</a>
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
					<a href="contact.html">Reservation</a>
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
					<a href="admin.php">Admin</a>
					
				
					</li>
               
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
	<?php
error_reporting(0);
$reg = $_REQUEST['reg'];

$con = mysql_connect("localhost","root","1234");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(empty($_REQUEST['checkin'])||empty($_REQUEST['person'])||$_REQUEST['hall']=="other"||$_REQUEST['cater']=="other")
	{
		$err = "Please fill all empty fields";
		if(empty($_REQUEST['checkin']))
		{
			$inErr = "*";
		}
		if(empty($_REQUEST['person']))
		{
			$personErr="*";
			
		}
		
		if($_REQUEST['hall']=="other")
		{
			$hallErr = "*";
		}
	
		if($_REQUEST['cater']=="other")
		{
			$caterErr = "*";
		}
		
		if($_REQUEST['time']=="other")
		{
			$timeErr = "*";
		}
	
		header("location:functionhall.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&person=$_REQUEST[person]&hall=$_REQUEST[hall]&cater=$_REQUEST[cater]&time=$_REQUEST[time]&hours=$_REQUEST[hours]&inErr=$inErr&personErr=$personErr&hallErr=$hallErr&caterErr=$caterErr&timeErr=$timeErr&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]");

	}
	else
	{	
		$tomorrow = date("Y-m-d", time() + 259200);
		if ($_REQUEST['checkin'] <= $tomorrow)
		{
						$err = "Checkin Date is not valid!";
						$inErr = "*";
						header("location:functionhall.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&time=$_REQUEST[time]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]");																											

		}
			
		else if($_REQUEST['confbut'] == "YES")
				{
					
			
					$chk = mysql_query("SELECT * FROM tblreserveevent WHERE fldhall ='$_REQUEST[hall]' AND fldarrival = '$_REQUEST[checkin]' AND fldtime = '$_REQUEST[time]'") or die (mysql_error());
					$num_rew = mysql_num_rows($chk);
					if ($num_rew > 0)
					{
						$err = 'The hall is already reserved on that day';
								header("location:functionhall.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&time=$_REQUEST[time]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]");																											
					}
					else
					{
					$check = mysql_query("SELECT * FROM tblreserveevent WHERE fldhall ='$_REQUEST[hall]' AND fldarrival = '$_REQUEST[checkin]'") or die (mysql_error());
					$num_rowsss= mysql_num_rows($check);
			
		   
					if ($num_rowsss > 0) 
					{
					$ch=mysql_fetch_array($check);
					if($ch['fldtime']=='AM-PM')
					{
						$err = "The hall is already reserved on that day";
						header("location:functionhall.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&time=$_REQUEST[time]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]");													
					}
					else
					{
						if($ch['fldtime']=='AM')
						{
							if($_REQUEST['time']=='AM'||$_REQUEST['time']=='AM-PM')
							{
								$err = "the hall is already reserved on that day";
								header("location:functionhall.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&time=$_REQUEST[time]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]");																					
							}
							else
							{
								header("location:register2.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]&time=$_REQUEST[time]");									
							}
						}
						else if($ch['fldtime']=='PM')
						{
							if($_REQUEST['time']=='PM'||$_REQUEST['time']=='AM-PM')
							{
								$err = "the hall is already reserved on that day";
								header("location:functionhall.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&time=$_REQUEST[time]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]");																					
							}
							else
							{
								header("location:register2.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]&time=$_REQUEST[time]");									
							}	
						}
					}
					}
					 else 
					 {
					header("location:register2.php?err=$err&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]&time=$_REQUEST[time]");	
					 }
					}
						
				if (!mysql_query($sql,$con))
				{
			die('Error: ' . mysql_error());
			}
			header("location:functionhall.php");
			
			}
			else
			{
		 	header("location:functionhall.php?&occasion=$_REQUEST[occasion]&checkin=$_REQUEST[checkin]&hall=$_REQUEST[hall]&hours=$_REQUEST[hours]&person=$_REQUEST[person]&cater=$_REQUEST[cater]&time=$_REQUEST[time]&pay=$_REQUEST[pay]&payment=$_REQUEST[payment]&reg=$_REQUEST[reg]&conf=1");
			}		
		}
	}


	



$hours = round((strtotime($_REQUEST['end']) - strtotime($_REQUEST['start']))/(60*60));


$result0 = mysql_query("SELECT fldtype FROM tblhall");

$results = mysql_query("SELECT * FROM tblhall");
$resus = mysql_fetch_array($results);   


$result1 = mysql_query("SELECT * FROM tblhall WHERE fldtype = '$_REQUEST[hall]'");
$resu = mysql_fetch_array($result1);   
	 
$avail = mysql_query("SELECT fldavailable FROM tblhall WHERE fldtype = '$_REQUEST[hall]'");
$free = mysql_fetch_array($avail);

$pax = $_REQUEST['person'];



if($_REQUEST['hall']=="Kristina Function Hall")	
{
	
	if($pax<=1 || 101>$pax) 
	{				
			$additional = $_REQUEST['hours'] * 1000;

			if($_REQUEST['time']=="AM")	
			{	
			$total =  $resu['fld50pax'] + $additional;
			}	
			if($_REQUEST['time']=="PM")	
			{	
			$total =  $resu['fld50pax'] + $additional;
			}	
			if($_REQUEST['time']=="AM-PM")	
			{	
			$total =  $resu['fldampm'] + $additional;
			}				
			
	}
	
	else if($pax<=101 || 201>$pax) 
	{
		$additional = $_REQUEST['hours'] * 1000;

			
			if($_REQUEST['time']=="AM")	
			{	
			$total =  $resu['fld100pax'] + $additional;
			}
			if($_REQUEST['time']=="PM")	
			{	
			$total =  $resu['fld100pax'] + $additional;
			}
			if($_REQUEST['time']=="AM-PM")	
			{	
			$total =  $resu['fldampm'] + $additional;
			}	
		
	}
	
	
}

else if($_REQUEST['hall']=="Alfonso Pavillion")
{ 
	if($pax<=1 || 101>$pax) 
	{
			$additionals = $_REQUEST['hours'] * 500;

		
			if($_REQUEST['time']=="AM")	
			{	
			$total =  $resu['fld50pax'] + $additionals;
			}	
			if($_REQUEST['time']=="PM")	
			{	
			$total =  $resu['fld50pax'] + $additionals;
			}				
			if($_REQUEST['time']=="AM-PM")	
			{	
			$total =  $resu['fldampm'] + $additionals;
			}	
					
	}
	
	else if($pax<=101 || 201>$pax) 
	{
		$additionals = $_REQUEST['hours'] * 500;

			if($_REQUEST['time']=="AM")	
			{	
			$total =  $resu['fld100pax'] + $additionals;
			}
			if($_REQUEST['time']=="PM")	
			{	
			$total =  $resu['fld100pax'] + $additionals;
			}
			if($_REQUEST['time']=="AM-PM")	
			{	
			$total =  $resu['fldampm'] + $additionals;
			}	
	}
}

if ($_REQUEST['cater']=="No")
	{
		$total = $total + 2000;
	}
else if ($_REQUEST['cater']=="Yes")
	{
		$total = $total + $_REQUEST['person'] * 400;
	}


if($_REQUEST['hall']=="other"||$_REQUEST['hall']==NULL)
{
	$count = "";
}
else
{
	if($free['fldavailable']>0)
	{
		$count = $free['fldavailable'];
	}
	else
	{
		
		$count = "none";
	}
	
}

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
    <h2> <font face="century gothic" color="#f3be4b" size="5">Function Hall</font></h2>
    <span id="tab">Special occasions can be made even more memorable when held in a comely venue. La Leona Resort can be your next destination for an important event in your life – may it be wedding, birthday party, baptismal party, or family reunion. The Function Hall can also host corporate events such as conference, seminar, training, team-building activities, or company parties.<br><br><br><br> </span>
<hr>
	
	 <h2><font face="century gothic" color="#f3be4b" size="5"> Your Preferences</font></h2>
	<?php 
								$err = $_REQUEST['err'];
						
							echo "<font color='red'>$err</font>";
						
$checks= mysql_query("SELECT * FROM tblincre");
$incre = mysql_fetch_array($checks);   

	
							?>
						
												<input class="textarea" type="hidden" size="4" name="reg" value="<?php echo $incre['fldnum']; ?>">

						<form action="functionhall.php" method="get">
						<input type="hidden" name="inErr" value="<?php echo $_REQUEST['inErr']; ?>">
						<input type="hidden" name="err" value="<?php echo $_REQUEST['err']; ?>">
						<input type="hidden" name="timeErr" value="<?php echo $_REQUEST['timeErr']; ?>">
						<input type="hidden" name="hallErr" value="<?php echo $_REQUEST['hallErr']; ?>">
						<input type="hidden" name="personErr" value="<?php echo $_REQUEST['personErr']; ?>">
						<input type="hidden" name="caterErr" value="<?php echo $_REQUEST['caterErr']; ?>">
						<input type="hidden" name="fname" value="<?php echo $select['fldfname']; ?>">
						<input type="hidden" name="lname" value="<?php echo $select['fldlname']; ?>">
						<input type="hidden" name="num" value="<?php echo $select['fldcontact']; ?>">
				
						
						<input class="textarea" type="hidden" size="4" name="reg" value="<?php echo $incre['fldnum']; ?>">
						<center>
				
						
						
						 <span id="tab">Checkin date: <font color='red'><?php echo $_REQUEST['inErr']; ?> </font> <input class="form-control"  min="<?php echo date ("Y-m-d"); ?>" type="date"  name="checkin" value="<?php echo $_REQUEST['checkin']; ?>"></span>
	
						 <span id="tab"><br>Time: <font color="red">  <?php echo $_REQUEST['timeErr']; ?> </font><select class="form-control" name="time">
						<option value="other" <?php echo isset($_REQUEST["time"]) && $_REQUEST["time"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="AM"  <?php echo isset($_REQUEST["time"]) && $_REQUEST["time"] == "AM" ? "selected" : "AM" ?>>AM</option>
						<option value="PM"  <?php echo isset($_REQUEST["time"]) && $_REQUEST["time"] == "PM" ? "selected" : "PM" ?>>PM</option>
						<option value="AM-PM"  <?php echo isset($_REQUEST["time"]) && $_REQUEST["time"] == "AM-PM" ? "selected" : "AM-PM" ?>>AM-PM
						</option></select></span>
	
						 <span id="tab"><br>Additional Hours: <input type="text" class="form-control" OnChange="this.form.submit();" size="4" name="hours"value="<?php echo $_REQUEST['hours']; ?>"></span>
			
						<span id="tab"><br>Function Hall:<select name="hall" OnChange="this.form.submit();"  class="form-control">
						<option value="other" <?php echo isset($_REQUEST["hall"]) && $_REQUEST["hall"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<?php
						while($list = mysql_fetch_assoc($result0))
						{
						?>
						<option value="<?php echo $list['fldtype'];?>" <?php echo isset($_REQUEST["hall"]) && $_REQUEST["hall"] == "$list[fldtype]" ? "selected" : "$list[fldtype]" ?>><?php echo $list['fldtype'];?></option>
						<?php
						} 
						?>
						</select><?php echo $_REQUEST['hallErr']; ?></span>
		
						<span id="tab"><br>Number of persons:<font color='red'><?php echo $_REQUEST['caterErr']; ?></font><input type="text" class="form-control" name="person" value="<?php echo $_REQUEST['person']; ?>" onchange="this.form.submit();"></span>
			
						<br><span id="tab"><br>Occasion:<font color='red'><?php echo $_REQUEST['occassionErr']; ?></font>  <select class="form-control" name="occasion">
						<option value="other" <?php echo isset($_REQUEST["occasion"]) && $_REQUEST["occasion"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Birthday"  <?php echo isset($_REQUEST["occasion"]) && $_REQUEST["occasion"] == "Birthday" ? "selected" : "Birthday" ?>>Birthday</option>
						<option value="Baptismal"  <?php echo isset($_REQUEST["occasion"]) && $_REQUEST["occasion"] == "Baptismal" ? "selected" : "Baptismal" ?>>Baptismal</option>
						<option value="Wedding"  <?php echo isset($_REQUEST["occasion"]) && $_REQUEST["occasion"] == "Wedding" ? "selected" : "Wedding" ?>>Wedding</option>
						</select></span>
		
						<span id="tab"><br>Catering:<font color='red'><?php echo $_REQUEST['caterErr']; ?></font>  <select class="form-control" name="cater">
						<option value="other" <?php echo isset($_REQUEST["cater"]) && $_REQUEST["cater"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Yes"  <?php echo isset($_REQUEST["cater"]) && $_REQUEST["cater"] == "Yes" ? "selected" : "Yes" ?>>Yes</option>
						<option value="No"  <?php echo isset($_REQUEST["cater"]) && $_REQUEST["cater"] == "No" ? "selected" : "No" ?>>No
						</option></select></span>
			
						<br><br><span id="tab">Total: <input type="text" class="form-control" name="payment" READONLY value="<?php echo $total; ?>"></span>
			
						<input type="hidden" name="price" value="<?php echo $total; ?>"></span>
						<input type="hidden" name="hr" value="<?php echo $hours; ?>"></span>
						
			
						<input type="hidden" name="count" value="<?php echo $_REQUEST['count']; ?>">
						<input type="hidden" name="avail" value="<?php echo $free['fldavailable']; ?>"></span>
						<input type="hidden" name="price" value="<?php echo $count; ?>"></span>
					
					
	<br><br><br><br><br>
	<hr>
</td>
</tr>
<table class="room">
	<tr>
		<td>
		
		<?php
		
		if($_REQUEST['hall'] == "Alfonso Pavillion")
		{
			
		?>
		
		
		<img src="img2/hall2.png" alt="Note" style="height:200px;width:250px">
		
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Alfonso Pavilion Hall</font><br><br> -capacity(150-200 pax)</span>
				<span id="tab">Rent Price(5hrs) <br><br> Php 6000 </span>
				<span id="tab">Extend(per hr) <br><br> Php 500</span>
						
					
		<br> <br><br><br><?php
						if($_REQUEST['conf']==NULL)
						{
						?>
						
			
						<span style="margin-top: 100px;"><input type="submit" class="button2" value="Book Now" formmethod="post"></style></span>
					
						<?php
						}
						else if($_REQUEST['conf']==1)
						{
						?>	
						
	<div class="overlay1">
	
   	<label><font	color="white"><br><br> <br><br>   Are you sure you want to avail?</font></label><br><br>
   	
	<input type="submit"class="btn btn-default" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="functionhall.php"><button type="button" class="btn btn-default">NO</button></a></span>
	</div>
						<?php
						}
						?>
						<hr class="hr"><br><br> 
		
		<?php
		}
	
		if($_REQUEST['hall'] == "Kristina Function Hall")
		{
			
		?>
		<img src="img2/hall1.png" alt="Note" style="height:200px;width:250px">

		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Kristina Function Hall</font><br><br> -capacity(150-200 pax) <br><br> -aircondition  </span>
				<span id="tab">Rent Price(4hrs) <br><br> Php 12000<br><br><br></span>
				<span id="tab">Extend(per hr) <br><br> Php 1000 <br><br><br></span>
				
		
				
		<br> <br>
		
				<?php
						if($_REQUEST['conf']==NULL)
						{
						?>
						
			
						<span style="margin-top: 100px;"><input type="submit" class="button2" value="Book Now" formmethod="post"></style></span>
					
						<?php
						}
						else if($_REQUEST['conf']==1)
						{
						?>	
					<div class="overlay1">
	
   	<label><font	color="white"><br><br> <br><br>   Are you sure you want to avail?</font></label><br><br>
   	
	<input type="submit"class="btn btn-default" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="functionhall.php"><button type="button" class="btn btn-default">NO</button></a></span>
	</div>
						<?php
						}
						?>
						<hr class="hr"><br><br> 
		<?php
		}
		
		?>
		</td>
		<td>
		
		<?php
		
		if($_REQUEST['hall'] == NULL)
		{
			
		?>
		
		
		<img src="img2/hall2.png" alt="Note" style="height:200px;width:250px">
		
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Alfonso Pavilion Hall</font><br><br> -capacity(150-200 pax)</span>
				<span id="tab">Rent Price(5hrs) <br><br> Php 6000 </span>
				<span id="tab">Extend(per hr) <br><br> Php 500</span>
		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br> 
	
		<img src="img2/hall1.png" alt="Note" style="height:200px;width:250px">

		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Kristina Function Hall</font><br><br> -capacity(150-200 pax) <br><br> -aircondition  </span>
				<span id="tab">Rent Price(4hrs) <br><br> Php 12000<br><br><br></span>
				<span id="tab">Extend(per hr) <br><br> Php 1000 <br><br><br></span>
				
		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br> 
		<?php
		}
		?>
	</td>
	<tr>
	</table>
	</form>
    <button class="button2" onClick="location.href='gallery.php'"> <span>Go back</span></button>
    <br><br>
</font>
</div>
</div>
</div>
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
					<a href="#">admin</a>
				</li>
			</ul>
		</div>
	</div>


</body>

</html>
	