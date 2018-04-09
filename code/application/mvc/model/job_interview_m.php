<?PHP

class Job_interview_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getjob() {
        $q = "SELECT p.*,s.status_title,s.status_code,dep.department_code,dep.department_title,j_pos.job_code,
              j_pos.job_title,cen.center_code,cen.center_title
             FROM  job_interview_schedules p
             LEFT JOIN ems_departments dep ON dep.department_code=p.department_code
             LEFT JOIN job_postings j_pos ON j_pos.row_id=p.job_code
             LEFT JOIN job_interview_centers cen ON cen.center_code=p.center_code
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
         $q = "SELECT p.*,s.status_title,s.status_code,dep.department_code,dep.department_title,j_pos.row_id,
              j_pos.job_title,cen.center_code,cen.center_title
             FROM  job_interview_schedules p
             LEFT JOIN ems_departments dep ON dep.department_code=p.department_code
             LEFT JOIN job_postings j_pos ON j_pos.row_id=p.job_code
             LEFT JOIN job_interview_centers cen ON cen.center_code=p.center_code
             LEFT JOIN ems_status s ON p.status=s.status_code WHERE  interview_schedule_id= '$id'";
              $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }  
    
    public function updateJob_posting($params,$id) {       
        $columnsdesc = $this->updateMaker($params,$id);
        if ($columnsdesc) {
            $q = "UPDATE  job_interview_schedules SET $columnsdesc WHERE  interview_schedule_id='$id'";
            print_r ($q) ;                
            return $this->query->update($q);           
        }
        return FALSE;    
    }}

?>