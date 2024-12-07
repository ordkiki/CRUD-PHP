<?php
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../config/Database.php';
use Config\Database;

class UserController {
    private $UserModel;

    public function __construct() {
        $database = new Database;
        $db = $database->GetConnection();
        $this->UserModel = new UserModel($db);
    }

    public function Create() {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data) {
            echo json_encode(["message" => "Données JSON invalides"]);
            return;
        }

        if ($this->UserModel->CreateUser($data)) {
            echo json_encode(["message" => "Création réussie"]);
        } else {
            echo json_encode(["message" => "Échec de la création"]);
        }
    }

    public function Get_User()
    {
        $Users = $this->UserModel->ListeAll();
        echo json_encode($Users);
    }
    public function Delete_user($id)
    {
        $Users = $this->UserModel->Remove_User_ById($id);
        echo json_encode($Users);
    }
}
