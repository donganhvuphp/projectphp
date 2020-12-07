<?php
    include_once 'config/myconfig.php';
    class User_m extends Connect
    {
        protected function __construct()
        {   
            parent::__construct();
        }
        //register
        protected function registerUser_m($email, $password){
            $check = "SELECT `email` FROM `acc_user` WHERE email = '$email'";
            $acc = $this->executeResult($check);
            if(empty($acc)){
                $sql = "INSERT INTO `acc_user`(`email`, `password`) VALUES ('$email','$password')";
                $_SESSION['success'] = 1;
                $this->execute($sql);
                header('Location:index.php?page=user&method=login');
            }else{
                $_SESSION['error'] = 2;
                header('Location:index.php?page=user&method=register');
            }
        }
        protected function checkEmail($email){
            $check = "SELECT * FROM `acc_user` WHERE email = '$email'";
            return $this->executeResult($check);
        }
        protected function login_m($email,$password){
            $check = "SELECT `id`, `email`, `password` FROM `acc_user` WHERE email = '$email'";
            $acc = $this->executeResult($check);
            if(empty($acc)){
                $_SESSION['error'] = 3;
                header('Location:index.php?page=user&method=login');
            }elseif(!empty($acc) && $acc[0]['password'] != $password){
                $_SESSION['email'] = $email;
                $_SESSION['error'] = 4;
                header('Location:index.php?page=user&method=login');
            }elseif(!empty($acc) && $acc[0]['password'] == $password){
                $_SESSION['success'] = 2;
                $_SESSION['user'] = $email;
                $_SESSION['id'] = $acc[0]['id'];
                header('Location:index.php?page=user&method=infoUser');
            }
        }
        //convert name images
        protected function convert_name($str) {
            $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
            $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
            $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
            $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
            $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
            $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
            $str = preg_replace("/(đ)/", 'd', $str);
            $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
            $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
            $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
            $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
            $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
            $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
            $str = preg_replace("/(Đ)/", 'D', $str);
            $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
            $str = preg_replace("/( )/", '-', $str);
            return $str;
        }
        protected function getInfoUser_m($id){
            $sql = "SELECT `name`, `phone`, `gender`, `address`, `avatar`, `create_at` FROM `info_user` WHERE id_user = $id";
            return $this->executeResult($sql);
        }
        protected function addInfoUser_m($id,$name,$avatar,$phone,$gender,$address){
            $sql = "INSERT INTO `info_user`(`id_user`, `name`, `phone`, `gender`, `address`, `avatar`) VALUES ($id,'$name','$phone','$gender','$address','$avatar')";
            $this->execute($sql);
            $_SESSION['add'] = 3;
            header('Location:index.php?page=user&method=infoUser');
        }

        protected function ForgotPass_m($email, $name ,$password){

            include_once 'PHPMailer/class.phpmailer.php';
            include_once 'PHPMailer/class.smtp.php';
            $mail = new PHPMailer(true);

            try{
                $mail ->CharSet = "UTF-8";
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'donganhvu16@gmail.com';                     // SMTP username
                $mail->Password   = '';                               // SMTP password
                $mail->Port       = 587;                                   // TCP port to connect to, 
    
                //Recipients
                $mail->setFrom('donganhvu16@gmail.com', 'Admin');
                $mail->addAddress($email, $name);// Add a recipient
    
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Forgot password';
                $mail->Body    = 'Mật khẩu của bạn là: '.$password;
    
                $mail->send();
            }catch(Exception $e){
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		    }
        }
    }
?>