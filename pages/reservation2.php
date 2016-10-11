<?php
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{	
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
	
		header("location:reservation2.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&pay=$_REQUEST[pay]&types=$_REQUEST[types]inErr=$inErr&outErr=$outErr&adultErr=$adultErr&childErr=$childErr&roomtypeErr=$roomtypeErr&typeErr=$typeErr&payErr=$payErr&typesErr=$typesErr");

	}
	
	else 
	{
		
		$con = mysql_connect("localhost","root","");
		if (!$con) 
		 {
		  die('Could not connect: ' . mysql_error());
		 }
		  mysql_select_db("dbresort", $con);
		  
		   $result = mysql_query("SELECT fldsession FROM tblprice");	
		   $day = mysql_query("SELECT * FROM tblreserve WHERE fldarrival='$_POST[checkin]'") or die (mysql_error());
		   $num_rows= mysql_num_rows($day);
		   $days = mysql_query("SELECT * FROM tblreserve WHERE flddeparture='$_POST[checkin]'") or die (mysql_error());
		   $num_rowss= mysql_num_rows($days);	 
		   
		
			if ($num_rows > 0) 
			{
		
			$err= "Room is occupied on that day!";
			$inErr="*";
		 	header("location:reservation2.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&pay=$_REQUEST[pay]&inErr=$inErr");
			}
			
			else if ($num_rowss> 0) 
			{
			$err= "Room is occupied on that day!";
			$inErr="*";
		 	header("location:reservation2.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&pay=$_REQUEST[pay]&inErr=$inErr");
			}
			
			else 
			{
					
			  $sql="INSERT INTO tblreserve (fldarrival, flddeparture, fldadult, fldchild, fldroom, fldstaytype, fldtotal)
				   VALUES ('$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[roomtype]','$_REQUEST[types]','$price')";
		
			if (!mysql_query($sql,$con))
			{
			die('Error: ' . mysql_error());
			}
			header("location:reservation2.php?vnz=4");
			}	
				mysql_close($con);
			}


}


	

if(($_REQUEST['adult']<1 || $_REQUEST['adult']<30)&& ($_REQUEST['child']<1 || $_REQUEST['child']<30))
{
			if($_REQUEST['types']=="Day")
			{
			
			$priceadult = $prices['fldadult'] * $_REQUEST['adult'];
			
				
			}
			else if($_REQUEST['types']=="Night Swimming")
			{
			$priceadult = 200*$_REQUEST['adult'];
			$pricekid = 120*$_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
				if($_REQUEST['roomtype']=="Casa Leona(For 2)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2150 + $extra;
				
				}
				else if($_REQUEST['roomtype']=="Casa Leona(Deluxe For 4)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2650 + $extra;
				
				}
				
				else if($_REQUEST['roomtype']=="La Leona Loft(For 6)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2650 + $extra;
				
				}
				
				else if($_REQUEST['roomtype']=="La Leona Attic(For 10)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2650 + $extra;
				
				}
			$totalamt = $total + $price;
			}
			
}

else if(($_REQUEST['adult']<31 || $_REQUEST['adult']<50) && ($_REQUEST['child']<31 || $_REQUEST['child']<50))
{
			if($_REQUEST['types']=="Day Swimming")
			{
			
			$priceadult = 115*$_REQUEST['adult'];
			$pricekid = 75*$_REQUEST['child'];
			$total = $priceadult + $pricekid;
			if($_REQUEST['roomtype']=="Casa Leona(For 2)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 1550 + $extra;
				
				}
				else if($_REQUEST['roomtype']=="Casa Leona(Deluxe For 4)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2550 + $extra;
				}
				
				else if($_REQUEST['roomtype']=="La Leona Loft(For 6)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2650 + $extra;
				}
				
				else if($_REQUEST['roomtype']=="La Leona Attic(For 10)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 3550 + $extra;
				}
				
			$totalamt = $total + $price;
	
			}
			else if($_REQUEST['types']=="Night Swimming")
			{
			$priceadult = 175*$_REQUEST['adult'];
			$pricekid = 115*$_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			}
}


else if(($_REQUEST['adult']<52 || $_REQUEST['adult']<100) && ($_REQUEST['child']<52 || $_REQUEST['child']<100))
{
			if($_REQUEST['types']=="Day Swimming")
			{
			
			$priceadult = 110*$_REQUEST['adult'];
			$pricekid = 70*$_REQUEST['child'];
			$total = $priceadult + $pricekid;
				
				if($_REQUEST['roomtype']=="Casa Leona(For 2)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 1550 + $extra;
				
				}
				else if($_REQUEST['roomtype']=="Casa Leona(Deluxe For 4)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2550 + $extra;
				}
				
				else if($_REQUEST['roomtype']=="La Leona Loft(For 6)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2650 + $extra;
				}
				
				else if($_REQUEST['roomtype']=="La Leona Attic(For 10)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 3550 + $extra;
				}
				
			$totalamt = $total + $price;
		
			}
			else if($_REQUEST['types']=="Night Swimming")
			{
			$priceadult = 170*$_REQUEST['adult'];
			$pricekid = 110*$_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			}
}


else if(($_REQUEST['adult']<102 || $_REQUEST['adult']<=150) && ($_REQUEST['child']<102|| $_REQUEST['child']<=150))
{
			if($_REQUEST['types']=="Day Swimming")
			{
			
			$priceadult = 105*$_REQUEST['adult'];
			$pricekid = 65*$_REQUEST['child'];
			$total = $priceadult + $pricekid;
				
					if($_REQUEST['roomtype']=="Casa Leona(For 2)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 1550 + $extra;
				
				}
				else if($_REQUEST['roomtype']=="Casa Leona(Deluxe For 4)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2550 + $extra;
				}
				
				else if($_REQUEST['roomtype']=="La Leona Loft(For 6)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 2650 + $extra;
				}
				
				else if($_REQUEST['roomtype']=="La Leona Attic(For 10)")
				{
			
				$extra = $_REQUEST['extra'] * 200;
				$price = 3550 + $extra;
				}
				
			$totalamt = $total + $price;
		
			}
			else if($_REQUEST['types']=="Night Swimming")
			{
			$priceadult = 165*$_REQUEST['adult'];
			$pricekid = 105*$_REQUEST['child'];
			$total = $priceadult + $pricekid;
			
			}
}





?>

<?php 

$err = $_REQUEST['err'];
echo $err;
echo "<br>";

 ?>
<form action="reservation2.php" method="get">
<input type="hidden" name="inErr" value="<?php echo $_REQUEST['inErr']; ?>">
<input type="hidden" name="err" value="<?php echo $_REQUEST['err']; ?>">
<input type="hidden" name="outErr" value="<?php echo $_REQUEST['outErr']; ?>">
<input type="hidden" name="adultErr" value="<?php echo $_REQUEST['adultErr']; ?>">
<input type="hidden" name="roomtypeErr" value="<?php echo $_REQUEST['roomtypeErr']; ?>">
<input type="hidden" name="typeErr" value="<?php echo $_REQUEST['typeErr']; ?>">
<input type="hidden" name="typesErr" value="<?php echo $_REQUEST['typesErr']; ?>">
<input type="hidden" name="payErr" value="<?php echo $_REQUEST['payErr']; ?>">


Checkin date: <input type="date"  name="checkin" value="<?php echo $_REQUEST['checkin']; ?>"><?php echo $_REQUEST['inErr']; ?> <br>
Checkout date: <input type="date" name="checkout" value="<?php echo $_REQUEST['checkout']; ?>"><?php echo $_REQUEST['outErr']; ?> <br>

Adults(13 years old and above): <input type="text" OnChange="this.form.submit();" name="adult"value="<?php echo $_REQUEST['adult']; ?>"><?php echo $_REQUEST['adultErr']; ?> <br>
Kids(3-12 years old): <input type="text" OnChange="this.form.submit();" name="child" size="4"value="<?php echo $_REQUEST['child']; ?>"><?php echo $_REQUEST['childErr']; ?> <br>

Type of stay: <select name="type" onchange="this.form.submit();">
<option value="other" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "other" ? "selected" : "other" ?>>Please Select.. </option>
<?php
while($list = mysql_fetch_assoc($result))
{
	?>
	<option value="<?php echo $list['fldsession'];?>" <?php echo isset($_REQUEST["types"]) && $_REQUEST["types"] == "$list[fldsession]" ? "selected" : "$list[fldsession]" ?>><?php echo $list['fldsession'];?></option>
<?php
}
?>
</select><br><br><br><br>

Room Type: <select name="roomtype" OnChange="this.form.submit();" ><br><br>
<option value="other" <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "other" ? "selected" : "other" ?>>Please Select..</option>
<option value="None"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "None" ? "selected" : "None" ?>>None</option>
<option value="Casa Leona(For 2)"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "Casa Leona(For 2)" ? "selected" : "Casa Leona(For 2)" ?>>Casa Leona(For 2)</option>
<option value="Casa Leona(Deluxe For 4)"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "Casa Leona(Deluxe For 4)" ? "selected" : "Casa Leona(Deluxe For 4)" ?>> Casa Leona(Deluxe For 4)</option>
<option value="La Leona Loft(For 6)"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "La Leona Loft(For 6)" ? "selected" : "La Leona Loft(For 6)" ?>>La Leona Loft(For 6)</option>
<option value="La Leona Attic(For 10)"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "La Leona Attic(For 10)" ? "selected" : "La Leona Attic(For 10)" ?>>La Leona Attic(For 10) 
</option></select><?php echo $_REQUEST['roomtypeErr']; ?><br><br>

Price:<input disabled type="text" value="<?php echo $prices['fldadult'];?>">
Extra Bed: <input type="number" style="width:50px" min="0" name="extra"  OnChange="this.form.submit();" value="<?php echo $_REQUEST['extra']; ?>"><br><br>
Total: <input disabled type="text" name="price" value="<?php echo $priceadult; ?>"><br>
Payment Type:  <select name="pay"><br><br>
<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
<option value="Credit Card"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Credit Card" ? "selected" : "Credit Card" ?>>Credit Card</option>
<option value="Paypal"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Paypal" ? "selected" : "Paypal" ?>>Paypal 
</option></select><?php echo $_REQUEST['payErr']; ?><br>

<input type="submit" formmethod="post"><a href="reservation2.php"><button type="button" class="buttons">Clear</button></a></span>

</form>
