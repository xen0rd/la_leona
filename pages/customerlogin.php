

<?php
session_start();
$error=''; 
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
 $error = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='red' size='3'> Invalid Username or Password </font>";
}
else
{

$username=$_POST['username'];
$password=$_POST['password'];
$connection = mysql_connect("localhost", "root", "");
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$db = mysql_select_db("dbresort", $connection);
$query = mysql_query("select * from tblregister where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username;
header("location: customer.php"); 
} else {
$error = "<br> <font color='red' size='3'> Invalid Username or Password </font>";
}
mysql_close($connection); 
}
}
?>