<?php
include "connect.php";    

$facid = mysql_real_escape_string($_POST["id"]);
$name = mysql_real_escape_string($_POST["name"]);
$stay = mysql_real_escape_string($_POST["stay"]);
$cin = mysql_real_escape_string($_POST["cin"]);
$cout = mysql_real_escape_string($_POST["cout"]);
$tin = mysql_real_escape_string($_POST["tin"]);
$tout = mysql_real_escape_string($_POST["tout"]);

if($facid!=3){
	if($stay=="Day"){
		$queryR = "SELECT COUNT(*) AS REC_COUNT FROM tblreservations where facid=$facid and facname='$name' and (STR_TO_DATE(cin,'%m/%d/%Y') BETWEEN STR_TO_DATE('$cin','%m/%d/%Y') AND DATE_SUB(STR_TO_DATE('$cout','%m/%d/%Y'),INTERVAL 1 DAY)) and status='checkedin'";		
	}else{
		$queryR = "SELECT COUNT(*) AS REC_COUNT FROM tblreservations where facid=$facid and facname='$name' and (STR_TO_DATE(cin,'%m/%d/%Y') BETWEEN STR_TO_DATE('$cin','%m/%d/%Y') AND STR_TO_DATE('$cout','%m/%d/%Y')) and status='checkedin'";	
	}
	
}else{
	$queryR = "SELECT COUNT(*) AS REC_COUNT FROM tblreservations where facid=$facid and facname='$name' and (STR_TO_DATE(cin,'%m/%d/%Y') = STR_TO_DATE('$cin','%m/%d/%Y')) AND ((HOUR('$tin')>=HOUR(tin) AND HOUR('$tin')<HOUR(tout)) OR (HOUR('$tout')>=HOUR(tin) AND HOUR('$tout')<HOUR(tout))) AND status='checkedin'";
}

//echo $queryR;
$resultR = mysql_query($queryR);
if(mysql_num_rows($resultR)){
	while($rowR = mysql_fetch_array($resultR)){
		$itemsR=$rowR['REC_COUNT'];
	}
}

$query = "SELECT * FROM tbltype where facid=$facid and name='$name'";
$result = mysql_query($query);
//$con -> query($query);
if(mysql_num_rows($result)){
	while($row = mysql_fetch_array($result)){
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