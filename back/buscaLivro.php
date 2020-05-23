<?php

include 'classes/CrudLivro.php';

$tipo = $_POST['tipo'];
$pesquisa = $_POST['pesquisa'];

if ($tipo == "livro"){
    $l = new CrudLivro;
    echo "<pre>";
    print_r($l->buscarNomeLivro($pesquisa));
} else if($tipo == "autor"){
    $l = new CrudLivro;
    echo "<pre>";
    print_r($l->buscarNomeAutor($pesquisa));
}

?>