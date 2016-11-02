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
	<link rel="stylesheet" href="css/alertify.core.css">
    <link rel="stylesheet" href="css/alertify.default.css">
    <script type="text/javascript" src="js/alertify.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/responsiveslides.min.js"></script>

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

		 function validate_email(){
			var email = document.getElementById('xemail');
			var email2 = document.getElementById('xemail2');
			var pwd = document.getElementById('xpwd');
			var pwd2 = document.getElementById('xpwd2');

			if(email.value!=""){
				filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (filter.test(email.value)) {
					if(email2.value!=""){
						if (email.value==email2.value){
							//check availability
							$.ajax({
			                    type: "POST",
			                    url: "chkemail.php",
			                    data: "email="+email.value,
			                    cache: false,
			                    success: function(result){
			                            //alertify.alert(result);
			                            if(result=="ok"){
			                            	alertify.success('email is still available!');
			                            	if(pwd.value!="" && pwd2.value!="" && pwd.value.length >=8){
												if(pwd.value==pwd2.value){
													alertify.success('password is allowed!');
													return true;
												}else{
													alertify.error('Password mismatch!');
													pwd2.value="";
													pwd2.focus();
												}
											}else{
												if(pwd.value.length<8 && pwd.value.length>0){
													alertify.error('Minimum Length of Password is 8!');
													pwd.focus();
												}
											}
			                            }else{
			                            	alertify.error('email add already exist!');
			                            	email.value="";
			                            	email2.value="";
			                            	email.focus();
			                            }
			                        }
			                    });
						}else{
							alertify.error('Email mismatch!');
							email2.focus();
						}
					}
				}else{
					alertify.error('Invalid Email add!');
					email.value="";
					email.focus();
					return false;
				}
			}else{
				//email.focus();
			}
		 }

		 function cancel_r(trxnid,name){
			 var reason = prompt("WHY ARE YOU CANCELLING YOUR RESERVATION?");

		 	alertify.confirm('Are you sure you want to cancel this booking?', function (e) {
		 		if(e){
		 			$.ajax({
	                    type: "POST",
	                    url: "cancel-reserve.php",
	                    data: {'trxnid': trxnid, 'reason': reason},
	                    cache: false,
	                    success: function(result){
	                    	if(result=="success"){
	                    		window.location.href="reservations.php?name="+name;
	                    	}
	                    }
	                });
		 		}else{
		 			alertify.error('Reverting booking cancellation!');
		 		}
		 	});

		 }
	
		 
		  function view_r(trxnid){
		 	alertify.confirm('Are you sure you want to view details?', function (e) {
		 		if(e){
		 			window.location.href="receipt.upload.php?id="+trxnid;
		 		}else{
		 			alertify.error('Cancel viewing details!');
		 		}
		 	});
		 }
	</script>

	<style>
		button {
			border:none;
			outline:none;
			-moz-border-radius: 10px;
			-webkit-border-radius: 10px;
			border-radius: 10px;
			color: #ffffff;
			display: block;
			cursor:pointer;
			margin: 0px auto;
			clear:both;
			padding: 4px 15px;
			text-shadow: 0 1px 1px #777;
			font-weight:bold;
			font-family:"Century Gothic", Helvetica, sans-serif;
			font-size:18px;
			-moz-box-shadow:0px 0px 3px #aaa;
			-webkit-box-shadow:0px 0px 3px #aaa;
			box-shadow:0px 0px 3px #aaa;
			background:#4797ED;
		}

		button:hover {
			background:#d8d8d8;
			color:#666;
			text-shadow:1px 1px 1px #fff;
		}
	</style>
</head>

<body>
	<div id="header">
		<div>
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="search.php">
				<input type="text" name="search" id="search" value="" required autocomplete="off">
				<input type="submit" id="searchBtn" value="">
			</form>
		</div>
		<div class="navigation" style="margin-top:-7px;">
			<ul>
                <li>
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
	                    		}else if($_SESSION['login_type']=="admin"){

	                    		}else{
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
		                            <a href=\"bookingevent.php\">Booking</a>
		                        </li></ul>";
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
					                            <a href=\"payment.php\">Payments</a>
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
			<?php
				include "connect.php";
            	//echo $_SESSION['login_type'];
            	if(isset($_SESSION['login_type'])){
            		if($_SESSION['login_type']=="customer"){
            			if(isset($_GET['name'])){
            				if($_GET['name']==$_SESSION['login_email']){
            					$email=$_GET['name'];
            				}else{
            					echo "<script> window.location.href=\"reservations.php?name=".$_SESSION['login_email']."\";</script>";
            					$email="";
            				}

            			}else{
            				echo "<script> window.location.href=\"reservations.php?name=".$_SESSION['login_email']."\";</script>";
            				$email="";
            			}
            			$res_name = mysqli_query($con, "SELECT * FROM tblregister where fldemail='$email';");
						if(mysqli_num_rows($res_name)){
							while($rowx = mysqli_fetch_array($res_name)){
								$fullname = $rowx['fldlname'].", ".$rowx['fldfname']." ".$rowx['fldmname'].".";
								$email = $rowx['fldemail'];
							}
						}else{
							$fullname="";
						}
            			//$email = $_SESSION['login_email'];
            			echo "
            				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [".$_SESSION['login_name']."]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px;\"> Logout</a>
            			";
            		}else{
            			if(isset($_GET['name'])){
            				$email=$_GET['name'];
            			}else{
            				$email="";
            			}
            			$res_name = mysqli_query($con, "SELECT * FROM tblregister where fldemail='$email';");
						if(mysqli_num_rows($res_name)){
							while($rowx = mysqli_fetch_array($res_name)){
								$fullname = $rowx['fldlname'].", ".$rowx['fldfname']." ".$rowx['fldmname'].".";
								$email = $rowx['fldemail'];
							}
						}else{
							$fullname="";
						}
						if($_SESSION['login_type']=="admin"){
						}else{
							echo "<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [ FRONTDESK ]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
	        			";
						}

					}
            	}
            ?>
			<h1 style="padding:20px;">Booked Reservations for <?php echo $fullname;?></h1>
			<?php
			//echo $email;
			$date_ = date("m/d/Y");
			//echo $date_;
			echo "<div style=\"margin-top:0px;margin-left:20px;padding:0px;width:900px;\">";
			echo "<center><table class=\"room\" border=\"1\" cellpadding=\"5\" cellspacing=\"0\">";
			echo "<tr>
					<th><a style=\"text-decoration:none;\" href=\"reservations.php?name=".$email."&order=trxnid\">Booking No.</a></th>
					<th><a style=\"text-decoration:none;\" href=\"reservations.php?name=".$email."&order=facname\">Type</a></th>
					<th><a style=\"text-decoration:none;\" href=\"reservations.php?name=".$email."&order=email\">Guest Name</a></th>
					<th>Contact</th>
					<th><a style=\"text-decoration:none;\" href=\"reservations.php?name=".$email."&order=cin\">Checkin Date</a></th>
					<th>Checkout Date</th>
					<th><a style=\"text-decoration:none;\" href=\"reservations.php?name=".$email."&order=tin\">Time In</a></th>
					<th>Time Out</th>
					<th><a style=\"text-decoration:none;\" href=\"reservations.php?name=".$email."&order=status\">Status</a></th>
					<th>Cancel</th>
					<th>Upload Receipt Picture here </th>";
					//<th>Checkout</th>
					//<th>Update</th>
					//<th>Details</th>
					echo "
			</tr>";
			if(isset($_GET['order'])){
				$order = $_GET['order'];
				$result = mysqli_query($con, "SELECT * FROM tblreservations where email='$email' and cin>'$date_' order by $order;");
			}else{
				$result = mysqli_query($con, "SELECT * FROM tblreservations where email='$email' and cin>'$date_';");
			}
			if(mysqli_num_rows($result)){
				while($row = mysqli_fetch_array($result)){
					echo "<tr>
						<td>".$row['trxnid']."</td>
						<td>".$row['facname']."</td>";
						$res_reg = mysqli_query($con, "SELECT * FROM tblregister where fldemail='$email';");
						if(mysqli_num_rows($res_reg)){
							while($rowx = mysqli_fetch_array($res_reg)){
								$fullname=$rowx['fldlname'].", ".$rowx['fldfname']." ".$rowx['fldmname'];
								$contact = $rowx['fldcontact1'];
							}
						}
					echo "<td>".$fullname."</td>
						<td>".$contact."</td>
						<td>".$row['cin']."</td>
						<td>".$row['cout']."</td>
						<td>".$row['tin']."</td>
						<td>".$row['tout']."</td>";
						if($row['status']=="pending" or $row['status']=="pending-cd" or $row['status']=="reserved"){
							echo "<td style=\"background-color:yellow;\">".$row['status']."</td>";
							echo "<td><button style=\"font-size:13px;\" onclick=\"cancel_r('".$row['trxnid']."','".$email."');\">Cancel</button></td>";

							echo "<td><button style=\"font-size:10px;\" onclick=\"view_r('".$row['trxnid']."');\">Upload</button></td>";


							//echo "<td>&nbsp;</td>";
						}else{
							echo "<td style=\"background-color:lightblue;\">".$row['status']."</td>";
							echo "<td>&nbsp;</td>";
							
							//echo "<td><button style=\"font-size:13px;\">Checkout</button></td>";
						}

					//echo "<td><button style=\"font-size:13px;\">Update</button></td>
					//	<td><button style=\"font-size:13px;\">Details</button></td>
					echo "</tr>";
				}
				if($_SESSION['login_type']!="customer"){
					echo "<tr><td colspan=\"11\">";
					echo "<button><a href=\"reservation-add.php?name=".$email."\" style=\"text-decoration:none;\">Add Reservation</a></button></td></tr>";
				}
			}else{
				echo "<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>";
					//<th>Checkout</th>
					//<th>Update</th>
					//<th>Details</th>
					echo "</tr>";
				if($_SESSION['login_type']!="customer"){
					echo "<tr><td colspan=\"11\">";
					echo "<button><a href=\"reservation-add.php?name=".$email."\" style=\"text-decoration:none;\">Add Reservation</a></button></td></tr>";
				}
			}
			echo "</table></center>";
			echo "</div>";
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