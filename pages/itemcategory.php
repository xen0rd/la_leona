<?php
ob_start();
?>
<?php
//include('sessionadmin.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
		<link rel="stylesheet" href="css/style1.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/ie.css">
	

	<link rel="stylesheet" type="text/css" href="css/ie.css">
   <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <link href="../bower_components/bootstrap/dist/css/slides.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

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
					<a href="walk_in.php">Walk-in</a> 
					
				</li>
				<li>
					<a href="">Reports</a>
					<ul>
					<li>
				<a href="foodsupplyreports.php">Food Inventory Report</a>
					</li>
					<li>
					<a href="toiletries_reports.php">Toiletries Report</a>
					</li>
					<li>
					<a href="equipment_reports.php">Equipment Report</a>
					</li>
					<li>
					<a href="">Reservation Report</a>
					</li>
					<li>
					<a href="">Sales Report</a>
					</li>
					</ul>
				</li>	

				<li >
					<a> <?php echo $login_session; ?></a>
					<ul>
					
					<a href="manageroom2.php"><li><i class="fa fa-cogs fa-fw"></i> Page Maintenace</a>
                        </li>
					
					<li>
					 
					<li><a href='logout.php'><i class="fa fa-sign-out fa-fw"></i>Log Out</a></li>
					
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
				
			<label > <font face="century gothic" color="#f3be4b" size="5"> Item Categories </label></font>
			
			</ul>
		</div>
	
	
<?php

error_reporting(0);



$con = mysql_connect("localhost","root","1234");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  
  
    $quer1 = ("SELECT * from tbltoiletries");
$query_run1 = mysql_query($quer1);
$qty1 = 0;
while($num = mysql_fetch_assoc ($query_run1))
{
	$qty1 += $num['fldquantity'];
}
  $query = ("SELECT * from tblfoodinven");
$query_run = mysql_query($query);
$qty = 0;
while($num = mysql_fetch_assoc ($query_run))
{
	$qty += $num['fldquantity'];
}

  $queryy = ("SELECT * from tblequipmentinventory");
$query_runn = mysql_query($queryy);
$qtyy = 0;
while($num = mysql_fetch_assoc ($query_runn))
{
	$qtyy += $num['fldquantity'];
}

  $sql = ("SELECT * from tblroominven");
$sq = mysql_query($sql);
$qty2 = 0;
while($num = mysql_fetch_assoc ($sq))
{
	$qty2 += $num['fldquantity'];
}

  $sqll = ("SELECT * from tblcatering");
$sqs = mysql_query($sqll);
$qty3 = 0;
while($num = mysql_fetch_assoc ($sqs))
{
	$qty3 += $num['fldquantity'];
}

$red = 0;
mysql_select_db("dbresort", $con);

$result = mysql_query("SELECT * FROM tblitemscategory ORDER BY fldcategorycode ASC");
$dis = mysql_query("SELECT * FROM tblitemscategory WHERE fldstockquantity = 0");
	while(mysql_fetch_array($dis))
	{
		$red = $red + 1;
	}
echo "<table align='center'>" ;
echo "<tr>";
echo "<td  align='center'>";
echo " <form action='itemcategory.php' method='post'>";

echo "</font>";

echo "</td>";
echo "</tr>"; 

echo "<td align='center'>";
	if($red > 0)
	{
		
		echo " <div class='overlay'><br><br><br><br><br>"; 

		echo "<span class='colorr' align='center'> $red of your Item is already out of stocks. </span><br>";
		

        echo "<a href='itemcategory.php'><button type='button' name='back' class='btn btn-default'  value='Back'>Close </button>";
		echo "</div>";
		
		echo "<input type='submit'  name='dis' my value='Click Here To View'> ";
		
	}
	
		
		

echo "</td>";
echo "<tr> ";
echo "<td>";
echo "<div class='row'>";
echo "<div class='col-lg-12'>";
echo "<div id='white' style='width: 940px; height: 300px; background-color: white;>";
echo "<div class='dataTable_wrapper'>";
echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
echo "<thead>

<tr>

<th width='150' align='center'> Category No.</th>
<th width='350' align='center'>Product Category </th>

<th width='200' align='center' >Total Quantity </th>
<th width='200' align='center'>View Items</th>
</tr>
</thead>";


echo "</th>";
echo "</tr> ";



if($_SERVER["REQUEST_METHOD"] == "POST") {

$buttontext = $_REQUEST['box'];
$buttonsearch=$_REQUEST['add'];

if($_REQUEST['add']=='AddCategory')
{
      header("location:additemcategory.php");

} 

if ($_REQUEST['dis']=='Click Here To View')
	{
		$result = mysql_query("SELECT * FROM tblitemscategory WHERE fldcategorycode = 0 ORDER BY fldcategorycode ASC");
	}

if($_REQUEST['search']=='Search')
{
	$result = mysql_query("SELECT * FROM tblitemscategory WHERE fldcategorycode LIKE '%$buttontext%' OR fldproductname LIKE '%$buttontext%' OR fldcategorycode LIKE '%$buttontext%' ORDER BY fldcategorycode ASC");
}
else if($_REQUEST['all']=='All'){
header("location:itemcategory.php");
}



}
else
{
	while($row = mysql_fetch_array($result))
  { 
	
  echo "<tr class='odd gradex'>";
  
  echo "<td align='center'  >" . $row['fldcategorycode'] . "</td>";
  echo "<td align='center'   >" . $row['fldproductname'] . "</td>";

	echo "<td align='center'  >";
	 if ($row['fldcategorycode']==1)
	 {
     
	   echo  $qty1 ;
    
	 }
	 else  if ($row['fldcategorycode']==2)
	 {
		   echo  $qty ;
	 }
	  else  if ($row['fldcategorycode']==3)
	 {
		   echo  $qtyy ;
	 }
	   else  if ($row['fldcategorycode']==4)
	 {
		   echo  $qty2 ;
	 
	 }
	   else  if ($row['fldcategorycode']==5)
	 {
		   echo  $qty3 ;
	 
	 }
  echo "</td>";
    
		 echo "<td align='center'>";
	 if ($row['fldcategorycode']==1)
	 {
     
	   echo  "  <a href='toiletriesinven.php'><button align='center' type='button'  class='btn btn-success'><i class='fa fa-list'></i> View Details  </button>";
    
	 }
	else if($row['fldcategorycode']==2)
	 {
     
	   echo  "  <a href='foodinventory.php'><button type='button' class='btn btn-success'><i class='fa fa-list'></i> View Details  </button>";
    
	 }
	 else if($row['fldcategorycode']==3)
	 {
     
	   echo  "  <a href='equipinven.php'><button type='button'  class='btn btn-success'><i class='fa fa-list'></i> View Details  </button>";
    
	 }
	  else if($row['fldcategorycode']==4)
	 {
     
	   echo  "  <a href='roominven.php'><button type='button'  class='btn btn-success'><i class='fa fa-list'></i> View Details  </button>";
    
	 }
	  else if($row['fldcategorycode']==5)
	 {
     
	   echo  "  <a href='cateringinventory.php'><button type='button'  class='btn btn-success'><i class='fa fa-list'></i> View Details  </button>";
    
	 }
	 
  echo "</td>";
?>


   
<?php echo "</tr>";
}
 
}

mysql_close($con);
?> 
		
			
			
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
		
		</div>
	</div>


</body>
</html>			
						
						
	
 




