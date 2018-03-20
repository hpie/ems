<?php 

class Admin_center_model extends MY_Model {
	
	public function getAllRegistrations ($student_id = '') {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('asr.*');
			$this->db->from('atc_student_registrations asr');
			$this->db->where('asr.entity_code', $access_type['entity_code']);
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('asr.*');
			$this->db->from('atc_student_registrations asr');
			$this->db->join('cdac_entities ce', 'ce.entity_code = asr.entity_code' );
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('asr.*');
			$this->db->from('atc_student_registrations asr');
		}
		
		$data = $this->db->get();
		return $data->result_array();
	}

	public function getStudent ($student_id = '') {		
		$data = $this->db->get_where('atc_student_registrations', array('student_id' => $student_id));
		return $data->result();
	}

	public function getStudentSingle ($student_id = '') {		
		$data = $this->db->get_where('atc_student_registrations', array('student_id' => $student_id));
		return $data->row();
	}

	public function getStudentDocsImg ($student_id = '') {		
		$data = $this->db->get_where('atc_student_registrations', array('student_id' => $student_id));
		return $data->result();
	}

	public function getStudentDocs ($student_id = '') {	
		//$data = $this->db->get('atc_student_documents');	
		$data = $this->db->get_where('atc_student_documents', array('student_id' => $student_id));
		return $data->result();
	}
        public function getStudentDocsByDocId ($doc_id = '') {	
		//$data = $this->db->get('atc_student_documents');	
		$data = $this->db->get_where('atc_student_documents', array('id' => $doc_id));
		return $data->row_array();
	}

	public function updateDocStatus ($student_id = '') {	
		//echo "=============>>>>>>>>>> <pre>"; print_r($_POST); exit;
		$this->db->where('id', $this->input->post('student_id'));
		$this->db->update('atc_student_documents', array('status' => $this->input->post('status')));

		echo "================>>>>>>>>>>>>>" . $this->db->last_query(); exit;
	}

	public function getRegistrations ($start,$limit,$sidx,$sord,$where) {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('asr.*');
			$this->db->limit($limit);
			$this->db->where('asr.entity_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx,$sord);
			$data = $this->db->get('atc_student_registrations asr',$limit,$start);
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('asr.*');
			$this->db->limit($limit);
			$this->db->join('cdac_entities ce', 'ce.entity_code = asr.entity_code' );
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx,$sord);
			$data = $this->db->get('atc_student_registrations asr',$limit,$start);
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('asr.*');
			$this->db->limit($limit);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx,$sord);
			$data = $this->db->get('atc_student_registrations asr',$limit,$start);
		}

		return $data->result_array();
	}
        public function getDocument($start,$limit,$sidx,$sord,$where) {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('asd.*');
			$this->db->limit($limit);
			$this->db->join('atc_student_registrations asr', 'asr.student_id = asd.student_id' );
			$this->db->where('asr.entity_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_documents asd',$limit,$start);
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('asd.*');
			$this->db->limit($limit);
			$this->db->join('atc_student_registrations asr', 'asr.student_id = asd.student_id' );
			$this->db->join('cdac_entities ce', 'ce.entity_code = asr.entity_code' );
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_documents asd',$limit,$start);
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('asd.*');
			$this->db->limit($limit);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_documents asd',$limit,$start);
		}
		return $data->result();
	}
        public function getAllDocuments($where = "") {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('asd.*');
			$this->db->join('atc_student_registrations asr', 'asr.student_id = asd.student_id' );
			$this->db->where('asr.entity_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_documents asd');
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('asd.*');
			$this->db->join('atc_student_registrations asr', 'asr.student_id = asd.student_id' );
			$this->db->join('cdac_entities ce', 'ce.entity_code = asr.entity_code' );
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_documents asd');
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('asd.*');
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_documents asd');
		}
		return $data->result();
	}
	//function __construct()
	//{
		//$this->has_one['center'] = array('foreign_model'=>'cdac_center_model','foreign_table'=>'cdac_centers','foreign_key'=>'center_code','local_key'=>'center_code');
		//$this->has_one['course'] = array('foreign_model'=>'cdac_course_model','foreign_table'=>'cdac_courses','foreign_key'=>'course_code','local_key'=>'course_code');
	//}
	/*
	public $belongs_to = array(
		'1' => array(
			'model'			=> 'cdac_center_model',
			'primary_key'	=> 'center_code'
		),
		'2' => array(
			'model'			=> 'cdac_course_model',
			'primary_key'	=> 'course_code'
		)
	);
	*/
	
	/*
	Array
	(
	  [phone] => Array
	  (
	    [relation] => has_one
	    [foreign_model] => phone_model
	    [foreign_table] => phones
	    [foreign_key] => user_id
	    [local_key] => id
	  )
 
	  [address] => Array
	  (
	    [relation] => has_one
	    [foreign_model] => address_model
	    [foreign_table] => addresses
	    [foreign_key] => user_id
	    [local_key] => id
	  )
 
	)
	*/
	//protected $where = array('status' => 'active');
	//protected $order_by = array('publish_time', 'DESC');
	
	
	
	/*
	protected function getStudentId($studentid, $atccode)
	{
		return $this->get_field(student_id, first_name)->where('entity_code',$atccode)->like('student_id', $studentid, 'after');
	}
	*/
}