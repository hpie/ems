<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_posting_c extends Controllers {

	public function __construct() {
       	sessionCheck();
        $this->job_posting_m = $this->loadModel('job_posting_m');
        $this->common_m = $this->loadModel('common_m');
        $this->department_m = $this->loadModel('department_m');
        $this->states_m = $this->loadModel('states_m');
        $this->city_m = $this->loadModel('city_m');
        $this->status_m = $this->loadModel('status_m');
    }

	// Frontend User CRUD
	
	public function add() {
        $department = $this->department_m->getDepartment(); 
        $city = $this->city_m->getCity();
        $status = $this->status_m->getstatus();

        $this->data['department'] = $department;
        $this->data['status'] = $status;
        $this->data['city'] = $city;
        $this->data['TITLE'] = 'Job posting ADD';
        loadview('admin/job_posting/', 'Add.php', $this->data);
    }

    public function insert() {
        if (($_FILES['job_ref_document']['name'][0]) != '') {
            $image = multiImageUpload('job_ref_document');
             prePRINT($image);
            $str = '';
            foreach ($image as $row) {
                $str = $str . $row[2]['image_name'] . ',';
            }
            $image = substr($str, 0, -1);
            $_POST['product_image'] = $image;
            echo $image;
            exit;
        }
        print_r($_POST);
        exit;
        $result = $this->common_m->insert('job_postings',$_POST);
        if ($result) {
            redirect(BASE_URL."job_posting/add");
        }
        else{
           redirect(BASE_URL."job_posting/add");
        }
    }


	 public function invoke() {
	 	 $Job_posting = $this->job_posting_m->getjob(); 
	 	 $this->data['result']= $Job_posting;
	 	 //print_r($Job_posting);
	 	   $this->data['TITLE'] = 'Job posting';
	 	 loadview('admin/job_posting/', 'job.php', $this->data);
       

       exit;
       }
	public function detail($id) {
	 	 $Job_posting = $this->job_posting_m->get_job_detail($id); 
	 	 $this->data['result']= $Job_posting;
	 	 //print_r($Job_posting);
	 	   $this->data['TITLE'] = 'Job Posting Detail';
	 	 loadview('admin/job_posting/', 'detail.php', $this->data);
       

       exit;
       }
       public function applyuserview($id) {
	 	 $Job_posting = $this->job_posting_m->getSingleJobList($id);
               //echo"<pre>";  print_r($Job_posting);die;
                 $apply_user = $this->job_posting_m->get_apply_job_user_detail($Job_posting['job_code']);
//                 echo"<pre>";print_r($apply_user);die;
	 	 $this->data['result']= $apply_user;
	 	 //print_r($Job_posting);
	 	   $this->data['TITLE'] = 'Job Posting Detail';
	 	 loadview('admin/job_posting/', 'applyuserdetail.php', $this->data);
       

       exit;
       }
       public function edit($id) {
        $status = $this->status_m->getstatus();
        $this->data['status'] = $status;
        $department = $this->department_m->getDepartment(); 
        $this->data['department'] = $department;
	 	   $Job_posting = $this->job_posting_m->get_job_detail($id); 
	 	   $this->data['result']= $Job_posting;
	 	   $this->data['TITLE'] = 'Job posting Edit';
	 	 loadview('admin/job_posting/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){

       	$result = $this->job_posting_m->updateJob_posting($_POST, $id);
       redirect(BASE_URL."job_posting/index");
       }
	
}
