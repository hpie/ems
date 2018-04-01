<h3>Department List 
    <a href="<?php echo BASE_URL."department/add"; ?>" type="button" class="btn btn-default btn-icon" style="float: right">
        Add New
        <i class="entypo-plus"></i>
    </a>
</h3>

<br />
<table class="table table-bordered datatable" id="table-4">
    <thead>
        <tr>
            <th>Department Code</th>                            
            <th>Department Name</th>                            
            <th>Department Description</th>                            
            <th>State</th>                            
            <th>City</th>                            
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
                   
                    <td><?php echo $row['department_code']; ?></td>
                    <td><?php echo $row['department_title']; ?></td>
                    <td><?php echo $row['department_description']; ?></td>
                    <td><?php echo $row['state_name']; ?></td>
                    <td><?php echo $row['city_name']; ?></td>
                    
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
                        <button class="btn btn-success btn-sm btn-icon icon-left changeStatus btn<?php echo $row['department_code']; ?>" data-id="<?php echo $row['key_id']; ?>" data-table="product" data-status="1">
                            <i class="entypo-check"></i>
                            Active
                        </button>
                        <?php
                        } ?>                        
                    </td>
                    <td>
                        <a href="<?php echo BASE_URL."department/edit/".$row['department_code']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-pencil"></i>
                            Edit
                        </a>
                        <a href="<?php echo BASE_URL."department/detail/".$row['department_code']; ?>" class="btn btn-success btn-sm btn-icon icon-left">
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
            <th>Department Code</th>                            
            <th>Department Name</th>                            
            <th>Department Description</th>                            
            <th>State</th>                            
            <th>City</th>                            
            <th>Status</th>
            <th>Action</th>            
        </tr>
    </tfoot>
</table>

<br />