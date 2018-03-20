<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function index()
	{
		//$this->render('home', 'full_width');
			$this->load->library('pagination');
				$config['base_url'] = base_url();
				$perpage=2;
				$config['per_page'] = $perpage;
                if(!isset($_REQUEST['p']) ){
                	$start=0;
                	$limit="limit 0, ".$perpage."";
                }
                else{
                	$start =($_REQUEST['p']-1)*$perpage ;
                	$limit= "limit ".$start.",".$perpage." ";
                }
                if(!empty($_REQUEST)){
                	$whr = ' WHERE 1=1';
                	if(isset($_REQUEST['department']) && $_REQUEST['department']!='') 
                  {

                      $data['department']= $_REQUEST['department'];
                   	  $whr .= " AND ems_departments.department_code='".$_REQUEST['department']."'";
                  }
                   	if(isset($_REQUEST['city']) && $_REQUEST['city']!='')
                    {
                       $data['city']= $_REQUEST['city'];
                   		$whr .= " AND cdac_cities.city_name='".$_REQUEST['city']."'";	
                   	}
                    if(isset($_REQUEST['title']) && $_REQUEST['title']!='')
                    {
                       $data['title']= $_REQUEST['title'];
                   		$whr .= " AND  ( job_postings.job_title LIKE '%".$_REQUEST['title']."%' OR job_postings.job_description LIKE '%".$_REQUEST['title']."%' ) ";	
                    }
                  }
                  else{
                    $whr= '';
                  }
                 $jobs_query= $this->db->query("SELECT job_postings.*, ems_departments.department_title, cdac_cities.city_name  FROM job_postings  LEFT JOIN ems_departments ON job_postings.department_code =  ems_departments.department_code 
               LEFT JOIN cdac_cities ON ems_departments.department_city=cdac_cities.city_id ".$whr." ".$limit."")->result();
                 $jobs_query1= $this->db->query("SELECT job_postings.*, ems_departments.department_title, cdac_cities.city_name  FROM job_postings  LEFT JOIN ems_departments ON job_postings.department_code =  ems_departments.department_code 
               LEFT JOIN cdac_cities ON ems_departments.department_city=cdac_cities.city_id ". $whr."")->result();
               $data['query_jobs'] =$jobs_query; 
               //echo $this->db->last_query();
            	$config['total_rows'] = count($jobs_query1);   	
				$this->pagination->initialize($config);
				$this->load->view('index.php',$data);
	}
  function filter($id){
    $this->load->library('pagination');
        $config['base_url'] = base_url();
        $perpage=2;
        $limit="limit 0, ".$perpage."";
       $jobs_query= $this->db->query("SELECT job_postings.*, ems_departments.department_title, cdac_cities.city_name  FROM job_postings  LEFT JOIN ems_departments ON job_postings.department_code =  ems_departments.department_code 
               LEFT JOIN cdac_cities ON ems_departments.department_city=cdac_cities.city_id WHERE job_postings.job_keyword= ".$id." ".$limit."")->result();
      
               $data['query_jobs'] =$jobs_query; 
               //echo $this->db->last_query();
              $config['total_rows'] = count($jobs_query);    
        $this->pagination->initialize($config);
        $this->load->view('index.php',$data);
  }
}
