<div class="page-header" style="background: url(<?php echo CLIENT_ASSETS; ?>img/banner1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Job Details</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo BASE_URL.'home/0'; ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Job Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- end intro section -->
</div>
<!-- Page Header End -->
<section class="job-detail section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="header-detail">
                    <div class="header-content pull-left">
                        <h3><a href="<?php echo CLIENT_JOB_DETAILS_LINK.$singleJob['row_id']; ?>"><?php echo $singleJob['job_title']; ?></a></h3>
                        <p><span>Date Posted: <?php echo dateFormatterComma($singleJob['job_post_dt']); ?></span></p>
                        <p><strong class="price"><?php echo $singleJob['job_salary_range']; ?></strong></p>
                    </div>
                    <div class="detail-company pull-right text-right">
                        <div class="img-thum">
                            <img class="img-responsive" src="<?php echo CLIENT_ASSETS; ?>img/jobs/recent-job-detail.jpg" alt="">
                        </div>
                        <div class="name">
                            <h4>LemonKids LLC</h4>
                            <h5>New York, NY </h5>
                            <p>8 Current jobs openings</p>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="meta">
                            <span><a class="btn btn-border btn-sm" href="#"><i class="ti-email"></i> Email</a></span>
                            <span><a class="btn btn-border btn-sm" href="#"><i class="ti-info-alt"></i> Job Aleart</a></span>
                            <span><a class="btn btn-border btn-sm" href="#"><i class="ti-save"></i> Save This job</a></span>
                            <span><a class="btn btn-border btn-sm" href="#"><i class="ti-alert"></i> Report Abuse</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="content-area">
                    <div class="clearfix">
                        <div class="box">
                            <h4>Job Description</h4>
                            <?php echo $singleJob['job_description']; ?>
                            <h4>Qualification</h4>
                            <p>Minimum of 5 years creative experience in a graphic design studio or advertising ad agency environment is required. Qualified candidates for this role will possess the following education, experience and skills:</p>
                            <ul>
                                <li><i class="ti-check-box"></i>Demonstrated strong and effective verbal, written, and interpersonal communication skills</li>
                                <li><i class="ti-check-box"></i>Must be team-oriented, possess a positive attitude and work well with others</li>
                                <li><i class="ti-check-box"></i>Ability to prioritize and multi-task in a flexible, fast paced and challenging environment</li>
                            </ul>
                            <h4>Key responsibilities also include</h4>
                            <ul>
                                <li><i class="ti-check-box"></i>Provide technical health advice to Head of Country Programmes and field advisors at all key stages of the project management cycle including needs assessment.</li>
                                <li><i class="ti-check-box"></i>Technical strategy and design, implementation as well as sector specific monitoring and evaluation.</li>
                                <li><i class="ti-check-box"></i>This includes travel to field programmes as well as review of proposals, key reports and surveys prior to external submission.</li>
                            </ul>
                            <h4>Requirements</h4>
                            <ul>
                                <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.</li>
                                <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.
                                    Strongly prefer candidates with High School Diploma</li>
                            </ul>
                            <h4>Benefits</h4>
                            <ul>
                                <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.</li>
                                <li><i class="ti-check-box"></i>Strongly prefer candidates with High School Diploma</li>
                            </ul>
                            <a href="<?php echo APPLY_JOB_FORM_LINK.$singleJob['row_id']; ?>" class="btn btn-common">Apply for this Job Now</a>
                        </div>
                    </div>
                </div>
                <h2 class="medium-title">Related Jobs</h2>
                <div class="job-post-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="job-details.html"><img src="<?php echo CLIENT_ASSETS; ?>img/jobs/img-1.jpg" alt=""></a>
                                </div>
                                <div class="job-list-content">
                                    <h4><a href="job-details.html">We need a web designer</a><span class="full-time">Full-Time</span></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                                    <div class="job-tag">
                                        <div class="pull-left">
                                            <div class="meta-tag">
                                                <span><a href="browse-categories.html"><i class="ti-brush"></i>Art/Design</a></span>
                                                <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                                                <span><i class="ti-time"></i>60/Hour</span>
                                            </div>
                                        </div>
                                        <div class="pull-right">
                                            <div class="icon">
                                                <i class="ti-heart"></i>
                                            </div>
                                            <div class="btn btn-common btn-rm">Apply Job</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="job-details.html"><img src="<?php echo CLIENT_ASSETS; ?>img/jobs/img-2.jpg" alt=""></a>
                                </div>
                                <div class="job-list-content">
                                    <h4><a href="job-details.html">Front-end developer needed</a><span class="full-time">Full-Time</span></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                                    <div class="job-tag">
                                        <div class="pull-left">
                                            <div class="meta-tag">
                                                <span><a href="browse-categories.html"><i class="ti-desktop"></i>Technologies</a></span>
                                                <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                                                <span><i class="ti-time"></i>60/Hour</span>
                                            </div>
                                        </div>
                                        <div class="pull-right">
                                            <div class="icon">
                                                <i class="ti-heart"></i>
                                            </div>
                                            <div class="btn btn-common btn-rm">Apply Job</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-list">
                                <div class="thumb">
                                    <a href="job-details.html"><img src="<?php echo CLIENT_ASSETS; ?>img/jobs/img-3.jpg" alt=""></a>
                                </div>
                                <div class="job-list-content">
                                    <h4><a href="job-details.html">Software Enginner</a><span class="part-time">Part-Time</span></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                                    <div class="job-tag">
                                        <div class="pull-left">
                                            <div class="meta-tag">
                                                <span><a href="browse-categories.html"><i class="ti-desktop"></i>Technologies</a></span>
                                                <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                                                <span><i class="ti-time"></i>60/Hour</span>
                                            </div>
                                        </div>
                                        <div class="pull-right">
                                            <div class="icon">
                                                <i class="ti-heart"></i>
                                            </div>
                                            <div class="btn btn-common btn-rm">Apply Job</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <aside>
                    <div class="sidebar">
                        <div class="box">
                            <h2 class="small-title">Job Details</h2>
                            <ul class="detail-list">
                                <li>
                                    <a href="#">Job Id</a>
                                    <span class="type-posts"><?php echo $singleJob['job_code']; ?></span>
                                </li>
                                <li>
                                    <a href="#">Location</a>
                                    <span class="type-posts">New York, NY</span>
                                </li>
                                <li>
                                    <a href="#">Company</a>
                                    <span class="type-posts">LemonKids LLC</span>
                                </li>
                                <li>
                                    <a href="#">Type</a>
                                    <span class="type-posts">Private</span>
                                </li>
                                <li>
                                    <a href="#">Employment Status</a>
                                    <span class="type-posts">Permanent</span>
                                </li>
                                <li>
                                    <a href="#">Employment Type</a>
                                    <span class="type-posts">Manager</span>
                                </li>
                                <li>
                                    <a href="#">Positions</a>
                                    <span class="type-posts">5</span>
                                </li>
                                <li>
                                    <a href="#">Career Level</a>
                                    <span class="type-posts">Experience</span>
                                </li>
                                <li>
                                    <a href="#">Experience</a>
                                    <span class="type-posts">3 Years</span>
                                </li>
                                <li>
                                    <a href="#">Gender</a>
                                    <span class="type-posts">Male</span>
                                </li>
                                <li>
                                    <a href="#">Nationality</a>
                                    <span class="type-posts">United States</span>
                                </li>
                                <li>
                                    <a href="#">Degree</a>
                                    <span class="type-posts">Masters</span>
                                </li>
                            </ul>
                        </div>
                        <div class="box">
                            <h2 class="small-title">Featured Jobs</h2>
                            <div class="thumb">
                                <a href="#"><img src="<?php echo CLIENT_ASSETS; ?>img/jobs/features-img-1.jpg" alt="img"></a>
                            </div>
                            <div class="text-box">
                                <h4><a href="#">Web Development</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. maiores aperiam quam perspiciatis.</p>
                                <a href="#" class="text"><i class="fa fa-map-marker"></i>Moorgate, London</a>
                                <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </a>
                                <strong class="price"><i class="fa fa-money"></i>$4000 - $5000</strong>
                                <a href="#" class="btn btn-common btn-sm">Apply for this Job</a>
                            </div>
                        </div>
                        <div class="sidebar-jobs box">
                            <h2 class="small-title">Jobs Gallery</h2>
                            <ul>
                                <li>
                                    <a href="#">General Compliance Officer</a>
                                    <span><i class="fa fa-map-marker"></i>Arlington, VA </span>
                                    <span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
                                </li>
                                <li>
                                    <a href="#">Medical Transcrption</a>
                                    <span><i class="fa fa-map-marker"></i>San Francisco, CA</span>
                                    <span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
                                </li>
                                <li>
                                    <a href="#">Support Coordinator</a>
                                    <span><i class="fa fa-map-marker"></i>Moorgate, London</span>
                                    <span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
                                </li>
                                <li>
                                    <a href="#">General Compliance Officer</a>
                                    <span><i class="fa fa-map-marker"></i>Arlington, VA </span>
                                    <span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
                                </li>
                                <li>
                                    <a href="#">Medical Transcrption</a>
                                    <span><i class="fa fa-map-marker"></i>San Francisco, CA</span>
                                    <span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>