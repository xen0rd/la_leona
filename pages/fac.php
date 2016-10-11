<?php
session_start();

if (!isset($_GET['id'])){
	//header("location:gallery.php");
	$id=0;
}else{
	$id=$_GET['id'];
}

if($_SESSION['login_type']=="FRONTDESK"){
	header("location:facdetails_w.php?id=".$id);
}else{
	header("location:facdetails.php?id=".$id);
}
?>