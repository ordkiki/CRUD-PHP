<?php 
    class Database{
        private $host = "localhost";
        private  $db_name = "CRUD";
        private $username = "root";
        private $password = "";
        public $conn;
        public function __construct(){

        }
        public function GetConnection(){
            $this->conn = NULL;

            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                echo "Authentification de la connection a la bae de donnees";
            }
            catch (PDOException $e)
            {
                echo "Connection echoue". $e->getMessage();
            }
            return $this->conn;
        }
    }
?>