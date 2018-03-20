<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Cneter management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Center extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		 $this->load->library(array('email', 'form_builder'));
		 $this->load->helper('form');
		// $this->load->library('grocery_CRUD');
	
	}

	// Admin Center CRUD
	public function index()
	{
		
		//print_r($this->mUser);
		$crud = $this->generate_crud('job_interview_centers');
	
		
		$crud->columns('center_code','center_title',  'center_description', 'center_address1', 'center_address2', 'center_city', 'center_phone', 'center_email', 
		               'center_contact_name', 'status');
		
		//Relation with Status
		$crud->set_relation('status','cdac_status','{status_title}-{status_code}',array('status_group' => 'GEN', 'status_mode' => 'A', 'status' => 'A'), 'status_code, status_title ASC');
		$crud->set_relation('center_city','cdac_cities','{state_code}-{city_name}',array('status' => 'A'), 'state_code, city_name ASC');
		$crud->set_relation('center_state','cdac_states','{state_code}-{state_name}',array('status' => 'A'), 'state_code, state_name ASC');
		
		$crud->add_fields('center_code','center_title', 'center_description', 'center_address1', 'center_address2','center_city','center_state',
		 'center_zip', 'center_email', 'center_phone','center_contact_name','center_contact_designation','status','created_by');
		$crud->edit_fields('center_code','center_title', 'center_description', 'center_address1', 'center_address2','center_city','center_state',
		 'center_zip', 'center_email', 'center_phone','center_contact_name','center_contact_designation','status','modified_by');
		
		//$crud->unset_delete();
		$state = $crud->getState();
    	$state_info = $crud->getStateInfo();
		
		if ($state == 'add' || $state == 'insert_validation' || $state == 'insert')
		{
			//Mandatory Feilds
			$crud->required_fields('center_code','center_title', 'center_description', 'center_address1', 'center_address2','center_city','center_state',
		 'center_zip', 'center_email', 'center_phone','center_contact_name','center_contact_designation');
				
			//$crud->field_type('center_code', 'hidden', $center_code);
			$crud->field_type('center_email', 'email', "");
			$crud->field_type('created_by', 'hidden', $this->mUser->username);
			//TODO
			// Make prospectus_number and mandatory if  enquiry_status == "P"
		}
		elseif ($state == 'edit' || $state == 'update_validation' || $state == 'update')
		{
			//Mandatory Feilds
			$crud->required_fields('center_code','center_title', 'center_description', 'center_address1', 'center_address2','center_city','center_state',
		 'center_zip', 'center_email', 'center_phone','center_contact_name','center_contact_designation');
			$crud->field_type('entity_code', 'readonly');
			$crud->field_type('modified_by', 'hidden', $this->mUser->username);
		}
		$this->mPageTitle = 'Center';
		$this->render_crud();
	}

	
}

