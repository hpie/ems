<?PHP

class login_c extends Controllers {

    public $login_m;

    public function __construct() {
        parent::__construct();
        $this->login_m = $this->loadModel('login_m');
    }

    public function invoke() {
        $error = '';           
        if (isset($_POST['username']) && isset($_POST['password'])) {              
            $result = $this->login_m->login_select($_POST['username'], $_POST['password']);
            $res=array();
            if ($result == true) {                                               
                $res['login_status']="success";               
                echo json_encode($res);die;
            }
            else{
                $res['login_status']="invalid";
                echo json_encode($res);die;
            }            
        }
        loadLoginView('admin/', 'login.php', $this->data);
    }      
    public function login() {           
        if (isset($_POST['email']) && isset($_POST['password'])) {                                           
            $result = $this->login_m->userLogin($_POST['email'], $_POST['password']);
            if ($result == true) { 
                $_SESSION['loginsuccess'] = 1;
                redirect(BASE_URL.'0');                
            }
            if ($result == false) {
                $_SESSION['valid'] = 1;
            }
        }
        $this->data['TITLE'] = LOGIN;
        loadviewClient('client/', 'account.php', $this->data);
    }
    public function logout() {
        sessionDestroy();
        redirect(ADMIN_LOGIN_LINK);
    }
    public function logoutClient() {
        sessionDestroyUser();
        redirect(BASE_URL.'0');
    }   
}

?>