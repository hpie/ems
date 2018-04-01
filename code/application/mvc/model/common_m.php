<?PHP

class common_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function get($table,$where='1=1') {
        $q = "SELECT * FROM $table WHERE $where";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
     public function insert($table,$params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO $table($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
     
    
    public function update($table,$params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE $table SET $columnsdesc WHERE city_id =$id";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }
}

?>