<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Post A Job</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo BASE_URL.'home/0'; ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Post A Job</li>
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
                    <form class="form-ad" action="<?php echo CLIENT_INSERT_POST_JOB_LINK; ?>" method="post">
                        <div class="form-group is-empty">
                            <label class="control-label">Job Title</label>
                            <input class="form-control" type="text" name="job_title" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description</label>
                        </div>
                        <section id="editor">
                            <textarea id="summernote" name="job_description"></textarea>                           
                        </section>
                        <div class="form-group is-empty">
                            <label class="control-label">Sallery Range</label>
                            <input class="form-control" placeholder="e.g. ₹15,000 - ₹20,000 Per Month/Year" type="text" name="job_salary_range">
                            <span class="material-input"></span>
                        </div>   
                        <div class="form-group is-empty">
                            <label class="control-label">Document</label>
                            <input class="form-control" placeholder="" type="text" name="job_ref_document">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Post Date</label>
                            <input class="form-control" placeholder="" type="date" name="job_post_dt" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Last Date</label>
                            <input class="form-control" placeholder="" type="date" name="job_last_dt" required="">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">Expire Date</label>
                            <input class="form-control" placeholder="" type="date" name="job_expire_dt" required="">
                            <span class="material-input"></span>
                        </div>
                    <input type="submit" class="btn btn-common" value="Submit your job">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>