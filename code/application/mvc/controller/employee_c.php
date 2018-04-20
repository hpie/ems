F<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employee_c extends Controllers {

	 public function __construct() {
       	sessionCheck();
        $this->employee_m = $this->loadModel('employee_m');
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
        $states = $this->states_m->getState();
        $city = $this->city_m->getCity();
        $status = $this->status_m->getstatus();
        $job = $this->job_m->getjob();
        $this->data['job'] = $job;
        $this->data['emp'] = $emp;
        $this->data['department'] = $department;
        $this->data['status'] = $status;
        $this->data['states'] = $states;
        $this->data['city'] = $city;
        $this->data['TITLE'] = 'Employee Add';
        loadview('admin/employee/', 'Add.php', $this->data);
    }

    public function insert() {
       
        $result = $this->common_m->insert('ems_employees',$_POST);
        if ($result) {
            redirect(BASE_URL."admin/employee/add");
        }
        else{
           redirect(BASE_URL."admin/employee/add");
        }
    }


	 public function invoke() {
            $emp = $this->employee_m->getemployee();
            $this->data['result']= $emp;
            $this->data['emp']= $emp;
            //print_r($Job_posting);
              $this->data['TITLE'] = 'Employee List';
            loadview('admin/employee/', 'employee.php', $this->data);
       exit;
       }
	public function detail($id) {
            $emp = $this->employee_m->getEmployeedetail($id);
            $this->data['result']= $emp;
            //print_r($Job_posting);
            $this->data['TITLE'] = 'Employee Detail';
            loadview('admin/employee/', 'detail.php', $this->data);
            
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
	 	 loadview('admin/employee/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){
       	$result = $this->employee_m->updateemployee($_POST, $id);
       redirect(BASE_URL."admin/employee/index");
       }
	
}
