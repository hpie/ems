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
        $this->data['TITLE'] = HOME;       
        loadviewClient('client/', 'home.php', $this->data);
    }                 
}  