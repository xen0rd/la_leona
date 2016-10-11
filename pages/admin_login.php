<?php
session_start();
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
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		include "connect.php";
		$result = mysql_query("select * from tbllogin where password='$password' AND username='$username'");
		if(mysql_num_rows($result)){
			while($row = mysql_fetch_array($result))
			{
				$_SESSION['login_user']=$username;
				header("location: admin_home.php"); 
			}
		}
	mysql_close($connection); 
	}
}
?>