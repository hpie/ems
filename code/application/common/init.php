<?php

//error_reporting(E_ALL);
//date_default_timezone_set('Asia/Kolkata');
/* register_shutdown_function('errorHandler');

  function errorHandler() {
  $error = error_get_last();
  $type = $error['type'];
  $message = $erro['message'];
  if ($type = 64 && !empty($message)) {
  echo "
  <strong>
  <font color=\"red\">
  Fatal error captured:
  </font>
  </strong>
  ";
  echo "<pre>";
  print_r($error);
  echo "</pre>";
  }
  } */

/*
 * ------------------------------------------------------
 *  Set a liberal script execution time limit
 * ------------------------------------------------------
 */
if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0) {
    @set_time_limit(300);
}

/*
 * ---------------------------------------------------------------
 * Timezone
 * ---------------------------------------------------------------
 * 
 */

date_default_timezone_set("asia/kolkata");

/*
 * ---------------------------------------------------------------
 * ERROR REPORTING ENVIRONMENT :development :testing :production
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */


define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

//API current version
define('VERSION', '1.0');

//Authentication Query from database
define('AUTH_QUERY', "SELECT Users_id FROM Users WHERE Users_api=");


// ------------------------------------------------------------------------

/**
 * Header Redirect
 *
 * Header redirect in two flavors
 * For very fine grained control over headers, you could use the Output
 * Library's set_header() function.
 *
 * @access	public
 * @param	string	the URL
 * @param	string	the method: location or redirect
 * @return	string
 */
if (!function_exists('redirect')) {

    function redirect($uri = '', $method = 'location', $http_response_code = 302) {
        if (!preg_match('#^https?://#i', $uri)) {
            $uri = BASE_URL.$uri;
        }

        switch ($method) {
            case 'refresh' : header("Refresh:0;url=" . $uri);
                break;
            default : header("Location: " . $uri, TRUE, $http_response_code);
                break;
        }
        exit;
    }

}
/*
 * ---------------------------------------------------------------
 * Constant Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Constant
include_once ("$application_folder/$config_folder/constant.php");



/*
 * ---------------------------------------------------------------
 * Include Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Include
include_once("$application_folder/$config_folder/include.php");



/*
 * ---------------------------------------------------------------
 * Route Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Route
include_once("$application_folder/$config_folder/route.php");



/*
 * ---------------------------------------------------------------
 * Session Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Session
include_once("$application_folder/$config_folder/session.php");



/*
 * ---------------------------------------------------------------
 * Strings Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Strings
include_once("$application_folder/$config_folder/strings.php");




/*
 * ---------------------------------------------------------------
 * Common Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Common
include_once("$application_folder/$common_folder/common.php");



/*
 * ---------------------------------------------------------------
 * Functions Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Functions
include_once("$application_folder/$config_folder/functions.php");


/*
  if ($handle = opendir(MVC_PATH)) {

  while (false !== ($entry = readdir($handle))) {

  if ($entry != "." && $entry != ".." && is_file($entry)) {

  echo "$entry\n";
  }
  }

  closedir($handle);
  }
 */



//$filesController = array();
//$filesController = listFolderFiles(MVC_PATH . '/Controller');


/*
 * ---------------------------------------------------------------
 * System Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//System

include_once("$system_path/index.php");


/*
 * ---------------------------------------------------------------
 * System END
 * ---------------------------------------------------------------
 * 
 */
?>