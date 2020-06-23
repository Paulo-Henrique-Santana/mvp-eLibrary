<?php

if (isset($_GET['exemplar']) && isset($_GET['idAluno'])){
    include '/classes/Locacao.php';
    $locacao = new Locacao;
    $idExemplar = $_GET['exemplar'];
    $idAluno = $_GET['idAluno'];
    $locacao->inserirLocacao($idAluno, $idExemplar);
    header("location: ../front/locacao.php?idAluno=$idAluno");
}

?>