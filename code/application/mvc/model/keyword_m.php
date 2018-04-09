<?PHP

class keyword_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getkeyword() {
        $q = "SELECT p.*,s.status_title,s.status_code FROM job_keywords p
              LEFT JOIN ems_status s ON p.status=s.status_code";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
     public function insert($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO job_keywords($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
     public function getKeyworddetail($id) {
        $q = "SELECT p.*,s.status_title,s.status_code FROM job_keywords p
            LEFT JOIN ems_status s ON p.status=s.status_code WHERE key_id='$id'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
    
    public function updatekeyword($params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE job_keywords SET $columnsdesc WHERE key_id =$id";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }
}

?>