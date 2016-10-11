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
	$rest = mysql_query("SELECT fldequipquantity101 FROM tblroom101 WHERE flditemcode = '$prodcodes' ");
	$quan = mysql_fetch_array($rest);
	$tot = $quan['fldequipquantity101'] + $add;
if(empty($_REQUEST['itemcode'])||empty($_REQUEST['equipname101']))
{
	$err = "Please fill all empty fields";
	if(empty($_REQUEST['itemcode']))
	{
		$itemcodeErr = "*";
	}
	if(empty($_REQUEST['equipname101']))
	{
		$equipname101Err="*";
	}

	header("location:updateroom101.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&equipname101=$_REQUEST[equipname101]&equipname101Err=$equipname101Err&add=$add&delete=$delete");
}
else
{
	if($tot > 500)
	{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updateroom101.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&equipname101=$_REQUEST[equipname101]&add=$add&delete=$delete");
	}
	else if($tot <= 500 )
	{
		$tot = $tot - $delete;
		if($tot < 0)
		{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updateroom101.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&equipname101=$_REQUEST[equipname101]&add=$add&delete=$delete");			
		}
		else
		{
			if($_REQUEST['itemcode']==$_REQUEST['prodcode'])
			{
				if($_REQUEST['confbut'] == "YES")
				{
				$sql="UPDATE tblroom101 SET flditemcode = '$_REQUEST[itemcode]', fldequipname101 = '$_REQUEST[equipname101]', fldequipquantity101 = '$tot' WHERE flditemcode = '$_REQUEST[prodcode]'";
				mysql_query($sql);
				header("location:room101.php");
				}
				else
				{
					header("location:updateroom101.php?prodcode=$_REQUEST[prodcode]&form=1&itemcode=$_REQUEST[itemcode]&equipname101=$_REQUEST[equipname101]&equipquantity101=$_REQUEST[equipquantity101]&&add=$add&delete=$delete&conf=1");
				}
			}
			
			else
			{
				$dupe = mysql_query("SELECT * FROM tblroom101 WHERE flditemcode='$_POST[itemcode]'") or die (mysql_error());
				$num_rows = mysql_num_rows($dupe);
				if ($num_rows > 0) 
				{
					
					$err = "Duplicate Product Code. Please enter a unique product code";
					$itemcodeErr="*";
					header("location:updateroom101.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&equipname101=$_REQUEST[equipname101]&add=$add&delete=$delete");
				}
				else 
				{
					if($_REQUEST['confbut'] == "YES")
					{
					$sql="UPDATE tblroom101 SET flditemcode = '$_REQUEST[itemcode]', fldequipname101 = '$_REQUEST[equipname101]', fldequipquantity101 = '$tot' WHERE flditemcode = '$_REQUEST[prodcode]'";
					mysql_query($sql);
					header("location:room101.php");
					}
					else
					{
					header("location:updateroom101.php?prodcode=$_REQUEST[prodcode]&form=1&itemcode=$_REQUEST[itemcode]&equipname101=$_REQUEST[equipname101]&equipquantity101=$_REQUEST[equipquantity101]&&add=$add&delete=$delete&conf=1");
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
$res = mysql_query("SELECT * FROM tblroom101 WHERE flditemcode = '$prodcode' ");
$fld = mysql_fetch_array($res);
$form = $_REQUEST['form'];
$equipquantity101 = $fld['fldequipquantity101'];
if($form == NULL)
{
	$itemcode = $fld['flditemcode'];
	$equipname101 = $fld['fldequipname101'];

}
else if($form == 1)
{
	$itemcode = $_REQUEST['itemcode'];
	$equipname101 = $_REQUEST['equipname101'];
	
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<form action="updateroom101.php" method="post">
<input type="hidden" name="form" value="1">
<input type="hidden" name="prodcode" value="<?php echo $_REQUEST['prodcode']; ?>">

<br><br>
<center>
 <label > <font face="normal" color="grey" size="4">Item No.</font></label> <input readonly type="text"  class="form-control" style="width:40%" name="itemcode" value="<?php echo $itemcode; ?>"><span class="colorr"><?php echo $_REQUEST['itemcodeErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Item Name</font></label> <input type="text" class="form-control" style="width:40%" name="equipname101" value="<?php echo $equipname101; ?>"><span class="colorr"><?php echo $_REQUEST['equipname101Err']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Quantity</font></label> <input readonly type="text" class="form-control" style="width:40%" name="equipquantity101" value="<?php echo $equipquantity101; ?>"><span class="colorr"><?php echo $_REQUEST['equipquantity101Err']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Add</font></label> <input type="number"  class="form-control" style="width:40%"  name="add" value="<?php echo $_REQUEST['add']; ?>"> 
<label > <font face="normal" color="grey" size="4">Minus</font></label> <input type="number"  class="form-control" style="width:40%" name="delete" value="<?php echo $_REQUEST['delete']; ?>">
</span>

<?php
if($_REQUEST['conf']==NULL)
{
	?>
	<br>
	<input type="submit" class="buttons" value="Update" formmethod="post"> <a href="room101.php"><input type="button" name="back" class="buttons" value="Back"></a></span>
	<?php
}
else if($_REQUEST['conf']==1)
{	
	?>	
	<span class="confpos3" > <br><br><br><br><br> Are you sure you want to Update this product?<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="room101.php"><button type="button" class="buttons">NO</button></a></span>
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
