<?php

include 'db_connect.php';

//Set useful variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_id = 'info@codexworld.com'; //Business Email

//fetch products from the database
//$results = $db->query("SELECT * FROM products");

//while($row = $results->fetch_assoc())
{
?>
        <center>
    	<img src="images/<?php echo $_GET['image']; ?>"/><br />
    	Name: <?php echo $_GET['name']; ?>
    	Price: <?php echo $_GET['price']; ?>
    	<form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $_GET['name']; ?>">
        <input type="hidden" name="item_number" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="amount" value="<?php echo $_GET['price']; ?>">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/yeah/yeah/pages/cancel.php'>
        <input type='hidden' name='return' value='http://localhost/yeah/yeah/pages/success.php'>
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0" width="120"
        src="images/reserve-button.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    
    </form>
</center>
<?php } ?>