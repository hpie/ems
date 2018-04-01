<?PHP

class states_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getstate() {
        $q = "SELECT * FROM cdac_states";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    
      public function insert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO cdac_states($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
    
    public function getStatedetail($id) {
        $q = "SELECT p.*,s.status_title,s.status_code FROM cdac_states p
            LEFT JOIN cdac_status s ON p.status=s.status_code WHERE state_code='$id'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
     public function updatestate($params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE cdac_states SET $columnsdesc WHERE state_code ='$id'";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }
}

?>