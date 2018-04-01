<h3>Add Department
</h3>
<br />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/department/insert" enctype="multipart/form-data">			
                   
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Department Code</label>								
                         <div class="col-sm-5">
                           <input type="text" name="department_code" class="form-control"  placeholder="Department Code" id="department_code">
                                    
                            </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Department Title</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="department_title" class="form-control"  placeholder="Department title" id="department_title">
                                    
                        </div>
                    </div>  
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Department Description</label>                              
                            <div class="col-sm-5">
                                <textarea name="department_description" class="form-control" placeholder="Department Description" ></textarea>    
                            </div>
                    </div>  
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Department Address1</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="department_address1" class="form-control"  placeholder="Department Address1" id="address1">
                                    
                            </div>
                    </div> 
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Department Address2</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="department_address2" class="form-control"  placeholder="Department Address2" id="address2">
                                    
                            </div>
                    </div> 
                       <div class="form-group">
                            <label class="col-sm-3 control-label">Select City</label>                             
                            <div class="col-sm-5">
                                <select class="form-control" name="department_city" required="" id="department_city">
                                    <option disabled="">Select Status</option>   
                                     <?php foreach($city as $row_city) { ?>
                                    <option value="<?php echo $row_city['city_id']; ?>"><?php echo $row_city['city_name']; ?></option>
                                    <?php } ?>                                   
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Select States</label>                             
                            <div class="col-sm-5">
                                <select class="form-control" name="department_state" required="" id="department_state">
                                    <option disabled="">Select State</option>   
                                     <?php foreach($states as $row_states) { ?>
                                    <option value="<?php echo $row_states['state_code']; ?>"><?php echo $row_states['state_name']; ?></option>
                                    <?php } ?>                                   
                                </select>
                            </div>
                    </div> 
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Department Zip</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="department_zip" class="form-control"  placeholder="Department Zip" id="department_zip">
                                    
                            </div>
                    </div>
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Department Email</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="department_email" class="form-control"  placeholder="Department Email" id="department_email">
                                    
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Department Phone</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="department_phone" class="form-control"  placeholder="Department Phone" id="department_phone">
                                    
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Department Contact Name</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="department_contact_name" class="form-control"  placeholder="Department Contact Name" id="department_contact_name">
                                    
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Department Contact Designation</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="department_contact_designation" class="form-control"  placeholder="Department Contact Designation" id="department_contact_designation">
                                    
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