<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("dbresort", $connection);
session_start();
$user_check=$_SESSION['login_admin'];
$ses_sql=mysql_query("select username from tbllogin where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); 
header('Location: admin1.php');
}
?>