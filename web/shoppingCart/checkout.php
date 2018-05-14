<?php
session_start();
include'nav.php';
// reset
if ( isset($_GET['reset']) ) {
	if ($_GET["reset"] == 'true') {
		unset($_SESSION["qty"]); 
		unset($_SESSION["amounts"]); 
		unset($_SESSION["total"]);  
	}
}
// delete
if ( isset($_GET["delete"]) ) {
	$i = $_GET["delete"];
	$qty = $_SESSION["qty"][$i];
	$qty--;
	$_SESSION["qty"][$i] = $qty;
	
	if ($qty == 0) {
		$_SESSION["amounts"][$i] = 0;
        $_SESSION["total"] = $_SESSION["total"] - $_SESSION["amounts"][$i];
		unset($_SESSION["cart"][$i]);
	} else {
	$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
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
		<td><?php echo( $products[$_SESSION["name"][$i]] ); ?></td>
		<td width="10px">&nbsp;</td>
		<td><?php echo( $_SESSION["qty"][$i] ); ?></td>
		<td width="10px">&nbsp;</td>
		<td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
		<td width="10px">&nbsp;</td>
		<td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
	</tr>
</table><br/>
<?php
}
?>
Total : <?php echo($_SESSION["total"]); ?><br/>
<a href="showCart.php">Submit</a><br/>
<a href="?reset=true">Reset Cart</a>
