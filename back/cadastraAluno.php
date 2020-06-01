<?php

session_start();

include 'classes/Aluno.php';

$a = new Aluno;
$a->setNome($_POST['nome']);
$a->setRg($_POST['rg']);
$a->setTelefone($_POST['telefone']);
if ($a->cadastraAluno() == true) {
    $_SESSION['cadastraAluno'] = "Aluno cadastrado com sucesso";
    header('location: ../front/cadastroAluno.php');
}

?>