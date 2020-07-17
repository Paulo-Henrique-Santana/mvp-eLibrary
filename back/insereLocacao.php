<?php

if (isset($_GET['exemplar']) && isset($_GET['idAluno']) && isset($_GET['ra']) && isset($_GET['locacoes'])){
    require_once 'classes/Locacao.php';
    $locacao = new Locacao;
    $idExemplar = $_GET['exemplar'];
    $idAluno = $_GET['idAluno'];
    $ra = $_GET['ra'];
    $locacao->inserirLocacao($idAluno, $idExemplar);
    $locacoes = $locacao->verificaLocacoesAluno($_GET['ra']);
    header("location: ../front/locacao.php?idAluno=$idAluno&ra=$ra&locacoes=$locacoes");
}

?>