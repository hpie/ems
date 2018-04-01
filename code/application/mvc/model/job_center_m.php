<?PHP

class Job_center_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getcenter() {
        $q = "SELECT p.*,s.status_title,s.status_code,st.state_code,st.state_name,ct.city_id,ct.city_name 
             FROM  job_interview_centers p
             LEFT JOIN cdac_states st ON st.state_code=p.center_state
             LEFT JOIN cdac_cities ct ON ct.city_id=p.center_city
             LEFT JOIN cdac_status s ON p.status=s.status_code";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
     public function insert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO  job_postings($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
     public function get_center_detail($id) {
        $q = "SELECT p.*,s.status_title,s.status_code,st.state_code,st.state_name,ct.city_id,ct.city_name 
             FROM  job_interview_centers p
             LEFT JOIN cdac_states st ON st.state_code=p.center_state
             LEFT JOIN cdac_cities ct ON ct.city_id=p.center_city
             LEFT JOIN cdac_status s ON p.status=s.status_code WHERE p.center_code='$id'";;
              $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
    
    public function update_center($params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE job_interview_centers SET $columnsdesc WHERE center_code='$id'";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }
}

?>