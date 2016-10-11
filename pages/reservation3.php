
<?php
error_reporting(0);
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dbresort", $con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(empty($_REQUEST['checkin'])||empty($_REQUEST['checkout'])||empty($_REQUEST['adult'])||$_REQUEST['roomtype']=="other"||$_REQUEST['type']=="other"||$_REQUEST['pay']=="other"||$_REQUEST['types']=="other")
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
		if($_REQUEST['roomtype']=="other")
		{
			$roomtypeErr = "*";
		}
	
		if($_REQUEST['type']=="other")
		{
			$typeErr = "*";
		}
		if($_REQUEST['pay']=="other")
		{
			$payErr = "*";
		}
	
		if($_REQUEST['types']=="other")
		{
			$typesErr = "*";
		}
	
		header("location:reservation3.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&pay=$_REQUEST[pay]&types=$_REQUEST[types]&extra$_RE[extra]=='checked'&inErr=$inErr&outErr=$outErr&adultErr=$adultErr&childErr=$childErr&roomtypeErr=$roomtypeErr&typeErr=$typeErr&payErr=$payErr&typesErr=$typesErr");

	}
	else
	{
		  $day = mysql_query("SELECT * FROM tblreserve WHERE fldarrival='$_POST[checkin]'") or die (mysql_error());
		   $num_rows= mysql_num_rows($day);
		   $days = mysql_query("SELECT * FROM tblreserve WHERE flddeparture='$_POST[checkin]'") or die (mysql_error());
		   $num_rowss= mysql_num_rows($days);	
	
		   
		if ($num_rows > 0) 
			{
		
			$err= "Room is occupied on that day!";
			$inErr="*";
		 	header("location:reservation3.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&types=$_REQUEST[types]&pay=$_REQUEST[pay]&inErr=$inErr");
			}
			
			else if ($num_rowss> 0) 
			{
			$err= "Room is occupied on that day!";
			$inErr="*";
		 	header("location:reservation3.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&types=$_REQUEST[types]&pay=$_REQUEST[pay]&inErr=$inErr");
			}
			
		
			else 
			{
						$avail = $_REQUEST['avail'] - $_REQUEST['cabana'];
					
			  $sql="INSERT INTO tblreserve (fldarrival, flddeparture, fldadult, fldchild, fldroom, fldstaytype, fldtotal)
				   VALUES ('$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[roomtype]','$_REQUEST[types]','$price')";
				
				$req ="UPDATE tblhut SET fldavailable = '$avail' WHERE fldtype = '$_REQUEST[roomtype]'";
						mysql_query($req);
			if (!mysql_query($sql,$con))
			{
			die('Error: ' . mysql_error());
			}
			header("location:reservation3.php?vnz=4");
			}	
				mysql_close($con);
			}


}


$result = mysql_query("SELECT fldsession FROM tblprice");
$result0 = mysql_query("SELECT fldtype FROM tblhut");



$resultss = mysql_query("SELECT * FROM tblprice WHERE fldsession = '$_REQUEST[types]'");
$res = mysql_fetch_array($resultss);   

$avail = mysql_query("SELECT fldavailable FROM tblhut WHERE fldtype = '$_REQUEST[roomtype]'");
$price = mysql_fetch_array($avail);


$pax = $_REQUEST['adult'] + $_REQUEST['child'];
$avail = $_REQUEST['cabana'] - $_REQUEST['avail'];
					

					
if($pax<=1 || 30>$pax)
{
			if($_REQUEST['types']=="Day")
			{
			
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
		
				
			}
			else if ($_REQUEST['types']=="Night")
			{
			
			$priceadult = $res['fldadult'] * $_REQUEST['adult'];
			$pricekid = $res['fldkid'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
				
			}
			
}


else if($pax<=30 || 51>$pax) 
{
			if($_REQUEST['types']=="Day")
			{
			
			$priceadult = $res['flda30pax'] * $_REQUEST['adult'];
			$pricekid = $res['fldk30pax'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
				
			}
			else if($_REQUEST['types']=="Night")
			{
			
			$priceadult = $res['flda30pax'] * $_REQUEST['adult'];
			$pricekid = $res['fldk30pax'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
				
			}
			
}


else if($pax<=51 || 101>$pax) 
{
			if($_REQUEST['types']=="Day")
			{
			
			$priceadult = $res['flda51pax'] * $_REQUEST['adult'];
			$pricekid = $res['fldk51pax'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
				
			}
			else if($_REQUEST['types']=="Night")
			{
			
			$priceadult = $res['flda51pax'] * $_REQUEST['adult'];
			$pricekid = $res['fldk51pax'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
				
			}
			
}

else if($pax<=101 || 151>$pax) 
{
			if($_REQUEST['types']=="Day")
			{
			
			$priceadult = $res['flda101pax'] * $_REQUEST['adult'];
			$pricekid = $res['fldk101pax'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
				
			}
			else if($_REQUEST['types']=="Night")
			{
			
			$priceadult = $res['flda101pax'] * $_REQUEST['adult'];
			$pricekid = $res['fldk101pax'] * $_REQUEST['child'];
			$total = $priceadult + $pricekid;
				
			}
			
}


if($_REQUEST['roomtype']=="other"||$_REQUEST['roomtype']==NULL)
{
	$libre = "";
}
else
{
	if($price['fldavailable']>0)
	{
		$libre = $price['fldavailable'];
	}
	else
	{
		$libre = "No Available Cottage(s)";
	}
}

?>

<?php 

$err = $_REQUEST['err'];
echo $err;


 ?>
<form action="reservation3.php" method="get">
<input type="hidden" name="inErr" value="<?php echo $_REQUEST['inErr']; ?>">
<input type="hidden" name="err" value="<?php echo $_REQUEST['err']; ?>">
<input type="hidden" name="outErr" value="<?php echo $_REQUEST['outErr']; ?>">
<input type="hidden" name="adultErr" value="<?php echo $_REQUEST['adultErr']; ?>">
<input type="hidden" name="typesErr" value="<?php echo $_REQUEST['typesErr']; ?>">
<input type="hidden" name="roomtypeErr" value="<?php echo $_REQUEST['roomtypeErr']; ?>">
<input type="hidden" name="typeErr" value="<?php echo $_REQUEST['typeErr']; ?>">
<input type="hidden" name="payErr" value="<?php echo $_REQUEST['payErr']; ?>">


Checkin date: <input type="date"  name="checkin" value="<?php echo $_REQUEST['checkin']; ?>"><?php echo $_REQUEST['inErr']; ?> <br>
Checkout date: <input type="date" name="checkout" value="<?php echo $_REQUEST['checkout']; ?>"><?php echo $_REQUEST['outErr']; ?> <br>

Adults(13 years old and above): <input type="text" OnChange="this.form.submit();" name="adult"value="<?php echo $_REQUEST['adult']; ?>"><?php echo $_REQUEST['adultErr']; ?> <br>
Kids(3-12 years old): <input type="text" OnChange="this.form.submit();" name="child" size="4"value="<?php echo $_REQUEST['child']; ?>"><?php echo $_REQUEST['childErr']; ?> <br>

Type of stay: <select name="types" onchange="this.form.submit();">
<option value="other" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "other" ? "selected" : "other" ?>>Please Select..</option>
<?php
while($list = mysql_fetch_assoc($result))
{
?>
<option value="<?php echo $list['fldsession'];?>" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "$list[fldsession]" ? "selected" : "$list[fldsession]" ?>><?php echo $list['fldsession'];?></option>
<?php
}
?>
</select><?php echo $_REQUEST['typesErr'];?><br><br><br><br>
	
Nipa and Hut rental: <select name="roomtype" onchange="this.form.submit();">
<option value="other" <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "other" ? "selected" : "other" ?>>Please Select..</option>
<?php
while($list = mysql_fetch_assoc($result0))
{
?>
<option value="<?php echo $list['fldtype'];?>" <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "$list[fldtype]" ? "selected" : "$list[fldtype]" ?>><?php echo $list['fldtype'];?></option>
<?php
} 
?>
</select><?php echo $_REQUEST['typesErr'];?><br><br><br><br>
Available Cottage(s):<input disabled type="text" value="<?php echo $libre; ?>"><br><br>

Number of Cottage(s): <input type="text"  name="cabana" value="<?php echo $_REQUEST['cabana']; ?>"><?php echo $_REQUEST['cabanaErr']; ?> <br>
Extra Bed: <input type="checkbox" style="width:50px" min="0" name="extra"  OnChange="this.form.submit();" value="<?php echo $_REQUEST['extra']; ?>"><br><br>
Total: <input disabled type="text" name="price" value="<?php echo $total; ?>"><br>
Payment Type:  <select name="pay"><br><br>
<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
<option value="Credit Card"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Credit Card" ? "selected" : "Credit Card" ?>>Credit Card</option>
<option value="Paypal"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Paypal" ? "selected" : "Paypal" ?>>Paypal 
</option></select><?php echo $_REQUEST['payErr']; ?><br>

<input type="hidden" name="avail" value="<?php echo $price['fldavailable']; ?>">

<input type="submit" formmethod="post"><a href="reservation3.php"><button type="button" class="buttons">Clear</button></a></span>

</form>
