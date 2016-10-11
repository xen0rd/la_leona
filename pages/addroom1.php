<?php
include('sessionadmin.php');
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style1.css" type="text/css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie.css">
	<![endif]-->
	<!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <link href="../bower_components/bootstrap/dist/css/slides.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
	<div id="header">
		<div>
	<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="index.php">
				<input type="text" name="search" id="search" value="">
				<input type="submit" name="searchBtn" id="searchBtn" value="">
			</form>
		</div>
		<div class="navigation">
			<ul>
				<li class="selected">
					<a href="itemcategory.php">Inventory</a>
				
				</li>
					<li class="booking">
					<a href="">Reserved</a>
				</li>
				<li>
					<a href="">Walk-in</a> 
				</li>
				<li>
					<a href="">Reports</a>
					<ul>
					<li>
					<a href="">Food Inventory Report</a>
					</li>
					<li>
					<a href="">Supply Report</a>
					</li>
					<li>
					<a href="">Equipment Report</a>
					</li>
					<li>
					<a href="">Reservation Report</a>
					</li>
					<li>
					<a href="">Sales Report</a>
					</li>
					</ul>
				</li>	

				<li class="booking">
					<a> <?php echo $login_session; ?></a>
					<ul>
					<li>
					<?php 
					echo "<li> <b id='logout'><a href='logout.php'style='text-decoration:none'>Log Out</a></li>"
					?>
					</li>
					</ul>
					</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">


		<div class="header">
			<ul>
				<li>
					
					<div>

					</div>
				</li>
				<li>
			<label > <font face="century gothic" color="#f3be4b" size="6"> Add Equip</label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div><center>
	
<div id="white" style="width: 940px; height: 500px; background-color: white;">
	
<?php

        include('connect.php');
        $room = $_GET['id'];
		 $roomno= $_GET['roomno'];
        $result = mysql_query("SELECT * FROM roominfo where fldroomname='$room'");
        while($row = mysql_fetch_array($result))
          {
            $roomno = $row['fldroomnumber'];
            $equip_name = $row['fldequipname'];
            $quantity = $row['fldequipquantity'];
			
		  }
        ?><br><br>
		<form action="addroom1-1.php" method="post">
		<div id="row">
			<center>
		<div id="white" style="width: 940px; height: 500px; background-color: white;">
		<div class="row">
                      <div class="col-lg-12">
					  
                    <div class="panel panel-default">
					
                            <div class="dataTable_wrapper">
					<div id="t" style="margin-left:5px;">
				<div id="row">
						<div class="col-lg-6">
		Room Number <input class="form-control" value="<?php echo $room ?>" readonly>
		</div>
		<div class="col-lg-6">
		Room Name<input class="form-control" value="<?php echo $roomno?>" readonly>
			</div>
		</div>
	<br><br><br><br><br><br>

		<input type="hidden"  name="fldroomname" value="<?php echo $roomno ?>">
			<input type="hidden"  name="fldroomnumber" value="<?php echo $room ?>">


		Equipment Code: <input style="width:40%" type="text" class="form-control" name="fldequipmentcode">
	
	<br>

		Equipment Name: <input style="width:40%" type="text" class="form-control" name="fldequipname">
		<br>

		Quantity: <input style="width:40%" type="text" class="form-control" name="fldequipquantity">
		<br>
		Equipment Condition<input style="width:40%" type="text" class="form-control" name="fldstatuss">
	
		<div class="row">
                      <div class="col-lg-10">
		<div id="t" style="margin-left:150px;">
		<br>
		<button type="submit" class="btn btn-primary">Add Equipment</button><a href='roomlist.php'> <button type='button' class="btn btn-primary" class='btn btn-default'>Back</button></a>
		</div>
		</form>
		
		</div>
		</table>
		</div>
		</div>
		</div></div>
		</div>
		  <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

  

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

      <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

