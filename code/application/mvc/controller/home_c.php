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
        $this->data['jobId'] = 1;
        $this->data['TITLE'] = HOME;       
        loadviewClient('client/', 'home.php', $this->data);
    }
    public function jobDetails($jobId) {           
        $this->data['TITLE'] = JOB_DETAILS;          
        loadviewClient('client/', 'jobdetails.php', $this->data);
    } 
}  