<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('cdac_cities');
		//$crud->columns('center_code', 'center_name', 'center_address_line1', 'center_address_line2', 'center_address_city', 'center_address_postcode', 'center_contact_number', 'center_type', 'center_code', 'active');
		$crud->columns('city_name', 'latitude', 'longitude', 'state_code', 'status');
		
		//$crud->set_relation('arc_address_state', 'cdac_states', 'state_name');
		//$crud->set_relation('arc_address_city', 'cdac_cities', 'city_name');
		
		$crud->set_relation('state_code','cdac_states','{state_code}-{state_name}',array('status' => 'A'), 'state_code, state_name ASC');
		
		
		//Show only in ADD
		$crud->add_fields('city_name', 'latitude', 'longitude', 'state_code', 'status');
		
		//Show only for Update
		$crud->edit_fields('city_name', 'latitude', 'longitude', 'state_code', 'status');
		
		$crud->required_fields('city_name', 'state_code', 'status');
	
		// disable direct create / delete Frontend User
		//$crud->unset_add();
		$crud->unset_delete();

		$this->mPageTitle = 'City';
		$this->render_crud();
	}
	
}
