<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends Admin_Controller {

	public function index()
	{

		$this->load->model('user_model', 'users');
		$this->load->model('group_model', 'groups');
		$this->load->model('Cdac_entity_model', 'cdac_arcs');
		$this->load->model('Cdac_entity_model', 'cdac_atcs');
		
		$this->mViewData['count'] = array(
			'users' => $this->users->count_all(),
			'groups' => $this->groups->count_all(),
			'cdac_arcs' => $this->cdac_arcs->count_by('entity_type', 'ARC'),
			'cdac_atcs' => $this->cdac_atcs->count_by('entity_type', 'ATC'),
		);
		

		
		$this->render('home');
	}
}
