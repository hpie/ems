<?PHP

class Controller_main extends MY_base{
    public $sortingTag;    
    /* private $_data;

      public function __construct() {
      $this->_data = $this->modelsArray;
      }

      // magic methods!
      public function __set($property, $value) {
      return $this->_data[$property] = $value;
      }

      public function __get($property) {
      return array_key_exists($property, $this->_data) ? $this->_data[$property] : null
      ;
      } */

    public function __construct() { 
         
    }    
    public function c_makeImageArray($image) {
        $str = str_replace(',', '","', $image);
        $str = str_replace('[', '["', $str);
        $str = str_replace(']', '"]', $str);
        $str = str_replace(' ', '', $str);
        $result = json_decode($str);

        //add item to array
        return $result;
    }

    public function clearData($value) {
        //$data = mysql_real_escape_string($data);

        /* $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
          $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

          return str_replace($search, $replace, $value); */
        $inp = $value;
        if (is_array($inp))
            return array_map(__METHOD__, $inp);

        if (!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }

        return $inp;
    }

    // "table_id_name" key for doesn't change(Primary key)  , PUT value from "parse_str(file_get_contents("php://input"),$post_vars);",array as all column from DB
    public function c_Update($table_id_name, $post_vars, $columns) {
        /* if (! function_exists('array_column')) {
          function array_column(array $input, $columnKey, $indexKey = null) {
          $array = array();
          foreach ($input as $value) {
          if ( ! isset($value[$columnKey])) {
          trigger_error("Key \"$columnKey\" does not exist in array");
          return false;
          }
          if (is_null($indexKey)) {
          $array[] = $value[$columnKey];
          }
          else {
          if ( ! isset($value[$indexKey])) {
          trigger_error("Key \"$indexKey\" does not exist in array");
          return false;
          }
          if ( ! is_scalar($value[$indexKey])) {
          trigger_error("Key \"$indexKey\" does not contain scalar value");
          return false;
          }
          $array[$value[$indexKey]] = $value[$columnKey];
          }
          }
          return $array;
          }
          } */

        //var_dump($columns);
        $columns = array_column($columns, 'Field');

        $updateArray = array();
        $isKey = true;

        //all parameter from PUT
        foreach ($post_vars as $key => $value) {
            //check key exist
            if (!in_array($key, $columns)) {
                $isKey = false;
            } else {
                //if id exist then does not change because its uniq
                if ($key != $table_id_name) {
                    //if password exist then use md5 method
                    if ($key == "Users_password") {
                        //$value = md5($value);
                        $value = $value;
                    }
                    $value = $this->clearData($value);
                    array_push($updateArray, "$key='$value'");
                }
            }
        }

        //Key exist or not
        if ($isKey) {
            return $updateArray;
        } else {
            return false;
        }
    }

    public function c_WrongParameters($table_id_name, $post_vars, $columns) {
        $columns = array_column($columns, 'Field');

        $wrongParams = array();
        $isKey = true;

        //all parameter from PUT
        foreach ($post_vars as $key => $value) {
            //check key exist
            if (!in_array($key, $columns)) {
                array_push($wrongParams, $key);
            }
        }

        //Key exist or not
        if ($isKey) {
            return $wrongParams;
        }
    }

    public function c_SearchQuery($params) {
        $updateArray = array();

        //all parameter from PUT
        foreach ($params as $key => $value) {
            array_push($updateArray, " $key LIKE '%" . $value . "%' ");
        }

        return $updateArray;
    }

    public function validateDate($date, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function datetimeToDateConversion($old_date) {
        $dt_format = 'Y-m-d';
        $dt_f_format = $dt_format . ' H:i:s';
        $new_date = $old_date;

        if ($this->validateDate($old_date, $dt_f_format)) {
            //$old_date = date($dt_f_format); 
            //echo "1=-".$old_date;    
            $date = date_create($old_date);
            $new_date = date_format($date, $dt_format);         // l, F d y h:i:s returns Saturday, January 30 10 02:06:34
            //$old_date_timestamp = strtotime($old_date);
            //$new_date = date($dt_format, $old_date_timestamp);   
        }

        return $new_date;
    }

    private function sorting($a, $b) {
        $tag = $this->sortingTag;

        $t1 = $a[$tag];
        $t2 = $b[$tag];

        if (is_numeric($t1) && is_numeric($t2)) {
            if ($t1 == $t2)
                return 0;

            return ($t1 < $t2) ? -1 : 1;
        }
        return strcmp($t1, $t2);
    }

    public function sortData($f_result, $sortingTag, $sortingType='desc') {
        $this->sortingTag = $sortingTag;
        usort($f_result, array('Controller_main', 'sorting'));
        if ($sortingType == 'desc') {
            $f_result = array_reverse($f_result);
        }

        return $f_result;
    }

    public function orderByGroup($result, $sortingTag) {
        $result = $this->sortData($result, $sortingTag);

        if ($result) {
            $str = '';
            $notification_new = array();
            $result_new = array();
            foreach ($result as $notification) {
                $notification_dt = $this->datetimeToDateConversion($notification[$sortingTag]);
                if ($str == '') {

                    $str = $notification_dt;

                    $notification_new = array();
                    array_push($notification_new, $notification);
                } else if ($str != $notification_dt) {

                    $result_in_array = array();
                    $result_in_array['current_date'] = $str;
                    $result_in_array['data'] = $notification_new;
                    array_push($result_new, $result_in_array);

                    $str = $notification_dt;
                    $notification_new = array();
                    array_push($notification_new, $notification);
                } else {

                    array_push($notification_new, $notification);
                }
            }
            $result_in_array = array();
            $result_in_array['current_date'] = $str;
            $result_in_array['data'] = $notification_new;
            array_push($result_new, $result_in_array);

            return $result_new;
        }
        return false;
    }

}

?>