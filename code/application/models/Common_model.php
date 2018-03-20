<?php 

class Common_model extends MY_Model {
	
	
	
	public function getStudentId($studentid, $atccode)
	{
		//return $this->get_field('first_name', 'first_name')->like('student_id', $studentid, 'after');
		//$this->_set_where('student_id')
		//return $this->get_all()
		//get_many_by('student_id', $studentid);
		//return $this->like('student_id', $studentid, 'after');
		//return $this->like('student_id', $studentid);
		
		$this->db->select('student_id');
		$this->db->from('atc_student_registrations');
		if($atccode !='' || $atccode != null)
		{
			$this->db->where('atc_code', $atccode);	
		}
		
		$this->db->like('student_id', $studentid, 'after');
		return $this->db->get();
	}
}