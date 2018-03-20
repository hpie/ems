<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'CDAC Admin Panel',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/admin/adminlte.min.js',
			'assets/dist/admin/lib.min.js',
			'assets/dist/admin/app.min.js'
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/admin/adminlte.min.css',
			'assets/dist/admin/lib.min.css',
			'assets/dist/admin/app.min.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',
	
	// Multilingual settings
	'languages' => array(
	),

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),
		'panel' => array(
			'name'		=> 'Admin Panel',
			'url'		=> 'panel',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Admin Users'			=> 'panel/admin_user',
				'Create Admin User'		=> 'panel/admin_user_create',
				'Admin User Groups'		=> 'panel/admin_user_group',
			)
		),
		'center' => array(
			'name'		=> 'Interview Center',
			'url'		=> 'center',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'center',
			)
		),
		'Job Interveiw Schedule' => array(
			'name'		=> 'Interview Schedule',
			'url'		=> 'interview_schedule',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'interview_schedule',
			)
		),
		'Job Posting' => array(
			'name'		=> 'Job Posting',
			'url'		=> 'job_posting',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'job_posting',
			)
		),
		'Job Keywords' => array(
			'name'		=> 'Job Keyword',
			'url'		=> 'keyword',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'keyword',
			)
		),
		/*'atc' => array(
			'name'		=> 'ATC',
			'url'		=> 'atc',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'atc',
				'Courses of Atc' 	=> 'atc/course',
				'Email Templates' 	=> 'atc/emailTemplate',
			)
		),*/
		/*'book' => array(
			'name'		=> 'Book',
			'url'		=> 'book',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'book',
			)
		),
		'bookrequestlogs' => array(
			'name'		=> 'Book Request Logs',
			'url'		=> 'bookrequestlogs',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'My Requests'			=> 'bookrequestlogs/requestedByMe',
				'Requested to me'		=> 'bookrequestlogs/requestedToMe',
				'Student Book Logs'		=> 'bookrequestlogs/students',
			)
		),*/
		/*'category' => array(
			'name'		=> 'Category Codes',
			'url'		=> 'category',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'List'			=> 'category',
			)
		),*/
		'city' => array(
			'name'		=> 'City',
			'url'		=> 'city',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'city',
			)
		),
		/*'courier' => array(
				'name'		=> 'Courier Management',
				'url'		=> 'courier',
				'icon'		=> 'ion ion-edit',
				'children'  => array(
						'List'			=> 'courier',
				)
				
		),*/
		/*'course' => array(
			'name'		=> 'Course',
			'url'		=> 'couese',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'course',
				'Course Modules'	=> 'module',
			)
		),*/
		/*'cover_photo' => array(
			'name'		=> 'Cover Photos',
			'url'		=> 'cover_photo',
			'icon'		=> 'ion ion-image',	// can use Ionicons instead of FontAwesome
		),
		'faculty' => array(
			'name'		=> 'Faculty',
			'url'		=> 'faculty',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'List'			=> 'faculty',
				'Create'		=> 'faculty/create',
				'Faculty ATC'	=> 'faculty/center',
				'Faculty Course'	=> 'faculty/course',
			)
		),*/
//		'blog' => array(
//			'name'		=> 'Blog',
//			'url'		=> 'blog',
//			'icon'		=> 'ion ion-edit',	// can use Ionicons instead of FontAwesome
//			'children'  => array(
//				'Blog Posts'		=> 'blog/post',
//				'Blog Categories'	=> 'blog/category',
//				'Blog Tags'			=> 'blog/tag',
//			)
//		),
		/*'order' => array(
			'name'		=> 'Order',
			'url'		=> 'order',
			'icon'		=> 'ion ion-edit',
			'children'  => array(
				'CDAC Book Orders'			=> 'order/cdacBookOrders',
				'Ad-hoc Book Requests By Me'			=> 'order/bookRequestsByMe',
				'Ad-hoc Book Requests To Me'			=> 'order/bookRequestsToMe',
			)
				
		),*/
		
		/*'region' => array(
			'name'		=> 'Region Codes',
			'url'		=> 'region',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'List'			=> 'region',
			)
		),*/
		'status' => array(
			'name'		=> 'Status Codes',
			'url'		=> 'status',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'List'			=> 'status',
			)
		),
		'user' => array(
			'name'		=> 'Users',
			'url'		=> 'user',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'List'			=> 'user',
				'Create'		=> 'user/create',
				'User Groups'	=> 'user/group',
			)
		),
		
		'logout' => array(
			'name'		=> 'Sign Out',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
	),

	// Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'user/create'				=> array('webmaster', 'admin', 'manager'),
		'user/group'				=> array('webmaster', 'admin', 'manager'),
		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'	=> array('webmaster'),
		'panel/admin_user_group'	=> array('webmaster'),
		'util'						=> array('webmaster'),
		'util/list_db'				=> array('webmaster'),
		'util/backup_db'			=> array('webmaster'),
		'util/restore_db'			=> array('webmaster'),
		'util/remove_db'			=> array('webmaster'),
		'bookrequestlogs/requestedToMe'		=> array('webmaster','admin','manager'),
		'bookrequestlogs/requestedByMe'		=> array('webmaster','admin','manager','staff'),
		'bookrequestlogs/students'			=> array('webmaster','staff'),
		'order/cdacBookOrders'				=> array('webmaster','admin'),
		'order/bookRequestsToMe'			=> array('webmaster','manager'),
		'order/bookRequestsByMe'			=> array('webmaster','manager','staff'),
			
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-red',
			'admin'		=> 'skin-purple',
			'manager'	=> 'skin-black',
			'staff'		=> 'skin-blue',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Frontend Website',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		),
//		array(
//			'auth'		=> array('webmaster', 'admin'),
//			'name'		=> 'API Site',
//			'url'		=> 'api',
//			'target'	=> '_blank',
//			'color'		=> 'text-orange'
//		),
//		array(
//			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
//			'name'		=> 'Github Repo',
//			'url'		=> CI_BOOTSTRAP_REPO,
//			'target'	=> '_blank',
//			'color'		=> 'text-green'
//		),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_admin';