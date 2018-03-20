<?php 

class Cdac_course_model extends MY_Model {
	 //public $primary_key = 'course_code';

	public function getCourse($start,$limit,$sidx,$sord,$where) {
		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

			if($access_type['acsess_to'] == "ATC") {
				//$this->db->select('ac.*, cc.course_name, cc.course_description, cc.course_status, ccc.course_category, ccc.course_category_description');

				$this->db->select('ac.*, cc.course_name, cc.course_description, cc.course_status');
				$this->db->limit($limit);
				$this->db->join('cdac_courses cc', 'cc.course_code = ac.entity_code', 'left');
				//$this->db->join('cdac_courses_category ccc', 'ccc.course_category = cc.course_category', 'left');
				//$this->db->join('cdac_course_modules ccm', 'ccm.course_code = cc.course_code', 'left');
				$this->db->where('ac.entity_code', $access_type['entity_code']);
				if($where != NULL)$this->db->where($where,NULL,FALSE);
			    $this->db->order_by($sidx." ".$sord);
				$data = $this->db->get('atc_courses ac',$limit,$start);
			} else if($access_type['acsess_to'] == "ARC") {
				//$this->db->select('ac.*, cc.course_name, cc.course_description, cc.course_status, ccc.course_category, ccc.course_category_description');

				$this->db->select('ac.*, cc.course_name, cc.course_description, cc.course_status');
				$this->db->limit($limit);

				$this->db->join('cdac_courses cc', 'cc.course_code = ac.entity_code', 'left');
				//$this->db->join('cdac_courses_category ccc', 'ccc.course_category = cc.course_category', 'left');
				$this->db->join('cdac_entities ce', 'ce.entity_code = ac.entity_code', 'left');
				$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
				if($where != NULL)$this->db->where($where,NULL,FALSE);
			    $this->db->order_by($sidx." ".$sord);
				$data = $this->db->get('atc_courses ac',$limit,$start);
			} else if($access_type['acsess_to'] == "CDAC") {
				//$this->db->select('ac.*, cc.course_name, cc.course_description, cc.course_status, ccc.course_category, ccc.course_category_description');
				$this->db->select('ac.*, cc.course_name, cc.course_description, cc.course_status');
				$this->db->limit($limit);
				$this->db->join('cdac_courses cc', 'cc.course_code = ac.entity_code', 'left');
				//$this->db->join('cdac_courses_category ccc', 'ccc.course_category = cc.course_category', 'left');
				//$this->db->join('cdac_course_modules ccm', 'ccm.course_code = cc.course_code', 'left');
				if($where != NULL)$this->db->where($where,NULL,FALSE);
			    $this->db->order_by($sidx." ".$sord);
				$data = $this->db->get('atc_courses ac',$limit,$start);
			}

			//echo "==========>>>>>>>>>>>>>>>>>>> <pre>". $this->db->last_query(); print_r($data->result()); exit;
			return $data->result();
			
	}

	public function getAllCourse($where = "") {
		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('ac.*');
			$this->db->where('ac.entity_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_courses ac');
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('ac.*');
			$this->db->join('cdac_entities ce', 'ce.entity_code = ac.entity_code', 'left');
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_courses ac');
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('ac.*');
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_courses ac');
		}
		/*
		$this->db->select('ac.*');
		if($where != "")$this->db->where($where,NULL,FALSE);
		$data = $this->db->get('atc_courses ac');
		*/
		return $data->result();
	}

	public function getCourseModules() {

		$this->db->select('cm.*');
		$this->db->join('cdac_modules cm', 'cm.module_code = ccm.module_code');
		$this->db->join('atc_courses ac', 'ac.course_code = ccm.course_code');
		$this->db->where('ac.row_id', $this->input->post('id'));
		$data = $this->db->get('cdac_course_modules ccm');

		//$data = $this->db->get_where('cdac_course_modules', array('course_code' => $this->input->post()));
		//echo "==========>>>>>>>>>>>>>>>>>>> <pre>". $this->db->last_query(); print_r($data->result()); exit;
		return $data->result();
	}
	
}