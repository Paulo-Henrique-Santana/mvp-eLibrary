<?php

include_once '../back/classes/Locacao.php';

if (isset($_GET['idAluno']) && isset($_GET['locacao'])){
    $idLocacao = $_GET['locacao'];
    $idAluno = $_GET['idAluno'];
    $l = new Locacao;
    $l->devolverLocacao($idLocacao);
    header("location: ../front/devolverLivro.php?idAluno=$idAluno");
}


?>