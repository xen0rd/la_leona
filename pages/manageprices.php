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
			<label > <font face="century gothic" color="#f3be4b" size="5"> Update Prices </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>
<?php
error_reporting(0);
?>

<?php

$date = date("Y-m-d");

	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	
	$result = mysql_query("SELECT * FROM tblprice");


$ident=0;


echo "<td> <center>";
echo "<form action='manageprices.php' method='post'>";

	?>
						<h3> Manage: </h3><select name="term" class="form-control" style="width:50%" onchange="this.form.submit();">
						<option value="other" <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Cabana Hut"  <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Cabana Hut" ? "selected" : "Cabana Hut" ?>>Cabana Hut</option>
						<option value="Room Types"  <?php echo isset($_REQUEST["term"]) && $_REQUEST["term"] == "Room Types" ? "selected" : "Room Types" ?>>Room Types</option>

						</select>
					
						<?php

						
 if($_REQUEST['term']=='Cabana Hut')
{
	header("location:manageroom3.php");
}
if($_REQUEST['term']=='Room Types')
{
	header("location:manageroom2.php");
}

echo "<br>";
echo " </td>";
echo "</tr>";

echo "</td>";


echo "<tr> ";
echo "<td>";
echo "<div id='white' style=' margin-left:135px; position:absolute; width:80%;'>";

                     
echo "<div class='panel panel-default'>";
echo "<div class='panel-body'>";
echo "<div class='dataTable_wrapper'>";
echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
echo "<thead>

<tr>





<th width='200'>Stay Types</th>
<th width='200'>Adult Price </th>
<th width='200'>Kid Price</th>
<th width='200'>30-50 Pax (kid Price)</th>
<th width='200'>30-50pax (Adult Price)</th>
<th width='200'>51-100 Pax (kid Price)</th>
<th width='200'>51-100pax (Adult Price)</th>
<th width='200'>101-150 Pax (kid Price)</th>
<th width='200'>101-150 pax (Adult Price)</th>


<th width=100>Update</th>


 </tr>
</thead>";

echo "</th>";
echo "</tr> ";


if($_SERVER["REQUEST_METHOD"] == "POST")
	{


while($row = mysql_fetch_array($result))
  { 
  	

	 echo "<td align='center'   class='tdpos'>" . $row['fldsession'] . "</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['fldadult'] . "</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['fldkid' ] ."</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['flda30pax'] . "</td>";
     echo "<td align='center'   class='tdpos'>" . $row['fldk30pax'] . "</td>";
	echo "<td align='center'   class='tdpos'>" . $row['flda51pax'] . "</td>";
     echo "<td align='center'   class='tdpos'>" . $row['fldk51pax'] . "</td>";
	 	echo "<td align='center'   class='tdpos'>" . $row['flda101pax'] . "</td>";
     echo "<td align='center'   class='tdpos'>" . $row['fldk101pax'] . "</td>";
   
	


?>


	 <td align="center"> <button type='button' onclick="window.location.href='admin_updateprice.php?reg=<?php echo $row['fldsession'];?>'"  class="btn btn-info"><i class="fa fa-edit"></i></button></td>
	
<?php echo "</tr>";
}
	echo "</table>";
}
else
{

	
while($row = mysql_fetch_array($result))
  { 
     
	 echo "<td align='center'   class='tdpos'>" . $row['fldsession'] . "</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['fldadult'] . "</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['fldkid' ] ."</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['flda30pax'] . "</td>";
     echo "<td align='center'   class='tdpos'>" . $row['fldk30pax'] . "</td>";
	echo "<td align='center'   class='tdpos'>" . $row['flda51pax'] . "</td>";
     echo "<td align='center'   class='tdpos'>" . $row['fldk51pax'] . "</td>";
	 	echo "<td align='center'   class='tdpos'>" . $row['flda101pax'] . "</td>";
     echo "<td align='center'   class='tdpos'>" . $row['fldk101pax'] . "</td>";

	
  
?>	

	 <td align="center"> <button type='button' onclick="window.location.href='admin_updateprice.php?reg=<?php echo $row['fldsession'];?>'"  class="btn btn-info"><i class="fa fa-edit"></i></button></td>
	
	<?php echo "</tr>";
	
}

}
mysql_close($con);
?> 
</form>
</table>
		</div>
		</div>
		</div></div>
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


</body>
</html>

			
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