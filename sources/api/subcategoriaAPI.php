<?php
    include_once '../app/controllers/SubCategoriaController.php';
    include_once '../app/controllers/LoginController.php';

    if(LoginController::logar($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) || $_SERVER["REQUEST_METHOD"] == 'POST' ){
        switch($_SERVER["REQUEST_METHOD"]){
            case 'GET':
                if(isset($_GET['id'])){
                    echo SubCategoriaController::readById($_GET['id']);
                }
                else{
                    echo SubCategoriaController::readAll();
                }
                break;
            case 'POST':
                echo SubCategoriaController::cadastrarSubCategoria($_POST);
                break;
            case 'PUT':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo SubCategoriaController::atualizarSubCategoria($dadosDecodificados);
                break;
            case 'DELETE':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo SubCategoriaController::deleteSubCategoria($dadosDecodificados->id);
                break;
        }
    }
    else{
        echo '{"login":"false"}';
    }
?>