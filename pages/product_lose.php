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
    
    <link rel="shortcut icon" href="logoc.jpg">
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" media="print" href="print.css" />
        <script src="lib/jquery.js" type="text/javascript"></script>
        <script src="src/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
              loadingImage : 'src/loading.gif',
              closeImage   : 'src/closelabel.png'
          })
        })
    </script>

    <?php
    function productcode() {
        $chars = "003232303232023232023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i <= 7) {

            $num = rand() % 33;

            $tmp = substr($chars, $num, 1);

            $pass = $pass . $tmp;

            $i++;

        }
        return $pass;
    }
    $pcode='P-'.productcode();
    ?>

</head>

<body>
    <?php include('navfixed.php');?>


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
            <!-- <img src="rlcs.png" alt="Smiley face" height="70" width="100%" style="text-align:right; margin-top:10px"> -->
                <h1 class="page-header"> List of Product Lose</h1>
            </div>
                <form method="post" action="">
                      <label>
                      <select name = "dmonth" class="form-control input-sm">
                        <option value=""></option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option> 
                        
                      </select>
                      </label>
                    <label><input name="dyear" id="dyear" type="number" class="form-control input-sm" placeholder="" aria-controls="dataTables-example" style="width: 100px;"></label>
                   <!-- <label><input type="button" value="Search" class="form-control" placeholder="" aria-controls="dataTables-example"></label> -->
                   <label><button class="form-control"  name="submitdate" >Submit</button></label>
                   <label style="margin-left:495px">
                   <input style="width: 100px; "name="dailydate" id="dailydate" class="datepicker" placeholder="mm-dd-yyyy" data-date-format="mm-dd-yyyy">
                   <!-- <input id="dailydate" name="dailydate" type="text" placeholder="Due Date" style="width: 150px; margin-bottom: 15px; margin-left: 170px"  /> -->
                   </label>
                   <label><button class="form-control"  name="accountduedate" >Daily Reports</button></label>
                    </div>
            </form>
            <div id="maintable"><div style="">
               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th> Code </th>
                        <th> Brand Name </th>
                        <th> Description </th>
                        <th> Category </th>
                        <th> Total Amount Lose </th>
                        <th> Cost </th>
                        <th> Total Quantity Lose  </th>
                        <th> Date Product Expired  </th>
                    </tr>
                </thead>
                <tbody>

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
                    if(isset($_POST["submitdate"])){
                        $cmonth=$_POST["dmonth"];
                        $cyear=$_POST["dyear"];
                        include('connect.php');
                        if(!empty($cmonth) && !empty($cyear)){
                            $result = $db->prepare("SELECT * FROM lose WHERE lmonth = '$cmonth' AND lyear = '$cyear' ORDER BY p_id");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['product_code']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['description_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td align="right"><?php
                                    $pcost=$row['amount_lose'];
                                    echo formatMoney($pcost, true);
                                    ?></td>
                                    <td align="right"><?php
                                        $pcost=$row['cost'];
                                        echo formatMoney($pcost, true);
                                        ?></td>
                                        <td align="right"><?php echo $row['qty']; ?></td>
                                         <td align="right"><?php echo $row['exdate']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                        } else if(!empty($cmonth)){
                            $result = $db->prepare("SELECT * FROM lose WHERE lmonth = '$cmonth' ORDER BY p_id");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['product_code']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['description_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td align="right"><?php
                                    $pcost=$row['amount_lose'];
                                    echo formatMoney($pcost, true);
                                    ?></td>
                                    <td align="right"><?php
                                        $pcost=$row['cost'];
                                        echo formatMoney($pcost, true);
                                        ?></td>
                                        <td align="right"><?php echo $row['qty']; ?></td>
                                         <td align="right"><?php echo $row['exdate']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                        } else if(!empty($cyear)){
                            $result = $db->prepare("SELECT * FROM lose WHERE lyear = '$cyear' ORDER BY p_id");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['product_code']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['description_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td align="right"><?php
                                    $pcost=$row['amount_lose'];
                                    echo formatMoney($pcost, true);
                                    ?></td>
                                    <td align="right"><?php
                                        $pcost=$row['cost'];
                                        echo formatMoney($pcost, true);
                                        ?></td>
                                        <td align="right"><?php echo $row['qty']; ?></td>
                                         <td align="right"><?php echo $row['exdate']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                        } else if(empty($cmonth) && empty($cyear)){
                            $result = $db->prepare("SELECT * FROM lose ORDER BY p_id");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['product_code']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['description_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td align="right"><?php
                                    $pcost=$row['amount_lose'];
                                    echo formatMoney($pcost, true);
                                    ?></td>
                                    <td align="right"><?php
                                        $pcost=$row['cost'];
                                        echo formatMoney($pcost, true);
                                        ?></td>
                                        <td align="right"><?php echo $row['qty']; ?></td>
                                         <td align="right"><?php echo $row['exdate']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                        }
                        
                        
                    }
                    
                        ?>

                        <!-- DAILY -->
                    <?php
                    if(isset($_POST["accountduedate"])){
                        $dailydate = $_POST['dailydate'];
                        if(!empty($dailydate)){
                            $result = $db->prepare("SELECT * FROM lose WHERE date = '$dailydate' ORDER BY p_id");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['product_code']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['description_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td align="right"><?php
                                    $pcost=$row['amount_lose'];
                                    echo formatMoney($pcost, true);
                                    ?></td>
                                    <td align="right"><?php
                                        $pcost=$row['cost'];
                                        echo formatMoney($pcost, true);
                                        ?></td>
                                        <td align="right"><?php echo $row['qty']; ?></td>
                                         <td align="right"><?php echo $row['exdate']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                        }
                        
                        
                    }
                    
                        ?>


                        </tbody>
                        <thead>
                                <tr>
                                    <th colspan="3" style="border-top:1px solid #999999"> Total Amount Lose:</th>
                                    <th colspan="5" style="border-top:1px solid #999999"> 
                                    <?php
                                        if(isset($_POST["submitdate"]))
                                        {
                                            $cmonth=$_POST["dmonth"];
                                            $cyear=$_POST["dyear"];
                                            if(!empty($cmonth) && !empty($cyear)){
                                                $results = $db->prepare("SELECT sum(amount_lose) FROM lose WHERE lmonth = '$cmonth' AND lyear = '$cyear'");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(amount_lose)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            } else if(!empty($cmonth)){
                                                $results = $db->prepare("SELECT sum(amount_lose) FROM lose WHERE lmonth = '$cmonth'");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(amount_lose)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            } else if(!empty($cyear)){
                                                $results = $db->prepare("SELECT sum(amount_lose) FROM lose WHERE lyear = '$cyear'");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(amount_lose)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            } else if(empty($cmonth) && empty($cyear)){
                                                $results = $db->prepare("SELECT sum(amount_lose) FROM lose");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(amount_lose)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            }
                                           
                                        }

                                        if(isset($_POST["accountduedate"]))
                                        {
                                            $dailydate = $_POST['dailydate'];
                                            if(!empty($dailydate)){
                                            $results = $db->prepare("SELECT sum(amount_lose) FROM lose WHERE date = '$dailydate'");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(amount_lose)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            }
                                        }
                                        ?>
                                    </th>
                                </tr>
                        </thead>
                    </table>
                   
                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
                    <div class="clearfix"></div>
                </div>


            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                searching: false,
                responsive: true
            });
        });
    </script>


</body>

</html>
