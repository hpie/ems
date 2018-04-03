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
        $q = "SELECT * FROM admin WHERE admin_email='$email' and admin_password='$password'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            if ($email == $row['admin_email'] && $password == $row['admin_password']) {                                               
                sessionAdmin($row);
                return true;
            }
        }
        return false;
    }    
    public function userLogin($email, $password) {
        $q = "SELECT * FROM user WHERE user_email='$email' AND user_password='$password'";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {                                                
            if ($email == $row['user_email'] && $password == $row['user_password']) {                                               
                sessionUser($row);
                return true;
            }
        }
        return false;
    }             
}

?>