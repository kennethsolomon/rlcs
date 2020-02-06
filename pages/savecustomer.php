<?php
session_start();
include('connect.php');
$a = $_POST['fname'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['memno'];
// query
$sql = "INSERT INTO customer (first_name,address,contact,membership_number,last_name,middle_name,customer_name) VALUES (:a,:b,:c,:d,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':h' => $a));
header("location: customer.php");
