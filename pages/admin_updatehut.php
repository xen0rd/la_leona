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
			<label > <font face="century gothic" color="#f3be4b" size="5"> Update Hut Categories</label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>
<?php

error_reporting(0);
$reg=$_REQUEST['reg'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$add = $_REQUEST['add'];
	$delete = $_REQUEST['delete'];
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	
					if($_REQUEST['confbut'] == "YES")
					{
					$sql="UPDATE tblhut SET fldtype = '$_REQUEST[type]', fldday= '$_REQUEST[day]', fldnight = '$_REQUEST[night]', fldmaxpax = '$_REQUEST[pax]', fldovernight = '$_REQUEST[over]', fldavailable = '$_REQUEST[total]' WHERE fldtype = '$_REQUEST[reg]'";
					mysql_query($sql);
					header("location:manageroom3.php");
					}
					else
					{
					header("location:admin_updatehut.php?reg=$_REQUEST[reg]&form=1&type=$_REQUEST[type]&day=$_REQUEST[day]&night=$_REQUEST[night]&pax=$_REQUEST[pax]&over=$_REQUEST[over]&total=$tot&add=$add&delete=$delete&conf=1");
					}
				
				
	
mysql_close($con);
}

$err = $_REQUEST['err'];


echo "<span class='colorr'> <br> <br>";
echo $err;



?>

<?php
$reg=$_REQUEST['reg'];
	$add = $_REQUEST['add'];
	$delete = $_REQUEST['delete'];
		$rest = mysql_query("SELECT fldavailable FROM tblhut WHERE fldtype = '$reg' ");
	$quan = mysql_fetch_array($rest);
	$tot = $quan['fldavailable'] + $add;
		$tot = $tot - $delete;


	
$res = mysql_query("SELECT * FROM tblhut WHERE fldtype = '$reg'	");
$fld = mysql_fetch_array($res);
$form = $_REQUEST['form'];
$quantity = $fld['fldquantity'];
if($form == NULL)
{
	$type = $fld['fldtype'];
	$day = $fld['fldday'];
	$night= $fld['fldnight'];
	$over= $fld['fldovernight'];
	$pax= $fld['fldmaxpax'];
}
else if($form == 1)
{
	$type = $_REQUEST['type'];
	$day = $_REQUEST['day'];
	$night = $_REQUEST['night'];
	$over= $_REQUEST['over'];
	$pax = $_REQUEST['pax'];
	
}
?>
<center>
		<div id="white" style="width: 940px; height: 680px; background-color: white;">
		<div class="row">
                      <div class="col-lg-12">
					  

					
                            <div class="dataTable_wrapper">
													<tr>
<td>

<table style="position:absolute; margin-right:850px; top:%;">
		<tr>


  
</td>
</tr>
	</table>
              <br>
	                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
<form action="admin_updatehut.php" method="post">
<input type="hidden" name="form" value="1">
<input type="hidden" name="reg" value="<?php echo $_REQUEST['reg']; ?>">

 <label > <font face="normal" color="grey" size="4"></font></label> <input  type="hidden"  class="form-control" style="width:40%" name="wew" value="<?php echo $quan['fldavailable']; ?>">
 <label > <font face="normal" color="grey" size="4"></font></label> <input  type="hidden"  class="form-control" style="width:40%" name="total" value="<?php echo $tot; ?>">

 <label > <font face="normal" color="grey" size="4">Room Type</font></label> <input  type="text" readonly class="form-control" style="width:40%" name="type" value="<?php echo $type; ?>"><br>
<label > <font face="normal" color="grey" size="4">Day Price</font></label> <input type="text"  class="form-control" style="width:40%"  name="day" value="<?php echo $day; ?>"> <br>
<label > <font face="normal" color="grey" size="4">Night Price</font></label> <input type="text"  class="form-control" style="width:40%" name="night" value="<?php echo $night; ?>"><br>
<label > <font face="normal" color="grey" size="4">Day and Night Price</font></label> <input type="text"  class="form-control" style="width:40%" name="over" value="<?php echo $over; ?>"><br>
<label > <font face="normal" color="grey" size="4">Maximum Pax</font></label> <input type="text"  class="form-control" style="width:40%"  name="pax" value="<?php echo $pax; ?>"> <br>
<label > <font face="normal" color="grey" size="4">Add Room</font></label> <input type="number"  class="form-control" style="width:40%"  name="add" value="<?php echo $_REQUEST['add']; ?>"> 
<label > <font face="normal" color="grey" size="4">Less Room</font></label> <input type="number"  class="form-control" style="width:40%" name="delete" value="<?php echo $_REQUEST['delete']; ?>"><br>
</span>

<?php
if($_REQUEST['conf']==NULL)
{
	?>
	<br>
	<input type="submit" class="buttons" value="Update" formmethod="post"> <a href="manageroom3.php"><input type="button" name="back" class="buttons" value="Back"></a></span>
	<?php
}
else if($_REQUEST['conf']==1)
{	
	?>	
	<span class="confpos3" > <br><br><br><br><br> Are you sure you want to Update this?<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="roominven.php"><button type="button" class="buttons">NO</button></a></span>
	<?php
}

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