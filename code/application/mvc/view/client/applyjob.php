<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Apply on job</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo BASE_URL.'home/0'; ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Apply On Job</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end intro section -->
</div>
<!-- Page Header End -->
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-md-offset-2">                
                <div class="page-ads box">
                    <form class="form-ad" action="<?php echo INSERT_APLLY_JOB_LINK; ?>" method="post">
                        <input type="hidden" name="job_code" value="<?php echo $singleJob['job_code']; ?>">
                        <input type="hidden" name="department_code" value="<?php echo $singleJob['department_code']; ?>">
                        <div class="form-group is-empty">
                            <label class="control-label">First Name</label>
                            <input class="form-control" type="text" name="candicate_first_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Middle Name</label>
                            <input class="form-control" type="text" name="candicate_middle_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Last Name</label>
                            <input class="form-control" type="text" name="candicate_last_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">DOB</label>
                            <input class="form-control" placeholder="" type="date" name="candicate_dob" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Gender</label>
<!--                            <input class="form-control" type="text" name="candicate_gender" required="">-->
                            <select class="form-control" name="candicate_gender">
                                <option value="Male" >
                                    Male
                                </option>
                                <option value="Female">
                                    Female
                                </option>
                            </select>
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Father First Name</label>
                            <input class="form-control" type="text" name="father_first_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Father Middle Name</label>
                            <input class="form-control" type="text" name="father_middle_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Father Last Name</label>
                            <input class="form-control" type="text" name="father_last_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Mother First Name</label>
                            <input class="form-control" type="text" name="mother_first_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Mother Middle Name</label>
                            <input class="form-control" type="text" name="mother_middle_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Mother Last Name</label>
                            <input class="form-control" type="text" name="mother_last_name" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Phone</label>
                            <input class="form-control" type="number" maxlength="10" min="10" name="candicate_phone" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Email Address</label>
                            <input class="form-control" type="email" name="candicate_email" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Addhar Card No</label>
                            <input class="form-control" type="text" name="candicate_aadhaar" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Address1</label>
                            <textarea class="form-control" name="candicate_address1"></textarea>
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Address2</label>
                            <textarea class="form-control" name="candicate_address2"></textarea>
                            <span class="material-input"></span>
                        </div>
                        
                        <div class="form-group is-empty">
                            <label class="control-label">City</label>
                            <input class="form-control" placeholder="" type="text" name="candicate_city">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">State</label>
                            <input class="form-control" placeholder="" type="text" name="candicate_state" required="">
                            <span class="material-input"></span>
                        </div>
                         <div class="form-group is-empty">
                            <label class="control-label">Zip Code</label>
                            <input class="form-control" placeholder="" type="text" name="candicate_zip" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">CV Path</label>
                            <input class="form-control" placeholder="" type="text" name="cv_path" required="">
                            <span class="material-input"></span>
                        </div>
                        
                        
                    <input type="submit" class="btn btn-common" value="Apply job">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>