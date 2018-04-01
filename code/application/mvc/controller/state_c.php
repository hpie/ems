<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class state_c extends Controllers {

	 public function __construct() {
       	sessionCheck();
        $this->states_m = $this->loadModel('states_m');
        $this->status_m = $this->loadModel('status_m');
    }

	// Frontend User CRUD
	
	public function add() {
        $states = $this->states_m->getstate(); 
        $status = $this->status_m->getstatus();

        $this->data['states'] = $states;
        $this->data['status'] = $status;
        $this->data['TITLE'] = 'State Add';
       // $user= sessionAdmin();
        //print_r($user);
        loadview('admin/state/', 'Add.php', $this->data);
    }

    public function insert() {
        $result = $this->states_m->insert($_POST);
        print_r($result);
        if ($result) {
            redirect(BASE_URL."state/add");
        }
         else {
            redirect(BASE_URL."state/add");
        }
    }


	 public function invoke() {
	 	 $states = $this->states_m->getstate(); 
        

        $this->data['states'] = $states;
      
	 	 $this->data['result']= $states;
	 	 //print_r($city);
	 	   $this->data['TITLE'] = 'State';
	 	 loadview('admin/state/', 'state.php', $this->data);
       

       exit;
       }
	public function detail($id) {
	 	 $city = $this->city_m->getCitydetail($id); 
	 	 $this->data['result']= $city;
	 	 //print_r($city);
	 	   $this->data['TITLE'] = 'State Detail';
	 	 loadview('admin/state/', 'detail.php', $this->data);
       

       exit;
       }
       public function edit($id) {
 
        $status = $this->status_m->getstatus();

        $this->data['status'] = $status;
	 	 $state = $this->states_m->getStatedetail($id); 
	 	 $this->data['result']= $state;
	 	   $this->data['TITLE'] = 'CITY Edit';
	 	 loadview('admin/state/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){

       	$result = $this->states_m->updatestate($_POST, $id);
       redirect(BASE_URL."state/index");
       }
	
}
