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
			<label > <font face="century gothic" color="#f3be4b" size="5"> Update Item </label></font>
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
	$prodcodes = $_REQUEST['prodcode'];
	$add = $_REQUEST['add'];
	$delete = $_REQUEST['delete'];
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	$rest = mysql_query("SELECT fldquantity FROM tblroominven WHERE flditemcode = '$prodcodes' ");
	$quan = mysql_fetch_array($rest);
	$tot = $quan['fldquantity'] + $add;
if(empty($_REQUEST['itemcode'])||empty($_REQUEST['itemname']))
{
	$err = "Please fill all empty fields";
	if(empty($_REQUEST['itemcode']))
	{
		$itemcodeErr = "*";
	}
	if(empty($_REQUEST['itemname']))
	{
		$itemnameErr="*";
	}

	header("location:updateroom.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&itemname=$_REQUEST[itemname]&itemnameErr=$itemnameErr&add=$add&delete=$delete");
}
else
{
	if($tot > 500)
	{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updateroom.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&add=$add&delete=$delete");
	}
	else if($tot <= 500 )
	{
		$tot = $tot - $delete;
		if($tot < 0)
		{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updateroom.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&add=$add&delete=$delete");			
		}
		else
		{
			if($_REQUEST['itemcode']==$_REQUEST['prodcode'])
			{
				if($_REQUEST['confbut'] == "YES")
				{
				$sql="UPDATE tblroominven SET flditemcode = '$_REQUEST[itemcode]', flditemname = '$_REQUEST[itemname]', fldquantity = '$tot' WHERE flditemcode = '$_REQUEST[prodcode]'";
				mysql_query($sql);
				header("location:roominven.php");
				}
				else
				{
					header("location:updateroom.php?prodcode=$_REQUEST[prodcode]&form=1&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&&add=$add&delete=$delete&conf=1");
				}
			}
			
			else
			{
				$dupe = mysql_query("SELECT * FROM tblroominven WHERE flditemcode='$_POST[itemcode]'") or die (mysql_error());
				$num_rows = mysql_num_rows($dupe);
				if ($num_rows > 0) 
				{
					
					$err = "Duplicate Product Code. Please enter a unique product code";
					$itemcodeErr="*";
					header("location:updateroom.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&itemname=$_REQUEST[itemname]&add=$add&delete=$delete");
				}
				else 
				{
					if($_REQUEST['confbut'] == "YES")
					{
					$sql="UPDATE tblroominven SET flditemcode = '$_REQUEST[itemcode]', flditemname = '$_REQUEST[itemname]', fldquantity = '$tot' WHERE flditemcode = '$_REQUEST[prodcode]'";
					mysql_query($sql);
					header("location:roominven.php");
					}
					else
					{
					header("location:updateroom.php?prodcode=$_REQUEST[prodcode]&form=1&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&add=$add&delete=$delete&conf=1");
					}
				}
			}
		}
	}

}
mysql_close($con);
}

$err = $_REQUEST['err'];


echo "<span class='colorr'> <br> <br>";
echo $err;



?>

<?php
$prodcode=$_REQUEST['prodcode'];
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
$res = mysql_query("SELECT * FROM tblroominven WHERE flditemcode = '$prodcode' ");
$fld = mysql_fetch_array($res);
$form = $_REQUEST['form'];
$quantity = $fld['fldquantity'];
if($form == NULL)
{
	$itemcode = $fld['flditemcode'];
	$itemname = $fld['flditemname'];

}
else if($form == 1)
{
	$itemcode = $_REQUEST['itemcode'];
	$itemname = $_REQUEST['itemname'];
	
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<form action="updateroom.php" method="post">
<input type="hidden" name="form" value="1">
<input type="hidden" name="prodcode" value="<?php echo $_REQUEST['prodcode']; ?>">

<br><br>
<center>
 <label > <font face="normal" color="grey" size="4">Item No.:</font></label> <input readonly type="text"  class="form-control" style="width:40%" name="itemcode" value="<?php echo $itemcode; ?>"><span class="colorr"><?php echo $_REQUEST['itemcodeErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Item Name:</font></label> <input type="text" class="form-control" style="width:40%" name="itemname" value="<?php echo $itemname; ?>"><span class="colorr"><?php echo $_REQUEST['itemnameErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Stocks:</font></label> <input disabled type="text" class="form-control" style="width:40%" name="quantity" value="<?php echo $quantity; ?>"><span class="colorr"><?php echo $_REQUEST['quanErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Add</font></label> <input type="number"  class="form-control" style="width:40%"  name="add" value="<?php echo $_REQUEST['add']; ?>"> 
<label > <font face="normal" color="grey" size="4">Minus</font></label> <input type="number"  class="form-control" style="width:40%" name="delete" value="<?php echo $_REQUEST['delete']; ?>">
<span class="colorr"><?php echo $_REQUEST['stocksErr']; ?></span><br>
</span>

<?php
if($_REQUEST['conf']==NULL)
{
	?>
	<br>
	<input type="submit" class="buttons" value="Update" formmethod="post"> <a href="roominven.php"><input type="button" name="back" class="buttons" value="Back"></a></span>
	<?php
}
else if($_REQUEST['conf']==1)
{	
	?>	
	<span class="confpos3" > <br><br><br><br><br> Are you sure you want to Update this product?<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="roominven.php"><button type="button" class="buttons">NO</button></a></span>
	<?php
}

?>
</form>
    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

	 </div>
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

			