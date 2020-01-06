<?php
session_start();
include('connect.php');
$a = $_POST['invoice'];
$b = $_POST['product_code'];
$c = $_POST['qty'];
$e = $_POST['status'];
$d = $_POST['exdate'];
$f = $_POST['remark'];
$rmonth = date('F');
$ryear = date('Y');
$fdate = date('m/d/Y');
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
}

//edit qty
if($e == 'Returned'){
    $sql = "UPDATE products 
    SET qty_left=qty_left
    WHERE product_code=?"; 
    $q = $db->prepare($sql);
    $q->execute(array($b));

    // $sql2 = "INSERT INTO products 
    // (rmonth, ryear, fdate ) VALUES (?,?,?)";
    // $q2 = $db->prepare($sql2);
    // $q2->execute(array($rmonth,$ryear,$fdate));

}else if($e == 'Cancelled'){
    $sql = "UPDATE products 
    SET qty_left=qty_left
    WHERE product_code=?"; 
    $q = $db->prepare($sql);
    $q->execute(array($b));
} else{
    $sql = "UPDATE products 
    SET qty_left=qty_left+?, total_cost=qty_left*cost
    WHERE product_code=?";
    $q = $db->prepare($sql);
    $q->execute(array($c,$b));
    
}


$sql3 = "UPDATE products 
        SET expiration_date=?
		WHERE product_code=?";
$q3 = $db->prepare($sql3);
$q3->execute(array($d,$b));


// query
$sql1 = "UPDATE purchases_item 
        SET status=?
		WHERE invoice = ? AND name = ? ";
$q1 = $db->prepare($sql1);
$q1->execute(array($e,$a,$b));


$sql2 = "UPDATE purchases
        SET status=?, remark = ?, rmonth='$rmonth', ryear='$ryear', fdate='$fdate'
		WHERE invoice_number = ? AND p_name = ? ";
$q2 = $db->prepare($sql2);
$q2->execute(array($e,$f,$a,$b));


header("location:  purchaseslist.php");


?>