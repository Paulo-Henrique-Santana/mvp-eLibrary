<?php

session_start();

include 'classes/Locacao.php';

$l = new Locacao;
if ($l->validaRg($_POST['rg']) == false){
    $_SESSION['validaRG'] = "rg n cadastrado";
    header('location: ../front/validarg.php');
} else if($l->verificaLocacoesAluno($_POST['rg']) == false){
    $_SESSION['validaRG'] = "Aluno já possui 3 livros alugados";
    header('location: ../front/validarg.php');
} else{
    header('location: ../front/locacao.php');
}



