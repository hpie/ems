<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="author" content="CDAC">

        <title><?php echo $TITLE; ?></title>    
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo CLIENT_ASSETS; ?>img/favicon.png">
        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>css/bootstrap.min.css" type="text/css">    
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>css/jasny-bootstrap.min.css" type="text/css">  
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>css/bootstrap-select.min.css" type="text/css">  
        <!-- Material CSS -->
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>css/material-kit.css" type="text/css">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>fonts/font-awesome.min.css" type="text/css"> 
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>fonts/themify-icons.css"> 

        <!-- Animate CSS -->
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>extras/animate.css" type="text/css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>extras/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>extras/owl.theme.css" type="text/css">
        <!-- Rev Slider CSS -->
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>extras/settings.css" type="text/css"> 
        <!-- Slicknav js -->
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>css/slicknav.css" type="text/css">
        <!-- Main Styles -->
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>css/main.css" type="text/css">
        <!-- Responsive CSS Styles -->
        <link rel="stylesheet" href="<?php echo CLIENT_ASSETS; ?>css/responsive.css" type="text/css">
        <!-- Color CSS Styles  -->
        <link href="<?php  echo CLIENT_ASSETS; ?>extras/summernote.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CLIENT_ASSETS; ?>css/colors/red.css" media="screen" />
        <link href="<?php echo CLIENT_ASSETS; ?>css/loginpopup.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>assets/pnotify/dist/pnotifiadmin.css" rel="stylesheet"> 
        
        
        <!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">-->
         
        <!--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">-->
        
        <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
        <!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
        <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
        
    </head>
    <body>                      
        <!-- Header Section Start -->
        <div class="header">    
            <!-- Start intro section -->
            <section id="intro" class="section-intro">
                <div class="logo-menu">
                    <nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand logo" href="<?php echo BASE_URL.'0'; ?>"><img src="<?php echo CLIENT_ASSETS; ?>img/logo.png" alt=""></a>
                            </div>

                            <div class="collapse navbar-collapse" id="navbar">              
                                <!-- Start Navigation List -->
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a class="active" href="<?php echo BASE_URL.'0'; ?>">
                                            Home
                                        </a>                                        
                                    </li>
                                    <?php
                                    if(isset($_SESSION['user_type'])){
                                        if($_SESSION['user_type']=='Employee'){
                                    ?>
                                    <li>
                                        <a href="#">
                                            Employee <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="browse-jobs.html">
                                                    Browse Jobs
                                                </a>
                                            </li>
                                            <li>
                                                <a href="browse-categories.html">
                                                    Browse Categories
                                                </a>
                                            </li>
                                            <li>
                                                <a href="add-resume.html">
                                                    Add Resume
                                                </a>
                                            </li>
                                            <li>
                                                <a href="manage-resumes.html">
                                                    Manage Resumes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="job-alerts.html">
                                                    Job Alerts
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php
                                    }                                   
                                    if($_SESSION['user_type']=='Department'){
                                    ?>
                                    <li>
                                        <a href="#">
                                            Department <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="<?php echo CLIENT_POST_JOB_LINK; ?>">
                                                    Add Job
                                                </a>
                                            </li>
                                            <li>
                                                <a href="manage-jobs.html">
                                                    Manage Jobs
                                                </a>
                                            </li>
                                            <li>
                                                <a href="manage-applications.html">
                                                    Manage Applications
                                                </a>
                                            </li>
                                            <li>
                                                <a href="browse-resumes.html">
                                                    Browse Resumes
                                                </a>
                                            </li>
                                        </ul>
                                    </li> 
                                    <?php
                                    }
                                    }
                                    ?>
                                </ul>
                                <ul class="nav navbar-nav navbar-right float-right">
                                    <?php
                                    if(isset($_SESSION['user_id'])){
                                        ?>
                                    <li class="right"><a href="<?php echo CLIENT_LOGOUT_LINK; ?>"><i class="ti-lock"></i>  Logout</a></li>
                                    <?php
                                    }
                                    else{
                                        ?>
                                    <li class="right"><a href="<?php echo CLIENT_LOGIN_FORM_LINK; ?>"><i class="ti-lock"></i>  Log In</a></li>
                                    <?php
                                    }
                                    if(isset($_SESSION['user_type'])){
                                        if($_SESSION['user_type']=='Department'){
                                        ?>
                                    <li class="left"><a href="<?php echo CLIENT_POST_JOB_LINK; ?>"><i class="ti-pencil-alt"></i> Post A Job</a></li>
                                    <?php
                                    }}
                                    ?>                                                                                                           
                                </ul>
                            </div>                           
                        </div>
                        <!-- Mobile Menu Start -->
                        <ul class="wpb-mobile-menu">
                            <li>
                                <a class="active" href="index.html">Home</a>
                                <ul>
                                    <li><a class="active" href="index.html">Home 1</a></li>
                                    <li><a href="index-02.html">Home 2</a></li>
                                    <li><a href="index-03.html">Home 3</a></li>
                                    <li><a href="index-04.html">Home 4</a></li>
                                </ul>                       
                            </li>
                            <li>
                                <a href="about.html">Pages</a>
                                <ul>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="job-page.html">Job Page</a></li>
                                    <li><a href="job-details.html">Job Details</a></li>
                                    <li><a href="resume.html">Resume Page</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="pricing.html">Pricing Tables</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">For Candidates</a>
                                <ul>
                                    <li><a href="browse-jobs.html">Browse Jobs</a></li>
                                    <li><a href="browse-categories.html">Browse Categories</a></li>
                                    <li><a href="add-resume.html">Add Resume</a></li>
                                    <li><a href="manage-resumes.html">Manage Resumes</a></li>
                                    <li><a href="job-alerts.html">Job Alerts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">For Employers</a>
                                <ul>
                                    <li><a href="post-job.html">Add Job</a></li>
                                    <li><a href="manage-jobs.html">Manage Jobs</a></li>
                                    <li><a href="manage-applications.html">Manage Applications</a></li>
                                    <li><a href="browse-resumes.html">Browse Resumes</a></li>
                                </ul>
                            </li> 
                            <li>
                                <a href="blog.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html">Blog - Right Sidebar</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
                                    <li><a href="blog-full-width.html">Blog - Full Width</a></li>
                                    <li><a href="single-post.html">Blog Single Post</a></li>
                                </ul>
                            </li>  
                            <li class="btn-m"><a href="post-job.html"><i class="ti-pencil-alt"></i> Post A Job</a></li>
                            <li class="btn-m"><a href="my-account.html"><i class="ti-lock"></i>  Log In</a></li>          
                        </ul>
                        <!-- Mobile Menu End --> 
                    </nav>
                </div>