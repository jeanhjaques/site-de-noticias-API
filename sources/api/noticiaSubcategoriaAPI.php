<?php
    include_once '../app/controllers/NoticiaSubCategoriaController.php';
    include_once '../app/controllers/LoginController.php';

    if(LoginController::logar($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) || $_SERVER["REQUEST_METHOD"] == 'POST' ){
        switch($_SERVER["REQUEST_METHOD"]){
            case 'GET':
                echo NoticiaSubCategoriaController::readAll();
                break;
            case 'POST':
                echo NoticiaSubCategoriaController::cadastrarNoticiaSubCategoria($_POST);
                break;
            case 'DELETE':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo NoticiaSubCategoriaController::deleteNoticiaSubCategoria($dadosDecodificados);
                break;
        }
    }
    else{
        echo '{"login":"false"}';
    }
?>