<?PHP

class Job_posting_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getjob() {
        $q = "SELECT p.*,s.status_title,s.status_code,dep.department_code,dep.department_title 
             FROM  job_postings p
             LEFT JOIN ems_departments dep ON dep.department_code=p.department_code
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
            $q = "INSERT INTO  job_postings($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
     public function get_job_detail($id) {
        $q = "SELECT p.*,s.status_title,s.status_code,dep.department_code,dep.department_title 
             FROM  job_postings p
             LEFT JOIN ems_departments dep ON dep.department_code=p.department_code
             LEFT JOIN ems_status s ON p.status=s.status_code";
              $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
    
    public function updateJob_posting($params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE job_postings SET $columnsdesc WHERE row_id='$id'";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }
}

?>