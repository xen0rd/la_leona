<?php
ob_start();
?>
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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Equipment Inventory </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>
	
	
<?php

error_reporting(0);


$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$red = 0;
mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblequipmentinventory ORDER BY flditemcode ASC");
$dis = mysql_query("SELECT * FROM tblequipmentinventory WHERE fldquantity = 0");
	while(mysql_fetch_array($dis))
	{
		$red = $red + 1;
	}

echo "<table align='center'>" ;


echo "<tr>";
echo "<td  >";

echo "	<table>
		<tr>

   <td  ><a href='addequip.php'><button type='button'  class='btn btn-success' name='add'  >Add Equipment</button></td> 
   <td  ><a href='roomlist.php'>&nbsp;&nbsp;&nbsp;<button type='button'  class='btn btn-success' name='add'  >Equipment Allocation</button></td> 


</td>
</tr>
	</table>"; 

echo "<td class='pos5' align='center'>";
	if($red > 0)
	{
		
		echo "<span class='colorr'> $red of your products is already out of stocks. </span><br>";
		echo "<input type='submit' class='button1' name='dis' my value='Click Here To View'> ";
		
	}
echo "</td>";
echo "<tr> ";
echo "<td>";
echo "<div class='row'>";
echo "<div class='col-lg-12'>";
echo "<div class='panel panel-default'>";
echo "<div class='panel-body'>";
echo "<div class='dataTable_wrapper'>";
echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
echo "<thead>
<tr>
<th width=70>Item No.</th>
<th width=110>Date Purchase</th>
<th width=220>Equipment Name</th>
<th width=110>Price</th>
<th width=120>Quantity</th>
<th width=50>Update</th>


</tr>
</thead>";


echo "</th>";
echo "</tr> ";	


if($_SERVER["REQUEST_METHOD"] == "POST") {

$buttontext = $_REQUEST['box'];
$buttonsearch=$_REQUEST['add'];

if($_REQUEST['add']=='Add')
{
      header("location:addequip.php");

} 
if ($_REQUEST['dis']=='Click Here To View')
	{
		$result = mysql_query("SELECT * FROM tblequipmentinventory WHERE fldquantity = 0 ORDER BY flditemcode ASC");
	}

if($_REQUEST['search']=='Search')
{
	$result = mysql_query("SELECT * FROM tblequipmentinventory WHERE flditemcode LIKE '%$buttontext%' OR flditemname LIKE '%$buttontext%' OR fldquantity LIKE '%$buttontext%' ORDER BY flditemcode ASC");
}
else if($_REQUEST['all']=='All'){
header("location:equipinven.php");
}
while($row = mysql_fetch_array($result))
  { 
  echo "<tr class='tbldesign'>";
  echo "<td align='center' >" . $row['flditemcode'] . "</td>";
  echo "<td align='center' >" . $row['flddate'] . "</td>";
  echo "<td align='center' >" . $row['flditemname'] . "</td>";
  echo "<td align='center' >" . $row['fldprice'] . "</td>";
  echo "<td align='center'>" . $row['fldquantity'] . "</td>";
  


?>

     <td align="center"  class='tdpos'><button type='button' class="btn btn-success btn-primary" onclick="window.location.href='updateequip.php?prodcode=<?php echo $row['flditemcode'];?>'" class='text'><i class="fa fa-edit"></i>
	 </button></td> 
	   

<?php echo "</tr>";
}

}
else
{
	while($row = mysql_fetch_array($result))
  { 

  echo "<td align='center'   >" . $row['flditemcode'] . "</td>";
  echo "<td align='center' >" . $row['flddate'] . "</td>";
  echo "<td align='center' >" . $row['flditemname'] . "</td>";
  echo "<td align='center' >" . $row['fldprice'] . "</td>";
  echo "<td align='center'  '  >" . $row['fldquantity'] . "</td>";
  
   
	
	
?>

     <td align="center"  class='tdpos'><button type='button' class="btn btn-success btn-primary" onclick="window.location.href='updateequip.php?prodcode=<?php echo $row['flditemcode'];?>'" class='text'><i class="fa fa-edit"></i>
	 </button></td>
	
	  

<?php echo "</tr>";
}
 
}

mysql_close($con);
?> 
	 </table>
</div>
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
	
 