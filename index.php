<?php
require_once "controller/UserController.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: *");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $userController = new UserController();
        $userController->Create();
        break;
    case 'POST':
        $userController = new UserController();
        $userController->Delete_user(':id');
        break;

    case 'GET':
        $userController = new UserController();
        $userController->Get_User();
        break;
    
    default:
        # code...
        echo json_encode(["message" => "Méthode non autorisée"]);
        break;
}

?>
