<?php 
include_once 'Cargo.php';
include_once 'CargoDAO.php';
/*
$novoCargo->setNome("Administrador");
$novoCargo->setNivelAcesso("3");


echo CargoDAO::create($novoCargo);
*/

$cargos = CargoDAO::read();

//Usando fectch Assoc
/*
foreach($cargos as $cargo)
    echo $cargo["idcargo"].". ".$cargo['nome']."<br>";
?>
*/

//Usando class
$cargos = CargoDAO::read();

foreach($cargos as $cargo)
    echo $cargo->getIdCargo().". ".$cargo->getNome()." ".$cargo->getNivelAcesso()."<br>";
?>