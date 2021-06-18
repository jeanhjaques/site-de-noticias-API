<?php 
    include_once '../app/controllers/CategoriaController.php';
    include_once '../app/controllers/LoginController.php';

    if(LoginController::logar($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) || $_SERVER["REQUEST_METHOD"] == 'POST' ){
        switch($_SERVER["REQUEST_METHOD"]){
            case 'GET':
                if(isset($_GET['id'])){
                    echo CategoriaController::readById($_GET['id']);
                }
                else{
                    echo CategoriaController::readAll();
                }
                break;
            case 'POST':
                echo CategoriaController::cadastrarCategoria($_POST);
                break;
            case 'PUT':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo CategoriaController::atualizarCategoria($dadosDecodificados);
                break;
            case 'DELETE':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo CategoriaController::deleteCategoria($dadosDecodificados->id);
                break;
        }
    }
    else{
        echo '{"login":"false"}';
    }
?>