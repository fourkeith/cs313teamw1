<?php
session_start();
?>

<p>There are <?php echo count($_SESSION["cart"]); ?> products.</p>
<p>The total is: <?php echo $_SESSION["total"]; ?>.</p>

<h2>Shipping Address</h2>
<h3>Address</h3>
<form method="post" action="endCart.php">
	<p>Name:     <input type="text" name="name"></p>
	<p>Street:   <input type="text" name="street"></p>
	<p>City:     <input type="text" name="city"></p>
	<p>State:    <input type="text" name="state"></p>
	<p>Zip Code: <input type="text" name="zip"></p>
	<p><input type="submit" name="submit" value="Submit"></p>
</form>
