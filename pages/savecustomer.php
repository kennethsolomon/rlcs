<?php
session_start();
include('connect.php');
$a = $_POST['fname'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['memno'];
// query
$sql = "INSERT INTO customer (first_name,address,contact,membership_number,customer_name) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $a));
header("location: customer.php");
