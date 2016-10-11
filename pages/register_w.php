<?php
	session_start();
	include "connect.php";
	//$facid = mysql_real_escape_string($_POST["hfacid"]);
	$email = mysql_real_escape_string($_POST["xemail"]);
	$lname = mysql_real_escape_string($_POST["xlname"]);
	$fname = mysql_real_escape_string($_POST["xfname"]);
	$mname = (mysql_real_escape_string($_POST["xmname"]));
	$age = (mysql_real_escape_string($_POST["xage"]));
	$addr = (mysql_real_escape_string($_POST["xadd"]));

	//echo $email." - ".$pwd." - ".$lname." - ".$fname." - ".$mname." - ".$age." - ".$gen." - ".$addr." - ".$mnum." - ".$hnum;
	$query = "INSERT INTO tblregister(fldemail,password,fldlname,fldfname,fldmname,fldage,fldgender,fldaddress,fldcontact1,fldcontact2) VALUES('$email','$pwd','$lname','$fname','$mname','$age','$gen','$addr','$mnum','$hnum')";
	//echo $query;
	$result = mysql_query($query);

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


	$facid = mysql_real_escape_string($_POST["id"]);
	$faci = mysql_real_escape_string($_POST["fac"]);
	$use = mysql_real_escape_string($_POST["use"]);
	$rate = mysql_real_escape_string($_POST["rate"]);
	$bedx = mysql_real_escape_string($_POST["bedx"]);
	$numpax = mysql_real_escape_string($_POST["numpax"]);
	$xcs = mysql_real_escape_string($_POST["xcs"]);
	$xcsamt = mysql_real_escape_string($_POST["xcsamt"]);
	$per = mysql_real_escape_string($_POST["per"]);
	$cin = mysql_real_escape_string($_POST["cin"]);
	$cout = mysql_real_escape_string($_POST["cout"]);
	$occa = mysql_real_escape_string($_POST["occa"]);
	$cater = mysql_real_escape_string($_POST["cater"]);
	$tin = mysql_real_escape_string($_POST["tin"]);
	$tout = mysql_real_escape_string($_POST["tout"]);
	$totime = mysql_real_escape_string($_POST["totime"]);
	$addhrs = mysql_real_escape_string($_POST["addhrs"]);
	$addhrsamt = mysql_real_escape_string($_POST["addhrsamt"]);
	$days = mysql_real_escape_string($_POST["days"]);
	$totamt = mysql_real_escape_string($_POST["totamt"]);
	$mode="cash";
	$status="reserved";
	$sql="INSERT into tblreservations(facid,facname,typeofuse,rate,xbed,numpax,xcs,xcsamt,per,cin,cout,tin,tout,totime,addhrs,addhrsamt,numdays,totamt,occasion,cater,mode,email,status) VALUES($facid,'$faci','$use','$rate','$bedx','$numpax','$xcs','$xcsamt','$per','$cin','$cout','$tin','$tout','$totime','$addhrs','$addhrsamt','$days','$totalamt','$occa','$cater','$mode','$email','$status')";
	$result = mysql_query($sql);
	header("location:reservations-list.php");
?>