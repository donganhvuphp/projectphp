<?php
    include_once 'Model/user_m.php';
    class User_c extends User_m
    {
        private $user;
        function __construct()
        {
            $this->user = new User_m();
        }
        public function login_c(){
            include_once 'View/user/login.php';
        }
        public function regiter(){
            include_once 'View/user/register.php';
        }
        public function infoUser_c(){
            $infoUser = $this->user->getInfoUser_m($_SESSION['id']);
            include_once 'View/info/infoUser.php';
        }

        public function addInfoUser_c(){
            include_once 'View/info/addInfo.php';
        }
        public function option(){
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'login';
            }
            switch ($method) {
                case 'login':
                    $this->login_c();
                    if(isset($_POST['checkPass'])){
                        $email = $_POST['email-pass'];
                        $acc = $this->user->checkEmail($email);
                        if(empty($acc)){
                            $_SESSION['checkMail'] = 1;
                            header('Location:index.php?page=user&method=login');
                        }elseif(!empty($acc)){
                            $this->user->ForgotPass_m($email, $acc[0]['email'] ,$acc[0]['password']);
                        }
                    }
                    elseif(isset($_POST['login'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $this->user->login_m($email,$password);
                    }
                    break;
                case 'register':
                    $this->regiter();
                    if(isset($_POST['register'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $repass = $_POST['re-password'];
                        if($password == $repass){
                            $this->user->registerUser_m($email, $password);
                        }else{
                            $_SESSION['email'] = $email;
                            $_SESSION['error'] = 1;
                            header('Location:index.php?page=user&method=register');
                        }
                    }
                    break;
                case 'infoUser':
                    $this->infoUser_c();
                    break;
                case 'logout':
                    session_destroy();
                    header('Location:index.php?page=user&method=infoUser');
                    break;
                case 'addInfo':
                    $this->addInfoUser_c();
                    if(isset($_POST['addInfo'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $gender = $_POST['gender'];
                        $address = $_POST['address'];
                        //xu ly avatar
                        $img = $_FILES['avatar'];
                        $avatar = time().$this->user->convert_name($img['name']);
                        $tmp_name = $img['tmp_name'];
                        move_uploaded_file($tmp_name,'access/upload/images/'.$avatar);
                        $this->user->addInfoUser_m($id,$name,$avatar,$phone,$gender,$address);
                    }
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
?>