<table class="table table-striped table-bordered">
						<tr>
							<th>Module Code</th>
							<th>Module Name </th>
							<th>Module Description </th>
							<th>Module Status </th>						
						</tr>
					
<?php foreach ($modulelist as $module): ?>
					
					
						<tr>
							<td><?php echo $module->module_code; ?></td>
							<td><?php echo $module->module_name; ?></td>
							<td><?php echo $module->module_description; //$enquiry->cdac_center_model->center_name; ?></td>
							<td><?php echo $module->module_status; ?></td>
						</tr>
					
<?php endforeach; ?>
</table>