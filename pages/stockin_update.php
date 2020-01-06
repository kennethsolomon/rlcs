  <?php
  include('connect.php');
  $id=$_GET['iv'];
  $p_name = $_GET['name'];
  $qty = $_GET['qty'];
  $date = $_GET['date'];
  $t_id = $_GET['tid'];
  $result = $db->prepare("SELECT * FROM purchases WHERE invoice_number = :userid");
  $result->bindParam(':userid', $id);
  $result->execute();
  for($i=0; $row = $result->fetch(); $i++){
    ?>


    <form action="update_payable.php" method="post" class = "form-group" name="stockin_form">
      <div id="ac">
       
      <input id="invoice_number" name="invoice_number" type="hidden" placeholder="Due Date" style="width: 150px; margin-bottom: 15px; margin-left: 170px" value= "<?php echo $id ?> " /> 
       <br><select name="remark"  class = "form-control">
         <option>PAID</option>
         <option>PAYABLE</option>
       </select><br>

       <!-- <textarea style="width:265px; height:50px;" name="remark"> </textarea> -->
       
       <input class="btn btn-primary btn-block" type="submit" class = "form-control" value="save" />
     </div>
   </form>
   <?php
 }
 ?>