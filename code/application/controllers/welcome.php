<?php

class Welcome extends MY_Controller {

	function Welcome()
	{
		//parent::Controller();	
		parent::__construct();
	}
	
	function index()
	{
		//$this->db->query("TRUNCATE TABLE daily");
		//$this->db->query("INSERT INTO daily VALUES ('',NOW(),'makan pagi','5000'),('',NOW(),'makan siang','6000'),('',NOW(),'makan malam','7000'),('',NOW(),'ngemil','8000'),('',NOW(),'minum','9000');");
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */