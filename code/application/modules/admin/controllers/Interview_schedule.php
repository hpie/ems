<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Cneter management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Interview_schedule  extends Admin_Controller {

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
		$crud = $this->generate_crud('job_interview_schedules');
	
		
		$crud->columns('job_code','department_code','center_code','interview_dt', 'interview_start_time', 'interview_end_time', 'interview_report_time', 
		               'job_last_dt', 'job_expire_dt', 'interview_close_time','interview_schedule_status','interview_schedule_comments', 'status');
		
		//Relation with Status
		$crud->set_relation('status','cdac_status','{status_title}-{status_code}',array('status_group' => 'GEN', 'status_mode' => 'A', 'status' => 'A'), 'status_code, status_title ASC');
		$crud->set_relation('department_code','ems_departments','{department_code}',array('1' => '1'), ' department_code ASC');
		$crud->set_relation('job_code','job_postings','{job_code}',array('job_last_dtd <' => date('Y-m-d')), ' job_code ASC');
		$crud->set_relation('center_code','job_interview_centers','{center_code}',array('1' => '1'), ' center_code ASC');
		//$crud->set_relation('center_state','cdac_states','{state_code}-{state_name}',array('status' => 'A'), 'state_code, state_name ASC');
		
		$crud->add_fields('job_code','department_code','center_code','interview_dt', 'interview_start_time', 'interview_end_time', 'interview_report_time', 
		                'interview_close_time','interview_schedule_status','interview_schedule_comments','status','created_by');

		$crud->edit_fields('job_code','department_code','center_code','interview_dt', 'interview_start_time', 'interview_end_time', 'interview_report_time', 
		               'job_last_dt', 'job_expire_dt', 'interview_close_time','interview_schedule_status','interview_schedule_comments', 'status','modified_by');
		
		//$crud->unset_delete();
		$state = $crud->getState();
    	$state_info = $crud->getStateInfo();
		
		if ($state == 'add' || $state == 'insert_validation' || $state == 'insert')
		{
			//Mandatory Feilds
			$crud->required_fields('center_code','center_title', 'center_description', 'center_address1', 'center_address2','center_city','center_state',
		 'center_zip', 'center_email', 'center_phone','center_contact_name','center_contact_designation');
				
			
			$crud->field_type('center_email', 'email', "");
			$crud->set_field_upload('job_ref_document','assets/uploads/files');
			//$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
			$crud->field_type('created_by', 'hidden', $this->mUser->username);
			//TODO
			// Make prospectus_number and mandatory if  enquiry_status == "P"
		}
		elseif ($state == 'edit' || $state == 'update_validation' || $state == 'update')
		{
			//Mandatory Feilds
			//$crud->required_fields('center_code','center_title', 'center_description', 'center_address1', 'center_address2','center_city','center_state',
		 //'center_zip', 'center_email', 'center_phone','center_contact_name','center_contact_designation');
			$crud->set_field_upload('job_ref_document','assets/uploads/files');
			//$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
			$crud->field_type('modified_by', 'hidden', $this->mUser->username);
		}
		$this->mPageTitle = 'Job Posting';
		$this->render_crud();
	}

	
}