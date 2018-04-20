<?PHP

class home_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }
    
    public function getJobList($offset=false,$favkey) {
        $q = "SELECT jp.*, CASE    
                    WHEN jf.job_favourites_id IS NULL THEN 0   
                    ELSE 1 END AS isFavourited "
                . " FROM job_postings jp"
                . " LEFT JOIN job_favourites jf					
                    ON jf.job_code = jp.job_code AND jf.favkey = '$favkey' "
                . " ORDER BY row_id DESC ";
       
        if (!empty($offset)){
//             echo $offset;die;
            	$q .= " LIMIT 4 OFFSET $offset";
        } else{
            $q .= " LIMIT 4";
        }
        
        $result = $this->query->select($q);
        if($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }    
    public function getSingleJobList($jobId) {
        $q = "SELECT * FROM job_postings WHERE row_id=$jobId";
        $result = $this->query->select($q);
        if($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function getAllJobKeyword() {
        $q = "SELECT job_keywords.title FROM job_keywords";
        $result = $this->query->select($q);
        if($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function getAllJobCities() {
        $q = "SELECT ems_cities.city_name FROM ems_cities";
        $result = $this->query->select($q);
        if($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    
     public function getSingleApplyJobDetails($jobId,$email,$phone) {
        $q = "SELECT * FROM job_interview_registrations WHERE job_code='".$jobId."' AND candicate_email = '".$email."' OR candicate_phone = '".$phone."'";
        $result = $this->query->select($q);
        if($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    
    public function countPage() {
        $q = "SELECT COUNT(row_id) as countPage FROM job_postings";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['countPage'];
        }
        return false;
    }
    
    public function addApplyJob($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO job_interview_registrations($columns) values($values)";
            $jobId = $this->query->insert($q);
            return $jobId;
        }
        return FALSE;
    }
    public function addFavouriteJob($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO job_favourites($columns) values($values)";
            $jobId = $this->query->insert($q);
            return $jobId;
        }
        return FALSE;
    }
     public function deleteFavouriteJob($job_code, $favkey) {
        $query = "DELETE FROM job_favourites WHERE job_code ='$job_code' AND favkey ='$favkey'";
        $result = $this->query->select($query);
        if ($result == 1) {
            //return $this->getPlacesDetails($id, $userid);
            return TRUE;
        }

        return false;
    }
    public function addApplyJobCode($params, $id) {
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE job_interview_registrations SET $columnsdesc WHERE row_id=$id";
            return $this->query->update($q);
        }
        return FALSE;
    }
}
?>