
<h3>City Edit
</h3>
<br />
<?php foreach($result as $row)  { ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">                        
                   <form role="form" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>keyword/update/<?php echo $row['key_id']  ?>" enctype="multipart/form-data">         
               
                    <div class="form-group col-md-12" >
                            <label class="col-md-3 control-label">Title</label>                              
                            <div class="col-md-9">
                                 <input type="text" name="title"  class="form-control" value="<?php echo $row['title'] ?>" >
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
                    
                               <input type="hidden"name="modified_by" value="<?php echo $row['created_by'] ?>" >
                         <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Submit</button>
                        </div>
                    </div>    
                                                
            </div>              
        </div>    
        </form>      
    </div>
</div>
<?php } ?>
<a href="<?php echo BASE_URL."city/index"; ?>" class="btn btn-success btn-sm btn-icon icon-left">
    <i class="entypo-eye"></i>View City</a>