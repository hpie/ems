<?php //print_r($enquiries) //foreach ($enquiries as $enquiry): ?>
<?php foreach ($enquiries as $enquiry): ?>
	<table class="table table-striped table-bordered">
		<tr>
			<th>Enquiry ID: </th>
			<td><a href="student/enquiry/<?php echo $enquiry->enquiry_id; ?>"><?php echo $enquiry->enquiry_id; ?></a></td>
		</tr>
		<tr>
			<th>Student Name: </th>
			<td><?php echo $enquiry->first_name ." ". $enquiry->last_name; ?></td>
		</tr>
		<tr>
			<th>Center Code: </th>
			<td><?php echo $enquiry->entity_code; //$enquiry->cdac_center_model->center_name; ?></td>
		</tr>
		
		<tr>
			<th>Course: </th>
			<td><?php echo $enquiry->intended_course; //$enquiry->cdac_course_model->course_name; ?></td>
		</tr>
		
		<tr>
			<th>Status: </th>
			<td><?php echo $enquiry->enquiry_status; ?></td>
		</tr>
		
		<tr>
			<th>Email: </th>
			<td><?php echo $enquiry->enquiry_email; ?> </td>
		</tr>
		<tr>
			<th>Date Enquired: </th>
			<td><?php echo $enquiry->enquiry_dt; ?></td>
		</tr>
		
	</table>
	<hr/>
<?php endforeach; ?>

<div class="row text-center">
	<div class="col col-md-12">
		<p>Results: <strong><?php echo $counts['from_num']; ?></strong> to <strong><?php echo $counts['to_num']; ?></strong> (total <strong><?php echo $counts['total_num']; ?></strong> results)</p>
		<?php echo $pagination; ?>
	</div>
</div>