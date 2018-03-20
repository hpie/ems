<?php $this->load->view('../header.php'); ?>
      <div class="search-container">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
            	<table class="table table-border">
            		<thead>
                		<th>Center Code</th>
                		<th>Center Title</th>
                		<th>Center Description</th>
                		<th>Center Email</th>
                        <th>Center Contact</th>
                        <th>Center contact name</th>
                		<th>Action</th>
            	    </thead>
                	<tbody>
                		<?php foreach($data as $row) { ?>
                		<tr>
                            <td><?php echo $row->center_code; ?></td>
                    		<td><?php echo $row->center_title; ?></td>
                    		<td><?php echo $row->center_description; ?></td>
                    		<td><?php echo $row->center_email; ?></td>
                            <td><?php echo $row->center_phone; ?></td>
                            <td><?php echo $row->center_contact_name; ?></td>
                            <td><a href="<?php echo base_url('center')."/view/".$row->center_code; ?>"><input type="button" class="btn_info" value="View"></a></td>
                        </tr>
                		<?php } ?>
                	</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('../footer.php'); ?>