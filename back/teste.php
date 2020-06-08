<?php

include '/classes/Locacao.php';

$l = new Locacao;
echo $l->pesquisaExemplarDisponivel(3);
print_r($l->listarLocacoes());

?>