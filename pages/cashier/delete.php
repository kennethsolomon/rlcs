<?php
	include('connect.php');
	$id=$_GET['id'];
	$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	//edit qty
	$sql = "UPDATE products 
			SET qty_left=qty_left+?
			WHERE product_code=?";
	$q = $db->prepare($sql);
	$q->execute(array($qty,$wapak));

	$result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	if($sdsd == 'project_receivable'){
		header("location: sales_receivable.php?id=$sdsd&invoice=$c");
	} else {
		header("location: sales.php?id=$sdsd&invoice=$c");
	}
	
?>