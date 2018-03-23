<?php

class MY_base extends Strings {

    public function __construct() {
        parent::__construct();
    }

    public function print_logs($subject, $response) {
        if (IS_LOGS) {
            //var_dump($response);die;
            $results = print_r($response, true);
            //Write action to txt log
            $log = "User: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F j, Y, g:i a") . PHP_EOL .
                    "Subject: " . print_r($subject, true) . PHP_EOL .
                    "Response: " . $results . PHP_EOL .
                    "----------------------------------------------------------------------------------------------------" . PHP_EOL;
            //-
            file_put_contents(LOGS_PATH . '/log_' . date("j.n.Y") . '.txt', $log, FILE_APPEND);
        }
    }

    

    public function decodeJson_array($arr, $decode_tag=false) {
        if (!empty($arr) && $decode_tag) {
            foreach ($arr as $key => $val) {
                if (!isset($val[$decode_tag])) {
                    break;
                    return false;
                }
                if (empty(trim($val[$decode_tag]))) {
                    $arr[$key][$decode_tag] = array();
                } else {
                    $str = str_replace(',', '","', $val[$decode_tag]);
                    $str = str_replace('[', '["', $str);
                    $str = str_replace(']', '"]', $str);
                    $str = str_replace(' ', '', $str);
                    $arr[$key][$decode_tag] = json_decode($str);
                }
            }
            return $arr;
        }
        return false;
    }

    public function decodeJson($arr, $decode_tag=false) {
        if (!empty($arr) && $decode_tag) {
            if (!isset($arr[$decode_tag])) {

                return false;
            }

            if (empty(trim($arr[$decode_tag]))) {
                $arr[$decode_tag] = array();
            } else {

                $str = str_replace(',', '","', $arr[$decode_tag]);
                $str = str_replace('[', '["', $str);
                $str = str_replace(']', '"]', $str);
                $str = str_replace(' ', '', $str);
                $arr[$decode_tag] = json_decode($str);
                //print_r($arr);die;
            }
            //print_r($arr);die;			
            return $arr;
        }
        return false;
    }

    //End File uploading...
    //remove Special characters
    public function clearData($value) {
        //$data = mysql_real_escape_string($data);

        $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
        $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");

        return str_replace($search, $replace, $value);
    }

    //remove Special characters
    public function checkData($key) {
        if (isset($_REQUEST[$key]) && trim($_REQUEST[$key]) != '')
            return $_REQUEST[$key];
        return false;
    }

    // check length of string
    public function checkLength($data) {
        $len = 0;
        $len = strlen($data);
        if ($len > 0) {
            return $data;
        } else {
            return NULL;
        }
    }

    // Generate API key
    public function generateApiKey() {
        return md5(uniqid(rand(), true));
    }

    function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    function listFolderFiles($dir) {
        $i = 0;
        $list = array();

        if (!is_dir($dir)) {
            exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: " . $dir);
        }
        $ffs = scandir($dir);

        foreach ($ffs as $ff) {
            if ($ff != '.' && $ff != '..') {
                if (strlen($ff) >= 5) {
                    if (substr($ff, -4) == '.php') {
                        $list[] = $ff;
                        //echo dirname($ff) . $ff . "<br/>";
                        //echo $dir . '/' . $ff . '<br/>';
                    }
                }
                if (is_dir($dir . '/' . $ff))
                    listFolderFiles($dir . '/' . $ff);
            }
        }
        return $list;
    }

    function classExist($class, $key, $method=NULL, $path='') {



        $str = '' . APP_INCLUDE_C . $path . $class . '.php';

        if (file_exists($str)) {
            include_once("$str");
        } else {
            echo "<b style='color:red;'>Failed</b>  :-  <strong>$class.php</strong> : failed to open stream: No such file or directory in <b>" . APP_INCLUDE_C . $path . "</b>";
            die;
        }

        // Check to see whether the include declared the class
        if (!class_exists($class, false)) {
            echo "<b style='color:red;'>Failed</b>  :-  <strong>$class</strong> : unable to load class </strong>  at  <b>  " . APP_INCLUDE_C . $path . $class . ".php</b>";

            //trigger_error("Unable to load class: $class())", E_USER_WARNING);
            die;
        } else {

            /* print_r($class);
              echo ' : Class<br/>';
              print_r($method);
              echo ' : Method<br/>';
              print_r($path);
              echo ' : Path<br/>'; */


            //$myclass = new $class();



            if ($method == NULL) {
                $method = 'invoke';
            }

            if (method_exists($class, $method)) {

                $uri_server = ltrim($_SERVER['QUERY_STRING'], '/');
                ;
                $uri_segments = explode('/', $uri_server);

                $key_segments = explode('/', $key);

                //echo '<pre><br/>';print_r($uri_server);
                //echo '<pre><br/>';print_r($key_segments);

                if (count($key_segments) == count($uri_segments)) {
                    $count = 0;
                    $any_array = array();
                    for ($index = 0; $index < count($key_segments); $index++) {
                        if ($key_segments[$index] == '(:any)') {
                            array_push($any_array, $uri_segments[$index]);
                            $count++;
                        } else if ($key_segments[$index] == $uri_segments[$index]) {
                            $count++;
                        } else {
                            break;
                            return false;
                        }
                    }
                    if (count($key_segments) == $count) {
                        return array($class, $method, $any_array);
                    }
                }


                //$myclass->$method();
            } else {
                echo "<b style='color:red;'>Failed</b>  :-  <strong>$method()</strong> : unable to load method in class : <strong>$class</strong>  at  <b>  " . APP_INCLUDE_C . $path . $class . ".php</b>";

                die;
            }
        }

        return false;
    }

    function loadModel($model) {


        $path = APP_INCLUDE_M . $model . '.php';
        if (!file_exists($path)) {
            echo "<b style='color:red;'>Failed</b>  :-  <strong>[$model.php]</strong> : failed to open stream: No such file or directory </strong>  at  <b>  " . APP_INCLUDE_M . "</b>";

            //trigger_error("Unable to load class: $class())", E_USER_WARNING);
            die;
        }

        $class_array = array_reverse(explode('/', $model));

        if (count($class_array) > 0) {
            require_once($path);
            $class = $class_array[0];
            if (!class_exists($class, false)) {
                echo "<b style='color:red;'>Failed</b>  :-  <strong>$class</strong> : unable to load model class </strong>  at  <b>  " . $path . "</b>";

                //trigger_error("Unable to load class: $class())", E_USER_WARNING);
                die;
            } else {

                $class = ucfirst($class);
                $class = new $class();
                return $class;
            }
        } else {
            echo "<b style='color:red;'>Failed</b>  :-  <strong>$class.php</strong> : failed to open stream: No such file or directory </strong>  at  <b>  " . APP_INCLUDE_M . "</b>";

            //trigger_error("Unable to load class: $class())", E_USER_WARNING);
            die;
        }



        return false;
    }

}

?>