<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function gist_email_send($to,$subject,$msg){
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "587";
		$config['smtp_user'] = "neha@hpie.in"; /*-- her  Email id --*/
		$config['smtp_pass'] = "78783Neha@123"; /*-- Password --*/
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);		
		$ci->email->from("neha@hpie.in","Neha");
		$ci->email->to($to);
		$ci->email->subject($subject);
		$ci->email->message($msg);
		//$this->email->attach($filepath);
		$ci->email->send();
		echo '<pre>';
		print($ci->email->print_debugger()); 
		 }