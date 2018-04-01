
<h3>City Detail
</h3>
<br />
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">						
                  
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">City</label>								
                            <div class="col-md-9">
                                 <?php echo $row['city_name'] ?> 
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">City Latitude</label>                              
                        <div class="col-md-9">
                             <?php echo $row['latitude'] ?>
                           </div>
                    </div>
                     <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">City Longtitude</label>                              
                        <div class="col-md-9">
                         <?php echo $row['longitude'] ?>
                            </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">State</label>								
                            <div class="col-md-9">
                                <?php echo $row['state_name'] ?>
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
<a href="<?php echo BASE_URL."city/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View City</a>