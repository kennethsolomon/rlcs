<?php
session_start();
require_once('auth.php');
include('connect.php');
$a = $_POST['invoice'];
// $b = $_POST['product'];
// $c = $_POST['qty'];
$w = $_POST['pt'];
$r = $_POST['vat'];
$date = $_POST['date'];
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
// $date_today = date('m/d/Y');
// $month = date('F');
// $year = date('Y');


$sql = "INSERT INTO employee_salary (date, month, year, amount, employeeName, cashier, dayNumber,fdate) VALUES (:a, :b, :c, :d, :e, :f, :g, :h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$date, ':b'=>$month, ':c'=>$year, ':d'=>$esalary, ':e'=>$employeeName, ':f'=>$cashier, ':g'=>$dayNumber, ':h'=>$fdate));
header("location: employee_salary.php?id=$w&invoice=$a");



// $discount = $_POST['discount'];
// $result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
// $result->bindParam(':userid', $b);
// $result->execute();
// for($i=0; $row = $result->fetch(); $i++){
// $asasa=$row['price'];
// $name=$row['product_name'];
// $dname=$row['description_name'];
// $categ=$row['category'];
// $qtyleft=$row['qty_left'];
// }

//edit qty
// $sql = "UPDATE products 
//         SET qty_left=qty_left-?
// 		WHERE product_code=?";
// $q = $db->prepare($sql);
// $q->execute(array($c,$b));
// $fffffff=$asasa-$discount;
// $d=$fffffff*$c;
// $z=$qtyleft-$c;
// $vat=$d*$r;
// $total=$vat+$d;

// query
// $sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount,category,date,omonth,oyear,qtyleft,dname,vat,total_amount) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o)";
// $q = $db->prepare($sql);
// $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':g'=>$discount,':h'=>$categ,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$z,':m'=>$dname,':n'=>$vat,':o'=>$total));
// header("location: sales.php?id=$w&invoice=$a");



?>