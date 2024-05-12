<?php
class home extends Controller{
    private $laptopModel;
    private $brandModel;
    public function __construct(){
        $this->laptopModel = $this->model('laptop');
        $this->brandModel = $this->model('brand');
    }

    public function index(){
        $laptop = $this->laptopModel->getLaptop();
        $brand = $this->brandModel->getBrand();
        $laptop_last = $this->product_new();
        $laptop_gaming = $this->laptop_gaming();
        $laptop_macbook = $this->laptop_macbook();
        $this->view('home', ['laptop' => $laptop, 'brand' => $brand, 'laptop_last' => $laptop_last, 'laptop_gaming' => $laptop_gaming, 'laptop_macbook' => $laptop_macbook]);
    }
    public function logout(){
        session_destroy();
        header('Location: ' . URLROOT . 'home');
    }
    public function product_new(){
        $laptop = $this->laptopModel->getLaptop();
        $discountedLaptops = array_filter($laptop, function($l) {
            return $l['discount'] > 0;
        });

        usort($discountedLaptops, function($a, $b) {
            return $b['discount'] - $a['discount'];
        });

        $laptops = array_slice($discountedLaptops, 0, 6);
        return $laptops;
    }
    public function laptop_gaming(){
        $laptop = $this->laptopModel->getLaptop();
        $laptops = array_filter($laptop, function($l) {
            return stripos($l['name'], 'gaming') !== false;
        });

        $laptops = array_slice($laptops, 0, 5);
        return $laptops;
    }
    public function laptop_macbook(){
        $laptop = $this->laptopModel->getLaptop();
        $laptops = array_filter($laptop, function($l) {
            return stripos($l['name'], 'macbook') !== false;
        });

        $laptops = array_slice($laptops, 0, 5);
        return $laptops;
    }
    function pagination(){
        $laptop = $this->laptopModel->getLaptop();
        $total = count($laptop);
        $limit = 25;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $data = array_slice($laptop, $start, $limit);
        echo json_encode([
            'data' => $data,
            'total' => $total
        ]);    
    }
}
?>