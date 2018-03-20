<?php
class MDaily extends MY_Model{
	
  //function __construct (){
  //  parent::Model();
  //}

  function getAll(){
    $this->db->select('row_id,student_id,course_code,book_code,book_issue_dt,issue_status');
    $this->db->from('atc_student_book_issue_logs');
    $this->db->limit(10);
    $this->db->order_by('student_id','ASC');
    $query = $this->db->get();

    return $query->result();
  }

  function getAllGrid($start,$limit,$sidx,$sord,$where){
    $this->db->select('id,date,name,amount');
    $this->db->limit($limit);
    if($where != NULL)$this->db->where($where,NULL,FALSE);
    $this->db->order_by($sidx,$sord);
    $query = $this->db->get('daily',$limit,$start);

    return $query->result();
  }

  function get($id){
    $query = $this->db->getwhere('daily',array('id'=>$id));
    return $query->row_array();
  }

  function save(){
    $date = $this->input->post('date');
    $name = $this->input->post('name');
    $amount=$this->input->post('amount');
    $data = array(
      'date'=>$date,
      'name'=>$name,
      'amount'=>$amount
    );
    $this->db->insert('daily',$data);
  }

  function update(){
    $id   = $this->input->post('id');
    $date = $this->input->post('date');
    $name = $this->input->post('name');
    $amount=$this->input->post('amount');
    $data = array(
      'date'=>$date,
      'name'=>$name,
      'amount'=>$amount
    );
    $this->db->where('id',$id);
    $this->db->update('daily',$data);
  }

}

