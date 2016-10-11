<?php
	session_start();
	include "connect.php";
	//$facid = mysql_real_escape_string($_POST["hfacid"]);
	$email = mysql_real_escape_string($_POST["xemail"]);
	$pwd = mysql_real_escape_string($_POST["xpwd"]);
	$lname = mysql_real_escape_string($_POST["xlname"]);
	$fname = mysql_real_escape_string($_POST["xfname"]);
	$mname = (mysql_real_escape_string($_POST["xmname"]));
	$age = (mysql_real_escape_string($_POST["xage"]));
	$gen = (mysql_real_escape_string($_POST["xgen"]));
	$addr = (mysql_real_escape_string($_POST["xadd"]));
	$mnum = (mysql_real_escape_string($_POST["xmobnum"]));
	$hnum = (mysql_real_escape_string($_POST["xhomenum"]));

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
	if(isset($_SESSION['reserve'])){
		if($_SESSION['reserve']==1){
			if($_SESSION['login_type']=="FRONTDESK"){
				$_SESSION['set_reservation']=$email;
				header("Location:../../yeah/pages/facdetails_w.php?id=".$_SESSION['facid']);
			}else{
				$_SESSION['login_user']=$email;
				$_SESSION['login_name']=$lname.', '.$fname.' '.$mname.'.';
				$_SESSION['login_type']="customer";
				$_SESSION['login_email']=$email;
				$_SESSION['logged']="true";
				header("Location:../../yeah/pages/facdetails.php?id=".$_SESSION['facid']);
			}
		}else{
			header("Location:../../yeah/pages/reg-successful.php");
		}
	}else{
		header("Location:../../yeah/pages/reg-successful.php");	
	}
	
	//echo "success";

?>