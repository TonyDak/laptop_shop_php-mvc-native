<?php
class product_detail extends Controller{
    private $laptopModel;
    public function __construct(){
        $this->laptopModel = $this->model('laptop');
    }

    public function index(){
        $this->view('home/product_detail');
    }
    
}
?>