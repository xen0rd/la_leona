<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<link rel="stylesheet" href="css/alertify.core.css">
    <link rel="stylesheet" href="css/alertify.default.css">
    <script src="js/alertify.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>

	<script>
		function delfacility(item){
			alertify.confirm('Are you sure you want to delete this # ['+ item +'] facility?', function (e) {
                if(e){
                    $.ajax({
                    type: "POST",
                    url: "del-facility.php",
                    data: "id="+item,
                    cache: false,
                    success: function(result){
                    		//alertify.alert(result);
                            if(result=="success"){
                                alertify.alert("Record deleted successfully!");
                                window.location.href="facility-maintenance.php";
                            }else{
                                window.location.href="facility-maintenance.php";
                            }
                        }
                    });
                }else{
                    alertify.error('Abort deleting item...');
                }
                    return false;
                });
		}
	</script>
</head>

<body>
	<div id="header">
		<div>
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="search.php">
				<input type="text" name="search" id="search" value="">
				<input type="submit" name="searchBtn" id="searchBtn" value="">
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
					                            <a href=\"logout.php\">Logout</a>
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
		<div class="header">
			<ul>
				<li>
					<div></div>
				</li>
				<li>
					<label ><font face="century gothic" color="#f3be4b" size="4">Facilities Details - Maintenance </label></font>
				</li>
			</ul>
			<div style="padding-left:20px;padding-bottom:10px;">
				<label ><font face="century gothic" color="#f3be4b" size="4"><a href="facility.php" style="text-decoration:none;">Back</a></label></font>
			</div>
		</div>

	<div id="body" style="margin-top:-5px;">
	<div class="body" style="height:900px;">
 
		<table class="room">
			<tr height="50px;">
				<th colspan="2"></th>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Image</th>
				<th></th>
			</tr>
			<?php
				include "connect.php";
				$result = mysqli_query($con,"SELECT * FROM tblfacilities;");
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr>
								<td>&nbsp;</td>
								<td width=\"30px;\"><a style=\"text-decoration:none;\" href=\"void:javascript();\" onclick=\"delfacility('".$row['id']."');\"><img src=\"images/del-proj.png\" width=\"20px\" /></a></td>
								<td width=\"30px;\"><a style=\"text-decoration:none;\" href=\"facility-edit.php?id=".$row['id']."\">".$row['id']."</a></td>
								<td width=\"100px;\"><a style=\"text-decoration:none;\" href=\"type-maintenance.php?id=".$row['id']."\">".$row['name']."</td>
								<td>".$row['description']."</td>
								<td><img src=\"".$row['image']."\" width=\"160px;\" title=\"".$row['image']."\"></td>
								<td></td>
							</tr>";
					}	
				}
			?>
			<tr><td colspan="6"><hr /></td></tr>
			<tr align="center"><td colspan="6">*** N O T H I N G   F O L L O W S ***</td></tr>
			<tr><td colspan="6"><hr /></td></tr>
			<tr align="center"><td colspan="6"><a style="text-decoration:none;" href="facility-new.php"><button class="button" style="height:30px;padding:0;margin:auto 0;">Insert New</button></td></tr>
		</table>
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