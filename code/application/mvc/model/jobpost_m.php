<?PHP

class jobpost_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }
    public function addJob($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO job_postings($columns) values($values)";
            $jobId = $this->query->insert($q);
            return $jobId;
        }
        return FALSE;
    }
    
    public function addJobCode($params, $id) {
        $columnsdesc = $this->updateMaker($params);
        if ($columnsdesc) {
            $q = "UPDATE job_postings SET $columnsdesc WHERE row_id=$id";
            return $this->query->update($q);
        }
        return FALSE;
    }
}
?>