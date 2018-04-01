<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_interview_registration_c extends Controllers {

   public function __construct() {
        sessionCheck();
        $this->employee_m = $this->loadModel('job_interview_registration_m');
        $this->job_interview_m = $this->loadModel('job_interview_m');
        $this->job_m = $this->loadModel('job_posting_m');
        $this->common_m = $this->loadModel('common_m');
        $this->department_m = $this->loadModel('department_m');
        $this->states_m = $this->loadModel('states_m');
        $this->city_m = $this->loadModel('city_m');
        $this->status_m = $this->loadModel('status_m');
    }

  // Frontend User CRUD
  
  public function add() { 
        $department = $this->department_m->getDepartment();
        $emp = $this->employee_m->getemployee();
        $schedule = $this->job_interview_m->getjob();
        $states = $this->states_m->getState();
        $city = $this->city_m->getCity();
        $status = $this->status_m->getstatus();
        $job = $this->job_m->getjob();
        $this->data['job'] = $job;
        $this->data['schedule'] = $schedule;
        $this->data['emp'] = $emp;
        $this->data['department'] = $department;
        $this->data['status'] = $status;
        $this->data['states'] = $states;
        $this->data['city'] = $city;
        $this->data['TITLE'] = 'Registration';
        loadview('admin/job_interview_registrations/', 'Add.php', $this->data);
    }

    public function insert() {
       
        $result = $this->common_m->insert('ems_employees',$_POST);
        if ($result) {
            redirect(BASE_URL."admin/Job_interview_registrations/add");
        }
        else{
           redirect(BASE_URL."admin/Job_interview_registrations/add");
        }
    }


   public function invoke() {
     $emp = $this->employee_m->getemployee();

     $this->data['result']= $emp;
     $this->data['emp']= $emp;
     //print_r($Job_posting);
       $this->data['TITLE'] = 'Employee List';
     loadview('admin/Job_interview_registrations/', 'employee.php', $this->data);
       

       exit;
       }
  public function detail($id) {
     $emp = $this->employee_m->getEmployeedetail($id);
     $this->data['result']= $emp;
     //print_r($Job_posting);
       $this->data['TITLE'] = 'Employee Detail';
     loadview('admin/Job_interview_registrations/', 'detail.php', $this->data);

       exit;
       }
       public function edit($id) {
        $emp = $this->employee_m->getEmployeedetail($id);
        $department = $this->department_m->getDepartment();
        $states = $this->states_m->getState();
        $city = $this->city_m->getCity();
        $status = $this->status_m->getstatus();
        $job = $this->job_m->getjob();
        $this->data['job'] = $job;
        $this->data['result'] = $emp;
        $this->data['department'] = $department;
        $this->data['status'] = $status;
        $this->data['states'] = $states;
        $this->data['city'] = $city;
       $this->data['TITLE'] = 'Employee Edit';
     loadview('admin/Job_interview_registrations/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){
        $result = $this->employee_m->updateemployee($_POST, $id);
       redirect(BASE_URL."admin/Job_interview_registrations/index");
       }
  
}
