
<h3>Apply User List With Details
</h3>
<br />
<?php //print_r($result); 
if(!empty($result)){
?>
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                <div style=""><h4><b>Personal Details</b></h4>
                    <hr>
                    </div> 
                <div class="form-group col-md-12" >
                        <label class="col-md-3 control-label">Candidate Code</label>                               
                        <div class="col-md-9">
                             <?php echo $row['candicate_code'] ?> 
                        </div>

                </div>
                <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Job Code</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['job_code'] ?> 
                            </div>
                            
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Department Code</label>								
                            <div class="col-md-9">
                                 <?php echo $row['department_code'] ?> 
                            </div>
                    </div>

                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Candidate Full Name</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['candicate_first_name'].' '.$row['candicate_middle_name'].' '.$row['candicate_last_name']  ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Candidate DOB</label>                               
                            <div class="col-md-9">
                                <?php $originalDate = $row['candicate_dob'];
$newDate = date("d-m-Y", strtotime($originalDate)); ?>
                                 <?php echo $newDate; ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Gender</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['candicate_gender'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Candidate Father Full Name</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['father_first_name'].' '.$row['father_middle_name'].' '.$row['father_last_name']  ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Candidate Mother Full Name</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['mother_first_name'].' '.$row['mother_middle_name'].' '.$row['mother_last_name']  ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Candidate Contact</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['candicate_phone'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Candidate Email</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['candicate_email'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Candidate Addhar Card No</label>                              
                        <div class="col-md-9">
                             <?php echo $row['candicate_aadhaar'] ?>
                           </div>
                    </div>
                
                <div style=""><h4><b>Address Details</b></h4>
                    <hr>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Address 1</label>                              
                        <div class="col-md-9">
                             <?php echo $row['candicate_address1'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Address 2</label>                              
                        <div class="col-md-9">
                             <?php echo $row['candicate_address2'] ?>
                           </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">City</label>								
                            <div class="col-md-5">
                                <?php echo $row['candicate_city'] ?>
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-sm-3 control-label">State</label>                             
                            <div class="col-sm-5">
                                <?php echo $row['candicate_state'] ?>
                            </div>
                    </div>
                <div class="form-group col-md-12">
                            <label class="col-sm-3 control-label">Zip Code</label>                             
                            <div class="col-sm-5">
                                <?php echo $row['candicate_zip'] ?>
                            </div>
                    </div>
                <div class="form-group col-md-12">
                            <label class="col-sm-3 control-label">CV Path</label>                             
                            <div class="col-sm-5">
                                <?php echo $row['cv_path'] ?>
                            </div>
                    </div>

                            					
            </div>				
        </div>			
    </div>
</div>
<?php } }else{ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body" style="text-align: center">
                <h3> Record Not Found </h3>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<a href="<?php echo BASE_URL."job_posting/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View City</a>