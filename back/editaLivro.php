<?php

session_start();
require_once '../back/classes/CrudLivro.php';

$id = $_GET['id'];
$livro = $_GET['livro'];
$autor = $_GET['autor'];
$editora = $_GET['editora'];
$exemplares = $_GET['exemplares'];

if(isset($_POST['livro']) && isset($_POST['autor']) && isset($_POST['editora']) && isset($_POST['exemplares'])){
    if($_POST['livro'] == $livro && $_POST['autor'] == $autor && $_POST['editora'] == $editora && $_POST['exemplares'] == $exemplares){
        $_SESSION['aviso'] = "<p class="msgErro">Nenhum campo foi alterado</p> <br>";
        header("location: ../front/editarLivro.php?id=$id&livro=".$_POST['livro']."&autor=".$_POST['autor']."&editora=".$_POST['editora']."&exemplares=".$_POST['exemplares']);
    } else{
        $crudLivro = new CrudLivro;
        $crudLivro->atualizarLivro($id, $_POST['livro'], $_POST['autor'], $_POST['editora'], $_POST['exemplares']);
        $_SESSION['aviso'] = "<p class='msgSucesso'>Dados editados com sucesso</p> <br>";
        header("location: ../front/editarLivro.php?id=$id&livro=".$_POST['livro']."&autor=".$_POST['autor']."&editora=".$_POST['editora']."&exemplares=".$_POST['exemplares']);
    }
}