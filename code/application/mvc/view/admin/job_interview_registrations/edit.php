<h3>Edit Employee
</h3>
<br />
<?php //print_r($result); ?>
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">                        
                <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>admin/employee/update/<?php echo $row['employee_id'] ;?>" enctype="multipart/form-data">            
                   
                   <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Code</label>                              
                          <div class="col-sm-5">
                            
                           <input type="text" class="form-control" name="candicate_code" id="candicate_code"  value="<?php echo $row['candicate_code'] ?>">        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Department  Code</label>                              
                         <div class="col-sm-5">
                           <select class="form-control" name="department_code" required="" id="department_code">
                                    <option hidden>Select Department</option>   
                                     <?php foreach($department as $row_dep) { ?>
                                    <option <?php if($row['department_code']==$row_dep['department_code']) echo "Selected"; ?>  value="<?php echo $row_dep['department_code']; ?>"><?php echo $row_dep['department_title']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div>         
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Job Code</label>                              
                         <div class="col-sm-5">
                           <select class="form-control" name="offer_id" required="" id="offer_id">
                                    <option hidden>Select Job Code</option>   
                                     <?php  foreach($job as $row_job) { ?>
                                    <option <?php if($row['offer_id']==$row_job['row_id']) echo "Selected"; ?> value="<?php echo $row_job['row_id']; ?>"><?php echo $row_job['job_title']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Name</label>                              
                          <div class="col-sm-3">
                            <input type="text" name="employee_first_name" required class="form-control"  placeholder="Employee First Name "
                             id="employee_first_name" value="<?php echo $row['employee_first_name'] ?>">
                                    
                        </div>
                        <div class="col-sm-3">
                            
                            <input type="text" name="employee_middle_name" class="form-control"  placeholder="Employee Middle Name "
                             id="employee_middle_name"  value="<?php echo $row['employee_middle_name'] ?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="employee_last_name" class="form-control" required placeholder="Employee Last Name "
                             id="employee_last_name"  value="<?php echo $row['employee_last_name'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee DOB</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="employee_dob" class="form-control" required 
                             value="<?php echo $row['employee_dob'] ?>" placeholder="Employee DOB" id="employee_dob">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Gender</label>                              
                          <div class="col-sm-5">
                            <select name="employee_gender" class="form-control">
                                <option hidden>Select Gender</option>
                                <option <?php if($row['employee_gender']=='Male') echo "SELECTED"; ?>  value="Male">Male</option>
                                <option <?php if($row['employee_gender']=='Female') echo "SELECTED"; ?> value="Female">Female</option>
                                <option <?php if($row['employee_gender']=='Other') echo "SELECTED"; ?> value="Other">Other</option>
                            </select>      
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Marital Status </label>                              
                          <div class="col-sm-5">
                            <select name="employee_gender" class="form-control">
                                <option hidden>Select Marital Status</option>
                                <option <?php if($row['employee_gender']=='Married') echo "SELECTED"; ?> value="Married">Married</option>
                                <option <?php if($row['employee_gender']=='Unmarried') echo "SELECTED"; ?> value="Unmarried">Unmarried</option>
            
                            </select>      
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee's  Father Name</label>                              
                          <div class="col-sm-3">
                            <input type="text" name="father_first_name" required class="form-control"  placeholder="Father First Name "
                             id="employee_first_name" value="<?php echo $row['father_first_name'];?>">
                                    
                        </div>
                        <div class="col-sm-3">
                            
                            <input type="text" name="father_middle_name" class="form-control"  placeholder="Father Middle Name "
                             id="father_middle_name" value="<?php echo $row['father_middle_name'];?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="father_last_name" class="form-control" required placeholder="Father Last Name "
                             id="father_last_name" value="<?php echo $row['father_last_name'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee's Mother Name</label>                              
                          <div class="col-sm-3">
                            <input type="text" name="mother_first_name" required class="form-control"  placeholder="mother First Name "
                             id="mother_first_name" value="<?php echo $row['mother_first_name']; ?>">
                                    
                        </div>
                        <div class="col-sm-3">
                            
                            <input type="text" name="mother_middle_name" class="form-control"  placeholder="Mother Middle Name "
                             id="mother_middle_name" value="<?php echo $row['mother_middle_name']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="mother_last_name" class="form-control" required placeholder="Mother Last Name "
                             id="mother_last_name" value="<?php echo $row['mother_last_name']; ?>">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Phone</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="employee_phone" class="form-control" 
                             placeholder="Employee Phone" id="employee_phone" value="<?php echo $row['employee_phone']; ?>">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Email</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="employee_email" class="form-control"  placeholder="Employee Email"
                             id="employee_email" value="<?php echo $row['employee_email']; ?>">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Adhar</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="employee_aadhaar" class="form-control"  placeholder="Employee Aadhaar" 
                            id="employee_adhar" value="<?php echo $row['employee_aadhaar']; ?>">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Join Date</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="joining_dt" class="form-control"  value="<?php echo $row['joining_dt']; ?>" id="joining_dt">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee  Status </label>                              
                          <div class="col-sm-5">
                            <select name="employee_status" class="form-control">
                                <option hidden>Select Status</option>
                                <option <?php if($row['employee_gender']=='Dreft') echo "Selected"; ?> valuue="Draft">Draft</option>
                                <option <?php if($row['employee_gender']=='Sent') echo "Selected"; ?> value="Sent">Sent</option>
                                <option <?php if($row['employee_gender']=='Rejected') echo "Selected"; ?> value="Rejected">Rejected</option>
                                <option <?php if($row['employee_gender']=='Accepted') echo "Selected"; ?> value="Accepted">Accepted</option>
                                <option <?php if($row['employee_gender']=='Joined') echo "Selected"; ?> value="Joined">Joined</option>
                            </select>      
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Select Status</label>                             
                            <div class="col-sm-5">
                                <select class="form-control" name="status" required="" id="status">
                                    <option hidden>Select Status</option>   
                                     <?php foreach($status as $row_status) { ?>
                                    <option <?php if($row['status']==$row_status['status_code']) echo "Selected"; ?> 
                                    value="<?php echo $row_status['status_code']; ?>"><?php echo $row_status['status_title']; ?></option>
                                    <?php } ?>                                   
                                </select>
                            </div>
                    </div>
                   
                            <input type="hidden" name="modified_by" class="form-control" value="<?php echo $_SESSION['admin_name']; ?>" placeholder="Product price" >
                                                                                                            
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Updated</button>
                        </div>
                    </div>
                </form>                     
            </div>              
        </div>          
    </div>
</div>
<?php } ?>