<?php

class Atc_faculty_model extends MY_Model {

    public function getAllRegistrations($student_id = '') {

        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email')))->row_array();

        if ($access_type['acsess_to'] == "ATC") {
            $this->db->select('asr.*');
            $this->db->from('atc_student_registrations asr');
            $this->db->where('asr.entity_code', $access_type['entity_code']);
        } else if ($access_type['acsess_to'] == "ARC") {
            $this->db->select('asr.*');
            $this->db->from('atc_student_registrations asr');
            $this->db->join('cdac_entities ce', 'ce.entity_code = asr.entity_code');
            $this->db->where('ce.entity_parent_code', $access_type['entity_code']);
        } else if ($access_type['acsess_to'] == "CDAC") {
            $this->db->select('asr.*');
            $this->db->from('atc_student_registrations asr');
        }

        $data = $this->db->get();
        return $data->result_array();
    }

    public function getStudent($student_id = '') {
        $data = $this->db->get_where('atc_student_registrations', array('student_id' => $student_id));
        return $data->result();
    }

    public function getStudentSingle($student_id = '') {
        $data = $this->db->get_where('atc_student_registrations', array('student_id' => $student_id));
        return $data->row();
    }

    public function getStudentDocsImg($student_id = '') {
        $data = $this->db->get_where('atc_student_registrations', array('student_id' => $student_id));
        return $data->result();
    }

    public function getStudentDocs($student_id = '') {
        //$data = $this->db->get('atc_student_documents');	
        $data = $this->db->get_where('atc_student_documents', array('student_id' => $student_id));
        return $data->result();
    }

    public function getStudentDocsByDocId($doc_id = '') {
        //$data = $this->db->get('atc_student_documents');	
        $data = $this->db->get_where('atc_student_documents', array('id' => $doc_id));
        return $data->row_array();
    }

    public function updateDocStatus($faculty_id = '') {
        $this->db->where('faculty_id', $this->input->post('faculty_id'));
        $this->db->update('entity_faculty_documents', array('status' => $this->input->post('status')));
    }

    public function getRegistrations($start, $limit, $sidx, $sord, $where) {

        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email')))->row_array();

        if ($access_type['acsess_to'] == "ATC") {
            $this->db->select('asr.*');
            $this->db->limit($limit);
            $this->db->where('asr.entity_code', $access_type['entity_code']);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx, $sord);
            $data = $this->db->get('atc_student_registrations asr', $limit, $start);
        } else if ($access_type['acsess_to'] == "ARC") {
            $this->db->select('asr.*');
            $this->db->limit($limit);
            $this->db->join('cdac_entities ce', 'ce.entity_code = asr.entity_code');
            $this->db->where('ce.entity_parent_code', $access_type['entity_code']);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx, $sord);
            $data = $this->db->get('atc_student_registrations asr', $limit, $start);
        } else if ($access_type['acsess_to'] == "CDAC") {
            $this->db->select('asr.*');
            $this->db->limit($limit);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx, $sord);
            $data = $this->db->get('atc_student_registrations asr', $limit, $start);
        }

        return $data->result_array();
    }

    public function getDocument($start, $limit, $sidx, $sord, $where) {

        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email')))->row_array();

        if ($access_type['acsess_to'] == "ATC") {
            $this->db->select('asd.*');
            $this->db->limit($limit);
            $this->db->where('asd.entity_code', $access_type['entity_code']);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx . " " . $sord);
            $data = $this->db->get('atc_student_documents asd', $limit, $start);
        } else if ($access_type['acsess_to'] == "ARC") {
            $this->db->select('asd.*');
            $this->db->limit($limit);
            $this->db->join('cdac_entities ce', 'ce.entity_code = asd.entity_code');
            $this->db->where('ce.entity_parent_code', $access_type['entity_code']);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx . " " . $sord);
            $data = $this->db->get('atc_student_documents asd', $limit, $start);
        } else if ($access_type['acsess_to'] == "CDAC") {
            $this->db->select('asd.*');
            $this->db->limit($limit);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx . " " . $sord);
            $data = $this->db->get('atc_student_documents asd', $limit, $start);
        }
        return $data->result();
    }

    public function getAllDocuments($where = "") {

        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email')))->row_array();

        if ($access_type['acsess_to'] == "ATC") {
            $this->db->select('asd.*');
            $this->db->where('asd.entity_code', $access_type['entity_code']);
            if ($where != "")
                $this->db->where($where, NULL, FALSE);
            $data = $this->db->get('atc_student_documents asd');
        } else if ($access_type['acsess_to'] == "ARC") {
            $this->db->select('asd.*');
            $this->db->join('cdac_entities ce', 'ce.entity_code = asd.entity_code');
            $this->db->where('ce.entity_parent_code', $access_type['entity_code']);
            if ($where != "")
                $this->db->where($where, NULL, FALSE);
            $data = $this->db->get('atc_student_documents asd');
        } else if ($access_type['acsess_to'] == "CDAC") {
            $this->db->select('asd.*');
            if ($where != "")
                $this->db->where($where, NULL, FALSE);
            $data = $this->db->get('atc_student_documents asd');
        }
        return $data->result();
    }

    public function insertinfo($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function getFaculties($start, $limit, $sidx, $sord, $where) {

        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email')))->row_array();

        if ($access_type['acsess_to'] == "ATC") {
            $this->db->select('af.*');
            $this->db->limit($limit);
            $this->db->where('af.entity_code', $access_type['entity_code']);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx, $sord);
            $data = $this->db->get('cdac_entity_faculties af', $limit, $start);
        } else if ($access_type['acsess_to'] == "ARC") {
            $this->db->select('af.*');
            $this->db->limit($limit);
            $this->db->join('cdac_entities ce', 'ce.entity_code = af.entity_code'
                    . '');
            $this->db->where('ce.entity_parent_code', $access_type['entity_code']);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx, $sord);
            $data = $this->db->get('cdac_entity_faculties af', $limit, $start);
        } else if ($access_type['acsess_to'] == "CDAC") {
            $this->db->select('af.*');
            $this->db->limit($limit);
            if ($where != NULL)
                $this->db->where($where, NULL, FALSE);
            $this->db->order_by($sidx, $sord);
            $data = $this->db->get('cdac_entity_faculties af', $limit, $start);
        }

        return $data->result_array();
    }

    public function getAllfaculties($faculty_id = '') {

        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email')))->row_array();

        if ($access_type['acsess_to'] == "ATC") {
            $this->db->select('af.*');
            $this->db->from('cdac_entity_faculties af');
            $this->db->where('af.entity_code', $access_type['entity_code']);
        } else if ($access_type['acsess_to'] == "ARC") {
            $this->db->select('af.*');
            $this->db->from('cdac_entity_faculties af');
            $this->db->join('cdac_entities ce', 'ce.entity_code = af.entity_code');
            $this->db->where('ce.entity_parent_code', $access_type['entity_code']);
        } else if ($access_type['acsess_to'] == "CDAC") {
            $this->db->select('af.*');
            $this->db->from('cdac_entity_faculties af');
        }

        $data = $this->db->get();
        return $data->result_array();
    }
    public function getFacultySingle($faculty_id = '') {
        $data = $this->db->get_where('atc_faculty', array('faculty_id' => $faculty_id));
        return $data->row();
    }
    public function GetDataById($table_name, $where) {
        $this->db->where($where);
        $queryData = $this->db->get($table_name);
        if ($queryData->num_rows() > 0) {
            return $queryData->result_array();
        } else {
            return false;
        }
    }
    public function GetFacultyId(){
        $this->db->select("faculty_code");
        $this->db->from('entity_faculty_qualifications');
        $queryData = $this->db->get();
        if ($queryData->num_rows() > 0) {
            return $queryData->result_array();
        } else {
            return false;
        }
    }
    public function GetAllFacultyId($facultyId,$center_code){
        $this->db->select("*");
        $this->db->from('cdac_entity_faculties');
        if($facultyId){
        $this->db->where_not_in('faculty_code',$facultyId);
        }
        $this->db->where("entity_code",$center_code);
        $queryData = $this->db->get();
        if ($queryData->num_rows() > 0) {
            return $queryData->result_array();
        } else {
            return false;
        }
    }
    
    public function getFacultyDocument($start,$limit,$sidx,$sord,$where) {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('afd.*');
			$this->db->limit($limit);
			$this->db->where('afd.entity_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('entity_faculty_documents afd',$limit,$start);
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('afd.*');
			$this->db->limit($limit);
			$this->db->join('cdac_entities ce', 'ce.entity_code = afd.entity_code' );
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('entity_faculty_documents afd',$limit,$start);
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('afd.*');
			$this->db->limit($limit);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('entity_faculty_documents afd',$limit,$start);
		}
		return $data->result();
	}
        public function getAllFacultyDocuments($where = "") {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('afd.*');
			$this->db->where('afd.entity_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('entity_faculty_documents afd');
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('afd.*');
			$this->db->join('cdac_entities ce', 'ce.entity_code = afd.entity_code' );
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('entity_faculty_documents afd');
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('afd.*');
			if($where != "")$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('entity_faculty_documents afd');
		}
		return $data->result();
	}
        
        public function getFacultyDocsByDocId ($doc_id = '') {	
		//$data = $this->db->get('atc_student_documents');	
		$data = $this->db->get_where('entity_faculty_documents', array('id' => $doc_id));
		return $data->row_array();
	}
        public function getFacultyDocs ($faculty_id = '') {	
		//$data = $this->db->get('atc_student_documents');	
		$data = $this->db->get_where('atc_faculty_id_documents', array('faculty_id' => $faculty_id));
		return $data->result();
	}
        

}
