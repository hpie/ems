<h3>Edit Job Interview Schedules
</h3>
<br />
<div class="row">
  <?php foreach($result as $row)  { ?>
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">            
                <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>job_interview/update/<?php echo $row['interview_schedule_id'] ?>" enctype="multipart/form-data">      
                   
                   <div class="form-group">
                        <label class="col-sm-3 control-label">Job  Code</label>                              
                          <div class="col-sm-5">

                            <select class="form-control" name="job_code" required="" id="job_code">
                                    <option hidden>Select Job</option>   
                                     <?php foreach($job as $row_job) { ?>
                                    <option <?php if($row['row_id']==$row_job['row_id']) echo "SELECTED"; ?> value="<?php echo $row_job['row_id']; ?>"><?php echo $row_job['job_code']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Department  Code</label>                
                         <div class="col-sm-5">
                           <select class="form-control" name="department_code" required="" id="department_code">
                                    <option hidden>Select Department</option>   
                                     <?php foreach($department as $row_dep) { ?>
                                    <option <?php if($row['department_code']==$row_dep['department_code']) echo "SELECTED"; ?> value="<?php echo $row_dep['department_code']; ?>"><?php echo $row_dep['department_title']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div>         
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Center  Code</label>                              
                         <div class="col-sm-5">
                           <select class="form-control" name="center_code" required="" id="center_code">
                                    <option hidden>Select Center</option>   
                                     <?php  foreach($center as $row_center) { ?>
                                    <option <?php if($row['center_code']==$row_center['center_code']) echo "SELECTED"; ?> value="<?php echo $row_center['center_code']; ?>"><?php echo $row_center['center_title']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Interview Date</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="interview_dt" class="form-control" value="<?php echo $row['interview_dt']; ?>"  placeholder="Job title" id="interview_dt">
                                    
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Interview Start Time</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="interview_start_time" class="form-control" value="<?php echo $row['interview_start_time']; ?>"  placeholder="Job title" id="interview_start_time">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Interview End Time</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="interview_end_time" class="form-control" value="<?php echo $row['interview_end_time']; ?>"  placeholder="Job title" id="interview_end_time">
                                    
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Interview Report Time</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="interview_report_time" class="form-control" value="<?php echo $row['interview_report_time']; ?>"  placeholder="Job title" id="interview_report_time">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Interview Close Time</label>                              
                          <div class="col-sm-5">
                            <input type="date" name="interview_close_time" class="form-control" value="<?php echo $row['interview_close_time']; ?>"  placeholder="Job title" id="interview_close_time">
                                    
                        </div>
                    </div> 
                     
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Interview schedule status</label>                              
                            <div class="col-sm-5">
                              
                                <select class="form-control" name="interview_schedule_status" required="" id="interview_schedule_status">
                                    <option hidden>Select Job Status</option>  
                                    <option  <?php if($row['interview_schedule_status']=='Cancelled') echo "SELECTED"; ?>  value="Cancelled">Cancelled</option>
                                    <option <?php if($row['interview_schedule_status']=='Published') echo "SELECTED"; ?> value="Published">Published</option>
                                    <option <?php if($row['interview_schedule_status']=='Deleted') echo "SELECTED"; ?> value="Deleted">Deleted</option>
                                    <option <?php if($row['interview_schedule_status']=='Draft') echo "SELECTED"; ?> value="Draft">Draft</option>            
                                </select>
                            </div>   
                            
                    </div>
                      
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Interview schedule comments</label>                              
                            <div class="col-sm-5">
                                <textarea name="interview_schedule_comments" class="form-control" placeholder="Job Comment" ><?php echo $row['interview_schedule_comments']; ?>"</textarea>    
                            </div>
                    </div>  
                    <?php //print_r($status) ?>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Select Status</label>               
                            <div class="col-sm-5">
                                <select class="form-control" name="status" required="" id="status">
                                    <option hidden>Select Status</option>   
                                     <?php foreach($status as $row_status) { ?>
                                    <option<?php if($row_status['status_code']==$row['status']) echo "SELECTED"; ?>   value="<?php echo $row_status['status_code']; ?>"><?php echo $row_status['status_title']; ?></option>
                                    <?php } ?>                                   
                                </select>
                            </div>
                    </div>
                   
                            <input type="hidden" name="modified_by" class="form-control" value="<?php echo $_SESSION['admin_name']; ?>" placeholder="Product price" >
                                                                      
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Update</button>
                        </div>
                    </div>
                </form>           
            </div>        
        </div>      
    </div>
    <?php } ?>
</div>