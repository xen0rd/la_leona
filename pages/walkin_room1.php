<?php
include('sessionadmin.php');
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
		<link rel="stylesheet" href="css/style1.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/ie.css">
	

	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">


	
		<link rel="stylesheet" type="text/css" href="css/ie.css">
   
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
				<li>
					
					<div>

					</div>
				</li>
				<li>
			<label > <font face="century gothic" color="#f3be4b" size="4"> Walk-In </label></font>
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

mysql_select_db("dbresort", $con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(empty($_REQUEST['checkin'])||empty($_REQUEST['checkout'])||empty($_REQUEST['adult'])||$_REQUEST['types']=="other")
	{
		$err = " •Please fill all empty fields";
		if(empty($_REQUEST['checkin']))
		{
			$inErr = "*";
		}
		if(empty($_REQUEST['checkout']))
		{
			$outErr="*";
			
		}
		if(empty($_REQUEST['adult']))
		{
			$adultErr="*";
			
		}
	
		if($_REQUEST['types']=="other")
		{
			$typesErr = "*";
		}
		
	
		header("location:walkin_room1.php?err=$err&extra=$_REQUEST[extra]&reg=$_REQUEST[reg]&fname=$_REQUEST[fname]&checkawt=$_REQUEST[checkawt]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&numrooom=$_REQUEST[numrooom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana=$_REQUEST[cabana]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&numErr=$numErr&inErr=$inErr&outErr=$outErr&adultErr=$adultErr&typesErr=$typesErr");

	}
	else
	{
		
		
		if($_REQUEST['numrooom'] > $_REQUEST['e'] || $_REQUEST['numrooms']> $_REQUEST['eq'] || $_REQUEST['numroomss']> $_REQUEST['equ'])
		{
			
		$err = " * Invalid Number of Requested Room! ";
		header("location:walkin_room1.php?err=$err&extra=$_REQUEST[extra]&reg=$_REQUEST[reg]&checkawt=$_REQUEST[checkawt]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&numrooom=$_REQUEST[numrooom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&numrooom=$_REQUEST[numrooom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana=$_REQUEST[cabana]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&dis=$_REQUEST[dis]");

		}
		else if($_REQUEST['confbut']=="YES")
		{
			
		header("location:register6.php?err=$err&extra=$_REQUEST[extra]&reg=$_REQUEST[reg]&numrooom=$_REQUEST[numrooom]&checkawt=$_REQUEST[checkawt]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&types=$_REQUEST[types]&numrooom=$_REQUEST[numrooom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana=$_REQUEST[cabana]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&dis=$_REQUEST[dis]");

		}
		else
		{
		header("location:walkin_room1.php?err=$err&extra=$_REQUEST[extra]&reg=$_REQUEST[reg]&checkawt=$_REQUEST[checkawt]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&types=$_REQUEST[types]&numrooom=$_REQUEST[numrooom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&numrooom=$_REQUEST[numrooom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtype=$_REQUEST[roomtype]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana=$_REQUEST[cabana]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&dis=$_REQUEST[dis]&conf=1");
		}
		

		
	}
}



//room
$results13 = mysql_query("SELECT * FROM tblroom WHERE fldtype = 'Casa Leona'");
$selectas = mysql_fetch_array($results13); 

$results131 = mysql_query("SELECT * FROM tblroom WHERE fldtype = 'Casa Leona Deluxe'");
$selectas1 = mysql_fetch_array($results131); 

$r = mysql_query("SELECT * FROM tblroom WHERE fldtype = 'La Leona Attic'");
$s = mysql_fetch_array($r); 

//cottages
$cot = mysql_query("SELECT * FROM tblhut WHERE fldtype = 'Cabana'");
$cab1 = mysql_fetch_array($cot); 
$cott = mysql_query("SELECT * FROM tblhut WHERE fldtype = 'Mushroom'");
$cab2 = mysql_fetch_array($cott); 
$cotta= mysql_query("SELECT * FROM tblhut WHERE fldtype = 'Mez'");
$cab3= mysql_fetch_array($cotta); 
$cottag= mysql_query("SELECT * FROM tblhut WHERE fldtype = 'La Leona Cabana'");
$cab4= mysql_fetch_array($cottag);
$cottage= mysql_query("SELECT * FROM tblhut WHERE fldtype = 'Duplex'");
$cab5= mysql_fetch_array($cottage);

$result = mysql_query("SELECT fldsession FROM tblprice");
$result0 = mysql_query("SELECT fldtype FROM tblhut");
$results = mysql_query("SELECT fldtype FROM tblroom");
$results121 = mysql_query("SELECT fldhutnum FROM tblhut1 WHERE fldtype = '$_REQUEST[roomtype]'");

$check= mysql_query("SELECT * FROM tblregister WHERE username = '$login_session'");
$select = mysql_fetch_array($check);   

$checks= mysql_query("SELECT * FROM tblincre");
$incre = mysql_fetch_array($checks);   

$resultss = mysql_query("SELECT * FROM tblprice WHERE fldsession = '$_REQUEST[types]'");
$res = mysql_fetch_array($resultss);   

$resulta = mysql_query("SELECT * FROM tbldiscount");
$resus = mysql_fetch_array($resulta);   


$result1 = mysql_query("SELECT * FROM tblhut WHERE fldtype = '$_REQUEST[roomtype]'");
$resu = mysql_fetch_array($result1);   

$result11 = mysql_query("SELECT * FROM tblroom WHERE fldtype = '$_REQUEST[room]'");
$resuu = mysql_fetch_array($result11);   

$avail = mysql_query("SELECT fldavailable FROM tblhut WHERE fldtype = '$_REQUEST[roomtype]'");
$price = mysql_fetch_array($avail);

$avail1 = mysql_query("SELECT fldavailable FROM tblroom WHERE fldtype = '$_REQUEST[room]'");
$pri = mysql_fetch_array($avail1);
	 
	 

$pax = $_REQUEST['adult'] + $_REQUEST['child'];

					

if($pax<=1 || 30>$pax)
{
	if($_REQUEST['types']=="Day")
	{	
		$priceadult = $res['fldadult'] * $_REQUEST['adult'];
		$pricekid = $res['fldkid'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
				
	
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldday'] * $_REQUEST['cabana'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldday'] * $_REQUEST['cabana2'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldday'] * $_REQUEST['cabana3'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldday'] * $_REQUEST['cabana4'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldday'] * $_REQUEST['cabana5'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldday'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldday'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldday'] * $_REQUEST['numroomss'];

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
		}
		
		
		$totalprice = $total + $pricehuttype + $priceroom;
			

	if ($_REQUEST['types']=="Night") 
	{
	
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			if ($_REQUEST['night']==1)
			{
	
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldnight'] * $_REQUEST['cabana'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldnight'] * $_REQUEST['cabana2'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldnight'] * $_REQUEST['cabana3'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnight'] * $_REQUEST['cabana4'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldnight'] * $_REQUEST['cabana5'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
			
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numrooom'])
					{ 
						$Casaleona = $selectas['fldnight'] * $_REQUEST['numrooom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
						$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{  
						$Attic = $s['fldnight'] * $_REQUEST['numroomss'];

					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				}
				
		
				
			$totalprice = $total + $pricehuttype + $priceroom;	

			if ($_REQUEST['night']>=2)
			{
				
					if($_REQUEST['cabana'])
					{ 
						$Cabana = $cab1['fldnight'] * $_REQUEST['cabana'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldnight'] * $_REQUEST['cabana2'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldnight'] * $_REQUEST['cabana3'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnight'] * $_REQUEST['cabana4'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldnight'] * $_REQUEST['cabana5'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldday'] * $_REQUEST['numroom']*.90;
					}
					if($_REQUEST['numrooms'])
					{ 
						$Casadeluxe = $selectas1['fldday'] * $_REQUEST['numrooms']*.90;	
					}
					if($_REQUEST['numroomss'])
					{ 
						$Attic = $s['fldday'] * $_REQUEST['numroomss']* .90;
					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				
				}
				
			$totalprice = $total + $pricehuttype + $priceroom;	
	}	
			
		
	if ($_REQUEST['types']=="Day and Night") 
	{
	
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			if ($_REQUEST['night']<=1)
			{

					if($_REQUEST['cabana'])
					{ 
						$Cabana = $cab1['fldovernight'] * $_REQUEST['cabana'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldovernight'] * $_REQUEST['cabana2'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldovernight'] * $_REQUEST['cabana3'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldovernight'] * $_REQUEST['cabana4'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldovernight'] * $_REQUEST['cabana5'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
		
					
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
						$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{  
						$Attic = $s['fldnight'] * $_REQUEST['numroomss'];

					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				
				}
				
				$totalprice = $total + $pricehuttype + $priceroom;	
			
			if ($_REQUEST['night']>=2)
			{
				
					if($_REQUEST['cabana'])
					{ 
						$Cabana = $cab1['fldovernight'] * $_REQUEST['cabana'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldovernight'] * $_REQUEST['cabana2'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldovernight'] * $_REQUEST['cabana3'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldovernight'] * $_REQUEST['cabana4'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldovernight'] * $_REQUEST['cabana5'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
				
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldday'] * $_REQUEST['numroom']*.90;
					}
					if($_REQUEST['numrooms'])
					{ 
						$Casadeluxe = $selectas1['fldday'] * $_REQUEST['numrooms']*.90;	
					}
					if($_REQUEST['numroomss'])
					{ 
						$Attic = $s['fldday'] * $_REQUEST['numroomss']* .90;
					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				
				}
				
			$totalprice = $total + $pricehuttype + $priceroom;	
			}	
	}

	



if($pax<=30 || 51>$pax) 
{
	if($_REQUEST['types']=="Day")
	{
			
		$priceadult = $res['flda30pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk30pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		

					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldday'] * $_REQUEST['cabana'] * $resus['fldrate30pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldday'] * $_REQUEST['cabana2'] * $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldday'] * $_REQUEST['cabana3'] * $resus['fldrate30pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldday'] * $_REQUEST['cabana4'] * $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldday'] * $_REQUEST['cabana5'] * $resus['fldrate30pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
	
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldday'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldday'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldday'] * $_REQUEST['numroomss'];

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
		}
	
	$totalprice = $total + $pricehuttype + $priceroom;
				
	
	if($_REQUEST['types']=="Night")
	{
			
		$priceadult = $res['flda30pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk30pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if ($_REQUEST['night']<=1)
		{
				
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldnight'] * $_REQUEST['cabana']* $resus['fldrate30pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldnight'] * $_REQUEST['cabana2']* $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldnight'] * $_REQUEST['cabana3']* $resus['fldrate30pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnight'] * $_REQUEST['cabana4']* $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldnight'] * $_REQUEST['cabana5'] * $resus['fldrate30pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							

					
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
						$Casadeluxe = $selectas1['night'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{  
						$Attic = $s['fldnight'] * $_REQUEST['numroomss'];

					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				
				}
				
					
			$totalprice = $total + $pricehuttype + $priceroom;
		
		 if ($_REQUEST['night']>=2)
		{
			
			
				
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldnight'] * $_REQUEST['cabana']* $resus['fldrate30pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldnight'] * $_REQUEST['cabana2']* $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldnight'] * $_REQUEST['cabana3']* $resus['fldrate30pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnight'] * $_REQUEST['cabana4']* $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldnight'] * $_REQUEST['cabana5'] * $resus['fldrate30pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
			
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom']*.90;
					}
					if($_REQUEST['numrooms'])
					{ 
						$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms']*.90;	
					}
					if($_REQUEST['numroomss'])
					{ 
						$Attic = $s['fldnight'] * $_REQUEST['numroomss']* .90;
					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				
				}
			$totalprice = $total + $pricehuttype+ $priceroom;
		}	
					
 if ($_REQUEST['types']=="Day and Night") 
	{
	
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			if ($_REQUEST['night']<=1)
			{
	
				
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldovernight'] * $_REQUEST['cabana']* $resus['fldrate30pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldovernight'] * $_REQUEST['cabana2']* $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldovernight'] * $_REQUEST['cabana3']* $resus['fldrate30pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnoveright'] * $_REQUEST['cabana4']* $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldovernight'] * $_REQUEST['cabana5'] * $resus['fldrate30pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
			
					
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
						$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{  
						$Attic = $s['fldnight'] * $_REQUEST['numroomss'];

					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				
				}
				
				$totalprice = $total + $pricehuttype + $priceroom;	
			
			if ($_REQUEST['night']>=2)
			{
				
				
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldovernight'] * $_REQUEST['cabana']* $resus['fldrate30pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldovernight'] * $_REQUEST['cabana2']* $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldovernight'] * $_REQUEST['cabana3']* $resus['fldrate30pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldovernight'] * $_REQUEST['cabana4']* $resus['fldrate30pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldovernight'] * $_REQUEST['cabana5'] * $resus['fldrate30pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
				
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom']*.90;
					}
					if($_REQUEST['numrooms'])
					{ 
						$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms']*.90;	
					}
					if($_REQUEST['numroomss'])
					{ 
						$Attic = $s['fldnight'] * $_REQUEST['numroomss']* .90;
					}
						
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				}		
				
				$totalprice = $total + $pricehuttype + $priceroom;	
			}	
		}



 if($pax<=51 || 101>$pax) 
{
	if($_REQUEST['types']=="Day")
	{
			
		$priceadult = $res['flda51pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk51pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldday'] * $_REQUEST['cabana']* $resus['fldrate50pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldday'] * $_REQUEST['cabana2']* $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldday'] * $_REQUEST['cabana3'] * $resus['fldrate50pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldday'] * $_REQUEST['cabana4'] * $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldday'] * $_REQUEST['cabana5'] * $resus['fldrate50pax]'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
		
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldday'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldday'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldday'] * $_REQUEST['numroomss'];

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
			}
		
		$totalprice = $total + $pricehuttype + $priceroom;
			
	
	if($_REQUEST['types']=="Night")
	{
			
		$priceadult = $res['flda51pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk51pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if ($_REQUEST['night']<=1)
		{
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldnight'] * $_REQUEST['cabana']* $resus['fldrate50pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldnight'] * $_REQUEST['cabana2']* $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldnight'] * $_REQUEST['cabana3'] * $resus['fldrate50pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnight'] * $_REQUEST['cabana4'] * $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldnight'] * $_REQUEST['cabana5'] * $resus['fldrate50pax]'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
								
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldnight'] * $_REQUEST['numroomss'];

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
		}
$totalprice = $total + $pricehuttype+ $priceroom;

		
		 if ($_REQUEST['night']>=2)
		{
			
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldnight'] * $_REQUEST['cabana']* $resus['fldrate50pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldnight'] * $_REQUEST['cabana2']* $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldnight'] * $_REQUEST['cabana3'] * $resus['fldrate50pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnight'] * $_REQUEST['cabana4'] * $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldnight'] * $_REQUEST['cabana5'] * $resus['fldrate50pax]'];

					}
				$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
					
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'] * .90;
			
					}
					if($_REQUEST['numrooms'])
					{  	
						$Casadeluxe = $selectas1['night'] * $_REQUEST['numrooms'] * .90;	

					}
					if($_REQUEST['numroomss'])
					{  
						$Attic = $s['fldnight'] * $_REQUEST['numroomss'] * .90;

					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				
				}
			$totalprice = $total + $pricehuttype+ $priceroom;
		}
		if($_REQUEST['types']=="Day and Night")
		{
			
		$priceadult = $res['flda51pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk51pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if ($_REQUEST['night']<=1)
		{
			
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldovernight'] * $_REQUEST['cabana']* $resus['fldrate50pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldovernight'] * $_REQUEST['cabana2']* $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldovernight'] * $_REQUEST['cabana3'] * $resus['fldrate50pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldovernight'] * $_REQUEST['cabana4'] * $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldovernight'] * $_REQUEST['cabana5'] * $resus['fldrate50pax]'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
						
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldnight'] * $_REQUEST['numroomss'];

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
			}
			$totalprice = $total + $pricehuttype+ $priceroom;

		
	 if ($_REQUEST['night']>=2)
		{
				
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldovernight'] * $_REQUEST['cabana']* $resus['fldrate50pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldovernight'] * $_REQUEST['cabana2']* $resus['fldrate50pax'];	
			
					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldovernight'] * $_REQUEST['cabana3'] * $resus['fldrate50pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldovernight'] * $_REQUEST['cabana4'] * $resus['fldrate50pax'];	

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldovernight'] * $_REQUEST['cabana5'] * $resus['fldrate50pax]'];

					}
				$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
			
					
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}
					
					if($_REQUEST['numroom'])
					{ 
						$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'] * .90;
			
					}
					if($_REQUEST['numrooms'])
					{  	
						$Casadeluxe = $selectas1['night'] * $_REQUEST['numrooms'] * .90;	

					}
					if($_REQUEST['numroomss'])
					{  
						$Attic = $s['fldnight'] * $_REQUEST['numroomss'] * .90;

					}
					$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;		
				
				}
		}	$totalprice = $total + $pricehuttype+ $priceroom;
	}
			



 if($pax<=101 || 151>$pax) 
{
	if($_REQUEST['types']=="Day")
	{
			
		$priceadult = $res['flda101pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk101pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
			

					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldday'] * $_REQUEST['cabana'] * $resus['fldrate100pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldday'] * $_REQUEST['cabana2'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldday'] * $_REQUEST['cabana3'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldday'] * $_REQUEST['cabana4'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldday'] * $_REQUEST['cabana5'] * $resus['fldrate100pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
	
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldday'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldday'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldday'] * $_REQUEST['numroomss'];

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
		}
		
		
		$totalprice = $total + $priceehuttype + $priceroom;
			
	
	if($_REQUEST['types']=="Night")
	{
			
		$priceadult = $res['flda101pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk101pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if ($_REQUEST['night']<=1)
		{
	
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldnight'] * $_REQUEST['cabana'] * $resus['fldrate100pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldnight'] * $_REQUEST['cabana2'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldnight'] * $_REQUEST['cabana3'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnight'] * $_REQUEST['cabana4'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldnight'] * $_REQUEST['cabana5'] * $resus['fldrate100pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
						
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldnight'] * $_REQUEST['numroomss'];

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
			}
			$totalprice = $total + $pricehuttype + $priceroom;
		
		
		 if ($_REQUEST['night']>=2)
		{
			
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldnight'] * $_REQUEST['cabana'] * $resus['fldrate100pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldnight'] * $_REQUEST['cabana2'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldnight'] * $_REQUEST['cabana3'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldnight'] * $_REQUEST['cabana4'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldnight'] * $_REQUEST['cabana5'] * $resus['fldrate100pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
							
			
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'] * .90;
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'] * .90;	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldnight'] * $_REQUEST['numroomss'] * .90;

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
			}
			$totalprice = $total + $pricehuttype + $priceroom;
	}
	
	if ($_REQUEST['types']=="Day and Night") 
	{
	
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			if ($_REQUEST['night']<=1)
			{

					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldovernight'] * $_REQUEST['cabana'] * $resus['fldrate100pax'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldovernight'] * $_REQUEST['cabana2'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldovernight'] * $_REQUEST['cabana3'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldovernight'] * $_REQUEST['cabana4'] * $resus['fldrate100pax'];

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldovernight'] * $_REQUEST['cabana5'] * $resus['fldrate100pax'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
								
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'];
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'];	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldnight'] * $_REQUEST['numroomss'];

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
		}
				
		$totalprice = $total + $pricehuttype + $priceroom;	
			
		if ($_REQUEST['night']>=2)
		{
			
					if($_REQUEST['cabana'])
					{ 
					$Cabana = $cab1['fldovernight'] * $_REQUEST['cabana'];
			
					}
					if($_REQUEST['cabana2'])
					{  	
						$Mushroom = $cab2['fldovernight'] * $_REQUEST['cabana2'];

					}
					if($_REQUEST['cabana3'])
					{  
						$Mez = $cab3['fldovernight'] * $_REQUEST['cabana3'];

					}
					if($_REQUEST['cabana4'])
					{  	
						$Laleonacabana = $cab4['fldovernight'] * $_REQUEST['cabana4'];

					}
					if($_REQUEST['cabana5'])
					{  
						$Duplex = $cab5['fldovernight'] * $_REQUEST['cabana5'];

					}
					$pricehuttype= $Cabana + $Mushroom + $Mez + $Laleonacabana + $Duplex;		
						
	
					if ($_REQUEST['extra']=="Yes")
					{
						$extrapay = 300;
					}	
					if($_REQUEST['numroom'])
					{	 
					$Casaleona = $selectas['fldnight'] * $_REQUEST['numroom'] * .90;
			
					}
					if($_REQUEST['numrooms'])
					{  	
					$Casadeluxe = $selectas1['fldnight'] * $_REQUEST['numrooms'] * .90;	

					}
					if($_REQUEST['numroomss'])
					{	  
					$Attic = $s['fldnight'] * $_REQUEST['numroomss'] * .90;

					}
			$priceroom = $Casaleona + $Casadeluxe + $Attic + $extrapay;
			}
				$totalprice = $total + $pricehuttype + $priceroom;	
	}	
}
			


		if ($_REQUEST['types'] == "Day and Night")
		{
			$query = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldroom = 'Cabana' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day' OR fldstaytype = 'Night')");
			$query_run = mysql_query($query);
			$qtyy= 0;
			while ($num = mysql_fetch_assoc ($query_run)) 
			$qtyy += $num['fldcottagesnum'];
		
			$query1 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut2 = 'Mushroom' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night' OR fldstaytype = 'Day')");
			$query_runn = mysql_query($query1);
			$quan= 0;
			while ($numm = mysql_fetch_assoc ($query_runn)) 
			$quan += $numm['fldh2'];
		
			$queries = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut3 ='Mez' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night' OR fldstaytype='Day')");
			$query_runnn = mysql_query($queries);
			$quant= 0;
			while ($nom= mysql_fetch_assoc ($query_runnn)) 
			$quant += $nom['fldh3'];
		
			
			$queries2 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut4 ='La Leona Cabana' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night' OR fldstaytype='Day')");
			$query_run2 = mysql_query($queries2 );
			$quaanti= 0;
			while ($noom= mysql_fetch_assoc ($query_run2)) 
			$quanti += $noom['fldh4'];
		
			
			$queries5 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut5 ='Duplex' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night' OR fldstaytype='Day')");
			$query_run5 = mysql_query($queries5);
			$quantit= 0;
			while ($num5= mysql_fetch_assoc ($query_run5)) 
			$quantit += $num5['fldh5'];
		}
		if ($_REQUEST['types'] == "Day")
		{
	
			$query = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldroom = 'Cabana' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day')");
			$query_run = mysql_query($query);
			$qtyy= 0;
			while ($num = mysql_fetch_assoc ($query_run)) 
			$qtyy += $num['fldcottagesnum'];
		
			$query1 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut2 = 'Mushroom' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day')");
			$query_runn = mysql_query($query1);
			$quan= 0;
			while ($numm = mysql_fetch_assoc ($query_runn)) 
			$quan += $numm['fldh2'];
		
			$queries = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut3 ='Mez' AND (fldstaytype = 'Day and Night' OR fldstaytype='Day')");
			$query_runnn = mysql_query($queries);
			$quant= 0;
			while ($nom= mysql_fetch_assoc ($query_runnn)) 
			$quant += $nom['fldh3'];
		
			
			$queries2 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut4 ='La Leona Cabana' AND (fldstaytype = 'Day and Night' OR fldstaytype='Day')");
			$query_run2 = mysql_query($queries2 );
			$quaanti= 0;
			while ($noom= mysql_fetch_assoc ($query_run2)) 
			$quanti += $noom['fldh4'];
		
			
			$queries5 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut5 ='Duplex' AND (fldstaytype = 'Day and Night' OR fldstaytype='Day')");
			$query_run5 = mysql_query($queries5);
			$quantit= 0;
			while ($num5= mysql_fetch_assoc ($query_run5)) 
			$quantit += $num5['fldh5'];
		}
			
		if ($_REQUEST['types'] == "Night")
		{
	
			$query = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldroom = 'Cabana' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night')");
			$query_run = mysql_query($query);
			$qtyy= 0;
			while ($num = mysql_fetch_assoc ($query_run)) 
			$qtyy += $num['fldcottagesnum'];
		
			$query1 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut2 = 'Mushroom' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night')");
			$query_runn = mysql_query($query1);
			$quan= 0;
			while ($numm = mysql_fetch_assoc ($query_runn)) 
			$quan += $numm['fldh2'];
		
			$queries = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut3 ='Mez' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night')");
			$query_runnn = mysql_query($queries);
			$quant= 0;
			while ($nom= mysql_fetch_assoc ($query_runnn)) 
			$quant += $nom['fldh3'];
		
			
			$queries2 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut4 ='La Leona Cabana' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night')");
			$query_run2 = mysql_query($queries2 );
			$quaanti= 0;
			while ($noom= mysql_fetch_assoc ($query_run2)) 
			$quanti += $noom['fldh4'];
		
			
			$queries5 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldhut5 ='Duplex' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night')");
			$query_run5 = mysql_query($queries5);
			$quantit= 0;
			while ($num5= mysql_fetch_assoc ($query_run5)) 
			$quantit += $num5['fldh5'];
		}

		if ($_REQUEST['types'] == "Night")
		{
			$query1 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldroomtype = 'Casa Leona' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night')");
			$query_runn = mysql_query($query1);
			$qtyyy= 0;
			while ($numm = mysql_fetch_assoc ($query_runn)) 
			$qtyyy += $numm['fldnumofroom'];
		
			$queries = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND (fldroom2 ='Casa Leona Deluxe') AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night')");
			$query_runnn = mysql_query($queries);
			$qu= 0;
			while ($nom= mysql_fetch_assoc ($query_runnn)) 
			$qu += $nom['fldnum2'];
		
			$queriess = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND (fldroom4 ='La Leona Attic') AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Night')");
			$query_run2 = mysql_query($queriess);
			$qua= 0;
			while ($noom= mysql_fetch_assoc ($query_run2)) 
			$qua += $noom['fldnum4'];
		}
		
		if ($_REQUEST['types'] == "Day")
		{
			$query1 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND (fldroomtype ='Casa Leona') AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day')");
			$query_runn = mysql_query($query1);
			$qtyyy= 0;
			while ($numm = mysql_fetch_assoc ($query_runn)) 
			$qtyyy += $numm['fldnumofroom'];
		
			$queries = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND (fldroom2 ='Casa Leona Deluxe') AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day')");
			$query_runnn = mysql_query($queries);
			$qu= 0;
			while ($nom= mysql_fetch_assoc ($query_runnn)) 
			$qu += $nom['fldnum2'];
		
			$queriess = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND (fldroom4 ='La Leona Attic') AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day')");
			$query_run2 = mysql_query($queriess);
			$qua= 0;
			while ($noom= mysql_fetch_assoc ($query_run2)) 
			$qua += $noom['fldnum4'];
		}
		
		if ($_REQUEST['types'] == "Day and Night")
		{
			$query1 = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND fldroomtype = 'Casa Leona' AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day' OR fldstaytype='Night')");
			$query_runn = mysql_query($query1);
			$qtyyy= 0;
			while ($numm = mysql_fetch_assoc ($query_runn)) 
			$qtyyy += $numm['fldnumofroom'];
		
			$queries = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND (fldroom2 ='Casa Leona Deluxe') AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day' OR fldstaytype='Night')");
			$query_runnn = mysql_query($queries);
			$qu= 0;
			while ($nom= mysql_fetch_assoc ($query_runnn)) 
			$qu += $nom['fldnum2'];
		
			$queriess = ("SELECT * FROM tblreserve WHERE flddate = '$_REQUEST[checkin]' AND (fldroom4 ='La Leona Attic') AND (fldstaytype = 'Day and Night' OR fldstaytype = 'Day' OR fldstaytype='Night')");
			$query_run2 = mysql_query($queriess);
			$qua= 0;
			while ($noom= mysql_fetch_assoc ($query_run2)) 
			$qua += $noom['fldnum4'];
		}
	
	
					
					
$datetime1 = strtotime ($_REQUEST['checkin']);
$datetime2 = strtotime ($_REQUEST['checkout']);

$secs = $datetime2 - $datetime1;// == <seconds between the two times>
$night = $secs / 86400;

$e = $selectas['fldavailable'] - $qtyyy;
$eq = $selectas1['fldavailable'] - $qu;
$equ = $s['fldavailable'] - $qua;

	
$ove = $cab1['fldavailable'] - $qtyy;
$over = $cab2['fldavailable'] - $quan;
$overa = $cab3['fldavailable'] - $quant;
$overal = $cab4['fldavailable'] - $quanti;
$overall = $cab5['fldavailable'] - $quantit;
	



	/// ROOM PICTURES
	
	$displayprofilepic = mysql_query("SELECT * from tblphoto WHERE fldtype = 'Casa Leona'");
										while($profile = mysql_fetch_array($displayprofilepic))
										{
										$imagefilename = $profile['imagefile'];
										}
	$displayprofilepic1 = mysql_query("SELECT * from tblphoto WHERE fldtype = 'Casa Leona Deluxe'");
										while($profile = mysql_fetch_array($displayprofilepic1))
										{
										$imagefilename1 = $profile['imagefile'];
										}
										
$displayprofilepic2 = mysql_query("SELECT * from tblphoto WHERE fldtype = 'La Leona Attic'");
										while($profile = mysql_fetch_array($displayprofilepic2))
										{
										$imagefilename2 = $profile['imagefile'];
										}
		

										
	  ?>
	
							<form action="walkin_room1.php" method="get">

	<div id="body">
		<div class="header">
<div id="body">
<div class="body">
 


							 <h2><font face="century gothic" color="#f3be4b" size="5">Rates & Availability</font></h2>

							<input class="textarea" type="hidden" size="4" name="reg" value="<?php echo $incre['fldnum']; ?>">
						<span id="tab"><?php 
							$err = $_REQUEST['err'];
						
							echo "<font color='red'> $err </font>";
				
							?>
							<br>
						<span id="tab"><br><h4>Adults(13 years old and above): <font color="red"><?php echo $_REQUEST['adultErr']; ?></font><input OnChange="this.form.submit();" type="text" name="adult" value="<?php echo $_REQUEST['adult']; ?>"></span>
				
						<span id="tab">Kids(3-12 years old): <input  type="text" name="child" value="<?php echo $_REQUEST['child'];?>"></h4></span></span><br><br><br><br><br>
					
<hr class="hr">
</td>
</tr>

<table class="room">
	<tr>
		<td>
			
						<input class="textarea" type="hidden" size="4" name="reg" value="<?php echo $incre['fldnum']; ?>">
						 <input  type="hidden" value="<?php echo Room; ?>">
						 			
                        <input class="textarea" type="hidden" size="4" name="numeros" value="<?php echo $qtyyy; ?>">
						<input class="textarea" type="hidden" size="4" name="numeroz" value="<?php echo $qu; ?>">
						<input class="textarea" type="hidden" size="4" name="numerosz" value="<?php echo $qua; ?>">
						
						<input class="textarea" type="hidden" size="4" name="bilang" value="<?php echo $qtyy; ?>">
						<input class="textarea" type="hidden" size="4" name="bilang2" value="<?php echo $quan; ?>">
						<input class="textarea" type="hidden" size="4" name="bilang3" value="<?php echo $quant; ?>">
						<input class="textarea" type="hidden" size="bilang4" name="canaba4" value="<?php echo $quanti; ?>">
						<input class="textarea" type="hidden" size="4" name="bilang5" value="<?php echo $quantit; ?>">
					
						 <input class="textarea" type="hidden"  name="checkawt" value="<?php echo $_REQUEST['night']; ?>">
					
						<input class="textarea" type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						<input class="textarea" type="hidden" name="checkout" value="<?php echo $_REQUEST['checkout'];?>">
	
						<input  type="hidden"  name="night" value="<?php echo $_REQUEST['night']; ?>">
						<input type="hidden" name="types" value="<?php echo $_REQUEST['types']; ?>">
								<input type="hidden" name="accommodation" value="<?php echo "Room"; ?>">

								
							
		<img src="img2/1.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Casa Leona</font><br><br> Good for 2</span>
		<span id="tab">Day use <br><br> Php 1550 </span>
		<span id="tab">Overnight <br><br> Php 2150</span>
							<?php
							if($_REQUEST['numrooom'] != NULL)
							{ 
					
							?>
							<input class="form-control" readonly type="hidden" name="room2" value="<?php echo "Casa Leona"; ?>">

							<?php
							}
							
							$disabled = $e == 0 ? "disabled='disabled'" : "";

							?>
		<span id="tab"><br><br>Number of Room: <input class="form-control" type="text" name="numrooom" value="<?php echo $_REQUEST['numrooom']; ?>" <?php echo $disabled; ?>> </span>
		<br><br><span id="tab">Available Room :<input disabled type="text" class="form-control" value="<?php echo $e ?>"></span>
		<input type="hidden" class="form-control" value="<?php echo $selectas['fldavailable']; ?>">
		<input type="hidden" class="form-control" name="e" value="<?php echo $e ?>">
	
		<br> <br><br><br><hr class="hr"><br><br> 
		<img src="img2/gallery24.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Casa Leona Deluxe</font><br><br> Good for 4</span>
		<span id="tab">Day use <br><br> Php 2050 </span>
		<span id="tab">Overnight <br><br> Php 2650</span>
							<?php
							if($_REQUEST['numrooms'] != NULL)
							{ 
					
							?>
							<input class="form-control" readonly type="hidden"  name="room3" value="<?php echo "Casa Leona Deluxe"; ?>">
				
							<?php
							}
							$disabled = $eq == 0 ? "disabled='disabled'" : "";

							?>
		<span id="tab"><br><br>Number of Room: <input class="form-control" type="text" name="numrooms" value="<?php echo $_REQUEST['numrooms']; ?>" <?php echo $disabled; ?>> </span>
							<input type="hidden" class="form-control" value="<?php echo $selectas1['fldavailable']; ?>">
							<input type="hidden" class="form-control" name="eq"value="<?php echo $eq ?>">
		<br><br><span id="tab">Available Room :<input disabled type="text" class="form-control" value="<?php echo $eq ?>"></span>


		<br> <br><br><br><br><hr class="hr"><br><br> 
		<img src="img2/room1.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">La Leona Attic</font><br><br> Good for 10</span>
		<span id="tab">Day use <br><br> Php 3550 </span>
		<span id="tab">Overnight <br><br> Php 5150</span>
							<?php
							if($_REQUEST['numroomss'] != NULL)
							{ 
					
							?>
							<input class="form-control" readonly type="hidden"  name="room4" value="<?php echo "La Leona Attic"; ?>">
							<?php
							

							}
							$disabled = $equ == 0 ? "disabled='disabled'" : "";
							?>
		<span id="tab"><br><br>	Number of Room: <input class="form-control" type="text" name="numroomss" value="<?php echo $_REQUEST['numroomss']; ?>" <?php echo $disabled; ?>></span>
							<input type="hidden" class="form-control" value="<?php echo $s['fldavailable']; ?>">
							<input type="hidden" class="form-control" name="equ" value="<?php echo $equ ?>">
		<br><br><span id="tab">Available Room :<input disabled type="text" class="form-control" value="<?php echo $equ ?>"></span>
					
							
							
							<?php
							if($_REQUEST['cabana'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtype" value="<?php echo "Cabana"; ?>">
								<input  class="form-control" type="hidden" name="cabana" value="<?php echo $_REQUEST['cabana']; ?>">

								<?php
							}
								if($_REQUEST['cabana2'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes2" value="<?php echo "Mushroom"; ?>">
								<input  class="form-control" type="hidden" name="cabana2" value="<?php echo $_REQUEST['cabana2']; ?>">

								<?php
							}
						
								if($_REQUEST['cabana3'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes3" value="<?php echo "Mezannine"; ?>">
								<input  class="form-control" type="hidden" name="cabana3" value="<?php echo $_REQUEST['cabana3']; ?>">

								<?php
							}
							
							if($_REQUEST['cabana4'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes4" value="<?php echo "La Leona Cabana"; ?>">
								<input  class="form-control" type="hidden" name="cabana4" value="<?php echo $_REQUEST['cabana4']; ?>">

								<?php
							}
							
							if($_REQUEST['cabana5'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes5" value="<?php echo "Duplex"; ?>">
								<input  class="form-control" type="hidden" name="cabana5" value="<?php echo $_REQUEST['cabana5']; ?>">

								<?php
							}
							?>
							
		<?php 
				//////////////////////////////CABANAS
		if($_REQUEST['dis']=='Add More')
		{	
		?>
			
			<br> <br><br><br> <h2><font face="century gothic" color="#f3be4b" size="7"> &nbsp; Cabanas</font></h2><hr class="hr"><br><br> 
			<input  type="hidden" value="<?php echo Cottages; ?>">
			<img src="img2/mushroom2.png" alt="Note" style="height:200px;width:250px">
			<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Mushroom </font><br><br>10 pax</span>
			<span id="tab">Day use <br><br> Php 250 </span>
			<span id="tab">Overnight <br><br> Php350</span>
			<span id="tab">Day & Night use <br><br> Php 500</span>
							<?php
							if($_REQUEST['cabana2'] != NULL)
							{ 
								?>
								<input  class="form-control" readonly type="text" name="roomtypes2" value="<?php echo "Mushroom"; ?>"> 

								<?php
							}
					
							$disabled = $over == 0 ? "disabled='disabled'" : "";

							?>
					
			<span id="tab"><br><br>Number of Room: <input  class="form-control" type="text" name="cabana2" value="<?php echo $_REQUEST['cabana2']; ?>" <?php echo $disabled; ?>> </span>
			<input type="hidden" class="form-control" value="<?php echo $cab2['fldavailable']; ?>">
			<input type="hidden" class="form-control" name="over"value="<?php echo $over ?>"></span>
			<br><br><span id="tab">Available Room :<input disabled type="text" class="form-control" name="over"value="<?php echo $over ?>"></span>
			
			<br> <br><br><br><br><hr class="hr"><br><br> 
	
			<img src="img2/mushroom4.png" alt="Note" style="height:200px;width:250px">
			<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Cabanas </font><br><br>10 pax</span>
			<span id="tab">Day use <br><br> Php 400 </span>
			<span id="tab">Overnight <br><br> Php 500</span>
			<span id="tab">Day & Night use <br><br> Php 800</span>
						
							<?php
							
								$disabled = $ove == 0 ? "disabled='disabled'" : "";
							?>
						
			<span id="tab"><br><br>Number of Room: <input type="text" class="form-control" name="cabana" value="<?php echo $_REQUEST['cabana']; ?>"  <?php echo $disabled; ?>>  </span>
			<input type="hidden" class="form-control" class="form-control" value="<?php echo $cab1['fldavailable']; ?>">
			<input type="hidden" class="form-control" name="ove"value="<?php echo $ove ?>">
			<br><br><span id="tab">Available Room :<input disabled type="text" class="form-control" name="ove"value="<?php echo $ove ?>"></span>
			
			<br> <br><br><br><br><hr class="hr"><br><br> 

			<img src="img2/mezaninne1.png" alt="Note" style="height:200px;width:250px">
			<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Mezaninne </font><br><br> 10 pax</span>
			<span id="tab">Day use <br><br> Php 1200 </span>
			<span id="tab">Night <br><br> Php 800</span>
			<span id="tab">Day & Night use <br><br> Php 1500</span>
							<?php
							if($_REQUEST['cabana3'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes3" value="<?php echo "Mez"; ?>"> 
								<?php
							} 

						$disabled = $overa == 0 ? "disabled='disabled'" : "";

							?>
			<span id="tab"><br><br>Number of Room: <input  class="form-control" type="text" name="cabana3" value="<?php echo $_REQUEST['cabana3']; ?>" <?php echo $disabled; ?>> </span>
			<input type="hidden" class="form-control" value="<?php echo $cab3['fldavailable']; ?>">
			<input type="hidden" class="form-control" name="overa" value="<?php echo $overa ?>">
			<br><br><span id="tab">Available Room :<input disabled type="text" class="form-control" name="overa" value="<?php echo $overa ?>"></span>
			
			<br> <br><br><br><br><hr class="hr"><br><br> 

			<img src="img2/le leona cabana.png" alt="Note" style="height:200px;width:250px">
			<br> <br> <span id="tab"> <font face="century gothic" color="#f3be4b" size="5">La Leona Cabana </font><br><br> 25 pax</span>
			<span id="tab">Day use <br><br> Php 1200 </span>
			<span id="tab">Overnight <br><br> Php 1500</span>
			<span id="tab">Day & Night use <br><br> Php 2500</span>
							<?php
							if($_REQUEST['cabana4'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes4" value="<?php echo "La Leona Cabana"; ?>">
								<?php
							}
							$disabled = $overal == 0 ? "disabled='disabled'" : "";

							?>
						
			<span id="tab"><br><br>Number of Room: <input class="form-control" type="text" name="cabana4" value="<?php echo $_REQUEST['cabana4']; ?>" <?php echo $disabled; ?>> </span>
			<input type="hidden" class="form-control" value="<?php echo $cab4['fldavailable']; ?>">
			<input type="hidden" class="form-control" name="overal" value="<?php echo $overal ?>">
			<br><br><span id="tab">Available Room :<input disabled type="text" class="form-control" value="<?php echo $overal ?>"></span>

			<br> <br><br><br><br><hr class="hr"> <br> 

			<img src="img2/mushroom1.png" alt="Note" style="height:200px;width:250px">
			<br> <br> <span id="tab"> <font face="century gothic" color="#f3be4b" size="5">Duplex </font><br><br> 15 pax</span>
			<span id="tab">Day use <br><br> Php 1250 </span>
			<span id="tab">Overnight <br><br> Php 1500</span>
			<span id="tab">Day & Night use <br><br> Php 2500</span>
							<?php
							if($_REQUEST['cabana5'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes5" value="<?php echo "Duplex"; ?>">
								<?php
							}
							$disabled = $overall == 0 ? "disabled='disabled'" : "";

							?>
				
			<span id="tab"><br><br>Number of Room: <input class="form-control" type="text" name="cabana5" value="<?php echo $_REQUEST['cabana5']; ?>" <?php echo $disabled; ?>> </span>
			<input type="hidden" class="form-control" value="<?php echo $cab5['fldavailable']; ?>">
			<input  type="hidden" class="form-control" name="overall"value="<?php echo $overall ?>">
			<br><br><span id="tab">Available Room :<input disabled type="text" class="form-control" name="overall" value="<?php echo $overall ?>"></span>

						
		<?php
		}
		?>
		<br><br><br><br>

		<hr>

				Extra Bed: <font color="red"><?php echo $_REQUEST['extraErr']; ?></font><select  onchange="this.form.submit();" name="extra" >
						<option value="other" <?php echo isset($_REQUEST["extra"]) && $_REQUEST["extra"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Yes"  <?php echo isset($_REQUEST["extra"]) && $_REQUEST["extra"] == "Yes" ? "selected" : "Yes" ?>>Yes</option>
						<option value="No"  <?php echo isset($_REQUEST["extra"]) && $_REQUEST["extra"] == "No" ? "selected" : "No" ?>>No 
						</option></select>
						<br><br>
		Total: <input type="text" class="form-control" name="totalp" READONLY value="<?php echo $totalprice; ?>"><br><br>

		<hr>
		
			<button type='submit' style="margin-left: 0px;"class="button2" name='dis' my value='Add More'> Add More </style></button>
		
	</td>
	<tr>
	</table>

				<?php
						
						if($_REQUEST['conf']==NULL)
						{
						?>
						<button type="submit" class="button2" value="Submit" formmethod="post">Book Now</button>
						<button type='submit' class="button2" name='back' my value='Back'> Back</button>

						
						<?php
							
						}
						else if($_REQUEST['conf']==1)
						{
						?>	

						<div class="overlay1">
	
						<label><font color="white"><br><br> <br><br>   Are you sure you want to avail?</font></label><br><br>
   	
						<input type="submit"class="btn btn-default" name="confbut" value="YES" formmethod="post">&nbsp;
						<a href="casalaleona2.php"><button type="button" class="btn btn-default">NO</button></a></span>
	
						</div>
						<?php
						}
						
								
						?>
						
		


    <br><br>
</font>
</form>
</body>
</table>
</html>
	

	