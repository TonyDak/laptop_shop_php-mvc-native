<?php
class product_all extends Controller{
    private $laptopModel;
    private $brandModel;
    public function __construct(){
        $this->laptopModel = $this->model('laptop');
        $this->brandModel = $this->model('brand');
    }
    public function index(){
        $laptop = $this->laptopModel->getLaptop();
        $brand = $this->brandModel->getBrand();
        $this->view('home/product_all', ['laptop' => $laptop, 'brand' => $brand]);
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