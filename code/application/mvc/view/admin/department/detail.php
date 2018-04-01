
<h3>Department Detail
</h3>
<br />
<?php //print_r($result); ?>
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                  
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Code</label>								
                            <div class="col-md-9">
                                 <?php echo $row['department_code'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department title</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['department_title'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Description</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['department_description'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Address1</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['department_address1'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Address2</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['department_address2'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department State</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['state_name'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department City</label>                              
                        <div class="col-md-9">
                             <?php echo $row['city_name'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Zip</label>                              
                        <div class="col-md-9">
                             <?php echo $row['department_zip'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Email</label>                              
                        <div class="col-md-9">
                             <?php echo $row['department_email'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Phone</label>                              
                        <div class="col-md-9">
                             <?php echo $row['department_phone'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Contact Name</label>                              
                        <div class="col-md-9">
                             <?php echo $row['department_contact_name'] ?>
                           </div>
                    </div>
                     <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Department Contact Designation</label>                              
                        <div class="col-md-9">
                             <?php echo $row['department_contact_designation'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Select Status</label>								
                            <div class="col-md-5">
                                <?php echo $row['status'] ?>
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-sm-3 control-label">Created By</label>                             
                            <div class="col-sm-5">
                                <?php echo $row['created_by'] ?>
                            </div>
                    </div>

                            					
            </div>				
        </div>			
    </div>
</div>
<?php } ?>
<a href="<?php echo BASE_URL."department/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View City</a>