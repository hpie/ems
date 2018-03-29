<?PHP

class home_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }
    
    public function getJobList($offset=false) {
        $q = "SELECT * FROM job_postings ORDER BY row_id DESC LIMIT 4 OFFSET $offset";
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
    
    public function countPage() {
        $q = "SELECT COUNT(row_id) as countPage FROM job_postings";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row['countPage'];
        }
        return false;
    }
}
?>