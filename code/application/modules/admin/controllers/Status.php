<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('cdac_status');
		//$crud->columns('center_code', 'center_name', 'center_address_line1', 'center_address_line2', 'center_address_city', 'center_address_postcode', 'center_contact_number', 'center_type', 'center_code', 'active');
		$crud->columns('status_code', 'status_title', 'status_group', 'status_mode', 'status_description');
		
		//Show only in ADD
		$crud->add_fields('status_code', 'status_title', 'status_group', 'status_mode', 'status_description');
		
		//Show only for Update
		$crud->edit_fields('status_title', 'status_mode', 'status_description');
		
		$crud->required_fields('status_code', 'status_title');
	
		$crud->field_type('status_group','dropdown',
			array('ATC-STS' => 'ATC Status', 'FAC-STS' => 'Faculty Status', 'GEN' => 'General','ORD-STS' => 'Order Status' , 'ORD-RES' => 'Order Reasons', 'ORD-WRK' => 'Order Workflow', 'STU-STS' => 'Student Status'));
		
		$crud->field_type('status_mode','dropdown',
			array('A' => 'All', 'C' => 'Show in Create','E' => 'Show in Edit'));
			
		// disable direct create / delete Frontend User
		//$crud->unset_add();
		$crud->unset_delete();

		$this->mPageTitle = 'Status Codes';
		$this->render_crud();
	}
	
}
