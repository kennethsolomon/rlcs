<?php
include 'connect.php';

//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['SESS_MEMBER_ID2']) || (trim($_SESSION['SESS_MEMBER_ID2']) == '')) {
	header("location: /rlcs/pages/index.php");
	exit();
}

$session_id  = $_SESSION['SESS_MEMBER_ID2'];

$query = $db->prepare("SELECT * FROM cashier WHERE cashier_id = ?");
$query->execute(array($session_id));
$row = $query->fetch();

$session_cashier_name = $row['cashier_name'];
