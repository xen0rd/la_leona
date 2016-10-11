<?php
include('session.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">


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
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="index.php">
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
					<a href="">Equipment Inventory</a>
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
			<label > <font face="century gothic" color="#f3be4b" size="6"> Add Supply </label></font>
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
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("dbresort", $con);
	$rest = mysql_query("SELECT fldproductname FROM tblitemscategory WHERE fldcategorycode = '$prodcodes' ");
	$quan = mysql_fetch_array($rest);
	
if(empty($_REQUEST['categorycode'])||empty($_REQUEST['productname']))
{
	$err = "Please fill all empty fields";
	if(empty($_REQUEST['categorycode']))
	{
		$categorycodeErr = "*";
	}
	if(empty($_REQUEST['productname']))
	{
		$productnameErr="*";
	}

	header("location:updatecategory.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&categorycode=$_REQUEST[categorycode]&categorycodeErr=$categorycodeErr&productname=$_REQUEST[productname]&productnameErr=$productnameErr&add=$add&delete=$delete");
}
else
{
	
		{
			if($_REQUEST['categorycode']==$_REQUEST['prodcode'])
			{
				if($_REQUEST['confbut'] == "YES")
				{
				$sql="UPDATE tblitemscategory SET fldcategorycode = '$_REQUEST[categorycode]', fldproductname = '$_REQUEST[productname]', fldproductname = '$_REQUEST[itemdescription]', fldstatus = '$_REQUEST[status]' WHERE fldcategorycode = '$_REQUEST[prodcode]'";
				mysql_query($sql);
				header("location:itemcategory.php");
				}
				else
				{
					header("location:updatecategory.php?prodcode=$_REQUEST[prodcode]&form=1&categorycode=$_REQUEST[categorycode]&productname=$_REQUEST[productname]&itemdescription=$_REQUEST[itemdescription]&conf=1");
				}
			}
			else
			{
				$dupe = mysql_query("SELECT * FROM tblitemscategory WHERE fldcategorycode='$_POST[categorycode]'") or die (mysql_error());
				$num_rows = mysql_num_rows($dupe);
				if ($num_rows > 0) 
				{
					
					$err = "Duplicate Product Code. Please enter a unique product code";
					$categorycodeErr="*";
					header("location:updatecategory.php?prodcode=$_REQUEST[prodcode]&form=1&err=$err&categorycode=$_REQUEST[categorycode]&categorycodeErr=$categorycodeErr&productname=$_REQUEST[productname]&itemdescription=$_REQUEST[itemdescription]");
				}
				else 
				{
					if($_REQUEST['confbut'] == "YES")
					{
					$sql="UPDATE tblitemscategory SET fldcategorycode = '$_REQUEST[categorycode]', fldproductname = '$_REQUEST[productname]', fldproductname = '$_REQUEST[itemdescription]' WHERE fldcategorycode = '$_REQUEST[prodcode]'";
					mysql_query($sql);
					header("location:itemcategory.php");
					}
					else
					{
					header("location:updatecategory.php?prodcode=$_REQUEST[prodcode]&form=1&categorycode=$_REQUEST[categorycode]&productname=$_REQUEST[productname]&itemdescription=$_REQUEST[itemdescription]&conf=1");
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
$res = mysql_query("SELECT * FROM tblitemscategory WHERE fldcategorycode = '$prodcode' ");
$fld = mysql_fetch_array($res);
$form = $_REQUEST['form'];

if($form == NULL)
{
	$categorycode = $fld['fldcategorycode'];
	$productname = $fld['fldproductname'];
	$itemdescription = $fld['flditemdescription'];

}
else if($form == 1)
{
	$categorycode = $_REQUEST['categorycode'];
	$productname = $_REQUEST['productname'];
	$itemdescription = $_REQUEST['itemdescription'];

	
}
?>
<form action="updatecategory.php" method="post">
<input type="hidden" name="form" value="1">
<input type="hidden" name="prodcode" value="<?php echo $_REQUEST['prodcode']; ?>">

<td><br><br><br><br><br>
Product Code: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  readonly name="categorycode" value="<?php echo $categorycode; ?>"><span class="colorr"><?php echo $_REQUEST['categorycodeErr']; ?></span>
<br>
Product Category: &nbsp;&nbsp;&nbsp;&nbsp;<select  name="productname" ><span class="colorr"><?php echo $_REQUEST['productnameErr']; ?></span>
						<option value="other" <?php echo isset($_REQUEST["productname"]) && $_REQUEST["productname"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Yes"  <?php echo isset($_REQUEST["productname"]) && $_REQUEST["productname"] == "Yes" ? "selected" : "Yes" ?>>Yes</option>
						<option value="No"  <?php echo isset($_REQUEST["productname"]) && $_REQUEST["productname"] == "No" ? "selected" : "No" ?>>No
						</option></select>
        <br>
<label > <font face="normal" color="grey" size="4"> Item Category Description: <span class="colorr"><?php echo $_REQUEST['itemdescriptionErr']; ?> </span></label></font><br>                                                                             
<input name="itemdescription"  type="text"  class="form-control" style="width:40%; height:20%;"  value="<?php echo $itemdescription; ?>">
     
                                                             

</span></td>

<?php
if($_REQUEST['conf']==NULL)
{
	?>
	<br><br><br><br>
	<input type="submit" class="buttons" value="Update" formmethod="post"> <a href="itemcategory.php"><input type="button" name="back" class="buttons" value="Back"></a></span>
	<?php
}
else if($_REQUEST['conf']==1)
{
	?>	
	<span class="confpos3" > <br><br><br><br><br> Are you sure you want to Update this product?<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" class="buttons" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="itemcategory.php"><button type="button" class="buttons">NO</button></a></span>
	<?php
}

?>
</form>
</table>