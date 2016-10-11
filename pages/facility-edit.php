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

		function validate(){
			var filevalue=document.getElementById("txtname").value;
			var description=document.getElementById("txtdes").value;
			//alertify.alert(document.getElementById("file").value);
			var file = document.getElementById("file").value;
			if(filevalue=="" || filevalue.length<1){
				document.getElementById("txtname").focus();
				alertify.alert("Name must not be blank.");
				return false;
			}
			if(description=="" || description.length<1){
				document.getElementById("txtdes").focus();
				alertify.alert("File Description must not be blank.");
				return false;
			}
 			if(file=="" || filevalue.length<1){
				document.getElementById("file").focus();
				alertify.alert("Select File.");
				return false;
			}

			var fd = new FormData(document.getElementById("formfile"));
            fd.append("txtname", filevalue);
            fd.append("txtdes", description);
            $.ajax({
            	url: "file_upload.php",
            	type: "POST",
            	data: fd,
            	processData: false,  // tell jQuery not to process the data
            	contentType: false,   // tell jQuery not to set contentType
            	enctype: 'multipart/form-data',
            	success: function(result){
            		alertify.alert(result);
                    if(result=="success"){
                        alertify.alert("Record deleted successfully!");
                        //window.location.href="facility-maintenance.php";
                        return true;
                    }else{
                    	alertify.error('Error in uploading...')
                        //window.location.href="facility-maintenance.php";
                        return false;
                    }
                }

            })
			
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
		<div class="header">
			<ul>
				<li>
					<div></div>
				</li>
				<li>
					<label ><font face="century gothic" color="#f3be4b" size="4">Facilities Details - Adding New </label></font>
				</li>
			</ul>
			<div style="padding-left:20px;padding-bottom:10px;">
				<label ><font face="century gothic" color="#f3be4b" size="4"><a href="facility-maintenance.php" style="text-decoration:none;"><< Back </a></label></font>
			</div>
		</div>

	<div id="body" style="margin-top:-5px;">
	<div class="body" style="height:900px;">
		<?php 
			if(isset($_GET['id'])){
				$id = $_GET['id'];
			}else{
				$id = 0;
			}

			include "connect.php";

			$result = mysql_query("SELECT * FROM tblfacilities where id=$id;");
				if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result))
					{
						$name = $row['name'];
						$des = $row['description'];
						$imagepath = $row['image'];
					}	
				}else{
					$name = "";
					$des = "";
					$imagepath = "";
					header("Refresh:0; url=facility-maintenance.php");
				}
		?>
 		<form method="POST" action="file_upload_edit.php" enctype="multipart/form-data">
			<table class="room">
				<tr>
					<?php echo "<input type=\"hidden\" name=\"facid\" value=\"".$id."\">" ?>
					<?php echo "<input type=\"hidden\" name=\"imagepath\" value=\"".$imagepath."\">" ?>
					<td align="right" style="padding:10px;width:150px;">Name:</td>
					<td align="left" style="padding:10px;"><input id="txtname" name="txtname" type="text" style="width:600px;" required value="<?php echo $name; ?>"></td>
				</tr>
					<td align="right" style="padding:10px;">Description:</td>
					<td align="left" style="padding:10px;"><textarea id="txtdes" name="txtdes" style="height:100px;width:600px;resize:none;" required><?php echo $des; ?></textarea></td>
				<tr>
				</tr>
					<td align="right" style="padding:10px;">Current image:</td>
					<td align="left" style="padding:10px;"><img src="<?php echo $imagepath; ?>" width="400px;" title="<?php echo $imagepath; ?>"></td>
				</tr>
				</tr>
					<td align="right" style="padding:10px;"></td>
					<td align="left" style="padding:10px;"><input type="file" id="file" name="file" style="width:200px;" required></td>
				</tr>	
				<tr>
					<td align="right" style="padding:10px;"></td>
					<td align="left" style="padding:10px;"><button id="btn">Submit</button></td>
				</tr>
			</table>

		</form>
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