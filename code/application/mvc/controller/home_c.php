<?PHP

//include_once("model/categories_m.php");

class home_c extends Controllers {
    public $home_m;     
    public function __construct() {
        //sessionCheck();       
        $this->home_m = $this->loadModel('home_m');
    }
    /******************************************** Shop Details *********************************** */
    public function invoke() {
        
        
        redirect(BASE_URL.'home/0');
    }
    
    public function home($offset) {
//        echo"<pre>";print_r($offset);die;
        if(isset($_COOKIE['FAV_JOB'])){
            $cookie_value = $_COOKIE['FAV_JOB'];
        }else{
        $cookie_name = "FAV_JOB";
        $cookie_value = "JOBFAV".rand();
        $set = setcookie($cookie_name, $cookie_value, time() + (8640000 * 30), "/"); // 86400 = 1 day
        }
//        echo $set;die;
        $countRecord=$this->home_m->countPage();
        $totalPage=round(($countRecord/OFFSET),0,PHP_ROUND_HALF_UP);  
        
        $jobList=$this->home_m->getJobList($offset,$cookie_value);
//        echo"<pre>";print_r($jobList);die;
        $this->data['jobList'] = $jobList;
        $this->data['totalPage'] = $totalPage;
        $this->data['countRecord'] = $countRecord;
        $this->data['TITLE'] = HOME; 
        if(!empty($offset)){
        $this->data['offset'] = $offset;
        $this->data['offset2'] = $offset + OFFSET;
        }else {
            $offset = 0;
        $this->data['offset'] = $offset;
        $this->data['offset2'] = $offset + OFFSET;
        }
         loadviewClient('client/', 'home.php', $this->data);
    }
    
    public function jobDetails($jobId) { 
        $singleJob=$this->home_m->getSingleJobList($jobId);
        $this->data['singleJob'] = $singleJob;
        $this->data['TITLE'] = JOB_DETAILS;          
        loadviewClient('client/', 'jobdetails.php', $this->data);
    } 
    public function applyJob($jobId) {  
        $singleJob=$this->home_m->getSingleJobList($jobId);
        
//        echo '<pre>';print_r($singleJob);die;
        $this->data['singleJob'] = $singleJob;
        $this->data['TITLE'] = APPLY_JOB;          
        loadviewClient('client/', 'applyjob.php', $this->data);
    }
    public function addApplyJob() {  
        $_POST['candicate_code']=0;
        $_POST['created_dt']=date('Y-m-d H:i:s');
        $_POST['modified_dt']=date('Y-m-d H:i:s');
        //echo '<pre>';print_r($_POST);die;
        $applyJobCheck=$this->home_m->getSingleApplyJobDetails($_POST['job_code'],$_POST['candicate_email'],$_POST['candicate_phone']);
//        echo '<pre>';print_r($applyJobCheck);die;
        if(!empty($applyJobCheck)){
             $_SESSION['AppllySuccessfully']=2;
              redirect(BASE_URL.'home/0');
        }else{
        $result = $this->home_m->addApplyJob($_POST);
        if($result){           
            $params=array();
            $params['candicate_code']='#CAN'.$result;
            $this->home_m->addApplyJobCode($params,$result);
            $_SESSION['AppllySuccessfully']=1;
            redirect(BASE_URL.'home/0');
        }
        }
//        else{
//            $_SESSION['jobAddedSuccessfully']=2;
//            redirect(CLIENT_POST_JOB_LINK);
//        }
    }
    
    public function add_fav_job($jobId) { 
        
        $singleJob=$this->home_m->getSingleJobList($jobId);
        $getcookie = $_COOKIE['FAV_JOB'];
        if($_POST['type'] == 'fav'){
        $params = array();
        $params['job_code'] = $singleJob['job_code'];
        $params['favkey'] = $getcookie;
        $params['updates'] = date('Y-m-d H:i:s');
        $params['datetime'] = date('Y-m-d H:i:s');
        $insert =$this->home_m->addFavouriteJob($params);
        }else{
             $insert =$this->home_m->deleteFavouriteJob($singleJob['job_code'],$getcookie);
        }
        if($insert){
            $result=array(); 
        $result['success'] = 'success';
        echo json_encode($result);
        die;  
        }
    }
    public function job_key_word() { 
        
        $job_keyword=$this->home_m->getAllJobKeyword();
//        echo '<pre>';print_r($job_keyword);die;
        $newarray = array();
        foreach ($job_keyword as $value) {
            array_push($newarray, $value['title']);
        }
//        echo '<pre>';print_r($newarray);die;
        $result=array(); 
        $result['success'] = 'success';
        $result['Result'] = $newarray;
        echo json_encode($result);
        die;  
        
    }
    public function job_cities() { 
        
        $job_cities=$this->home_m->getAllJobCities();
//        echo '<pre>';print_r($job_keyword);die;
        $newarray = array();
        foreach ($job_cities as $value) {
            array_push($newarray, $value['city_name']);
        }
//        echo '<pre>';print_r($newarray);die;
        $result=array(); 
        $result['success'] = 'success';
        $result['Result'] = $newarray;
        echo json_encode($result);
        die;  
        
    }
}  