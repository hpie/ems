<?PHP

class Controllers extends Controller_main {

    public $model;
    public $data = array();
    public function __construct() {
        parent::__construct();
        //$args = func_get_args();
        //call_user_func_array(array($this, 'parent::__construct'), $args);
        $this->model = new Models();
    }

    //Authentication
    public function athentication($auth) {
        return $this->model->check_athentication($auth);
    }

    //################################################################################################//

    /*     * ******************************* update/delete use Data **************************************** */

    //CHECK record
    public function checkRecord($table_name, $table_id_name, $table_id) {
        //$result = $this->model->checkRecord($table_name,$table_id_name,$table_id);
        $result = $this->model->checkRecord($table_name, $table_id_name, $table_id);
        return $result;
    }

    //GET Columns

    public function getColumns($table_id_name, $post_vars, $table_name) {
        // "table_id_name" key for doesn't change(Primary key)  , PUT value from "parse_str(file_get_contents("php://input"),$post_vars);",array as all column from DB
        $result_array = array();
        if ($result_array = $this->c_Update($table_id_name, $post_vars, $this->model->getColumns($table_name))) {
            $result_string = implode(",", $result_array);
            //echo $result_string;
            return $result_string;
        }
        return false;
    }

    //GET Columns

    public function getColumnsArray($table_id_name, $post_vars, $table_name) {
        // "table_id_name" key for doesn't change(Primary key)  , PUT value from "parse_str(file_get_contents("php://input"),$post_vars);",array as all column from DB
        $result_array = array();
        $result_array = $this->c_Update($table_id_name, $post_vars, $this->model->getColumns($table_name));

        return $result_array;
    }

    public function getWrongColumns($table_id_name, $post_vars, $table_name) {
        // "table_id_name" key for doesn't change(Primary key)  , PUT value from "parse_str(file_get_contents("php://input"),$post_vars);",array as all column from DB
        $result_array = array();
        $result_array = $this->c_WrongParameters($table_id_name, $post_vars, $this->model->getColumns($table_name));
        $result_string = implode(",", $result_array);
        return $result_string;
    }

    /*     * ******************************* All Function **************************************** */

    //GET records
    public function getRecords($table_name) {
        return $this->model->getRecords($table_name);
    }

    //GET records offset
    public function getRecordsOffset($table_name, $offset) {
        return $this->model->getRecordsOffset($table_name, $offset);
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //GET records with last record 
    public function getRecord_limit_last($table_name, $table_id_name) {
        return $this->model->getRecord_limit_last($table_name, $table_id_name);
    }

    //GET records with current record 
    public function getRecords_limit_current($table_name, $table_id_name) {
        return $this->model->getRecords_limit_current($table_name, $table_id_name);
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //GET record
    public function getRecord($table_name, $table_id_name, $table_id) {
        return $this->model->getRecord($table_name, $table_id_name, $table_id);
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //GET records Where
    public function getRecords_Where($table_name, $where_id_name, $where_id) {
        return $this->model->getRecords_Where($table_name, $where_id_name, $where_id);
    }

    //GET records offset Where
    public function getRecords_WhereOffset($table_name, $where_id_name, $where_id, $offset) {
        return $this->model->getRecords_WhereOffset($table_name, $where_id_name, $where_id, $offset);
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //GET records Where String
    public function getRecords_WhereString($table_name, $where_text_name, $where_text) {
        return $this->model->getRecords_WhereString($table_name, $where_text_name, $where_text);
    }

    //GET records Where String
    public function getRecords_WhereString_Offset($table_name, $where_text_name, $where_text, $offset) {
        return $this->model->getRecords_WhereString_Offset($table_name, $where_text_name, $where_text, $offset);
    }

    /*     * ******************* ******* ******* ******* ******* ******* ******* *******  ******* */

    //UPDATE records
    public function updateRecords($table_name, $table_id_name, $table_id, $paramters) {
        if ($this->model->updateRecords($table_name, $table_id_name, $table_id, $paramters)) {
            return $this->model->checkRecord($table_name, $table_id_name, $table_id);
        } else
            return false;
    }

    //DELETE records
    public function deleteRecords($table_name, $table_id_name, $table_id) {
        return $this->model->deleteRecords($table_name, $table_id_name, $table_id);
    }

    
    
//################################################################################################//
//*********************************** DataTables Methods  ****************************************//

    public function checkDatatable($requestData) {
    
        $json_data = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => 0,
            "recordsFiltered" => 0,
            "data" => false   // total data array
        );

        if (
                isset($requestData['search']['value']) &&
                isset($requestData['order'][0]['column']) &&
                isset($requestData['order'][0]['dir']) &&
                isset($requestData['start']) &&
                isset($requestData['length'])
        ) {

            
            return false;
        }
        return $json_data;
    }

    
    
    //################################################################################################//
}

?>