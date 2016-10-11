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
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<link rel="stylesheet" href="css/alertify.core.css">
    <link rel="stylesheet" href="css/alertify.default.css">
    <script src="js/alertify.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script>
		function del_pix(item){
			alertify.confirm('Are you sure you want to delete this # ['+ item +'] image in the gallery?', function (e) {
                if(e){
                    $.ajax({
                    type: "POST",
                    url: "del-pix.php",
                    data: "id="+item,
                    cache: false,
                    success: function(result){
                    		//alertify.alert(result);
                            if(result=="success"){
                                alertify.alert("Record deleted successfully!");
                                window.location.href="gallery-maintenance.php";
                            }else{
                                window.location.href="gallery-maintenance.php";
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
				<input type="text" name="search" id="search" value="" required>
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
                    <ul>
                        <li>
                            <a href="registerx.php">Register</a>
                        </li>
                        <li>
                            <a href="CustLogin2.php">Login</a>
                        </li>
                        <li>
                            <a href="bookingevent.php">Booking</a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="admin.php">Admin</a>
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
		</div>
	</div>
	<div id="body" style="margin-top:-4px;">
		<div class="header">
			<ul>
				<li>
					<div></div>
				</li>
				<li>
					<label ><font face="century gothic" color="#f3be4b" size="4">Gallery - Maintenance </label></font>
				</li>
			</ul>
			<div style="padding-left:20px;padding-bottom:10px;display:inline-block;">
				<label ><font face="century gothic" color="#f3be4b" size="4"><a href="slideshow.php" style="text-decoration:none;"><< Back </a></label></font>
			</div>
		</div>

	<div id="body" style="margin-top:-5px;">
	<div class="body_" style="">
 
		<!--table class="room" style="text-align:center;"-->
			<?php
			//echo "<tr>";
				include "connect.php";
				$result = mysql_query("SELECT * FROM tblgallery;");
				if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result))
					{	
						echo "<div style=\"display:inline-block;float:left;padding:5px;\"><span style=\"margin:-10px;\"><a style=\"text-decoration:none;\" href=\"void:javascript();\" onclick=\"del_pix('".$row['id']."')\">x</a></span><a style=\"text-decoration:none;\" href=\"gallery-edit.php?id=".$row['id']."\"><img src=\"".$row['fname']."\" width=\"140px;\" height=\"80px;\" style=\"display:inline-block;float:left;\">";
						if($row['description']==""){
							if(strlen($row['fname'])>25){
								echo "<p>".substr($row['fname'],0,20)."...</p>";	
							}else{
								echo "<p>".$row['fname']."</p>";	
							}
						}else{
							echo "<p>".$row['description']."</p>";
						}
						
						echo "</a></div>";
					}	
				}
				//echo "</tr>";
				echo "<div style=\"display:inline-block;float:left;padding:5px;\"><div style=\"width:140px;height:40px;text-align:center;\"><a style=\"text-decoration:none\" href=\"gallery-new.php\"><button>+Insert new image</button></a></div></div>";
			?>
		<!--/table-->
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