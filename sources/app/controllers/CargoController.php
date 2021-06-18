<?php 
include_once '../app/model/Cargo.php';
include_once '../app/model/CargoDAO.php';

class CargoController{
    public static function readAll(){
        $cargos = CargoDAO::read();

        $cargosArray = [];
        
        foreach($cargos as $cargo){
            array_push($cargosArray, ["id"=> $cargo->getIdcargo(),"nome"=> $cargo->getNome(), "nivelAcesso"=> $cargo->getNivelacesso()]);
        }

        return json_encode($cargosArray);
    }

    public static function readById($id){
        $cargos = CargoDAO::readById($id);

        $cargosArray = [];
        
        foreach($cargos as $cargo){
            array_push($cargosArray, ["id"=> $cargo->getIdcargo(),"nome"=> $cargo->getNome(), "nivelAcesso"=> $cargo->getNivelacesso()]);
        }

        return json_encode($cargosArray);
    }

    public static function cadastrarCargo($cargo){
        $novoCargo = new Cargo();

        $novoCargo->setNome($cargo["nome"]);
        $novoCargo->setNivelacesso($cargo["nivelAcesso"]);

        CargoDAO::create($novoCargo);

        return true;
    }

    public static function atualizarCargo($cargo){
        $novoCargo = new Cargo();

        $novoCargo->setIdcargo($cargo->id);
        $novoCargo->setNome($cargo->nome);
        $novoCargo->setNivelacesso($cargo->nivelAcesso);

        CargoDAO::update($novoCargo);

        return true;
    }

    public static function deleteCargo($id){
        CargoDAO::delete($id);
        return true;
    }
}