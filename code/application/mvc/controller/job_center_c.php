<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_center_c extends Controllers {

	 public function __construct() {
       	sessionCheck();
        $this->job_center_m = $this->loadModel('job_center_m');
        $this->common_m = $this->loadModel('common_m');
        $this->department_m = $this->loadModel('department_m');
        $this->states_m = $this->loadModel('states_m');
        $this->city_m = $this->loadModel('city_m');
        $this->status_m = $this->loadModel('status_m');
    }

	// Frontend User CRUD
	
	public function add() { 
        $states = $this->states_m->getState();
        $city = $this->city_m->getCity();
        $status = $this->status_m->getstatus();
        $this->data['status'] = $status;
        $this->data['states'] = $states;
        $this->data['city'] = $city;
        $this->data['TITLE'] = 'Job Center Add';
        loadview('admin/job_center/', 'Add.php', $this->data);
    }

    public function insert() {
       
        $result = $this->common_m->insert('job_interview_centers',$_POST);
        if ($result) {
            redirect(BASE_URL."job_center/add");
        }
        else{
           redirect(BASE_URL."job_center/add");
        }
    }


	 public function invoke() {
	 	 $Job_center = $this->job_center_m->getcenter(); 
	 	 $this->data['result']= $Job_center;
	 	 //print_r($Job_posting);
	 	   $this->data['TITLE'] = 'Job Center';
	 	 loadview('admin/job_center/', 'center.php', $this->data);
       

       exit;
       }
	public function detail($id) {
	 	 $Job_center = $this->job_center_m->get_center_detail($id); 
	 	 $this->data['result']= $Job_center;
	 	 //print_r($Job_posting);
	 	   $this->data['TITLE'] = 'Job Posting Detail';
	 	 loadview('admin/job_center/', 'detail.php', $this->data);
       

       exit;
       }
       public function edit($id) {
         $Job_center = $this->job_center_m->get_center_detail($id); 
         $this->data['result']= $Job_center;
         $states = $this->states_m->getState();
        $city = $this->city_m->getCity();
        $status = $this->status_m->getstatus();
        $this->data['status'] = $status;
        $this->data['states'] = $states;
        $this->data['city'] = $city;
	 	   $this->data['TITLE'] = 'Job posting Edit';
	 	 loadview('admin/job_center/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){

       	$result = $this->job_center_m->update_center($_POST, $id);
       redirect(BASE_URL."job_center/index");
       }
	
}
