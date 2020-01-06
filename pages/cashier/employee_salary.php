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
              loadingImage : 'src/loading.gif',
              closeImage   : 'src/closelabel.png'
            })
          })
        </script>


      </head>

      <body>
            
        <?php include('navfixed.php');?>

        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Payment | <?php echo $_GET['id']; ?> </h1>
            </div>

            <div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px;">
            </div>
            <form action="incoming_salary.php" method="post" class = "form-group" onsubmit="return confirm('Do you really want to add the salary?');">
              <input type="hidden" name="pt" class = "form-control" value="<?php echo $_GET['id']; ?>" />
              <input type="hidden" name="invoice" class = "form-control" value="<?php echo $_GET['invoice']; ?>" />
              <label>List of Employee</label><br />
              <select  name="employeeName"  id="employeeName" style="width:500px;" class="chzn-select">

                <option></option>
                <?php
                include('connect.php');
                $result = $db->prepare("SELECT * FROM customer");
                $result->bindParam(':userid', $res);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                  ?>
                  <option value="<?php echo $row['customer_name'];?>" 
                    >
                    <?php echo $row['customer_name']; ?>
                  </option>
                } 
                  <?php
                }
                ?>
                
              </select>
              <br />
              <label>Date</label>
              <input type="date" name="date"  class = "form-control"  autocomplete="off" style="width: 170px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <label>Amount</label>
              <input type="number" name="esalary" value="0" min = "1" class = "form-control"  autocomplete="off" style="width: 170px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <!-- <label>Amount</label> -->
              <input type="hidden" name="discount" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <!-- <label>Value Add Tax:</label> -->
              <input type="hidden" name="vat" value="0" class = "form-control"  autocomplete="off" style="width: 100px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
              <br>
             
              <input type="submit" class="btn btn-primary" value="Add Salary" class = "form-control" style="width: 123px;" />
            </form>
            <br>
            <div class="clearfix"></div>
          </div>


          <script>
function validate(form) {

    // validation code here ...


    if(!valid) {
        alert('Please correct the errors in the form!');
        return false;
    }
    else {
        return confirm('Do you really want to submit the form?');
    }
}
</script>
<form onsubmit="return validate(this);">


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
