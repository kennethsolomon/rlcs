<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RLCS</title>

  <link rel="shortcut icon" href="logo.jpg">
  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage: 'src/loading.gif',
        closeImage: 'src/closelabel.png'
      })
    })
  </script>


</head>

<body>

  <?php include('navfixed.php'); ?>

  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Payment | <?php echo $_GET['id']; ?> </h1>
      </div>

      <form action="pendingReceivableTransactions.php" method="get" id="pendingTransactions" name="pendingTransactions" class="form-group">
        <label>Pending Transactions: </label>
        <input type="hidden" name="projectStatus" class="form-control" value="<?php echo $_GET['id']; ?>" />
        <select name="pendingTransactionList" id="pendingTransactionList" style="width:150px;" class="chzn-select" onchange="pendingTransactions.submit()">
          <option></option>
          <?php
          include('connect.php');
          $salesReceivable = $_GET['id'];
          if ($salesReceivable == 'project_receivable') {
            $result = $db->prepare("SELECT invoice, transaction_id FROM sales_order WHERE status = 'pending_project' group by invoice");
          }
          $result->execute();
          for ($i = 0; $row = $result->fetch(); $i++) {
            $invoice = $row['invoice'];
          ?>
            <option name="invoice" value="<?php echo $invoice; ?>" <?php
                                                                  ?>>
              <?php echo $invoice; ?>
            </option>
            }
          <?php
          }
          ?>

        </select>
      </form>

      <div id="maintable">
        <div style="margin-top: -19px; margin-bottom: 21px;">
        </div>
        <form action="incoming_receivable.php" method="post" class="form-group">
          <input type="hidden" name="pt" class="form-control" value="<?php echo $_GET['id']; ?>" />
          <input type="hidden" name="invoice" class="form-control" value="<?php echo $_GET['invoice']; ?>" />
          <label>Select a Product</label><br />
          <select name="product" id="product" style="width:500px;" class="chzn-select">

            <option></option>
            <?php
            include('connect.php');
            $result = $db->prepare("SELECT * FROM products");
            $result->bindParam(':userid', $res);
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
            ?>
              <option value="<?php echo $row['product_code']; ?>" <?php
                                                                  if ($row['qty_left'] == 0) {
                                                                    echo 'disabled';
                                                                  }
                                                                  ?>>
                <?php echo $row['product_code']; ?>
                - <?php echo $row['product_name']; ?>
                - <?php echo $row['description_name']; ?>
                - <?php echo $row['qty_left']; ?>

              </option>
              }
            <?php
            }
            ?>

          </select>
          <br />
          <label>Number of Item</label>
          <input type="number" name="qty" value="1" min="1" class="form-control" autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
          <label>Discount</label>
          <input type="hidden" name="discount" value="0" class="form-control" autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
          <label>Value Add Tax:</label>
          <input type="hidden" name="vat" value="0" class="form-control" autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
          <br>
          <input type="submit" class="btn btn-primary" value="add product" class="form-control" style="width: 123px;" />
        </form>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th> Product Code </th>
              <th> Brand Name </th>
              <th> Description Name </th>
              <th> Category </th>
              <th> Quantity </th>
              <th> Price </th>
              <!-- <th> Discount </th>
                  <th> VAT </th> -->

              <th> Total Amount </th>
              <th> Delete </th>
            </tr>
          </thead>
          <tbody>

            <?php
            $id = $_GET['invoice'];
            include('connect.php');
            $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
            $result->bindParam(':userid', $id);
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
              $profit = $row['profit'];
              formatMoney($profit, true);
              $ccc = $row['amount'];
            ?>
              <tr class="record">
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['dname']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td>
                  <?php
                  $ppp = $row['price'];
                  echo formatMoney($ppp, true);
                  ?>
                </td>
                <!-- <td>
                      <?php
                      // $ddd=$row['discount'];
                      // echo formatMoney($ddd, true);
                      ?>
                    </td> -->
                <!-- <td> -->
                <?php
                // $fff=$row['vat'];
                // echo formatMoney($fff, true);
                ?>
                <!-- </td> -->
                <!-- <td>
                   
                      <?php
                      $profit = $row['profit'];
                      formatMoney($profit, true);
                      $ccc = $row['amount'];
                      // $qty = $row['qty'];
                      // $price = $row['price'];
                      // $profit =abs((($ccc - $price) * $qty))  ;  
                      // echo formatMoney($profit, true);
                      ?>
                    </td> -->

                <td>
                  <?php
                  $dfdf = $row['total_amount'];
                  echo formatMoney($dfdf, true);
                  ?>
                </td>
                <td><a rel="facebox" class="btn btn-primary" href="editsales.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty']; ?>"><i class="fa fa-pencil"></i></a> | <a class="btn btn-danger" href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty']; ?>&code=<?php echo $row['product']; ?>"> <i class="fa fa-trash"></i></a></td>
              </tr>
            <?php
            }
            ?>
            <tr>
              <td colspan="7"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
              <td colspan="4"><strong style="font-size: 12px; color: #222222;">
                  <?php
                  function formatMoney($number, $fractional = false)
                  {
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
                  $sdsd = $_GET['invoice'];
                  $resultas = $db->prepare("SELECT sum(total_amount) FROM sales_order WHERE invoice= :a");
                  $resultas->bindParam(':a', $sdsd);
                  $resultas->execute();
                  for ($i = 0; $rowas = $resultas->fetch(); $i++) {
                    $fgfg = $rowas['sum(total_amount)'];
                    echo formatMoney($fgfg, true);
                  }
                  $sdsd2 = $_GET['invoice'];
                  $result2 = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :a");
                  $result2->bindParam(':a', $sdsd);
                  $result2->execute();
                  for ($i = 0; $rowas = $result2->fetch(); $i++) {
                    $totalProfit = $rowas['sum(profit)'];
                  }


                  ?>
                </strong></td>
            </tr>

          </tbody>
        </table><br>
        <a rel="facebox" class="btn btn-primary" href="project_receivables_checkout.php?pt=<?php echo $_GET['id'] ?>&invoice=<?php echo $_GET['invoice'] ?>&total=<?php echo $fgfg ?>&cashier=<?php echo $session_cashier_name ?>&p_amount=<?php echo $ccc ?>&profit=<?php echo $totalProfit ?>">Check Out</a>


        <div class="clearfix"></div>
      </div>

    </div>
  </div>
  <!-- /#page-wrapper -->



  <!-- jQuery -->
  <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="vendor/metisMenu/metisMenu.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="dist/js/sb-admin-2.js"></script>

  <link href="vendor/chosen.min.css" rel="stylesheet" media="screen">
  <script src="vendor/chosen.jquery.min.js"></script>
  <script>
    $(function() {
      $(".chzn-select").chosen();

    });
  </script>

</body>

</html>