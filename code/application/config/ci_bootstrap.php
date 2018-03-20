<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | CI Bootstrap 3 Configuration
  | -------------------------------------------------------------------------
  | This file lets you define default values to be passed into views when calling
  | MY_Controller's render() function.
  |
  | Most of them can be overrided from child controllers, includes:
  | 	- $this->mSiteName
  | 	- $this->mPageTitlePrefix
  | 	- $this->mPageTitle
  | 	- $this->mBodyClass
  | 	- $this->mMetaData
  | 	- $this->mScripts
  | 	- $this->mStylesheets
  |	- $this->mMenu
  | 	- $this->mPageAuth
 */

$config['ci_bootstrap'] = array(

	/*
	| -------------------------------------------------------------------------
	| Common configuration
	| -------------------------------------------------------------------------
	| For both Frontend Website, Admin Panel and API Site
	*/

    // Site name
    'site_name' => 'CDAC GIST',
    // Default page title prefix
    'page_title_prefix' => 'CDAC-GIST - ',
    // Default page title
    // (set empty then MY_Controller will automatically generate one based on controller / action)
    'page_title' => '',
    // Default meta data
    // (name => content)
    'meta_data' => array(
        'author' => 'HPIE',
        'description' => 'CDAC GIST',
        'keywords' => 'PHP,CodeIgniter,CRUD'
    ),

    // Default scripts to embed at page head or end
    // (position => script array)
    'scripts' => array(
        'head' => array(
            //'assets/dist/frontend/lib.min.js',
            //'assets/dist/frontend/app.min.js',
            //'assets/dist/frontend/jquery-3.2.1.min.js',
            'assets/dist/frontend/jquery-2.2.4.min.js',
            'assets/dist/frontend/bootstrap.min.js',
            'assets/dist/frontend/moment-with-locales.min.js',
            //'assets/dist/frontend/bootstrap-datetimepicker.min.js',
            'assets/dist/frontend/jquery.backstretch.min.js',
            'assets/dist/frontend/jquery_plugins/ui/jquery-ui.min.js',
            'assets/js/grid.locale-en.js',
            'assets/js/jquery.jqGrid.min.js',
            'assets/js/jquery.layout.js',
            'assets/js/datepicker.min.js',
        ),
        'foot' => array(
            //'assets/dist/frontend/lib.min.js',
            //'assets/dist/frontend/app.min.js'
            'assets/dist/frontend/form-scripts.js'
        ),
    ),

    // Default stylesheets to embed at page head
    // (media => stylesheet array)
    'stylesheets' => array(
        'screen' => array(
            // for screen display
            //'assets/dist/frontend/lib.min.css',
            //'assets/dist/frontend/app.min.css',
            'assets/dist/frontend/bootstrap.min.css',
            //'assets/dist/frontend/bootstrap-datetimepicker.min.css',
            'assets/dist/frontend/modern-business.css',
            'assets/dist/frontend/form-elements.css',
            'assets/dist/frontend/form-style.css',
            'assets/dist/frontend/jquery_plugins/ui/jquery-ui.min.css',
            'assets/dist/frontend/jquery_plugins/ui/jquery-ui.theme.min.css',
            'assets/dist/frontend/jquery_plugins/ui/jquery-ui.structure.min.css',
            'assets/css/jquery-ui.css',
            'assets/css/ui.theme.css',
            'assets/css/ui.jqgrid.css',
            'assets/css/jquery.searchFilter.css',
            'assets/css/datepicker.css'
            
        ),
        'print' => array(
        // for print media
        )
    ),

    // Default CSS class for <body> tag
    'body_class' => '',

    // Multilingual settings (set empty array to disable this)
    'languages' => '',
    /* 'languages' => array(
      'default'		=> 'en',				// to decide which of the "available" languages should be used
      'autoload'		=> array('general'),	// language files to autoload
      'available'		=> array(				// availabe languages with names to display on site (e.g. on menu)
      'en' => array(						// abbr. value to be used on URL, or linked with database fields
      'label'	=> 'English',			// label to be displayed on language switcher
      'value'	=> 'english'			// to match with CodeIgniter folders inside application/language/
      ),
      'zh' => array(
      'label'	=> '繁體中文',
      'value'	=> 'traditional-chinese'
      ),
      'cn' => array(
      'label'	=> '简体中文',
      'value'	=> 'simplified-chinese'
      ),
      'es' => array(
      'label'	=> 'Español',
      'value' => 'spanish'
      )
      )
      ), */


    // Google Analytics User ID
    'ga_id' => 'UA-XXXXXXXX-X',

    // Menu items
    // (or directly update view file: /application/modules/admin/views/_partials/sidemenu.php)
    'menu' => array(
        //	'home' => array(
        //		'name'		=> 'Home',
        //		'url'		=> '',
        //		'icon'		=> 'fa fa-home',
        //	),
        'account' => array(
            'name' => 'My Account',
            'url' => 'account/',
            'icon' => 'fa fa-home',
        ),
        'atc' => array(
            'name' => 'ATC Actions',
            'url' => 'atc/',
            'icon' => 'fa fa-home',
            'children' => array(
                'Enquiry' => 'atc/enquiry',
                'Register' => 'atc/register',
                'Qualification' => 'atc/qualification',
                'Enroll' => 'atc/enroll',
                'List Courses' => 'atc/courses',
                'List Enquiries' => 'atc/enquiries',
                'List Enrollments' => 'atc/enrollments',
                'List Registrations' => 'atc/registrations',
                'List Documents' => 'atc/documents',
                'Book Issue Log' => 'atc/book_issue_log',
                'Faculty Register' => 'atc/faculty',
                'Faculty Qualification' => 'atc/facultyqualification',
                'List Faculty' => 'atc/facultylist',
                'List Faculty Documents' => 'atc/facultydocuments',
                'Couriers' => 'atc/couriers',
                'Attendance' => 'atc/attendance'
            )
        ),
        'arc' => array(
            'name' => 'ARC Actions',
            'url' => 'arc/',
            'icon' => 'fa fa-home',
            'children' => array(
                'List Enquiries' => 'arc/enquiries',
                'List Registrations' => 'arc/registrations',
                'List Enrollments' => 'arc/enrollments',
                'List ATCs' => 'arc/centers',
                'List Courses' => 'arc/courses',
                'List Documents' => 'arc/documents',
                'Book Issue Log' => 'arc/book_issue_log',
                'Couriers' => 'arc/couriers',
                'List Courses' => 'arc/courses',
                'Attendance' => 'arc/attendance'
            )
        ),
        'cdac' => array(
            'name' => 'CDAC Actions',
            'url' => 'cdac/',
            'icon' => 'fa fa-home',
            'children' => array(
                'List Enquiries' => 'cdac/enquiries',
                'List Registrations' => 'cdac/registrations',
                'List Enrollments' => 'cdac/enrollments',
                'List ATCs' => 'cdac/centers',
                'List Courses' => 'cdac/courses',
                'List Documents' => 'cdac/documents',
                'Book Issue Log' => 'cdac/book_issue_log',
                'Couriers' => 'cdac/couriers',
                'Attendance' => 'cdac/attendance'
            )
        ),
        'student' => array(
            'name' => 'Student Actions',
            'url' => 'student/',
            'icon' => 'fa fa-home',
            'children' => array(
                'Enquiries' => 'student/enquiries',
                'Registeration' => 'student/registrations',
                'Enrollments' => 'student/enrollments'
            )
        ),
        'auth' => array(
            'name' => 'Login / Logout',
            'url' => 'auth',
            'icon' => 'fa fa-users',
            'children' => array(
                'Login' => 'auth/login',
                'Sign Up' => 'auth/sign_up',
            )
        ),
        'admin' => array(
            'name' => 'Admin',
            'url' => 'admin/',
            'icon' => 'fa fa-home',
        ),
		
        'dashboard' => array(
            'name' => 'Blog',
            'url' => 'blog/',
            'icon' => 'fa fa-home',
            'children' => array(
                'List Blogs' => 'blog/blog_posts',
                'Carousel' => 'blog/carousel',
                'Form Basic' => 'blog/form_basic',
                'Form Bootstrap' => 'blog/form_bs3',
            )
        ),

//		'user' => array(
//			'name'		=> 'User',
//			'url'		=> 'user/',
//			'icon'		=> 'fa fa-home',
//			'children'  => array(
//				'Create User'			=> 'user/create',
//				'Grroup'		=> 'user/group',
//			)
//		),
//		'panel' => array(
//			'name'		=> 'Panel',
//			'url'		=> 'panel/',
//			'icon'		=> 'fa fa-home',
//			'children'  => array(
//				'Admin User'			=> 'panel/admin_user',
//				'Create Admin User'			=> 'panel/admin_user_create',
//				'Admin Grroup'		=> 'panel/admin_user_group',
//			)
//		),
    ),
    
    
    // Login page (to redirect non-logged-in users)
    'login_url' => 'auth/login',
    // Restricted pages to specific groups of users, which will affect sidemenu item as well
    // pages out of this array will have no restriction (except required admin user login)
    'page_auth' => array(
        // Example: Frontend Website pages for registered users
        'dashboard' => array('members'),
        'account' => array('members', 'arcusers', 'atcusers', 'atcteachers', 'atcstudents'),
        'ajax/studentid' => array('members', 'arcusers', 'atcusers', 'atcteachers', 'atcstudents'),
        'cdac/enquiries' => array('members'),
        'cdac/registrations' => array('members'),
        'cdac/enrollments' => array('members'),
        'cdac/centers' => array('members'),
        'cdac/courses' => array('members'),
        'cdac/arcs' => array('members'),
        'arc/enquiries' => array('arcusers'),
        'arc/registrations' => array('arcusers'),
        'arc/enrollments' => array('arcusers'),
        'arc/centers' => array('arcusers'),
        'atc/enquiry' => array('atcusers', 'atcteachers'),
        'atc/register' => array('atcusers', 'atcteachers'),
        'atc/enroll' => array('atcusers', 'atcteachers'),
        'atc/qualification' => array('atcusers', 'atcteachers'),
        'atc/courses' => array('atcusers', 'atcteachers'),
        'atc/enquiries' => array('atcusers', 'atcteachers'),
        'atc/registrations' => array('atcusers', 'atcteachers'),
        'student/enquiries' => array('atcstudents'),
        'student/registrations' => array('atcstudents'),
        'studentenrollments' => array('atcstudents'),
        // Example: Admin Panel pages for admin users
        'user/create' => array('webmaster', 'admin', 'manager'),
        'user/group' => array('webmaster', 'admin', 'manager'),
        'panel' => array('webmaster'),
        'panel/admin_user' => array('webmaster'),
        'panel/admin_user_create' => array('webmaster'),
        'panel/admin_user_group' => array('webmaster'),
    ),
    // Email config (to be used in MY_Email library)
    'email' => array(
        'from_email' => 'noreply@email.com',
        'from_name' => 'CI Bootstrap',
        'subject_prefix' => '[CI Bootstrap] ',
        // Mailgun HTTP API
        'mailgun_api' => array(
            'domain' => '',
            'private_api_key' => ''
        ),
    ),
    // Debug tools (available only when ENVIRONMENT = 'development')
    'debug' => array(
        'view_data' => FALSE, // whether to display MY_Controller's mViewData at page end
        'profiler' => FALSE // whether to display CodeIgniter's profiler at page end
    ),
    /*
      | -------------------------------------------------------------------------
      | Configuration for Admin Panel only
      | -------------------------------------------------------------------------
     */

    // AdminLTE settings
    // (admin user group => configuration, e.g. CSS class for skin)
    'adminlte' => array(
        'body_class' => array(
            'webmaster' => 'skin-red',
            'admin' => 'skin-purple',
            'manager' => 'skin-black',
            'staff' => 'skin-blue',
        )
    ),
    // Useful links to display at bottom of sidemenu (e.g. to pages outside Admin Panel)
    'useful_links' => array(
        array(
            'auth' => array('webmaster', 'admin', 'manager', 'staff'),
            'name' => 'Frontend Website',
            'url' => '',
            'target' => '_blank',
            'color' => 'text-aqua'
        ),
        array(
            'auth' => array('webmaster', 'admin'),
            'name' => 'API Site',
            'url' => 'api',
            'target' => '_blank',
            'color' => 'text-orange'
        ),
        array(
            'auth' => array('webmaster', 'admin', 'manager', 'staff'),
            'name' => 'Github Repo',
            'url' => CI_BOOTSTRAP_REPO,
            'target' => '_blank',
            'color' => 'text-green'
        ),
    ),
    /*
      | -------------------------------------------------------------------------
      | Configuration for API Site only
      | -------------------------------------------------------------------------
     */

    // Raw PHP Headers (e.g. enable CORS or not) to send at page start
    'headers' => array(
        'Access-Control-Allow-Origin: *',
        'Access-Control-Request-Method: GET, POST, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization',
    ),
);

/*
  | -------------------------------------------------------------------------
  | Override values from /application/config/config.php
  | -------------------------------------------------------------------------
 */

// Allow different modules to use different login sessions
$config['sess_cookie_name'] = 'ci_session_frontend';
