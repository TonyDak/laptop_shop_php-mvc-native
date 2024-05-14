<?php
class login extends Controller{
    private $userModel;
    public function __construct(){
        $this->userModel = $this->model('user');
    }
    public function index(){
        $data = $this->userModel->getUser();
        $this->view('home/login', $data);
    }
    public function login(){
        $data = $this->userModel->getUser();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $error = false;
            $email = $_POST['email'];
            $password = $_POST['password'];
            foreach($data as $user){
                if($email == $user['email'] && password_verify($password, $user['password_hash'])){
                    $_SESSION['user'] = $user;
                    $error = true;
                    echo json_encode(['check' => 'success']);
                }
            }
            if(!$error){
                echo json_encode(['check' => 'error']);
            }
        }
    }
    public function logout(){
        session_destroy();
        header('Location: ' . URLROOT . 'home');
    }
}
?>