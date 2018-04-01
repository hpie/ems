<?PHP

class status_m extends Models {

    public $query;

    public function __construct() {
        $this->query = new Query();
    }    
    public function getstatus() {
        $q = "SELECT * FROM cdac_status";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    
    
    public function insertCategories($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO categories($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
    
    public function updateCategories($params,$categoriesId) {       
        $columnsdesc = $this->updateMaker($params,$categoriesId);
        if ($columnsdesc) {
            $q = "UPDATE categories SET $columnsdesc WHERE categories_id =$categoriesId";
            return $this->query->update($q);
        }
        return FALSE;    
    }
    
    
    
    public function getSubCategories() {
        $q = "SELECT sc.*,c.* FROM subcategories sc
              LEFT JOIN categories c
              ON c.categories_id=sc.refCategories_id";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function getSingleSubCategories($subcategoriesId) {
        $q = "SELECT * FROM subcategories WHERE subcategories_id =$subcategoriesId";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function insertSubCategories($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO subcategories($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
    
    public function updateSubCategories($params,$subcategoriesId) {       
        $columnsdesc = $this->updateMaker($params,$subcategoriesId);
        if ($columnsdesc) {
            $q = "UPDATE subcategories SET $columnsdesc WHERE subcategories_id =$subcategoriesId";
            return $this->query->update($q);
        }
        return FALSE;    
    }
    
    
    
    
    
     public function getUnderSubCategories() {
        $q = "SELECT sc1.*,sc.* FROM sub1categories sc1
              LEFT JOIN subcategories sc
              ON sc.subcategories_id=sc1.refSubcategories_id";
        $result = $this->query->select($q);
        if ($data = $this->query->fetch_array($result)) {
            return $data;
        }
        return false;
    }
    public function getSingleUnderSubCategories($subcategoriesId) {
        $q = "SELECT * FROM sub1categories WHERE sub1categories_id =$subcategoriesId";
        $result = $this->query->select($q);
        if ($row = $this->query->fetch($result)) {
            return $row;
        }
        return false;
    }
    public function insertUnderSubCategories($params) {
        $columns = $this->insertMaker($params, $values);
        if ($columns) {
            $q = "INSERT INTO sub1categories($columns) values($values)";
            return $this->query->insert($q);
        }
        return FALSE;
    }
    
    public function updateUnderSubCategories($params,$subcategoriesId) {       
        $columnsdesc = $this->updateMaker($params,$subcategoriesId);
        if ($columnsdesc) {
            $q = "UPDATE sub1categories SET $columnsdesc WHERE sub1categories_id =$subcategoriesId";
            return $this->query->update($q);
        }
        return FALSE;    
    }
    
}

?>