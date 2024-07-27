<?php
class laptop {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getLaptop(){
        $sql = "SELECT * FROM laptop";
        return $this->db->select($sql);
    }
    public function getLaptopByName($name){
        $sql = "SELECT * FROM laptop WHERE name = '$name'";
        return $this->db->select($sql);
    }
}
?>