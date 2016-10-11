
<?php
include('session.php');
?>

<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
			<a href="customer.php" class="logo"><img src="logo-trans.png" alt=""></a>
			
			</form>
		</div>
		<div class="navigation">
			<ul>
				<li >
					<a href="customer.php">Home</a>
					<ul>
					<li>
					<a href="#">About Us</a>
					</li>
					<li>
					<a href="#">Contact</a>
					</li>
					</ul>
				</li>
					<li>
					<a href="gallerylog.php">Accomodation</a>
					<ul>
					<li>
					<a href="#">Amenities</a>
					</li>
				</li>
				</ul>
				<li>
					<a href="slideshows02.php">Gallery</a> 
				<ul>
					<li>
					<a href="#">Pictures</a>
					</li>
					<li>
					<a href="#">Videos</a>
					</li>
					</ul>
				<li>
					<a href="#">Reservation</a>
					<ul>
					<li>
					<a href="booking_reservation.php">Booking Reservation</a>
					</li>
					<li>
					<a href="event_reservation.php">Event Reservation</a>
					</li>
					
				<li>
					<a href="manage_reservation.php">Manage Reservation</a>
</li>
</ul>
				<li>
					<a>   User&nbsp;:&nbsp; <?php echo$login_session; ?></a>
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
			<label > <font face="century gothic" color="#f3be4b" size="4"> Booking Reservation</label></font>
				</li>
				<li>
					
					<div>
					
					</div>
			
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
	
	if(empty($_REQUEST['checkin'])||empty($_REQUEST['checkout'])||empty($_REQUEST['adult'])||$_REQUEST['pay']=="other"||$_REQUEST['types']=="other"||$_REQUEST['accommodation']=="other")
	{
		$err = "Please fill all empty fields";
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
	
		if($_REQUEST['pay']=="other")
		{
			$payErr = "*";
		}
	
		if($_REQUEST['types']=="other")
		{
			$typesErr = "*";
		}
		if($_REQUEST['accommodation']=="other")
		{
			$accErr = "*";
		}
	
		header("location:booking_reservation2.php?err=$err&reg=$_REQUEST[reg]fname=$_REQUEST[fname]&rmnum=$_REQUEST[rmnum]&checkawt=$_REQUEST[checkawt]&lname=$_REQUEST[lname]&num=$_REQUEST[num]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&numroom=$_REQUEST[numroom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&leona=$_REQUEST[leona]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&fnameErr=$fnameErr&lnameErr=$lnameErr&numErr=$numErr&inErr=$inErr&outErr=$outErr&adultErr=$adultErr&typesErr=$typesErr&accErr=$accErr");

	}
	else
	{
	
		if($_REQUEST['confbut']=="YES")
		{
			
		header("location:booking_payment.php?err=$err&reg=$_REQUEST[reg]&fname=$_REQUEST[fname]&	=$_REQUEST[rmnum]&checkawt=$_REQUEST[checkawt]&lname=$_REQUEST[lname]&num=$_REQUEST[num]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&numroom=$_REQUEST[numroom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&leona=$_REQUEST[leona]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]");

		}

		else
		{
		header("location:booking_reservation2.php?err=$err&reg=$_REQUEST[reg]fname=$_REQUEST[fname]&rmnum=$_REQUEST[rmnum]&checkawt=$_REQUEST[checkawt]&lname=$_REQUEST[lname]&num=$_REQUEST[num]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&numroom=$_REQUEST[numroom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypess5]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]&conf=1");
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
				
		if($_REQUEST['accommodation']=="Cottages")
		{
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
							
		}	
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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
			
	}
	if ($_REQUEST['types']=="Night") 
	{
	
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			if ($_REQUEST['night']==1)
			{
	
				if($_REQUEST['accommodation']=="Cottages")
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
							
				}	
			
		
				if($_REQUEST['accommodation']=="Room")
				{
					
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
			}
			if ($_REQUEST['night']>=2)
			{
				if($_REQUEST['accommodation']=="Cottages")
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
							
				}	
		
				if($_REQUEST['accommodation']=="Room")
				{
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
		
	if ($_REQUEST['types']=="Day and Night") 
	{
	
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			if ($_REQUEST['night']<=1)
			{
	
				if($_REQUEST['accommodation']=="Cottages")
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
							
				}		
			
		
				if($_REQUEST['accommodation']=="Room")
				{
					
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
			}
			if ($_REQUEST['night']>=2)
			{
				if($_REQUEST['accommodation']=="Cottages")
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
							
				}		
			
		
				if($_REQUEST['accommodation']=="Room")
				{
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
}
	



else if($pax<=30 || 51>$pax) 
{
	if($_REQUEST['types']=="Day")
	{
			
		$priceadult = $res['flda30pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk30pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if($_REQUEST['accommodation']=="Cottages")
		{
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
							
		}	
			
			
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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
				
	}
	else if($_REQUEST['types']=="Night")
	{
			
		$priceadult = $res['flda30pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk30pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if ($_REQUEST['night']<=1)
		{
			if($_REQUEST['accommodation']=="Cottages")
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
							
				}	
			
	
		
				if($_REQUEST['accommodation']=="Room")
				{
					
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
		}
		else if ($_REQUEST['night']>=2)
		{
			
			if($_REQUEST['accommodation']=="Cottages")
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
							
				}	
			
			
				if($_REQUEST['accommodation']=="Room")
				{
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
					
	}
	else if ($_REQUEST['types']=="Day and Night") 
	{
	
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			if ($_REQUEST['night']<=1)
			{
	
				if($_REQUEST['accommodation']=="Cottages")
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
							
				}	
			
		
		
				if($_REQUEST['accommodation']=="Room")
				{
					
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
			}
			if ($_REQUEST['night']>=2)
			{
				if($_REQUEST['accommodation']=="Cottages")
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
							
				}	
		
				
				if($_REQUEST['accommodation']=="Room")
				{
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
				
				}
				
				$totalprice = $total + $pricehuttype + $priceroom;	
			}	
		}



else if($pax<=51 || 101>$pax) 
{
	if($_REQUEST['types']=="Day")
	{
			
		$priceadult = $res['flda51pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk51pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if($_REQUEST['accommodation']=="Cottages")
		{
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
							
		}	
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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
			
	}
	else if($_REQUEST['types']=="Night")
	{
			
		$priceadult = $res['flda51pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk51pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if ($_REQUEST['night']<=1)
		{
			if($_REQUEST['accommodation']=="Cottages")
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
							
		}	
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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

		}
		
		else if ($_REQUEST['night']>=2)
		{
				if($_REQUEST['accommodation']=="Cottages")
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
							
				}
				
			if($_REQUEST['accommodation']=="Room")
				{
					
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
	else if($_REQUEST['types']=="Day and Night")
	{
			
		$priceadult = $res['flda51pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk51pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if ($_REQUEST['night']<=1)
		{
			if($_REQUEST['accommodation']=="Cottages")
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
							
		}	
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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

		}
		
		else if ($_REQUEST['night']>=2)
		{
				if($_REQUEST['accommodation']=="Cottages")
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
							
				}
				
			if($_REQUEST['accommodation']=="Room")
				{
					
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
			
}


else if($pax<=101 || 151>$pax) 
{
	if($_REQUEST['types']=="Day")
	{
			
		$priceadult = $res['flda101pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk101pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
			
			if($_REQUEST['accommodation']=="Cottages")
		{
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
							
		}	
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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
			
	}
	else if($_REQUEST['types']=="Night")
	{
			
		$priceadult = $res['flda101pax'] * $_REQUEST['adult'];
		$pricekid = $res['fldk101pax'] * $_REQUEST['child'];
		$total = $priceadult + $pricekid;
		
		if ($_REQUEST['night']<=1)
		{
			if($_REQUEST['accommodation']=="Cottages")
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
							
		}	
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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
		}
		
		else if ($_REQUEST['night']>=2)
		{
				if($_REQUEST['accommodation']=="Cottages")
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
							
		}	
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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
	else if ($_REQUEST['types']=="Day and Night") 
	{
	
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			if ($_REQUEST['night']<=1)
			{
	
				if($_REQUEST['accommodation']=="Cottages")
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
							
		}	
		if ($_REQUEST['accommodation']=="Rooms")
		{	
	
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
			}
			if ($_REQUEST['night']>=2)
			{
				if($_REQUEST['accommodation']=="Cottages")
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
							
		}	
		if ($_REQUEST['accommodation']=="Room")
		{	
	
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
			
}




	

if($_REQUEST['accommodation']=="Cottages")
	{
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
	}
	
if($_REQUEST['accommodation']=="Room")
	{
		
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
		
		
		////COTTAGES PICTURES
	$displayprofilepic3 = mysql_query("SELECT * from tblphoto WHERE fldtype = 'Cabana");
										while($profile = mysql_fetch_array($displayprofilepic3))
										{
										$imagefilename3 = $profile['imagefile'];
										}
	$displayprofilepic4 = mysql_query("SELECT * from tblphoto WHERE fldtype = 'Mushroom'");
										while($profile = mysql_fetch_array($displayprofilepic4))
										{
										$imagefilename4 = $profile['imagefile'];
										}
										
    $displayprofilepic5 = mysql_query("SELECT * from tblphoto WHERE fldtype = 'Mez'");
										while($profile = mysql_fetch_array($displayprofilepic5))
										{
										$imagefilename5 = $profile['imagefile'];
										}								
	$displayprofilepic6 = mysql_query("SELECT * from tblphoto WHERE fldtype = 'La Leona Cabana'");
										while($profile = mysql_fetch_array($displayprofilepic6))
										{
										$imagefilename6 = $profile['imagefile'];
										}		
	$displayprofilepic7 = mysql_query("SELECT * from tblphoto WHERE fldtype = 'Duplex'");
										while($profile = mysql_fetch_array($displayprofilepic7))
										{
										$imagefilename2 = $profile['imagefile'];
										}		
										
										
	  ?>
	  <center>

							
							
<div id="white" style="width: 940px; height: 2400px	; background-color: white;">
		<div class="row">
                      <div class="col-lg-12">
					  
                    
					
                            <div class="dataTable_wrapper">


	 
	  <?php 
							$err = $_REQUEST['err'];
							echo "<span style='margin-left:-750px;'>";
							echo "<font color='red'>$err</font>";
							echo "</span>";
							?>

						

							<div>
							
						<form action="booking_reservation2.php" method="get">
						<input type="hidden" name="checkawt" value="<?php echo $night; ?>">
						<input type="hidden" name="inErr" value="<?php echo $_REQUEST['inErr']; ?>">
						<input type="hidden" name="err" value="<?php echo $_REQUEST['err']; ?>">
						<input type="hidden" name="outErr" value="<?php echo $_REQUEST['outErr']; ?>">
						<input type="hidden" name="adultErr" value="<?php echo $_REQUEST['adultErr']; ?>">
						<input type="hidden" name="typesErr" value="<?php echo $_REQUEST['typesErr']; ?>">
						<input type="hidden" name="typeErr" value="<?php echo $_REQUEST['typeErr']; ?>">
						<input type="hidden" name="payErr" value="<?php echo $_REQUEST['payErr']; ?>">
						<input type="hidden" name="fname" value="<?php echo $select['fldfname']; ?>">
						<input type="hidden" name="lname" value="<?php echo $select['fldlname']; ?>">
						<input type="hidden" name="num" value="<?php echo $select['fldcontact']; ?>">
						<input type="hidden" name="email" value="<?php echo $select['fldemail']; ?>">
						
						<input class="textarea" type="hidden" size="4" name="reg" value="<?php echo $incre['fldnum']; ?>">
						 
						 			
                        <input class="textarea" type="hidden" size="4" name="numeros" value="<?php echo $qtyyy; ?>">
						<input class="textarea" type="hidden" size="4" name="numeroz" value="<?php echo $qu; ?>">
						<input class="textarea" type="hidden" size="4" name="numerosz" value="<?php echo $qua; ?>">
						
						<input class="textarea" type="hidden" size="4" name="bilang" value="<?php echo $qtyy; ?>">
						<input class="textarea" type="hidden" size="4" name="bilang2" value="<?php echo $quan; ?>">
						<input class="textarea" type="hidden" size="4" name="bilang3" value="<?php echo $quant; ?>">
						<input class="textarea" type="hidden" size="bilang4" name="canaba4" value="<?php echo $quanti; ?>">
						<input class="textarea" type="hidden" size="4" name="bilang5" value="<?php echo $quantit; ?>">



<br><br><br>
						

 
						  <input class="textarea" type="hidden"  name="checkawt" value="<?php echo $_REQUEST['night']; ?>">
					
						<input class="textarea" type="hidden" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>">
						<input class="textarea" type="hidden" name="checkout" value="<?php echo $_REQUEST['checkout'];?>">
						<br>
	
						<input  type="hidden"  name="night" value="<?php echo $_REQUEST['night']; ?>">
						<input type="hidden" name="types" value="<?php echo $_REQUEST['types']; ?>">
						<div id="center" style="margin-left: 125px;">
						<div id="row">
						<div class="col-lg-5">
						Adults(13 years old and above): <font color="red"><?php echo $_REQUEST['adultErr']; ?> </font> <input  class="form-control" type="text" OnChange="this.form.submit();" size="4" name="adult"value="<?php echo $_REQUEST['adult']; ?>">
					</div>
						<div class="col-lg-5">
						Kids(3-12 years old): <input type="text" class="form-control"   name="child" size="4"value="<?php echo $_REQUEST['child']; ?>"><br>
						</div>
						</div>
						<div id="row">
						<div class="col-lg-10">
						Select Booking Type: <font color="red"><?php echo $_REQUEST['accErr']; ?></font><select class="form-control"  onchange="this.form.submit();" name="accommodation" >
						<option value="other" <?php echo isset($_REQUEST["accommodation"]) && $_REQUEST["accommodation"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Cottages"  <?php echo isset($_REQUEST["accommodation"]) && $_REQUEST["accommodation"] == "Cottages" ? "selected" : "Cottages" ?>>Cottages</option>
						<option value="Room"  <?php echo isset($_REQUEST["accommodation"]) && $_REQUEST["accommodation"] == "Room" ? "selected" : "Room" ?>>Room 
						</option></select>

					</div>
					
						</div>
			<br>	<br><br>	<br><br>	<br>
						<?php
						if($_REQUEST['accommodation']=="Cottages")
						{
						?>
						
						<div id="center" style="margin-left: -120px;" >
							<h3 > Hut rental </h3>
							<hr>
						<div id="hahaha">
							<h4> Cabana  </h4><input type="hidden" name="Casa Leona">
							</div>
							
							<div id="row">
						 <div class="col-lg-6">
							<img width="240px"  height="240px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename3;?>">
							</div></div>
							
							<br>
							<?php
							if($_REQUEST['cabana'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtype" value="<?php echo "Cabana"; ?>">
								<?php
							}
							?>
								<?php 

								$disabled = $ove == 0 ? "disabled='disabled'" : "";

							?>
							<div id="ahahaahaha" style="float: left;">
							<div id="row">
							<div class="col-lg-12 ">
							Number of Room: <input type="text" class="form-control" name="cabana" value="<?php echo $_REQUEST['cabana']; ?>"  <?php echo $disabled; ?>>  
							<input type="hidden" class="form-control" class="form-control" value="<?php echo $cab1['fldavailable']; ?>">
							</div></div>
							<div id="row">
							<div class="col-lg-12 ">
							Available Room :<input disabled type="text" class="form-control" value="<?php echo $ove ?>"><br>
							</div></div>
					<div id="row">
						<div class="col-lg-12 ">
							Price: <input disabled type="text" class="form-control" value="<?php echo $cab1['fldday']; ?>"></input><br>
								</div>
					</div></div>
							<br><br><br><br><br>
							<br><br><br>
							<div id="center" style="margin-left: 12s0px;" >
							<br><br><br>
							<hr>
							<h4>Mushroom </h4>
			
							
							<div id="row">
						 <div class="col-lg-6">
							<img width="240px"  height="240px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename4;?>">
							</div></div>
							</div>
							<br>
							<?php
							if($_REQUEST['cabana2'] != NULL)
							{ 
								?>
								<input  class="form-control" readonly type="hidden"  name="roomtypes2" value="<?php echo "Mushroom"; ?>"> 

								<?php
							}
							?>
							<?php 

						$disabled = $over == 0 ? "disabled='disabled'" : "";

							?>
							<div id="ahahaahaha" style="float: left;">
							<div id="row">
							<div class="col-lg-12 ">
							Number of Room: <input  class="form-control" type="text" name="cabana2" value="<?php echo $_REQUEST['cabana2']; ?>" <?php echo $disabled; ?>> 
							<input type="hidden" class="form-control" value="<?php echo $cab2['fldavailable']; ?>">
							</div></div>
							
							<div id="row">
							<div class="col-lg-12 ">
							Available Room :<input disabled type="text" class="form-control" value="<?php echo $over ?>">
							</div>
							</div>
							</div>
							<br><br><br><br><br><br><br><br><br><br><br>
							<hr >
							<div id="center" >
							<h4>Mez </h4>
								<div id="row">
						 <div class="col-lg-6">
							<img width="240px"  height="240px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename5;?>">
							</div></div>
							</div>
							<br>
							<?php
							if($_REQUEST['cabana3'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes3" value="<?php echo "Mez"; ?>"> 
								<?php
							}
							?>
								<?php 

						$disabled = $overa == 0 ? "disabled='disabled'" : "";

							?>
							<div id="ahahaahaha" style="float: left;">
							<div id="row">
							<div class="col-lg-12 ">
							Number of Room: <input  class="form-control" type="text" name="cabana3" value="<?php echo $_REQUEST['cabana3']; ?>" <?php echo $disabled; ?>> 
							<input type="hidden" class="form-control" value="<?php echo $cab3['fldavailable']; ?>">
							</div></div>
							
							<div id="row">
							<div class="col-lg-12 ">
							Available Room :<input disabled type="text" class="form-control" value="<?php echo $overa ?>">
							</div>
							</div></div>
							
							
							<br><br><br><br><br><br><br><br><br><br><br><hr>
								<div id="center" style="margin-left: 10;" >
							
							<h4>La Leona Cabana </h4>
								<div id="row">
						 <div class="col-lg-6">
							<img width="240px"  height="240px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename6;?>">
							</div></div>
							</div>
							<br>
							<?php
							if($_REQUEST['cabana4'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes4" value="<?php echo "La Leona Cabana"; ?>">
								<?php
							}
							?>
								<?php 

						$disabled = $overal == 0 ? "disabled='disabled'" : "";

							?>
							<div id="ahahaahaha" style="float: left;">
							<div id="row">
							<div class="col-lg-12 ">
							Number of Room: <input class="form-control" type="text" name="cabana4" value="<?php echo $_REQUEST['cabana4']; ?>" <?php echo $disabled; ?>> 
							<input type="hidden" class="form-control" value="<?php echo $cab4['fldavailable']; ?>">
							</div></div>
							
							<div id="row">
							<div class="col-lg-12 ">
							Available Room :<input disabled type="text" class="form-control" value="<?php echo $overal ?>">
							</div>
							</div>
							</div>
							<br><br><br><br><br><br><br><br><br><br><br>
								<hr>
							<div id="center" style="margin-left: 10" >
							<h4>Duplex </h4>
								<div id="row">
						 <div class="col-lg-6">
							<img width="240px"  height="240px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename7;?>">
							</div></div>
							</div>
							<?php
							if($_REQUEST['cabana5'] != NULL)
							{ 
								?>
								<input class="form-control" readonly type="hidden"  name="roomtypes5" value="<?php echo "Duplex"; ?>">
								<?php
							}
							?>
								<?php 

						$disabled = $overall == 0 ? "disabled='disabled'" : "";

							?>
							<div id="ahahaahaha" style="float: left;">
							<div id="row">
							<div class="col-lg-12 ">
							Number of Room: <input class="form-control" type="text" name="cabana5" value="<?php echo $_REQUEST['cabana5']; ?>" <?php echo $disabled; ?>> 
							<input type="hidden" class="form-control" value="<?php echo $cab5['fldavailable']; ?>">
							</div></div>
							
						
							<div id="row">
							<div class="col-lg-12 ">
							Available Room :<input disabled type="text" class="form-control" value="<?php echo $overall ?>">
							</div>
							</div>
							</div>
						
						<?php
						}
						?>
						
						<br>
						<?php
							if($_REQUEST['accommodation']=="Room")
						{
						?>

							
							<div id="center" style="margin-left: -150px;" >
							<h3> Room rental </h3>
							
							<h4> Casa Leona </h4>
									<div id="row">
						 <div class="col-lg-6">
							<img width="240px"  height="240px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename?>">
							</div></div>
							
							</div>
							<br>
							<?php
							if($_REQUEST['numroom'] != NULL)
							{ 
					
							?>
							<input class="form-control" readonly type="hidden"  name="room2" value="<?php echo "Casa Leona"; ?>">

							<?php
			
							}
							?>
							<?php 

						$disabled = $e == 0 ? "disabled='disabled'" : "";

							?>
							<div id="ahahaahaha" style="float: left;">
							<div id="row">
							<div class="col-lg-12 ">
							Number of Room: <input class="form-control" type="text" name="numroom" value="<?php echo $_REQUEST['numroom']; ?>" <?php echo $disabled; ?>>  
							<input type="hidden" class="form-control" value="<?php echo $selectas['fldavailable']; ?>">
							</div></div>
							
							<div id="row">
							<div class="col-lg-12 ">
							Available Room :<input disabled type="text" class="form-control" value="<?php echo $e ?>">
							</div>
							</div>
							<br><br><br><br><br><br>
							<div id="row">
							<div class="col-lg-12 ">
							Casa Leona Room Rate <input disabled type="text" class="form-control" value="<?php echo $selectas['fldday']; ?>"></input>
							</div></div>
							</div>
							
							<br><br><br><br><br><br><br><br><br><br><br>
							
							<div id="center" style="margin-left: -140px;" ><HR COLOR="black" WIDTH="60%">
							<h4>Casa Leona Deluxe </h4>
									<div id="row">
						 <div class="col-lg-6">
							<img width="240px"  height="240px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename1;?>">
							</div></div>
							
							
							</div>
							<br>
								<?php
							if($_REQUEST['numrooms'] != NULL)
							{ 
					
							?>
							<input class="form-control" readonly type="hidden"  name="room3" value="<?php echo "Casa Leona Deluxe"; ?>">
				
							<?php
							
							}
							?>
								
							<?php 

						$disabled = $eq == 0 ? "disabled='disabled'" : "";

							?>
							<div id="ahahaahaha" style="float: left;">
							<div id="row">
							<div class="col-lg-12 ">
							Number of Room: <input class="form-control" type="text" name="numrooms" value="<?php echo $_REQUEST['numrooms']; ?>" <?php echo $disabled; ?>> 
							<input type="hidden" class="form-control" value="<?php echo $selectas1['fldavailable']; ?>">
							</div></div>
							
							<div id="row">
							<div class="col-lg-12 ">
							Available Room :<input disabled type="text" class="form-control" value="<?php echo $eq ?>">
							</div>	
							</div>	
							</div>
							
							<br><br><br><br><br><br><br><br><br><br>
							
							
							<div id="center" style="margin-left: -120px;" >
							<br>
							<hr>
							<h4>La Leona Attic </h4>
									<div id="row">
						 <div class="col-lg-6">
							<img width="240px"  height="240px" alt="Room Image" id="roomimage" src="../uploadedpicture/<?php echo $imagefilename2;?>">
							</div></div>
						
							</div>
								<br>
							<?php
							if($_REQUEST['numroomss'] != NULL)
							{ 
					
							?>
							<input class="form-control" readonly type="hidden"  name="room4" value="<?php echo "La Leona Attic"; ?>"> 

							<?php
			
							}
							?>		<div id="ahahaahaha" style="float: left;">
							
							
							<?php 

						$disabled = $equ == 0 ? "disabled='disabled'" : "";

							?>
	
							<div id="row">
							<div class="col-lg-12 ">
							Number of Room: <input class="form-control" type="text" name="numroomss" value="<?php echo $_REQUEST['numroomss']; ?>" <?php echo $disabled; ?>> &nbsp;
							<input type="hidden" class="form-control" value="<?php echo $s['fldavailable']; ?>">
							</div></div>
							
							<div id="row">
							<div class="col-lg-12 ">
							Available Room :<input disabled type="text" class="form-control" value="<?php echo $equ ?>">
							</div>
							</div></div>
							
							
							
							<br><br><br><br><br><br><br><br><br><br><br><br>
							<div class="rowsdsds" style="margin-left: 400px">
							<div class="row">
							<div class="col-lg-8 ">
						Extra Bed: <font color="red"><?php echo $_REQUEST['extra']; ?></font><select class="form-control"  onchange="this.form.submit();" name="extra" >
						<option value="other" <?php echo isset($_REQUEST["extra"]) && $_REQUEST["extra"] == "other" ? "selected" : "other" ?>>Please Select..</option>
						<option value="Yes"  <?php echo isset($_REQUEST["extra"]) && $_REQUEST["extra"] == "Yes" ? "selected" : "Yes" ?>>Yes</option>
						<option value="No"  <?php echo isset($_REQUEST["extra"]) && $_REQUEST["extra"] == "No" ? "selected" : "No" ?>>No 
						</option></select>

						
						<?php
						}
						?>
						<br><br>	
						<div class="row" align="center">
							<div class="col-lg-8 " style="margin-left: 80px;">
						Total: <input type="text" class="form-control" name="totalp" READONLY value="<?php echo $totalprice; ?>"><br><br>
					</div></div>
					</div>
						<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>"></span>
						<input type="hidden" name="avail1" value="<?php echo $pri['fldavailable']; ?>"></span>
						<input type="hidden" name="price" value="<?php echo $count; ?>"></span>
						<input type="hidden" name="pri" value="<?php echo $count1; ?>"></span>
					
					
							<div id="center" style="margin-left: 290px;" >
							
						<?php
						if($_REQUEST['conf']==NULL)
						{
						?>
						<input type="submit" class="btn btn-default" value="Submit" formmethod="post"> <a href="booking_reservation.php"><input type="button" name="back" class="btn btn-default" value="Back"></a></span>
						<?php
						}
						else if($_REQUEST['conf']==1)
						{
						?>	
	
	<div class="overlay1">
	
   	<label><font	color="white"><br><br> <br><br>   Are you sure you want to avail?</font></label><br><br>
   	
	<input type="submit"class="btn btn-default" name="confbut" value="YES" formmethod="post">&nbsp;
	<a href="booking_reservation2.php"><button type="button" class="btn btn-default">NO</button></a></span>
	</div>
						<?php
						}
						?>
						</div>
				</form>

							</div>
						</div>
							</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
</center>
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
						<a href="#">Weâ€™re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a>
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
						<a href="#">Mutya ng Batangan 2010 Candidatesâ€™ Pictorial at La Leona Resort</a>
					</li>
					<li>
						<a href="#">La Leona Resort is now Online!</a>
					</li>
					<li>
						<a href="#">La Leona Resortâ€™s Recreation  </a>
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
					<a href="customer.php">home</a>
				</li>
				<li>
					<a href="gallerylog.php">room</a>
				</li>
				<li>
					<a href="#">event</a>
				</li>
				<li>
					<a href="manage_reservation.php">manage reservation</a>
				</li>
				
			</ul>
		</div>
	</div>
</body>
</html>
	
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

  

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

      <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>
