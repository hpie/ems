<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class city extends Controllers {

	 public function __construct() {
       	sessionCheck();
        $this->city_m = $this->loadModel('city_m');
        $this->states_m = $this->loadModel('states_m');
        $this->status_m = $this->loadModel('status_m');
    }

	// Frontend User CRUD
	
	public function add() {
        $states = $this->states_m->getstate(); 
        $status = $this->status_m->getstatus();

        $this->data['states'] = $states;
        $this->data['status'] = $status;
        $this->data['TITLE'] = 'CITY ADD';
       // $user= sessionAdmin();
        //print_r($user);
        loadview('admin/city/', 'Add.php', $this->data);
    }

    public function insert() {
        $result = $this->city_m->insert($_POST);
        if ($result) {
            redirect(BASE_URL."city/add");
        }
    }


	 public function invoke() {
	 	 $city = $this->city_m->getCity(); 
	 	 $this->data['result']= $city;
	 	 //print_r($city);
	 	   $this->data['TITLE'] = 'CITY';
	 	 loadview('admin/city/', 'city.php', $this->data);
       

       exit;
       }
	public function detail($id) {
	 	 $city = $this->city_m->getCitydetail($id); 
	 	 $this->data['result']= $city;
	 	 //print_r($city);
	 	   $this->data['TITLE'] = 'CITY Detail';
	 	 loadview('admin/city/', 'detail.php', $this->data);
       

       exit;
       }
       public function edit($id) {
       	$states = $this->states_m->getstate(); 
        $status = $this->status_m->getstatus();

        $this->data['states'] = $states;
        $this->data['status'] = $status;
	 	 $city = $this->city_m->getCitydetail($id); 
	 	 $this->data['result']= $city;
	 	   $this->data['TITLE'] = 'CITY Edit';
	 	 loadview('admin/city/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){

       	$result = $this->city_m->updatecity($_POST, $id);
       redirect(BASE_URL."city/index");
       }
	
}
