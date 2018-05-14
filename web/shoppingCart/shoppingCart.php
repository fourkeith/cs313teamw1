<?php
include'nav.php';
// start session
session_start();
//define arrays
$products = array("Small Watch", "Medium Watch", "Large Watch", "Jumbo Watch");
$amounts = array("10", "20", "30", "40");
// add item values
if ( !isset($_SESSION["total"]) ) {
	$_SESSION["total"] = 0;
	for ($i=0; $i< count($products); $i++) {
		$_SESSION["qty"][$i] = 0;
		$_SESSION["amounts"][$i] = 0;
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
?>

<h2>Products</h2>
<table>
	<tr>
		<th>Product</th>
		<th width="10px">&nbsp;</th>
		<th>Amount</th>
		<th width="10px">&nbsp;</th>
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
$total = $total + $_SESSION["amounts"][$i];
$_SESSION["total"] = $total;
}
?>

	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td colspan="5"><a href="checkout.php">Checkout</a></td>
	</tr>
</table>
