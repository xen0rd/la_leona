<?php
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{	
	if(empty($_REQUEST['checkin'])||empty($_REQUEST['checkout'])||empty($_REQUEST['adult'])||$_REQUEST['roomtype']=="other"||$_REQUEST['type']=="other"||$_REQUEST['pay']=="other")
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
	
	
	
		header("location:reservation.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&pay=$_REQUEST[pay]&inErr=$inErr&outErr=$outErr&adultErr=$adultErr&childErr=$childErr&roomtypeErr=$roomtypeErr&typeErr=$typeErr&payErr=$payErr");

	}
	
	else 
	{
		
		$con = mysql_connect("localhost","root","");
		if (!$con) 
		 {
		  die('Could not connect: ' . mysql_error());
		 }
		  mysql_select_db("dbresort", $con);
		 $day = mysql_query("SELECT * FROM tblreserve WHERE fldarrival='$_POST[checkin]'") or die (mysql_error());
		 $num_rows= mysql_num_rows($day);
		  $days = mysql_query("SELECT * FROM tblreserve WHERE flddeparture='$_POST[checkin]'") or die (mysql_error());
		 $num_rowss= mysql_num_rows($days);

			if ($num_rows > 0) 
			{
		
			$err= "Room is occupied on that day!";
			$inErr="*";
		 	header("location:reservation.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&pay=$_REQUEST[pay]&inErr=$inErr");
			}
			
			else if ($num_rowss> 0) 
			{
			$err= "Room is occupied on that day!";
			$inErr="*";
		 	header("location:reservation.php?err=$err&checkin=$_REQUEST[checkin]&checkout=$_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&roomtype=$_REQUEST[roomtype]&type=$_REQUEST[type]&pay=$_REQUEST[pay]&inErr=$inErr");
			}
			
			else 
			{
					
			  $sql="INSERT INTO tblreserve (fldarrival, flddeparture, fldadult, fldchild, fldroom, fldstaytype, fldtotal)
				   VALUES ('$_REQUEST[checkin]','$_REQUEST[checkout]','$_REQUEST[adult]','$_REQUEST[child]','$_REQUEST[roomtype]','$_REQUEST[type]','$price')";
		
			if (!mysql_query($sql,$con))
			{
			die('Error: ' . mysql_error());
			}
			header("location:reservation.php?vnz=4");
			}	
			mysql_close($con);
			}


}



if($_REQUEST['roomtype']=="Casa Leona(For 2)")
{
			if($_REQUEST['type']=="Day Use")
			{
			
			$extra = $_REQUEST['extra'] * 200;
			$price = 1550 + $extra;
		
			}
			else if($_REQUEST['type']=="Overnight")
			{
			$extra = $_REQUEST['extra'] * 200;
			$price = 2150 + $extra;
			
			}
}
else if($_REQUEST['roomtype']=="Casa Leona(Deluxe For 4)")
{
			if($_REQUEST['type']=="Day Use")
			{
			$extra = $_REQUEST['extra'] * 200;
			$price = 2050 + $extra;
	
			}
			else if($_REQUEST['type']=="Overnight")
			{
			$extra = $_REQUEST['extra'] * 200;
			$price = 2650 + $extra;
			}
}
else if($_REQUEST['roomtype']=="Casa Loft(For 6)")
{
			if($_REQUEST['type']=="Day Use")
			{
			$extra = $_REQUEST['extra'] * 200;
			$price = 2650 + $extra;
			}
			else if($_REQUEST['type']=="Overnight")
			{
			$extra = $_REQUEST['extra'] * 200;
			$price = 2950 + $extra;
			}
}
else if($_REQUEST['roomtype']=="Casa Attic(For 10)")
{
			if($_REQUEST['type']=="Day Use")
			{
			$extra = $_REQUEST['extra'] * 200;
			$price = 3550 + $extra;
			}
			else if($_REQUEST['type']=="Overnight")
			{
			$extra = $_REQUEST['extra'] * 200;
			$price = 5150 + $extra;
			}
} 



?>

<?php 

$err = $_REQUEST['err'];
echo $err;
echo "<br>";

 ?>
<form action="reservation.php" method="get">
<input type="hidden" name="inErr" value="<?php echo $_REQUEST['inErr']; ?>">
<input type="hidden" name="err" value="<?php echo $_REQUEST['err']; ?>">
<input type="hidden" name="outErr" value="<?php echo $_REQUEST['outErr']; ?>">
<input type="hidden" name="adultErr" value="<?php echo $_REQUEST['adultErr']; ?>">
<input type="hidden" name="roomtypeErr" value="<?php echo $_REQUEST['roomtypeErr']; ?>">
<input type="hidden" name="typeErr" value="<?php echo $_REQUEST['typeErr']; ?>">
<input type="hidden" name="payErr" value="<?php echo $_REQUEST['payErr']; ?>">

Checkin date: <input type="date" name="checkin" value="<?php echo $_REQUEST['checkin']; ?>"><?php echo $_REQUEST['inErr']; ?> <br>
Checkout date: <input type="date" name="checkout" value="<?php echo $_REQUEST['checkout']; ?>"><?php echo $_REQUEST['outErr']; ?> <br>

Adults(13 years old and above): <input type="text" name="adult"value="<?php echo $_REQUEST['adult']; ?>"><?php echo $_REQUEST['adultErr']; ?> <br>
Kids(3-12 years old): <input type="text" name="child" size="4"value="<?php echo $_REQUEST['child']; ?>"><?php echo $_REQUEST['childErr']; ?> <br>
Room Rates: <select name="roomtype"><br><br>
<option value="other" <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "other" ? "selected" : "other" ?>>Please Select..</option>
<option value="None"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "None" ? "selected" : "None" ?>>None</option>
<option value="Casa Leona(For 2)"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "Casa Leona(For 2)" ? "selected" : "Casa Leona(For 2)" ?>>Casa Leona(For 2)</option>
<option value="Casa Leona(Deluxe For 4)"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "Casa Leona(Deluxe For 4)" ? "selected" : "Casa Leona(Deluxe For 4)" ?>> Casa Leona(Deluxe For 6)</option>
<option value="Casa Loft(For 6)"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "Casa Loft(For 6)" ? "selected" : "Casa Loft(For 6)" ?>>Casa Loft(For 6)</option>
<option value="Casa Attic(For 10)"  <?php echo isset($_REQUEST["roomtype"]) && $_REQUEST["roomtype"] == "Casa Attic(For 10)" ? "selected" : "Casa Attic(For 10)" ?>>Casa Attic(For 10) 
</option></select><?php echo $_REQUEST['roomtypeErr']; ?><br><br>

Type of Stay: <select name="type" OnChange="this.form.submit();"><br><br>
<option value="other" <?php echo isset($_REQUEST["type"]) && $_REQUEST["type"] == "other" ? "selected" : "other" ?>>Please Select..</option>
<option value="Day Use"  <?php echo isset($_REQUEST["type"]) && $_REQUEST["type"] == "Day Use" ? "selected" : "Day Use" ?>>Day Use</option>
<option value="Overnight"  <?php echo isset($_REQUEST["type"]) && $_REQUEST["type"] == "Overnight" ? "selected" : "Overnight" ?>>Overnight  
</option></select><?php echo $_REQUEST['typeErr']; ?><br>

Extra Bed: <input type="number" style="width:50px" min="0" name="extra"  OnChange="this.form.submit();" value="<?php echo $_REQUEST['extra']; ?>"><br><br>

Total: <input disabled type="text" name="price" value="<?php echo $price; ?>"><br>
Payment Type:  <select name="pay"><br><br>
<option value="other" <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "other" ? "selected" : "other" ?>>Please Select..</option>
<option value="Credit Card"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Credit Card" ? "selected" : "Credit Card" ?>>Credit Card</option>
<option value="Paypal"  <?php echo isset($_REQUEST["pay"]) && $_REQUEST["pay"] == "Paypal" ? "selected" : "Paypal" ?>>Paypal 
</option></select><?php echo $_REQUEST['payErr']; ?><br>

<input type="submit" formmethod="post"><a href="reservation.php"><button type="button" class="buttons">Clear</button></a></span>

</form>
