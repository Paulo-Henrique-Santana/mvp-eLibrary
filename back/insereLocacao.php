<?php

if (isset($_GET['exemplar']) && isset($_GET['idAluno']) && isset($_GET['rg']) && isset($_GET['locacoes'])){
    require_once '/classes/Locacao.php';
    $locacao = new Locacao;
    $idExemplar = $_GET['exemplar'];
    $idAluno = $_GET['idAluno'];
    $rg = $_GET['rg'];
    $locacao->inserirLocacao($idAluno, $idExemplar);
    $locacoes = $locacao->verificaLocacoesAluno($_GET['rg']);
    header("location: ../front/locacao.php?idAluno=$idAluno&rg=$rg&locacoes=$locacoes");
}

?>