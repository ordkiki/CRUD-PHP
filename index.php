<?php
    require_once "controller/User.controller.php";
    // Tous les resources de la controle de lien et l API
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
    header("Access-Control-Allow-Origin: *");

    if ($_SERVER['REQUEST_METHOD' === 'POST']) {
        $userController = new UserController();
        $userController->Create();
    } else {
        echo json_encode(["message" => "Successfully"]);
    }
?>


<h3>Test ok</h3>