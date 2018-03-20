<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Account_model','accounts');
		// only login users can access Account controller
		$this->verify_login();
	}

	public function index()
	{
//		print_r($this->mUser);
		//print_r($this->mUserMainGroup);	
		//print_r($this->mUserGroups);	
		$this->mViewData['user'] = $this->mUser;
                $entity_code = $this->mUser->entity_code;
                $notificationType = $this->accounts->getNotificationType($entity_code);
                $this->mViewData['notificationType'] = $notificationType;
		$this->render('account');
	}
        public function updateStatus(){
            $notificationId = $this->input->post("notificationId");
            $response = $this->accounts->updateinfo("cdac_notifications",array('row_id'=>$notificationId),array('notification_status'=>"VIEW"));
            echo $response;
        }
}