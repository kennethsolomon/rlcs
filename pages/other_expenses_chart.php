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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            #chart-container {
                width: 100%;
                height: auto;
            }                  
        </style>

<script src="../js/Chart.min.js"></script>

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


    <!-- <script language="javascript">
        function Clickheretoprint()
        { 
          var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
          disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
          var content_vlue = document.getElementById("content").innerHTML; 

        //   var docprint=window.open("","",disp_setting); 
        //   docprint.document.open(); 
        //   docprint.document.write('<img src="rlcs.png" style="width:1000px;height:70px;margin-left:40px"');
        //   docprint.document.write('</head><body onLoad="self.print()" style="width: 1150px; height:800; font-size: 40px; font-family: arial;">');      
        //   docprint.document.write(content_vlue); 
        //   docprint.document.close(); 
        //   docprint.focus(); 
      }
  </script> -->
 
</head>

<body>

    <?php include('navfixed.php');?>    

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                
              
                <div class="content" id="content">

            <form action="" method="post">
                <label><input name="eyear" id="eyear" type="number" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label>
                <label><button class="form-control" type="submitBtn" name="submitBtn" >Submit</button></label>
            </form>
                
            <?php 
            if(isset($_POST["submitBtn"])){
                include('connect.php'); 
                $dyear=$_POST["eyear"];
                $januaryq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'January'AND oyear = '$dyear'");
                $januaryq->execute();
                for($i=0; $rows = $januaryq->fetch(); $i++){
                   $janr=$rows['sum(amount)'];
                }
                $februaryq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'February'AND oyear = '$dyear' ");
                $februaryq->execute();
                for($i=0; $rows = $februaryq->fetch(); $i++){
                   $febr=$rows['sum(amount)'];
                }
                $marchq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'March'AND oyear = '$dyear' ");
                $marchq->execute();
                for($i=0; $rows = $marchq->fetch(); $i++){
                   $marr=$rows['sum(amount)'];
                }
                $aprilq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'April' AND oyear = '$dyear'");
                $aprilq->execute();
                for($i=0; $rows = $aprilq->fetch(); $i++){
                   $aprilr=$rows['sum(amount)'];
                }
                $mayq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'May'AND oyear = '$dyear' ");
                $mayq->execute();
                for($i=0; $rows = $mayq->fetch(); $i++){
                   $mayr=$rows['sum(amount)'];
                }
                $juneq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'June' AND oyear = '$dyear'");
                $juneq->execute();
                for($i=0; $rows = $juneq->fetch(); $i++){
                   $junr=$rows['sum(amount)'];
                }
                $julyq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'July'AND oyear = '$dyear' ");
                $julyq->execute();
                for($i=0; $rows = $julyq->fetch(); $i++){
                   $julr=$rows['sum(amount)'];
                }
                $augustq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'August' AND oyear = '$dyear'");
                $augustq->execute();
                for($i=0; $rows = $augustq->fetch(); $i++){
                   $augr=$rows['sum(amount)'];
                }
                $septemberq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'September' AND oyear = '$dyear'");
                $septemberq->execute();
                for($i=0; $rows = $septemberq->fetch(); $i++){
                   $septr=$rows['sum(amount)'];
                }
                $octoberq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'October' AND oyear = '$dyear'");
                $octoberq->execute();
                for($i=0; $rows = $octoberq->fetch(); $i++){
                   $octr=$rows['sum(amount)'];
                }
                $novemberq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'November' AND oyear = '$dyear'");
                $novemberq->execute();
                for($i=0; $rows = $novemberq->fetch(); $i++){
                   $novr=$rows['sum(amount)'];
                }
                $decemberq = $db->prepare( "SELECT sum(amount) from other_ex where omonth = 'December' AND oyear = '$dyear'");
                $decemberq->execute();
                for($i=0; $rows = $decemberq->fetch(); $i++){
                   $decr=$rows['sum(amount)'];
                }
                $jan = $janr;
                $feb = $febr;
                $mar = $marr;
                $april = $aprilr;
                $may = $mayr;
                $jun = $junr;
                $jul = $julr;
                $aug = $augr;
                $sept = $septr;
                $oct = $octr;
                $nov = $novr;
                $dec = $decr;
            }
     
 ?>
                        <p> Other Expenses</p>
                        <?php 
                        if(isset($_POST["eyear"])){
                            $dyear=$_POST["eyear"];
                            echo '<center><h1>'.$dyear.'</h1></center>';
                        }
                        ?>
                      <canvas id="bar-chart" width="800" height="450"></canvas> 
                        <script>
                        // Bar chart
                        new Chart(document.getElementById("bar-chart"), {
                            type: 'bar',
                            data: {
                            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            datasets: [
                                {
                                label: "Expenses",
                                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#e8c3b9","#c45850"],
                                data: [<?php echo $jan ?>, <?php echo $feb ?>, <?php echo $mar ?>, <?php echo $april ?>, <?php echo $may ?>, <?php echo $jun ?>, <?php echo $jul ?>, <?php echo $aug ?>, <?php echo $sept ?>, <?php echo $oct ?>, <?php echo $nov ?>, <?php echo $dec ?>]
                                }
                            ]
                            },
                            options: {
                            legend: { display: false },
                            title: {
                                display: true,
                                text: ''
                            }
                            }
                        });
                        </script>   
                    </div>
                <!-- <a href="javascript:Clickheretoprint()" style="font-size:15px"; class="btn btn-primary"><i class="fa fa-print"></i>Print</a> -->
                
                        <div class="clearfix"></div>
<script>
           function myFunction() {
               window.print();
           }
       </script>
       <link rel="stylesheet" type="text/css" media="print" href="print.css" />
       <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
                            Print
                        </button>   
                </div>  </div>
            </div>
            
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>




    <!-- /#page-wrapper -->
    <script src="plugins/amcharts/amcharts.js"></script>
    <script src="plugins/amcharts/serial.js"></script>
    <script src="plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="plugins/export/export.css" type="text/css" media="all" />
    <script src="plugins/amcharts/themes/light.js"></script>

    <script>

        var raw = '<?php echo $d; ?>';
        var data = JSON.parse(raw);
        var chart = AmCharts.makeChart( "chartdiv", {
          "type": "serial",
          "theme": "light",
          "dataProvider": data,
          "valueAxes": [ {
            "gridColor": "#FFFFFF",
            "gridAlpha": 0.2,
            "dashLength": 0
        } ],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [ {
            "balloonText": "[[category]]: <b>Total Sales [[value]]</b>",
            "fillAlphas": 0.8,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "value"
        } ],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "title",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "tickPosition": "start",
            "tickLength": 20
        },
        "export": {
            "enabled": true
        }

    } );
</script>




<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
