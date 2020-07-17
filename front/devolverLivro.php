<?php
    require_once '../back/classes/Locacao.php';
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>Valida RA</title>
</head>

<body>
    <section>
        <a href="validara.php"><i class="material-icons">arrow_back</i></a>
        <br>
        <center><h2>Devolução de Livros</h2></center> <br>
            <?php
                $locacao = new Locacao;
                $locacao->atualizarSituacaoLocacao();
                $idAluno = $_GET['idAluno'];
                $registros = $locacao->listarLocacoesAluno($idAluno);
                $count = count($registros);
                if ($count > 0){
                    date_default_timezone_set('America/Sao_Paulo');
                    echo'<table style="width: 100%;">
                            <tr>
                                <th>Livro</th>
                                <th>Data de Locação</th>
                                <th>Data de Entrega</th>
                                <th>Situação</th>
                                <th>Devolver</th>
                            </tr>';
                    for ($i = 0; $i < $count; $i++) {
                        echo"<tr>";
                        foreach ($registros[$i] as $key => $value) {
                            if ($key == 'dt_locacao' || $key == 'dt_entrega') {
                                echo "<td>".date('d/m/Y', strtotime($value))."</td>";
                            } elseif ($key != 'id_locacao') {
                                echo "<td>$value</td>";
                            }
                        }
                        echo"<td><a href=\"../back/devolveLocacao.php?idAluno=$idAluno&locacao=".$registros[$i]['id_locacao']."\">Devolver</a></td>";
                        echo'</tr>';
                    }
                    echo'</table>';
                } else{
                    echo'<p style="text-align:center; color:red; font-size:1.3em;"> Aluno não possui locações</p>';
                }
            ?>
        </table>
    </section>
</body>

</html>