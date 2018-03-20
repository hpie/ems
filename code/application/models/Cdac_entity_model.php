<?php 

class Cdac_entity_model extends MY_Model {

    public function getAtc($start,$limit,$sidx,$sord,$where) {

        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

        if($access_type['acsess_to'] == "ARC") {
            $this->db->select('ce.*');
            $this->db->limit($limit);
            $this->db->where('ce.entity_parent_code', $access_type['entity_code']);
            if($where != NULL)$this->db->where($where,NULL,FALSE);
            $this->db->order_by($sidx." ".$sord);
            $data = $this->db->get('cdac_entities ce',$limit,$start);
        } else if($access_type['acsess_to'] == "CDAC") {
            $this->db->select('ce.*');
            $this->db->limit($limit);
            if($where != NULL)$this->db->where($where,NULL,FALSE);
            $this->db->order_by($sidx." ".$sord);
            $data = $this->db->get('cdac_entities ce',$limit,$start);
        }
        //echo "==========>>>>>>>>>>>>>>>>>>> <pre>". $this->db->last_query(); print_r($data->result()); exit;
        return $data->result();
    }

    public function getAllAtc($where = "") {

        $access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

        if($access_type['acsess_to'] == "ARC") {
            $this->db->select('ce.*');
            $this->db->where('ce.entity_parent_code', $access_type['entity_code']);
            if($where != NULL)$this->db->where($where,NULL,FALSE);
            $data = $this->db->get('cdac_entities ce');
        } else if($access_type['acsess_to'] == "CDAC") {
            $this->db->select('ce.*');
            if($where != NULL)$this->db->where($where,NULL,FALSE);
            $data = $this->db->get('cdac_entities ce');
        }
        return $data->result();
    }

}