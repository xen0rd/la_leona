<?php
//include('sessionadmin.php');
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
			<label > <font face="century gothic" color="#f3be4b" size="5"> Booked Reservation </label></font>
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


$buttonall=$_POST['all'];
$buttonpending =$_POST['pending'];
$buttontext=$_POST['box'];
$buttonreserved=$_POST['reserved'];
$buttonsearch=$_POST['search'];
$buttoncheckin=$_POST['checkin'];

	$con = mysql_connect("localhost","root","1234");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	
	$result = mysql_query("SELECT DISTINCT RegNo, fldfname, fldlname, fldcontact, fldarrival, flddeparture, status FROM tblreserve ");
	$dis = mysql_query("SELECT * FROM tblreserve WHERE flddeparture = '$date'");
	while(mysql_fetch_array($dis))
	{
		$red = $red + 1;
	}

function status_style($status) {
        if ($status == "Pending") return 'background-color:yellow';
        if ($status == "Reserved") return 'background-color:#ffab0a';
		if ($status == "Checked in") return 'background-color:lightblue';
      
    }

$ident=0;


echo "<td> <center>";
echo "<form action='reserved.php' method='post'>";

echo "<button type='submit' class='btn btn-success btn-success' name='all' my value='All'>All</button>&nbsp;&nbsp;";
echo "<input type='submit' class='btn btn-success btn-success' name='pending' my value='Pending'>&nbsp;&nbsp;";
echo "<input type='submit' class='btn btn-success btn-success' name='reserved' my value='Reserved'>&nbsp;&nbsp;";
echo "<input type='submit' class='btn btn-success btn-success' name='checkin' my value='Checked In'>&nbsp;&nbsp;";



echo " </td>";
echo "</tr>";
	
echo "<td><br><br>";
	if($red > 0)
	{
		
		echo "<font color='red'> $red of your reservations is already for checkout. </font><br>";
		echo "<input type='submit' class='button1' name='dis' my value='Click Here To View'> ";
		
	}
echo "</td>";


echo "<tr> ";
echo "<td>";
echo "<div id='white' style=' margin-left:105px; position:absolute; width:85%;'>";

                     
echo "<div class='panel panel-default'>";
echo "<div class='panel-body'>";
echo "<div class='dataTable_wrapper'>";
echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
echo "<thead>

<tr>




<th width='100'>Booking No.</th>
<th width='100'>Guest Name</th>
<th width='15'>Contact</th>
<th width='15'>Checkin Date</th>
<th width='15'>Checkout Date</th>


<th width=50>Status</th>
<th width=70>Cancel</th>
<th width=50>Check Out</th>
<th width=50>Update</th>
<th width=50>View Details</th>
 </tr>
</thead>";

echo "</th>";
echo "</tr> ";


if($_SERVER["REQUEST_METHOD"] == "POST")
	{

$buttontexts = $_REQUEST['boxs'];
	if($_REQUEST['dis']=='Click Here To View')
	{
		$result = mysql_query("SELECT DISTINCT RegNo, username, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldpayment, fldtotal, status FROM tblreserve WHERE flddeparture = '$date'");
	}

else if($buttonall=='All')
{
      $result = mysql_query("SELECT DISTINCT RegNo, username, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldtotal, status FROM tblreserve");
}
else if (!empty($buttontext))
{
	
  $result = mysql_query("SELECT * FROM tblreserve WHERE username LIKE '%$buttontext%' OR fldfname LIKE '%$buttontext%' OR fldlname LIKE '%$buttontext%' OR RegNo LIKE '%$buttontext%'");

}
else if($buttonpending=='Pending')
{
      $result = mysql_query("SELECT DISTINCT RegNo, username, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldtotal, status FROM tblreserve WHERE status = 'Pending'");
}
else if($buttonreserved=='Reserved')
{
      $result = mysql_query("SELECT DISTINCT RegNo, username, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldtotal, status FROM tblreserve WHERE status = 'Reserved'");
}
else if($buttoncheckin=='Checked In')
{
      $result = mysql_query("SELECT DISTINCT RegNo, username, fldfname, fldlname, fldcontact, fldarrival, flddeparture, fldtotal, status FROM tblreserve WHERE status = 'Checked in'");
}
else if(empty($buttontext))
{	
		echo "<h3>No matches Found!";
}

while($row = mysql_fetch_array($result))
  { 
  	

	 echo "<td align='center' width='100'  class='tdpos'>" . $row['RegNo'] . "</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['fldfname' ] .'&nbsp;'.$row[ 'fldlname'] . "</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['fldcontact'] . "</td>";
     echo "<td align='center'   class='tdpos'>" . $row['fldarrival'] . "</td>";
     echo "<td align='center'  class='tdpos'>" . $row['flddeparture'] . "</td>";
   
	?><td align='center' width=100  style="<?=status_style($row['status'])?>"> <?php echo $row['status']; ?> </td> <?php
	


?>
<td align="center">
	<?php
 
	if($row['status'] == "Pending" || $row['status'] == "Reserved")
	{
	?>
	 <button type='button' onclick="window.location.href='admin_cancelbooking.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-success"><i class="fa fa-remove"></i></button>
	
	<?php
	}
	?>
	</td>
	
	<td align="center">
	<?php
	if($row['status'] == "Checked in")
	{
		?>
	<button type='button' onclick="window.location.href='admin_checkout.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> </button>
		<?php
	}
	?>
	</td>	
 <td align="center"><button type='button' onclick="window.location.href='admin_managebooking.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-info"><i class="fa fa-edit"></i></button></td>	
	<td align='center'><button type='button' onclick="window.location.href='admin_viewbooking.php?reg=<?php echo $row['RegNo'];?>'"  class="btn btn-danger"><i class="glyphicon glyphicon-th-list"></i></button></td>
	


<?php echo "</tr>";
}
	echo "</table>";
}
else
{

	
while($row = mysql_fetch_array($result))
  { 
     
	 echo "<td align='center'  width='100' class='tdpos'>" . $row['RegNo'] . "</td>";
	 echo "<td align='center'  width='200' class='tdpos'>" . $row['fldfname' ].'&nbsp;'.$row[ 'fldlname']. "</td>";
	 echo "<td align='center'   class='tdpos'>" . $row['fldcontact'] . "</td>";
     echo "<td align='center'   class='tdpos'>" . $row['fldarrival'] . "</td>";
     echo "<td align='center'  class='tdpos'>" . $row['flddeparture'] . "</td>";

	 
	?><td align='center' width=100  style="<?=status_style($row['status'])?>"> <?php echo $row['status']; ?> </td> 

	 <td align="center"> 
	 <?php
	if($row['status'] == "Pending" || $row['status'] == "Reserved" )
	{
	?>
	 <button type='button' onclick="window.location.href='admin_cancelbooking.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-success"><i class="fa fa-remove"></i></button>
	<?php
	}
	?>
	</td>
	<td align="center">	
		<?php
		if($row['status'] == "Checked in")
		{
		?>
		<button type='button' onclick="window.location.href='admin_checkout.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> </button>	
		<?php
		}
		?>
	</td>
	 <td align="center"><button type='button' onclick="window.location.href='admin_managebooking.php?reg=<?php echo $row['RegNo'];?>'" class="btn btn-info"><i class="fa fa-edit"></i></button></td>	
	<td align='center'><button type='button' onclick="window.location.href='admin_viewbooking.php?reg=<?php echo $row['RegNo'];?>'"  class="btn btn-danger"><i class="glyphicon glyphicon-th-list"></i></button></td>
	
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
						<a href="#">We’re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a>
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
						<a href="#">Mutya ng Batangan 2010 Candidates’ Pictorial at La Leona Resort</a>
					</li>
					<li>
						<a href="#">La Leona Resort is now Online!</a>
					</li>
					<li>
						<a href="#">La Leona Resort’s Recreation  </a>
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
