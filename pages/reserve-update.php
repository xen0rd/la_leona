<?php
	session_start();
	include "connect.php";
	$type = mysqli_real_escape_string($con, $_POST["type"]);
	$mode = mysqli_real_escape_string($con, $_POST["mode"]);
	$statuss = mysqli_real_escape_string($con, $_POST["statuss"]);

		

	if($type=="cin")
	{
		if($statuss=="pending" || $statuss=="pending-cd")
		{
			$dp = mysqli_real_escape_string($con, $_POST["dp"]);
			$bal = mysqli_real_escape_string($con, $_POST["bal"]);
			$status = "reserved";
		}
		if($statuss=="reserved")
		{
			$dp = mysqli_real_escape_string($con, $_POST["dp"]);
			$bal = mysqli_real_escape_string($con, $_POST["bal"]);
			$status = "checkedin";
		
		}
		if($statuss=="pending" && $mode=="cash")
		{
			$dp = mysqli_real_escape_string($con, $_POST["dp"]);
			$bal = mysqli_real_escape_string($con, $_POST["bal"]);
			$status = "checkedin";
		
		}
		
	}
	if($type=="cout"){
		$status = "checkedout";
		$food = mysqli_real_escape_string($con, $_POST["food"]);
		$damage = mysqli_real_escape_string($con, $_POST["damage"]);
		$payment = mysqli_real_escape_string($con, $_POST["payment"]);
		$ornum = mysqli_real_escape_string($con, $_POST["ornum"]);
	$totamt = mysqli_real_escape_string($con, $_POST["totamt"]);

$change = $payment - $totamt;

						

	}
	$trxnid = mysqli_real_escape_string($con, $_POST["trxnid"]);
	$item = mysqli_real_escape_string($con, $_POST["item"]);
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$fullname = mysqli_real_escape_string($con, $_POST["fullname"]);
	$totamt = mysqli_real_escape_string($con, $_POST["totamt"]);




	if(isset($_POST["items"])){
		$items = mysqli_real_escape_string($con, $_POST["items"]);
	}else{
		$items = "";
	}

	//$time = date("h:i:sa",time());
	setlocale(LC_ALL, "0");
	//$timex = localtime();
	//$time = $timex[2].":".$timex[1].":".$timex[0];
	$time = mysqli_real_escape_string($con, $_POST["time"]);
	$date = date("m/d/Y");
	if($type=="cin"){
		//$sql="INSERT INTO tblpayments(trxnid,email,fullname,downpayment,balance,totamt,itemid,createdtime,date_) VALUES($trxnid,'$email','$fullname','$dp','$bal','$totamt','$item','$time','$date')";
		$sql="UPDATE tblpayments set email='$email',fullname='$fullname',payment_status='$status', downpayment='$dp', balance='$bal',totamt='$totamt',itemid='$item',date_='$date' where trxnid='$trxnid'";
	}else{
		$sql="INSERT INTO tblpayments(trxnid,email,fullname,food,damage,totamt,itemid,createdtime,date_,payment_amount,ornum,changes,payment_status) VALUES($trxnid,'$email','$fullname','$food','$damage','$totamt','$item','$time','$date','$payment','$ornum','$change','checkedout')";
	}
	$result = mysqli_query($con, $sql);

	if($status=="checkedin"){
		//sending email reservation details
        $sql="SELECT * FROM tblreservations, tblpayments where tblreservations.trxnid=tblpayments.trxnid and tblreservations.trxnid='$trxnid'";
        //echo $sql;
        $resultR = mysqli_query($con, $sql);
        if(mysqli_num_rows($resultR)){
            while($rowR = mysqli_fetch_array($resultR)){
                $facid = $rowR['facid'];
                $facility = $rowR['facname'];
                $use = $rowR['typeofuse'];
                $rate = $rowR['rate'];
                $persons = $rowR['numpax'];
                $xcs = $rowR['xcs'];
                $cin = $rowR['cin'];
                $cout = $rowR['cout'];
                $downp = $rowR['downpayment'];
                if($facid==3){
                    $tin = $rowR['tin'];
                    $tout = $rowR['tout'];
                }
                $totamt = $rowR['totamt'];
                if($totamt>$downp){
                    $balance = $totamt - $downp;
                }else{
                    $balance = 0.00;
                }
            }

            $sqlx="SELECT * FROM tbladdons where trxnid='$trxnid'";
			//echo $sql;
			$resultRx = mysqli_query($con, $sqlx);
			if(mysqli_num_rows($resultRx)){
				//update
				$sqlxx="SELECT * FROM tblamenities where facid='$facid'";
				$resultRxx = mysqli_query($con, $sqlxx);
				$x=0;
				$item_exp = explode(",",$items);
				if(mysqli_num_rows($resultRxx)){
					while($rowRxx = mysqli_fetch_array($resultRxx)){
						$y = $x + 1;
						$itemx = $item_exp[$x];
						$devx = $rowRxx['devname'];
						$sql="UPDATE tbladdons set pieces='$itemx' where trxnid='$trxnid' and facid='$facid' and devname='$devx'";
						$result = mysqli_query($con, $sql);
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
        $message .= "<p>The remaining balance is ".$balance."</p><br>";

        $header = "From: salem.mit5@gmail.com";
        $header .= "Cc:salem.mit5@gmail \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = @mail($to,stripslashes($subject),stripslashes($message),$header);
	}

	$sql="UPDATE tblreservations set status='$status' where trxnid='$trxnid'";
	$result = mysqli_query($con, $sql);
	//echo $sql;
	echo "success";
?>