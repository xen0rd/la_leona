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

if(empty($_REQUEST['itemcode'])||empty($_REQUEST['itemname'])||empty($_REQUEST['quantity']))
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
	if(empty($_REQUEST['quantity']))
	{
		$quanErr="*";
	}
	
	
	header("location:addsupply.php?err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&itemname=$_REQUEST[itemname]&itemnameErr=$itemnameErr&quantity=$_REQUEST[quantity]&quanErr=$quanErr");
}
else
{
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	$dupe = mysql_query("SELECT * FROM tblsupplyinven WHERE flditemcode='$_POST[itemcode]'") or die (mysql_error());
	$num_rows = mysql_num_rows($dupe);
		if ($num_rows > 0) 
		{
			$err = "Duplicate Item Code. Please enter a unique item code";
			$prodcodeErr="*";
		 	header("location:addsupply.php?err=$err&itemcode=$_REQUEST[itemcode]&itemcodeErr=$itemcodeErr&itemname=$_REQUEST[itemname]&quantity=$_REQUEST[quantity]");
		}
		else
		{
			if($_REQUEST['confbut'] == "YES")
			{
			$sql="INSERT INTO tblsupplyinven (flditemcode, flditemname, fldquantity)
			VALUES
			('$_REQUEST[itemcode]','$_REQUEST[itemname]','$_REQUEST[quantity]')";
			mysql_query($sql,$con);
			header("location:supplyinventory.php");
			}
			else
			{
		 	header("location:addsupply.php?&itemcode=$_REQUEST[itemcode]&itemname=$_REQUEST[itemname]&quantity=$_REQUEST[quantity]&conf=1");
			}
		}
	}
}


$err = $_REQUEST['err'];


echo "<span class='colorr'><br><br><br><br>";
echo $err;
echo "</span>";
echo "</td>";


?>
<br><br><br><br><br><br>
<form action="addsupply.php" method="post"><br>
Item Code: &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="itemcode" value="<?php echo $_REQUEST['itemcode']; ?>"><span class="colorr"><?php echo $_REQUEST['itemcodeErr']; ?></span><br><br>
Item Type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="itemname" value="<?php echo $_REQUEST['itemname']; ?>"><span class="colorr"><?php echo $_REQUEST['itemnameErr']; ?></span><br><br>
Quantity: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="quantity" value="<?php echo $_REQUEST['quantity']; ?>"><span class="colorr"><?php echo $_REQUEST['quanErr']; ?></span><br> </span>
</span>
</td>
<td>
<span class="spanpos4">

<?php
if($_REQUEST['conf']==NULL)
{
	?>
</span><span class="compos2"><input type="submit" class="buttons" value="Submit"  formmethod="post"> <a href="addsupply.php"><button type="button" class="buttons">Clear</button></a></span>
<?php
}
if($_REQUEST['conf']==1)
{
	?>	
	<span class="confpos3" > <br><br><br><br><br> Are you sure you want Add this Item?<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="supplyinven.php"><button type="button" class="buttons">NO</button></a></span>
	<?php
}
?>
</form>
</table>
