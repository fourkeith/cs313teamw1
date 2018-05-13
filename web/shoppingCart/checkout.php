<?php
session_start();
// reset
if ( isset($_GET['reset']) ) {
	if ($_GET["reset"] == 'true') {
		unset($_SESSION["qty"]); 
		unset($_SESSION["amounts"]); 
		unset($_SESSION["total"]); 
		unset($_SESSION["cart"]); 
	}
}
?>
<h2>Cart</h2>
<table>
	<tr>
		<th>Product</th>
		<th width="10px">&nbsp;</th>
		<th>Qty</th>
		<th width="10px">&nbsp;</th>
		<th>Amount</th>
		<th width="10px">&nbsp;</th>
	</tr>
<?php
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
	<tr>
		<td colspan="7">Total : <?php echo($total); ?></td>
	</tr>
</table>
<a href="showCart.php">Submit</a>
<a href="?reset=true">Reset Cart</a>
<?php
}
?>
