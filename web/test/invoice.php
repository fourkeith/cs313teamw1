<?php
session_start();
?>

<h2>Invoice</h2>
<?php
	$name = htmlspecialchars($_REQUEST['name']);
	$street = htmlspecialchars($_REQUEST['street']);
	$city = htmlspecialchars($_REQUEST['city']);
	$state = htmlspecialchars($_REQUEST['state']);
	$zip = htmlspecialchars($_REQUEST['zip']);
?>	
<p>Your Name: <?php echo $name; ?></p>
<p>Your Street: <?php echo $street; ?></p>
<p>Your City: <?php echo $city; ?></p>
<p>Your State: <?php echo $state; ?></p>
<p>Your Zip Code: <?php echo $zip; ?></p>
<p>Your total amount of items is: <?php echo count($_SESSION["cart"]); ?></p>
<p>What your total invoice is: <?php echo $_SESSION["total"]; ?></p>