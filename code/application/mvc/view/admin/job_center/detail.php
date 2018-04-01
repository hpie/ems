
<h3>Center Detail
</h3>
<br />
<?php //print_r($result); ?>
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                  
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Center Code</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['center_code']; ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Center Title</label>								
                            <div class="col-md-9">
                                 <?php echo $row['center_title']; ?> 
                            </div>
                    </div>

                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Center Description</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['center_description'];?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Center Address</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['center_address1'].", ".$row['center_address2']; ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Center State</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['state_name'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">City Name</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['city_name'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Center Zip</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['center_zip'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Center Email</label>                               
                            <div class="col-md-9">
                                 <?php echo $row['center_email'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Center Phone</label>                              
                        <div class="col-md-9">
                             <?php echo $row['center_phone'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Center Contact Name</label>                              
                        <div class="col-md-9">
                             <?php echo $row['center_contact_name'] ?>
                           </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Center Contact Designation</label>                              
                        <div class="col-md-9">
                             <?php echo $row['center_contact_designation'] ?>
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
<a href="<?php echo BASE_URL."job_center/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View Center</a>