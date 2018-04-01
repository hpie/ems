<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_interview_c extends Controllers {

	 public function __construct() {
       	sessionCheck();
        $this->job_posting_m = $this->loadModel('job_posting_m');
        $this->common_m = $this->loadModel('common_m');
        $this->department_m = $this->loadModel('department_m');
        $this->job_interview_m = $this->loadModel('job_interview_m');
       
        $this->status_m = $this->loadModel('status_m');
    }

	// Frontend User CRUD
	
	public function add() {
        $department = $this->department_m->getDepartment();
        $center =  $this->common_m->get('job_interview_centers') ;
        $job =  $this->job_posting_m->getjob() ;
      
        $status = $this->status_m->getstatus();
        $this->data['department'] = $department;
        $this->data['center'] = $center;
        $this->data['status'] = $status;
        $this->data['job'] = $job;
       
        $this->data['TITLE'] = 'Job Interview Schedule Add';
        loadview('admin/job_interview/', 'Add.php', $this->data);
    }

    public function insert() {
       
           
        $result = $this->common_m->insert('job_interview_schedules',$_POST);
        if ($result) {
            redirect(BASE_URL."job_interview/add");
        }
        else{
           redirect(BASE_URL."job_interview/add");
        }
    }


	 public function invoke() {
	 	 $Job_posting = $this->job_interview_m->getjob(); 
	 	 $this->data['result']= $Job_posting;
	 	 //print_r($Job_posting);
	 	   $this->data['TITLE'] = 'Job Schedule';
	 	 loadview('admin/job_interview/', 'job.php', $this->data);
       

       exit;
       }
	public function detail($id) {
	 	 $Job_posting = $this->job_interview_m->get_job_detail($id); 
	 	 $this->data['result']= $Job_posting;
	 	 //print_r($Job_posting);
	 	   $this->data['TITLE'] = 'Job Interview schedule Detail';
	 	 loadview('admin/job_interview/', 'detail.php', $this->data);
       

       exit;
       }
       public function edit($id) {
       $department = $this->department_m->getDepartment();
        $center =  $this->common_m->get('job_interview_centers') ;
        $job =  $this->job_posting_m->getjob() ;
        $Job_posting = $this->job_interview_m->get_job_detail($id); 
        $status = $this->status_m->getstatus();
        $this->data['result']= $Job_posting;
        $this->data['department'] = $department;
        $this->data['center'] = $center;
        $this->data['status'] = $status;
        $this->data['job'] = $job;
        $this->data['TITLE'] = 'Job Schedule Edit';
	 	 loadview('admin/job_interview/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){

       	$result = $this->job_interview_m->updateJob_posting($_POST, $id);
       redirect(BASE_URL."job_interview/index");
       }
	
}
