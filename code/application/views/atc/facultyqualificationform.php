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

            <?php if (!empty($facultyData)){ ?>
                <div class="form-group">
                    <label for="Students">Faculty name</label>
                    <div>
                        <select name="faculty_id" id="faculty_id">
                            <option value="">Select  Faculty</option>
                            <?php foreach ($facultyData as $faculty): ?>
                                <option value="<?php echo $faculty['faculty_code']; ?>"> <?php echo $faculty['faculty_code']; ?> - <?php echo $faculty['first_name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php }else{ ?>
            <div class="alert alert-danger" role="alert">
                    <p>First you need to add faculty then add qualification</p></div>
            <?php } ?>

            <?php $qualifications = json_decode(facultyQualification,true);
            ?>
                <div class="form-group">
                    <label for="atcs">Highest Qualification</label>
                    <div>
                        <select name="highest_qualification" id="highest_qualification">
                            <option value="">Choose Qualification</option>
                            <?php foreach ($qualifications as $key=>$qualification): ?>
                                <option value="<?php echo $key; ?>"> <?php echo $qualification ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
         

            <?php echo $form->bs3_text('Maximim Marks', 'maximum_marks'); ?>
            <?php echo $form->bs3_text('Marks Obtained', 'obtained_marks'); ?>

            <div class="form-group">
                <label for="passing_year">Year of Passing</label>
                <input type='text' class="form-control" name="passing_year" id="passing_year"/>

                <script type="text/javascript">
                    $(function () {
                        $("#passing_year").datepicker({
                            changeMonth: true,
                            changeYear: true,
                            dateFormat: 'yy-mm-dd'
                        });
                    });
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
</div>