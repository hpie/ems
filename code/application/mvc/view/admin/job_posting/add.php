<h3>Add Job Posting
</h3>
<br />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/job_posting/insert" enctype="multipart/form-data">			
                   
                   <div class="form-group">
                        <label class="col-sm-3 control-label">Job  Code</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="job_code" class="form-control"  placeholder="Job title" id="job_code">
                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Job  Code</label>								
                         <div class="col-sm-5">
                           <select class="form-control" name="department_code" required="" id="department_code">
                                    <option hidden>Select Job</option>   
                                     <?php foreach($department as $row_dep) { ?>
                                    <option value="<?php echo $row_dep['department_code']; ?>"><?php echo $row_dep['department_title']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Job  Title</label>                              
                          <div class="col-sm-5">
                            <input type="text" name="job_title" class="form-control"  placeholder="Job title" id="job_title">
                                    
                        </div>
                    </div>  
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Job Description</label>                              
                            <div class="col-sm-5">
                                <textarea name="job_description" class="form-control" placeholder="Job Description" ></textarea>    
                            </div>
                    </div>  
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Job salary Range</label>                              
                            <div class="col-sm-5">
                                <input type="text" name="job_salary_range" class="form-control"  placeholder="Job Salary Range" id="job_sal_range">
                                    
                            </div>
                    </div> 
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Job Refference document</label>                              
                            <div class="col-sm-5">
                                <input type="file" name="job_ref_document[]" class="form-control" accept="*"  multiple="" id="jon_ref_doc">
                                    
                            </div>
                    </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label">Job Post Date</label>                              
                            <div class="col-sm-5">
                                <input type="date" name="job_post_dt" class="form-control"  placeholder="Department Address2" id="job_post_dt">
                                    
                            </div>
                    </div>
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Job Last Date</label>                              
                            <div class="col-sm-5">
                                <input type="date" name="job_last_dt" class="form-control"  placeholder="Job Last Date" id="job_last_dt">
                                    
                            </div>
                    </div>
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Job Expire Date</label>                              
                            <div class="col-sm-5">
                                <input type="date" name="job_expire_dt" class="form-control"  placeholder="Job Expire Date" id="job_expire_dt">
                                    
                            </div>
                    </div>
                     <div class="form-group">
                            <label class="col-sm-3 control-label">Job Satatus</label>                              
                            <div class="col-sm-5">
                              
                                <select class="form-control" name="job_status" required="" id="department_city">
                                    <option hidden>Select Job Status</option>  
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                    <option value="Draft">Draft</option>            
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