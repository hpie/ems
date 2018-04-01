<?PHP

class Department_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getDepartment() {
        $q = "SELECT p.*,st.state_name,st.state_code,s.status_title,s.status_code,ct.city_id,ct.city_name 
             FROM ems_departments p
             LEFT JOIN cdac_states st ON p.department_state=st.state_code
             LEFT JOIN cdac_cities ct ON p.department_city=ct.city_id 
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
            $q = "INSERT INTO cdac_cities($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
     public function getDepartmentdetail($id) {
        $q = "SELECT p.*,st.state_name,st.state_code,s.status_title,s.status_code,ct.city_id,ct.city_name 
             FROM ems_departments p
             LEFT JOIN cdac_states st ON p.department_state=st.state_code
             LEFT JOIN cdac_cities ct ON p.department_city=ct.city_id 
             LEFT JOIN cdac_status s ON p.status=s.status_code WHERE p.department_code='$id'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
    
    public function updatedepartment($params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE ems_departments SET $columnsdesc WHERE department_code='$id'";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }
}

?>