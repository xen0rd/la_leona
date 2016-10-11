<?php
include('session.php');
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">


	
		<link rel="stylesheet" type="text/css" href="css/ie.css">


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
					<a href="#">Gallery</a> 
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
			
		header("location:booking_payment.php?err=$err&reg=$_REQUEST[reg]&fname=$_REQUEST[fname]&rmnum=$_REQUEST[rmnum]&checkawt=$_REQUEST[checkawt]&lname=$_REQUEST[lname]&num=$_REQUEST[num]&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&room=$_REQUEST[room]&night=$_REQUEST[night]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&types=$_REQUEST[types]&cabana=$_REQUEST[cabana]&numroom=$_REQUEST[numroom]&extra=$_REQUEST[extra]&totalp=$_REQUEST[totalp]&accommodation=$_REQUEST[accommodation]&numero=$_REQUEST[numero]&numeros=$_REQUEST[numeros]&numrooms=$_REQUEST[numrooms]&numroomss=$_REQUEST[numroomss]&leona=$_REQUEST[leona]&room3=$_REQUEST[room3]&room2=$_REQUEST[room2]&room4=$_REQUEST[room4]&roomtypes2=$_REQUEST[roomtypes2]&roomtypes3=$_REQUEST[roomtypes3]&roomtypes4=$_REQUEST[roomtypes4]&roomtypes5=$_REQUEST[roomtypes5]&cabana2=$_REQUEST[cabana2]&cabana3=$_REQUEST[cabana3]&cabana4=$_REQUEST[cabana4]&cabana5=$_REQUEST[cabana5]");

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
							
	<div id="body">
		<div class="header">
		<div id="body">
<div class="body">
 
<table class="room">
<tr>
  <th>
  </th>
  <td>
    <h2><font face="century gothic" color="#f3be4b" size="5"> Casa La Leona</font></h2>
   <span id="tab"><p style font-size="30" >Take pleasure in La Leona’s airconditioned rooms. You can choose to stay in the contemporary-styled La Leona Attic or in the native-inspired La Leona Loft. Whatever you choose, it will surely bring you that well-deserved La Leona comfort!

<p>If you want more budget-friendly accommodation, why not try La Leona’s fan-cooled rooms? The resort has four nipa hut rooms and one duplex nipa hut. These may be low-priced rooms but will still provide you a relaxing stay at La Leona. </p></span>
<span id="tab"><p>	-bed
<p>	-Arcondition
<p>	-Flat screen TV
<p>	-Refrigerator
<p>	-Toilet and bathroom </p></span>
<hr class="hr">
</td>
</tr>
<table class="room">
	<tr>
		<td>
		<img src="img2/1.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Casa Leona</font><br><br> Good for 2</span>
		<span id="tab">Day use <br><br> Php 1550 </span>
		
		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br> 
		<img src="img2/gallery24.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">Casa Leona</font><br><br> Good for 4</span>
		<span id="tab">Day use <br><br> Php 2050 </span>
		<span id="tab">Overnight <br><br> Php 2650</span>

		<br> <br><br><br><br><br><br><br><hr class="hr"><br><br> 
		<img src="img2/room1.png" alt="Note" style="height:200px;width:250px">
		<br> <br> <span id="tab"><font face="century gothic" color="#f3be4b" size="5">La Leona Attic</font><br><br> Good for 10</span>
		<span id="tab">Day use <br><br> Php 3550 </span>
		<span id="tab">Overnight <br><br> Php 5150</span>

		<br><br><br><br><br><br><br><br>
		<hr class="hr">
	</td>
	<tr>
	</table>
    <button class="button2" onClick="location.href='gallerylog.php'"> <span>Go back</span></button>
    <br><br>
</font>
</body>
</table>
</form>

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
					<a href="#">admin</a>
				</li>
			</ul>
		</div>
	</div>


</body>
</html>
	