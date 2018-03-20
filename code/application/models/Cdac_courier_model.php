<?php 

class Cdac_courier_model extends MY_Model {
	public function getCourier($start,$limit,$sidx,$sord,$where) {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		//echo "==========>>>>>>>>>>>>>>>>>>> <pre>". $this->db->last_query(); print_r($access_type); exit;

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('c.*, cc.carrier_name, cc.carrier_url');
			$this->db->limit($limit);
			$this->db->join('courier_carriers cc', 'cc.carrier_code = c.carrier_code', 'left');
			$this->db->join('cdac_entities ce', 'ce.entity_code = c.requesting_entity_code OR ce.entity_code = c.requested_entity_code', 'left');
			$this->db->where('ce.entity_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('couriers c',$limit,$start);
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('c.*, cc.carrier_name, cc.carrier_url');
			$this->db->limit($limit);
			$this->db->join('courier_carriers cc', 'cc.carrier_code = c.carrier_code', 'left');
			$this->db->join('cdac_entities ce', 'ce.entity_code = c.requesting_entity_code OR ce.entity_code = c.requested_entity_code', 'left');
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('couriers c',$limit,$start);
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('c.*, cc.carrier_name, cc.carrier_url');
			$this->db->limit($limit);
			$this->db->join('courier_carriers cc', 'cc.carrier_code = c.carrier_code', 'left');
			if($where != NULL)$this->db->where($where,NULL,FALSE);
		    $this->db->order_by($sidx." ".$sord);
			$data = $this->db->get('couriers c',$limit,$start);
		}
		//echo "==========>>>>>>>>>>>>>>>>>>> <pre>". $this->db->last_query();print_r($access_type); print_r($data->result()); exit;
		return $data->result();
	}

	public function getAllCourier($where = "") {

		$access_type = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'email' => $this->session->userdata('email'))) -> row_array();

		if($access_type['acsess_to'] == "ATC") {
			$this->db->select('c.*, cc.carrier_name, cc.carrier_url');
			$this->db->join('courier_carriers cc', 'cc.carrier_code = c.carrier_code', 'left');
			$this->db->join('cdac_entities ce', 'ce.entity_code = c.requesting_entity_code OR ce.entity_code = c.requested_entity_code', 'left');
			$this->db->where('ce.entity_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('couriers c');
		} else if($access_type['acsess_to'] == "ARC") {
			$this->db->select('c.*, cc.carrier_name, cc.carrier_url');
			$this->db->join('courier_carriers cc', 'cc.carrier_code = c.carrier_code', 'left');
			$this->db->join('cdac_entities ce', 'ce.entity_code = c.requesting_entity_code OR ce.entity_code = c.requested_entity_code', 'left');
			$this->db->where('ce.entity_parent_code', $access_type['entity_code']);
			if($where != NULL)$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('couriers c');
		} else if($access_type['acsess_to'] == "CDAC") {
			$this->db->select('c.*');
			if($where != NULL)$this->db->where($where,NULL,FALSE);
			$data = $this->db->get('couriers c');
		}
		return $data->result();
	}
}