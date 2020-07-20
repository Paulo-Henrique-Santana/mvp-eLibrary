<?php

require_once '../back/classes/CrudLivro.php';
session_start();

if(isset($_GET['id']) && isset($_GET['livro']) && isset($_GET['autor']) && isset($_GET['editora'])){
    $CrudLivro = new CrudLivro;
    $CrudLivro->adicionarExemplar($_GET['id']);
    header("location: ../front/editarLivro.php?id=".$_GET['id']."&livro=".$_GET['livro']."&autor=".$_GET['autor']."&editora=".$_GET['editora']."&exemplares=".$_GET['editora']);
};