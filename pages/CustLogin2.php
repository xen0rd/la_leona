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
				
				</li>
					<li>
					<a href="gallery.php">Facilities</a>
					<ul>
					<li>
					<a href="bookingevent.php">Amenities</a>
					</li>
				</li>
				</ul>
				<li>
					<a href="slidesshow.php" >Gallery</a> 
				<li>
					<a >Reservation</a>
					<ul>
					<li>
					<a href="registerx.php">Register</a>
					</li>
					<li>
					<a href="CustLogin2.php">Login</a>
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
			<label > <font face="century gothic" color="#f3be4b" size="4"> Customer Login </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>

		 <?php
include('customerlogin.php');
if(isset($_SESSION['login_user'])){
header("location: customer.php");
}
?>
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
					
				</ul>
			</div>
			<div class="tweets">
				<h3>recent tweets</h3>
				<ul>
					<li>
						<a href="https://www.twitter.com/@FIMejico">We’re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a>
					</li>
				</ul>
			</div>
			<div class="posts">
				<h3>News</h3>
				<ul>
					<li>
						<a href="https://www.laleonaresort.net/">La Leona Resort is now Online!</a>
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
						<a href="https://www.facebook.com/">facebook</a>
					</li>
					<li id="twitter">
						<a href="https://www.twitter.com/">twitter</a>
					</li>
					<li id="googleplus">
						<a href="https://www.plus.google.com/">googleplus</a>
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


</body>
</html>