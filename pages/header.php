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
		                            <a href=\"logout.php\">Logout</a>
		                        </li>
		                  </ul>";
        		}
        	}
        ?>
    </li>
</ul>