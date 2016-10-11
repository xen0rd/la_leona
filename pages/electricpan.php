<?php
include('session.php');
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
					<a href="admin1.php">Inventory</a>
					<ul>
					<li>
					<a href="inventory.php">Food Inventory</a>
					</li>
					<li>
					<a href="">Supply Inventory</a>
					</li>
					<li>
					<a href="equipinven.php">Equipment Inventory</a>
					</li>
					</ul>
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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Admin </label></font>
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
$result = mysql_query("SELECT * FROM tblroomlist where fldequipname = 'Electric Pan'  ");

$dis = mysql_query("SELECT * FROM tblroomlist WHERE fldquantity = 0");
	while(mysql_fetch_array($dis))
	{
		$red = $red + 1;
	}

echo "<table align='center'>" ;


echo "<tr>";
echo "<td  >";

echo "	<table>
		<tr>

   <td  ><a href='addroomlist.php'><button type='button' style='width:100px;' class='btn btn-success' name='add'  >Add Supply</button></td> 

</font>

</td>
</tr>
	</table>";
echo "</font>";

echo "</td>";
echo "</tr>"; 

echo "<td align='center'>";
	if($red > 0)
	{
		
		echo "<span class='colorr'> $red of your Item is already out of stocks. </span><br>";
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
<th width=60>Room No. </th>
<th width=220>Equipment Name</th>
<th width=80>Quantity</th>
<th width=115></th>
<th width=115></th>
</tr>
</thead>";


echo "</th>";
echo "</tr> ";

if($_SERVER["REQUEST_METHOD"] == "POST") {

$buttontext = $_REQUEST['box'];
$buttonsearch=$_REQUEST['add'];

if($_REQUEST['add']=='Add')
{
      header("location:addroomlist.php");

} 
if ($_REQUEST['dis']=='Click Here To View')
	{
		$result = mysql_query("SELECT * FROM tblroomlist WHERE fldquantity = 0 ORDER BY fldroomnumber ASC");
	}


while($row = mysql_fetch_array($result))
  { 
  
  echo "<td align='center' width=100>" . $row['fldroomnumber'] . "</td>";
  echo "<td align='center' width=200  >" . $row['fldequipname'] . "</td>";
  echo "<td align='center' width=100 >" . $row['fldquantity'] . "</td>";


?>
  <td align="center" class='tdpos'><button type='button' class='btn btn-success'  onclick="window.location.href='deletetoiletries.php?del=<?php echo $row['flditemcode'];?>'" class='text'>Delete</button></td>
  <td align="center" class='tdpos'><button type='button' class='btn btn-success'  onclick="window.location.href='updateroomlist.php?prodcode=<?php echo $row['fldroomnumber'];?>'" class='text'> Update</button></td> 

  <?php echo "</tr>";
}

}
else
{
	while($row = mysql_fetch_array($result))
  { 
  echo "<tr>";
  echo "<td align='center' width=150 height=40  class='tdpos'>" . $row['fldroomnumber'] . "</td>";
  echo "<td align='center' width=250  class='tdpos'>" . $row['fldequipname'] . "</td>";
  echo "<td align='center' width=150  class='tdpos'>" . $row['fldquantity'] . "</td>";
 
?>
  <td align="center" class='tdpos'><button type='button' class='btn btn-success'  onclick="window.location.href='deletetoiletries.php?del=<?php echo $row['flditemcode'];?>'" class='text'>Delete</button></td>
  <td align="center" class='tdpos'><button type='button' class='btn btn-success'  onclick="window.location.href='updateroomlist.php?prodcode=<?php echo $row['fldroomnumber'];?>'" class='text'> Update</button></td> 

  <?php echo "</tr>";
}
 
}

mysql_close($con);
?> 
	
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

