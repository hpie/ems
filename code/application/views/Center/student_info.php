<?php foreach ($registrations as $registration): ?>
					
					<table class="table table-striped table-bordered">
						<tr>
							<th>Student ID </th>
							<th>Student Name </th>
							<th>Center Code </th>
							<th>Status </th>
							<th>Registered Email </th>
							<th>Registration Date </th>							
						</tr>
					
						<tr>
							<td><?php echo $registration->student_id; ?></td>
							<td><?php echo $registration->first_name ." ". $registration->last_name; ?></td>
							<td><?php echo $registration->entity_code; //$enquiry->cdac_center_model->center_name; ?></td>
							<td><?php echo $registration->student_status; ?></td>
							<td><?php echo $registration->registered_email; ?> </td>
							<td><?php echo $registration->admission_dt; ?></td>
						</tr>

						<tr>
							<th>Mothers Name </th>
							<th>Fathers Name </th>
							<th>Admissin Date</th>
							<th>Date Of Birth </th>
							<th>Gender</th>
							<th>Contact Phone</th>							
						</tr>           

						<tr>
							<td><?php echo $registration->father_first_name ." ". $registration->father_last_name; ?></td>
							<td><?php echo $registration->mother_first_name ." ". $registration->mother_last_name; ?></td>
							<td><?php echo $registration->admission_dt; //$enquiry->cdac_center_model->center_name; ?></td>
							<td><?php echo $registration->date_of_birth; ?></td>
							<td><?php echo $registration->gender; ?> </td>
							<td><?php echo $registration->contact_phone; ?></td>
						</tr>
					</table>
<?php endforeach; ?>