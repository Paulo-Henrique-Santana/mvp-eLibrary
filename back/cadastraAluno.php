<?php

include 'classes/Aluno.php';

$a = new Aluno;
$a->setNome($_POST['nome']);
$a->setRg($_POST['rg']);
$a->setTelefone($_POST['telefone']);
$a->cadastraAluno();

?>