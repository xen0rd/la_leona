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
					<a >Walk-in</a> 
					<ul>
					<li>
					<a href="walk_in.php">Walk-In</a>
					</li>
					</ul>
				</li>
				<li>
					<a href="">Reports</a>
					<ul>
					<li>
					<a href="foodsupplyreports.php">Food Inventory Report</a>
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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Add Item </label></font>
				</li>
				<li>
					
					<div>
					
					</div>
				</li>
			</ul>
		</div>
<?php
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(empty($_REQUEST['itemname'])||empty($_REQUEST['quantity'])||empty($_REQUEST['price'])||empty($_REQUEST['unit']))
{
	$err = "&nbsp;&nbsp;&nbsp;Please fill all empty fields";

	if(empty($_REQUEST['itemname']))
	{
		$itemnameErr="*";
	}
	if(empty($_REQUEST['quantity']))
	{
		$quanErr="*";
	}
	if(empty($_REQUEST['price']))
	{
		$priceErr="*";
	}
	if(empty($_REQUEST['unit']))
	{
		$unitErr="*";
	}
	header("location:addtoiletries.php?err=$err&itemname=$_REQUEST[itemname]&itemnameErr=$itemnameErr&quantity=$_REQUEST[quantity]&quanErr=$quanErr&price=$_REQUEST[price]&priceErr=$priceErr&unit=$_REQUEST[unit]&unitErr=$unitErr");
	}
	else
	{
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	$dupe = mysql_query("SELECT * FROM tbltoiletries WHERE flditemname='$_POST[itemname]'") or die (mysql_error());
	$num_rows = mysql_num_rows($dupe);
		if ($num_rows > 0) 
		{
			echo" ";
			 $err = "Duplicate Item Name. Please enter a unique Item Name";
			$prodcodeErr="*";
		 	header("location:addtoiletries.php?err=$err&itemname=$_REQUEST[itemname]&itemnameErr=$itemnameErr");
		}
		else
	
	
		{
			if($_REQUEST['confbut'] == "YES")
			{
			$sql="INSERT INTO tbltoiletries (flditemname, fldquantity, fldprice, fldunit)
			VALUES
			('$_REQUEST[itemname]','$_REQUEST[quantity]','$_REQUEST[price]','$_REQUEST[unit]')";
			mysql_query($sql,$con);
			header("location:toiletriesinven.php");
			}
			else
			{
		 	header("location:addtoiletries.php?&itemname=$_REQUEST[itemname]&quantity=$_REQUEST[quantity]&price=$_REQUEST[price]&unit=$_REQUEST[unit]&conf=1");
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
                     
       
 
                       
       
<form action="addtoiletries.php" method="post">
<div class="">
<br><br>
<center>
<label > <font face="normal" color="grey" size="4">Item Name<span class="colorr"><?php echo $_REQUEST['itemnameErr']; ?> </span></label></font></span><br>
<input type="text" name="itemname" class="form-control" style="width:40%" value="<?php echo $_REQUEST['itemname']; ?>"><br>

<label > <font face="century gothic" color="grey" size="4"> Quantity<span class="colorr"><?php echo $_REQUEST['quanErr']; ?> </span></label></font><br>
<input type="text" name="quantity" class="form-control" style="width:40%" value="<?php echo $_REQUEST['quantity']; ?>">     
<br>
 <label > <font face="century gothic" color="grey" size="4"> Price<span class="colorr"><?php echo $_REQUEST['priceErr']; ?> </span></label></font><br>
<input type="text" name="price" class="form-control" style="width:40%" value="<?php echo $_REQUEST['price']; ?>">     

<br> 
<label > <font face="century gothic" color="grey" size="4"> Unit<span class="colorr"><?php echo $_REQUEST['unitErr']; ?> </span></label></font><br>
<input type="text" name="unit" class="form-control" style="width:40%" value="<?php echo $_REQUEST['unit']; ?>">     

<br>
<input type="submit" class="btn btn-default" value="Submit"  formmethod="post"> <a href="addtoiletries.php"><button type="button" class="btn btn-default">Clear</button></a></span>
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
   <div class='overlay3'> 
	<br><br><br>
   	<label><font	color="white">  Are you sure you want Add this Item?</font></label><br><br>
	<input type="submit"class="btn btn-default" name="confbut" value="YES" formmethod="post">&nbsp;nbsp;nbsp;nbsp;
	<a href="toiletriesinven.php"><button type="button" class="btn btn-default">NO</button></a></span>
	</div>
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


</body>
</html>