<?php

/*
 * *--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**
 * SOCIAL WEB version 4.0 by Darshit
 * *--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**
 * By default development will show errors but testing and live will hide them.
 */



/* ################################# DO NOT CODE HERE ############################ */

/*
 * ---------------------------------------------------------------
 * ERROR REPORTING
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (ENVIRONMENT) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(-1);
            ini_set('display_errors', 1);
            break;

        case 'testing':
        case 'production':
            ini_set('display_errors', 0);
            if (version_compare(PHP_VERSION, '5.3', '>=')) {
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
            } else {
                error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
            }
            break;

        default:
            header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
            echo 'The application environment is not set correctly.';
            exit(1); // EXIT_ERROR
    }
}


/*
 * ---------------------------------------------------------------
 * System Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Config
include_once("$application_folder/$config_folder/config.php");

//Database
include_once("$system_path/sys_db/classes.php");



//Authentication and REST data handler
include_once("$system_path/sys_app/MY_base.php");

//Headers
//include_once("System/sys_php/auth.php");
//Models
include_once("$system_path/sys_model/models.php");


//Controllers
include_once("$system_path/sys_controller/controller_main.php");
include_once("$system_path/sys_controller/controllers.php");




/*
 * ---------------------------------------------------------------
 * APP Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

//Initialization with Authentication
$APP = new MY_base();




/*
 * DOWNLOAD METHOD
 * 
 * :$URL -[link] enter your url to dawnload image
 * 
 */

function DEFAULT_DOWNLOAD_IMAGE_FROM_URL($URL) {
    global $APP;



    //If directory doesnot exists create it.
    $output_dir = IMG_DIR;
    $output_subdir = $output_dir . "original/";
    $output_subdir1 = $output_dir . "large/";
    $output_subdir2 = $output_dir . "medium/";
    $output_subdir3 = $output_dir . "thumb/";


    $RandomNum = time() . date("-Ymd-hisa");
    $NewImageName = 'uploads-' . rand(111, 999) . rand(11, 99) . '-' . $RandomNum . '.png';
    $filepath_original = $output_subdir . $NewImageName;

    $ch = curl_init($URL);
    $fp = fopen($filepath_original, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    $path_size = array(
        array('path' => $output_subdir1 . $NewImageName, 'size' => 500),
        array('path' => $output_subdir2 . $NewImageName, 'size' => 300),
        array('path' => $output_subdir3 . $NewImageName, 'size' => 100)
    );


    //$contents = file_get_contents($url);
    if ($APP->imageResizeLib($filepath_original, $filepath_original, $path_size)) {
        //unlink($filepath_original);


        $data["image_name"] = $NewImageName;
        $message = 'File uploaded successfully';
        return array(true, $message, $NewImageName);
        die;
    } else {
        $message = "Invalid, File not correct";
        return array(false, $message, "");
    }

    $message = "Invalid, image URL";
    return array(false, $message, "");
}


/*
 * ---------------------------------------------------------------
 * Models Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */



/*//Models
$filesModel = array();
$filesModel = $APP->listFolderFiles(MVC_PATH . 'Model');*/




/*
 * ---------------------------------------------------------------
 * Controller Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

$con_array = array();
//Controllers
foreach ($route as $key => $value) {
    $is_controller = false;

    $segments = explode('/', $value);
    $cnt = count($segments);
    if ($cnt > 0) {

        $segments = array_reverse($segments);

        if ($cnt == 1) {
            $class_s = $segments[0];
            $is_controller = $APP->classExist($class_s, $key);
        } else {
            $method_s = $segments[0];
            $class_s = $segments[1];
            unset($segments[0]);
            unset($segments[1]);
            $path_s = '';
            if (count($segments) > 0) {
                $segments = array_reverse($segments);
                $path_s = implode('/', $segments) . '/';
            }
            $is_controller = $APP->classExist($class_s, $key, $method_s, $path_s);
        }
    }

    if ($is_controller != FALSE) {
        $new_tmp = array();
        $new_tmp['controller'] = $is_controller;
        $new_tmp['route'] = $key;
        array_push($con_array, $new_tmp);
    }
}

if(count($con_array) <= 0)
{
    echo "<b style='color:red;'>Failed</b>  :-  <strong>IN-VALID URL</strong> : failed to open url: <strong> " . $_SERVER['QUERY_STRING'] . "</strong> please check with your route file  at <b>route.php</b>";
        die;
}
else if (count($con_array) == 1) {
    $con_array = $con_array[0]['controller'];
    if (count($con_array) == 3) {

        $myclass = new $con_array[0]();
        //$myclass->$con_array[1](implode(',', $con_array[2]));
        //call_user_func_array($myclass->$con_array[1], $con_array[2]);
        call_user_func_array(array($myclass, $con_array[1]), $con_array[2]);
    } else {
        echo '<html>
		<body>
			<h1>ERROR 404 - PAGE NOT FOUND</h1>
			
		</div><h2> Page not available, Please confirm with route path in your application! </h2>
		</body>
		</html>';
        die;
    }
} else {
    /*$val = implode(' <br/> ', array_map(function ($entry) {
                        return $entry['route'];
                    }, $con_array));*/
    $val = '';
    foreach ($con_array as $entry) {
        $val = $val .' <br/> '.$entry['route'];
    }

    echo "<b style='color:red;'>Conflict</b>  :- <br/><br/><strong> " . $val . "  </strong><br/><br/><br/>---- This routes are conflict with each other, Please change the name of path blocks <strong> " . $_SERVER['QUERY_STRING'] . "</strong> at <b>route.php</b>";

    die;
}


//$actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
//echo $actual_link;
//echo "<pre>";print_r($_SERVER['QUERY_STRING']);




/*
 * *--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**
 * SOCIAL WEB version 4.0 by Darshit
 * *--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**--**
 * By default development will show errors but testing and live will hide them.
 */
?>