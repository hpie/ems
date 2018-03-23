<?PHP

//include_once("db/classes.php");
class login_m extends Models {

    public $query;
    

    public function __construct() {
        $this->query = new Query();
    }

    public function invoke() {
        
    }
    public function login_select($email, $password) {
        $q = "SELECT * FROM admin_users WHERE email='$email' and password='$password'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['email'] && $password == $row['password']) {                                               
                sessionAdmin($row);
                return true;
            }
        }
        return false;
    }    
    public function buyerLogin($email, $password) {
        $q = "SELECT * FROM buyer WHERE buyer_email='$email' AND buyer_password='$password' AND buyer_mobileVerify=1 AND buyer_status=1";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['buyer_email'] && $password == $row['buyer_password']) {                                               
                sessionUser($row);
                return true;
            }
        }
        return false;
    }             
}

?>