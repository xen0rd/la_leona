<?php

include 'connect.php';
{
?>
        <center>
    	<img src="images/<?php echo $_GET['image']; ?>"/><br />
    	Name: <?php echo $_GET['name']; ?>
    	Price: <?php echo $_GET['price']; ?>
    	<form action="reservations.php" method="post">
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0" width="120"
        src="images/reserve-button.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    
    </form>
</center>
<?php } ?>