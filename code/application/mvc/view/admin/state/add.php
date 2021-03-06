<h3>Add Product
</h3>
<br />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                <form role="form" class="form-horizontal" method="post" action="http://localhost/ems-master/code/state/insert" enctype="multipart/form-data">			
                   
                    <div class="form-group">
                            <label class="col-sm-3 control-label">State Code</label>								
                            <div class="col-sm-5">
                                <input type="text" name="state_code" class="form-control"  placeholder="State Code" id="city_name">
                                    
                            </div>
                    </div>
                     <div class="form-group">
                            <label class="col-sm-3 control-label">State</label>                             
                            <div class="col-sm-5">
                                <input type="text" name="state_name" class="form-control"  placeholder="State title" id="city_name">
                                    
                            </div>
                    </div>
                     
                    
                   
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Select Status</label>								
                            <div class="col-sm-5">
                                <select class="form-control" name="status" required="" id="status">
                                    <option disabled="">Select Status</option>   
                                     <?php foreach($status as $row_status) { ?>
                                    <option value="<?php echo $row_status['status_code']; ?>"><?php echo $row_status['status_title']; ?></option>
                                    <?php } ?>                                   
                                </select>
                            </div>
                    </div>
                   
                            <input type="hidden" name="created_by" class="form-control" value="<?php echo $_SESSION['admin_name']; ?>" placeholder="Product price" >
                                																			
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Add</button>
                        </div>
                    </div>
                </form>						
            </div>				
        </div>			
    </div>
</div>

<h3>Add Product Using Excel CSV
</h3>
<br />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                <form role="form" class="form-horizontal" method="post" action="<?php echo MASTER_ADMIN_PRODUCT_INSERT_CSV_LIINK; ?>" enctype="multipart/form-data">			                    
                    <div class="form-group">
                        <label for="csv_file" class="col-sm-3 control-label">Upload</label>								
                        <div class="col-sm-5">
                            <input type="file" name="csv_file" class="form-control" accept=".csv" placeholder="" required="">
                        </div>
                    </div>																					
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Add</button>
                        </div>
                    </div>
                </form>						
            </div>				
        </div>			
    </div>
</div>