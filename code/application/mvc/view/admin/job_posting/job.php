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
            <th>Job Code</th>                            
            <th>Job Title</th>                            
            <th>Department Name</th>                            
            <th>Department Description</th>                            
                                      
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
                   
                    <td><?php echo $row['job_code']; ?></td>
                    <td><?php echo $row['job_title']; ?></td>
                    <td><?php echo $row['department_title']; ?></td>
                    <td><?php echo $row['job_description']; ?></td>
                   
                    <td id="td<?php echo $row['_id']; ?>">
                        <?php if($row['status']=='A'){
                            ?>
                        <button class="btn btn-danger btn-sm btn-icon icon-left changeStatus btn<?php echo $row['status']; ?>" data-id="<?php echo $row['key_id']; ?>" data-table="product" data-status="0">
                            <i class="entypo-cancel"></i>
                            InActive
                        </button>
                        <?php
                        }
                        else{
                            ?>
                        <button class="btn btn-success btn-sm btn-icon icon-left changeStatus btn<?php echo $row['row_id']; ?>" data-id="<?php echo $row['key_id']; ?>" data-table="product" data-status="1">
                            <i class="entypo-check"></i>
                            Active
                        </button>
                        <?php
                        } ?>                        
                    </td>
                    <td>
                        <a href="<?php echo BASE_URL."job_posting/edit/".$row['row_id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-pencil"></i>
                            Edit
                        </a>
                        <a href="<?php echo BASE_URL."job_posting/detail/".$row['row_id']; ?>" class="btn btn-success btn-sm btn-icon icon-left">
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
            <th>Job Code</th>                            
            <th>Job Title</th>                            
            <th>Department Name</th>                            
            <th>Department Description</th>                            
                                      
            <th>Status</th>
            <th>Action</th>            
        </tr>
    </tfoot>
</table>

<br />