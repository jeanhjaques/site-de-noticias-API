<?php 
    include_once '../app/controllers/CargoController.php';
    include_once '../app/controllers/LoginController.php';

    if(LoginController::logar($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) || $_SERVER["REQUEST_METHOD"] == 'POST' ){
        switch($_SERVER["REQUEST_METHOD"]){
            case 'GET':
                if(isset($_GET['id'])){
                    echo CargoController::readById($_GET['id']);
                }
                else{
                    echo CargoController::readAll();
                }
                break;
            case 'POST':
                echo CargoController::cadastrarCargo($_POST);
                break;
            case 'PUT':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo CargoController::atualizarCargo($dadosDecodificados);
                break;
            case 'DELETE':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo CargoController::deleteCargo($dadosDecodificados->id);
                break;
        }
    }
    else{
        echo '{"login":"false"}';
    }
?>