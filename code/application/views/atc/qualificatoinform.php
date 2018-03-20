<?php // render fields & system message using Form Builder library ?>

<div class="col-sm-6 col-sm-offset-3 form-box">
<?php echo $form->open(); ?>

	<fieldset>	
		<div class="form-top">
		    <div class="form-top-left">
		    <!--<h3>Tell us about you:</h3>
		    	 <p>Tell us about you:</p>  -->
		    </div>
		    <div class="form-top-right">
		    	<!-- <i class="fa fa-user">1</i>  -->
		    </div>
	    </div>
	    
	    <div class="form-bottom">
			<?php echo $form->messages(); ?>	
			<?php // echo $form->bs3_text('Student ID', 'student_id'); ?>
	
	<?php if ( !empty($registrations) ): ?>
		<div class="form-group">
			<label for="Students">Student</label>
			<div>
			<select name="student_id" id="student_id">
			<option value="">Select a Student</option>
			<?php foreach ($registrations as $student): ?>
				<option value="<?php echo $student->student_id; ?>"> <?php echo $student->student_id; ?> - <?php echo $student->first_name; ?> </option>
			<?php endforeach; ?>
			</select>
			</div>
		</div>
	<?php endif; ?>

			<?php if ( !empty($qualifications) ): ?>
				<div class="form-group">
					<label for="atcs">Highest Qualification</label>
					<div>
					<select name="highest_qualification" id="highest_qualification">
						<option value="">Choose Qualification</option>
					<?php foreach ($qualifications as $qualification): ?>
						<option value="<?php echo $qualification->category_code; ?>"> <?php echo $qualification->category_title; ?>  <?php echo $qualification->category_code; ?></option>
					<?php endforeach; ?>
					</select>
					</div>
				</div>
			<?php endif; ?>
			
			<?php echo $form->bs3_text('Maximim Marks', 'maximum_marks'); ?>
			<?php echo $form->bs3_text('Marks Obtained', 'obtained_marks'); ?>
			
				<div class="form-group">
					<label for="passing_year">Year of Passing</label>
						<input type='text' class="form-control" name="passing_year" id="passing_year"/>
						
						<script type="text/javascript">
						$( function() {
						    $( "#passing_year" ).datepicker({
						      changeMonth: true,
						      changeYear: true,
						      dateFormat: 'yy-mm-dd'
						    });
						  } );
						</script>
				</div>
				
			<?php echo $form->bs3_text('Institute Name', 'institute_name'); ?>
			<?php echo $form->bs3_text('Board / University', 'board_name'); ?>
                        <?php echo $form->bs3_file('Qualification Document', 'qualification_doc'); ?>
			
			<p><?php echo $form->field_recaptcha(); ?></p>
			<!-- <button type="button" class="btn btn-previous">Previous</button>  -->
			<?php echo $form->bs3_submit(); ?>
		</div>
	 		
	</fieldset>
	
<p>&nbsp;</p>

<?php echo $form->close(); ?>
