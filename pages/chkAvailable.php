<?php
include "connect.php";    

$facid = mysqli_real_escape_string($con, $_POST["id"]);
$name = mysqli_real_escape_string($con, $_POST["name"]);
$stay = mysqli_real_escape_string($con, $_POST["stay"]);
$cin = mysqli_real_escape_string($con, $_POST["cin"]);
$cout = mysqli_real_escape_string($con, $_POST["cout"]);
$tin = mysqli_real_escape_string($con, $_POST["tin"]);
$tout = mysqli_real_escape_string($con, $_POST["tout"]);

if($facid!=3){
	if($stay=="Day"){
		$queryR = "SELECT COUNT(*) AS REC_COUNT FROM tblreservations where facid=$facid and facname='$name' and typeofuse='Day use' and (STR_TO_DATE(cin,'%m/%d/%Y') BETWEEN STR_TO_DATE('$cin','%m/%d/%Y') AND DATE_SUB(STR_TO_DATE('$cout','%m/%d/%Y'),INTERVAL 0 DAY)) and (status='checkedin' or status='reserved')";		
	}else{
		$queryR = "SELECT COUNT(*) AS REC_COUNT FROM tblreservations where facid=$facid and facname='$name' and typeofuse='Overnight' and (STR_TO_DATE(cin,'%m/%d/%Y') BETWEEN STR_TO_DATE('$cin','%m/%d/%Y') AND DATE_SUB(STR_TO_DATE('$cout','%m/%d/%Y'),INTERVAL 0 DAY)) and (status='checkedin' or status='reserved')";		
	}
	
}else{
	$queryR = "SELECT COUNT(*) AS REC_COUNT FROM tblreservations where facid=$facid and facname='$name' and (STR_TO_DATE(cin,'%m/%d/%Y') = STR_TO_DATE('$cin','%m/%d/%Y')) AND ((HOUR('$tin')>=HOUR(tin) AND HOUR('$tin')<HOUR(tout)) OR (HOUR('$tout')>=HOUR(tin) AND HOUR('$tout')<HOUR(tout))) AND status='checkedin'";
}

//echo $queryR;
$resultR = mysqli_query($con, $queryR);
if(mysqli_num_rows($resultR)){
	while($rowR = mysqli_fetch_array($resultR)){
		$itemsR=$rowR['REC_COUNT'];
	}
}

$query = "SELECT * FROM tbltype where facid=$facid and name='$name'";
$result = mysqli_query($con, $query);
//$con -> query($query);
if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_array($result)){
		 $items=$row['pieces'];
	}
}
if($itemsR>=$items){
	$out = "not";
}else{
	$out = "ok";
}

echo $out;

?>