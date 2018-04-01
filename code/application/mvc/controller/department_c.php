<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class department_c extends Controllers {

	public function __construct() {
       	sessionCheck();
        //$this->Department_m = $this->loadModel('department_m');
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

        $this->data['states'] = $states;
        $this->data['status'] = $status;
        $this->data['city'] = $city;
        $this->data['TITLE'] = 'Department ADD';
       // $user= sessionAdmin();
        //print_r($user);
        loadview('admin/Department/', 'Add.php', $this->data);
    }

    public function insert() {
        $result = $this->common_m->insert('ems_departments',$_POST);
        if ($result) {
            redirect(BASE_URL."department/add");
        }
        else{
           redirect(BASE_URL."department/add");
        }
    }


	 public function invoke() {
	 	 $Department = $this->department_m->getDepartment(); 
	 	 $this->data['result']= $Department;
	 	 //print_r($Department);
	 	   $this->data['TITLE'] = 'Department';
	 	 loadview('admin/Department/', 'Department.php', $this->data);
       

       exit;
       }
	public function detail($id) {
	 	 $Department = $this->department_m->getDepartmentdetail($id); 
	 	 $this->data['result']= $Department;
	 	 //print_r($Department);
	 	   $this->data['TITLE'] = 'Department Detail';
	 	 loadview('admin/Department/', 'detail.php', $this->data);
       

       exit;
       }
       public function edit($id) {
        $states = $this->states_m->getstate(); 
       	$city = $this->city_m->getcity(); 
        $status = $this->status_m->getstatus();

        $this->data['city'] = $city;
        $this->data['states'] = $states;
        $this->data['status'] = $status;
	 	 $Department = $this->department_m->getDepartmentdetail($id); 
	 	 $this->data['result']= $Department;
	 	   $this->data['TITLE'] = 'Department Edit';
	 	 loadview('admin/Department/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){

       	$result = $this->department_m->updatedepartment($_POST, $id);
       redirect(BASE_URL."department/index");
       }	
}
