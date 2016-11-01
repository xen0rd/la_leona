<?php
include "connect.php";    

$facid = mysqli_real_escape_string($con, $_POST["id"]);
$name = mysqli_real_escape_string($con, $_POST["name"]);
$tag = mysqli_real_escape_string($con, $_POST["tagprice"]);

$query = "SELECT * FROM tbltype where facid=$facid and name='$name'";
$result = mysqli_query($con, $query);
//$con -> query($query);
if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_array($result)){
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