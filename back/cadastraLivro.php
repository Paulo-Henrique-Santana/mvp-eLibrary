<?php

session_start();

include 'classes/CrudLivro.php';

$l = new CrudLivro;
$l->setNomeLivro($_POST["nomeLivro"]);
$l->setNomeAutor($_POST["nomeAutor"]);
$l->setNomeEditora($_POST["nomeEditora"]);
$l->setQtdExemplar($_POST["qtd"]);
if ($l->cadastraLivro() == false){
    $_SESSION['cadastraLivro'] = "Livro já está cadastrado";
    header('location: ../front/cadastrarLivros.php');
} else{
    $_SESSION['cadastraLivro'] = "Livro cadstrado com sucesso";
    header('location: ../front/cadastrarLivros.php');
}

?>