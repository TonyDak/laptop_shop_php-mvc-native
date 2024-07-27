<?php
class home extends Controller{
    private $laptopModel;
    private $brandModel;
    public function __construct(){
        $this->laptopModel = $this->model('laptop');
        $this->brandModel = $this->model('brand');
    }

    public function index(){
        $brand = $this->brandModel->getBrand();
        $laptop_last = $this->product_discount();
        $laptop_gaming = $this->laptop_gaming();
        $laptop_macbook = $this->laptop_macbook();
        $this->view('home/home', ['brand' => $brand, 'laptop_last' => $laptop_last, 'laptop_gaming' => $laptop_gaming, 'laptop_macbook' => $laptop_macbook]);
    }
    
    public function product_discount(){
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
    function product_detail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $product_name = $_POST['product_name'];
            $laptop_detail = $this->laptopModel->getLaptopByName($product_name);
            $_SESSION['product_detail'] = $laptop_detail;
        }
    }
}
?>