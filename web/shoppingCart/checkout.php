<?php
include'./web/nav.php'
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
<a href="?reset=true">Reset Cart</a></td>
<?php
}
?>
