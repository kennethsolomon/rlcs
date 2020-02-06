<?php
session_start();
include('connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$profit = $_POST['profit'];
$pamount = $_POST['p_amount'];
$cname = $_POST['cname'];
$caddress = $_POST['caddress'];
$ccontact = $_POST['ccontact'];
$vat = $pamount * .12;
$date = date('m-d-Y');
$dmonth = date('F');
$dyear = date('Y');



if ($d == 'credit') {
	$isChecked = $_POST['isChecked'];

	$sql = "UPDATE sales_order 
    SET status=''
    WHERE invoice=?";
	$q = $db->prepare($sql);
	$q->execute(array($a));

	$f = $_POST['due'];
	$sql = "INSERT INTO sales (invoice_number,cashier,date,type,total_amount,due_date,name,month,year,balance,p_amount,vat,address, contact_number, profit) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:k,:j,:l, :m, :z, :profit)";
	$q = $db->prepare($sql);
	$q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':f' => $f, ':g' => $cname, ':h' => $dmonth, ':i' => $dyear, ':k' => $e, ':j' => $pamount, ':l' => $vat, ':m' => $caddress, ':z' => $ccontact, ':profit' => $profit));
	header("location: preview.php?invoice=$a&isChecked=$isChecked");
	exit();
}
if ($d == 'project_receivable') {
	$isChecked = $_POST['isChecked'];
	$sql = "UPDATE sales_order 
    SET status=''
    WHERE invoice=?";
	$q = $db->prepare($sql);
	$q->execute(array($a));

	$sql = "INSERT INTO sales (invoice_number,cashier,date,type,total_amount,name,month,year,balance,p_amount,vat,address, contact_number, profit) VALUES (:a,:b,:c,:d,:e,:g,:h,:i,:k,:j,:l, :m, :z, :profit)";
	$q = $db->prepare($sql);
	$q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':g' => $cname, ':h' => $dmonth, ':i' => $dyear, ':k' => $e, ':j' => $pamount, ':l' => $vat, ':m' => $caddress, ':z' => $ccontact, ':profit' => $profit));
	header("location: preview.php?invoice=$a&isChecked=$isChecked");
	exit();
}
if ($d == 'cash') {
	$isChecked = $_POST['isChecked'];
	$sql = "UPDATE sales_order 
    SET status=''
    WHERE invoice=?";
	$q = $db->prepare($sql);
	$q->execute(array($a));

	$f = $_POST['cash'];
	$sql = "INSERT INTO sales (profit, invoice_number,cashier,date,type,amount,cash,name,month,year,p_amount,vat, address, contact_number) VALUES (:profit, :a,:b,:c,:d,:e,:f,:g,:h,:i,:k,:j,:x,:z)";
	$q = $db->prepare($sql);
	$q->execute(array(':profit' => $profit, ':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':f' => $f, ':g' => $cname, ':h' => $dmonth, ':i' => $dyear, ':k' => $pamount, ':j' => $vat, ':x' => $caddress, ':z' => $ccontact));
	header("location: preview.php?invoice=$a&profit=$profit&isChecked=$isChecked");
	exit();
}
// query
