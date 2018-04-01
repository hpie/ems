
<h3>Department Detail
</h3>
<br />
<?php //print_r($result); ?>
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">                        
                  <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>department/update/<?php echo $row['department_code']  ?>" enctype="multipart/form-data">         
               
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Code</label>                               
                            <div class="col-md-9">
                        <input type="text" class="form-control"  name="department_code" id="department_code" value="<?php echo $row['department_code'] ?>" > 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department title</label>                               
                            <div class="col-md-9">
                        <input type="text" class="form-control"  name="department_title" id="department_title" value="<?php echo $row['department_title'] ?>"> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Description</label>                               
                            <div class="col-md-9">
                              <textarea class="form-control"  name="department_description" id="department_description" >
                            <?php echo $row['department_description'] ?></textarea> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Address1</label>                               
                            <div class="col-md-9">
                               <input type="text" class="form-control"  name="department_address1" id="department_address1" value="<?php echo $row['department_address1'] ?>"> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Address2</label>                               
                            <div class="col-md-9">
                             <input type="text" class="form-control"  name="department_address2" id="department_address2" value="<?php echo $row['department_address2'] ?>"> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department State</label>                               
                            <div class="col-md-9">
                                
                                 <select class="form-control" class="form-control" name="department_state" required="" id="department_state">
                                    <option hidden>Select State</option>           
                                    
                                    <?php foreach($states as $row_state) { ?>
                                    <option <?php if($row_state['state_code']==$row['department_state']) 
                                    echo "SELECTED" ;?> value="<?php echo $row_state['state_code']; ?>"><?php echo $row_state['state_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department City</label>                              
                        <div class="col-md-9">
                             
                             <select class="form-control" class="form-control" name="department_city" required="" id="department_city">
                                    <option hidden>Select City</option>           
                                    
                                    <?php foreach($city as $row_city) { ?>
                                    <option <?php if($row_city['city_id']==$row['department_city']) 
                                    echo "SELECTED" ;?> value="<?php echo $row_city['city_id']; ?>"><?php echo $row_city['city_name']; ?></option>
                                    <?php } ?>
                                </select>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Zip</label>                              
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="department_zip" id="department_zip" value="<?php echo $row['department_zip'] ?>" >
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Email</label>                              
                        <div class="col-md-9">
                             <input type="text" name="department_email" class="form-control" id="department_email" value="<?php echo $row['department_email'] ?>">
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Phone</label>                              
                        <div class="col-md-9">
                     <input type="text" name="department_phone" class="form-control"  id="department_phone" value="<?php echo $row['department_phone'] ?>" >
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Contact Name</label>                              
                        <div class="col-md-9">
                    <input type="text" name="department_contact_name" class="form-control"  id="department_contact_name" value="<?php echo $row['department_contact_name'] ?>">
                           </div>
                    </div>
                     <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Contact Designation</label>                              
                        <div class="col-md-9">
                        <input type="text" class="form-control"  name="department_contact_name" id="department_contact_name" value="<?php echo $row['department_contact_designation'] ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Select Status</label>                             
                            <div class="col-md-5">
                               <select class="form-control" name="status" class="form-control" required="" id="status">
                                    <option disabled="">Select Status</option>   
                                     <?php foreach($status as $row_status) { ?>
                                    <option <?php if($row_status['status_code']==$row['status_code']) echo "SELECTED";  ?>
                                     value="<?php echo $row_status['status_code']; ?>"><?php echo $row_status['status_title']; ?></option>
                                    <?php } ?>                                   
                                </select>
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                                                   
                            <div class="col-sm-5">
             <input type="hidden" name="modified_by" id="modified_by" value="<?php echo $_SESSION['admin_name']; ?>">
                            </div>
                    </div>
                     <div class="form-group col-md-12">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Submit</button>
                        </div>
                    </div>
                  </form>                              
            </div>              
        </div>          
    </div>
</div>
<?php } ?>
<a href="<?php echo BASE_URL."department/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View City</a>