<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('cdac_modules');
		//$crud->columns('center_code', 'center_name', 'center_address_line1', 'center_address_line2', 'center_address_city', 'center_address_postcode', 'center_contact_number', 'center_type', 'center_code', 'active');
		$crud->columns('module_code', 'module_name', 'module_duration', 'module_description', 'module_status');
		
		//$crud->set_relation('arc_address_state', 'cdac_states', 'state_name');
		//$crud->set_relation('arc_address_city', 'cdac_cities', 'city_name');
		
		//only webmaster and admin can change member groups
		//if ($crud->getState()=='list' || $this->ion_auth->in_group(array('webmaster', 'admin')))
		//{
			//$crud->set_relation_n_n('cdac_courses', 'cdac_course_modules', 'cdac_courses', 'module_code', 'course_code', 'course_name');
		//}
		
		//Relation with Category
		$crud->set_relation('module_duration','cdac_categories','{category_code}-{category_title}',array('category_type' => 'MOD-DUR', 'category_status' => 'A'), 'category_code ASC');
		
		//Relation with Status
		$crud->set_relation('module_status','cdac_status','{status_code}-{status_title}',array('status' => 'A',  'status_group' => 'GEN' ), 'status_code, status_title ASC');
		
		//Show only in ADD
		$crud->add_fields('module_code', 'module_name', 'module_duration', 'module_description', 'module_status');
		
		//Show only for Update
		$crud->edit_fields('module_name', 'module_description', 'module_duration', 'module_status');
		
		
		$state = $crud->getState();
    	$state_info = $crud->getStateInfo();
		
		if ($state == 'add' || $state == 'insert_validation' || $state == 'insert')
		{
			//Mandatory Feilds
			$crud->required_fields('module_code', 'module_name', 'module_duration', 'module_status');
			//$crud->getModel()->set_add_value('created_by', "system");	
			$crud->field_type('created_by', 'hidden', $this->mUser->username);
			//TODO
			// Make prospectus_number and mandatory if  enquiry_status == "P"
		}
		elseif ($state == 'edit' || $state == 'update_validation' || $state == 'update')
		{
			//Mandatory Feilds
			$crud->required_fields('module_name', 'module_duration', 'module_status');
			$crud->field_type('course_code', 'readonly');
			$crud->field_type('modified_by', 'hidden', $this->mUser->username);
		}
		else
		{
			//$this->_example_output($output);
		}
		
	
		// disable direct create / delete Frontend User
		//$crud->unset_add();
		$crud->unset_delete();

		$this->mPageTitle = 'CDAC Course Module';
		$this->render_crud();
	}
	
}
