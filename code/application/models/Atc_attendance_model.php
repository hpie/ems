<?php 

class Atc_attendance_model extends MY_Model {

	public function getAllCourse($where = "") {
		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

                //echo "=====>>>>>>>>>>>>> <pre>".$this->db->last_query(); print_r($access_type); exit;
		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('ase.*, COUNT(ase.enrolment_id) as total');
			$this->db->join('atc_courses ac', 'ase.course_code = ac.course_code', 'left');
			$this->db->where('ac.entity_code', $access_type['entity_code']);
			$this->db->group_by('ase.course_code, ase.start_dt, ase.end_dt'); 
			$data = $this->db->get('atc_student_enrolments ase');
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('ase.*, COUNT(ase.enrolment_id) as total, ac.entity_code, ce.entity_parent_code');
			$this->db->join('atc_courses ac', 'ase.course_code = ac.course_code', 'left');
			
			$this->db->join('cdac_entities ce', 'ce.entity_code = ac.entity_code', 'left');
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);

			$this->db->group_by('ase.course_code, ase.start_dt, ase.end_dt'); 
			$data = $this->db->get('atc_student_enrolments ase');
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('ase.*, COUNT(ase.enrolment_id) as total, ac.entity_code, ce.entity_parent_code');
			$this->db->join('atc_courses ac', 'ase.course_code = ac.course_code', 'left');
			$this->db->join('cdac_entities ce', 'ce.entity_code = ac.entity_code', 'left');
			$this->db->group_by('ase.course_code, ase.start_dt, ase.end_dt'); 
			$data = $this->db->get('atc_student_enrolments ase');
		}
		return $data->result();
	}


	public function getAllStudents($id = "") {
		$this->db->select('t2.*');
		$this->db->join('atc_student_enrolments as t2', 't2.course_code = t1.course_code AND t2.start_dt = t1.start_dt AND t2.end_dt = t1.end_dt');
		$this->db->where('t1.enrolment_id', $this->uri->segment(3));
		$this->db->order_by('t1.student_id');
		$data = $this->db->get('atc_student_enrolments as t1');
		return $data->result_array();
	}

	public function getCourseAttendance($id = "") {

                if(isset($_POST['course_id'])) {
                        $enrolment_id = $_POST['course_id'];   
                } else {
                        $enrolment_id = $this->uri->segment(3); 
                }
                

		$courseBatchDetails = $this->db->get_where('atc_student_enrolments', array('enrolment_id' => $enrolment_id))->row_array();

                //echo "==========>courseBatchDetails>>>>>>>>>>>>>>. <pre>".$this->db->last_query(); print_r($courseBatchDetails);

		//$course_id = $courseBatchDetails['course_code'];

		$course_id = $enrolment_id;

        //$attendance_date = $courseBatchDetails['attendance_date'];

        $start_dt = $courseBatchDetails['start_dt'];
        $end_dt = $courseBatchDetails['end_dt'];



        $this->db->select('*');
        $this->db->where('course_code' , $course_id);
		$this->db->where('attendance' , 'absent');
        //$this->db->where('attendance_date' , $attendance_date);
        $this->db->where('start_dt' , $start_dt);
        $this->db->where('end_dt' , $end_dt);
        $attendanceResult = $this->db->get('atc_attendances');

        //echo "==========>courseBatchDetails>>>>>>>>>>>>>>. <pre>".$this->db->last_query(); print_r($attendanceResult->result_array()); //exit;

        if($attendanceResult->num_rows() > 0) {
        	//echo "==========>courseBatchDetails>>>>>>>>>>>>>>. <pre>".$this->db->last_query(); print_r($attendanceResult->result_array()); exit;

        	return $attendanceResult->result_array();
        } else {
        	return 0;
        }

		//echo "==========>>>>>>>>>>>>>>>. <pre>".$this->db->last_query(); print_r($_POST); exit;
	}

	public function getAttendance($id = "") {

		$course_id = $_POST['course_id'];
        $attendance_date = $_POST['attendance_date'];

        $start_dt = $_POST['start_dt'];
        $end_dt = $_POST['end_dt'];

        $this->db->select('student_id');
        $this->db->where('course_code' , $course_id);
		$this->db->where('attendance' , 'absent');
        $this->db->where('attendance_date' , $attendance_date);
        $this->db->where('start_dt' , $start_dt);
        $this->db->where('end_dt' , $end_dt);
        $attendanceResult = $this->db->get('atc_attendances');

        if($attendanceResult->num_rows() > 0) {
        	//echo "==========>>>>>>>>>>>>>>>. <pre>".$this->db->last_query(); print_r(array_column($attendanceResult->result_array(), 'student_id')); exit;

        	echo json_encode(array('reocrdfound' => 1, 'absent_students' => (array_column($attendanceResult->result_array(), 'student_id')))); exit;
        } else {
        	echo json_encode(array('reocrdfound' => 0)); exit;
        }

		//echo "==========>>>>>>>>>>>>>>>. <pre>".$this->db->last_query(); print_r($_POST); exit;
	}


        public function getAttendanceCalendar($id = "") {

                $course_id = $_POST['course_id'];

                $start_dt = $_POST['start_dt'];
                $end_dt = $_POST['end_dt'];

                $this->db->select('*');
                $this->db->where('course_code' , $course_id);
                $this->db->where('attendance' , 'absent');
                $this->db->where('start_dt' , $start_dt);
                $this->db->where('end_dt' , $end_dt);
                $attendanceResult = $this->db->get('atc_attendances');

                if($attendanceResult->num_rows() > 0) {
                        echo "==========>>>>>>>>>>>>>>>. <pre>".$this->db->last_query(); print_r($attendanceResult->result_array()); exit;

                        echo json_encode(array('reocrdfound' => 1, 'absent_students' => (array_column($attendanceResult->result_array(), 'student_id')))); exit;
                } else {
                        echo json_encode(array('reocrdfound' => 0)); exit;
                }

                //echo "==========>>>>>>>>>>>>>>>. <pre>".$this->db->last_query(); print_r($_POST); exit;
        }


	
	public function save_attendance () {
		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		$params = array();
        parse_str($_POST['attendance_data'], $params);

        //echo "=========12model3=>>>>>>>>>>>>>>>. <pre>"; print_r($params); exit;

        $course_id = $params['course_id'];
        $attendance_date = $params['attendance_date'];

        $start_dt = $params['start_dt'];
        $end_dt = $params['end_dt'];

        $attendance = isset($params['attendance']) ? $params['attendance'] : array('0' => 0);

        //$this->db->select('row_id');
        $this->db->where('course_code' , $course_id);
        $this->db->where('attendance_date' , $attendance_date);
        $this->db->where('start_dt' , $start_dt);
        $this->db->where('end_dt' , $end_dt);
        $this->db->where_not_in('student_id', $attendance);
        $this->db->update('atc_attendances', array('modified_by' => $access_type['username'], 'attendance' => 'present'));

        //echo "<hr>=====>>update>>>>>>>>>"; echo $this->db->last_query();
        /*
        $updateToPresent = $this->db->get();

        if($attendance_record->num_rows()) {

        }
		*/
        
        foreach($attendance as $key => $val) {
        	$attendance_record = $this->db->get_where('atc_attendances', array('course_code' => $course_id, 'attendance_date' => $attendance_date, 'start_dt' => $start_dt, 'end_dt' => $end_dt, 'student_id' => $val));
        	if($attendance_record->num_rows()) {
        		$attendance_record_data = $attendance_record->row_array();

        		$this->db->where('attendance_id', $attendance_record_data['attendance_id']);
        		//$this->db->update('atc_attendances', array('course_code' => $course_id, 'attendance_date' => $attendance_date, 'start_dt' => $start_dt, 'end_dt' => $end_dt, 'student_id' => $val , 'attendance' => 'absent'));

        		$this->db->update('atc_attendances', array('modified_by' => $access_type['username'], 'attendance' => 'absent'));

        		//echo "<hr>=====>>foreach if>>>>>>>>>"; echo $this->db->last_query();
        	} else {
        		$this->db->insert('atc_attendances', array('course_code' => $course_id, 'attendance_date' => $attendance_date, 'start_dt' => $start_dt, 'end_dt' => $end_dt, 'student_id' => $val , 'created_by' => $access_type['username'], 'attendance' => 'absent'));

        		//echo "<hr>=====>>foreach if>>>>>>>>>"; echo $this->db->last_query();
        	}        	
        }
	}

}