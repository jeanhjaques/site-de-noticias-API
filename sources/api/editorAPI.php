<?php
    include_once '../app/controllers/EditorController.php';

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
            echo EditorController::atualizarEditor($_PUT);
            break;
    }
?>