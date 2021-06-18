<?php
include_once '../app/model/EditorDAO.php';

class LoginController{
    public static function logar($login, $senha){
        return EditorDAO::login($login, md5($senha));
    }
}