<?php
session_start();
include('connect.php');
$a = $_POST['invoice'];
$cashierCashStatus = 'pending_cash';
$cashierCreditStatus = 'pending_credit';
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$r = $_POST['vat'];
$date = date('m/d/Y');
$month = date('F');
$year = date('Y');

$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['price'];
$name=$row['product_name'];
$dname=$row['description_name'];
$categ=$row['category'];
$qtyleft=$row['qty_left'];
$cost=$row['cost'];
}

$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
$result->bindParam(':userid', $a);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$transactionId = $row['transaction_id'];
}

$profit = abs((($cost - $asasa) * $c))  ;  

//edit qty
$sql = "UPDATE products 
        SET qty_left=qty_left-?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));
$fffffff=$asasa-$discount;
$d=$asasa*$c;
$z=$qtyleft-$c;
$vat=$d*$r;
$total=$vat+$d;

// query
if($w == 'cash'){
    $sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount,category,date,omonth,oyear,qtyleft,dname,vat,total_amount, profit, status) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o, :profit, :cashierCashStatus)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$cost,':e'=>$name,':f'=>$asasa,':g'=>$discount,':h'=>$categ,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$z,':m'=>$dname,':n'=>$vat,':o'=>$total,':profit'=>$profit,':cashierCashStatus'=>$cashierCashStatus));
    $url="sales.php?id=$w&invoice=$a";
    $url=str_replace(PHP_EOL, '', $url);
    header("Location: $url");
} else if ($w == 'credit'){
    $sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount,category,date,omonth,oyear,qtyleft,dname,vat,total_amount, profit, status) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o, :profit, :cashierCreditStatus)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$cost,':e'=>$name,':f'=>$asasa,':g'=>$discount,':h'=>$categ,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$z,':m'=>$dname,':n'=>$vat,':o'=>$total,':profit'=>$profit,':cashierCreditStatus'=>$cashierCreditStatus));
    $url="sales.php?id=$w&invoice=$a";
    $url=str_replace(PHP_EOL, '', $url);
    header("Location: $url");
    
}
?>

transactionId=
<br/><b>Notice</b>:Undefinedindex:transactionIdin<b>C:\xampp\htdocs\RLCS\pages\cashier\sales.php</b>%20on%20line%20<b>109</b><br%20/>