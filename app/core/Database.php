
<?php
class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    }
    public function select($query){
        $result = $this->conn->query($query);
        $data = [];
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }
    public function execute($query){
        $result = $this->conn->query($query);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function testConnection(){
        if ($this->conn->connect_error) {
            echo "Connection failed: " . $this->conn->connect_error;
        } else {
            echo "Database connection successful!";
        }
    }
}