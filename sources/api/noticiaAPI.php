<?php
    include_once '../app/controllers/NoticiaController.php';
    include_once '../app/controllers/LoginController.php';

    if(LoginController::logar($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) || $_SERVER["REQUEST_METHOD"] == 'POST' ){
        switch($_SERVER["REQUEST_METHOD"]){
            case 'GET':
                if(isset($_GET['id'])){
                    echo NoticiaController::readById($_GET['id']);
                }
                else{
                    echo NoticiaController::readAll();
                }
                break;
            case 'POST':
                echo NoticiaController::cadastrarNoticia($_POST);
                break;
            case 'PUT':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo NoticiaController::atualizarNoticia($dadosDecodificados);
                break;
            case 'DELETE':
                $dadosDecodificados = json_decode(file_get_contents('php://input'));
                echo NoticiaController::deleteNoticia($dadosDecodificados->id);
                break;
        }
    }
    else{
        echo '{"login":"false"}';
    }
?>