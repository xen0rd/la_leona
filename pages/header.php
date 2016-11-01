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
			<li class="selected">
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
											<a href=\"inventory.php\">Inventory</a>
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