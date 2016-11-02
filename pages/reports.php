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
					                            <a href=\"payments-list.php\">Payments</a>
					                        </li>
											 <li>
					                            <a href=\"reports.php\">Reports</a>
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
            	//echo $_SESSION['login_type'];
            	if(isset($_SESSION['login_type'])){
            		if($_SESSION['login_type']=="customer" || $_SESSION['login_type']=="FRONTDESK"){
            			if($_SESSION['login_type']=="customer"){
            				echo "
                				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [".$_SESSION['login_name']."]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
                			";
						}else{
							echo "
            				<a style=\"margin-top:50px;margin-left:50px;font-size:16px;\">Welcome, [ FRONTDESK ]</a><a href=\"logout.php\" style=\"text-decoration:none;font-size:16px\"> Logout</a>
            			";
						}
            			
            		}
            	}
            ?>

<div class="container">
<br>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td><label> Sales</label></td>
        <td> <a href='report.php'><button type="button" style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></td>
        
      </tr>
      <tr>
        <td><label>List of Checked-in </label></td>
        <td><a href="checkedin.report.php"><button type="button" style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></td>
       
      </tr>
      <tr>
        <td><label> List of Checked-out </label></td>
        <td><a href="gradpic.report.php"><button type="button" style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></td>
       
      </tr>
      
       <tr>
        <td><label> List of Cancelled </label></td>
        <td><a href="report.applied.php"><button type="button" style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></td>
       
      </tr>
      
       <tr>
        <td><label> </label></td>
        <td><a href="report.notapplied.php"><button type="button" style="float:right;" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Generate Report </button></a></td>
       
      </tr>
      
    </tbody>
  </table>
</div>

</body>
</html>

<script>
function printdoc(pageloc)
{
var sOption="toolbar=no,location=no,menubar=no,width=900px,height=800px,left=400";
var winprint=window.open(pageloc,"Print",sOption);  

winprint.focus();                                  
}
</script>

      <?
      include '../theme/footer.php';
      
      ?>
      
     

