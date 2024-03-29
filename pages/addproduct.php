 <div class="panel-body">
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                </div>
                <div class="modal-body">
                    <form action="saveproduct.php" method="post" class = "form-group" >
                        <div id="ac">
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
                            <span>Product Code : </span><input type="text" name="code" value = "<?php echo $pcode ?>" class = "form-control"readonly />
                            <span>Brand Name : </span><input type="text" name="bname" class = "form-control" />
                            <span>Description Name : </span><input required type="text" name="dname" class = "form-control" />
                            <span>Product Unit : </span>
                            <select required name="unit" class = "form-control" >
                            <option></option>
                            <option>Per Pieces</option>
                            <option>Per m3</option>
                            <option>Per Kilo</option>
                            </select>
                            <span>Cost : </span><input type="number" name="cost" step="0.01" class = "form-control" />
                            <span>SRP : </span><input type="number" name="price" step="0.01"  class = "form-control" />
                            <span>Supplier : </span>
                            <select name="supplier" class = "form-control">
                                <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM supliers");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['suplier_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span>Quantity : </span><input type="number" name="qty" class = "form-control" />
                            <span>Date Delivered: </span><input type="date" name="date_del" class = "form-control" />
                            <span>Expiration Date: </span><input type="date" name="ex_date" class = "form-control" />
                            <span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Save" />
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
                        <!-- /.modal -->