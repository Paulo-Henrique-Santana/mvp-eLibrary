<?php

include 'classes/CrudLivro.php';

$tipo = $_POST['tipo'];
$pesquisa = $_POST['pesquisa'];

if ($tipo == "livro"){
    $l = new CrudLivro;
    $l->buscarNomeLivro($pesquisa);
} else if($tipo == "autor"){
    $l = new CrudLivro;
    $l->buscarNomeAutor($pesquisa);
}

?>