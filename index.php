    <?php
    require_once "controller/UserController.php";

    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Allow-Origin: *");

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $userController = new UserController();
            $action = $_GET['action'] ?? null;

            if ($action === 'create') {
                $userController->Create();
            } elseif ($action === 'delete') {
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $userController->Delete_user($id);
                } else {
                    echo json_encode(["message" => "ID manquant pour la suppression"]);
                }
            }
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
