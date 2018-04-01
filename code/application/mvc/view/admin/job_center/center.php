<h3>Job List 
    <a href="<?php echo BASE_URL."job_posting/add"; ?>" type="button" class="btn btn-default btn-icon" style="float: right">
        Add New
        <i class="entypo-plus"></i>
    </a>
</h3>

<br />
<table class="table table-bordered datatable" id="table-4">
    <thead>
        <tr>
            <th>Center Code</th>                            
            <th>Center Title</th>                            
                                    
            <th>Ceneter Description</th>                            
            <th>Ceneter Address</th>                            
            <th>Center Email</th>                            
            <th>Center Phone</th>                                      
            <th>Status</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
        <?php
            //print_r($result);
        if (!empty($result)) {
            foreach ($result as $row) {
                ?>
                <tr class="odd gradeX">
                   
                    <td><?php echo $row['center_code']; ?></td>
                    <td><?php echo $row['center_title']; ?></td>
                    
                    <td><?php echo $row['center_description']; ?></td>
                    <td><?php echo $row['center_address1'].", ".$row['center_address2'] ; ?></td>
                    <td><?php echo $row['center_email']; ?></td>
                    <td><?php echo $row['center_phone']; ?></td>
                   
                    <td id="td<?php echo $row['center_code']; ?>">
                        <?php if($row['status']=='A'){
                            ?>
                        <button class="btn btn-danger btn-sm btn-icon icon-left changeStatus btn<?php echo $row['status']; ?>" data-id="<?php echo $row['center_code']; ?>" data-table="product" data-status="0">
                            <i class="entypo-cancel"></i>
                            InActive
                        </button>
                        <?php
                        }
                        else{
                            ?>
                        <button class="btn btn-success btn-sm btn-icon icon-left changeStatus btn<?php echo $row['center_code']; ?>" data-id="<?php echo $row['center_code']; ?>" data-table="product" data-status="1">
                            <i class="entypo-check"></i>
                            Active
                        </button>
                        <?php
                        } ?>                        
                    </td>
                    <td>
                        <a href="<?php echo BASE_URL."job_center/edit/".$row['center_code']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-pencil"></i>
                            Edit
                        </a>
                        <a href="<?php echo BASE_URL."job_center/detail/".$row['center_code']; ?>" class="btn btn-success btn-sm btn-icon icon-left">
                            <i class="entypo-eye"></i>
                            View
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>

    </tbody>
    <tfoot>
        <tr>
            <th>Center Code</th>                            
            <th>Center Title</th>                       
            <th>Ceneter Description</th>                            
            <th>Ceneter Address</th>                            
            <th>Center Email</th>                            
            <th>Center Phone</th>                                      
            <th>Status</th>
            <th>Action</th>            
        </tr>
    </tfoot>
</table>

<br />