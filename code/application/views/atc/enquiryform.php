<?php // render fields & system message using Form Builder library ?>
<?php echo $form->open(); ?>

<div class="col-sm-6 col-sm-offset-3 form-box">
	<?php echo $form->messages(); ?>
	
	<fieldset>
	<?php echo $form->bs3_text('First Name', 'first_name'); ?>
	<?php echo $form->bs3_text('Last Name', 'last_name'); ?>
	
	<?php if ( !empty($atcs) ): ?>
			<div class="form-group">
				<label for="atcs">ATC</label>
				<div>
				<select name="atc_code" id="atc_code">
					<option value="">Choose an ATC</option>
				<?php foreach ($atcs as $atc): ?>
					<option value="<?php echo $atc->entity_code; ?>"> <?php echo $atc->entity_name; ?> </option>
				<?php endforeach; ?>
				</select>
				</div>
			</div>
			
	<?php endif; ?>
	
	<?php if ( !empty($courses) ): ?>
		<div class="form-group">
			<label for="courses">Intended Course</label>
			<div>
			<select name="intended_course" id="intended_course">
			<option value="">Choose a Course</option>
			<?php foreach ($courses as $course): ?>
				<option value="<?php echo $course->course_code; ?>"> <?php echo $course->course_name; ?> </option>
			<?php endforeach; ?>
				<option value="other"> Other </option>
			</select>
			</div>
			
			<script type="text/javascript">
				$("#intended_course").change(function() {
					var selVal = this.value;
					  if(selVal=="other")
					  {
						  $("#intended_course_other_div").show(500);
						  //alert(selVal);
					  }else
					  {
						  $("#intended_course_other_div").hide( 1000 );
						  //alert(selVal);  
					  }
				});
				</script>
				
		</div>
	<?php endif; ?>

		<div id="intended_course_other_div" class="form-group" style="display: none">
			<label for="centers">Other Course</label>
				<div>
					<input type="text" name="intended_course_other" value="" id="intended_course_other" class="form-control">
				</div>
				
		</div>
		
		<div class="form-group">
			<label for="enquiry_dt">Enquiry Date</label>
				<!-- <div class='input-group date' id='datetimepicker1'>  -->
			    	<input type='text' class="form-control" name="enquiry_dt" id="enquiry_dt"/>
						<!-- <span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>  -->
				<!-- </div>  -->
				<script type="text/javascript">
				$( function() {
				    $( "#enquiry_dt" ).datepicker({
				      changeMonth: true,
				      dateFormat: 'yy-mm-dd'
				    });
				  } );
				</script>
		</div>	
	
		<div class="form-group">
			<label for="centers">Enquiry Status</label>
				<div>
					<label class="checkbox-inline">
						Enquired <input type="radio" name="enquiry_status" value="E">
					</label>
					<label class="checkbox-inline">
						Prospectus Purchased <input type="radio" name="enquiry_status" value="P">
					</label>
				</div>
				
				<script type="text/javascript">
				$("input[type='radio']").click(function() {
					var selVal = $("input[name='enquiry_status']:checked").val();
					//alert(selVal);
					  if(selVal=="P")
					  {
						  $("#prospectus_number_div").show(500);
						  //alert(selVal);
					  }else
					  {
						  $("#prospectus_number_div").hide( 1000 );
						  //alert(selVal);  
					  }
				});
				</script>
		</div>
			
	<div id="prospectus_number_div" class="form-group" style="display: none">
			<label for="centers">Prospectus Number</label>
				<div>
					<input type="text" name="prospectus_number" value="" id="prospectus_number" class="form-control">
				</div>
				
	</div>
	
	<?php echo $form->bs3_Email('Email', 'enquiry_email'); ?>
	
	<?php echo $form->bs3_text('Phone', 'enquiry_phone'); ?>
	
	<?php echo $form->bs3_textarea('Notes', 'enquiry_notes'); ?>
            
	</fieldset>
	
	<p><?php echo $form->field_recaptcha(); ?></p>
	
	<?php echo $form->bs3_submit(); ?>
	
<p>&nbsp;</p>
</div>
<?php echo $form->close(); ?>

