<?php
include('session.php');
?>

<html>
<head><link rel="stylesheet" href="index.css" type="text/css" media="screen"/>	
<style type="text/css">
<link rel="stylesheet" type="text/css" href="design.css" />
</style>
</head>
<body>
<div id="header">
<a href="index.html" class="colorh"> <img src="logo.png" style="margin-top: 0px;" width="350px" height="150px" align="left"> </a>


<ul><li>Inventory
      <ul>
      <li> <a href="inventory.php" style='text-decoration:none'> Food Inventory </a></li>
      <li><a href="supplyinven.php" style='text-decoration:none'>Supply Inventory</a></li>
      <li><a href="equipinven.php" style='text-decoration:none'>Equipment Inventory</a></li>
    </ul>
  </li>
  
  <li>Reserved </li>
  <li>Walk-in</li>
  <li>Reports
      <ul>
      <li> <a href="reports.php" style='text-decoration:none'>Food Inventory Report</a></li>
      <li><a href="supreport.php" style='text-decoration:none'>Supply Inventory Report</a></li>
      <li><a href="equipreport.php" style='text-decoration:none'>Equipment Inventory Report</a></li>
	   <li>Reservation Report</li>
	     <li>Sales Report</li>
    </ul>
	</li>
	<li> System User:  <?php echo $login_session; ?>
<ul>
<?php 
echo "<li> <b id='logout'><a href='logout.php'style='text-decoration:none'>Log Out</a></li>"
?>
<li> Change Password </li>
	</ul>
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
	$rest = mysql_query("SELECT fldquantity FROM tblsupplyinven WHERE flditemcode = '$prodcodes' ");
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

	header("location:updatesup.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&itemname=$_REQUEST[itemname]&itemnameErr=$itemnameErr&add=$add&delete=$delete");
}
else
{
	if($tot > 500)
	{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updatesup.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&add=$add&delete=$delete");
	}
	else if($tot <= 500 )
	{
		$tot = $tot - $delete;
		if($tot < 0)
		{
		$stocsErr = "*";
		$err = "Please add/reduce stocks Correctly. Minimum of 1 and maximum of 500 stocks per product";
		header("location:updatesup.php?stocksErr=$stocksErr&prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&add=$add&delete=$delete");			
		}
		else
		{
			if($_REQUEST['itemcode']==$_REQUEST['prodcode'])
			{
				if($_REQUEST['confbut'] == "YES")
				{
				$sql="UPDATE tblsupplyinven SET flditemcode = '$_REQUEST[itemcode]', flditemname = '$_REQUEST[itemname]', fldquantity = '$tot' WHERE flditemcode = '$_REQUEST[prodcode]'";
				mysql_query($sql);
				header("location:supplyinven.php");
				}
				else
				{
					header("location:updatesup.php?prodcode=$_REQUEST[prodcode]&form=1&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&&add=$add&delete=$delete&conf=1");
				}
			}
			else
			{
				$dupe = mysql_query("SELECT * FROM tblsupplyinven WHERE flditemcode='$_POST[itemcode]'") or die (mysql_error());
				$num_rows = mysql_num_rows($dupe);
				if ($num_rows > 0) 
				{
					
					$err = "Duplicate Product Code. Please enter a unique product code";
					$itemcodeErr="*";
					header("location:updatesup.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&itemname=$_REQUEST[itemname]&add=$add&delete=$delete");
				}
				else 
				{
					if($_REQUEST['confbut'] == "YES")
					{
					$sql="UPDATE tblsupplyinven SET flditemcode = '$_REQUEST[itemcode]', flditemname = '$_REQUEST[itemname]', fldquantity = '$tot' WHERE flditemcode = '$_REQUEST[prodcode]'";
					mysql_query($sql);
					header("location:supplyinven.php");
					}
					else
					{
					header("location:updatesup.php?prodcode=$_REQUEST[prodcode]&form=1&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&add=$add&delete=$delete&conf=1");
					}
				}
			}
		}
	}

}
mysql_close($con);
}

$err = $_REQUEST['err'];


echo "<span class='colorr'> <br><br><br><br> ";
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
$res = mysql_query("SELECT * FROM tblsupplyinven WHERE flditemcode = '$prodcode' ");
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
<form action="updatesup.php" method="post">
<input type="hidden" name="form" value="1">
<input type="hidden" name="prodcode" value="<?php echo $_REQUEST['prodcode']; ?>">
<table >
<td><br><br><br><br><br>
Item Code: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"   name="itemcode" value="<?php echo $itemcode; ?>"><span class="colorr"><?php echo $_REQUEST['itemcodeErr']; ?></span><br><br>
Item Type: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="itemname" value="<?php echo $itemname; ?>"><span class="colorr"><?php echo $_REQUEST['itemnameErr']; ?></span><br><br>
Stocks: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="text" name="quantity" value="<?php echo $quantity; ?>"><span class="colorr"><?php echo $_REQUEST['quanErr']; ?></span><br><br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ <input type="number" style="width:45px" name="add" value="<?php echo $_REQUEST['add']; ?>"> 
- <input type="number" style="width:45px" name="delete" value="<?php echo $_REQUEST['delete']; ?>"><span class="colorr"><?php echo $_REQUEST['stocksErr']; ?></span><br>
</span></td>

<?php
if($_REQUEST['conf']==NULL)
{
	?>
	<br><br><br><br>
	<input type="submit" class="buttons" value="Update" formmethod="post"> <a href="supplyinven.php"><input type="button" name="back" class="buttons" value="Back"></a></span>
	<?php
}
else if($_REQUEST['conf']==1)
{
	?>	
	<span class="confpos3" > <br><br><br><br><br> Are you sure you want to Update this product?<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="supplyinven.php"><button type="button" class="buttons">NO</button></a></span>
	<?php
}

?>
</form>
</table>
