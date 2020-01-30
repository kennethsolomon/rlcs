<?php
session_start();
include('connect.php');
$a = $_POST['user'];
$b = $_POST['pass'];
$c = $_POST['name'];
$d = $_POST['post'];

if($d == 'Stock Administrator'){
    $sql = "INSERT INTO user (username,password,name,position) VALUES (?,?,?,?)";
    $q = $db->prepare($sql);
    $q->execute(array($a,$b,$c,$d));
    header("location: home.php");
}else if($d == 'Admin Staff'){
    $sql = "INSERT INTO user (username,password,name,position) VALUES (?,?,?,?)";
    $q = $db->prepare($sql);
    $q->execute(array($a,$b,$c,$d));
    header("location: home.php");
} else {
    $sql = "INSERT INTO cashier (username,password,cashier_name,position) VALUES (?,?,?,?)";
    $q = $db->prepare($sql);
    $q->execute(array($a,$b,$c,$d));
    header("location: home.php");
}

?>