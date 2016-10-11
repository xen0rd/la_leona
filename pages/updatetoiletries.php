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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Update Item </label></font>
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
	$rest = mysql_query("SELECT fldquantity FROM tbltoiletries WHERE flditemcode = '$prodcodes' ");
	$quan = mysql_fetch_array($rest);
	$tot = $quan['fldquantity'] + $add;
if(empty($_REQUEST['itemcode'])||empty($_REQUEST['itemname'])||empty($_REQUEST['price'])||empty($_REQUEST['unit']))
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
	if(empty($_REQUEST['price']))
	{
		$priceErr="*";
	}
	if(empty($_REQUEST['unit']))
	{
		$unitErr="*";
	}
	header("location:updatetoiletries.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&itemname=$_REQUEST[itemname]&itemnameErr=$itemnameErr&price=$_REQUEST[price]&priceErr=$priceErr&unit=$_REQUEST[unit]&unitErr=$unitErr&add=$add&delete=$delete");
}
else
{
	if($tot > 500)
	{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updatetoiletries.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&add=$add&delete=$delete");
	}
	else if($tot <= 500 )
	{
		$tot = $tot - $delete;
		if($tot < 0)
		{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updatetoiletries.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&add=$add&delete=$delete");			
		}
		else
		{
			if($_REQUEST['itemcode']==$_REQUEST['prodcode'])
			{
				if($_REQUEST['jj'] == "YES")
				{
				$sql="UPDATE tbltoiletries SET flditemcode = '$_REQUEST[itemcode]', flditemname = '$_REQUEST[itemname]', fldprice = '$_REQUEST[price]',fldunit = '$_REQUEST[unit]', fldquantity = '$tot' WHERE flditemcode = '$_REQUEST[prodcode]'";
				mysql_query($sql);
				header("location:toiletriesinven.php");
				}
				else
				{
					header("location:updatetoiletries.php?prodcode=$_REQUEST[prodcode]&form=1&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&price=$_REQUEST[price]&unit=$_REQUEST[unit]&add=$add&delete=$delete&conf=1");
				}
			}
			else
			{
				$dupe = mysql_query("SELECT * FROM tbltoiletries WHERE flditemcode='$_POST[itemcode]'") or die (mysql_error());
				$num_rows = mysql_num_rows($dupe);
				if ($num_rows > 0) 
				{
					
					$err = "Duplicate Product Code. Please enter a unique product code";
					$itemcodeErr="*";
					header("location:updatetoiletries.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&itemname=$_REQUEST[itemname]&price=$_REQUEST[price]&unit=$_REQUEST[unit]&&add=$add&delete=$delete");
				}
				else 
				{
					if($_REQUEST['jj'] == "YES")
					{
					$sql="UPDATE tbltoiletries SET flditemcode = '$_REQUEST[itemcode]', flditemname = '$_REQUEST[itemname]',fldprice = '$_REQUEST[price]',fldunit = '$_REQUEST[unit]', fldquantity = '$tot' WHERE flditemcode = '$_REQUEST[prodcode]'";
					mysql_query($sql);
					header("location:toiletriesinven.php");
					}
					else
					{
					header("location:updatetoiletries.php?prodcode=$_REQUEST[prodcode]&form=1&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&price=$_REQUEST[price]&unit=$_REQUEST[unit]&&add=$add&delete=$delete&conf=1");
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
$res = mysql_query("SELECT * FROM tbltoiletries WHERE flditemcode = '$prodcode' ");
$fld = mysql_fetch_array($res);
$form = $_REQUEST['form'];
$quantity = $fld['fldquantity'];
if($form == NULL)
{
	$itemcode = $fld['flditemcode'];
	$itemname = $fld['flditemname'];
	$price = $fld['fldprice'];
	$unit = $fld['fldunit'];
}
else if($form == 1)
{
	$itemcode = $_REQUEST['itemcode'];
	$itemname = $_REQUEST['itemname'];
	$price = $_REQUEST['price'];
	$unit = $_REQUEST['unit'];
	
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<form action="updatetoiletries.php" method="post">
<input type="hidden" name="form" value="1">
<input type="hidden" name="prodcode" value="<?php echo $_REQUEST['prodcode']; ?>">

<br><br>
<center>
 <label > <font face="normal" color="grey" size="4">Item No.</font></label> <input  type="text"  class="form-control" style="width:40%" name="itemcode" value="<?php echo $itemcode; ?>"><span class="colorr"><?php echo $_REQUEST['itemcodeErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Item Name</font></label> <input type="text" class="form-control" style="width:40%" name="itemname" value="<?php echo $itemname; ?>"><span class="colorr"><?php echo $_REQUEST['itemnameErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Stocks</font></label> <input disabled type="text" class="form-control" style="width:40%" name="quantity" value="<?php echo $quantity; ?>"><span class="colorr"><?php echo $_REQUEST['quanErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Add</font></label> <input type="number"   style="width:8%"  name="add" value="<?php echo $_REQUEST['add']; ?>"> 
<label > <font face="normal" color="grey" size="4">Minus</font></label> <input type="number"   style="width:8%" name="delete" value="<?php echo $_REQUEST['delete']; ?>"><br>
<label > <font face="normal" color="grey" size="4">Price</font></label> <input  type="text" class="form-control" style="width:40%" name="price" value="<?php echo $price; ?>"><span class="colorr"><?php echo $_REQUEST['priceErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Unit</font></label> <input  type="text" class="form-control" style="width:40%" name="unit" value="<?php echo $unit; ?>"><span class="colorr"><?php echo $_REQUEST['unitErr']; ?></span><br>

</span>

<?php
if($_REQUEST['conf']==NULL)
{
	?>
	<br>
	<input type="submit" class="btn btn-default" value="Update" formmethod="post"> <a href="toiletriesinven.php"><input type="button" name="back" class="btn btn-default" value="Back"></a></span>
	<?php
}
else if($_REQUEST['conf']==1)
{	
	?>	
	<div class='overlay2'> 
	<br><br><br>
	<label><font	color="white">  Are you sure you want Update this Item?</font></label><br><br>
	<input type="submit" class="btn btn-default" name="jj" value="YES" formmethod="post">&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="toiletriesinven.php"><button type="button" class="btn btn-default">NO</button></a></span>
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
