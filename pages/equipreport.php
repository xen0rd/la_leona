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
      <li> <a href="supplyinven.php" style='text-decoration:none'> Supply Inventory</a></li>
      <li> <a href="equipinven.php" style='text-decoration:none'> Equipment Inventory</a></li>
    </ul>
  </li>
  
  <li>Reserved </li>
  <li>Walk-in</li>
  <li>Reports
      <ul>
      <li> <a href="reports.php" style='text-decoration:none'>Food Inventory Report</a></li>
      <li> <a href="supreport.php" style='text-decoration:none'> Supply Inventory Report</a></li>
      <li> <a href="equipreport.php" style='text-decoration:none'> Equipment Inventory Report</a></li>
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
</ul>

</div>


<?php

error_reporting(0);


echo "<table class=tbldesign> <br><br><br><br><br><br>
<tr bgcolor='#8B0000'>
<th width=200><font color='white'>Item Code</font></th>
<th width=200><font color='white'>Item Name</font></th>
<th width=200><font color='white'>Quantity Left</font></th>
</tr> ";
echo "<button input  class='butpo buttonz' type='button' > <a target = '_blank' href='printequip.php' style='text-decoration:none;'>  Print a copy </button></a></span>";
echo "</th>";
echo "</tr> ";

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("dbresort", $con);
$result = mysql_query("SELECT * FROM tblequipinven");
while($row = mysql_fetch_array($result))
  { 
  echo "<tr class='tdpos'>";
  echo "<td align='center' width=200 height=40  class='tdpos'>" . $row['flditemcode'] . "</a></td>";
  echo "<td align='center' width=400  class='tdpos'>" . $row['flditemname'] . "</td>";
  echo "<td align='center' width=200 class='tdpos'>" . $row['fldquantity'] . "</td>";


	echo "</tr>";
}
  echo "<tr><td align='center' width=200></td>";
  echo "<td align='center' width=200></td>";
  echo "<td align='center' width=200></td>";


mysql_close($con);
?> 
	
	</table>

