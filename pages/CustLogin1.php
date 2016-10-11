<?php
ob_start();
?>
<html>
<head>

	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie.css">
	<![endif]-->
</head>
<body>
	<div id="header">
		<div>
			<a href="index.html" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="index.html">
				<input type="text" name="search" id="search" value="">
				<input type="submit" name="searchBtn" id="searchBtn" value="">
			</form>
		</div>
		<div class="navigation">
			<ul>
				<li class="selected">
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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Customer Login </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>

		 <?php
include('customerlogin.php');
if(isset($_SESSION['login_user']))
{
	header("location:register3.php?reg=$_REQUEST[reg]&hall=$_REQUEST[hall]&term=$_REQUEST[term]&payment=$_REQUEST[payment]&hours=$_REQUEST[hours]&cater=$_REQUEST[cater]&person=$_REQUEST[person]&time=$_REQUEST[time]&term=$_REQUEST[term]&pay=$_REQUEST[pay]&username=$_REQUEST[username]&password=$_REQUEST[password]&checkin=$_REQUEST[checkin]");
}


		$checkin = $_REQUEST['checkin'];
	$time = $_REQUEST['time'];
	$hours = $_REQUEST['hours'];
	$hall = $_REQUEST['hall'];
	$person = $_REQUEST['person'];
	$cater = $_REQUEST['cater'];
	$payment = $_REQUEST['payment'];
	$reg= $_REQUEST['reg'];

	

	?>
	<div id="body">
		<div class="content">
			<div class="section">
			
						<table border="1">
							<td  height="530px" width="280px" style="border-style:dotted solid; border-width: 4px; margin-top: 100px; margin-left: 639px; position: absolute;"> 
							<font color=crimson> <h3>Accomodation Preferences </h3></font>
						
												<input class="form-control" type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">

					
						<font size="4">Checkin: <?php echo $checkin; ?><input type="hidden" type="date" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>"><br>
						Time:  <?php echo $time; ?><input name="time" type="hidden" value="<?php echo $_REQUEST['time']; ?>"><br>
						<input class="form-control" type="hidden" name="hours" value="<?php echo $_REQUEST['hours']; ?>">
						<?php 
						if ($_REQUEST['hours'] != NULL)
						{
							?>
							Additional Hour(s): <?php echo $hours; ?><br>
							<?php
						}
						if($_REQUEST['hours'] == NULL)
						{	
							?>
							Additional Hour(s): <?php echo "None";  ?><br>
							<?php
						}
						?>
						
						Number of Persons:  <?php echo $person; ?><input type="hidden" name="person" value="<?php echo $_REQUEST['person']; ?>"><br>
						Catering:<?php echo $cater; ?> <input type="hidden" name="cater" value="<?php echo $_REQUEST['cater']; ?>"><br>
	
						
						<?php
						$tot = $_REQUEST['payment'] * 0.12;
						$tots = $_REQUEST['payment'] - $tot;
						?>
						<br>Vatable Sales: Php <?php echo $tots; ?><input type="hidden" name="tots" value="<?php echo $_REQUEST['tots']; ?>"><br>
						VAT (12%): Php <?php echo $tot; ?><input type="hidden" name="tot" value="<?php echo $_REQUEST['tot']; ?>"><br>
						
						
						Total: Php <?php echo $payment; ?><input type="hidden" name="payment" value="<?php echo $_REQUEST['payment']; ?>"><Br>
	
	
						<font color=blue> <h3>Function Hall</h3></font>

						<?php echo $hall; ?><input  type="hidden" name="hall" value="<?php echo $_REQUEST['hall']; ?>"><br>
							</td>
							
							
							</table>
<div id="body">
		<div class="content">
			<div class="section">
				<div class="booking">
					
					<form method="post" action="">
						<h4>Log In</h4>
						<div class="form1">
							<div>
		    
        <div class="card card-container">
            
          
            



 
<input id="name" name="username" placeholder="Username" type="text" autofocus> </input><br>

<input id="password" name="password" placeholder="Password" type="password"> <br>
<input name="submit"  type="submit" id="login-button" value=" Submit ">
<span><?php echo $error; ?></span>

	

                <span><?php echo $error; ?></span>


						
							</div>
						</div>
						<div class="form2">
							<div>
							</div>
						</div>
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
					<a href="booking.html">admin</a>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>