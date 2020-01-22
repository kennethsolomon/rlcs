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


    <link rel="stylesheet" type="text/css" media="print" href="print.css" />

    <link rel="stylesheet" type="text/css" href="tcal.css" />
    <script type="text/javascript" src="tcal.js"></script>
    

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
                    <h1 class="page-header"> Profit  Report</h1>
                </div>
                <div id="maintable">
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>

                    <label style="font-size:20px; margin-right: 2px">Search </label>
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
                   <label style="margin-left:495px">
                   <input style="width: 100px; "name="dailydate" id="dailydate" class="datepicker" placeholder="mm/dd/yyyy" data-date-format="mm/dd/yyyy">
                   <!-- <input id="dailydate" name="dailydate" type="text" placeholder="Due Date" style="width: 150px; margin-bottom: 15px; margin-left: 170px"  /> -->
                   </label>
                   <label><button class="form-control"  name="accountduedate" >Daily Reports</button></label>
                    </div>
                </form>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th > Transaction ID </th>
                                <th > Name </th>
                                <th > Date </th>
                                <th > Amount</th>
                                <th > Profit </th>
                            </tr>
                        </thead>
                        <tbody>

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

                                include('connect.php');
                                $cmonth=$_POST["cmonth"];
                                $cyear=$_POST["cyear"];
                                echo'<center><p style="font-size:32px;">';
                                echo $cmonth.' '.$cyear;
                                echo'</p></center>';
                                if(!empty($cmonth) && !empty($cyear)){
                                    $result = $db->prepare("SELECT * FROM sales WHERE month = '$cmonth' AND year = '$cyear' AND balance = 0 ORDER BY transaction_id desc");
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++){
                                        ?>
                                        <tr class="record">
                                            <td>CR-000<?php echo $row['transaction_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['profit']; ?></td>
                                        </tr>
                                        <?php
                                        }

                                  } else if (!empty($cmonth)){
                                    $result = $db->prepare("SELECT * FROM sales WHERE month = '$cmonth' AND balance = 0 ORDER BY transaction_id desc");
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++){
                                        ?>
                                        <tr class="record">
                                            <td>CR-000<?php echo $row['transaction_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['profit']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                 } else if (!empty($cyear)){
                                    $result = $db->prepare("SELECT * FROM sales WHERE year = '$cyear' AND balance = 0  ORDER BY transaction_id desc");
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++){
                                        ?>
                                        <tr class="record">
                                            <td>CR-000<?php echo $row['transaction_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['profit']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                 } else if (empty($cmonth) && empty($cyear)){
                                    $result = $db->prepare("SELECT * FROM sales  WHERE balance = 0  ORDER BY transaction_id desc");
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++){
                                        ?>
                                        <tr class="record">
                                            <td>CR-000<?php echo $row['transaction_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['profit']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                 }
                            }
                            ?>
                            <?php
                                if(isset($_POST["accountduedate"]))
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

                                include('connect.php');
                                $dailydate = $_POST['dailydate'];
                                echo'<center><p style="font-size:32px;">';
                                echo $dailydate;
                                echo'</p></center>';
                                if(!empty($dailydate)){
                                    $result = $db->prepare("SELECT * FROM sales WHERE date = '$dailydate' AND balance = 0 ORDER BY transaction_id desc");
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++){
                                        ?>
                                        <tr class="record">
                                            <td>CR-000<?php echo $row['transaction_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['profit']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                  }
                                }  
                            ?>

                            
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="4" style="border-top:1px solid #999999"> Total Profit </th>
                                <th colspan="3" style="border-top:1px solid #999999"> 
                                    <?php
                                    if(isset($_POST["submitdate"]))
                                    {
                                        $cmonth=$_POST["cmonth"];
                                        $cyear=$_POST["cyear"];
                                        if(!empty($cmonth) && !empty($cyear)){
                                                $results = $db->prepare("SELECT sum(profit) FROM sales WHERE month = '$cmonth' AND year = '$cyear' AND balance = 0");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(profit)'];
                                                echo formatMoney($dsdsd, true);
                                           }
                                        } else if(!empty($cmonth)){
                                                $results = $db->prepare("SELECT sum(profit) FROM sales WHERE month = '$cmonth' AND balance = 0");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(profit)'];
                                                echo formatMoney($dsdsd, true);
                                           }
                                           
                                        } else if(!empty($cyear)){

                                                $results = $db->prepare("SELECT sum(profit) FROM purchases WHERE year = '$cyear' AND balance = 0");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(profit)'];
                                                echo formatMoney($dsdsd, true);
                                           }


                                        } else if(empty($cmonth) && empty($cyear)){
                                            $results = $db->prepare("SELECT sum(profit) FROM sales WHERE balance = 0");
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                            $dsdsd=$rows['sum(profit)'];
                                            echo formatMoney($dsdsd, true);
                                       }
                                    }
                                }
                                ?>

                                <?php
                                if(isset($_POST["accountduedate"]))
                                {
                                    $dailydate = $_POST['dailydate'];
                                    if(!empty($dailydate)){
                                        $results = $db->prepare("SELECT sum(profit) FROM sales WHERE date = '$dailydate' AND balance = 0");
                                        $results->execute();
                                        for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['sum(profit)'];
                                        echo formatMoney($dsdsd, true);
                                       }
                                    }
                                }
                                ?>
                                </th>
                            </tr>
                        </thead>
                        <!-- <thead>
                            <tr>
                            <th colspan="5" style="border-top:1px solid #999999" >Total balance </th>
                                  <th colspan="4" style="border-top:1px solid #999999"> 
                                     <?php

                                    if(isset($_POST["submitdate"]))
                                    {
                                        $cmonth=$_POST["cmonth"];
                                        $cyear=$_POST["cyear"];
                                        if(!empty($cmonth) && !empty($cyear)){
                                                $results = $db->prepare("SELECT sum(profit) FROM sales WHERE month = '$cmonth' AND year = '$cyear' AND balance = 0");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(profit)'];
                                                echo formatMoney($dsdsd, true);
                                           }
                                        } else if(!empty($cmonth)){
                                            $results = $db->prepare("SELECT sum(profit) FROM sales WHERE month = '$cmonth' AND balance = 0");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(profit)'];
                                                echo formatMoney($dsdsd, true);
                                           }
                                        } else if(!empty($cyear)){
                                            $results = $db->prepare("SELECT sum(profit) FROM sales WHERE year = '$cyear' AND balance = 0");
                                                $results->execute();
                                                for($i=0; $rows = $results->fetch(); $i++){
                                                $dsdsd=$rows['sum(profit)'];
                                                echo formatMoney($dsdsd, true);
                                           }
                                        } else if(empty($cmonth) && empty($cyear)){
                                            $results = $db->prepare("SELECT sum(profit) FROM sales WHERE balance = 0");
                                            $results->execute();
                                            for($i=0; $rows = $results->fetch(); $i++){
                                            $dsdsd=$rows['sum(profit)'];
                                            echo formatMoney($dsdsd, true);
                                       }
                                    }
                                    }
                                  ?>
                                   <?php
                                if(isset($_POST["accountduedate"]))
                                {
                                    $dailydate = $_POST['dailydate'];
                                    if(!empty($dailydate)){
                                        $results = $db->prepare("SELECT sum(profit) FROM sales WHERE date = '$dailydate' AND balance = 0");
                                        $results->execute();
                                        for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['sum(profit)'];
                                        echo formatMoney($dsdsd, true);
                                   }
                                    }
                                }
                                ?>
                                </th>
                            </tr>
                        </thead>    -->
                    </table>

                   
                <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
                    <div class="clearfix"></div>
            </div>
            <script src="js/jquery.js"></script>
            <script type="text/javascript">
                $(function() {


                    $(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){

   }
});
 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
 .animate({ opacity: "hide" }, "slow");

}

return false;

});

                });
            </script>

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
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            "searching": false,
            responsive: true
        });
    });
</script>
<script>
                // function print() {
                //     window.print();
                // }
            </script>


</body>

</html>
