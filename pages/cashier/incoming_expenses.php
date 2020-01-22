<?php
session_start();
require_once('auth.php');
include('connect.php');
$invoice = $_POST['invoice'];
$id = $_POST['pt'];
$typeOfExpenses = $_POST['typeOfExpenses'];
$description = $_POST['description'];
$date = $_POST['date'];
$amount = $_POST['amount'];

$r = $_POST['vat'];
$year = substr("$date", 0, 4); // Year
$listOfMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
$fMonth = substr("$date", 5, -3); // Month
$dayNumber = substr("$date", 8, 9); // dayNumber
$salary = $_POST['esalary'];
$month = $listOfMonths[$fMonth - 1];
$esalary = $_POST['esalary'];
$employeeName = $_POST['employeeName'];
$cashier = $session_cashier_name;
$fdate = $fMonth."/".$dayNumber."/".$year;



$sql = "INSERT INTO other_ex (type, Date, description, amount, omonth, oyear) VALUES (:type, :Date, :description, :amount, :omonth, :oyear)";
$q = $db->prepare($sql);
$q->execute(array(':type'=>$typeOfExpenses, ':Date'=>$fdate, ':description'=>$description, ':amount'=>$amount, ':omonth'=>$month, ':oyear'=>$year));
header("location: other_expenses.php?id=$w&invoice=$a");


?>