<?PHP

//include_once("model/dashboard_m.php");

class dashboard_c extends Controllers {

    public $dashboard_m;
    public function __construct() {
        sessionCheck();
        $this->dashboard_m = $this->loadModel('dashboard_m');
    }
    /******************************************** Shop Details *********************************** */
    public function invoke() {       
        $this->data['TITLE'] = APPNAME;       
        loadview('admin/', 'dashboard/dashboard.php', $this->data);
    }      
}  