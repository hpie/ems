<?php //print_r($enquiries) //foreach ($enquiries as $enquiry): ?>

<table class="table table-striped table-bordered">
		<tr>
			<th>Student ID </th>
			<th>Student Name </th>
			<th>Center Code </th>
			<th>Status </th>
			<th>Registered Email </th>
			<th>Registration Date </th>
			
		</tr>
		
<?php foreach ($registrations as $registration): ?>
	
		<tr>
			<td><a href="student/enquiry/<?php echo $registration->student_id; ?>"><?php echo $registration->student_id; ?></a></td>
			<td><?php echo $registration->first_name ." ". $registration->last_name; ?></td>
			<td><?php echo $registration->entity_code; //$enquiry->cdac_center_model->center_name; ?></td>
			<td><?php echo $registration->student_status; ?></td>
			<td><?php echo $registration->registered_email; ?> </td>
			<td><?php echo $registration->admission_dt; ?></td>
		</tr>

<?php endforeach; ?>

	</table>
	<hr/>

<div class="row text-center">
	<div class="col col-md-12">
		<p>Results: <strong><?php echo $counts['from_num']; ?></strong> to <strong><?php echo $counts['to_num']; ?></strong> (total <strong><?php echo $counts['total_num']; ?></strong> results)</p>
		<?php echo $pagination; ?>
	</div>
</div>