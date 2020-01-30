<?php
	include('connect.php');
	$transactionId=$_GET['id'];
	$typeOfTransaction=$_GET['dle'];
	$invoice=$_GET['invoice'];
	$result = $db->prepare("SELECT * FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $transactionId);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
	$qty = $row['qty'];
	$price = $row['price'];
	$amount = $row['amount'];
	
?>

	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<form action="saveeditsales.php" method="post" class = "form-group">
	<div id="ac">
		<input type="hidden" name="transactionId" value="<?php echo $transactionId; ?>" />
		<input type="hidden" name="typeOfTransaction" value="<?php echo $typeOfTransaction; ?>" />
		<input type="hidden" name="qty" value="<?php echo $qty; ?>" />
		<input type="hidden" name="price" value="<?php echo $price; ?>" />
		<input type="hidden" name="amount" value="<?php echo $amount; ?>" />
		<input type="hidden" name="profit" value="<?php echo $profit; ?>" />
		<input type="hidden" name="invoice" value="<?php echo $invoice; ?>" />
		<span>Price : </span>
		<input type="text" name="price" class = "form-control" value="<?php echo $row['price']; ?>" />
		<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Update" />
	</div>
</form>
<?php
}
?>