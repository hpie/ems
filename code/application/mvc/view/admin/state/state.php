<h3>City List 
    <a href="<?php echo BASE_URL."state/add"; ?>" type="button" class="btn btn-default btn-icon" style="float: right">
        Add New
        <i class="entypo-plus"></i>
    </a>
</h3>

<br />
<table class="table table-bordered datatable" id="table-4">
    <thead>
        <tr>
            <th>Name</th>                            
            <th>Status</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
        <?php
       // print_r($result);
        if (!empty($result)) {
            foreach ($result as $row) {
                ?>
                <tr class="odd gradeX">
                   
                    <td><?php echo $row['state_name']; ?></td>
                    
                    <td id="td<?php echo $row['_id']; ?>">
                        <?php if($row['status']=='A'){
                            ?>
                        <button class="btn btn-danger btn-sm btn-icon icon-left changeStatus btn<?php echo $row['status']; ?>" data-id="<?php echo $row['city_id']; ?>" data-table="product" data-status="0">
                            <i class="entypo-cancel"></i>
                            InActive
                        </button>
                        <?php
                        }
                        else{
                            ?>
                        <button class="btn btn-success btn-sm btn-icon icon-left changeStatus btn<?php echo $row['state_code']; ?>" data-id="<?php echo $row['city_id']; ?>" data-table="product" data-status="1">
                            <i class="entypo-check"></i>
                            Active
                        </button>
                        <?php
                        } ?>                        
                    </td>
                    <td>
                        <a href="<?php echo BASE_URL."state/edit/".$row['state_code']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-pencil"></i>
                            Edit
                        </a>
                        <a href="<?php echo BASE_URL."state/detail/".$row['state_code']; ?>" class="btn btn-success btn-sm btn-icon icon-left">
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
           <th>Image</th>
            <th>Name</th>                            
            <th>Price</th>
            <th>QTY</th>
            <th>Category</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>

<br />