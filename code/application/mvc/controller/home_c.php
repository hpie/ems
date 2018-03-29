<?PHP

//include_once("model/categories_m.php");

class home_c extends Controllers {
    public $home_m;     
    public function __construct() {
        //sessionCheck();       
        $this->home_m = $this->loadModel('home_m');
    }
    /******************************************** Shop Details *********************************** */
    public function invoke($offset) {
        $countRecord=$this->home_m->countPage();
        $totalPage=round(($countRecord/OFFSET),0,PHP_ROUND_HALF_UP);        
        $jobList=$this->home_m->getJobList($offset);
        $this->data['jobList'] = $jobList;
        $this->data['totalPage'] = $totalPage;
        $this->data['countRecord'] = $countRecord;
        $this->data['offset'] = $offset;
        $this->data['offset2'] = $offset+OFFSET;
        $this->data['TITLE'] = HOME;      
        loadviewClient('client/', 'home.php', $this->data);
    }
    public function jobDetails($jobId) { 
        $singleJob=$this->home_m->getSingleJobList($jobId);
        $this->data['singleJob'] = $singleJob;
        $this->data['TITLE'] = JOB_DETAILS;          
        loadviewClient('client/', 'jobdetails.php', $this->data);
    } 
}  