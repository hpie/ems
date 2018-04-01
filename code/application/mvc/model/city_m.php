<?PHP

class city_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getCity() {
        $q = "SELECT p.*,c.state_name,c.state_code,s.status_title,s.status_code FROM cdac_cities p
             LEFT JOIN cdac_states c
             ON p.state_code=c.state_code LEFT JOIN cdac_status s ON p.status=s.status_code";
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
     public function getCitydetail($id) {
        $q = "SELECT p.*,c.state_name,c.state_code,s.status_title,s.status_code FROM cdac_cities p
             LEFT JOIN cdac_states c
             ON p.state_code=c.state_code LEFT JOIN cdac_status s ON p.status=s.status_code WHERE city_id='$id'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
    
    public function updatecity($params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE cdac_cities SET $columnsdesc WHERE city_id =$id";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }
}

?>