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
			<label > <font face="century gothic" color="#f3be4b" size="5"> Add </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>
<?php
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(empty($_REQUEST['roomnumber'])||empty($_REQUEST['roomname']))
{
	$err = "&nbsp;&nbsp;&nbsp;Please fill all empty fields";

	if(empty($_REQUEST['roomnumber']))
	{
		$roomnumberErr="*";
	}
	if(empty($_REQUEST['roomname']))
	{
		$roomnameErr="*";
	}

	
	
	header("location:addroomr.php?err=$err&roomnumber=$_REQUEST[roomnumber]&roomnameErr=$roomnumberErr&roomname=$_REQUEST[roomname]&roomnameErr=$roomnameErr");
	}
	else
	{
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	
			if($_REQUEST['confbut'] == "YES")
			{
			$sql="INSERT INTO roominfo (fldroomname, fldroomnumber)
			VALUES
			('$_REQUEST[roomname]','$_REQUEST[roomnumber]')";
			$sql="INSERT INTO roominfo (fldroomname, fldroomnumber)
			VALUES
			('$_REQUEST[roomname]','$_REQUEST[roomnumber]')";
			mysql_query($sql,$con);
			header("location:roomlist.php");
			}
			else
			{
		 	header("location:addroomr.php?&roomnumber=$_REQUEST[roomnumber]&roomname=$_REQUEST[roomname]&conf=1");
			}
		}
	}


$result011 = mysql_query("SELECT * FROM tblhut");

$err = $_REQUEST['err'];


echo "<span class='colorr'><br><br>";
echo $err;
echo "</span>";
echo "</td>";



?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                   
                     
       
 
                       
       
<form action="addroomr.php" method="post">
<div class="">
<br><br><br><br><br><br>
<center>
<label > <font face="normal" color="grey" size="4">Room No.<span class="colorr"><?php echo $_REQUEST['roomnumberErr']; ?> </span></label></font></span><br>
<input type="text" name="roomnumber" class="form-control" style="width:40%" value="<?php echo $_REQUEST['roomnumber']; ?>"><br>
<br>
<label > <font face="normal" color="grey" size="4">Room Name<span class="colorr"><?php echo $_REQUEST['roomnameErr']; ?> </span></label></font></span><br>
<input type="text" name="roomname" class="form-control" style="width:40%" value="<?php echo $_REQUEST['roomname']; ?>"><br>
 
<br>
<input type="submit" class="btn btn-default" value="Submit"  formmethod="post"> <a href="roomlist.php"><button type="button" class="btn btn-default">Back</button></a></span>
</form>


<?php
if($_REQUEST['conf']==NULL)
{
	?>
</span><?php
}
if($_REQUEST['conf']==1)
{
	?>
   	<span class="confpos3" > <br><br><br><br><br> Are you sure you want Add this Item?<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit"class="btn btn-default" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="roomlist.php"><button type="button" class="btn btn-default">NO</button></a></span>
	<?php
}
?>
</font>
</font>
</center>
</font>
</font>

             </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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

</body>
</html>