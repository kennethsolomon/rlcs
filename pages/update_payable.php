<?php
session_start();
include('connect.php');

$invoice_number = $_POST['invoice_number'];
$remark = $_POST['remark'];

$rmonth = date('F');
$ryear = date('Y');
$fdate = date('m/d/Y');

$sql4 = "UPDATE purchases 
        SET remark=?
		WHERE invoice_number=?";
$q4 = $db->prepare($sql4);
$q4->execute(array($remark,$invoice_number));
header("location:  account_payable.php");


?>