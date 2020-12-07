<?php
    class Connect
    {
        private const host = 'localhost';
        private const user = 'root';
        private const pass = '';
        private const dbname = 'ltmt1k10';
        protected $conn = null;
        protected function __construct()
        {
            $this->conn = mysqli_connect(self::host , self::user , self::pass, self::dbname);
            if($this->conn){
                mysqli_set_charset($this->conn, 'utf8');
            }else{
                echo "can't connect to database";
            }
        }

        //insert update delete
        protected function execute($sql){
            return mysqli_query($this->conn, $sql);
        }
        // select 
        protected function executeResult($sql){
            $result = array();
            $data = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_assoc($data)){
                $result[] = $row;
            }
            return $result;
        }
    }
?>