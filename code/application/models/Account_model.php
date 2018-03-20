<?php

class Account_model extends MY_Model {

    function getNotificationType($entity_code){
        $this->db->select("*");
        $this->db->from('cdac_categories');
        $this->db->where('category_type' , 'NOT-TYP');
        $this->db->where('category_status' , 'A');
        $queryData = $this->db->get();
        if ($queryData->num_rows() > 0) {
            $data = $queryData->result_array();
            foreach($data as $key=>$value){
                $this->db->select("notification_count,row_id");
                $this->db->from('entity_notifications');
                $this->db->where('notification_code', $value['category_code']);
                $this->db->where('entity_code', $entity_code);
                $countData = $this->db->get();
                if ($countData->num_rows() > 0) {
                    $countD = $countData->row_array();
                    $count = $countD['notification_count'];
                }else{
                    $count = 0;
                }
                if(isset($countD['row_id'])){
                $data[$key]['notification_id'] = $countD['row_id'];
                }else{
                    $data[$key]['notification_id']='';
                }
                $data[$key]['count'] = $count;
            }
            return $data;
        } else {
            return false;
        }
    }
    
    public function updateinfo($table, $where, $data) {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

}
