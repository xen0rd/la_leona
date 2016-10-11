<?php
include('sessionadmin.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
		<link rel="stylesheet" href="css/style1.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/ie.css">
	

	<link rel="stylesheet" type="text/css" href="css/ie.css">
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
	<a href="admin1.php" class="logo"><img src="logo-trans.png" alt=""></a>
			
		</div>
		<div class="navigation">
			<ul>
				<li class="selected">
					<a href="itemcategory.php">Inventory</a>
					<ul>
					
				
					</ul>
				</li>
					<li >
					<a >Reserved</a>
					<ul>
					<li>
					<a href="reserved.php">Booked Reservation</a>
					</li>
					<li>
					<a href="event_hall_reserved.php">Event Hall Reservation</a>
					</li>
					<li>
				</li>
				</ul>
				<li>
					<a href="walk_in.php">Walk-in</a> 
					
				</li>
				<li>
					<a href="">Reports</a>
					<ul>
					<li>
				<a href="foodsupplyreports.php">Food Inventory Report</a>
					</li>
					<li>
					<a href="toiletries_reports.php">Toiletries Report</a>
					</li>
					<li>
					<a href="equipment_reports.php">Equipment Report</a>
					</li>
					<li>
					<a href="">Reservation Report</a>
					</li>
					<li>
					<a href="">Sales Report</a>
					</li>
					</ul>
				</li>	

				<li >
					<a> <?php echo $login_session; ?></a>
					<ul>
					
					<a href="manageroom2.php"><li><i class="fa fa-cogs fa-fw"></i> Page Maintenace</a>
                        </li>
					
					<li>
					 
					<li><a href='logout.php'><i class="fa fa-sign-out fa-fw"></i>Log Out</a></li>
					
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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Room Allocated </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>
		<center>
		<div id="white" style="width: 940px; height: 500px; background-color: white;">
	<div class="col-lg-12">
					  
                    <div class="panel panel-default">
					
                          
              
	                  <table class="table table-striped table-bordered table-hover" >

                                    <thead>
                                        <tr class="success"> 
											<th><center>Equipment Code</center></th>
                                            <th><center>Equipment Name</center></th>
                                            <th><center>Quantity</center></th>	
                                            <th width='50'><center>Equipment Condition</center></th>
											<th width='50'><center>Action</center></th>
                                    </thead>
									
									<br><br>

<?php

        include('connect.php');
        $room = $_GET['id'];
		    
        $result = mysql_query("SELECT * FROM roominfo where fldroomnumber='$room'");
        while($row = mysql_fetch_array($result))
          {
			 			
            $room_name = $row['fldroomname'];
			$equipmentcode = $row['fldequipmentcode'];
            $equip_name = $row['fldequipname'];
            $quantity = $row['fldequipquantity'];
			$status = $row['fldstatuss'];
		  }
        ?>
		<br>
			<div id="t" style="margin-left:115px;">
				<div id="row">
						<div class="col-lg-5">
		Room Number<input type="text" class="form-control" value="<?php echo $room ?>" readonly>
		</div>
		<div class="col-lg-5">
		Room Name<input type="text" class="form-control" value="<?php echo $room_name ?>" readonly>
		</div>
		</div>
	</div>
	
		<?php

	
        include('connect.php');
        $room = $_GET['id'];
		
        $result = mysql_query("SELECT * FROM room where fldroomnumber='$room'AND fldroomname='$room_name'");
        while($row = mysql_fetch_array($result))
          {
			$equipmentcode1 = $row['fldequipmentcode'];
            $equip_name1 = $row['fldequipname'];
            $quantity1 = $row['fldequipquantity'];
			$status1 = $row['fldstatuss'];
			echo '<tbody>';
            echo '<tr class>';
			echo '<div id="row">';
			 echo "<td align='center' width=100  class='tdpos'>" . $row['fldequipmentcode'] . "</td>";
			 echo "<td align='center' width=100  class='tdpos'>" . $row['fldequipname'] . "</td>";
			  echo "<td align='center' width=100  class='tdpos'>" . $row['fldequipquantity'] . "</td>";
          
			?><td align='center' width=100  style="<?=status_style($row['fldstatuss'])?>"> <?php echo $row['fldstatuss']; ?> </td> <?php
			 ?><td align="center"  class='tdpos'><button type='button' class="btn btn-success btn-primary" onclick="window.location.href='damaged_equipment_update.php?prodcode=<?php echo $row['fldequipmentcode'];?>&room=<?php echo $_GET['id'];?>'" class='text'><i class="fa fa-edit">Update</i>
	 </button></td><?php
			echo '</div>';
			echo '</tbody>';
            echo '</tr>';
			
		  }
		  function status_style($status) {
        if ($status == "Good") return 'background-color:yellow';
        if ($status == "Damage") return 'background-color:#ff4500';
      
    }

$ident=0;
        ?>
		<table style="margin-left:100px; position:absolute; top:90%;"><a href='roomlist.php'> <button type='button' class='btn btn-default'>Back</button></a></table>
	</table>
</div>
</div>
</div>

	<div id="footer">
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
					<li>
						<b>email:</b> <span>www.laleonaresort.com</span>
					</li>
				</ul>
			</div>
			<div class="tweets">
				<h3>recent tweets</h3>
				<ul>
					<li>
						<a href="#">Weâ€™re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a>
					</li>
				</ul>
			</div>
			<div class="posts">
				<h3>recent blog post</h3>
				<ul>
					<li>
						<a href="#">The Casa Leona</a>
					</li>
					<li>
						<a href="#">Mutya ng Batangan 2010 Candidatesâ€™ Pictorial at La Leona Resort</a>
					</li>
					<li>
						<a href="#">La Leona Resort is now Online!</a>
					</li>
					<li>
						<a href="#">La Leona Resortâ€™s Recreation  </a>
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
						<a href="http://freewebsitetemplates.com/go/facebook/">facebook</a>
					</li>
					<li id="twitter">
						<a href="http://freewebsitetemplates.com/go/twitter/">twitter</a>
					</li>
					<li id="googleplus">
						<a href="http://freewebsitetemplates.com/go/googleplus/">googleplus</a>
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
</body>
</html>
	
		
