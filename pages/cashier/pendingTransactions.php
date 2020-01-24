<?php 
include('connect.php');
$getInvoice=$_GET['pendingTransactionList'];
        header("location: sales.php?id=cash&invoice=$getInvoice");
?>
