<?php
include('sessionadmin.php');
?>


<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">
     <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

   
   

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
</head>
<body>
		<div id="header">
		<div>
			<a href="admin1.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="admin.php">
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
					<a href="">Food Inventory</a>
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
					<a href="report.php">Supply Report</a>
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
					<a href="">Admin</a>
					<ul>
					<li>
					<a href="logout.php">Logout</a>
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
$del = $_REQUEST["del"];
$vno = $_REQUEST["vn"];

if($vno==null)
{

$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);

$result = mysql_query("SELECT * FROM tblroominven WHERE flditemcode ='$del' ");

$row = mysql_fetch_array($result);
?>
<br><br><br>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
	<form action="deleteroom.php?del=<?php echo $del?>" method="post">
	
<br><br><br><br><br>		
	
			<center>
	
	<label > <font face="century gothic" color="grey" size="4">Item No.</label></font><input type="text" class="form-control" style="width:50%" disabled name="itemname" value="<?php echo $row['flditemcode']; ?>"><br><br>
	<label > <font face="century gothic" color="grey" size="4">Item Name</label></font><input type="text" class="form-control" style="width:50%" disabled name="itemcategory" value="<?php echo $row['flditemname']; ?>"><br><br>
	<label > <font face="century gothic" color="grey" size="4">Quantity:</label></font><input type="text"disabled class="form-control" style="width:50%" name="quantity" value="<?php echo $row['fldquantity']; ?>"><br><br>


    
</span><span class='delpos'>Are you sure you want to delete this product?<br>

<input type="submit" my value="Yes"   class="btn btn-default">

<a href="roominven.php"><input type="button" class="btn btn-default" name="back"  value="No"></a></span>




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);

$result = mysql_query("DELETE FROM tblroominven WHERE flditemcode ='$del' ");

mysql_close($con);
		header("location:roominven.php?vn=1");
}
?>
<?php
}
?>

             </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

	 </div>
				
</form>

</body>
</html>