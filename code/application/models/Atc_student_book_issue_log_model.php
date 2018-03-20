<?php 

class Atc_student_book_issue_log_model extends MY_Model {
	//public $primary_key = 'center_code';

	public function getIssueBook($start,$limit,$sidx,$sord,$where) {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('asbil.*');
			$this->db->limit($limit);
			$this->db->where('asbil.entity_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_book_issue_logs asbil',$limit,$start);
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('asbil.*');
			$this->db->limit($limit);
			$this->db->join('cdac_entities ce', 'ce.entity_code = asbil.entity_code' );
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_book_issue_logs asbil',$limit,$start);
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('asbil.*');
			$this->db->limit($limit);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_book_issue_logs asbil',$limit,$start);
		}
		return $data->result();
	}

	public function getAllIssueBooks($where = "") {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('asbil.*');
			$this->db->where('asbil.entity_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_book_issue_logs asbil');
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('asbil.*');
			$this->db->join('cdac_entities ce', 'ce.entity_code = asbil.entity_code' );
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_book_issue_logs asbil');
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('asbil.*');
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_book_issue_logs asbil');
		}
		return $data->result();
	}
}