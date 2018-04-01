
<h3>Employee Detail
</h3>
<br />
<?php //print_r($result); ?>
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						

                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee Code</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['candicate_code'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department title</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['department_title'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job title</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['job_title'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee Name</label>                               
                            <div class="col-md-3">
                                 <?php echo $row['employee_first_name']." " ?> 
                            
                                 <?php echo $row['employee_middle_name']." " ?> 
                            
                                 <?php echo $row['employee_last_name'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee DOB</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['employee_dob'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee Gender</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['employee_gender'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee marital Status</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['employee_marital_status'] ?> 
                            </div>
                    </div>
                     <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Father Name</label>                               
                            <div class="col-md-3">
                                 <?php echo $row['father_first_name']." " ?> 
                            
                                 <?php echo $row['father_middle_name']." " ?> 
                            
                                 <?php echo $row['father_last_name'] ?> 
                            </div>
                    </div>
                     <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Mother Name</label>                               
                            <div class="col-md-3">
                                 <?php echo $row['mother_first_name']." " ?> 
                            
                                 <?php echo $row['mother_middle_name']." " ?> 
                            
                                 <?php echo $row['mother_last_name'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee Phone</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['employee_phone'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee Email</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['employee_email'] ?> 
                            </div>
                    </div>

                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee Aadhaar</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['employee_aadhaar'] ?> 
                            </div>
                    </div>
                     <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Employee Status</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['employee_status'] ?> 
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
<a href="<?php echo BASE_URL."admin/employee/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View Interview Schedules</a>