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

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" media="print" href="print.css" />

    <link rel="stylesheet" type="text/css" href="tcal.css" />
    
    <script type="text/javascript" src="tcal.js"></script>

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
              loadingImage : 'src/loading.gif',
              closeImage   : 'src/closelabel.png'
          })
        })
    </script>


</head>

<body>


    <?php include('navfixed.php');?>    

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <img src="rlcs.png" alt="Smiley face" height="70" width="100%" style="text-align:right; margin-top:10px">
                    <h1 class="page-header"> Accounts Receivables Report</h1>
                </div>
            </div>
            <div id="maintable">
                <div style="margin-top: -19px; margin-bottom: 21px;">
                </div>
                <div class="col-sm-8">
                <form method="post" action="">
                      <label>
                      <select name = "cmonth" class="form-control input-sm">
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
                    <label><input name="cyear" id="cyear" type="number" class="form-control input-sm" placeholder="" aria-controls="dataTables-example" style="width: 100px;"></label>
                   <!-- <label><input type="button" value="Search" class="form-control" placeholder="" aria-controls="dataTables-example"></label> -->
                   <label><button class="form-control"  name="submitdate" >Submit</button></label>
                   </div>
                   <div class="col-sm-4">
                   <label>
                   <input style="width: 100px; "name="dailydate" id="dailydate" class="datepicker" placeholder="mm/dd/yyyy" data-date-format="yyyy/mm/dd">
                   <!-- <input id="dailydate" name="dailydate" type="text" placeholder="Due Date" style="width: 150px; margin-bottom: 15px; margin-left: 170px"  /> -->
                   </label>
                   <label><button class="form-control" name="accountduedate" >Daily Reports</button></label>
                   </div>
                    </div>
                </form>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th > Invoice Number </th>
                            <th > Product Code </th>
                            <th > Brand Name </th>
                            <th > Description Name </th>
                            <th > Status </th>
                            <th > Remarks </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(isset($_POST["accountduedate"])){
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

                        include('connect.php');
                        $dailydate = $_POST['dailydate'];
                        echo'<center><p style="font-size:32px;">';
                        echo $dailydate;
                        echo'</p></center>';
                        if(!empty($dailydate)){
                            $result = $db->prepare("SELECT * FROM purchases WHERE status= 'Returned' AND fdate = '$dailydate'");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['invoice_number']; ?></td>
                                    <td><?php echo $row['p_name']; ?></td>
                                    <td><?php
                                     $rrrrrrr=$row['p_name'];
                                     $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                     $resultss->bindParam(':asas', $rrrrrrr);
                                     $resultss->execute();
                                     for($i=0; $rowss = $resultss->fetch(); $i++){
                                        echo $rowss['product_name'];
                                    }
                                    ?></td>
                                     <td><?php
                                     $rrrrrrr=$row['p_name'];
                                     $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                     $resultss->bindParam(':asas', $rrrrrrr);
                                     $resultss->execute();
                                     for($i=0; $rowss = $resultss->fetch(); $i++){
                                        echo $rowss['description_name'];
                                    }
                                    ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['remark']; ?></td>
    
                                </tr>
                                <?php
                                }
                            }
                        }
                         if(isset($_POST["submitdate"])){
                            function formatMoney($number, $fractional=false){
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
                        include('connect.php');
                        $cmonth=$_POST["cmonth"];
                        $cyear=$_POST["cyear"];
                        echo'<center><p style="font-size:32px;">';
                        echo $cmonth.' '.$cyear;
                        echo'</p></center>';
                        if(!empty($cmonth) && !empty($cyear)){
                            $result = $db->prepare("SELECT * FROM purchases WHERE status= 'Returned' AND rmonth = '$cmonth' AND ryear = '$cyear' ");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['invoice_number']; ?></td>
                                    <td><?php echo $row['p_name']; ?></td>
                                    <td><?php
                                     $rrrrrrr=$row['p_name'];
                                     $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                     $resultss->bindParam(':asas', $rrrrrrr);
                                     $resultss->execute();
                                     for($i=0; $rowss = $resultss->fetch(); $i++){
                                        echo $rowss['product_name'];
                                    }
                                    ?></td>
                                     <td><?php
                                     $rrrrrrr=$row['p_name'];
                                     $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                     $resultss->bindParam(':asas', $rrrrrrr);
                                     $resultss->execute();
                                     for($i=0; $rowss = $resultss->fetch(); $i++){
                                        echo $rowss['description_name'];
                                    }
                                    ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['remark']; ?></td>
    
                                </tr>
                                <?php
                                }
                            } else if (!empty($cmonth)){
                            $result = $db->prepare("SELECT * FROM purchases WHERE status= 'Returned' WHERE rmonth = '$cmonth'");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['invoice_number']; ?></td>
                                    <td><?php echo $row['p_name']; ?></td>
                                    <td><?php
                                     $rrrrrrr=$row['p_name'];
                                     $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                     $resultss->bindParam(':asas', $rrrrrrr);
                                     $resultss->execute();
                                     for($i=0; $rowss = $resultss->fetch(); $i++){
                                        echo $rowss['product_name'];
                                    }
                                    ?></td>
                                     <td><?php
                                     $rrrrrrr=$row['p_name'];
                                     $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                     $resultss->bindParam(':asas', $rrrrrrr);
                                     $resultss->execute();
                                     for($i=0; $rowss = $resultss->fetch(); $i++){
                                        echo $rowss['description_name'];
                                    }
                                    ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['remark']; ?></td>
    
                                </tr>
                                <?php
                                }
                            } else if (!empty($cyear)){
                                $result = $db->prepare("SELECT * FROM purchases WHERE status= 'Returned' WHERE ryear = '$cyear'");
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td><?php echo $row['invoice_number']; ?></td>
                                        <td><?php echo $row['p_name']; ?></td>
                                        <td><?php
                                         $rrrrrrr=$row['p_name'];
                                         $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                         $resultss->bindParam(':asas', $rrrrrrr);
                                         $resultss->execute();
                                         for($i=0; $rowss = $resultss->fetch(); $i++){
                                            echo $rowss['product_name'];
                                        }
                                        ?></td>
                                         <td><?php
                                         $rrrrrrr=$row['p_name'];
                                         $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                         $resultss->bindParam(':asas', $rrrrrrr);
                                         $resultss->execute();
                                         for($i=0; $rowss = $resultss->fetch(); $i++){
                                            echo $rowss['description_name'];
                                        }
                                        ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['remark']; ?></td>
        
                                    </tr>
                                    <?php
                                }
                            } else if (empty($cmonth) && empty($cyear)){
                                $result = $db->prepare("SELECT * FROM purchases WHERE status= 'Returned' ");
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td><?php echo $row['invoice_number']; ?></td>
                                        <td><?php echo $row['p_name']; ?></td>
                                        <td><?php
                                         $rrrrrrr=$row['p_name'];
                                         $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                         $resultss->bindParam(':asas', $rrrrrrr);
                                         $resultss->execute();
                                         for($i=0; $rowss = $resultss->fetch(); $i++){
                                            echo $rowss['product_name'];
                                        }
                                        ?></td>
                                         <td><?php
                                         $rrrrrrr=$row['p_name'];
                                         $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                         $resultss->bindParam(':asas', $rrrrrrr);
                                         $resultss->execute();
                                         for($i=0; $rowss = $resultss->fetch(); $i++){
                                            echo $rowss['description_name'];
                                        }
                                        ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['remark']; ?></td>
        
                                    </tr>
                                    <?php
                                }
                            }
                         }
                        ?>

                    </tbody>
                </table>
            </div>

            <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
            <div class="clearfix"></div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            searching: false
        });
    });
</script>






</body>

</html>
