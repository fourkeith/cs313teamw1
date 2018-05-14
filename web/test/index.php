<?php
// start session
session_start();

//define arrays
$products = array("Jolly Ranchers", "Twix", "Snickers");
$amounts = array("3.99", "1.99", "2.99");

// add item values
if ( !isset($_SESSION["total"]) ) {
	$_SESSION["total"] = 0;
	for ($i=0; $i< count($products); $i++) {
		$_SESSION["qty"][$i] = 0;
		$_SESSION["amounts"][$i] = 0;
	}
}

// reset
if ( isset($_GET['reset']) ) {
	if ($_GET["reset"] == 'true') {
		unset($_SESSION["qty"]); 
		unset($_SESSION["amounts"]); 
		unset($_SESSION["total"]); 
		unset($_SESSION["cart"]); 
	}
}

// add
if ( isset($_GET["add"]) ) {
	$i = $_GET["add"];
	$qty = $_SESSION["qty"][$i] + 1;
	$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
	$_SESSION["cart"][$i] = $i;
	$_SESSION["qty"][$i] = $qty;
 }

// delete
if ( isset($_GET["delete"]) ) {
	$i = $_GET["delete"];
	$qty = $_SESSION["qty"][$i];
	$qty--;
	$_SESSION["qty"][$i] = $qty;
	
	if ($qty == 0) {
		$_SESSION["amounts"][$i] = 0;
		unset($_SESSION["cart"][$i]);
	} else {
	$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
	}
}
?>

<h2>List of All Products</h2>
<table>
	<tr>
		<th>Product</th>
		<th width="10px">&nbsp;</th>
		<th>Amount</th>
		<th width="10px">&nbsp;</th>
		<th>Action</th>
	</tr>
<?php
for ($i=0; $i< count($products); $i++) {
?>
	<tr>
		<td><?php echo($products[$i]); ?></td>
		<td width="10px">&nbsp;</td>
		<td><?php echo($amounts[$i]); ?></td>
		<td width="10px">&nbsp;</td>
		<td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
	</tr>
<?php
}
?>
	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td colspan="5"><a href="?reset=true">Reset Cart</a></td>
	</tr>
</table>
<?php
if ( isset($_SESSION["cart"]) ) {
?>
<br/><br/><br/>
<h2>Cart</h2>
<table>
	<tr>
		<th>Product</th>
		<th width="10px">&nbsp;</th>
		<th>Qty</th>
		<th width="10px">&nbsp;</th>
		<th>Amount</th>
		<th width="10px">&nbsp;</th>
		<th>Action</th>
	</tr>
<?php
$total = 0;
foreach ( $_SESSION["cart"] as $i ) {
?>
	<tr>
		<td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
		<td width="10px">&nbsp;</td>
		<td><?php echo( $_SESSION["qty"][$i] ); ?></td>
		<td width="10px">&nbsp;</td>
		<td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
		<td width="10px">&nbsp;</td>
		<td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
	</tr>
<?php
$total = $total + $_SESSION["amounts"][$i];
}
$_SESSION["total"] = $total;
?>
	<tr>
		<td colspan="7">Total : <?php echo($total); ?></td>
	</tr>
</table>
<a href="display.php">Checkout</a>
<?php
}
?>