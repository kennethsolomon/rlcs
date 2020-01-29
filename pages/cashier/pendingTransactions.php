<?php 
include('connect.php');
$getInvoice=$_GET['pendingTransactionList'];
$cashierStatus=$_GET['cashierStatus'];
        header("location: sales.php?id=$cashierStatus&invoice=$getInvoice");
?>
