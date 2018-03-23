<?PHP

class Models extends MY_base {

    public $query;

//public $android_push;
//public $iphone_push;
//public $smtp_mail;

    public function __construct() {
        $this->query = new Query();
        //$this->android_push = new GCMSERVICE();
        //$this->iphone_push = new PUSHSERVICE();
        //$this->smtp_mail = new SMTP_mail();
        //echo $this->send_androidPush_notifications("einMRoaUOGE:APA91bFhL1ZuU-C-tibTZyZbYgcJqEYrmzcSk6j7X7kXyG3j0q6e5-AI_oaecwA4EAnySTXHFbh7E_ek9cIQARcHivmDg1NkK99fHKSYK4-kZakr-OmtbzySdRAnE0OAvLUXiLhHJ-qM","This is simple message");
        //echo $this->send_iphonePush_notifications("462df6b3c12619fb5e7970cc54b04230c15f4131a705772241c3a6051b999f93","This is simple message");
    }

    //*********************************** INSERT DATA METHODs  ****************************************//

    public function mysql_escape_mimic($inp) {
        if (is_array($inp))
            return array_map(__METHOD__, $inp);

        if (!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }

        return $inp;
    }

    public function insertMaker($params, &$values) {
        if ($params && !empty($params) && count($params) > 0) {
            $cols = array_keys($params);
            $columns = implode(", ", $cols);
            //$escaped_values = array_map('mysql_real_escape_string', array_values($params));
            $escaped_values = array_values($params);
            foreach ($escaped_values as $key => $val) {
                $val = $this->mysql_escape_mimic($val);
                $escaped_values[$key] = "'$val'";
            }
            $values = implode(", ", $escaped_values);
            return $columns;
        }
        $values = '';
        return false;
    }

    public function updateMaker($params) {
        if ($params && !empty($params) && count($params) > 0) {
            $cols = array_keys($params);
            $columns = implode(", ", $cols);
            //$escaped_values = array_map('mysql_real_escape_string', array_values($params));
            $escaped_values = array_values($params);
            //echo "<pre>";print_r($columns);die;
            foreach ($escaped_values as $key => $val) {
                $val = $this->mysql_escape_mimic($val);
                $escaped_values[$key] = "$cols[$key] = '$val' ";
            }
            $values = implode(", ", $escaped_values);

            return $values;
        }
        return false;
    }

    //*********************************** Authentication  ****************************************//
    //Authentication API validate
    public function check_athentication($auth) {
        //echo "<pre>";print_r("".AUTH_QUERY."'".$auth."'");die;
        if (AUTH_QUERY) {
            $result = $this->query->select("" . AUTH_QUERY . "'" . $auth . "'");

            if ($row = $this->query->fetch($result)) {
                //echo "<pre>";print_r($row);
                return array_shift($row);
                //echo "<pre>";print_r($row);die;
                //return $row;
            }
        }
        return false;
    }

//################################################################################################//
//*********************************** Push Notification  ****************************************//
    //Android Push Notification
    public function send_androidPush_notifications($token, $message) {
        //return $this->android_push->send_notification($token, $message);
    }

    //IOS push notification
    public function send_iphonePush_notifications($token, $message) {
        //return $this->iphone_push->send_notification($token, $message);
    }

    //Email send for notification forgot passord
    public function send_email_forgotpassword($email, $password) {
        //return $this->smtp_mail->send_email_forgotpassword($email, $password);
    }

    //Email send for notification
    public function send_email_notifications($email, $message) {
        //return $this->smtp_mail->send_email_notifications($email,$message);
    }

    /*     * ******************************* update/delete use Data **************************************** */

    //GET Columns name
    public function getColumns($tablename) {
        $result = $this->query->select("SHOW COLUMNS FROM " . $tablename . "");
        if ($result = $this->query->fetch_array($result))
            return $result;
        return false;
    }

    /*     * *******************************  All Function  **************************************** */

    //GET records
    public function getRecords($table_name) {
        $result = $this->query->select("SELECT * FROM $table_name ORDER BY " . $table_name . "_id DESC");
        if ($result = $this->query->fetch_array($result))
            return $result;
        return false;
    }

    //GET records
    public function getRecordsOffset($table_name, $offset) {
        $result = $this->query->select("SELECT * FROM $table_name ORDER BY " . $table_name . "_id DESC LIMIT 10 OFFSET $offset");
        if ($result = $this->query->fetch_array($result))
            return $result;
        return false;
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //GET records with last record (Table last to second record)
    public function getRecord_limit_last($table_name, $table_id_name) {
        $result = $this->query->select("SELECT * FROM $table_name ORDER BY $table_id_name DESC LIMIT 1,1");
        if ($row = $this->query->fetch($result))
            return $row;
        return false;
    }

    //GET records with current record... (Table last record)
    public function getRecords_limit_current($table_name, $table_id_name) {
        $result = $this->query->select("SELECT * FROM $table_name ORDER BY $table_id_name DESC LIMIT 1");
        if ($row = $this->query->fetch($result))
            return $row;
        return false;
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //GET record
    public function getRecord($table_name, $table_id_name, $table_id) {
        $result = $this->query->select("SELECT * FROM $table_name WHERE $table_id_name=$table_id  ORDER BY " . $table_name . "_id DESC");
        if ($row = $this->query->fetch($result))
            return $row;
        return false;
    }

    public function checkRecord($table_name, $table_id_name, $table_id) {
        $result = $this->query->select("SELECT * FROM $table_name WHERE $table_id_name=$table_id");
        if ($row = $this->query->fetch($result))
            return $row;
        return false;
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //GET records Where
    public function getRecords_Where($table_name, $where_id_name, $where_id) {
        $result = $this->query->select("SELECT * FROM $table_name WHERE $where_id_name=$where_id  ORDER BY " . $table_name . "_id DESC");
        if ($result = $this->query->fetch_array($result))
            return $result;
        return false;
    }

    //GET records offset
    public function getRecords_WhereOffset($table_name, $where_id_name, $where_id, $offset) {
        $result = $this->query->select("SELECT * FROM $table_name WHERE $where_id_name=$where_id  ORDER BY " . $table_name . "_id DESC LIMIT 10 OFFSET $offset");
        if ($result = $this->query->fetch_array($result))
            return $result;
        return false;
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //GET records Where String
    public function getRecords_WhereString($table_name, $where_text_name, $where_text) {
        $result = $this->query->select("SELECT * FROM $table_name WHERE $where_text_name='$where_text'  ORDER BY " . $table_name . "_id DESC");
        if ($result = $this->query->fetch_array($result))
            return $result;
        return false;
    }

    //GET records Where String
    public function getRecords_WhereString_Offset($table_name, $where_text_name, $where_text, $offset) {
        $result = $this->query->select("SELECT * FROM $table_name WHERE $where_text_name='$where_text'  ORDER BY " . $table_name . "_id DESC LIMIT 10 OFFSET $offset");
        if ($result = $this->query->fetch_array($result))
            return $result;
        return false;
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //UPDATE Tables
    public function updateRecords($table_name, $table_id_name, $table_id, $paramters) {
        $result = $this->query->update("UPDATE " . $table_name . " SET " . $paramters . " WHERE " . $table_id_name . "=" . $table_id . "");
        if ($result)
            return true;
        else
            return false;
    }

    //UPDATE Tables
    public function updateMultiRecords($table_name, $table_id_name, $table_ids, $paramters) {
        $result = $this->query->update("UPDATE " . $table_name . " SET " . $paramters . " WHERE " . $table_id_name . " IN (" . $table_ids . ")");
        if ($result)
            return true;

        return false;
    }

    //DELETE Tables
    public function deleteRecords($table_name, $table_id_name, $table_id) {
        //print_r("DELETE FROM $table_name WHERE $table_id_name = $table_id");die;
        $result = $this->query->delete("DELETE FROM $table_name WHERE $table_id_name = $table_id");
        if ($result)
            return true;

        return false;
    }

//################################################################################################//
//*********************************** DataTables Methods  ****************************************//

    private function getDatatableCounts($q) {

        $result = $this->query->select($q);

        if ($data = $this->query->num_rows($result)) {
            if ($data)
                return $data;
        }

        return 0;
    }

    private function getDatatableRecords($q) {

       // print_r($q);die;
        
        
        $result = $this->query->select($q);

        if ($data = $this->query->fetch_array($result)) {
            if ($data)
                return $data;
        }

        return array();
    }

    public function getDatatable($select_first, $where, $columns, $search_value='', $order_column=0, $order_dir=' DESC ', $start=0, $length=0, $isLastID=false) {


        //Get Toatal Records count

        $total_count = $this->getDatatableCounts($select_first);
        $totalFiltered = $total_count;


        //Get searched records
        $select_second = $select_first;
        $select_second.=" WHERE " . $where . " ";
        if (!empty($search_value)) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $arr = array();
            foreach ($columns as $clm) {
                array_push($arr, $clm . " LIKE '%" . $search_value . "%' ");
            }

            $select_second.=" AND ( " . implode(' OR ', $arr) . " ) ";
        }
        $totalFiltered = $this->getDatatableCounts($select_second); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
        //Set offset limit for data
       
        $select_second.=" ORDER BY " . $columns[$order_column] . " $order_dir  LIMIT " . $start . " ," . $length . "   ";

        $data = $this->getDatatableRecords($select_second);
       // prePRINT($select_second,FALSE);
//        prePRINT($data);

//        $data = array();
//        $IDs = array();
//        if ($isLastID) {
//            if (count($data_records) > 0) {
//                foreach ($data_records as $row) {  // preparing an array
//                    $cols = $columns;
//                    $nestedData = array();
//                    $IDs[] = $row[end($cols)];
//                    array_pop($cols);
//                    foreach ($cols as $key => $value) {
//                        $nestedData[$key] = $row[$value];
//                    }
//
//                    $data[] = $nestedData;
//                }
//            }
//        } else {
//            if (count($data_records) > 0) {
//                foreach ($data_records as $row) {  // preparing an array
//                    $nestedData = array();
//
//                    foreach ($columns as $key => $value) {
//                        $nestedData[$key] = $row[$value];
//                    }
//
//                    $data[] = $nestedData;
//                }
//            }
//        }


        if (count($data) <= 0)
            $data = false;

        //merge all data
        $final = array(
            $total_count, //Total data count
            $totalFiltered, //toatl filtered records after search established
            $data
        );

        //select @i := 0;
        //update `employee` set `employee_firstname` = (select @i := @i + 1) ;
        return $final;
    }

    //################################################################################################//
}

?>