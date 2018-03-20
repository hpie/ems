<script>
/*
	$( function() {
	    var cache = {};
	    $( "#student_id" ).autocomplete({
	      minLength: 2,
	      source: function( request, response ) {
	        var term = request.term;
	        if ( term in cache ) {
	          response( cache[ term ] );
	          return;
	        }
	 
	        $.getJSON( "asyncall/studentid/", request, function( data, status, xhr ) {
	          cache[ term ] = data;
	          response( data );
	        });
	      }
	    });
  } );
 */ 
  </script>
  
<?php // render fields & system message using Form Builder library ?>
<?php echo $form->open(); ?>

<div class="col-sm-6 col-sm-offset-3 form-box">
	<?php echo $form->messages(); ?>
	
	<fieldset>
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
	
	
	<?php if ( !empty($courses) ): ?>
		<div class="form-group">
			<label for="courses">Course</label>
			<div>
			<select name="course_code" id="course_code">
			<option value="">Choose a Course</option>
			<?php foreach ($courses as $course): ?>
				<option value="<?php echo $course->course_code; ?>"> <?php echo $course->course_name; ?> </option>
			<?php endforeach; ?>
			</select>
			</div>
		</div>
	<?php endif; ?>
	
		<div class="form-group">
			<label for="start_dt">Course Start Date</label>
			    <input type='text' class="form-control" name="start_dt" id="start_dt"/>
						
				<script type="text/javascript">
					$( function() {
					    $( "#start_dt" ).datepicker({
					      changeMonth: true,
					      dateFormat: 'yy-mm-dd'
					    });
					  } );
				</script>
		</div>	
		
		<div class="form-group">
			<label for="end_dt">Course End Date</label>
			    <input type='text' class="form-control" name="end_dt" id="end_dt"/>
						
				<script type="text/javascript">
					$( function() {
					    $( "#end_dt" ).datepicker({
					      changeMonth: true,
					      dateFormat: 'yy-mm-dd'
					    });
					  } );
				</script>
		</div>
		
		<?php if ( !empty($categories) ): ?>
		<div class="form-group">
			<label for="status">Enrollment Type</label>
			<div>
			<select name="enrollment_type" id="enrollment_type">
			<option value="">Choose a Type</option>
			<?php foreach ($categories as $category): ?>
				<option value="<?php echo $category->category_code; ?>"> <?php echo $category->category_title; ?> </option>
			<?php endforeach; ?>
			</select>
			</div>
		</div>
		<?php endif; ?>
	
		<?php if ( !empty($statuses) ): ?>
		<div class="form-group">
			<label for="status">Status</label>
			<div>
			<select name="status" id="status">
			<option value="">Choose a Status</option>
			<?php foreach ($statuses as $status): ?>
				<option value="<?php echo $status->status_code; ?>"> <?php echo $status->status_title; ?> </option>
			<?php endforeach; ?>
			</select>
			</div>
		</div>
	<?php endif; ?>
	
	<!-- send SMS   -->
	<!--  add notes -->
	<!-- deduct Fees -->
	<!-- deduct Books -->
	
	<?php echo $form->bs3_textarea('Notes', 'enquiry_notes'); ?>
	
	</fieldset>
	
	<p><?php echo $form->field_recaptcha(); ?></p>
	
	<?php echo $form->bs3_submit(); ?>
	
<p>&nbsp;</p>
</div>
<?php echo $form->close(); ?>

