<?php //echo "==========>>>>>>>>>>> <pre>"; print_r($course_data); exit;//foreach ($enquiries as $enquiry): ?>

<table class="table table-striped table-bordered">
		<tr>
			<th>Sr. No. </th>
			<th>Course Code</th>
			<th>Start Date </th>
			<th>End Date</th>
			<th>Total Students </th>
		</tr>
		
<?php $i = 1;
	foreach ($course_data as $course): ?>
	
		<tr>
			<td><?php echo $i++; ?></td>
			<td><a href="arc/coursecalendar/<?php echo $course->enrolment_id; ?>"><?php echo $course->course_code; ?></a></td>
			<td><?php echo $course->start_dt; ?></td>
			<td><?php echo $course->end_dt; ?></td>
			<td><?php echo $course->total; ?></td>
		</tr>

<?php endforeach; ?>

	</table>
	<hr/>

<!-- <div class="row text-center">
	<div class="col col-md-12">
		<p>Results: <strong><?php echo $counts['from_num']; ?></strong> to <strong><?php echo $counts['to_num']; ?></strong> (total <strong><?php echo $counts['total_num']; ?></strong> results)</p>
		<?php echo $pagination; ?>
	</div>
</div> -->