<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<form action="saveeditproduct.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Product Code : </span><input type="text" name="code" class = "form-control" value="<?php echo $row['product_code']; ?>"readonly />
<span>Brand Name : </span><input type="text" name="bname" class = "form-control" value="<?php echo $row['product_name']; ?>" />
<span>Description Name : </span><input type="text" name="dname" class = "form-control" value="<?php echo $row['description_name']; ?>" />
<span>Cost : </span><input type="text" name="cost" step="0.01" class = "form-control" value="<?php echo $row['cost']; ?>" <span>Price : </span>
<input type="text" name="price" class = "form-control" value="<?php echo $row['price']; ?>" />
<span>Supplier : </span>
<select name="supplier" class = "form-control" >
	<option><?php echo $row['supplier']; ?></option>
	<?php
	$results = $db->prepare("SELECT * FROM supliers");
		$results->bindParam(':userid', $res);
		$results->execute();
		for($i=0; $rows = $results->fetch(); $i++){
	?>
		<option><?php echo $rows['suplier_name']; ?></option>
	<?php
	}
	?>
</select>
<span>Category: </span>
<select name="categ" required class = "form-control" >
							<option></option>
							<option>Gravel</option>
                            <option>Black Sand</option>
                            <option>Base Course</option>
                            <option>Boulder</option>
                            <option>Coco Lumber</option>
                            <option>Good Lumber</option>
                            <option>Cement</option>
                            <option>Concrete Hollow Blocks</option>
                            <option>Round Steel Bar</option>
                            <option>Tie Wire</option>
                            <option>Concrete Nail</option>
                            <option>CWN</option>
							<option>Project Materials</option>
                            </select>
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Update" />
</div>
</form>
<?php
}
?>