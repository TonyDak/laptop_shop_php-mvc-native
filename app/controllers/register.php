<?php
class register extends Controller{
    private $userModel;
    public function __construct(){
        $this->userModel = $this->model('user');
    }
    public function index(){
        $data = $this->userModel->getUser();
        $this->view('home/register', $data);
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];
            if($this->userModel->register($data)){
                echo json_encode(['check' => 'success']);
            }  
        }
    }
}
?>