<?php 
include('connect.php');
$getInvoice=$_GET['pendingTransactionList'];
$projectStatus=$_GET['projectStatus'];
        header("location: sales_receivable.php?id=$projectStatus&invoice=$getInvoice");
?>
