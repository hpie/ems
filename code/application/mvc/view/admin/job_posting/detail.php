
<h3>Job Detail
</h3>
<br />
<?php //print_r($result); ?>
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                  
                    <div class="form-group col-md-12" >
                            <label class="col-md-2 control-label">Job Code</label>                               
                            <div class="col-md-8">
                                 <?php echo $row['job_code'] ?> 
                            </div>
                            <div class="col-md-2" style="float: right">
                                <a href="<?php echo BASE_URL."job_posting/applyuserview/".$row['row_id']; ?>" class="btn btn-success btn-sm btn-icon icon-left">
                            <i class="entypo-eye"></i>
                            Apply user
                        </a>
                            </div>
                    </div>
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
                            <label class="col-md-3 control-label">Job title</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['job_title'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job Description</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['job_description'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job Salary Range</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['job_salary_range'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Refference Doc</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['job_ref_document'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job Post Date</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['job_post_dt'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Job Last Date</label>                              
                        <div class="col-md-9">
                             <?php echo $row['job_last_dt'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Job Expire Date</label>                              
                        <div class="col-md-9">
                             <?php echo $row['job_expire_dt'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Job Status</label>                              
                        <div class="col-md-9">
                             <?php echo $row['job_status'] ?>
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
<a href="<?php echo BASE_URL."job_posting/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View City</a>