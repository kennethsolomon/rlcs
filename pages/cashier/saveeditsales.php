<?php
	include('connect.php');
	$transactionId=$_POST['transactionId'];
	$price=$_POST['price'];
	$qty=$_POST['qty'];
	$typeOfTransaction=$_POST['typeOfTransaction'];
	$invoice=$_POST['invoice'];
	$updatedTotalAmount = $price * $qty;
	//edit qty
	$sql = "UPDATE sales_order
			SET price=?, total_amount=?
			WHERE transaction_id=?";
	$q = $db->prepare($sql);
	$q->execute(array($price ,$updatedTotalAmount, $transactionId));
	if($typeOfTransaction == 'project_receivable'){
		header("location: sales_receivable.php?id=$typeOfTransaction&invoice=$invoice");
	} else {
		header("location: sales.php?id=$typeOfTransaction&invoice=$invoice");
	}
?>