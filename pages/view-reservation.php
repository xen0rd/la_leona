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

		 function reserve(){
		 	var facid = document.getElementById("hfacid").value;
		 	var faci = document.getElementById("hfaci").value;
		 	//alertify.alert("*");
		 	var use = document.getElementById("huse").value;
		 	var rate = document.getElementById("hrate").value;
		 	if(facid==1){
		 		var bedx = document.getElementById("hbedx").value;	
		 	}else{
		 		var bedx =0;
		 	}
		 	
		 	var numpax = document.getElementById("hnumpax").value;
		 	var xcs = document.getElementById("hxcs").value;
		 	var xcsamt = document.getElementById("hxcsamt").value;
		 	var per = document.getElementById("hper").value;
		 	var cin = document.getElementById("hcin").value;
		 	if(facid!=3){
		 		var cout = document.getElementById("hcout").value;
		 		var occa = "";
		 		var cater = "";	
		 		var tin = "";
			 	var tout = "";
			 	var totime = "";
			 	var addhrs = "";
			 	var addhrsamt = "";
		 	}else{
		 		var cout = "";
		 		var occa = document.getElementById("hocca").value;
		 		var cater = document.getElementById("hcater").value;
		 		var tin = document.getElementById("htin").value;
			 	var tout = document.getElementById("htout").value;
			 	var totime = document.getElementById("htotime").value;
			 	var addhrs = document.getElementById("haddhrs").value;
			 	var addhrsamt = document.getElementById("haddhrsamt").value;
		 	}
		 	var days = document.getElementById("hdays").value;
		 	var totamt = document.getElementById("htotamt").value;
		 	var mode = document.getElementById("mode");
		 	var status = "pending";
		 	var email = document.getElementById("hemail").value;
		 	if(mode.value==""){
		 		alertify.error("Mode should not be blank!");
		 		mode.focus();
		 		return false;
		 	}
		 	dataString="id="+facid+"&fac="+faci+"&use="+use+"&rate="+rate+"&bedx="+bedx+"&numpax="+numpax+"&xcs="+xcs+"&xcsamt="+xcsamt+"&per="+per+"&cin="+cin+"&cout="+cout+"&tin="+tin+"&tout="+tout+"&totime="+totime+"&addhrs="+addhrs+"&addhrsamt="+addhrsamt+"&days="+days+"&totamt="+totamt+"&mode="+mode.value+"&status="+status+"&email="+email+"&occa="+occa+"&cater="+cater;
		 	alertify.confirm('Are you sure you want to reserve this booking?', function (e) {
                if(e){
                	//alertify.alert(dataString);
                	$.ajax({
	                    type: "POST",
	                    url: "reserve.php",
	                    data: dataString,
	                    cache: false,
	                    success: function(result){
	                    	//alert(result);
	                    	if(result=="success"){
	                    		window.location.href="index.php";
	                    	}
	                    }
	                });

                }else{
                	alertify.error("Cancel booking!");
                	return false;
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
				if(isset($_GET['id']))
				{
					$trxnid=$_GET["id"];
					$resx = mysql_query("SELECT * FROM tblreservations where trxnid=$trxnid");
						if(mysql_num_rows($resx)){
							while($rowx = mysql_fetch_array($resx)){
								$facid = $rowx['facid'];
								$faci = $rowx['facname'];
								$use_d = $rowx['typeofuse'];
								$rate = $rowx['rate'];
								$cin = $rowx['cin'];
								$cout = $rowx['cout'];
								$bedx = $rowx['xbed'];
								$xbed = $bedx;
								if($bedx!=0){
									$xbedx = "Yes";
								}else{
									$xbedx = "None";
								}
								$numpax = $rowx['numpax'];
								$xcs = $rowx['xcs'];
								$xpax = $numpax + $xcs;
								$per = $rowx['per'];
								$addhrs = $rowx['addhrs'];
								$tout = $rowx['tout'];
								$tin = $rowx['tin'];
								$totime = $rowx['totime'];
								$numhrs = $totime-$addhrs;
								//echo $numhrs;
								$occasion = $rowx['occasion'];
								$cater = $rowx['cater'];
								$tin = $rowx['tin'];
								$diff=date_diff(date_create($cin),date_create($cout));
								$_SESSION['set_reservation']=$rowx['email'];
							}
						}
				}
            	//echo $_SESSION['login_type'];
            	if(isset($_SESSION['login_type'])){
            		if($_SESSION['login_type']=="customer"){
            			$fullname=$_SESSION['login_name'];
        				echo "
            				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [".$_SESSION['login_name']."]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
            			";
					}else{
						$email=$_SESSION['set_reservation'];
						$res_name = mysql_query("SELECT * FROM tblregister where fldemail='$email';");
						if(mysql_num_rows($res_name)){
							while($rowx = mysql_fetch_array($res_name)){
								$fullname = $rowx['fldlname'].", ".$rowx['fldfname']." ".$rowx['fldmname'].".";
								$email = $rowx['fldemail'];
							}
						}else{
							$fullname="";
						}
						echo "
        				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [ FRONTDESK ]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
        			";
					}
            	}
            ?>
			<h1 style="padding:20px;">Booking Reservation details for <?php echo $fullname;?></h1>
			<?php 
			echo "<div style=\"margin-top:-100px;margin-left:-80px;\">";
				if(isset($_GET["id"])){			
					echo "<p style=\"font-size:14px;padding:0px;margin-top:10px;\">You choose facility id: <span style=\"color:red;\">". $facid."</span></p><br />";
					echo "<input type=\"hidden\" name=\"hfacid\" id=\"hfacid\" value=\"".$facid."\">";
					echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">You choose facility: <span style=\"color:red;\">". $faci."</span></p><br />";
					echo "<input type=\"hidden\" name=\"hfaci\" id=\"hfaci\" value=\"".$faci."\">";
					echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">You choose type of use: <span style=\"color:red;\">". $use_d."</span></p><br />";
					echo "<input type=\"hidden\" name=\"huse\" id=\"huse\" value=\"".$use_d."\">";
					echo "<input type=\"hidden\" name=\"hrate\" id=\"hrate\" value=\"".$rate."\">";
					if($facid==3){
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">The rate is <span style=\"color:red;\">". $rate."</span> for ".number_format($numhrs)." hours</p><br />";
						echo "<input type=\"hidden\" name=\"hnumhrs\" id=\"hnumhrs\" value=\"".number_format($numhrs)."\">";
					}else{
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">The rate is <span style=\"color:red;\">". $rate."</span></p><br />";
					}

					if($facid==1){
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">Extra bed? <span style=\"color:red;\">". $xbedx." </span>Worth of <span style=\"color:red;\">".$bedx."</span></p><br />";
						echo "<input type=\"hidden\" name=\"hxbed\" id=\"hxbed\" value=\"".$xbedx."\">";
						echo "<input type=\"hidden\" name=\"hbedx\" id=\"hbedx\" value=\"".$bedx."\">";
					}
					if($numpax>$xpax){
						$xcs = $numpax-$xpax;
						$add_per = ($xcs)*$per;
					}else{
						$xcs = 0;
						$add_per= 0.00;
					}
					$xcs_amt = $xcs * $per;
					echo "<input type=\"hidden\" name=\"hxcsamt\" id=\"hxcsamt\" value=\"".$xcs_amt."\">";
					echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">The rate per person <span style=\"color:red;\">". $per." </span></p><br />";
					echo "<input type=\"hidden\" name=\"hper\" id=\"hper\" value=\"".$per."\">";
					echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">No. of Persons <span style=\"color:red;\">". $numpax." </span>Max(".$xpax.") Excess(<span style=\"color:red;\">".$xcs."</span>) Amount(<span style=\"color:red;\">".$xcs_amt."</span>)</p><br />";
					echo "<input type=\"hidden\" name=\"hnumpax\" id=\"hnumpax\" value=\"".$numpax."\">";
					echo "<input type=\"hidden\" name=\"hxcs\" id=\"hxcs\" value=\"".$xcs."\">";
					echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">Check in date is <span style=\"color:red;\">". $cin."</span></p><br />";
					echo "<input type=\"hidden\" name=\"hcin\" id=\"hcin\" value=\"".$cin."\">";
					if($facid==3){
						$days = 1;
						$totamt = $days * $rate+($rate/$numhrs)*$addhrs + $xbed + $add_per;
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">Time in is <span style=\"color:red;\">". $tin."</span> and Time out is <span style=\"color:red;\">".$tout."</span> Total time of <span style=\"color:red;\">".$totime."</span> hrs</p><br />";
						echo "<input type=\"hidden\" name=\"htin\" id=\"htin\" value=\"".$tin."\">";
						echo "<input type=\"hidden\" name=\"htout\" id=\"htout\" value=\"".$tout."\">";
						echo "<input type=\"hidden\" name=\"htotime\" id=\"htotime\" value=\"".$totime."\">";
						$addhrs_amt = ($rate/$numhrs)*$addhrs;
						echo "<input type=\"hidden\" name=\"haddhrsamt\" id=\"haddhrsamt\" value=\"".$addhrs_amt."\">";
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">Additional hours of <span style=\"color:red;\">". $addhrs." </span>hours Amount(<span style=\"color:red;\">".$addhrs_amt."</span>)</p><br />";
						echo "<input type=\"hidden\" name=\"haddhrs\" id=\"haddhrs\" value=\"".$addhrs."\">";
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">Event: <span style=\"color:red;\">". $occasion." </span> Catering service:<span style=\"color:red;\">".$cater."</span></p><br />";
						echo "<input type=\"hidden\" name=\"hocca\" id=\"hocca\" value=\"".$occasion."\">";
						echo "<input type=\"hidden\" name=\"hcater\" id=\"hcater\" value=\"".$cater."\">";

					}else{
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">Check out date is <span style=\"color:red;\">". $cout."</span></p><br />";
						echo "<input type=\"hidden\" name=\"hcout\" id=\"hcout\" value=\"".$cout."\">";
						$days = $diff->format("%a");
						if($days<1){
							$days=1;
						}
						$totamt = $days * $rate + $xbed + $add_per;
					}
						echo "<input type=\"hidden\" name=\"hdays\" id=\"hdays\" value=\"".$days."\">";
					if ($days>1) {
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">The total number of days is <span style=\"color:red;\">" . $days . " days </span></p><br />";
					}else{
						echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">The total number of day is <span style=\"color:red;\">" . $days . " day </span></p><br />";
					}
					echo "<p style=\"font-size:14px;padding:0px;margin-top:-12px;\">The total amount is Php<span style=\"color:red;\"><b> " . number_format($totamt,2)." </b></span></p><br />" ;
					echo "<input type=\"hidden\" name=\"htotamt\" id=\"htotamt\" value=\"".number_format($totamt,2)."\">";					

					//echo "<div style=\"margin-left:-400px;margin-top:40px;\">";
					//echo "<button style=\"height:30px;width:100px;margin-left:360px;\"><a href=\"void:javascript();\" onclick=\"window.history.back();\" style=\"text-decoration:none;font-size:12px;margin-top:-8px;color:white;\">Modify this</a></button>";
					//	</div>";
				}else{
					echo "<script> window.location.href=\"facility.php\";</script>";
				}
				echo "
					</div>
					<div style=\"float:right;margin-top:-80px;\">";
						$res = mysql_query("SELECT * FROM tbltype where facid='$facid' and name='$faci'");
						if(mysql_num_rows($res)){
							while($rowx = mysql_fetch_array($res))
							{
								echo "<img src=\"".$rowx['image']."\" alt=\"".$faci."\" style=\"height:240px;width:360px\">";
							}
						}
				echo "</div>";

			?>
			

			<?php
				if(isset($_SESSION['login_type'])){
					if(($_SESSION['login_type'])=="customer"){
						echo "<input type=\"hidden\" name=\"hemail\" id=\"hemail\" value=\"".$_SESSION['login_email']."\">";
						echo "
							<div style=\"margin-left:auto 0;margin-top:0px;;width:900px;padding-top:30px;\">
							<button style=\"height:30px;\"><a href=\"reservations-list.php\" onclick=\"\" style=\"text-decoration:none;font-size:20px;margin-top:-8px;color:white;\">Back</a></button>
						</div>
						";	
					}else{
						if($_SESSION['set_reservation']!=""){
							echo "<input type=\"hidden\" name=\"hemail\" id=\"hemail\" value=\"".$_SESSION['set_reservation']."\">";
							echo "
							<div style=\"margin-left:auto 0;margin-top:0px;;width:900px;padding-top:30px;\">
								<button style=\"height:30px;\"><a href=\"reservations-list.php\" style=\"text-decoration:none;font-size:20px;margin-top:-8px;color:white;\">Back</a></button>
							</div>
							";
						}
					}
				}else{
					echo "
						<div style=\"margin-left:0px;margin-top:0px;width:900px;\">
							<button style=\"height:30px;\"><a href=\"customer.php?id=".$facid."\" style=\"text-decoration:none;font-size:20px;margin-top:-8px;color:white;\">Login & Continue</a></button>
						</div>
						";
				}

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