
<h3>Job Edit 
</h3>
<br />
<?php //print_r($result); ?>
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">                        
                  <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>job_posting/update/<?php echo $row['row_id']  ?>" enctype="multipart/form-data">         
               <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job Code</label>                               
                            <div class="col-md-9">
                        <input type="text" class="form-control"  name="job_code" id="job_code" 
                        value="<?php echo $row['job_code'] ?>"> 
                            </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Job  Code</label>                             
                         <div class="col-sm-5">
                           <select class="form-control" name="department_code" required="" id="department_code">
                                    <option hidden>Select Job</option>   
                                     <?php foreach($department as $row_dep) { ?>
                                    <option <?php if($row_dep['department_code']==$row['department_code']) 
                                    echo "SELECTED" ;?> value="<?php echo $row_dep['department_code']; ?>"><?php echo $row_dep['department_title']; ?></option>
                                    <?php } ?>                                   
                                </select>         
                            </div>
                    </div> 
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job title</label>                               
                            <div class="col-md-9">
                        <input type="text" class="form-control"  name="job_title" id="job_title" 
                        value="<?php echo $row['job_title'] ?>"> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job Description</label>                               
                            <div class="col-md-9">
                              <textarea class="form-control"  name="job_description" id="job_description" >
                            <?php echo $row['job_description'] ?></textarea> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job Salary Range</label>                               
                            <div class="col-md-9">
                               <input type="text" class="form-control"  name="job_salary_range" 
                               id="job_salary_range" value="<?php echo $row['job_salary_range'] ?>"> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job Refference</label>                               
                            <div class="col-md-9">
                             <input type="file" class="form-control"  name="job_ref_document"
                              id="job_ref_document" value=" <?php echo $row['job_ref_document'] ?>"> 
                            </div>
                    </div>
                     <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Date Post Date</label>                               
                            <div class="col-md-9">
                               <input type="date" class="form-control"  name="job_post_dt" 
                               id="job_post_dt" value="<?php echo $row['job_post_dt'] ?>"> 
                            </div>
                    </div>
                     <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Date Late Date</label>                               
                            <div class="col-md-9">
                               <input type="date" class="form-control"  name="job_last_dt" 
                               id="job_last_dt" value="<?php echo $row['job_last_dt'] ?>"> 
                            </div>
                    </div>
                     <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">ob Expire Date</label>                               
                            <div class="col-md-9">
                               <input type="date" class="form-control"  name="job_expire_dt" 
                               id="job_expire_dt" value="<?php echo $row['job_expire_dt'] ?>"> 
                            </div>
                    </div>
                    
                    <div class="form-group">
                            <label class="col-sm-3 control-label">Job Satatus</label>                              
                            <div class="col-sm-5">
                              
                                <select class="form-control" name="job_status" required="" id="department_city">
                                    <option hidden>Select Job Status</option>  
                                    <option <?php if($row['job_status']=="Online" ) echo "SELECTED"; ?> value="Online">Online</option>
                                    <option <?php if($row['job_status']=="Offline" ) echo "SELECTED"; ?> value="Offline">Offline</option>
                                    <option <?php if($row['job_status']=="Draft" ) echo "SELECTED"; ?> value="Draft">Draft</option>            
                                </select>
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
<a href="<?php echo BASE_URL."job_posting/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View Job</a>