<?php
include('sessionadmin.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style1.css" type="text/css">


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

	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie.css">
	<![endif]-->
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
	$rest = mysql_query("SELECT fldequipquantity FROM room WHERE fldequipmentcode = '$prodcodes' ");
	$quan = mysql_fetch_array($rest);
	$tot = $quan['fldequipquantity'] + $add;

	if($tot > 500)
	{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:damaged_equipment_update.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&fldequipmentcode=$_REQUEST[fldequipmentcode]&fldequipname=$_REQUEST[fldequipname]&add=$add&delete=$delete");	
	}
	else if($tot <= 500 )
	{
		$tot = $tot - $delete;
		if($tot < 0)
		{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:damaged_equipment_update.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&fldequipmentcode=$_REQUEST[fldequipmentcode]&fldequipname=$_REQUEST[fldequipname]&add=$add&delete=$delete");			
		}
		else
		{
			if($_REQUEST['fldequipmentcode']==$_REQUEST['prodcode'])
			{
				if($_REQUEST['confbut'] == "YES")
				{
				$sql="UPDATE room SET fldequipmentcode = '$_REQUEST[fldequipmentcode]', fldequipname = '$_REQUEST[fldequipname]',fldstatuss = '$_REQUEST[fldstatuss]', fldequipquantity = '$tot' WHERE fldequipmentcode = '$_REQUEST[prodcode]'";
				mysql_query($sql);
				header("location:room101.php?id=$_REQUEST[room]");
				}
				else
				{
					header("location:damaged_equipment_update.php?room=$_REQUEST[room]&prodcode=$_REQUEST[prodcode]&form=1&fldequipmentcode=$_REQUEST[fldequipmentcode]&fldequipname=$_REQUEST[fldequipname]&fldequipquantity=$_REQUEST[fldequipquantity]&fldstatuss=$_REQUEST[fldstatuss]&fldroomname=$_REQUEST[fldroomname]&&add=$add&delete=$delete&conf=1");
				}
			}
			else
			{
				$dupe = mysql_query("SELECT * FROM room WHERE fldequipmentcode='$_POST[fldequipmentcode]'") or die (mysql_error());
				$num_rows = mysql_num_rows($dupe);
				if ($num_rows > 0) 
				{
					
					$err = "Duplicate Product Code. Please enter a unique product code";
					$itemcodeErr="*";
					header("location:damaged_equipment_update.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&fldequipmentcode=$_REQUEST[fldequipmentcode]&fldequipmentcodeErr=$fldequipmentcodeErr&fldequipname=$_REQUEST[fldequipname]&fldequipquantity=$_REQUEST[fldequipquantity]&fldstatuss=$_REQUEST[fldstatuss]&fldroomname=$_REQUEST[fldroomname]&add=$add&delete=$delete");
				}
				else 
				{
					if($_REQUEST['confbut'] == "YES")
					{
					$sql="UPDATE room SET fldequipmentcode = '$_REQUEST[fldequipmentcode]', fldequipname = '$_REQUEST[fldequipname]',fldstatuss = '$_REQUEST[fldstatuss]',fldroomname = '$_REQUEST[fldroomname]', fldequipquantity = '$tot' WHERE fldequipmentcode = '$_REQUEST[prodcode]'";
					mysql_query($sql);
					header("location:room101.php?id=$_REQUEST[room]");
					}
					else
					{
					header("location:damaged_equipment_update.php?room=$_REQUEST[room]&prodcode=$_REQUEST[prodcode]&form=1&fldequipmentcode=$_REQUEST[fldequipmentcode]&fldequipname=$_REQUEST[fldequipname]&fldequipquantity=$_REQUEST[fldequipquantity]&fldstatuss=$_REQUEST[fldstatuss]&fldroomname=$_REQUEST[fldroomname]&&add=$add&delete=$delete&conf=1");
					}
				}
			}
		}
	

}
mysql_close($con);
}

$err = $_REQUEST['err'];


echo "<span class='colorr'> <br><br> ";
echo $err;



?>

<?php

   
$prodcode=$_REQUEST['prodcode'];
$room = $_REQUEST['room'];
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
$res = mysql_query("SELECT * FROM room WHERE fldequipmentcode = '$prodcode' ");
$fld = mysql_fetch_array($res);
$form = $_REQUEST['form'];
$quantity = $fld['fldequipquantity'];
if($form == NULL)
{
	$room_name = $fld['fldroomname'];
	$equipmentcode = $fld['fldequipmentcode'];
	$equip_name = $fld['fldequipname'];
	$quantity = $fld['fldequipquantity'];
	$status = $fld['fldstatuss'];
}
else if($form == 1)
{
	$room_name = $_REQUEST['fldroomname'];
	$equipmentcode = $_REQUEST['fldequipmentcode'];
	$equip_name = $_REQUEST['fldequipname'];
	$quantity = $_REQUEST['fldequipquantity'];
	$status = $_REQUEST['fldstatuss'];
}
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<form action="damaged_equipment_update.php" method="post">
<input type="hidden" name="form" value="1">
<input type="hidden" name="prodcode" value="<?php echo $_REQUEST['prodcode']; ?>">

<br><br>
<center>
 <label > <font face="normal" color="grey" size="4">Room No</font></label> <input  type="text"  class="form-control" style="width:40%" name="room" value="<?php echo $room; ?>"><span class="colorr"><?php echo $_REQUEST['itemcodeErr']; ?></span><br>

 <label > <font face="normal" color="grey" size="4">Equipment Code</font></label> <input  type="text"  class="form-control" style="width:40%" name="fldequipmentcode" value="<?php echo $equipmentcode; ?>"><span class="colorr"><?php echo $_REQUEST['itemcodeErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Equipment Name</font></label> <input type="text" class="form-control" style="width:40%" name="fldequipname" value="<?php echo $equip_name; ?>"><span class="colorr"><?php echo $_REQUEST['itemnameErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Quantity</font></label> <input disabled type="text" class="form-control" style="width:40%" name="fldequipquantity" value="<?php echo $quantity; ?>"><span class="colorr"><?php echo $_REQUEST['quanErr']; ?></span><br>
<label > <font face="normal" color="grey" size="4">Add</font></label> <input type="number"   style="width:8%"  name="add" value="<?php echo $_REQUEST['add']; ?>"> 
<label > <font face="normal" color="grey" size="4">Minus</font></label> <input type="number"   style="width:8%" name="delete" value="<?php echo $_REQUEST['delete']; ?>"><br>
<label > <font face="normal" color="grey" size="4">Status</font></label> <input  type="text" class="form-control" style="width:40%" name="fldstatuss" value="<?php echo $status; ?>"><span class="colorr"><?php echo $_REQUEST['unitErr']; ?></span><br>
</span>

<?php
if($_REQUEST['conf']==NULL)
{
	?>
	<br>
	<input type="submit" class="btn btn-default" value="Update" formmethod="post"> <a href="room101.php"><input type="button" name="back" class="btn btn-default" value="Back"></a></span>
	<?php
}
else if($_REQUEST['conf']==1)
{
	?>	
<div class='overlay5'> 
	<br><br><br>
	<label><font	color="white">  Are you sure you want Update this Item?</font></label><br><br>
		<input type="submit" class="btn btn-default" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="room101.php"><button type="button" class="btn btn-default">NO</button></a></span>
	</div>
	<?php
}

?>
</form>
    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

	 </div>