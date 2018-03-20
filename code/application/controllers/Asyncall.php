<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asyncall extends MY_Controller {

	// Override 404 error
	// Match with $route['404_override'] value from /application/config/routes.php
	
	public function __construct()
	{
		parent::__construct();
		
		// only login users can access Account controller
		//$this->verify_login();
		
		//$this->load->library('form_builder');
		//$this->push_breadcrumb('Asyncall');
	}
	
	public function index()
	{
		redirect('asyncall/studentid/40');
	}
	
	public function studentid()
	{
		 $student_id = $this->input->get('term', TRUE);
    	//$countries = $this->autocomplete_model->get_areas($term);
    
		$this->load->model('common_model', 'registration');
		//$this->enrollments->get_field('student_id', 'first_name')->like('student_id', $studentid, 'after');
		//print_r($this->registration->getStudentId('40'));
		$records = $this->registration->getStudentId($student_id, '');
		//$availableId
		/*
		foreach ($records->result() as $row)
		{
	        echo $row->student_id;
	        echo ("<br />");
		}*/
		
		$output = json_encode($records->result());
		//print_r($output);
		echo $output;
	}
	
	public function page_missing()
	{
		$this->output->set_status_header('404');
		$this->mPageTitle = '404 Page Not Found';
		$this->render('errors/custom/error_404');
	}
}