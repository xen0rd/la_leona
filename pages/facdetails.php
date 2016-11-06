<?php
session_start();

if (!isset($_GET['id'])){
	//header("location:gallery.php");
	$id=0;
}else{
	$id=$_GET['id'];
}
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
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
	<link rel="stylesheet" href="css/alertify.core.css">
    <link rel="stylesheet" href="css/alertify.default.css">
    <script src="js/alertify.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.datepicker-en.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
		 $.datepicker.setDefaults( $.datepicker.regional[ "en" ] );
		 $.datepicker.setDefaults({ dateFormat: 'mm/dd/yy'});
		    $("#txtFromDate").datepicker({
		        minDate: 3,
		        maxDate: "+365D",
		        numberOfMonths: 1,
		        onSelect: function(selected) {
		    	var date = $(this).datepicker('getDate');
		         if(date){
		            date.setDate(date.getDate());
		          }
		          $("#txtToDate").datepicker("option","minDate", date)
		          daysbetween();
		        }
		    });
		 
		    $("#txtToDate").datepicker({ 
		       minDate: 0,
		        maxDate:"+365D",
		        numberOfMonths: 1,
		        onSelect: function(selected) {
		           $("#txtFromDate").datepicker("option","maxDate", selected)
		           daysbetween();
		        }
		    });  
		 
		 $("#datepickerImage").click(function() { 
		    $("#txtFromDate").datepicker("show");
		  });
		 $("#datepickerImage1").click(function() { 
		    $("#txtToDate").datepicker("show");
		  });
		 
		 $('#btn_room_search_').click(function() {
		 		id = document.getElementById('facid').value;
		 		//alertify.error(id+" - ");
		 		
	 			type = document.getElementById('typefaci').value;
	 			usage = document.getElementById('typeuse').value;
	 			if(type=="none"){
	 				alertify.alert('Please Select Your Preferred Facility');
		  			return false;
		 		}else if(usage=="none"){
		 			alertify.alert('Please Select Your Preferred Stay');
			  		return false;
		 		}
			  	else if($('#txtFromDate').val()==""){
			  		alertify.alert('Please Enter Check-In Date');
			  		return false;
			 	}else if($('#txtToDate').val()==""){
			  		alertify.alert('Please Enter Check-Out Date');
			  		return false;
			  	}else if($('#reservation').val()==""){
			  		alertify.alert('Checking reservation...');
			  		return false;
			  	}else if($('#reservation').val()=="not"){
			  		alertify.alert('No available facilities for this reservation');
			  		return false;
			  	}else {
			  		return true;
			 	}
			});

			$('#btn_room_search_2').click(function() {
				//return false;
				var type = document.getElementById('typefaci').value;
	 			var usage = document.getElementById('typeuse').value;
		 		var addhrs = document.getElementById('txtAddHrs').value;
		 		var numpersons = document.getElementById('numpax').value;
		 		var occasion = document.getElementById('occasion').value;
		 		var cater = document.getElementById('cater').value;
		 		//alertify.error(type2+" - "+usage2);
		 		
		 		if(type=="none"){
		 			alertify.alert('Please Select Your Preferred Facility');
			  		return false;
		 		}else if(usage=="none"){
		 			alertify.alert('Please Select Your Preferred Stay');
			  		return false;
		 		}else if(numpersons==""){
		 			alertify.alert('Please Enter Number of Persons');
			  		return false;
		 		}else if(occasion=="none"){
		 			alertify.alert('Please Select Your Occasion');
			  		return false;
		 		}else if(cater=="none"){
		 			alertify.alert('Please Select If you Preferred a Catering');
			  		return false;
		 		}else if($('#txtFromDate').val()==""){
			  		alertify.alert('Please Enter Check-In Date');
			  		return false;
			  	}else if($('#txtTimeIn').val()==""){
			  		alertify.alert('Please Enter Time In');
			  		return false;
			  	}else if($('#txtTimeOut').val()==""){
			  		alertify.alert('Please Enter Time Out');
			  		return false;
			  	}else if($('#reservation').val()==""){
			  		alertify.alert('Checking reservation...');
			  		return false;
			  	}else if($('#reservation').val()=="not"){
			  		alertify.alert('No available facilities for this reservation');
			  		return false;
			  	}else {
			  		return true;
			 	}
			});
		});

		function chkrate(facid) {
			type = document.getElementById('typefaci').value;
			stay = document.getElementById('typeuse').value;	
			if(stay!="none" && type!="none"){
				$.ajax({
                    type: "POST",
                    url: "chkrate.php",
                    data: "id="+facid+"&name="+type+"&tagprice="+stay,
                    cache: false,
                    success: function(result){
                            //alertify.alert(result);
                            if(Number(facid)==3){
                            	var display = result.split("-");
                            	document.getElementById('xrate').value=display[0];
                            	document.getElementById('txtRate').value=display[0];
                            	document.getElementById('numhrs').value=display[1];
                            	document.getElementById('xpax').value=display[2];
                            	document.getElementById('xper').value=display[3];
                            	document.getElementById('numpax').placeholder="Max "+display[2];
								
                            }else if(Number(facid)==1){
                            	var display = result.split("-");
                            	document.getElementById('xrate').value=display[0];
                            	document.getElementById('txtRate').value=display[0];
                            	document.getElementById('bedx').value=display[1];
                            	document.getElementById('xpax').value=display[2];
                            	document.getElementById('xper').value=display[3];
                            	document.getElementById('numpax').placeholder="Max "+display[2];
								

                            }else{
                            	var display = result.split("-");
                            	document.getElementById('xrate').value=display[0];
                            	document.getElementById('txtRate').value=display[0];
                            	document.getElementById('xpax').value=display[2];
                            	document.getElementById('xper').value=display[3];
                            	document.getElementById('numpax').placeholder="Max "+display[2];
                            }
                            
                        }
                    });
			}else{
				document.getElementById('txtRate').value="";
				document.getElementById('xrate').value="";
			}
			//alertify.alert('change value');

		}

		function daysbetween() {
			var id = document.getElementById('facid').value;
			var type = document.getElementById('typefaci').value;
			var stay = document.getElementById('typeuse').value;	
			var date1 = document.getElementById('txtFromDate').value;
			if(id==3){
				var date2 = "";
				var tin = document.getElementById('txtTimeIn').value;
				var tout = document.getElementById('txtTimeOut').value;
			}else{
				var tin = "";
				var tout = "";
				var date2 = document.getElementById('txtToDate').value;
			}
			//var result = date2.value-date1.value;
			//alertify.alert("Number of days stay: "+date1);
			$.ajax({
                type: "POST",
                url: "chkAvailable.php",
                data: "id="+id+"&name="+type+"&stay="+stay+"&cin="+date1+"&cout="+date2+"&tin="+tin+"&tout="+tout,
                cache: false,
                success: function(result){
                	//alertify.alert(result);
                	if(result=="ok"){
                		document.getElementById('reservation').value = "ok";
                		document.getElementById('restat').value = "Available";
                		document.getElementById('add_booking').style.display = "inline-block";
                	}else{
                		document.getElementById('reservation').value = "not";
                		document.getElementById('restat').value = "No Available";
                	}
                }
            });
		}

		function timebetween(){
			var time1 = document.getElementById('time_in');
			var time2 = document.getElementById('time_out');
			var td = time2.value-time1.value;

			alertify.alert(td);
		}

		
		
		$(function(){
	$("#typefaci").change(function(){
		if($(this).val() == "Casa Leona 1"){
			$("#numpax").attr("max","3");
			$("#numpax").attr("min","0");
		}
		if($(this).val() == "Casa Leona 2"){
			$("#numpax").attr("max","6");
			$("#numpax").attr("min","0");
		}
		if($(this).val() == "La Leona Attic"){
			$("#numpax").attr("max","12");
			$("#numpax").attr("min","0");
		}
	});
		});
</script>
		


	<style>
		select {
			width: 25%;
			height: 27px;
			padding: 0 27px 0 16px;
			border: 1px solid #c9c9c9;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			-khtml-border-radius: 4px;
			border-radius: 4px;
			background: #fcfcfc;
			font-size: 13px;
			line-height: 27px;
			font-family: Arial;
		}

		.home_proc_sel{
			float: left;
			width: 180px;
			padding: 0 0 7px 0;
			}

		.home_proc_sel #txtRate input{
			width: 25px;
			height: 27px;
			padding: 0px 6px 0px 6px;
			border: 1px solid #c9c9c9;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			-khtml-border-radius: 4px;
			border-radius: 4px;
			background: #fcfcfc;
			font-size: 13px;
			line-height: 27px;
			font-family: Arial;
			    margin-right: 8px;
		}

		input:not([type=radio]),  textarea {
			 background: #ffffff;
			 border: 1px solid #ddd;
			 -moz-border-radius: 3px;
			 -webkit-border-radius: 3px;
			 border-radius: 3px;
			 outline: none;
			 padding: 3px;
			 width: 200px;
			 height: 18px;
		}

		select {
			 background: #ffffff;
			 border: 1px solid #ddd;
			 -moz-border-radius: 3px;
			 -webkit-border-radius: 3px;
			 border-radius: 3px;
			 outline: none;
			 padding: 3px;
			 width: 200px;
			 height: 24px;
		}

		input:focus {
			-moz-box-shadow:0px 0px 3px #aaa;
			-webkit-box-shadow:0px 0px 3px #aaa;
			box-shadow:0px 0px 3px #aaa;
			background-color:#FFFEEF;
		}

		p.submit {
			background:none;
			border:none;
			-moz-box-shadow:none;
			-webkit-box-shadow:none;
			box-shadow:none;
		}

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

		#txtFromDate, #txtToDate, #typefaci {
			background-image:url(images/month.png); 
			background-repeat: no-repeat; 
			background-position: 2px 3px;
			background-size: 16px;
			text-indent:17px;
		}

		#typefaci {
			background-image:url(images/bedroom.png);
			background-repeat: no-repeat; 
			background-position: 2px 3px;
			background-size: 16px;
			text-indent:17px;
		}

		#typeuse {
			background-image:url(images/daynight.png);
			background-repeat: no-repeat; 
			background-position: 2px 3px;
			background-size: 24px;
			text-indent:17px;
		}

		#txtRate {
			background-image:url(images/peso.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:17px;
		}

		#txtAddHrs, #txtTimeIn, #txtTimeOut {
			background-image:url(images/addhours.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:18px;
		}

		#txtPersons {
			background-image:url(images/persons.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:17px;
		}

		#occasion {
			background-image:url(images/occasion.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:17px;
		}

		#cater {
			background-image:url(images/catering.png);
			background-repeat: no-repeat; 
			background-position: 2px 2px;
			background-size: 18px;
			text-indent:17px;
		}
	</style>
</head>

<body>
	<div id="header">
		<div>
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="search.php">
				<input type="text" name="search" id="search" value="">
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
                <li class="selected">    
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
	<?php
		include "connect.php";
		$result = mysqli_query($con, "SELECT * FROM tblfacilities where id=$id");
		if(mysqli_num_rows($result)){
			while($row = mysqli_fetch_array($result))
			{
				$name = $row['name'];
				$des = $row['description'];
			}	
		}else{
			header("location:facility.php");
		}
	?>

	<div id="body" style="margin-top:-5px;">
		<div style="margin-left:160px;">
			<?php
	        	//echo $_SESSION['login_type'];
	        	if(isset($_SESSION['login_type'])){
	        		if($_SESSION['login_type']=="customer"){
        				echo "
            				<a style=\"margin-top:50px;margin-left:170px;font-size:16px;\">Welcome, [".$_SESSION['login_name']."]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
            			";
					}else if($_SESSION['login_type']=="FRONTDESK"){
						echo "
        				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [ FRONTDESK ]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
        			";
					}else{
						echo "
        				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\"></a><a style=\"text-decoration:none;font-size:16px\"></a>
        			";	
					}
	        	}else{
	        		echo "
	        				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\"></a><a style=\"text-decoration:none;font-size:16px;\"></a>
	        			";
	        	}
	        ?>
		</div>
	<div class="body" style="margin-top:-15px;">
		
		<table class="room">
			<tr>
				<th>
			 	</th>
			 		<td>
						<h2><font face="century gothic" color="#f3be4b" size="5"> <?php echo $name;?></font></h2>
			   			<span id="tab"><p style font-size="30" ><?php echo $des;?>

						<p>If you want more budget-friendly accommodation, why not try La Leona’s fan-cooled rooms? The resort has four nipa hut rooms and one duplex nipa hut. These may be low-priced rooms but will still provide you a relaxing stay at La Leona. </p></span>
						<span id="tab">
							<ul>
							<?php 
								$res = mysqli_query($con, "SELECT * FROM tblamenities where facid='$id'");
								if(mysqli_num_rows($res)){
									while($rowx = mysqli_fetch_array($res))
									{
										echo "<li><p>".$rowx['devname']."</p></li>";
									}	
								}else{
									
								}
							?>
							</ul>
						</span>
						<hr />
					</td>
			</tr>
		</table>
		<div class="home_proc_sel" style="padding:20px;margin-top:-20px;width:900px;">
			<h2>Your Preferences >>></h2>
			<?php 
				$mydate= date("Y/m/d");
				echo "Today is ". $mydate."<br /><br /><br />";
			?>
			<center>
				<?php
				$with_booking=0;
				if(isset($_SESSION['login_type'])){
					if($_SESSION['login_type']=="customer"){
						$email = $_SESSION['login_email'];
						
						$res = mysqli_query($con, "SELECT * FROM tblreserve_temp where email='$email' and date_='$mydate' order by trxnid");
							if(mysqli_num_rows($res)){
								$with_booking=1;
								echo "<span style=\"font-size:18px;\">Current Reservations</span>";
								echo "<table class=\"room\" border=\"1\"><tr>
										<th>Date</th>
										<th>Facility</th>
										<th>Check In</th>
										<th>Amount</th>
										<th>Action</th>
										</tr>";
								while($rowx = mysqli_fetch_array($res))
								{
									
								}
								echo "</table><br /> <br />";
							}						
					}
				}

				echo "<input type=\"hidden\" name=\"reservation\" id=\"reservation\" value=\"\">";
				if($id!=3){
					echo "<form id=\"formElem\" name=\"formElem\" action=\"booking-search.php\" method=\"post\">
					<input type=\"hidden\" name=\"facid\" id=\"facid\" value=\"".$id."\">
					<span> Please select &nbsp;";
					
					//echo $_SESSION['reserve'];
					if(isset($_SESSION['reserve'])){
						if($_SESSION['reserve']==1){
								echo "<select id=\"typefaci\" name=\"facility\" required onchange=\"chkrate('".$id."');\">
							<option value=\"none\" disabled selected> -please select- </option>";
							
							$res = mysqli_query($con, "SELECT * FROM tbltype where facid='$id' order by code");
							if(mysqli_num_rows($res)){
								while($rowx = mysqli_fetch_array($res))
								{
									if($rowx['name']==$_SESSION['faci']){
										echo "<option value=\"".$rowx['name']."\" selected>".$rowx['name']."</option>";	
									}else{
										echo "<option value=\"".$rowx['name']."\">".$rowx['name']."</option>";
									}
								}
							}
							
						echo "</select>
					</span>";
					if($id==1){
						echo "<span>&nbsp;Type of Stay:&nbsp;
							<select id=\"typeuse\" name=\"usage\" required onchange=\"chkrate('".$id."');\">
								<option value=\"none\" disabled selected> -please select- </option>";
								if($_SESSION['use']=="Day"){
									echo "<option value=\"Day\" selected>Day</option>
									<option value=\"Night\">Night</option>";
								}else{
									echo "<option value=\"Day\">Day</option>
									<option value=\"Night\" selected>Night</option>";
								}
								
							echo "</select>
						</span>";	
					}else{
						echo "<span>&nbsp;Type of Stay:&nbsp;
						<select id=\"typeuse\" name=\"usage\" required onchange=\"chkrate('".$id."');\">
							<option value=\"none\" disabled selected> -please select- </option>";
							if($_SESSION['use']=="Day"){
								echo "<option value=\"Day\" selected>Day</option>
							<option value=\"Night\">Night</option>
							<option value=\"DayAndNight\">DayAndNight</option>";
							}else if($_SESSION['use']=="Night"){
								echo "<option value=\"Day\">Day</option>
							<option value=\"Night\" selected>Night</option>
							<option value=\"DayAndNight\">DayAndNight</option>";
							}else{
								echo "<option value=\"Day\">Day</option>
							<option value=\"Night\">Night</option>
							<option value=\"DayAndNight\" selected>DayAndNight</option>";
							}
							
						echo "</select>
					</span>";
					}
					

					echo "<span>
						&nbsp;Rate: &nbsp;<input id=\"txtRate\" name=\"rate\" type=\"text\" disabled size=\"4\" value=\"".$_SESSION['rate']."\">&nbsp;
						<input type=\"hidden\" name=\"xrate\" id=\"xrate\" value=\"".$_SESSION['rate']."\">
					</span>
					<br /><br /><br />";

					if($id==1){
						    	echo "<strong>Extra bed (1 only):</strong>
						    	<input type=\"hidden\" name=\"bedx\" id=\"bedx\" value=\"".$_SESSION['bedx']."\">
						    <span class=\"tab\"><select name=\"xbed\" id=\"xbed\" style=\"width:108px\">";
						    if($_SESSION['bedx']=="Yes"){
						    	echo "<option value=\"\">None</option>";
						    	echo "<option value=\"Yes\" selected>Yes</option>";
						    }else{
						    	echo "<option value=\"\" selected>None</option>";
						    	echo "<option value=\"Yes\">Yes</option>";
						    }
						    echo "</select></span>";
						    }
					echo "<strong>&nbsp;Number of Excess Person(s):&nbsp;</strong>
						    	<input type=\"hidden\" name=\"xpax\" id=\"xpax\" value=\"".$_SESSION['xpax']."\">
						    <span class=\"tab\"><input type=\"number\" max=\"4\" name=\"numpax\" id=\"numpax\" style=\"width:108px\" required value=\"".$_SESSION['numpax']."\"></span>";
					echo "<strong>&nbsp;Per Head:&nbsp;</strong>
						    <span class=\"tab\"><input type=\"number\" readonly name=\"xper\" id=\"xper\" style=\"width:88px\" value=\"".$_SESSION['per']."\"></span><br /><br /><br />";

					echo "<span>
						    <strong>Check-in Date:</strong>
						    	<span class=\"tab\"><input id=\"txtFromDate\" name=\"check_in\" style=\"width:108px\" type=\"text\" readonly=\"readonly\" AUTOCOMPLETE=OFF onfocusout=\"daysbetween();\" value=\"".$_SESSION['cin']."\"/></span>
							<strong>Check-out Date:</strong>
						    	<span class=\"tab\"><input id=\"txtToDate\" name=\"check_out\" style=\"width:108px\" type=\"text\" readonly=\"readonly\" AUTOCOMPLETE=OFF onfocusout=\"daysbetween();\" value=\"".$_SESSION['cout']."\"/></span>
						   <br /><br /><br />Status:&nbsp;&nbsp;<input type=\"text\" style=\"width:88px\" readonly name=\"restat\" id=\"restat\">
						    	<br/><br/><br/>";
						    echo "<button id=\"btn_room_search_\" type=\"submit\">Next</button>";
						}
					}else{
								echo "<select id=\"typefaci\" name=\"facility\" required onchange=\"chkrate('".$id."');\">
								<option value=\"none\" disabled selected> -please select- </option>";
								$count=0;
								$res = mysqli_query($con, "SELECT * FROM tbltype where facid='$id' order by code");
								if(mysqli_num_rows($res)){
									while($rowx = mysqli_fetch_array($res))
									{
										echo "<option value=\"".$rowx['name']."\">".$rowx['name']."</option>";
										$count++;
									}
								}else{

								}
								
							echo "</select>
						</span>";
						if($id==1){
							echo "<span>&nbsp;Type of Stay:&nbsp;
								<select id=\"typeuse\" name=\"usage\" required onchange=\"chkrate('".$id."');\">
									<option value=\"none\" disabled selected> -please select- </option>
									<option value=\"Day\">Day</option>
									<option value=\"Night\">Night</option>
								</select>
							</span>";	
						}else{
							echo "<span>&nbsp;Type of Stay:&nbsp;
							<select id=\"typeuse\" name=\"usage\" required onchange=\"chkrate('".$id."');\">
								<option value=\"none\" disabled selected> -please select- </option>
								<option value=\"Day\">Day</option>
								<option value=\"Night\">Night</option>
							</select>
						</span>";
						}
						

						echo "<span>
							&nbsp;Rate: &nbsp;<input id=\"txtRate\" name=\"rate\" type=\"text\" disabled size=\"4\">&nbsp;
							<input type=\"hidden\" name=\"xrate\" id=\"xrate\">
						</span>
						<br /><br /><br />";

						if($id==1){
							    	echo "<strong>Extra bed (1 only):</strong>
							    	<input type=\"hidden\" name=\"bedx\" id=\"bedx\">
							    <span class=\"tab\"><select name=\"xbed\" id=\"xbed\" style=\"width:108px\"><option value=\"\">None</option><option value=\"Yes\">Yes</option></select></span>";
							    }
						echo "<strong>&nbsp;Number of Excess Person(s):&nbsp;</strong>
							    	<input type=\"hidden\" name=\"xpax\" id=\"xpax\">
							    <span class=\"tab\"><input type=\"number\" name=\"numpax\" id=\"numpax\" style=\"width:108px\" required></span>";
						if ($id==1)
						{
						echo "<strong>&nbsp;Rate of excess Head:&nbsp;</strong>
							    <span class=\"tab\"><input type=\"number\" readonly name=\"xper\" id=\"xper\" style=\"width:88px\"></span><br /><br /><br />";
						}
						elseif ($id==2)
						{
						echo "<strong>&nbsp;Rate per Head:&nbsp;</strong>
							    <span class=\"tab\"><input type=\"number\" readonly name=\"xper\" id=\"xper\" style=\"width:88px\"></span><br /><br /><br />";
						}
						echo "<span>
							    <strong>Check-in Date:</strong>
							    	<span class=\"tab\"><input id=\"txtFromDate\" name=\"check_in\" style=\"width:108px\" type=\"text\" readonly=\"readonly\" AUTOCOMPLETE=OFF onfocusout=\"daysbetween();\" /></span>
								<strong>Check-out Date:</strong>
							    	<span class=\"tab\"><input id=\"txtToDate\" name=\"check_out\" style=\"width:108px\" type=\"text\" readonly=\"readonly\" AUTOCOMPLETE=OFF onfocusout=\"daysbetween();\"/></span>
							    	<br /><br /><br />Status:&nbsp;&nbsp;<input type=\"text\" style=\"width:88px\" readonly name=\"restat\" id=\"restat\">
							    	<br/><br/><br/>";
							    /*$countx = $count - 1;
								echo "Count: ".$countx."<br />";
								for($i=0;$i<$countx;$i++){
									echo "<span style=\"display:none;\" id=\"book_".$i."\">Booking ".($i+1)."</span><br />";
								}
							    echo "<br /><a id=\"add_booking\" href=\"void:javascript();\" style=\"display:none;text-decoration:none;\" onclick=add_book();>Add Booking</a><br /><br />";*/
							    if($with_booking==1){

							    }
							    echo "<button id=\"btn_room_search_\" type=\"submit\">Next</button>";
						}
						
					echo "</span>";
				echo "</form>";
				}else{
					echo "<form id=\"formElem\" name=\"formElem\" action=\"booking-search.php\" method=\"post\">
					<input type=\"hidden\" name=\"facid\" id=\"facid\" value=\"".$id."\">
					<span> Please select &nbsp;";
					if(isset($_SESSION['reserve'])){
						if($_SESSION['reserve']==1){
							echo "<select id=\"typefaci\" name=\"facility\" required style=\"width:160px;\" onchange=\"chkrate('".$id."');\">
								<option value=\"none\" disabled selected> -please select-</option>";
								
								$res = mysqli_query($con, "SELECT * FROM tbltype where facid='$id' order by code");
								if(mysqli_num_rows($res)){
									while($rowx = mysqli_fetch_array($res))
									{
										if($rowx['name']==$_SESSION['faci']){
											echo "<option value=\"".$rowx['name']."\" selected>".$rowx['name']."</option>";		
										}else{
											echo "<option value=\"".$rowx['name']."\">".$rowx['name']."</option>";
										}
									}
								}else{

								}
								
							echo "</select>
						</span>
						<span>&nbsp;Type of Stay:&nbsp;
							<select id=\"typeuse\" name=\"usage\" required style=\"width:70px;\" onchange=\"chkrate('".$id."');\">
								<option value=\"none\" disabled selected> -please select- </option>";
								if($_SESSION['use']=="AM"){
									echo "<option value=\"AM\">AM</option>
											<option value=\"PM\">PM</option>
											<option value=\"AM-PM\">AM-PM</option>";	
								}else if($_SESSION['use']=="PM"){
									echo "<option value=\"AM\">AM</option>
											<option value=\"PM\">PM</option>
											<option value=\"AM-PM\">AM-PM</option>";
								}else{
									echo "<option value=\"AM\">AM</option>
											<option value=\"PM\">PM</option>
											<option value=\"AM-PM\">AM-PM</option>";
								}
								
							echo "</select>
						</span>
						<span>
							&nbsp;Rate: &nbsp;<input id=\"txtRate\" name=\"rate\" type=\"text\" disabled size=\"2\" style=\"width:70px;\" value=\"".$_SESSION['rate']."\">&nbsp;
							<input type=\"hidden\" name=\"xrate\" id=\"xrate\" value=\"".$_SESSION['rate']."\">
						</span>
						<span>
							&nbsp;Additional Hours: &nbsp;<input id=\"txtAddHrs\" name=\"addhrs\" readOnly type=\"text\" size=\"2\" style=\"width:70px;\" value=\"".$_SESSION['addhrs']."\">&nbsp;
						</span>
						<br /><br /><br />
						<span>
							&nbsp;Number of Persons: &nbsp;<input id=\"numpax\" name=\"numpax\" type=\"text\" size=\"2\" style=\"width:100px;\" value=\"".$_SESSION['numpax']."\">&nbsp;
						</span>";
						echo "<input type=\"hidden\" name=\"xpax\" id=\"xpax\" value=\"".$_SESSION['xpax']."\">";
						echo "<strong>&nbsp;Per Head:&nbsp;</strong>
							    <span class=\"tab\"><input type=\"number\" readonly name=\"xper\" id=\"xper\" style=\"width:88px\" value=\"".$_SESSION['per']."\"></span>";
						echo "<span>&nbsp;Occasion:&nbsp;
							<select id=\"occasion\" name=\"occasion\" required style=\"width:120px;\">
								<option value=\"none\"></option>";
								if($_SESSION['occasion']=="Birthday"){
									echo "<option value=\"Birthday\" selected>Birthday</option>
								<option value=\"Baptismal\">Baptismal</option>
								<option value=\"Wedding\">Wedding</option>";
								}else if($_SESSION['occasion']=="Baptismal"){
									echo "<option value=\"Birthday\">Birthday</option>
								<option value=\"Baptismal\" selected>Baptismal</option>
								<option value=\"Wedding\">Wedding</option>";
								}else{
									echo "<option value=\"Birthday\">Birthday</option>
								<option value=\"Baptismal\">Baptismal</option>
								<option value=\"Wedding\" selected>Wedding</option>";
								}
								
							echo "</select>
						</span>
						<span>&nbsp;Catering:&nbsp;
							<select id=\"cater\" name=\"cater\" required style=\"width:120px;\">
								<option value=\"none\"></option>";
								if($_SESSION['cater']=="Yes"){
									echo "<option value=\"Yes\" selected>Yes</option>
											<option value=\"No\">No</option>";	
								}else{
									echo "<option value=\"Yes\">Yes</option>
											<option value=\"No\" selected>No</option>";	
								}
								
							echo "</select>
						</span>
						<br /><br /><br />
						<span>
							<input type=\"hidden\" name=\"numhrs\" id=\"numhrs\" value=\"".$_SESSION['numhrs']."\">
							    <strong>Check-in Date:</strong> 
							    	<span class=\"tab\"><input id=\"txtFromDate\" name=\"check_in\" style=\"width:108px\" type=\"text\" readonly=\"readonly\" AUTOCOMPLETE=OFF onfocusout=\"daysbetween();\" value=\"".$_SESSION['cin']."\"/></span>";
								//<strong>Check-out Date:</strong>
							    	//<span class=\"tab\"><input id=\"txtToDate\" name=\"check_out\" style=\"width:108px\" type=\"text\" readonly=\"readonly\" AUTOCOMPLETE=OFF onchange=\"daysbetween();\"/></span>
								echo "<strong>Check-in Time:</strong>";
								echo "<span class=\"tab\"><input id=\"txtTimeIn\" name=\"time_in\" style=\"width:138px\" type=\"time\" onfocusout=\"daysbetween();\" /></span>";
								echo "<strong>Check-out Time:</strong>";
								echo "<span class=\"tab\"><input id=\"txtTimeOut\" name=\"time_out\" style=\"width:138px\" type=\"time\" onfocusout=\"daysbetween();\" /></span>";
								echo "<br /><br /><br />Status:&nbsp;&nbsp;<input type=\"text\" style=\"width:88px\" readonly name=\"restat\" id=\"restat\">";
							    echo "<br /><br /><br />
							    	<button id=\"btn_room_search_2\" type=\"submit\">Next</button>";
						}
				}else{
						echo "<select id=\"typefaci\" name=\"facility\" required style=\"width:160px;\" onchange=\"chkrate('".$id."');\">
							<option value=\"none\" disabled selected> -please select- </option>";
							
							$res = mysqli_query($con, "SELECT * FROM tbltype where facid='$id' order by code");
							if(mysqli_num_rows($res)){
								while($rowx = mysqli_fetch_array($res))
								{
								echo "<option value=\"".$rowx['name']."\">".$rowx['name']."</option>";
								}
							}else{

							}
							
						echo "</select>
					</span>
					<span>&nbsp;Type of Stay:&nbsp;
						<select id=\"typeuse\" name=\"usage\" required style=\"width:70px;\" onchange=\"chkrate('".$id."');\">
							<option value=\"none\" disabled selected> -please select- </option>
							<option value=\"AM\">AM</option>
							<option value=\"PM\">PM</option>
							<option value=\"AM-PM\">AM-PM</option>
						</select>
					</span>
					<span>
						&nbsp;Rate: &nbsp;<input id=\"txtRate\" name=\"rate\" type=\"text\" disabled size=\"2\" style=\"width:70px;\">&nbsp;
						<input type=\"hidden\" name=\"xrate\" id=\"xrate\">
					</span>
					<span>
						&nbsp;Additional Hours: &nbsp;<input id=\"txtAddHrs\" name=\"addhrs\" readOnly type=\"text\" size=\"2\" style=\"width:70px;\">&nbsp;
					</span>
					<br /><br /><br />
					<span>
						&nbsp;Number of Persons: &nbsp;<input id=\"numpax\" name=\"numpax\" type=\"text\" size=\"2\" style=\"width:100px;\">&nbsp;
					</span>";
					echo "<input type=\"hidden\" name=\"xpax\" id=\"xpax\">";
					echo "<strong>&nbsp;Per Head:&nbsp;</strong>
						    <span class=\"tab\"><input type=\"number\" readonly name=\"xper\" id=\"xper\" style=\"width:88px\"></span>";
					echo "<span>&nbsp;Occasion:&nbsp;
						<select id=\"occasion\" name=\"occasion\" required style=\"width:120px;\">
							<option value=\"none\"></option>
							<option value=\"Birthday\">Birthday</option>
							<option value=\"Baptismal\">Baptismal</option>
							<option value=\"Wedding\">Wedding</option>
						</select>
					</span>
					<span>&nbsp;Catering:&nbsp;
						<select id=\"cater\" name=\"cater\" required style=\"width:120px;\">
							<option value=\"none\"></option>
							<option value=\"Yes\">Yes</option>
							<option value=\"No\">No</option>
						</select>
					</span>
					<br /><br /><br />
					<span>
						<input type=\"hidden\" name=\"numhrs\" id=\"numhrs\">
						    <strong>Check-in Date:</strong> 
						    	<span class=\"tab\"><input id=\"txtFromDate\" name=\"check_in\" style=\"width:108px\" type=\"text\" readonly=\"readonly\" AUTOCOMPLETE=OFF onfocusout=\"daysbetween();\"/></span>";
							//<strong>Check-out Date:</strong>
						    	//<span class=\"tab\"><input id=\"txtToDate\" name=\"check_out\" style=\"width:108px\" type=\"text\" readonly=\"readonly\" AUTOCOMPLETE=OFF onchange=\"daysbetween();\"/></span>
							echo "<strong>Check-in Time:</strong>";
							echo "<span class=\"tab\"><input id=\"txtTimeIn\" name=\"time_in\" style=\"width:138px\" type=\"time\" onfocusout=\"daysbetween();\"/></span>";
							echo "<strong>Check-out Time:</strong>";
							echo "<span class=\"tab\"><input id=\"txtTimeOut\" name=\"time_out\" style=\"width:138px\" type=\"time\" onfocusout=\"daysbetween();\"/></span>";
							echo "<br /><br /><br />Status:&nbsp;&nbsp;<input type=\"text\" style=\"width:88px\" readonly name=\"restat\" id=\"restat\">";
						    echo "<br /><br /><br />
						    	<button id=\"btn_room_search_2\" type=\"submit\">Next</button>";
					}
						
					echo "</span>
				</form>";
				}
				?>
			</center>
			<br />
			<span>
				<!--button class="button2" type="submit"  name="confbut" value="Check Availability"> Next</button-->
			</span>
		<hr />
		</div>

		<div style="padding:20px;margin-top:-20px;width:96%;">
			<h2>Your Choice >>></h2>
			<hr />
			<table class="room">
				<?php
				$res = mysqli_query($con, "SELECT * FROM tbltype where facid='$id' order by code");
				if(mysqli_num_rows($res)){
					while($rowx = mysqli_fetch_array($res))
					{
						if($id==1){
							echo "<tr>
								<td>
									<img src=\"".$rowx['image']."\" alt=\"Note\" style=\"height:200px;width:250px\">
								</td>
								<td>
									<span id=\"tab\"><font face=\"century gothic\" color=\"#f3be4b\" size=\"5\">".$rowx['name']."</font><br><br>".$rowx['remarks']."</span>
								</td>
								<td>
									<span id=\"tab\">Day use <br><br> Php ".$rowx['price1']." </span>
								</td>
								<td>
									<span id=\"tab\">Overnight <br><br> Php ".$rowx['price2']."</span>
								</td>
								<tr><td colspan=\"4\"><hr /></td></tr>
							<tr>";	
						}else if($id==2){
							echo "<tr>
								<td>
									<img src=\"".$rowx['image']."\" alt=\"Note\" style=\"height:200px;width:250px\">
								</td>
								<td>
									<span id=\"tab\"><font face=\"century gothic\" color=\"#f3be4b\" size=\"5\">".$rowx['name']."</font><br><br>".$rowx['remarks']."</span>
								</td>
								<td>
									<span id=\"tab\">Day use <br><br> Php ".$rowx['price1']." </span>
								</td>
								<td>
									<span id=\"tab\">Overnight <br><br> Php ".$rowx['price2']."</span>
								</td>
								<td>
								</td>
								<tr><td colspan=\"5\"><hr /></td></tr>
							<tr>";
						}else{
							echo "<tr>
								<td>
									<img src=\"".$rowx['image']."\" alt=\"Note\" style=\"height:200px;width:250px\">
								</td>
								<td>
									<span id=\"tab\"><font face=\"century gothic\" color=\"#f3be4b\" size=\"5\">".$rowx['name']."</font><br><br>".$rowx['remarks']."</span>
								</td>
								<td>
									<span id=\"tab\">Rent Price<br><br> Php ".$rowx['price1']." </span>
								</td>
								<td>
									<span id=\"tab\">Extend/Hour <br><br> Php ".$rowx['price2']."</span>
								</td>
								<tr><td colspan=\"4\"><hr /></td></tr>
							<tr>";
						}
						
					}
				}else{

				}
				?>
			</table>
			<button class="button2" onClick="location.href='facility.php'"> <span>Go back</span></button>
		</div>
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