<?php 
    require_once '../model/User.model.php';
    require_once '../config/Database.php';
    class UserController{
        private $UserModel;

        public function __construct()
        {
            $database = new Database;
            $db = $database->GetConnection();
            $this->UserModel = new UserModel($db);
        }

        public function Create()
        {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->UserModel->CreateUser($data))
            {
                echo json_encode(["message" => "Successfully"]);
            }
            else
            {
                echo json_encode(["message" => "Successfully"]);
            }
        }
    }
?>