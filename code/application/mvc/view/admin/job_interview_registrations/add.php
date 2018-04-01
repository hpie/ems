<h3>Add Registration</h3>
<br />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>admin/registration/insert" enctype="multipart/form-data">			
                   
                   <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Code</label>                              
                          <div class="col-sm-5">
                            <?php $id=0;
                             if(is_array($emp)){  foreach($emp as $row_emp) { ?>
                             <?php $id= $row_emp['Candidate_id'];
                             }} if($id<=0 && $id==''){$id=1;}
                              else{ $id= $id+1;}?>
                           <input type="text" class="form-control" name="candicate_code" id="candicate_code" 
                           value="<?php echo "Cdac-reg-".$id ?>">        
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
                        <label class="col-sm-3 control-label">Candidate Job Code</label>                              
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
                        <label class="col-sm-3 control-label">Candidate Name</label>                              
                          <div class="col-sm-3">
                            <input type="text" name="Candidate_first_name" required class="form-control"  placeholder="Candidate First Name "
                             id="candicate_first_name">
                                    
                        </div>
                        <div class="col-sm-3">
                            
                            <input type="text" name="Candidate_middle_name" class="form-control"  placeholder="Candidate Middle Name "
                             id="candicate_middle_name">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="Candidate_last_name" class="form-control" required placeholder="Candidate Last Name "
                             id="candicate_last_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate DOB</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="candicate_dob" class="form-control" required  placeholder="Candidate DOB" id="Candidate_dob">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Gender</label>                              
                          <div class="col-sm-5">
                            <select name="candicate_gender" class="form-control">
                                <option hidden>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>      
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Marital Status </label>                              
                          <div class="col-sm-5">
                            <select name="Candidate_gender" class="form-control">
                                <option hidden>Select Marital Status</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
            
                            </select>      
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate's  Father Name</label>                              
                          <div class="col-sm-3">
                            <input type="text" name="father_first_name" required class="form-control"  placeholder="Father First Name "
                             id="Candidate_first_name">
                                    
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
                        <label class="col-sm-3 control-label">Candidate's Mother Name</label>                              
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
                        <label class="col-sm-3 control-label">Candidate Phone</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="candicate_phone" class="form-control"  placeholder="Candidate Phone" id="Candidate_phone">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Email</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="candicate_email" class="form-control"  placeholder="Candidate Email" id="Candidate_email">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Adhar</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="cadidate_aadhaar" class="form-control"  placeholder="Candidate Aadhaar" id="Candidate_adhar">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Address1</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="candicate_address1" class="form-control"  placeholder="Candidate Address1" id="Candidate_adhar1">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Address2</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="candicate_address2" class="form-control"  placeholder="Candidate Address2" id="Candidate_adhar2">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate State</label>                              
                          <div class="col-sm-5">
                           <select class="form-control" name="center_state" required="" id="center_state">
                                    <option hidden>Select State</option>   
                                     <?php foreach($states as $row_state) { ?>
                                    <option value="<?php echo $row_state['state_code']; ?>"><?php echo $row_state['state_name']; ?></option>
                                    <?php } ?>                                   
                                </select>        
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate City</label>                              
                          <div class="col-sm-5">
                           <select class="form-control" name="candicate_city" required="" id="center_city">
                                    <option hidden>Select City</option>   
                                     <?php foreach($city as $row_city) { ?>
                                    <option value="<?php echo $row_city['city_id']; ?>"><?php echo $row_city['city_name']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Zip</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="candicate_zip" class="form-control" id="candicate_zip">
                                    
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate CV</label>                              
                          <div class="col-sm-5">
                            <input type="file" name="cv_path" class="form-control"  id="cv_path">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Preffered Schedule</label>                              
                          <div class="col-sm-5">
                            <select class="form-control" name="alloted_schedule_id" required="" id="alloted_schedule_id">
                                    <option hidden>Select Scheduule</option>   
                                     <?php foreach($schedule as $row_schedule) { ?>
                                    <option value="<?php echo $row_schedule['interview_schedule_id']; ?>"><?php echo $row_schedule['job_code']; ?></option>
                                    <?php } ?>                                   
                            </select>      
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Employee  Status </label>                              
                          <div class="col-sm-5">
                            <select name="interview_registration_status" class="form-control">
                                <option hidden>Select Status</option>
                                <option value="Draft">Draft</option>
                                <option value="Submitted">Submitted</option>
                                <option value="Registered">Registered</option>
                                <option value="Confirmed">Confirmed</option>
                            </select>      
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Alloted Schedule</label>                              
                          <div class="col-sm-5">
                            <select class="form-control" name="alloted_schedule_id" required="" id="alloted_schedule_id">
                                    <option hidden>Select Scheduule</option>   
                                     <?php foreach($schedule as $row_schedule) { ?>
                                    <option value="<?php echo $row_schedule['interview_schedule_id']; ?>"><?php echo $row_schedule['job_code']; ?></option>
                                    <?php } ?>                                   
                            </select>       
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Candidate Alloted Schedule</label>                              
                          <div class="col-sm-5">
                            <textarea class="form-control" name="interview_registration_comments"  id="alloted_schedule_id"></textarea>      
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