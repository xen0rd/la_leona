<?php
	session_start();
	include "connect.php";
	//$facid = mysql_real_escape_string($_POST["hfacid"]);
	$email = mysqli_real_escape_string($con, $_POST["xemail"]);
	$lname = mysqli_real_escape_string($con, $_POST["xlname"]);
	$fname = mysqli_real_escape_string($con, $_POST["xfname"]);
	$mname = (mysqli_real_escape_string($con, $_POST["xmname"]));
	$age = (mysqli_real_escape_string($con, $_POST["xage"]));
	$addr = (mysqli_real_escape_string($con, $_POST["xadd"]));

	//echo $email." - ".$pwd." - ".$lname." - ".$fname." - ".$mname." - ".$age." - ".$gen." - ".$addr." - ".$mnum." - ".$hnum;
	$query = "INSERT INTO tblregister(fldemail,password,fldlname,fldfname,fldmname,fldage,fldgender,fldaddress,fldcontact1,fldcontact2) VALUES('$email','$pwd','$lname','$fname','$mname','$age','$gen','$addr','$mnum','$hnum')";
	//echo $query;
	$result = mysqli_query($con, $query);

	$to = $email;
	$subject = "Account registration";

	$message = "<b>Congratulations! Your account has been registered successfully in our system.</b><br>";
	$message .= "<h1>This is system generated message!</h1><br>";
	$message .= "<p>$lname, $fname $mname from $addr</p><br>";
	$message .= "<p>Your password is '$pwd'</p><br>";
	$message .= "<p>To login, click <a href=\"http://localhost/yeah/pages/customer.php\">here</a><br>";

	$header = "From: salem.mit5@gmail.com";
	$header .= "Cc:salem.mit5@gmail \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";

	$retval = @mail($to,stripslashes($subject),stripslashes($message),$header);
	//echo $to."-".$subject."-".$message."-".$header;
	if( $retval == true ) {
		//echo "Message sent successfully...";
	}else {
		//echo "Message could not be sent...";
	}
	//echo "success";


	$facid = mysqli_real_escape_string($con, $_POST["id"]);
	$faci = mysqli_real_escape_string($con, $_POST["fac"]);
	$use = mysqli_real_escape_string($con, $_POST["use"]);
	$rate = mysqli_real_escape_string($con, $_POST["rate"]);
	$bedx = mysqli_real_escape_string($con, $_POST["bedx"]);
	$numpax = mysqli_real_escape_string($con, $_POST["numpax"]);
	$xcs = mysqli_real_escape_string($con, $_POST["xcs"]);
	$xcsamt = mysqli_real_escape_string($con, $_POST["xcsamt"]);
	$per = mysqli_real_escape_string($con, $_POST["per"]);
	$cin = mysqli_real_escape_string($con, $_POST["cin"]);
	$cout = mysqli_real_escape_string($con, $_POST["cout"]);
	$occa = mysqli_real_escape_string($con, $_POST["occa"]);
	$cater = mysqli_real_escape_string($con, $_POST["cater"]);
	$tin = mysqli_real_escape_string($con, $_POST["tin"]);
	$tout = mysqli_real_escape_string($con, $_POST["tout"]);
	$totime = mysqli_real_escape_string($con, $_POST["totime"]);
	$addhrs = mysqli_real_escape_string($con, $_POST["addhrs"]);
	$addhrsamt = mysqli_real_escape_string($con, $_POST["addhrsamt"]);
	$days = mysqli_real_escape_string($con, $_POST["days"]);
	$totamt = mysqli_real_escape_string($con, $_POST["totamt"]);
	$mode="cash";
	$status="reserved";
	$sql="INSERT into tblreservations(facid,facname,typeofuse,rate,xbed,numpax,xcs,xcsamt,per,cin,cout,tin,tout,totime,addhrs,addhrsamt,numdays,totamt,occasion,cater,mode,email,status) VALUES($facid,'$faci','$use','$rate','$bedx','$numpax','$xcs','$xcsamt','$per','$cin','$cout','$tin','$tout','$totime','$addhrs','$addhrsamt','$days','$totamt','$occa','$cater','$mode','$email','pending')";
	$result = mysqli_query($con, $sql);
	header("location:reservations-list.php");
?>