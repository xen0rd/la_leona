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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Food Supplies </label></font>
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

  $sqll = ("SELECT * from tblcatering");
$sqs = mysql_query($sqll);
$qty3 = 0;
while($num = mysql_fetch_assoc ($sqs))
{
	$qty3 += $num['fldquantity'];
}
$result = mysql_query("SELECT * FROM tblcatering ORDER BY flditemcode ASC");
$dis = mysql_query("SELECT * FROM tblcatering WHERE fldquantity = 0");
	while(mysql_fetch_array($dis))
	{
		$red = $red + 1;
	}
echo "<table align='center'>" ;


echo "<tr>";
echo "<td  >";

echo "	<table>
		<tr>

  <td align='center' ><a href='addcatering.php'><button type='button' class='btn btn-success' name='add'  >Add Supply</button></td> 

</font>

</td>
</tr>
	</table>";



	if($red > 0)
	{
		
		echo " <div class='overlay'><br><br><br><br><br>"; 

		echo "<span class='colorr' align='center'> $red of your Item is already out of stocks. </span><br>";
		
        echo "<a href='cateringinventory.php'><button type='button' name='back' class='btn btn-default'  value='Back'>Close </button>";
		echo "</div>";
		
		echo "<input type='submit'  name='dis' my value='Click Here To View'> ";
		
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
<th width='50'>Item No. </font></th>
<th width='135'>Item Name </font></th>
<th width='45'>Quantity </font></th>
<th width='45'>Status</font></th>
<th width=45>Price </font></th>
<th width=45>Unit</font></th>
<th width='45'>Delete</th>
<th width='45'>Edit</th>



</tr>
</thead>";


echo "</th>";
echo "</tr> ";
 function status_style($status) 
 {

			 if ($status == "High Level") return 'background-color:yellow';
		
			if ($status == "Low Level") return 'background-color:#ff4500';
		
			 if ($status == "Critical Level") return 'background-color:red';
		
       
 }
if($_SERVER["REQUEST_METHOD"] == "POST") {

$buttontext = $_REQUEST['box'];
$buttonsearch=$_REQUEST['add'];

if($_REQUEST['add']=='Add')
{
      header("location:addcatering.php");

} 

if ($_REQUEST['dis']=='Click Here To View')
	{
		$result = mysql_query("SELECT * FROM tblcatering WHERE fldquantity = 0 ORDER BY flditemcode ASC");
	}

if($_REQUEST['search']=='Search')
{
	$result = mysql_query("SELECT * FROM tblcatering WHERE flditemcode LIKE '%$buttontext%' OR flditemname LIKE '%$buttontext%' OR fldquantity LIKE '%$buttontext%' ORDER BY flditemcode ASC");
}
else if($_REQUEST['all']=='All'){
header("location:cateringinventory.php");
}
while($row = mysql_fetch_array($result))

  { 
  
  echo "<td align='center' >" . $row['flditemcode'] . "</td>";
  echo "<td align='center' >" . $row['flditemname'] . "</td>";
  echo "<td align='center'  >" . $row['fldquantity'] . "</td>";
   ?><td align='center' width=100  style="<?=status_style($row['fldstatus'])?>"> <?php echo $row['fldstatus']; ?> </td> <?php
  echo "<td align='center'  >" . $row['fldprice'] . "</td>";
  echo "<td align='center'  >" . $row['fldunit'] . "</td>"; 
 

?>

 <td align="center" ><button type='button' class='btn btn-success' onClick="window.location.href='deletesup.php?del=<?php echo $row['flditemcode'];?>'" class='text'>Delete</button></td>
  <td align="center"><button type='button' class='btn btn-success' onClick="window.location.href='updatecatering.php?prodcode=<?php echo $row['flditemcode'];?>'" class='text'> Update</button></td>
  
<?php echo "</tr>";
}

}
else
{
	while($row = mysql_fetch_array($result))
  { 
  echo "<tr>";
   echo "<td align='center' >" . $row['flditemcode'] . "</td>";
  echo "<td align='center' >" . $row['flditemname'] . "</td>";
  echo "<td align='center'  >" . $row['fldquantity'] . "</td>";
   ?><td align='center' width=100  style="<?=status_style($row['fldstatus'])?>"> <?php echo $row['fldstatus']; ?> </td> <?php
  echo "<td align='center'  >" . $row['fldprice'] . "</td>";
  echo "<td align='center'  >" . $row['fldunit'] . "</td>"; 
?>

  <td align="center"  class='tdpos'><button type='button' class="btn btn-success btn-primary" onClick="window.location.href='deletesup.php?del=<?php echo $row['flditemcode'];?>'" class='text'><i class="fa fa-trash"></i>
  </button></td>
     <td align="center"  class='tdpos'><button type='button' class="btn btn-success btn-primary" onClick="window.location.href='updatecatering.php?prodcode=<?php echo $row['flditemcode'];?>'" class='text'><i class="fa fa-edit"></i>
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
	
  