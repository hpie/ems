<?PHP

class Job_interview_registration_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getemployee() {
        $q = "SELECT p.*,s.status_title,s.status_code,dep.department_code,dep.department_title,
              job.row_id,job.job_code,job.job_title   
             FROM  job_interview_registrations p
             LEFT JOIN ems_departments dep ON p.department_code=dep.department_code
             LEFT JOIN job_postings job ON p.job_code=job.row_id
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
            $q = "INSERT INTO job_interview_registrations($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
     public function getEmployeedetail($id) {
        $q = $q = "SELECT p.*,s.status_title,s.status_code,dep.department_code,dep.department_title,
              job.row_id,job.job_code,job.job_title   
             FROM  job_interview_registrations p
             LEFT JOIN ems_departments dep ON p.department_code=dep.department_code
             LEFT JOIN job_postings job ON p.offer_id=job.row_id
             LEFT JOIN cdac_status s ON p.status=s.status_code WHERE p.employee_id='$id'";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
    
    public function updateemployee($params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE job_interview_registrations SET $columnsdesc WHERE employee_id='$id'";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }
}

?>