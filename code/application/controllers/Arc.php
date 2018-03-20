<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * For Blog purpose only
 */
class Arc extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// only login users can access Account controller
		$this->verify_login();
		
		// only logged in users haveing specific group membership can access Account controller
		//$this->verify_auth($group = 'members', $redirect_url = NULL);
		
		$this->load->library('form_builder');
		$this->push_breadcrumb('Arc');
	}

	public function index()
	{
		//redirect('student/item/1');
		redirect('arc/atcs');
		
	}

	public function item($blog_id)
	{
		$this->mViewData['blog_id'] = $demo_id;
		$this->render('student/item');
	}
	
	public function pagination()
	{
		// library from: application/libraries/MY_Pagination.php
		// config from: application/config/pagination.php
		$this->load->library('pagination');
		$this->mViewData['pagination'] = $this->pagination->render(200, 20);
		$this->render('common/pagination');
	}

	
	public function atcs()
	{
		$page = $this->input->get('p');
		$page = empty($page) ? 1 : $page;

		$this->load->model('cdac_atc_model', 'center');
		
		//TODO: get results for login user for ATC / ARC / CDAC
		//with clause is used to get mapped models 
		$results = $this->center->paginate($page);
		$centers = $results['data'];
		$counts = $results['counts'];
		
		// call render() from MY_Pagination
		$this->load->library('pagination');
		$pagination = $this->pagination->render($counts['total_num'], $counts['limit']);

		$this->mViewData['centers'] = $centers;
		$this->mViewData['counts'] = $counts;
		$this->mViewData['pagination'] = $pagination;
		$this->render('arc/atclist');
	}
	
	public function enquiries()
	{
		$page = $this->input->get('p');
		$page = empty($page) ? 1 : $page;

		$this->load->model('atc_student_enquiry_model', 'enquiry');
		
		//TODO: get results for login user for ATC / ARC / CDAC
		//with clause is used to get mapped models 
		$results = $this->enquiry->with('center')->with('course')->paginate($page);
		$enquiries = $results['data'];
		$counts = $results['counts'];
		
		// call render() from MY_Pagination
		$this->load->library('pagination');
		$pagination = $this->pagination->render($counts['total_num'], $counts['limit']);

		$this->mViewData['enquiries'] = $enquiries;
		$this->mViewData['counts'] = $counts;
		$this->mViewData['pagination'] = $pagination;
		$this->render('arc/enquirylist');
	}
		
	public function registrations()
	{
		$this->render('arc/registrationlist');
	}

	public function getStudent()
	{
		$this->load->model('atc_student_registration_model', 'registration');
		$registrations = $this->registration->getStudent($this->input->post('student_id'));
		$this->load->view('arc/student_info', array('registrations'=>$registrations));
	}

	public function getStudentDocsImg()
	{
		$this->load->model('atc_student_registration_model', 'registration');
		$studentDocs = $this->registration->getStudentDocsImg($this->input->post('student_id'));
		$this->load->view('arc/student_docs_img', array('documentimg'=>$studentDocs));
	}

	public function getStudentDocs()
	{
		$this->load->model('atc_student_registration_model', 'registration');
		$studentDocs = $this->registration->getStudentDocs($this->input->post('student_id'));
		$this->load->view('arc/student_docs', array('documentlist'=>$studentDocs));
	}

	public function updateDocStatus()
	{
		$this->load->model('atc_student_registration_model', 'registration');
		$this->registration->updateDocStatus();
		//$studentDocs = $this->registration->getStudentDocs($this->input->post('student_id'));
		//$this->load->view('arc/student_docs', array('documentlist'=>$studentDocs));
	}



	function loadRegistrationData() {
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
		$limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
		$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$start = ($start<0)?0:$start;  // make sure that $start is not a negative value

		$where = ""; //if there is no search request sent by jqgrid, $where should be empty
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper']: false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

        if ($_POST['_search'] == 'true') {
            $ops = array(
            'eq'=>'=', //equal
            'ne'=>'<>',//not equal
            'lt'=>'<', //less than
            'le'=>'<=',//less than or equal
            'gt'=>'>', //greater than
            'ge'=>'>=',//greater than or equal
            'bw'=>'LIKE', //begins with
            'bn'=>'NOT LIKE', //doesn't begin with
            'in'=>'LIKE', //is in
            'ni'=>'NOT LIKE', //is not in
            'ew'=>'LIKE', //ends with
            'en'=>'NOT LIKE', //doesn't end with
            'cn'=>'LIKE', // contains
            'nc'=>'NOT LIKE'  //doesn't contain
            );

            foreach ($ops as $key=>$value){
                if ($searchOper==$key) {
                    $ops = $value;
                }
            }
            if($searchOper == 'eq' ) $searchString = $searchString;
            if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
            if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
            if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

            $where = "$searchField $ops '$searchString' ";
        }

		if(!$sidx) $sidx =1;
        
		
   		$this->load->model('atc_student_registration_model', 'registration');

		$registrations = $this->registration->getRegistrations($start,$limit,$sidx,$sord,$where);

		$count = count($this->registration->getAllRegistrations());

		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);    //calculating total number of pages
		} else {
			$total_pages = 0;
		}

		if ($page > $total_pages) $page=$total_pages;
		$response['page'] = $page;
		$response['total'] = $total_pages;
		$response['records'] = $count;
		foreach($registrations as $key => $val) {
			$response['rows'][$key]['id'] = $val['student_id'];

			$response['rows'][$key]['cell'] = array($val['student_id'], $val['first_name'] ." ". $val['last_name'], $val['entity_code'], $val['student_status'], $val['registered_email'], $val['admission_dt']);
		}
		echo json_encode($response);
  	}

  	function loadRegistrationDataSingle() {
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
		$limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
		$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$start = ($start<0)?0:$start;  // make sure that $start is not a negative value

		$where = ""; //if there is no search request sent by jqgrid, $where should be empty
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper']: false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

        
		if(!$sidx) $sidx =1;        
		
   		$this->load->model('atc_student_registration_model', 'registration');

		$registrations = $this->registration->getStudentSingle($_POST['student_id']);

		$response['page'] = 1;
		$response['total'] = 1;
		$response['records'] = 1;
		$i = 1; $j = 0;

		foreach($registrations as $key => $val) {
			if($i == 1) {
				$response['rows'][$j]['id'] = $_POST['student_id']."_".$j;
			}

			$response['rows'][$j]['cell'][$i."_label"] = ucfirst(str_replace('_', ' ',$key));
			$response['rows'][$j]['cell'][$i."_val"] = $val;

			if(($i++ % 3) == 0) {
				$i = 1;
				$j++;
			}
		}
		//echo "==========>>>>>>>>>>> <pre>"; print_r($response); exit;
		echo json_encode($response);
  	}

  	

  	public function updateRegistrationDataSingle()
	{
		$fields = $this->db->field_data('atc_student_registrations');
		$fields_names = array();
		foreach($fields as $field) {
			$fields_names[] = $field->name;
		}

		$studentArr = explode('_', $_POST['id']); // get the student id and row number

		$student_id = $studentArr[0];
		$row = $studentArr[1];
		$first_col = $row * 3;

		$parameters = array();
		if(isset($_POST['1_val'])) 
			$parameters[$fields_names[$first_col]] = $_POST['1_val'];

		if(isset($_POST['2_val'])) 
			$parameters[$fields_names[$first_col + 1]] = $_POST['2_val'];

		if(isset($_POST['3_val'])) 
			$parameters[$fields_names[$first_col + 2]] = $_POST['3_val'];


		$this->db->where('student_id',$student_id);

		$this->db->update('atc_student_registrations', $parameters);
	}

  	// Issued Books with the ATC
	public function book_issue_log()
	{
		$this->render('arc/bookissuelist');
	}

	public function book_issue_update()
	{
		$this->db->where('row_id',$_POST['id']);
		$this->db->update('atc_student_book_issue_logs', array('issue_status' => $_POST['issue_status']));
	}

	function loadBookIssueData() {
		
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
		$limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
		$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$start = ($start<0)?0:$start;  // make sure that $start is not a negative value

		$where = ""; //if there is no search request sent by jqgrid, $where should be empty
		
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper']: false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

        if ($_POST['_search'] == 'true') {
            $ops = array(
            'eq'=>'=', //equal
            'ne'=>'<>',//not equal
            'lt'=>'<', //less than
            'le'=>'<=',//less than or equal
            'gt'=>'>', //greater than
            'ge'=>'>=',//greater than or equal
            'bw'=>'LIKE', //begins with
            'bn'=>'NOT LIKE', //doesn't begin with
            'in'=>'LIKE', //is in
            'ni'=>'NOT LIKE', //is not in
            'ew'=>'LIKE', //ends with
            'en'=>'NOT LIKE', //doesn't end with
            'cn'=>'LIKE', // contains
            'nc'=>'NOT LIKE'  //doesn't contain
            );

            foreach ($ops as $key=>$value) {
                if ($searchOper==$key) {
                    $ops = $value;
                }
            }
            if($searchOper == 'eq' ) $searchString = $searchString;
            if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
            if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
            if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

            $where = "$searchField $ops '$searchString' ";
        }
		
		if(!$sidx) $sidx =1;
        
		
   		$this->load->model('atc_student_book_issue_log_model', 'issuebook');

   		$issuebook = $this->issuebook->getIssueBook($start,$limit,$sidx,$sord,$where);
		
		$count = count($this->issuebook->getAllIssueBooks($where));

		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);    //calculating total number of pages
		} else {
			$total_pages = 0;
		}

		if ($page > $total_pages) $page=$total_pages;

		$response['page'] = $page;
		$response['total'] = $total_pages;
		$response['records'] = $count;
		
		
		foreach($issuebook as $key => $val) {
			$response['rows'][$key]['id'] = $val->row_id;

			$response['rows'][$key]['cell'] = array($val->row_id, $val->student_id, $val->entity_code, $val->course_code, $val->module_code, $val->book_code, $val->issue_status, $val->book_issue_dt, $val->created_by, $val->created_dt, $val->modified_by, $val->modified_dt);
		}
		
		echo json_encode($response);
		exit;
  	}

  	// Student Enrollments with the ATC
	public function enrollments()
	{
		$this->render('arc/studentenrollmentlist');
	}

	function enrolledCourseData() {
		
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
		$limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
		$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$start = ($start<0)?0:$start;  // make sure that $start is not a negative value

		$where = ""; //if there is no search request sent by jqgrid, $where should be empty
		
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper']: false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

        if ($_POST['_search'] == 'true') {
            $ops = array(
            'eq'=>'=', //equal
            'ne'=>'<>',//not equal
            'lt'=>'<', //less than
            'le'=>'<=',//less than or equal
            'gt'=>'>', //greater than
            'ge'=>'>=',//greater than or equal
            'bw'=>'LIKE', //begins with
            'bn'=>'NOT LIKE', //doesn't begin with
            'in'=>'LIKE', //is in
            'ni'=>'NOT LIKE', //is not in
            'ew'=>'LIKE', //ends with
            'en'=>'NOT LIKE', //doesn't end with
            'cn'=>'LIKE', // contains
            'nc'=>'NOT LIKE'  //doesn't contain
            );

            foreach ($ops as $key=>$value) {
                if ($searchOper==$key) {
                    $ops = $value;
                }
            }
            if($searchOper == 'eq' ) $searchString = $searchString;
            if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
            if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
            if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

            $where = "$searchField $ops '$searchString' ";
        }
		
		if(!$sidx) $sidx =1;
		
   		$this->load->model('atc_student_enrolment_model', 'cousre');

   		$enrollcourse = $this->cousre->getEnrolledCourse($start,$limit,$sidx,$sord,$where);
		
		$count = count($this->cousre->getAllEnrolledCourse($where));

		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);    //calculating total number of pages
		} else {
			$total_pages = 0;
		}

		if ($page > $total_pages) $page=$total_pages;

		$response['page'] = $page;
		$response['total'] = $total_pages;
		$response['records'] = $count;
		
		//echo "========== <pre>"; print_r($enrollcourse);exit;
		foreach($enrollcourse as $key => $val) {
			$response['rows'][$key]['id'] = $val->enrolment_id;

			$response['rows'][$key]['cell'] = array($val->enrolment_id, $val->student_id, $val->course_name, $val->course_description, '', '', $val->start_dt, $val->end_dt, $val->enrollment_type, $val->enrolment_status, $val->created_by, $val->created_dt, $val->modified_by, $val->modified_dt);
		}
		
		echo json_encode($response);
		exit;
  	}

  	public function enrollment_update()
	{
		$this->db->where('enrolment_id',$_POST['id']);
		$this->db->update('atc_student_enrolments', array('enrolment_status' => $_POST['status']));
	}

	// Course with cdac
	public function courses()
	{
		$this->render('arc/courselist');
	}

	function coursesData() {
		
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
		$limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
		$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$start = ($start<0)?0:$start;  // make sure that $start is not a negative value

		$where = ""; //if there is no search request sent by jqgrid, $where should be empty
		
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper']: false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

        if ($_POST['_search'] == 'true') {
            $ops = array(
        'eq'=>'=', //equal
            'ne'=>'<>',//not equal
            'lt'=>'<', //less than
            'le'=>'<=',//less than or equal
            'gt'=>'>', //greater than
            'ge'=>'>=',//greater than or equal
            'bw'=>'LIKE', //begins with
            'bn'=>'NOT LIKE', //doesn't begin with
            'in'=>'LIKE', //is in
            'ni'=>'NOT LIKE', //is not in
            'ew'=>'LIKE', //ends with
            'en'=>'NOT LIKE', //doesn't end with
            'cn'=>'LIKE', // contains
            'nc'=>'NOT LIKE'  //doesn't contain
            );

            foreach ($ops as $key=>$value) {
                if ($searchOper==$key) {
                    $ops = $value;
                }
            }
            if($searchOper == 'eq' ) $searchString = $searchString;
            if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
            if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
            if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

            $where = "$searchField $ops '$searchString' ";
        }
		
		if(!$sidx) $sidx =1;
        
		
   		$this->load->model('cdac_course_model', 'cousre');

   		$course = $this->cousre->getCourse($start,$limit,$sidx,$sord,$where);
		
		$count = count($this->cousre->getAllCourse($where));

		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);    //calculating total number of pages
		} else {
			$total_pages = 0;
		}

		if ($page > $total_pages) $page=$total_pages;

		$response['page'] = $page;
		$response['total'] = $total_pages;
		$response['records'] = $count;
		
		//echo "==============>>>>>>>>>>> <pre>"; print_r($course); exit;

		$i = 1;
		foreach($course as $key => $val) {
			$response['rows'][$key]['id'] = $val->row_id;

			//$response['rows'][$key]['cell'] = array($val->row_id, $val->entity_code, $val->course_name, $val->course_description, $val->course_status, $val->course_category,  'View Modules', $val->course_category_description);

			$response['rows'][$key]['cell'] = array($val->row_id, $val->entity_code, $val->course_name, $val->course_description, $val->course_status, '',  'View Modules', '');
		}

		//echo "==============>>>>>>>>>>> <pre>"; print_r($response); exit;
		
		echo json_encode($response);
		exit;
  	}

  	public function getCourseModules()
	{
		$this->load->model('cdac_course_model', 'course');
		$courseModules = $this->course->getCourseModules($this->input->post('id'));
		$this->load->view('arc/course_modules', array('modulelist'=>$courseModules));
	}

  	// Centers with cdac
	public function centers()
	{
		$this->render('arc/atclist_new');
	}

	function atcData() {
		
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
		$limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
		$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$start = ($start<0)?0:$start;  // make sure that $start is not a negative value

		$where = ""; //if there is no search request sent by jqgrid, $where should be empty
		
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper']: false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

        if ($_POST['_search'] == 'true') {
            $ops = array(
            'eq'=>'=', //equal
            'ne'=>'<>',//not equal
            'lt'=>'<', //less than
            'le'=>'<=',//less than or equal
            'gt'=>'>', //greater than
            'ge'=>'>=',//greater than or equal
            'bw'=>'LIKE', //begins with
            'bn'=>'NOT LIKE', //doesn't begin with
            'in'=>'LIKE', //is in
            'ni'=>'NOT LIKE', //is not in
            'ew'=>'LIKE', //ends with
            'en'=>'NOT LIKE', //doesn't end with
            'cn'=>'LIKE', // contains
            'nc'=>'NOT LIKE'  //doesn't contain
            );

            foreach ($ops as $key=>$value) {
                if ($searchOper==$key) {
                    $ops = $value;
                }
            }
            if($searchOper == 'eq' ) $searchString = $searchString;
            if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
            if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
            if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

            $where = "$searchField $ops '$searchString' ";
        }
		
		if(!$sidx) $sidx =1;
        
		
   		$this->load->model('cdac_entity_model', 'cousre');

   		$atc = $this->cousre->getAtc($start,$limit,$sidx,$sord,$where);
		
		$count = count($this->cousre->getAllAtc($where));

		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);    //calculating total number of pages
		} else {
			$total_pages = 0;
		}

		if ($page > $total_pages) $page=$total_pages;

		$response['page'] = $page;
		$response['total'] = $total_pages;
		$response['records'] = $count;
		
		//echo "==============>>>>>>>>>>> <pre>"; print_r($course); exit;

		$i = 1;
		foreach($atc as $key => $val) {
			$response['rows'][$key]['id'] = $val->entity_code;

			$response['rows'][$key]['cell'] = array($val->entity_code, $val->entity_name, $val->entity_grade, $val->entity_parent_code, $val->entity_status, $val->entity_address_line1, $val->entity_address_line2, $val->entity_address_city, $val->entity_address_postcode, $val->entity_contact_number, $val->entity_contact_email, $val->created_by);
		}

		//echo "==============>>>>>>>>>>> <pre>"; print_r($response); exit;
		
		echo json_encode($response);
		exit;
  	}

  	// Course with cdac
	public function couriers()
	{
		$this->render('arc/courierlist');
	}

	function courierData() {
		
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
		$limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
		$sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
		$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$start = ($start<0)?0:$start;  // make sure that $start is not a negative value

		$where = ""; //if there is no search request sent by jqgrid, $where should be empty
		
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper']: false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

        if ($_POST['_search'] == 'true') {
            $ops = array(
            'eq'=>'=', //equal
            'ne'=>'<>',//not equal
            'lt'=>'<', //less than
            'le'=>'<=',//less than or equal
            'gt'=>'>', //greater than
            'ge'=>'>=',//greater than or equal
            'bw'=>'LIKE', //begins with
            'bn'=>'NOT LIKE', //doesn't begin with
            'in'=>'LIKE', //is in
            'ni'=>'NOT LIKE', //is not in
            'ew'=>'LIKE', //ends with
            'en'=>'NOT LIKE', //doesn't end with
            'cn'=>'LIKE', // contains
            'nc'=>'NOT LIKE'  //doesn't contain
            );

            foreach ($ops as $key=>$value) {
                if ($searchOper==$key) {
                    $ops = $value;
                }
            }
            if($searchOper == 'eq' ) $searchString = $searchString;
            if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
            if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
            if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

            $where = "$searchField $ops '$searchString' ";
        }
		
		if(!$sidx) $sidx =1;
        
		
   		$this->load->model('cdac_courier_model', 'courier');

   		$courier = $this->courier->getCourier($start,$limit,$sidx,$sord,$where);
		
		$count = count($this->courier->getAllCourier($where));

		if( $count > 0 ) {
			$total_pages = ceil($count/$limit);    //calculating total number of pages
		} else {
			$total_pages = 0;
		}

		if ($page > $total_pages) $page=$total_pages;

		$response['page'] = $page;
		$response['total'] = $total_pages;
		$response['records'] = $count;
		
		//echo "==============>>>>>>>>>>> <pre>"; print_r($courier); exit;

		$i = 1;
		foreach($courier as $key => $val) {
			$response['rows'][$key]['id'] = $val->row_id;

			$response['rows'][$key]['cell'] = array($val->row_id, $val->docket_code, $val->carrier_name, $val->url, $val->requesting_entity_code, $val->requested_entity_code, $val->courier_status, $val->package_sent_dt, $val->package_content_details, $val->comments, $val->package_received_dt, $val->created_by);
		}

		//echo "==============>>>>>>>>>>> <pre>"; print_r($response); exit;
		
		echo json_encode($response);
		exit;
  	}
        //document load
    public function documents() {
        $this->render('arc/documentlist');
    }

    public function getUploadDoc() {
        $document_id = $this->input->post('document_id');
        $this->load->view('arc/documentupload', array('document_id' => $document_id));
    }

    public function updatedoc() {
        if (isset($_FILES) && !empty($_FILES['qualification_doc']['name'])) {
            $doc_id = $this->input->post('doc_id');
            $this->load->model('atc_student_registration_model', 'atc_student_documents');
            $studentDocs = $this->atc_student_documents->getStudentDocsByDocId($doc_id);
            $res_data = $this->add_document('qualification_doc', 'qualification_doc', array('jpeg', 'jpg', 'png'), $studentDocs['student_id']);

            if (isset($res_data['upload_data']) && $res_data['upload_data'] != '') {

                $image_data = array(
                    'document_name' => $res_data['upload_data']['file_name']
                );
                $this->db->where('id', $doc_id);
                $this->db->update('atc_student_documents', $image_data);
                echo json_encode(array('success' => '1', 'msg' => 'Document Updated successfully'));
            } else {
                echo json_encode(array('success' => '0', 'msg' => $res_data['error']));
            }
        } else {
            echo json_encode(array('success' => '0', 'msg' => 'Please select image for profile'));
        }
    }

    function loadDocumentsData() {

        $page = isset($_POST['page']) ? $_POST['page'] : 1; // get the requested page
        $limit = isset($_POST['rows']) ? $_POST['rows'] : 10; // get how many rows we want to have into the grid
        $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'name'; // get index row - i.e. user click to sort
        $sord = isset($_POST['sord']) ? $_POST['sord'] : ''; // get the direction

        $start = $limit * $page - $limit; // do not put $limit*($page - 1)
        $start = ($start < 0) ? 0 : $start;  // make sure that $start is not a negative value

        $where = ""; //if there is no search request sent by jqgrid, $where should be empty

        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

        if ($_POST['_search'] == 'true') {
            $ops = array(
                'eq' => '=', //equal
                'ne' => '<>', //not equal
                'lt' => '<', //less than
                'le' => '<=', //less than or equal
                'gt' => '>', //greater than
                'ge' => '>=', //greater than or equal
                'bw' => 'LIKE', //begins with
                'bn' => 'NOT LIKE', //doesn't begin with
                'in' => 'LIKE', //is in
                'ni' => 'NOT LIKE', //is not in
                'ew' => 'LIKE', //ends with
                'en' => 'NOT LIKE', //doesn't end with
                'cn' => 'LIKE', // contains
                'nc' => 'NOT LIKE'  //doesn't contain
            );

            foreach ($ops as $key => $value) {
                if ($searchOper == $key) {
                    $ops = $value;
                }
            }
            if ($searchOper == 'eq')
                $searchString = $searchString;
            if ($searchOper == 'bw' || $searchOper == 'bn')
                $searchString .= '%';
            if ($searchOper == 'ew' || $searchOper == 'en')
                $searchString = '%' . $searchString;
            if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
                $searchString = '%' . $searchString . '%';

            $where = "$searchField $ops '$searchString' ";
        }

        if (!$sidx)
            $sidx = 1;


        $this->load->model('atc_student_registration_model', 'documents');

        $issuebook = $this->documents->getDocument($start, $limit, $sidx, $sord, $where);

        $count = count($this->documents->getAllDocuments($where));

        if ($count > 0) {
            $total_pages = ceil($count / $limit);    //calculating total number of pages
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages)
            $page = $total_pages;

        $response['page'] = $page;
        $response['total'] = $total_pages;
        $response['records'] = $count;


        foreach ($issuebook as $key => $val) {
            $response['rows'][$key]['id'] = $val->document_id;

            $response['rows'][$key]['cell'] = array($val->document_id, $val->student_id, $val->document_name, $val->document_type, $val->center_code, $val->status, $val->created_by);
        }

        echo json_encode($response);
        exit;
    }

    public function Document_update() {
        $this->db->where('id', $_POST['id']);
        $this->db->update('atc_student_documents', array('status' => $_POST['status']));
    }

    /*
    *   Start attendance section
    */

    // Course with cdac
    public function attendance() 
    {
        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

        $this->load->model('atc_attendance_model', 'cousre');

        $courses = $this->cousre->getAllCourse();

        $this->mViewData['course_data'] = $courses;
        $this->render('arc/attendance_course');
    }

    public function coursecalendar() {
        $this->load->model('atc_attendance_model', 'cousre');
        $get_course_students = $this->cousre->getAllStudents();

        $this->load->model('atc_attendance_model', 'attendance');
        $courseAttendance = $this->attendance->getCourseAttendance(); 

        for($i = 0 ; $i < 100 ; $i++) 
        {
            $students[$i]['id'] = str_pad($i+1, 3, '0', STR_PAD_LEFT); 
            $students[$i]['name'] = 'student'.str_pad($i+1, 3, '0', STR_PAD_LEFT); 
        }

        $this->mViewData['courseAttendance'] = $courseAttendance;
        $this->mViewData['students'] = $get_course_students;
        $this->mViewData['students_demo'] = $students;
        $this->render('arc/coursecalendar');
    }

    public function getAttendance() 
    {
        if($_POST) 
        {
            $this->load->model('atc_attendance_model', 'attendance');
            $course = $this->attendance->getAttendance();            
        }    
    }

    public function save_attendance() 
    {
        if($_POST) 
        {
            $params = array();
        parse_str($_POST['attendance_data'], $params);
            $start_date = date('Y-m-d');

            $now = time(); // or your date as well
            $attendance_date = strtotime($params['attendance_date']);
            $datediff = $now - $attendance_date;

            $dayDiff = floor($datediff / (60 * 60 * 24));

            if($dayDiff > 0 && $dayDiff < 7) {
                $this->load->model('atc_attendance_model', 'attendance');           
                $course = $this->attendance->save_attendance();

                echo 1;
            } else {
                echo $dayDiff;
            }
        }   
    }

    public function get_attendance() 
    {
        if($_POST) 
        {
            $this->load->model('atc_attendance_model', 'attendance');
            $course = $this->attendance->getCourseAttendance(); 

            $data = array();
            foreach($course as $key => $calendarAttendance) 
            {
                $data[$key]['title'] = $calendarAttendance['student_id'];
                $data[$key]['start'] = $calendarAttendance['attendance_date'];
                $data[$key]['end'] = $calendarAttendance['attendance_date'];
            }
            echo json_encode($data);
        }   
    }

    /*
    *   End attendance section
    */

}
