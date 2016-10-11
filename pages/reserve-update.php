<?php 
	session_start();
	include "connect.php";
	$type = mysql_real_escape_string($_POST["type"]);
	if($type=="cin")
	{
		$dp = mysql_real_escape_string($_POST["dp"]);
		$bal = mysql_real_escape_string($_POST["bal"]);
		$status = "checkedin";
	}else{
		$status = "checkedout";
		$food = mysql_real_escape_string($_POST["food"]);
		$damage = mysql_real_escape_string($_POST["damage"]);
		$payment = mysql_real_escape_string($_POST["payment"]);
		$ornum = mysql_real_escape_string($_POST["ornum"]);
	}
	$trxnid = mysql_real_escape_string($_POST["trxnid"]);
	$item = mysql_real_escape_string($_POST["item"]);
	$email = mysql_real_escape_string($_POST["email"]);
	$fullname = mysql_real_escape_string($_POST["fullname"]);
	$totamt = mysql_real_escape_string($_POST["totamt"]);
	$items = mysql_real_escape_string($_POST["items"]);
	//$time = date("h:i:sa",time());
	setlocale(LC_ALL, "0");
	//$timex = localtime();
	//$time = $timex[2].":".$timex[1].":".$timex[0];
	$time = mysql_real_escape_string($_POST["time"]);
	$date = date("m/d/Y");
	if($type=="cin"){
		$sql="INSERT INTO tblpayments(trxnid,email,fullname,downpayment,balance,totamt,itemid,createdtime,date_) VALUES($trxnid,'$email','$fullname','$dp','$bal','$totamt','$item','$time','$date')";	
	}else{
		$sql="INSERT INTO tblpayments(trxnid,email,fullname,food,damage,totamt,itemid,createdtime,date_,payment_amount,ornum) VALUES($trxnid,'$email','$fullname','$food','$damage','$totamt','$item','$time','$date','$payment','$ornum')";
	}
	$result = mysql_query($sql);

	if($status=="checkedin"){
		//sending email reservation details
        $sql="SELECT * FROM tblreservations, tblpayments where tblreservations.trxnid=tblpayments.trxnid and tblreservations.trxnid='$trxnid'";
        //echo $sql;
        $resultR = mysql_query($sql);
        if(mysql_num_rows($resultR)){
            while($rowR = mysql_fetch_array($resultR)){
                $facid = $rowR['facid'];
                $facility = $rowR['facname'];
                $use = $rowR['typeofuse'];
                $rate = $rowR['rate'];
                $persons = $rowR['numpax'];
                $xcs = $rowR['xcs'];
                $cin = $rowR['cin'];
                $cout = $rowR['cout'];
                if($facid==3){
                    $tin = $rowR['tin'];
                    $tout = $rowR['tout'];
                }
                $totamt = $rowR['totamt'];
            }

            $sqlx="SELECT * FROM tbladdons where trxnid='$trxnid'";
			//echo $sql;
			$resultRx = mysql_query($sqlx);
			if(mysql_num_rows($resultRx)){
				//update
				$sqlxx="SELECT * FROM tblamenities where facid='$facid'";
				$resultRxx = mysql_query($sqlxx);
				$x=0;
				$item_exp = explode(",",$items);
				if(mysql_num_rows($resultRxx)){
					while($rowRxx = mysql_fetch_array($resultRxx)){
						$y = $x + 1;
						$itemx = $item_exp[$x];
						$devx = $rowRxx['devname'];
						$sql="UPDATE tbladdons set pieces='$itemx' where trxnid='$trxnid' and facid='$facid' and devname='$devx'";
						$result = mysql_query($sql);			
						$x++;			
					}
				}
			}
        }

        $to = $email;
        $subject = "Booking details";

        $message = "<b>Congratulations! Your reservation has been saved successfully in our system.</b><br>";
        $message .= "<h1>This is a system generated message!</h1><br>";
        $message .= "<p><h2>Details of your reservation.</h2></p><br>";
        $message .= "<p>You choose facility: ".$facility."</p><br>";
        $message .= "<p>You choose type of use: ".$use."</p><br>";
        $message .= "<p>The rate is ".$rate."</p><br>";
        $message .= "<p>Check-in date is ".$cin."</p><br>";
        $message .= "<p>Check-out date is ".$cout."</p><br>";
        $message .= "<p>The total amount is ".$totamt."</p><br>";

        $header = "From: salem.mit5@gmail.com";
        $header .= "Cc:salem.mit5@gmail \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = @mail($to,stripslashes($subject),stripslashes($message),$header);
	}

	$sql="UPDATE tblreservations set status='$status' where trxnid='$trxnid'";
	$result = mysql_query($sql);	
	//echo $sql;
	echo "success";
?>