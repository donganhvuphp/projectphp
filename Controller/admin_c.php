<?php
    include_once 'Model/admin_m.php';
    class Admin_c extends Admin_m
    {
        private $admin;
        function __construct()
        {
            $this->admin = new Admin_m();
        }
        
        public function option(){
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'login';
            }
            switch ($method ) {
                case 'login':
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
?>