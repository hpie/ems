<?php 

class Atc_student_enrolment_model extends MY_Model {

	public function getEnrolledCourse($start,$limit,$sidx,$sord,$where) {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		

		if($access_type['acsess_to'] == "ATC") {
			//$this->db->select('asc.*, cc.course_name, cc.course_description, ccc.course_category, ccc.course_category_description');

			$this->db->select('asc.*, cc.course_name, cc.course_description');
			$this->db->limit($limit);
			$this->db->join('cdac_courses cc', 'cc.course_code = asc.course_code', 'left');
			//$this->db->join('cdac_courses_category ccc', 'ccc.course_category = cc.course_category', 'left');
			//$this->db->join('cdac_course_modules ccm', 'ccm.course_code = cc.course_code', 'left');			
			$this->db->join('atc_student_registrations asr', 'asr.student_id = asc.student_id', 'left');
			$this->db->where('asr.entity_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_enrolments asc',$limit,$start);
		} else if($access_type['acsess_to'] == "ARC") {
			//$this->db->select('asc.*, cc.course_name, cc.course_description, ccc.course_category, ccc.course_category_description');

			$this->db->select('asc.*, cc.course_name, cc.course_description');
			$this->db->limit($limit);
			$this->db->join('cdac_courses cc', 'cc.course_code = asc.course_code', 'left');
			//$this->db->join('cdac_courses_category ccc', 'ccc.course_category = cc.course_category', 'left');
			//$this->db->join('cdac_course_modules ccm', 'ccm.course_code = cc.course_code', 'left');
			$this->db->join('atc_student_registrations asr', 'asr.student_id = asc.student_id', 'left');
			$this->db->join('cdac_entities ce', 'ce.entity_code = asr.entity_code', 'left');
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_enrolments asc',$limit,$start);
		} else if($access_type['acsess_to'] == "CDAC") {
			//$this->db->select('asc.*');
			//$this->db->select('asc.*, cc.course_name, cc.course_description, ccc.course_category, ccc.course_category_description');

			$this->db->select('asc.*, cc.course_name, cc.course_description');
			$this->db->limit($limit);
			$this->db->join('cdac_courses cc', 'cc.course_code = asc.course_code', 'left');
			//$this->db->join('cdac_courses_category ccc', 'ccc.course_category = cc.course_category', 'left');
			//$this->db->join('cdac_course_modules ccm', 'ccm.course_code = cc.course_code', 'left');
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('atc_student_enrolments asc',$limit,$start);
		}
		//echo "==========>>>>>>>>>>>>>>>>>>> <pre>". $this->db->last_query(); print_r($data->result()); exit;
		return $data->result();
	}

	public function getAllEnrolledCourse($where = "") {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('asc.*');
			$this->db->join('atc_student_registrations asr', 'asr.student_id = asc.student_id', 'left');
			$this->db->where('asr.entity_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_enrolments asc');
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('asc.*');
			$this->db->join('atc_student_registrations asr', 'asr.student_id = asc.student_id', 'left');
			$this->db->join('cdac_entities ce', 'ce.entity_code = asr.entity_code', 'left');
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_enrolments asc');
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('asc.*');
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('atc_student_enrolments asc');
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
		return $this->get_field(student_id, first_name)->where('atc_code',$atccode)->like('student_id', $studentid, 'after');
	}
	*/
}