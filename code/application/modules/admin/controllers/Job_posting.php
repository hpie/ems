<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Cneter management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Job_posting  extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		 $this->load->library(array('email', 'form_builder'));
		 $this->load->helper('form');
		 $this->load->library('upload');
		$this->load->library('grocery_CRUD');
	    
	}

	// Admin Center CRUD
	public function index()
	{
		
		//print_r($this->mUser);
		$crud = new grocery_CRUD();

		$crud->set_theme('cdac_ems');
		$crud->set_table('job_postings');
		$crud = $this->generate_crud('job_postings');
	
		
		$crud->columns('job_code','department_code',  'job_title', 'job_description', 'job_ref_document', 'job_post_dt', 'job_last_dt', 'job_expire_dt', 
		               'job_status', 'status');
		
		//Relation with Status
		$crud->set_relation('status','cdac_status','{status_title}-{status_code}',array('status_group' => 'GEN', 'status_mode' => 'A', 'status' => 'A'), 'status_code, status_title ASC');
		$crud->set_relation('department_code','ems_departments','{department_code}',array('1' => '1'), ' department_code ASC');
		$crud->set_relation('job_keyword','job_keyword','{title}',array('1' => '1'), 'key_id, title ASC');
		
		$crud->add_fields('job_code','department_code',  'job_title', 'job_description', 'job_ref_document','job_type', 'job_keyword','job_post_dt', 'job_last_dt', 'job_expire_dt', 
		               'job_status', 'status','created_by');
		$crud->edit_fields('job_code','department_code',  'job_title', 'job_description', 'job_ref_document','job_type', 'job_keyword', 'job_post_dt', 'job_last_dt', 'job_expire_dt', 
		               'job_status', 'status','modified_by');
		
		//$crud->unset_delete();
		$state = $crud->getState();
    	$state_info = $crud->getStateInfo();
		
		if ($state == 'add' || $state == 'insert_validation' || $state == 'insert')
		{
			
			$crud->field_type('created_by', 'hidden', $this->mUser->username);
			
		}
		elseif ($state == 'edit' || $state == 'update_validation' || $state == 'update')
		{
			$crud->set_field_upload('job_ref_document','assets/uploads/files');
			$crud->field_type('modified_by', 'hidden', $this->mUser->username);
		}
		$this->mPageTitle = 'Job Posting';
		$this->render_crud();
	}

	public function multi_upload()
{
	$this->load->library('Grocery_CRUD_Multiuploader');
   $crud = new Grocery_CRUD_Multiuploader(); 
   $crud->set_table('job_postings');
   $crud->where('status', 1);   
   
   $config = array(
        /* Destination directory */
        "path_to_directory" =>'assets/',

       /* Allowed upload type */
      "allowed_types" =>'gif|jpeg|jpg|png',

      /* Show allowed file types while editing ? */
      "show_allowed_types" => true,

     /* No file text */
     "no_file_text" =>'No Pictures',

     /* enable full path or not for anchor during list state */
     "enable_full_path" => false,

     /* Download button will appear during read state */
     "enable_download_button" => true,

     /* One can restrict this button for specific types...*/
    "download_allowed" => 'jpg'
  );

  $crud->new_multi_upload("job_ref_document",$config);
  
  $output = $crud->render();
  $this->_example_output($output);
}
}