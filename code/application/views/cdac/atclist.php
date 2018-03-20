<?php //print_r($enquiries) //foreach ($enquiries as $enquiry): ?>

<table class="table table-striped table-bordered">
		<tr>
			<th>ATC Code </th>
			<th>ATC Name </th>
			<!-- <th>Center Code </th>
			<th>Status </th>
			<th>Registered Email </th>
			<th>Registration Date </th> -->
			
		</tr>
		
<?php foreach ($centers as $center): ?>
	
		<tr>
			<td><a href="student/enquiry/<?php echo $center->entity_code; ?>"><?php echo $center->entity_code; ?></a></td>
			<td><?php echo $center->atc_name; ?></td>
			
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