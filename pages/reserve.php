<?php 
	include "connect.php";

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
	$totalamt = mysqli_real_escape_string($con, $_POST["totalamt"]);
	$addons = mysqli_real_escape_string($con, $_POST["addons"]);
	$mode = mysqli_real_escape_string($con, $_POST["mode"]);
	$status = mysqli_real_escape_string($con, $_POST["status"]);
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$image = mysqli_real_escape_string($con, $_POST["image"]);
	$items = mysqli_real_escape_string($con, $_POST["items"]);
	//echo $sql;
	if($mode=="cash"){
		$sql="INSERT into tblreservations(facid,facname,typeofuse,rate,xbed,numpax,xcs,xcsamt,per,cin,cout,tin,tout,totime,addhrs,addhrsamt,numdays,totamt,occasion,cater,mode,email,status) VALUES($facid,'$faci','$use','$rate','$bedx','$numpax','$xcs','$xcsamt','$per','$cin','$cout','$tin','$tout','$totime','$addhrs','$addhrsamt','$days','$totalamt','$occa','$cater','$mode','$email','$status')";
		$result = mysqli_query($con, $sql);
		echo "success-cash";
	}else if($mode=="cashdp"){
		$sql="INSERT into tblreservations(facid,facname,typeofuse,rate,xbed,numpax,xcs,xcsamt,per,cin,cout,tin,tout,totime,addhrs,addhrsamt,numdays,totamt,occasion,cater,mode,email,status) VALUES($facid,'$faci','$use','$rate','$bedx','$numpax','$xcs','$xcsamt','$per','$cin','$cout','$tin','$tout','$totime','$addhrs','$addhrsamt','$days','$totalamt','$occa','$cater','$mode','$email','pending-cd')";
		$result = mysqli_query($con, $sql);
		echo "success-cashdp";
	}
	else{
		$sql="INSERT into tblreservations(facid,facname,typeofuse,rate,xbed,numpax,xcs,xcsamt,per,cin,cout,tin,tout,totime,addhrs,addhrsamt,numdays,totamt,occasion,cater,mode,email,status) VALUES($facid,'$faci','$use','$rate','$bedx','$numpax','$xcs','$xcsamt','$per','$cin','$cout','$tin','$tout','$totime','$addhrs','$addhrsamt','$days','$totalamt','$occa','$cater','$mode','$email','pending')";
		$result = mysqli_query($con, $sql);
		$sql="SELECT * FROM tblreservations where facid='$facid' and email='$email' and cin='$cin' and tin='$tin'";
		//echo $sql;
		$resultR = mysqli_query($con, $sql);
		if(mysqli_num_rows($resultR)){
			while($rowR = mysqli_fetch_array($resultR)){
				$ltrxnid =  $rowR['trxnid'];
			}
		}else{
			$ltrxnid = 0;
		}
		echo $ltrxnid;
	}
		$sql="SELECT * FROM tblreservations where facid='$facid' and email='$email' and cin='$cin' and tin='$tin'";
		//echo $sql;
		$resultR = mysqli_query($con, $sql);
		if(mysqli_num_rows($resultR)){
			while($rowR = mysqli_fetch_array($resultR)){
				$ltrxnid =  $rowR['trxnid'];
			}
		}else{
			$ltrxnid = 0;
		}
		//echo $ltrxnid;
		$sql="SELECT * FROM tbladdons where trxnid='$ltrxnid'";
		//echo $sql;
		$resultR = mysqli_query($con, $sql);
		if(mysqli_num_rows($resultR)){
			//update
			$sql="SELECT * FROM tblamenities where facid='$facid'";
			$resultR = mysqli_query($con, $sql);
			$x=0;
			$item_exp = explode(",",$items);
			if(mysqli_num_rows($resultR)){
				while($rowR = mysqli_fetch_array($resultR)){
					$y = $x + 1;
					$itemx = $item_exp[$x];
					$devx = $rowR['devname'];
					$sql="UPDATE tbladdons set pieces='$itemx' where trxnid='$ltrxnid' and facid='$facid' and devname='$devx'";
					$result = mysqli_query($con, $sql);			
					$x++;			
				}
			}
		}else{
			//insert
			$sql="SELECT * FROM tblamenities where facid='$facid'";
			$resultR = mysqli_query($con, $sql);
			$x=0;
			$item_exp = explode(",",$items);
			if(mysqli_num_rows($resultR)){
				while($rowR = mysqli_fetch_array($resultR)){
					$y = $x + 1;
					$itemx = $item_exp[$x];
					$devx = $rowR['devname'];
					$pricex = $rowR['price1'];
					$sql="INSERT into tbladdons (pieces, trxnid, facid, devname, price1) VALUES('$itemx','$ltrxnid','$facid','$devx','$pricex')";
					$result = mysqli_query($con, $sql);			
					$x++;
				}
		}
	
	}
		//echo "success-paypal";
		//header("location:products.php?image=".$image."&name=".$faci."&price=".$totamt."&id=".$facid);
?>