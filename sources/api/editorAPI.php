<?php
    include_once '../app/controllers/EditorController.php';
    include_once '../app/controllers/LoginController.php';

    if(LoginController::logar($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) || $_SERVER["REQUEST_METHOD"] == 'POST' ){
        switch($_SERVER["REQUEST_METHOD"]){
            case 'GET':
                if(isset($_GET['id'])){
                    echo EditorController::readById($_GET['id']);
                }
                else{
                    echo EditorController::readAll();
                }
                break;
            case 'POST':
                echo EditorController::cadastrarEditor($_POST);
                break;
            case 'PUT':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo EditorController::atualizarEditor($dadosDecodificados);
                break;
            case 'DELETE':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo EditorController::deleteEditor($dadosDecodificados->id);
                break;
        }
    }
    else{
        echo '{"login":"false"}';
    }
?>