<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * For Blog purpose only
 */
class Center extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// only login users can access Account controller
		$this->verify_login();
		//$this->load->library('form_builder');
		$this->load->library('grocery_CRUD');
		$this->push_breadcrumb('Cdac');
		//parent::__construct();
		$this->load->model('Account_model','accounts');
		// only login users can access Account controller
		$this->verify_login();
	}

	public function index() {		
			$data['data'] =$this->db->query('SELECT * FROM job_interview_centers')->result();
			$this->load->view('Center/index.php',$data);
	}

	public function view($id) {		
			$query = 'SELECT * FROM job_interview_centers';  	
			$query .= ' LEFT JOIN cdac_cities ON  job_interview_centers.center_city = cdac_cities.city_id';  	
			$query .= ' LEFT JOIN cdac_status ON  job_interview_centers.status = cdac_status.status_code'; 
			$query .= ' Where center_code="'.$id.'"';
			$data['data'] =$this->db->query($query)->result();
			$this->load->view('Center/view.php',$data);
	}
	
    /*
    *   End attendance section
    */
}
