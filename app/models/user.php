<?php
class user{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getUser(){
        $sql = "SELECT * FROM user";
        return $this->db->select($sql);
    }
    public function register($data){
        $user_id = uniqid();
        $current_date = date('Y-m-d');
        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (user_id, first_name, last_name, email, password_hash, is_account_enabled, created_at) VALUES ('$user_id','$data[first_name]', '$data[last_name]', '$data[email]', '$password_hash', 1, '$current_date')";
        return $this->db->execute($sql);
    }
}
?>