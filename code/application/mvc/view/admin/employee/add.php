<h3>Add Employee
</h3>
<br />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>admin/employee/insert" enctype="multipart/form-data">			
                   
                   <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Code</label>                              
                          <div class="col-sm-5">
                            <?php $id=0;
                             if(is_array($emp)){  foreach($emp as $row_emp) { ?>
                             <?php $id= $row_emp['employee_id'];
                             }} if($id<=0 && $id==''){$id=1;}
                              else{ $id= $id+1;}?>
                           <input type="text" class="form-control" name="candicate_code" id="candicate_code"  value="<?php echo "Cdac-Emp-".$id ?>">        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Department  Code</label>								
                         <div class="col-sm-5">
                           <select class="form-control" name="department_code" required="" id="department_code">
                                    <option hidden>Select Department</option>   
                                     <?php foreach($department as $row_dep) { ?>
                                    <option value="<?php echo $row_dep['department_code']; ?>"><?php echo $row_dep['department_title']; ?></option>
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
                                    <option value="<?php echo $row_job['row_id']; ?>"><?php echo $row_job['job_title']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Name</label>                              
                          <div class="col-sm-3">
                            <input type="text" name="employee_first_name" required class="form-control"  placeholder="Employee First Name "
                             id="employee_first_name">
                                    
                        </div>
                        <div class="col-sm-3">
                            
                            <input type="text" name="employee_middle_name" class="form-control"  placeholder="Employee Middle Name "
                             id="employee_middle_name">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="employee_last_name" class="form-control" required placeholder="Employee Last Name "
                             id="employee_last_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee DOB</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="employee_dob" class="form-control" required  placeholder="Employee DOB" id="employee_dob">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Gender</label>                              
                          <div class="col-sm-5">
                            <select name="employee_gender" class="form-control">
                                <option hidden>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>      
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Marital Status </label>                              
                          <div class="col-sm-5">
                            <select name="employee_gender" class="form-control">
                                <option hidden>Select Marital Status</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
            
                            </select>      
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee's  Father Name</label>                              
                          <div class="col-sm-3">
                            <input type="text" name="father_first_name" required class="form-control"  placeholder="Father First Name "
                             id="employee_first_name">
                                    
                        </div>
                        <div class="col-sm-3">
                            
                            <input type="text" name="father_middle_name" class="form-control"  placeholder="Father Middle Name "
                             id="father_middle_name">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="father_last_name" class="form-control" required placeholder="Father Last Name "
                             id="father_last_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee's Mother Name</label>                              
                          <div class="col-sm-3">
                            <input type="text" name="mother_first_name" required class="form-control"  placeholder="mother First Name "
                             id="mother_first_name">
                                    
                        </div>
                        <div class="col-sm-3">
                            
                            <input type="text" name="mother_middle_name" class="form-control"  placeholder="Mother Middle Name "
                             id="mother_middle_name">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="mother_last_name" class="form-control" required placeholder="Mother Last Name "
                             id="mother_last_name">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Phone</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="employee_phone" class="form-control"  placeholder="Employee Phone" id="employee_phone">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Email</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="employee_email" class="form-control"  placeholder="Employee Email" id="employee_email">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Adhar</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="employee_aadhaar" class="form-control"  placeholder="Employee Aadhaar" id="employee_adhar">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee Join Date</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="joining_dt" class="form-control"   id="joining_dt">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Employee  Status </label>                              
                          <div class="col-sm-5">
                            <select name="employee_gender" class="form-control">
                                <option hidden>Select Status</option>
                                <option value="Draft">Draft</option>
                                <option value="Sent">Sent</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Joined">Joined</option>
                            </select>      
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Select Status</label>								
                            <div class="col-sm-5">
                                <select class="form-control" name="status" required="" id="status">
                                    <option hidden>Select Status</option>   
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