<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keyword_c extends Controllers {

	 public function __construct() {
       	sessionCheck();
        $this->status_m = $this->loadModel('status_m');
        $this->keyword_m = $this->loadModel('keyword_m');
    }

	// Frontend User CRUD
	
	public function add() {
       
        $keyword = $this->keyword_m->getkeyword();
        $status = $this->status_m->getstatus();

        $this->data['keyword'] = $keyword;
        $this->data['status'] = $status;
        $this->data['TITLE'] = 'keyword Add';
       // $user= sessionAdmin();
        //print_r($user);
        loadview('admin/keyword/', 'Add.php', $this->data);
    }

    public function insert() {
        $result = $this->keyword_m->insert($_POST);
        print_r($result);
        if ($result) {
            redirect(BASE_URL."keyword/add");
        }
         else {
            redirect(BASE_URL."keyword/add");
        }
    }


	 public function invoke() {
	 	 $states = $this->keyword_m->getkeyword(); 
        
       
      
	 	 $this->data['result']= $states;
	 	 //print_r($city);
	 	   $this->data['TITLE'] = 'keyword';
	 	 loadview('admin/keyword/', 'keyword.php', $this->data);
       

       exit;
       }
	public function detail($id) {
	 	 $city = $this->keyword_m->getKeyworddetail($id); 
	 	 $this->data['result']= $city;
	 	 //print_r($city);
	 	   $this->data['TITLE'] = 'keyword Detail';
	 	 loadview('admin/keyword/', 'keyword.php', $this->data);
       

       exit;
       }
       public function edit($id) {
 
        $status = $this->status_m->getstatus();
        $this->data['status'] = $status;
	 	 $keyword = $this->keyword_m->getKeyworddetail($id); 
	 	 $this->data['result']= $keyword;
	 	   $this->data['TITLE'] = 'Keyword Edit';
	 	 loadview('admin/keyword/', 'edit.php', $this->data);
       

       exit;
       }
       public function update($id){

       	$result = $this->keyword_m->updatekeyword($_POST, $id);
       redirect(BASE_URL."keyword/index");
       }
	
}
