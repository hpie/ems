
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
                            <label class="col-md-3 control-label">Department title</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['department_title'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Center title</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['center_title'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job title</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['job_title'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Interview Date</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['interview_dt'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Interview Start Time </label>                               
                            <div class="col-md-9">
                                 <?php echo $row['interview_start_time'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Interview End Time</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['interview_end_time'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Interview Report Time</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['interview_report_time'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Interview Close Time</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['interview_close_time'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Interview Schedule Status</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['interview_schedule_status'] ?> 
                            </div>
                    </div>

                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Interview Schedule Comment</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['interview_schedule_comments'] ?> 
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
<a href="<?php echo BASE_URL."job_interview/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View Interview Schedules</a>