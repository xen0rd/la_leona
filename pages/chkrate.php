<?php
include "connect.php";    

$facid = mysql_real_escape_string($_POST["id"]);
$name = mysql_real_escape_string($_POST["name"]);
$tag = mysql_real_escape_string($_POST["tagprice"]);

$query = "SELECT * FROM tbltype where facid=$facid and name='$name'";
$result = mysql_query($query);
//$con -> query($query);
if(mysql_num_rows($result)){
	while($row = mysql_fetch_array($result)){
		if($tag=="Day" || $tag=="AM"){
			if($facid!=3){
				$out=$row['price1']."-".$row['price3']."-".$row['pax']."-".$row['perhead'];
			}else{
				$out=$row['price1']."-".$row['price3']."-".$row['pax']."-".$row['perhead'];
			}
			
		}else if($tag=="Night" || $tag=="PM"){
			if($facid!=3){
				$out=$row['price2']."-".$row['price3']."-".$row['pax']."-".$row['perhead'];
			}else{
				$out=$row['price1']."-".$row['price3']."-".$row['pax']."-".$row['perhead'];
			}
		}else{
			if($facid!=3){
				$out=$row['price3']."-".$row['price3']."-".$row['pax']."-".$row['perhead'];
			}else{
				$out=$row['price1']."-".$row['price3']."-".$row['pax']."-".$row['perhead'];
			}
		}
	}
}
echo $out;
?>