<?php
require_once('auth.php');
?>


<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



<script language="javascript">
	function Clickheretoprint()
	{ 
		var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
		disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
		var content_vlue = document.getElementById("content").innerHTML; 

		var docprint=window.open("","",disp_setting); 
		docprint.document.open(); 
		docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
		docprint.document.write(content_vlue); 
		docprint.document.close(); 
		docprint.focus(); 
	}
</script>
<a class = "btn btn-primary" href="javascript:Clickheretoprint()" style="font-size:20px";>Print</a>|<a class = "btn btn-primary" href="home.php" style="font-size:20px";>Back</a>
<?php
$invoice=$_GET['invoice'];
include('connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
	$cname=$row['name'];
	$caddress=$row['address'];	
	$invoice=$row['invoice_number'];
	$date=$row['date'];
	$cash=$row['due_date'];
	$cashier=$row['cashier'];
	$contact_number=$row['contact_number'];
	$invoice_number=$row['invoice_number'];

	$pt=$row['type'];
	$am=$row['amount'];
	if($pt=='cash'){
		$cash=$row['cash'];
		$amount=$cash-$am;
	}
}

?>
<br>
<br>



<div class="content" id="content">
<center>
	<div style="margin-top: -60px; padding: 20px; width: 700px; font-weight: normal;">
	<!-- <img src="logo.png" style="width:70px;height:80px;align:center;margin-bottom:-20px"> -->
		<div style="width: 100%;">
			<div style="width: 459px;">
			<br>
			<p style="text-align: center;font-size: 15px"><b>	RUFFER LUMBER AND CONSTRUCTION SUPPLY <br />
					Guinlajon Sorsogon City, Sorsogon<br />
					<div>
					<?php
						
						?>

						<div>
						<table border="1" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left; margin-left: -100px;" width="144%">
							<thead>
								<tr>
									<th> Sold To: </th>
									<th> Date: </th>
									<th> Address: </th>
									<th> Contact: </th>
									<th> Delivery Receipt No:  </th>
								</tr>
							</thead>
							<tr>
								<td><?php echo $cname ?></td>
								<td><?php echo $date ?></td>
								<td><?php echo substr($caddress, 0, 35) ?></td>
								<td><?php echo $contact_number ?></td>
								<td style="text-align: right;"><?php echo $invoice_number ?></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			
			</div>		<br>		
			<div style="width: 100%">
				<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 15px;text-align:left;" width="100%">
					<thead>
						<tr>
							<th> Product Code </th>
							<th> Brand Name </th>
							<th> Description Name </th>
							<th> Qty </th>
							<th> Unit Price </th>
							<th> Total Amount </th>
						</tr>
					</thead>
					<tbody>

						<?php
						$id=$_GET['invoice'];
						$isChecked=$_GET['isChecked'];
						$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
						$result->bindParam(':userid', $id);
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
							?>
							<tr class="record">
								<td><?php echo $row['product']; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['dname']; ?></td>
								<td><?php echo $row['qty']; ?></td>
								<td>
									<?php
										if($isChecked !== 'isChecked'){
											$ppp=$row['price'];
											echo formatMoney($ppp, true);
										}
									?>
								</td>
								<td>
									<?php
									if($isChecked !== 'isChecked'){
										$dfdf=$row['total_amount'];
										echo formatMoney($dfdf, true);
									}
									?>
								</td>
							</tr>
							
							<?php
						}
						?>
						<?php if($pt=='cash'){
							?>
							<tr>
								<td colspan="5"><strong style="font-size: 12px; color: #222222;">Total Amount:</strong></td>
								<td colspan="3"><strong style="font-size: 12px; color: #222222;">
									<?php
									$sdsd=$_GET['invoice'];
									$resultas = $db->prepare("SELECT sum(total_amount) FROM sales_order WHERE invoice= :a");
									$resultas->bindParam(':a', $sdsd);
									$resultas->execute();
									for($i=0; $rowas = $resultas->fetch(); $i++){
										if($isChecked !== 'isChecked'){
											$fgfg=$rowas['sum(total_amount)'];
											echo formatMoney($fgfg, true);
										}
									}
									?>
								</strong></td>
							</tr>
							
							<tr>
								<td colspan="5"><strong style="font-size: 12px; color: #222222;">Cash Tendered:</strong></td>
								<td colspan="2"><strong style="font-size: 12px; color: #222222;">
									<?php
									if($isChecked !== 'isChecked'){
										echo formatMoney($cash, true);
									}
									?>
								</strong></td>
							</tr>
								<?php
						}
						?>
						<tr>
						
							<td colspan="5"><strong style="font-size: 12px; color: #222222;">
								<?php
								if($pt=='cash'){
									echo 'Change:';
								}
								if($pt=='credit'){
									echo 'Due Date:';
								}
								?>
							</strong></td>

							<td colspan="3"><strong style="font-size: 12px; color: #222222;">
								<?php
								function formatMoney($number, $fractional=false) {
									if ($fractional) {
										$number = sprintf('%.2f', $number);
									}
									while (true) {
										$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
										if ($replaced != $number) {
											$number = $replaced;
										} else {
											break;
										}
									}
									return $number;
								}
								if($pt=='credit'){
									echo $cash;
								}
								if($pt=='cash'){
									if($isChecked !== 'isChecked'){
										echo formatMoney($amount, true);
									}
								}
								?>
							</strong></td>
						</tr>
						
					</tbody>
				</table>
				</center>
				<p style="text-align: left;font-size: 15px;margin-left:	50px"><b>Prepared by: <?php echo $cashier ?>
				<span style="font-size: 15px;margin-left:30px;align-right;text-align: left"> Approved by: __________________
				<tr style="font-size: 15px;align-left;text-align: left"> Received by: __________________
				
			</div>
									
			<div style="text-align: right;margin-right: 370px; margin-top: -10px; font-size: 20px;"><b>Cashier :</b> <?php echo $cashier ?></div>
		</div>
	</div>


