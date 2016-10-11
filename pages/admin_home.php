
<?php
error_reporting(0);
?>

 <?php
include('session.php');
if(isset($_SESSION['login_user'])){
header("location: reserved.php");
}
?>
<html>
<head>
<body>

<tr >
<table class="tb">
<td><span class=" pozz">
<form action="" method="post">
<h2> Admin Login </h2>
<label class="posfont1"> <font  size="5" face="century gothic"> Username:</label>
<input class="posfont111" id="name" name="username" placeholder="username" type="text"> <br>
<label class="posfont11">Password:</label>
&nbsp;<input class="posfont1111" sid="password" name="password" placeholder="**********" type="password"> <br>
<input name="submit" class="buttonzz" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</td>
</tr>
</font>
</body>
</table>
</html>
