<h3>Employee List 
    <a href="<?php echo BASE_URL."admin/employee/add"; ?>" type="button" class="btn btn-default btn-icon" style="float: right">
        Add New
        <i class="entypo-plus"></i>
    </a>
</h3>

<br />
<table class="table table-bordered datatable" id="table-4">
    <thead>
        <tr>
            <th>Employee Code</th>                            
            <th>Employee Name</th>                            
            <th>Department Name</th>                            
            <th>Job Name</th>                                          
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
                   
                    <td><?php echo $row['candicate_code']; ?></td>
                    <td><?php echo $row['employee_first_name']." ".$row['employee_middle_name']." ".$row['employee_last_name']; ?></td>
                    <td><?php echo $row['department_title']; ?></td>
                    
                    <td><?php echo $row['job_title']; ?></td>
                                       
                    <td id="td<?php echo $row['employee_id']; ?>">
                        <?php if($row['status']=='A'){
                            ?>
                        <button class="btn btn-danger btn-sm btn-icon icon-left changeStatus btn<?php echo $row['status']; ?>" data-id="<?php echo $row['employee_id']; ?>" data-table="product" data-status="0">
                            <i class="entypo-cancel"></i>
                            InActive
                        </button>
                        <?php
                        }
                        else{
                            ?>
                        <button class="btn btn-success btn-sm btn-icon icon-left changeStatus btn<?php echo $row['employee_id']; ?>" data-id="<?php echo $row['employee_id']; ?>" data-table="product" data-status="1">
                            <i class="entypo-check"></i>
                            Active
                        </button>
                        <?php
                        } ?>                        
                    </td>
                    <td>
                        <a href="<?php echo BASE_URL."admin/employee/edit/".$row['employee_id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-pencil"></i>
                            Edit
                        </a>
                        <a href="<?php echo BASE_URL."admin/employee/detail/".$row['employee_id']; ?>" class="btn btn-success btn-sm btn-icon icon-left">
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
            <th>Center Title</th>                            
            <th>Department Name</th>                            
            <th>Interview Date</th>                                       
            <th>Status</th>
            <th>Action</th>            
        </tr>
    </tfoot>
</table>
<br />