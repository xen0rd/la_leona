<?php 
	include "connect.php";

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
	$totalamt = mysql_real_escape_string($_POST["totalamt"]);
	$addons = mysql_real_escape_string($_POST["addons"]);
	$mode = mysql_real_escape_string($_POST["mode"]);
	$status = mysql_real_escape_string($_POST["status"]);
	$email = mysql_real_escape_string($_POST["email"]);
	$image = mysql_real_escape_string($_POST["image"]);
	$items = mysql_real_escape_string($_POST["items"]);
	//echo $sql;
	if($mode=="cash"){
		$sql="INSERT into tblreservations(facid,facname,typeofuse,rate,xbed,numpax,xcs,xcsamt,per,cin,cout,tin,tout,totime,addhrs,addhrsamt,numdays,totamt,occasion,cater,mode,email,status) VALUES($facid,'$faci','$use','$rate','$bedx','$numpax','$xcs','$xcsamt','$per','$cin','$cout','$tin','$tout','$totime','$addhrs','$addhrsamt','$days','$totalamt','$occa','$cater','$mode','$email','$status')";
		$result = mysql_query($sql);
		echo "success-cash";
	}else if($mode=="cashdp"){
		$sql="INSERT into tblreservations(facid,facname,typeofuse,rate,xbed,numpax,xcs,xcsamt,per,cin,cout,tin,tout,totime,addhrs,addhrsamt,numdays,totamt,occasion,cater,mode,email,status) VALUES($facid,'$faci','$use','$rate','$bedx','$numpax','$xcs','$xcsamt','$per','$cin','$cout','$tin','$tout','$totime','$addhrs','$addhrsamt','$days','$totalamt','$occa','$cater','$mode','$email','pending-cd')";
		$result = mysql_query($sql);
		echo "success-cashdp";
	}
	else{
		$sql="INSERT into tblreservations(facid,facname,typeofuse,rate,xbed,numpax,xcs,xcsamt,per,cin,cout,tin,tout,totime,addhrs,addhrsamt,numdays,totamt,occasion,cater,mode,email,status) VALUES($facid,'$faci','$use','$rate','$bedx','$numpax','$xcs','$xcsamt','$per','$cin','$cout','$tin','$tout','$totime','$addhrs','$addhrsamt','$days','$totalamt','$occa','$cater','$mode','$email','reserved')";
		$result = mysql_query($sql);
		$sql="SELECT * FROM tblreservations where facid='$facid' and email='$email' and cin='$cin' and tin='$tin'";
		//echo $sql;
		$resultR = mysql_query($sql);
		if(mysql_num_rows($resultR)){
			while($rowR = mysql_fetch_array($resultR)){
				$ltrxnid =  $rowR['trxnid'];
			}
		}else{
			$ltrxnid = 0;
		}
		echo $ltrxnid;
	}
		$sql="SELECT * FROM tblreservations where facid='$facid' and email='$email' and cin='$cin' and tin='$tin'";
		//echo $sql;
		$resultR = mysql_query($sql);
		if(mysql_num_rows($resultR)){
			while($rowR = mysql_fetch_array($resultR)){
				$ltrxnid =  $rowR['trxnid'];
			}
		}else{
			$ltrxnid = 0;
		}
		//echo $ltrxnid;
		$sql="SELECT * FROM tbladdons where trxnid='$ltrxnid'";
		//echo $sql;
		$resultR = mysql_query($sql);
		if(mysql_num_rows($resultR)){
			//update
			$sql="SELECT * FROM tblamenities where facid='$facid'";
			$resultR = mysql_query($sql);
			$x=0;
			$item_exp = explode(",",$items);
			if(mysql_num_rows($resultR)){
				while($rowR = mysql_fetch_array($resultR)){
					$y = $x + 1;
					$itemx = $item_exp[$x];
					$devx = $rowR['devname'];
					$sql="UPDATE tbladdons set pieces='$itemx' where trxnid='$ltrxnid' and facid='$facid' and devname='$devx'";
					$result = mysql_query($sql);			
					$x++;			
				}
			}
		}else{
			//insert
			$sql="SELECT * FROM tblamenities where facid='$facid'";
			$resultR = mysql_query($sql);
			$x=0;
			$item_exp = explode(",",$items);
			if(mysql_num_rows($resultR)){
				while($rowR = mysql_fetch_array($resultR)){
					$y = $x + 1;
					$itemx = $item_exp[$x];
					$devx = $rowR['devname'];
					$pricex = $rowR['price1'];
					$sql="INSERT into tbladdons (pieces, trxnid, facid, devname, price1) VALUES('$itemx','$ltrxnid','$facid','$devx','$pricex')";
					$result = mysql_query($sql);			
					$x++;
				}
		}
	
	}
		//echo "success-paypal";
		//header("location:products.php?image=".$image."&name=".$faci."&price=".$totamt."&id=".$facid);
?>