<?php
include "connect.php";    

$uname = mysqli_real_escape_string($con, $_POST["uname"]);
$pwd = mysqli_real_escape_string($con, $_POST["pwd"]);

$query = "SELECT * FROM tblregister where fldemail='$uname' and password='$pwd' and type='customer'";
$result = mysqli_query($con, $query);
//$con -> query($query
if(mysqli_num_rows($result)){
	session_start();
	while($row = mysqli_fetch_array($result)){
		$_SESSION['login_user']=$uname;
		$_SESSION['login_name']=$row['fldlname'].', '.$row['fldfname'].' '.$row['fldmname'].'.';
		$_SESSION['login_type']=$row['type'];
		$_SESSION['login_email']=$row['fldemail'];
		$_SESSION['logged']="true";
		$out="ok";
	}
}else{
	session_start();
	if(session_destroy()){
		$out="not_ok";
	}	
}
echo $out;
?>