<?php //print_r($enquiries) //foreach ($enquiries as $enquiry): ?>

<table class="table table-striped table-bordered">
		<tr>
			<th>Course Code </th>
			<th>Course Name </th>
			<th>Course Detais </th>
			<!-- <th>Status </th>
			<th>Registered Email </th>
			<th>Registration Date </th> -->
			
		</tr>
		
<?php foreach ($courses as $course): ?>
	
		<tr>
			<td><a href="student/enquiry/<?php echo $course->course_code; ?>"><?php echo $course->course_code; ?></a></td>
			<td><?php echo $course->course_name; ?></td>
			<td><?php echo $course->course_description; ?></td>
			
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