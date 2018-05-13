<?php
session_start();
?>

<p>You have <?php echo count($_SESSION["cart"]); ?> products.</p>
<p>Your total is: <?php echo $_SESSION["total"]; ?>.</p>

<h2>Please give us your address so we can send you your products.</h2>
<h3>Address</h3>
<form method="post" action="endCart.php">
	<p>Name: <input type="text" name="name"></p>
	<p>Street: <input type="text" name="street"></p>
	<p>City: <input type="text" name="city"></p>
	<p>State: <input type="text" name="state"></p>
	<p>Zip Code: <input type="text" name="zip"></p>
	<p><input type="submit" name="submit" value="Submit"></p>
</form>
