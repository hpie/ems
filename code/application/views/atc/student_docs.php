<?php
	//echo "====>>>>>>>>>> <pre>"; print_r($documentlist); exit;
?>
<?php
	$ci =& get_instance();
	$base_url = base_url();
?>

					
					<table class="table table-striped table-bordered">
						<tr>
							<th>Record ID</th>
							<th>Student ID </th>
							<th>Document Name </th>
							<th>Document Type</th>
							<th>Status</th>
							<th>Centre Code</th>
							<th>Change Status</th>
							<!-- <th>Created Date</th>	
							<th>Updated By</th>	
							<th>Updated Date</th> -->							
						</tr>
<?php if(count($documentlist) > 0) { ?>	
<?php foreach ($documentlist as $document): ?>					
						<tr>
							<td><?php echo $document->id; ?></td>
							<td><?php echo $document->student_id; ?></td>
							<td><a href="javascript:void(0)" onclick="showImg('<?php echo $base_url."assets/uploads/qualification_doc/".$document->document_name; ?>')"><?php echo $document->document_name; ?></td>
							<td><?php echo $document->document_type; ?></a></td>
							<td><span id="statustext_<?php echo $document->id; ?>"><?php echo $document->status; ?></span></td>
							<td><?php echo $document->created_by; ?> </td>
							<td>
								<input class="radio_status" id="docstatus_<?php echo $document->id; ?>" type="radio" name="doc_status_<?php echo $document->id; ?>" value="pending" <?php echo ($document->status == 'pending')? "checked":"";?>> Pending
								<input class="radio_status" id="docstatus_<?php echo $document->id; ?>" type="radio" name="doc_status_<?php echo $document->id; ?>" value="approved" <?php echo ($document->status == 'approved')? "checked":"";?>> Approved
								<input class="radio_status" id="docstatus_<?php echo $document->id; ?>" type="radio" name="doc_status_<?php echo $document->id; ?>" value="rejected" <?php echo ($document->status == 'rejected')? "checked":"";?>> Rejected
							</td>	
							<!-- <td><?php echo $document->created_dt; ?></td>
							<td><?php echo $document->updated_by; ?> </td>
							<td><?php echo $document->updated_dt; ?></td> -->
						</tr>
<?php endforeach; ?>
<?php } else {
	echo "<tr><td colspan='7'>No documents found!</td></tr>";
}

?>
						
					</table>

<script>
	$(document).ready(function() {
		$(".radio_status").on('click', function() {
			//alert("========>>>>>>>> : " + $(this).attr('id'));
			var student_idArr =  $(this).attr('id').split('_');
			$("#statustext_" + student_idArr[1]).text($(this).val());

			//alert("==============="+ $(this).val() + " ||| statustext_" + student_idArr[1]);
			$.ajax({
				url:"<?php echo $base_url.'index.php/atc/updateDocStatus'?>",
	         	type: "POST",
				data: {'student_id': student_idArr[1], 'status' : $(this).val()}
			});
		});
	});
</script>