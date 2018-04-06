<?PHP

//include_once("model/categories_m.php");

class jobpost_c extends Controllers {
    public $jobpost_m;     
    public function __construct() {
        sessionCheckDepartment();  
        $this->jobpost_m = $this->loadModel('jobpost_m');
    }
    /******************************************** Shop Details *********************************** */
    public function invoke() {
        
    }
    public function postJob() { 
        if($_SESSION['user_type'] == 'Department'){
        $this->data['TITLE'] = POST_JOB;          
        loadviewClient('client/', 'postjob.php', $this->data);
        }else{
            redirect(BASE_URL.'home/0');
        }
    }
    public function addJob() {  
        createAndModifiedBy($_SESSION['user_id']);
        $_POST['job_code']=0;
        $_POST['department_code']=$_SESSION['refDepartment_code'];
        $_POST['job_status']='open';
        $_POST['status']='open';        
        $result = $this->jobpost_m->addJob($_POST);
        if($result){           
            $params=array();
            $params['job_code']='#JOB'.$result.'123';
            $this->jobpost_m->addJobCode($params,$result);
            $_SESSION['jobAddedSuccessfully']=1;
            redirect(BASE_URL.'home/0');
        }
        else{
            $_SESSION['jobAddedSuccessfully']=2;
            redirect(CLIENT_POST_JOB_LINK);
        }
    }  
}  