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

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
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
                <!-- <img src="rlcs.png" alt="Smiley face" height="70" width="1050" style="text-align:right; margin-top:10px"> -->
                    <h1 class="page-header">Customer Transaction Record</h1>
                </div>

                <div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px;">
                    <a class = "btn btn-primary" href = "search_customer.php" ><i class = "fa fa-arrow-left"> Back</i></a>
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
                   <input style="width: 100px; "name="dailydate" id="dailydate" class="datepicker" placeholder="mm/dd/yyyy" data-date-format="mm/dd/yyyy">
                   <!-- <input id="dailydate" name="dailydate" type="text" placeholder="Due Date" style="width: 150px; margin-bottom: 15px; margin-left: 170px"  /> -->
                   </label>
                   <label><button class="form-control" name="accountduedate" >Daily Reports</button></label>
                   </div>
                    </div>
                </form>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th width="20%"> Delivery Receipt No.</th>
                            <th width="20%"> Customer Name</th>
                            <th width="15%"> Type Of Payment</th>
                            <th width="20%"> Amount Paid </th>
                            <th width="15%"> Balance </th>
                            <th width="15%"> Transaction Date </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                            if(isset($_POST["submitdate"]))
                            {
                            include('connect.php');
                            $id=$_GET['id'];
                            $cmonth=$_POST["cmonth"];
                            $cyear=$_POST["cyear"];
                            if(!empty($cmonth) && !empty($cyear)){
                                $result = $db->prepare("SELECT * FROM sales WHERE name= :userid AND month = '$cmonth' AND year = '$cyear'");
                                $result->bindParam(':userid', $id);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td><?php echo $row['invoice_number']; ?></td>  
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td align="right"><?php echo $row['amount']; ?></td>
                                        <td align="right"><?php echo $row['balance']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                            } else if(!empty($cmonth)){
                                $result = $db->prepare("SELECT * FROM sales WHERE name= :userid AND month = '$cmonth'");
                                $result->bindParam(':userid', $id);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td><?php echo $row['invoice_number']; ?></td>  
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td align="right"><?php echo $row['amount']; ?></td>
                                        <td align="right"><?php echo $row['balance']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                            } else if(!empty($cyear)){
                                $result = $db->prepare("SELECT * FROM sales WHERE name= :userid AND year = '$cyear'");
                                $result->bindParam(':userid', $id);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td><?php echo $row['invoice_number']; ?></td>  
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td align="right"><?php echo $row['amount']; ?></td>
                                        <td align="right"><?php echo $row['balance']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                            } else if(empty($cmonth) && empty($cyear)){
                                $result = $db->prepare("SELECT * FROM sales WHERE name= :userid");
                                $result->bindParam(':userid', $id);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td><?php echo $row['invoice_number']; ?></td>  
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td align="right"><?php echo $row['amount']; ?></td>
                                        <td align="right"><?php echo $row['balance']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
    
                                    </tr>
                                    <?php
                                }
                            }
                            
                        }
                        ?>
                        <?php 
                         if(isset($_POST["accountduedate"])){
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
                        $id = $_GET['id'];
                        echo'<center><p style="font-size:32px;">';
                        echo $dailydate;
                        echo'</p></center>';
                        if(!empty($dailydate)){
                            $result = $db->prepare("SELECT * FROM sales WHERE name= :userid AND date = '$dailydate'");
                            $result->bindParam(':userid', $id);
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td><?php echo $row['invoice_number']; ?></td>  
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td align="right"><?php echo $row['amount']; ?></td>
                                    <td align="right"><?php echo $row['balance']; ?></td>
                                    <td><?php echo $row['date']; ?></td>

                                </tr>
                                <?php
                            }
                            }
                        }
                        
                        ?>
                        
                        <thead>
                            <tr>
                                <th colspan="3" style="border-top:1px solid #999999"> Total Amount </th>
                                <td class = "right" colspan="3" style="border-top:1px solid #999999"> 

                                    <?php
                                    if(isset($_POST["submitdate"]))
                                    {
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


                                        $cmonth=$_POST["cmonth"];
                                        $cyear=$_POST["cyear"];
                                        $id = $_GET['id'];
                                        if(!empty($cmonth) && !empty($cyear)){
                                            $results = $db->prepare("SELECT sum(amount) FROM sales WHERE name = :name AND month = '$cmonth' AND year = '$cyear' ");
                                            $results->bindParam(':name', $id);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(amount)'];
                                                echo formatMoney($dsdsd, true);
                                            }
                                        } else if(!empty($cmonth)){
                                            $results = $db->prepare("SELECT sum(amount) FROM sales WHERE name = :name AND month = '$cmonth'");
                                            $results->bindParam(':name', $id);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(amount)'];
                                                echo formatMoney($dsdsd, true);
                                            }
                                        } else if(!empty($cyear)){
                                            $results = $db->prepare("SELECT sum(amount) FROM sales WHERE name = :name AND year = '$cyear'");
                                            $results->bindParam(':name', $id);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(amount)'];
                                                echo formatMoney($dsdsd, true);
                                            }
                                        } else if(empty($cmonth) && empty($cyear)){
                                            $results = $db->prepare("SELECT sum(amount) FROM sales WHERE name = :name ");
                                            $results->bindParam(':name', $id);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(amount)'];
                                                echo formatMoney($dsdsd, true);
                                            }
                                        }
                                       
                                    }

                                    if(isset($_POST["accountduedate"]))
                                        {
                                            $dailydate = $_POST['dailydate'];
                                            if(!empty($dailydate)){
                                                $results = $db->prepare("SELECT sum(amount) FROM sales WHERE name = :name AND date = '$dailydate'");
                                                $results->bindParam(':name', $id);
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                    $dsdsd=$rows['sum(amount)'];
                                                    echo formatMoney($dsdsd, true);
                                                }
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th colspan="3" style="border-top:1px solid #999999" >Total balance </th>
                                <th colspan="" style="border-top:1px solid #999999">
                                  <th colspan="3" style="border-top:1px solid #999999"> 
                                     <?php
                                     if(isset($_POST["submitdate"]))
                                     {
                                        $cmonth=$_POST["cmonth"];
                                        $cyear=$_POST["cyear"];
                                         $id = $_GET['id'];
                                         if(!empty($cmonth) && !empty($cyear)){
                                            $results = $db->prepare("SELECT sum(balance) FROM sales WHERE name = :name AND month = '$cmonth' AND year = '$cyear'");
                                            $results->bindParam(':name', $id);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                               $dsdsd=$rows['sum(balance)'];
                                               echo formatMoney($dsdsd, true);
                                           }
                                         } else if(!empty($cmonth)){
                                            $results = $db->prepare("SELECT sum(balance) FROM sales WHERE name = :name AND month = '$cmonth'");
                                            $results->bindParam(':name', $id);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                               $dsdsd=$rows['sum(balance)'];
                                               echo formatMoney($dsdsd, true);
                                           }
                                         } else if(!empty($cyear)){
                                            $results = $db->prepare("SELECT sum(balance) FROM sales WHERE name = :name AND year = '$cyear'");
                                            $results->bindParam(':name', $id);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                               $dsdsd=$rows['sum(balance)'];
                                               echo formatMoney($dsdsd, true);
                                           }
                                         } else if(empty($cmonth) && empty($cyear)){
                                            $results = $db->prepare("SELECT sum(balance) FROM sales WHERE name = :name");
                                            $results->bindParam(':name', $id);
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                               $dsdsd=$rows['sum(balance)'];
                                               echo formatMoney($dsdsd, true);
                                               
                                           }
                                         }
                                         
                                     }
                                     
                                     
                                    ?>
                                </th>
                            </tr>
                        </thead>   
                    </tbody>
                    
                </table>
                <div class="clearfix"></div>
            </div>
            <script>
           function myFunction() {
               window.print();
           }
       </script>
            <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
                            Print
                        </button>
                        <div class="clearfix"></div>
                        
        </div>
        <!-- /.row -->
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

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<!-- 
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script> -->


</body>

</html>
