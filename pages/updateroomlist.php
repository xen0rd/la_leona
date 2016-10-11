<?php
include('session.php');
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
	$prodcodes = $_REQUEST['prodcode'];
	$add = $_REQUEST['add'];
	$delete = $_REQUEST['delete'];
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	$rest = mysql_query("SELECT fldquantity FROM tblroomlist WHERE fldroomnumber = '$prodcodes' ");
	$quan = mysql_fetch_array($rest);
	$tot = $quan['fldquantity'] + $add;
if(empty($_REQUEST['roomnumber'])||empty($_REQUEST['equipname']))
{
	$err = "Please fill all empty fields";
	if(empty($_REQUEST['roomnumber']))
	{
		$roomnumberErr = "*";
	}
	if(empty($_REQUEST['equipname']))
	{
		$equipnameErr="*";
	}

	header("location:updateroomlist.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&roomnumber=$_REQUEST[roomnumber]&roomnumberErr=$roomnumberErr&equipname=$_REQUEST[equipname]&equipnameErr=$equipnameErr&add=$add&delete=$delete");
}
else
{
	if($tot > 500)
	{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updateroomlist.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&roomnumber=$_REQUEST[roomnumber]&equipname=$_REQUEST[equipname]&add=$add&delete=$delete");
	}
	else if($tot <= 500 )
	{
		$tot = $tot - $delete;
		if($tot < 0)
		{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updateroomlist.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&roomnumber=$_REQUEST[roomnumber]&equipname=$_REQUEST[equipname]&add=$add&delete=$delete");			
		}
		else
		{
			if($_REQUEST['roomnumber']==$_REQUEST['prodcode'])
			{
				if($_REQUEST['confbut'] == "YES")
				{
				$sql="UPDATE tblroomlist SET fldroomnumber = '$_REQUEST[roomnumber]', fldequipname = '$_REQUEST[equipname]', fldquantity = '$tot' WHERE fldroomnumber = '$_REQUEST[prodcode]'";
				mysql_query($sql);
				header("location:roomlist.php");
				}
				else
				{
					header("location:updateroomlist.php?prodcode=$_REQUEST[prodcode]&form=1&roomnumber=$_REQUEST[roomnumber]&equipname=$_REQUEST[equipname]&add=$add&delete=$delete&conf=1");
				}
			}
			else
			{
				$dupe = mysql_query("SELECT * FROM tblroomlist WHERE fldroomnumber='$_POST[roomnumber]'") or die (mysql_error());
				$num_rows = mysql_num_rows($dupe);
				if ($num_rows > 0) 
				{
					
					$err = "Duplicate Product Code. Please enter a unique product code";
					$itemcodeErr="*";
					header("location:updateroomlist.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&roomnumber=$_REQUEST[roomnumber]&roomnumberErr=$roomnumberErr&equipname=$_REQUEST[equipname]&add=$add&delete=$delete");
				}
				else 
				{
					if($_REQUEST['confbut'] == "YES")
					{
					$sql="UPDATE tblroomlist SET fldroomnumber = '$_REQUEST[roomnumber]', fldequipname = '$_REQUEST[equipname]', fldquantity = '$tot' WHERE fldroomnumber = '$_REQUEST[prodcode]'";
					mysql_query($sql);
					header("location:roomlist.php");
					}
					else
					{
					header("location:updateroomlist.php?prodcode=$_REQUEST[prodcode]&form=1&roomnumber=$_REQUEST[roomnumber]&equipname=$_REQUEST[equipname]&add=$add&delete=$delete&conf=1");
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
$res = mysql_query("SELECT * FROM tblroomlist WHERE fldroomnumber = '$prodcode' ");
$fld = mysql_fetch_array($res);
$form = $_REQUEST['form'];
$quantity = $fld['fldquantity'];
if($form == NULL)
{
	$roomnumber = $fld['fldroomnumber'];
	$equipname = $fld['fldequipname'];
	$code = $fld['flditemcode'];

}
else if($form == 1)
{
	$roomnumber = $_REQUEST['roomnumber'];
	$equipname = $_REQUEST['equipname'];
	$code = $_REQUEST['code'];
	
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<form action="updateroomlist.php" method="post">
<input type="hidden" name="form" value="1">
<input type="hidden" name="prodcode" value="<?php echo $_REQUEST['prodcode']; ?>">

<br><br>
<center>
 <label > <font face="normal" color="grey" size="4"></font></label> <input  type="hidden"  class="form-control" style="width:40%" name="code" value="<?php echo $code; ?>"><span class="colorr"><br>

 <label > <font face="normal" color="grey" size="4">Room No.</font></label> <input  type="text"  class="form-control" style="width:40%" name="roomnumber" value="<?php echo $roomnumber; ?>"><span class="colorr"><?php echo $_REQUEST['roomnumberErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Equipment Name</font></label> <input type="text" class="form-control" style="width:40%" name="equipname" value="<?php echo $equipname; ?>"><span class="colorr"><?php echo $_REQUEST['equipnameErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Quantity</font></label> <input disabled type="text" class="form-control" style="width:40%" name="quantity" value="<?php echo $quantity; ?>"><span class="colorr"><?php echo $_REQUEST['quanErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Add</font></label> <input type="number"  class="form-control" style="width:10%"  name="add" value="<?php echo $_REQUEST['add']; ?>"> 

<label > <font face="normal" color="grey" size="4">Minus</font></label> <input type="number"  class="form-control" style="width:10%" name="delete" value="<?php echo $_REQUEST['delete']; ?>">
<span class="colorr"><?php echo $_REQUEST['stocksErr']; ?></span><br>
</span>

<?php
if($_REQUEST['conf']==NULL)
{
	?>
	<br>
	<input type="submit" class="buttons" value="Update" formmethod="post"> <a href="roomlist.php"><input type="button" name="back" class="buttons" value="Back"></a></span>
	<?php
}
else if($_REQUEST['conf']==1)
{	
	?>	
	<div class='overlay2'> 
	<br><br><br>
   	<label><font	color="white">  Are you sure you want Add this Item?</font></label><br><br>
   	<input type="submit"  class='btn btn-success' name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="roomlist.php"><button type="button"  class='btn btn-success'>NO</button></a></span>
	</div>
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
