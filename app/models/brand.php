<?php
class brand {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getBrand(){
        $sql = "SELECT * FROM brand";
        return $this->db->select($sql);
    }
}
?>