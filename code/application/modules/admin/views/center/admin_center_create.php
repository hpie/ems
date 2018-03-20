<?php echo $form->messages(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">User Info</h3>
			</div>
			<div class="box-body">
			
				<?php echo $form->open(); ?>

					<?php echo $form->bs3_text('Center Title', 'center_title'); ?>
					<?php echo $form->bs3_textarea('Center Description', 'center_description'); ?>
					<?php echo $form->bs3_text('Center Address 1', 'center_address1'); ?>
					<?php echo $form->bs3_text('Center Address 2', 'center_address2'); ?>
					<?php echo $form->bs3_text('Center City', 'center_city'); ?>
					<?php echo $form->bs3_text('Center State', 'center_state'); ?>
					<?php echo $form->bs3_text('Center zip', 'center_zip'); ?>
					<?php echo $form->bs3_text('Center Email', 'center_email'); ?>
					<?php echo $form->bs3_text('Center Phone', 'center_phone'); ?>
					<?php echo $form->bs3_text('Center Contact Name', 'center_contact_name'); ?>
					<?php echo $form->bs3_text('Center Contact Designation', 'center_contact_designation'); ?>
								

					<?php echo $form->bs3_submit(); ?>
					
				<?php echo $form->close(); ?>
			</div>
		</div>
	</div>
	
</div>