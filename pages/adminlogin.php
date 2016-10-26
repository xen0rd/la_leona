<?php
session_start();
include "connect.php";
$error=''; 
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "<br><br><br> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color='red' size='3'> Invalid Username or Password </font>";
	}
	else
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($con,$username);
		$password = mysqli_real_escape_string($con,$password);
		
		$result = mysqli_query($con,"select * from tbllogin where password='$password' AND username='$username'");
		if(mysqli_num_rows($result)){
			while($row = mysqli_fetch_array($result))
			{
				$_SESSION['login_user']=$username;
				$_SESSION['login_type']=$row['type'];
				$_SESSION['logged']="true";
				header("location: index.php"); 
			}
		}else{
			$error = "<br><br><br> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color='red' size='3'> Invalid Username or Password </font>";		
		}
	mysqli_close($con); 
	}
}
?>