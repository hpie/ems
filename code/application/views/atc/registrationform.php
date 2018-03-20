<?php // render fields & system message using Form Builder library ?>

<div class="col-sm-6 col-sm-offset-3 form-box">
<?php echo $form->open(); ?>

	<fieldset>	
		<div class="form-top">
		    <div class="form-top-left">
		    <h3>Tell us about you:</h3>
		    	<!-- <p>Tell us about you:</p>  -->
		    </div>
		    <div class="form-top-right">
		    	<i class="fa fa-user">1</i>
		    </div>
	    </div>
	    
	    <div class="form-bottom">
			<?php echo $form->messages(); ?>	
			<?php // echo $form->bs3_text('Student ID', 'student_id'); ?>
			<?php echo $form->bs3_text('First Name', 'first_name'); ?>
			<?php echo $form->bs3_text('Middle Name', 'middle_name'); ?>
			<?php echo $form->bs3_text('Last Name', 'last_name'); ?>
			
				<div class="form-group">
					<label for="centers">Gender</label>
						<div>
							<label class="checkbox-inline">
								Male <input type="radio" name="gender" value="M">
							</label>
							<label class="checkbox-inline">
								Female <input type="radio" name="gender" value="F">
							</label>
							<label class="checkbox-inline">
								Other <input type="radio" name="gender" value="O">
							</label>
						</div>
				</div>
				
			<?php echo $form->bs3_text('Phone', 'contact_phone'); ?>
			<?php echo $form->bs3_Email('Email', 'registered_email'); ?>
		
			
				<div class="form-group">
					<label for="date_of_birth">Date of Birth</label>
						
					    	<input type='text' class="form-control" name="date_of_birth" id="date_of_birth"/>
						
						<script type="text/javascript">
						$( function() {
						    $( "#date_of_birth" ).datepicker({
						      changeMonth: true,
						      changeYear: true,
						      dateFormat: 'yy-mm-dd'
						    });
						  } );
						</script>
				</div>
				
				<button type="button" class="btn btn-next">Next</button>
		 </div>	 		
	</fieldset>
	
	<fieldset>
		<div class="form-top">
		    <div class="form-top-left">
		    <h3>Abuot your family:</h3>
		    	<!-- <p>Abuot your family:</p> -->
		    </div>
		    <div class="form-top-right">
		    	<i class="fa fa-user">2</i>
		    </div>
	    </div>
	    
	    <div class="form-bottom">
		<?php echo $form->bs3_text('Father First Name', 'father_first_name'); ?>
		<?php echo $form->bs3_text('Father Middle Name', 'father_middle_name'); ?>
		<?php echo $form->bs3_text('Father Last Name', 'father_last_name'); ?>
	
		<?php echo $form->bs3_text('Mother First Name', 'mother_first_name'); ?>
		<?php echo $form->bs3_text('Mother Middle Name', 'mother_middle_name'); ?>
		<?php echo $form->bs3_text('Mother Last Name', 'mother_last_name'); ?>
		
		<button type="button" class="btn btn-previous">Previous</button>
		<button type="button" class="btn btn-next">Next</button>
		</div>	
	</fieldset>
		
	<fieldset>
		<div class="form-top">
		    <div class="form-top-left">
		    <h3>Where you live:</h3>
		    	<!--  <p>Where you live:</p>  -->
		    </div>
		    <div class="form-top-right">
		    	<i class="fa fa-user">3</i>
		    </div>
	    </div>
	    
	    <div class="form-bottom">
	    
		<?php echo $form->bs3_text('Address 1', 'current_address_line1'); ?>
		<?php echo $form->bs3_text('Address 2', 'current_address_line2'); ?>
		<?php echo $form->bs3_text('City', 'current_address_city'); ?>
		<?php echo $form->bs3_text('Distt.', 'current_address_dist'); ?>
		<?php echo $form->bs3_text('State', 'current_address_state'); ?>
		<?php echo $form->bs3_text('Post Code', 'current_address_pincode'); ?>
	
		<button type="button" class="btn btn-previous">Previous</button>
		<button type="button" class="btn btn-next">Next</button>
		</div>
	</fieldset>
	
	<fieldset>
		<div class="form-top">
		    <div class="form-top-left">
		    <h3>Where you are from:</h3>
		    	<!-- <p>Where you are from:</p>  -->
		    </div>
		    <div class="form-top-right">
		    	<i class="fa fa-user">4</i>
		    </div>
	    </div>
	    
	    <div class="form-bottom">
 		
 		<div class="form-group">
			<label for="centers">Same as Current Address</label>
				<div>
					<label class="checkbox-inline">
						<input type="checkbox" name="sameascurr" value="Y">
					</label>
				</div>
				
				<script type="text/javascript">
				$("input[type='checkbox']").click(function() {
					var selVal = $("input[name='sameascurr']:checked").val();
					alert(selVal);
					  if(selVal=="Y")
					  {
						  $("#permanent_address_line1").val($("#current_address_line1").val());
						  $("#permanent_address_line2").val($("#current_address_line2").val());
						  $("#permanent_address_city").val($("#current_address_city").val());
						  $("#permanent_address_dist").val($("#current_address_dist").val());
						  $("#permanent_address_state").val($("#current_address_state").val());
						  $("#permanent_address_pincode").val($("#current_address_pincode").val());
						  //alert(selVal);
					  }else
					  {
						  $("#prospectus_number_div").hide( 1000 );
						  //alert(selVal);  
					  }
				});
				</script>
		</div>
		
		<?php echo $form->bs3_text('Address 1', 'permanent_address_line1'); ?>
		<?php echo $form->bs3_text('Address 2', 'permanent_address_line2'); ?>
		<?php echo $form->bs3_text('City', 'permanent_address_city'); ?>
		<?php echo $form->bs3_text('Distt.', 'permanent_address_dist'); ?>
		<?php echo $form->bs3_text('State', 'permanent_address_state'); ?>
		<?php echo $form->bs3_text('Post Code', 'permanent_address_pincode'); ?>
	
		<button type="button" class="btn btn-previous">Previous</button>
		<button type="button" class="btn btn-next">Next</button>
		</div>
	</fieldset>
	
	<fieldset>
		<div class="form-top">
		    <div class="form-top-left">
		    <h3>Your assciation with us:</h3>
		    	<!-- <p>Your assciation with us:</p>  -->
		    </div>
		    <div class="form-top-right">
		    	<i class="fa fa-user">5</i>
		    </div>
	    </div>
	    
	    <div class="form-bottom">
		<?php if ( !empty($atcs) ): ?>
			<div class="form-group">
				<label for="atcs">ATC Opted</label>
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
	
		<div class="form-group">
			<label for="admission_dt">Registration Date</label>
				 <!-- <div class='input-group date' id='admission_datetimepicker'>  -->
			    	<input type='text' class="form-control" name="admission_dt" id="admission_dt"/>
						<!-- <span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>  -->
				<!-- </div>  -->
				<script type="text/javascript">
				$( function() {
				    $( "#admission_dt" ).datepicker({
				      changeMonth: true,
				      changeYear: true,
				      dateFormat: 'yy-mm-dd'
				      });
				  } );
				</script>
		</div>	
	
		<div class="form-group">
			<label for="centers">Registration Status</label>
				<div>
					<select name="student_status" id="student_status">
						<option value="">-- Choose a Value --</option>
						<option value="E">Registered</option>
						<option value="P">Pending</option>
					</select>
				</div>
		</div>
		
	
	<?php echo $form->bs3_textarea('Remarks', 'message'); ?>
	
	
	<p><?php echo $form->field_recaptcha(); ?></p>
	<button type="button" class="btn btn-previous">Previous</button>
	<?php echo $form->bs3_submit(); ?>
	</div>
	</fieldset>
	
<p>&nbsp;</p>

<?php echo $form->close(); ?>

</div>


