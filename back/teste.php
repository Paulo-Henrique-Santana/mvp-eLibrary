<?php

require_once '/classes/Locacao.php';

$l = new Locacao;

date_default_timezone_set('America/Sao_Paulo');
$atual = date('Y/m/d');
$entrega = date('2020/07/03');

if (strtotime($atual) > strtotime($entrega)) {
    echo "data atual maior que da entrega";
} else {
    echo "data de entrega maior que a atual";
}

?>