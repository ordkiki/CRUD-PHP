    <?php
    require_once "controller/UserController.php";

    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Allow-Origin: *");

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $userController = new UserController();
            $userController->Create();
            break;

        case 'DELETE':
            try {
                $userController = new UserController();
                $id = $_GET['id'] ?? null;
                if ($userController->Delete_user($id)) {
                    echo json_encode(["message" => "Utilisateur supprimé avec succès."]);
                } else {
                    echo json_encode(["message" => "Échec de la suppression de l'utilisateur."]);
                }
            } catch (\PDOException $e) {
                echo json_encode(["message" => "Erreur : " . $e->getMessage()]);
            }
            break;

        case 'PUT':
            parse_str(file_get_contents("php://input"), $data);
            $id = $_GET['id'] ?? null;
            $userController = new UserController();

            if ($id && $userController->Put($id)) {
                echo json_encode(["message" => "Utilisateur mis à jour avec succès."]);
            } else {
                echo json_encode(["message" => "Échec de la mise à jour."]);
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
