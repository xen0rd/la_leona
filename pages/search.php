<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<link rel="stylesheet" href="css/responsiveslides.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/responsiveslides.min.js"></script>

	<script>
		/*$('.bxslider').bxSlider({
			mode: 'fade',
			captions: true
		});*/
		
		 $(function () {

		      // Slideshow 1
		      $(".rslides1").responsiveSlides({
		      	auto: false,
		      	pager: false,
		      	nav: true,
		        speed: 1000,
		        maxwidth: 900
		      });

		      // Slideshow 2
		      $(".rslides2").responsiveSlides({
		        auto: true,
		        pager: false,
		        speed: 500,
		        maxwidth: 720
		      });

		    });
	</script>
</head>

<body>
	<div id="header">
		<div>
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="search.php">
				<input type="text" name="search" id="search" value="" required>
				<input type="submit" id="searchBtn" value="">
			</form>
		</div>
		<div class="navigation" style="margin-top:-7px;">
			<ul>
                <li class="selected">
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="facility.php">Facilities</a>
                </li>
                <li>
                    <a href="slideshow.php" >Gallery</a>
                </li>
                <li>    
                    <a>Reservation</a>
                        <?php 
                        if(isset($_SESSION['reserve'])){
							$_SESSION['reserve']=0;
						}else{
							$_SESSION['reserve']=0;
						}
                    	//echo $_SESSION['login_type'];
                    	if(isset($_SESSION['login_type'])){
                    		if($_SESSION['login_type']=="customer"){
                    			echo "<ul>
					                        <li>
					                            <a href=\"reservations.php?name=".$_SESSION['login_user']."\">View Reservations</a>
					                        </li>
					                        <li>
					                            
					                        </li>
					                  </ul>";
	                    		}else if($_SESSION['login_type']=="FRONTDESK"){
	                    			echo "<ul>
	                    					<li>
					                            <a href=\"registerx.php\">Register New Clients</a>
					                        </li>
	                    					<li>
					                            <a href=\"customers-list.php\">Registered Clients</a>
					                        </li>
					                        <li>
					                            <a href=\"reservations-list.php\">View Reservations</a>
					                        </li>
					                        <li>
					                            
					                        </li>
					                  </ul>";
	                    		}
	                    	}else{
	                    		echo "<ul>
		                    		<li>
			                            <a href=\"registerx.php\">Register</a>
			                        </li>
			                        <li>
			                            <a href=\"customer.php\">Login</a>
			                        </li>
			                        <li>
			                            <a href=\"fdesk.php\">Front Desk</a>
			                        </li>
		                        </ul>";
	                    	}
	                    ?>
                </li>
                <li >
                    <a href="admin.php">Admin</a>
                    <?php 
                    	//echo $_SESSION['login_type'];
                    	if(isset($_SESSION['login_type'])){
                    		if($_SESSION['login_type']=="admin"){
                    			echo "<ul>
					                        <li>
					                            <a href=\"customers-list.php\">Registered Customers</a>
					                        </li>
					                        <li>
					                            <a href=\"reservations-list.php\">Reservations</a>
					                        </li>
					                        <li>
					                            <a href=\"payments-list.php\">Payments</a>
					                        </li>
					                        <li>
					                            <a href=\"logout.php\">Logout</a>
					                        </li>
					                  </ul>";
                    		}
                    	}
                    ?>
                </li>
            </ul>
		</div>
	</div>
	<div id="body" style="margin-top:-4px;">
		<div class="body" style="align:center;height:790px;">
			<h1 style="padding:20px;">Search</h1>

			<?php 
				include "connect.php";
				if(isset($_GET['search'])){
					$strsearch = $_GET['search'];
					echo "<div style=\"margin-left:80px;margin-top:-100px;width:700px;\"><span><h2>for \"$strsearch\"</h2></span><ol>";
					$strsql = "SELECT * FROM tblfacilities where name like '%$strsearch%' OR description like '%$strsearch%'";
					//echo $strsql;
					$resultx = mysql_query($strsql);
					if(mysql_num_rows($resultx)){
						while($row = mysql_fetch_array($resultx)){
							echo "<li><span><a style=\"width:800px;\" href=\"facdetails.php?id=".$row['id']."\">".$row['name']."-".$row['description']."</a></span></li><br />";
						}
						if(isset($_SESSION['login_type'])){
							if($_SESSION['login_type']=="FRONTDESK" OR $_SESSION['login_type']=="ADMIN"){
								if(isset($_GET['search'])){
									$strsearch = $_GET['search'];
									//echo "<ol>";
									$strsql = "SELECT * FROM tblreservations where facname like '%$strsearch%' OR email like '%$strsearch%'";
									//echo $strsql;
									$resultx = mysql_query($strsql);
									if(mysql_num_rows($resultx)){
										while($row = mysql_fetch_array($resultx)){
											echo "<li><span><a style=\"width:800px;\" href=\"reservations-list.php\">".$row['email']."-".$row['facname']."</a></span></li><br />";
										}
									}else{
										echo "<div><ol>No records found...";
									}
										
								}	
							}else{
								echo "<div><ol>No records found...";							
							}
						}
					}else{
						//echo "<div style=\"margin-left:80px;margin-top:-100px;width:700px;\"><ol>No records found...";
						if(isset($_SESSION['login_type'])){
							if($_SESSION['login_type']=="FRONTDESK" OR $_SESSION['login_type']=="ADMIN"){
								if(isset($_GET['search'])){
									$strsearch = $_GET['search'];
									echo "<ol>";
									$strsql = "SELECT * FROM tblreservations where facname like '%$strsearch%' OR email like '%$strsearch%'";
									//echo $strsql;
									$resultx = mysql_query($strsql);
									if(mysql_num_rows($resultx)){
										while($row = mysql_fetch_array($resultx)){
											echo "<li><span><a style=\"width:800px;\" href=\"reservations-list.php\">".$row['email']."-".$row['facname']."</a></span></li><br />";
										}
									}else{
										echo "<div><ol>No records found...";
									}
										
								}	
							}else{
								echo "<div style=\"margin-left:80px;margin-top:-100px;width:700px;\"><span><h2>for \"$strsearch\"</h2></span><ol>No records found...";															
							}	
						}
					}
						
				}
				echo "</ol></div>";
			?>
		</div>
	</div>

	<div id="footer" style="margin-top:-20px;">
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
						<!--a href="https://www.twitter.com/@FIMejico">We’re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a-->
						<a class="twitter-timeline" href="https://twitter.com/salemcoe" data-widget-id="731417495416905732">Tweets by @salemcoe</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
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