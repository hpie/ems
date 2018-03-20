<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}


	// Frontend User CRUD
	public function cdacBookOrders()
	{
		
		$loggedinUser = $this->mUser;
		$crud = $this->generate_crud('cdac_book_orders');
		
		$crud->display_as('order_code','Order Code');
		$crud->display_as('book_code','Book Code');
		$crud->display_as('requested_count','Requested Count');
		$crud->display_as('received_count','Received Count');
		$crud->display_as('reason_for_loss','Reason for Loss');
		$crud->display_as('comments','Comments');
		$crud->display_as('request_status','Request Status');
		$crud->display_as('expected_delivery_dt','Expected Delivery Date');
		$crud->display_as('actual_delivery_dt','Delivered On');
		$crud->display_as('requested_dt','Requested Date');
		$crud->display_as('expected_dt','Expected Delivery Date');
		$crud->display_as('dispatched_count','Dispatched Count');
		$crud->display_as('dispatched_dt','Dispatched Date');
		$crud->display_as('delivery_mode','Delivery Mode');
		$crud->display_as('delivery_reference','Delivery Reference');
		$crud->display_as('received_dt','Received Date');
		
		$crud->columns('order_code','book_code', 'requested_count','expected_delivery_dt',
		'request_status', 'received_count',  'actual_delivery_dt', 'reason_for_loss', 'comments');
		
		//Relation with Book
		$crud->set_relation('book_code','cdac_books','{book_code}-{book_name}',
				array('book_status' => 'A'), 'book_code, book_name ASC');
		
		//Relation with Status : for request_status
		$crud->set_relation('request_status','cdac_status','{status_code}-{status_title}',
				array('status_group' => 'ORD-STS', 'status' => 'A'), 'status_code, status_title ASC');
		
		//Relation with Status : for reason_for_loss
		$crud->set_relation('reason_for_loss','cdac_status','{status_code}-{status_title}',
				array('status_group' => 'ORD-RES', 'status' => 'A'), 'status_code, status_title ASC');				
						
		//$crud->unset_fields('request_status');
		//$crud->unset_fields('reason_for_loss');
		$state = $crud->getState();
		$state_info = $crud->getStateInfo();
		$pk = $state_info->primary_key;
		
		if ($state == 'add' || $state == 'insert_validation' || $state == 'insert')
		{
			//Show only in ADD
			$crud->add_fields('order_code','book_code', 'requested_count','expected_delivery_dt',
					'request_status');
		}	
		elseif ($state == 'edit' || $state == 'update_validation' || $state == 'update')
		{

			//Show only for Update
			$crud->edit_fields('order_code','book_code', 'requested_count','expected_delivery_dt',
			'request_status', 'received_count',  'actual_delivery_dt', 'reason_for_loss', 'comments', 'table_name');
			
			//Relation with Status : for request_status
			//$crud->set_relation('request_status','cdac_status','{status_code}-{status_title}',array('status_group' => 'ORD-STS', 'status_mode' => 'E', 'status' => 'A'), 'status_code, status_title ASC');
			
			//Relation with Status : for reason_for_loss
			//$crud->set_relation('reason_for_loss','cdac_status','{status_code}-{status_title}',array('status_group' => 'ORD-RES', 'status_mode' => 'E', 'status' => 'A'), 'status_code, status_title ASC');
			
			// get status value
			//validate if status completed
				
			// if status received make received count etc mandatory
			
			// Make these readonly and also accessible for callback update_log_after_update
			$crud->field_type('order_code', 'hidden');
			$crud->field_type('book_code', 'hidden');
			
			$crud->field_type('modified_by', 'hidden', "system");
			
			$this->load->model('Cdac_book_order_model', 'bookOrder');
			$this->row = $this->bookOrder->get_by('order_code', $pk);
			
			
			if($this->row->request_status == 'REC')
			{
				$crud->field_type('order_code', 'readonly');
				$crud->field_type('entity_code', 'readonly');
				$crud->field_type('book_code', 'readonly');
				$crud->field_type('requested_count', 'readonly');
				$crud->field_type('expected_delivery_dt', 'readonly');
				$crud->field_type('expected_dt', 'readonly');
				$crud->field_type('request_status', 'readonly');
				$crud->field_type('actual_delivery_dt', 'readonly');
				$crud->field_type('reason_for_loss', 'readonly');
				$crud->field_type('comments', 'readonly');
				$crud->field_type('dispatched_count', 'readonly');
				$crud->field_type('received_count', 'readonly');
				$crud->field_type('received_dt', 'readonly');
				$crud->field_type('dispatched_dt', 'readonly');
				$crud->field_type('delivery_mode', 'readonly');
				$crud->field_type('delivery_reference', 'readonly');
				
			}
			
		}
		
				
		$crud->unset_delete();
				
		$this->mPageTitle = 'CDAC Book Orders';
		$this->render_crud();
	}
	
	function bookRequestsByMe(){
		
		$loggedinUser = $this->mUser;
		$crud = $this->generate_crud('cdac_book_requests');
		$crud->where('cdac_book_requests.entity_code =\''.$loggedinUser->entity_code."'");
		
		$crud->display_as('book_code','Book Code');
		$crud->display_as('requesting_count','Requested Count');
		$crud->display_as('requesting_to','Requested To Entity');
		$crud->display_as('requested_dt','Requested Date');
		$crud->display_as('comments','Comments');
		$crud->display_as('request_status','Request Status');
		$crud->display_as('expected_dt','Expected Delivery Date');
		$crud->display_as('received_dt','Received Date');
		
		
		$crud->columns('book_code','requesting_to','requesting_dt',
				'request_status', 'request_type','delivery_mode',
				'delivery_reference','received_dt', 'reason_for_loss',
				'comments');
		
		$crud->set_relation('book_code','cdac_books','{book_code}-{book_name}',array('book_status' => 'A'),
				'book_code, book_name ASC');
		
		$crud->set_relation('requesting_to','cdac_entities','{entity_code}-{entity_name}',
				array('entity_status' => 'A'), 'entity_code, entity_name ASC');
		
		
		$crud->set_relation('reason_for_loss','cdac_status','{status_code}-{status_title}',
				array('status_group' => 'ORD-RES', 'status' => 'A'), 'status_code, status_title ASC');
		
		$state = $crud->getState();
		$state_info = $crud->getStateInfo();
		$pk = $state_info->primary_key;
		
		//requester creates request, sets status to requested
		if ($state == 'add' || $state == 'insert_validation' || $state == 'insert')
		{
			//Show only in ADD
			
			$crud->add_fields('requesting_to','book_code','entity_code', 'requesting_count',
					'requesting_dt','expected_dt','request_status','request_type','comments','created_by');
			
			$crud->callback_add_field('requesting_dt', function(){
				return date('Y-m-d');
			});
			
			$crud->field_type('entity_code', 'hidden', $loggedinUser->entity_code);
			$crud->field_type('request_type', 'hidden',"adhoc");
			$crud->field_type('created_by', 'hidden', $loggedinUser->username);
			$crud->field_type('request_status', 'hidden', "REQ");
			
		}
		
		
		elseif ($state == 'edit' || $state == 'update_validation' || $state == 'update')
		{	
			
			$this->load->model('Cdac_book_request_model', 'bookRequest');
			$this->row = $this->bookRequest->get_by('id', $pk);
			
			// requester cant edit request fields and responder's fields once the responder dispatches the request
			
			if($this->row->request_status == 'REQ')
			{
				$crud->field_type('request_status','dropdown',array('REQ'=>'REQUESTED','CAN'=>'CANCELLED'));
				
				$crud->edit_fields('book_code','requesting_to', 'requesting_count','expected_dt',
					 'comments','modified_by');
				
				$crud->field_type('modified_by', 'hidden', $loggedinUser->username);
			
				
			}
			elseif($this->row->request_status == 'DISP')
			{
				$crud->field_type('request_status','dropdown',array('REC'=>'RECEIVED','CAN'=>'CANCELLED'));
				
				$crud->edit_fields('book_code','requesting_to', 'requesting_count','expected_dt',
						'dispatched_dt','dispatched_count','delivery_mode', 'delivery_reference',
						'received_count',  'received_dt','request_status',
						'reason_for_loss', 'comments','modified_by');
				
				$crud->field_type('modified_by', 'hidden', $loggedinUser->username);
				
				$crud->field_type('entity_code', 'readonly');
				$crud->field_type('book_code', 'readonly');
				$crud->field_type('requesting_count', 'readonly');
				$crud->field_type('requesting_to', 'readonly');
				$crud->field_type('expected_dt', 'readonly');
				$crud->field_type('dispatched_dt', 'readonly');
				$crud->field_type('dispatched_count', 'readonly');
				$crud->field_type('delivery_mode', 'readonly');
				$crud->field_type('delivery_reference', 'readonly');
				
			}
			
		}
		
		//		$crud->callback_after_update(array($this, 'update_log_after_update'));
		
		$crud->unset_delete();
		
		$this->mPageTitle = 'My Ad-hoc Book Requests';
		$this->render_crud();
		
	}
	
	function bookRequestsToMe(){
		$loggedinUser = $this->mUser;
		$crud = $this->generate_crud('cdac_book_requests');
		$crud->where('requesting_to =\''.$loggedinUser->entity_code."'");
		
		$crud->display_as('book_code','Book Code');
		$crud->display_as('requesting_count','Requested Count');
		$crud->display_as('entity_code','Requested By');
		$crud->display_as('requested_dt','Requested Date');
		$crud->display_as('comments','Comments');
		$crud->display_as('request_status','Request Status');
		$crud->display_as('expected_dt','Expected Delivery Date');
		$crud->display_as('received_dt','Received Date');
		$crud->display_as('received_count','Received Count');
		$crud->display_as('reason_for_loss','Reason for loss');
		
		
		$crud->columns('book_code', 'requesting_count','entity_code',
				'request_status','requested_dt','dispatched_dt','received_dt','comments');
		
		$crud->set_relation('book_code','cdac_books','{book_code}-{book_name}',
				array('book_status' => 'A'), 'book_code, book_name ASC');
		
		$crud->field_type('request_status','dropdown',array('DISP'=>'DISPATCHED','REJ'=>'REJECTED'));
		
		$state = $crud->getState();
		$state_info = $crud->getStateInfo();
		$pk = $state_info->primary_key;
		
	
		if ($state == 'edit' || $state == 'update_validation' || $state == 'update')
		{
			$crud->edit_fields('book_code', 'requesting_count','expected_dt','dispatched_dt',
					'dispatched_count','delivery_mode','delivery_reference','request_status',
					 'comments','modified_by');
			
			//$crud->field_type('book_code', 'hidden');
			
			$crud->field_type('modified_by', 'hidden', $loggedinUser->username);
			
			$this->load->model('Cdac_book_request_model', 'bookOrder');
			$this->row = $this->bookOrder->get_by('id', $pk);
			
			if($this->row->request_status == 'REQ' || $this->row->request_status == 'DISP')
			{
				$crud->field_type('entity_code', 'readonly');
				$crud->field_type('book_code', 'readonly');
				$crud->field_type('requesting_count', 'readonly');
				$crud->field_type('requesting_to', 'readonly');
				$crud->field_type('expected_dt', 'readonly');
				
			}
			elseif($this->row->request_status == 'REC'){
				$crud->edit_fields('book_code', 'requesting_count','expected_dt','dispatched_dt',
						'dispatched_count','delivery_mode','delivery_reference','request_status','received_dt',
						'received_count',
						'comments','modified_by');
				
				$crud->field_type('modified_by', 'hidden', $loggedinUser->username);
				
				
				$crud->field_type('entity_code', 'readonly');
				$crud->field_type('book_code', 'readonly');
				$crud->field_type('requesting_count', 'readonly');
				$crud->field_type('requesting_to', 'readonly');
				$crud->field_type('expected_dt', 'readonly');
				$crud->field_type('dispatched_dt', 'readonly');
				$crud->field_type('dispatched_count', 'readonly');
				$crud->field_type('delivery_mode', 'readonly');
				$crud->field_type('delivery_reference', 'readonly');
				$crud->field_type('request_status', 'readonly');
				$crud->field_type('reason_for_loss', 'readonly');
				
			}
			
		}
		
		$crud->unset_add();
		$crud->unset_delete();
		
		$this->mPageTitle = 'Ad-hoc Book Requests of ATCs';
		$this->render_crud();
	}
	
	
	function add_reason_for_loss_callback($value, $row)
	{
		//Relation with Status : for reason_for_loss
			$crud->set_relation('reason_for_loss','cdac_status','{status_code}-{status_title}',array('status_group' => 'ORD-RES', 'status_mode' => 'C', 'status' => 'A'), 'status_code, status_title ASC');
	}
	
	
	function edit_reason_for_loss_callback($value, $row)
	{
		//Relation with Status : for reason_for_loss
			$crud->set_relation('reason_for_loss','cdac_status','{status_code}-{status_title}',array('status_group' => 'ORD-RES', 'status_mode' => 'E', 'status' => 'A'), 'status_code, status_title ASC');	
	}
	
	function callback_check_request_status($value, $row)
	{
		if($value == 'R')
		{
			
		}	
	}
	
	
	function update_log_after_update($post_array, $primary_key)
	{
			if($post_array['request_status'] == 'REC')
			{
				if($post_array['table_name'] == 'cdac_book_orders')
				{
					$data = array(
						'order_code' => $post_array['order_code'],
						'book_code' => $post_array['book_code'],
						'book_received_count' => $post_array['received_count'],
						'requested_entity_type' => 'CDAC',
						'requested_entity_code' => 'CDAC',
						'processed_dt' => $post_array['actual_delivery_dt']
					);
					
					$this->db->insert('cdac_book_request_logs',$data);
				}
				elseif($post_array['table_name'] == 'arc_book_requests')
				{
					$data = array(
							'entity_code' => $post_array['entity_code'],
							'book_code' => $post_array['book_code'],
							'book_received_count' =>  $post_array['received_count'],
							'book_dispatched_count' =>  $post_array['dispatched_count'],
							'book_transaction_type' => 'IN',
							'requesting_to' => $this->mUser->entity_code,
							'processed_dt' => $post_array['received_dt']
					);
					
					$this->db->insert('cdac_book_request_logs',$data);
				}
				
			}
	}
	
// 	function just_a_test($primary_key , $row)
// 	{
// 		if($row->order_code == 1){
// 			print_r("just_a_test");
// 			print_r($row);
// 		}
// 		return "";
// 		//return site_url("base_url().'assets/grocery_crud/themes/flexigrid/css/images/edit.png");
// 	}
	
}
