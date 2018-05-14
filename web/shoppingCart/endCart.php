<?php
include'nav.php';
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
<p>Name: <?php echo $name; ?></p>
<p>Street: <?php echo $street; ?></p>
<p>City: <?php echo $city; ?></p>
<p>State: <?php echo $state; ?></p>
<p>Zip Code: <?php echo $zip; ?></p>
<p>Items: <?php echo count($_SESSION["cart"]); ?></p>
<p>Total: <?php echo $_SESSION["total"]; ?></p>
