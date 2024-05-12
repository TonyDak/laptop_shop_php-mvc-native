<?php
class admin extends Controller{
    private $laptopModel;
    public function __construct(){
        $this->laptopModel = $this->model('laptop');
    }

    public function index(){
        $laptop = $this->laptopModel->getLaptop();
        $this->view('admin/admin', ['laptop' => $laptop]);
    }
    
}
?>