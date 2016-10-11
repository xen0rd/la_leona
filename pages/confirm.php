<?php
include('session.php');
?>
<?php
error_reporting(0);
?>
<font color="red">Customer User: <?php echo $login_session; ?></b></font>

<?php
error_reporting(0);
	$con = mysql_connect("localhost","root","");
	if (!$con) 
 	 {
	  die('Could not connect: ' . mysql_error());
	  }
mysql_select_db("dbresort", $con);

if(isset($_POST['submit'])){

$counter=$_POST['hiddencounter'];
$member=$_POST['member'];
echo $counter." submitted checkboxes"; /* TO CHECK HOW MANY CHECKBOX HAS BEEN GENERATED */

for($x=0;$x<=$counter;$x++){

if(empty($member[$x])){ /* IF MEMBER IS EMPTY, DO NOTHING */

}

else {

/* GET THE DATA FROM MEMBERSNEEDREG TABLE */
	$result = mysql_query($con, "SELECT * FROM tbldummy WHERE username = '$login_session'");
while($row=mysql_fetch_array($result)){
$user = $row['username']; 
$reg = $row['RegNo'];                              
$lastn1 = $row['LastName'];   
$DOB1 = $row['Date_of_Birth']; 
$Email1 = $row['Email'];
$Address1 = $row['Address'];                              
$Postcode1 = $row['PostCode'];   
$UserName1 = $row['UserName']; 	
$Password1 = $row['Password'];
$relationship1 = $row['Annadale_Relationship'];
}

/* THEN INSERT THE FETCHED DATA TO MEMBERS TABLE */
mysql_query($con,"INSERT INTO tblreserveevent (username, RegNo, LastName, Email, Address, PostCode, UserName, Password, Annadale_Relationship)
VALUES ('$user','$reg','$lastn1','DOB1','Email1','$address1','$Postcode1','$UserName1','$Password1','$relationship1')");


/* THEN DELETE FROM membersneedreg THE INSERTED DATA */


} /* END OF ELSE */

} /* END OF FOR LOOP */

} /* END OF ISSET SUBMIT */

else {
header("LOCATION:payment-successful.php"); /* REDIRECT TO form.php IF DIRECTED TO THIS PAGE */
}

?>

</body>
</html>