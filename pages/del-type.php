<?php
include "connect.php";    

$id = mysql_real_escape_string($_POST["id"]);

$query = "DELETE FROM tbltype where id=$id";
//echo $query;
$result = mysql_query($query);
//$con -> query($query);
echo "success";
?>