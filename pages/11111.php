<?php
include('session.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="index.css" type="text/css">

</style>
</head>

	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie.css">
	<![endif]-->
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="admin1.php">
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



$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$red = 0;
mysql_select_db("dbresort", $con);

$result = mysql_query("SELECT * FROM tblfoodinven ORDER BY flditemcode ASC");
$dis = mysql_query("SELECT * FROM tblfoodinven WHERE fldquantity = 0");
	while(mysql_fetch_array($dis))
	{
		$red = $red + 1;
	}
echo "<table align='center'><br><br><br>" ;
echo "<tr>";
echo "<td  align='center'>";
echo " <form action='inventory.php' method='post'>";
echo "<input type='text'style='  width: 300px;
  height: 30px;
  background: #2b303b;
  border: none;
  font-size: 10pt;
  color: #fff;
  padding-left: 15px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px' name='box' size=20 placeholder='SearchItems...'> $nbsp"; 
echo "<input type='submit'  name='search' my value='Search'> ";
echo "<input type='submit'  name='all' my value='All'> " ;
echo "<input type='submit' name='add'  my value='Add'>";
echo "</font>";

echo "</td>";
echo "</tr>"; 

echo "<td align='center'>";
	if($red > 0)
	{
		
		echo "<span class='colorr' align='center'> $red of your Item is already out of stocks. </span><br>";
		echo "<input type='submit' class='button1' name='dis' my value='Click Here To View'> ";
		
	}

echo "</td>";
echo "<tr> ";
echo "<td align='center'>";
echo "<div class='CSSTableGenerator' >";
echo "<table class='tbldesign'>
<tr bgcolor='#8B0000'>
<th width='100'><font color='white'>Item No. </font></th>
<th width='100'><font color='white'>Item Name </font></th>
<th width='100'><font color='white'>Item Category </font></th>
<th width='100'><font color='white'>Quantity </font></th>
<th width='50'></th>
<th width='60'></th>
<th width='60'></th>
</tr> ";

echo "</th>";
echo "</tr> ";
echo "</div>";

if($_SERVER["REQUEST_METHOD"] == "POST") {

$buttontext = $_REQUEST['box'];
$buttonsearch=$_REQUEST['add'];

if($_REQUEST['add']=='Add')
{
      header("location:add.php");

} 

if ($_REQUEST['dis']=='Click Here To View')
	{
		$result = mysql_query("SELECT * FROM tblfoodinven WHERE fldquantity = 0 ORDER BY flditemcode ASC");
	}

if($_REQUEST['search']=='Search')
{
	$result = mysql_query("SELECT * FROM tblfoodinven WHERE flditemcode LIKE '%$buttontext%' OR flditemname LIKE '%$buttontext%' OR fldquantity LIKE '%$buttontext%' ORDER BY flditemcode ASC");
}
else if($_REQUEST['all']=='All'){
header("location:inventory.php");
}
while($row = mysql_fetch_array($result))

  { 
  echo "<tr class='tbldesign'>";
  echo "<td align='center' width='150' height='40'>" . $row['flditemcode'] . "</td>";
  echo "<td align='center' width='250'  >" . $row['flditemname'] . "</td>";
   echo "<td align='center' width='150'  >" . $row['flditemcategory'] . "</td>";
  echo "<td align='center' width='150' >" . $row['fldquantity'] . "</td>";
  echo "<td >". $quantity ." </td>";
	

?>
<td align="center"  class='tdpos'><button type='button' class="buttons" >kupal</button></td>
 <td align="center" ><button type='button' onClick="window.location.href='delete.php?del=<?php echo $row['flditemcode'];?>'" class='text'>Delete</button></td>
  <td align="center"><button type='button' onClick="window.location.href='update.php?prodcode=<?php echo $row['flditemcode'];?>'" class='text'> Update</button></td>
  
<?php echo "</tr>";
}

}
else
{
	while($row = mysql_fetch_array($result))
  { 
  echo "<tr>";
  echo "<td align='center' width='150' height=40  class='tdpos'>" . $row['flditemcode'] . "</td>";
  echo "<td align='center' width='250'  class='tdpos'>" . $row['flditemname'] . "</td>";
  echo "<td align='center' width='150'  class='tdpos'>" . $row['flditemcategory'] . "</td>";
  echo "<td align='center' width='150'  class='tdpos'>" . $row['fldquantity'] . "</td>";
  
 
?>
  <td align="center"  class='tdpos'><button type='button' class="buttons" >kupal</button></td>
  <td align="center"  class='tdpos'><button type='button' onClick="window.location.href='delete.php?del=<?php echo $row['flditemcode'];?>'" class='text'>Delete</button></td>
   <td align="center" class='tdpos'><button type='button' onClick="window.location.href='update.php?prodcode=<?php echo $row['flditemcode'];?>'" class='text'>Update</button></td>
   
<?php echo "</tr>";
}
 
}

mysql_close($con);
?> 
	
	</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>

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
						<a href="">facebook</a>
					</li>
					<li id="twitter">
						<a href="">twitter</a>
					</li>
					<li id="googleplus">
						<a href="">googleplus</a>
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



