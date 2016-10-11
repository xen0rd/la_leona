
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style1.css" type="text/css">
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
					<a href="reports.php">Supply Report</a>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(empty($_REQUEST['itemcategorydes'])||empty($_REQUEST['proquantity'])||empty($_REQUEST['productname'])||($_REQUEST['productname']=="other"))
{
	$err = "&nbsp;&nbsp;&nbsp;Please fill all empty fields";

	if(empty($_REQUEST['productname']))
	{
		$productnameErr="*";
	}
	if($_REQUEST['itemcategorydes'] == "other")
	{
		$itemcategorydesErr="*";
	}
	if(empty($_REQUEST['proquantity']))
	{
		$proquanErr="*";
	}

	
	
	header("location:additemcategory.php?err=$err&productname=$_REQUEST[productname]&productnameErr=$productnameErr&itemcategorydes=$_REQUEST[itemcategorydes]&itemcategorydesErr=$itemcategorydesErr&productquantity=$_REQUEST[productquantity]&proquanErr=$proquanErr");
	}
	else
	{
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	$dupe = mysql_query("SELECT * FROM tblitemscategory WHERE fldproductname='$_POST[productname]'") or die (mysql_error());
	$num_rows = mysql_num_rows($dupe);
		if ($num_rows > 0) 
		{
			echo" ";
			 $err = "Duplicate Item Name. Please enter a unique item code";
			$prodcodeErr="*";
		 	header("location:additemcategory.php?err=$err&productname=$_REQUEST[productname]&productnameErr=$productnameErr&itemcategorydes=$_REQUEST[itemcategorydes]");
		}
		else
		{
			if($_REQUEST['confbut'] == "YES")
			{
			$sql="INSERT INTO tblitemscategory (fldproductname, flditemdescription, fldstockquantity)
			VALUES
			('$_REQUEST[productname]','$_REQUEST[itemcategorydes]','$_REQUEST[proquantity]')";
			mysql_query($sql,$con);
			header("location:itemcategory.php");
			}
			else
			{
		 	header("location:additemcategory.php?&productname=$_REQUEST[productname]&itemcategorydes=$_REQUEST[itemcategorydes]&proquantity=$_REQUEST[proquantity]&conf=1");
			}
		}
	}
}


$err = $_REQUEST['err'];


echo "<span class='colorr'><br><br>";
echo $err;
echo "</span>";
echo "</td>";


?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                     
       
 
                       
       
<form action="additemcategory.php" method="post">
<div class="">
<br><br>
<center>
 <label > <font face="normal" color="grey" size="4"> Product Name:<span class="colorr"><?php echo $_REQUEST['productnameErr']; ?> </span></label></font><br>                                                                             
<select name="productname" class="form-control" style="width:40%" >
       
    <option value="other" <?php echo isset($_REQUEST["productname"]) && $_REQUEST["productname"] == "other" ? "selected" : "other" ?>>Please Select..</option>
		<option value="Toiletries"  <?php echo isset($_REQUEST["productname"]) && $_REQUEST["productname"] == "Toiletries" ? "selected" : "Toiletries" ?>>Toiletries</option>
    <option value="Food Supplies"  <?php echo isset($_REQUEST["productname"]) && $_REQUEST["productname"] == "Food Supplies" ? "selected" : "Food Supplies" ?>>Food Supplies</option>
    <option value="Equipment Supplies"  <?php echo isset($_REQUEST["productname"]) && $_REQUEST["productname"] == "Equipment Supplies" ? "selected" : "Equipment Supplies" ?>>Equipment Supplies</option>
    <option value="Room Amenities"  <?php echo isset($_REQUEST["productname"]) && $_REQUEST["productname"] == "Room Amenities" ? "selected" : "Room Amenities" ?>>Room Amenities</option>
     </select>
        <br>
 <label > <font face="normal" color="grey" size="4"> Item Description:<span class="colorr"><?php echo $_REQUEST['itemcategorydesErr']; ?> </span></label></font><br>                                                                             
<input name="itemcategorydes"  type="text"  class="form-control" style="width:50%" value="<?php echo $_REQUEST['itemcategorydes']; ?>">
        
            <br>
<label > <font face="century gothic" color="grey" size="4"> Quantity:<span class="colorr"><?php echo $_REQUEST['proquanErr']; ?> </span></label></font><br>
<input type="text" name="proquantity" class="form-control" style="width:40%" value="<?php echo $_REQUEST['proquantity']; ?>">     
<br>

<br> 
<br>
<input type="submit" class="btn btn-default" value="Submit"  formmethod="post"> <a href="additemcategory.php"><button type="button" class="btn btn-default">Clear</button></a></span>
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
	<a href="itemcategory.php"><button type="button" class="btn btn-default">NO</button></a></span>
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
			<ul>
				<li>
					<a href="index.html">home</a>
				</li>
				<li>
					<a href="about.html">room</a>
				</li>
				<li>
					<a href="services.html">event</a>
				</li>
				<li>
					<a href="blog.html">manage reservation</a>
				</li>
				<li>
					<a href="booking.html">admin</a>
				</li>
			</ul>
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