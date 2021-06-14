<?php 
include_once 'Editor.php';
include_once 'EditorDAO.php';

/*
$novoEditor = new Editor();


$novoEditor->setNome("Jean");
$novoEditor->setLogin("jeanhenrique7");
$novoEditor->setSenha("senha123");
$novoEditor->setIdcargo("1");

EditorDAO::create($novoEditor);

$novoEditor->setNome("Henrique");
$novoEditor->setLogin("henrique1998");
$novoEditor->setSenha("senha12345");
$novoEditor->setIdcargo("1");

EditorDAO::create($novoEditor);
*/
$editores = EditorDAO::read();

//Usando fectch Assoc
/*
foreach($cargos as $cargo)
    echo $cargo["idcargo"].". ".$cargo['nome']."<br>";
?>
*/

//Usando class
foreach($editores as $editor){
    echo $editor->getIdeditor().". ".$editor->getNome()." ".$editor->getLogin()." ".$editor->getSenha()." ".$editor->getIdcargo()."<br>";
}


?>