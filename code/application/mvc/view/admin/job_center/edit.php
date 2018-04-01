<h3>Add Job Center
</h3>
<br />
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">            
                <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>job_center/update/<?php echo $row['center_code']; ?>" enctype="multipart/form-data">      
                   
                   <div class="form-group">
                        <label class="col-sm-3 control-label">Center Code</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="center_code" reuired class="form-control" value="<?php echo $row['center_code']; ?>"  placeholder="Center Code" id="center_code">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Center title</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="center_title" reuired class="form-control" value="<?php echo $row['center_title']; ?>" placeholder="Center Title" id="center_title">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Center Description</label>                              
                            <div class="col-sm-5">
                                <textarea name="center_description" class="form-control" 
                                value="<?php echo $row['center_description']; ?>" placeholder="Center Description" >
                                <?php echo $row['center_description']; ?></textarea>    
                            </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Center Address1</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="center_address1" class="form-control" value="<?php echo $row['center_address1']; ?>" placeholder="Center Address1" id="center_address1">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Center  Address2</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="center_address2" class="form-control" value="<?php echo $row['center_address2']; ?>"  placeholder="Center Address1" id="center_address2">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Center  State</label>               
                         <div class="col-sm-5">
                           <select class="form-control" name="center_state" required="" id="center_state">
                                    <option hidden>Select State</option>   
                                     <?php foreach($states as $row_state) { ?>
                                    <option <?php if( $row_state['state_code'] ==$row['center_state']) echo "Selected"; ?>  value="<?php echo $row_state['state_code']; ?>"><?php echo $row_state['state_name']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Center  City</label>                              
                         <div class="col-sm-5">
                           <select class="form-control" name="center_city"  required="" id="center_city">
                                    <option hidden>Select City</option>   
                                     <?php foreach($city as $row_city) { ?>
                                    <option <?php if( $row_city['city_id'] ==$row['center_city']) echo "Selected"; ?> value="<?php echo $row_city['city_id']; ?>"><?php echo $row_city['city_name']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Center Zip</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="center_zip" value="<?php echo $row['center_zip']; ?>" class="form-control"  placeholder="Center Zip" id="center_zip">
                                    
                        </div>
                    </div>  
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Center Email</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="center_email" value="<?php echo $row['center_email']; ?>" class="form-control"  placeholder="Center Email" id="center_email">
                                    
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Center Phone</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="center_phone" value="<?php echo $row['center_phone']; ?>" class="form-control"  placeholder="Center Phone" id="center_phone">
                                    
                        </div>
                    </div> 
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Center Contact Name</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="center_contact_name" value="<?php echo $row['center_contact_name']; ?>" class="form-control"  placeholder="Center Contact Name" id="center_contact_name">
                                    
                            </div>
                    </div> 
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Center Contact Designation</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="center_contact_designation" value="<?php echo $row['center_contact_designation']; ?>" class="form-control" placeholder="Center Contact Designation" id="center_contact_designation">
                                    
                            </div>
                    </div>
                      
                    
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Select Status</label>               
                            <div class="col-sm-5">
                                <select class="form-control" name="status" required="" id="status">
                                    <option hidden>Select Status</option>   
                                     <?php foreach($status as $row_status) { ?>
                                    <option <?php if( $row_status['status_code'] ==$row['status']) echo "Selected"; ?>
                                     value="<?php echo $row_status['status_code']; ?>"><?php echo $row_status['status_title']; ?></option>
                                    <?php } ?>                                   
                                </select>
                            </div>
                    </div>
                   
                            <input type="hidden" name="created_by" class="form-control" value="<?php echo $_SESSION['admin_name']; ?>" placeholder="Product price" >
                                                                      
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Update</button>
                        </div>
                    </div>
                </form>           
            </div>        
        </div>      
    </div>
</div>
<?php } ?>