<?php 

class Atc_student_qualification_model extends MY_Model {
    
    public function insertinfo($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
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
}