<?PHP

/*
 * ---------------------------------------------------------------
 * Functions Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

function getLanguage() {
    if (!isset($_SESSION['SYSTEM_LANGUAGE'])) {
        $_SESSION['SYSTEM_LANGUAGE'] = DEFAULT_LANG;
    }
    return $_SESSION['SYSTEM_LANGUAGE'];
}
function setLanguage($lang) {
    $_SESSION['SYSTEM_LANGUAGE'] = $lang;
}
function sessionCheck() {
    if (!isset($_SESSION['admin_id'])) {
        redirect(ADMIN_LOGIN_LINK);       
        return false;
    }
    return true;
}
function sessionCheckEmployee() {
    if (!isset($_SESSION['user_type'])) {
        if($_SESSION['user_type']!='Employee'){
        redirect(BASE_URL.'0');         
        }              
    }  
}
function sessionCheckDepartment() {
    if (!isset($_SESSION['user_type'])) {
        if($_SESSION['user_type']!='Department'){
            redirect(BASE_URL.'0');         
        }              
    }  
}


function sessionDestroyUser() {
    session_destroy();   
}
function sessionDestroy() {
    session_destroy();   
}
function sessionAdmin($row) {
    $_SESSION['admin_id'] = $row['id'];
    $_SESSION['admin_name'] = $row['username'];
    $_SESSION['admin_email'] = $row['email'];     
}
function get_AdminName($name) {
    if (isset($_SESSION[$name])) {
        $name = $_SESSION[$name];
        return $name;
    }
    return FALSE;
}
function sessionUser($row) {
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_firstname'] = $row['user_firstname'];
    $_SESSION['user_lastname'] = $row['user_lastname'];
    $_SESSION['user_email'] = $row['user_email'];
    $_SESSION['user_type']=$row['user_type'];
    $_SESSION['refDepartment_code']=$row['refDepartment_code'];
}
function getUserSession($field) {
    if (isset($_SESSION[$field])) {
        return $_SESSION[$field];
    }
    return FALSE;
}

?>