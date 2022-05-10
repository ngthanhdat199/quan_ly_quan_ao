<?php
class Register extends Controller {
    public $userModel;

    public function __construct(){
        // Model
        $this->userModel = $this->model("UserModel");
    }

    public function SayHi() {
        $this->view("master1", [
            "page"=> "register"
        ]);
    }

    public function user() {
        if(isset($_POST["btnRegister"]))  {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $email = $_POST["email"];
            $fullname = $_POST["fullname"];
            $address = $_POST["address"];

            $kq = $this->userModel->insertNewUser($username, $password, $email, $fullname, $address);
            $this->view("master1", [
                "page"=> "register",
                "result"=>$kq
            ]);
        }
    }
}
?>