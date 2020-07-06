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
    <title>Valida RG</title>
</head>

<body>
    <section>
        <a href="validarg.php"><i class="material-icons">arrow_back</i></a>
        <br>
            <?php
                $locacao = new Locacao;
                $locacao->atualizarSituacaoLocacao();
                $idAluno = $_GET['idAluno'];
                $registros = $locacao->listarLocacoesAluno($idAluno);
                if (count($registros) > 0){
                    echo"<table>
                            <tr>
                                <th>Livro</th>
                                <th>Data de Locação</th>
                                <th>Data de Entrega</th>
                                <th>Situação</th>
                            </tr>";
                    for ($i = 0; $i < count($registros); $i++) {
                        echo"<tr>";
                        foreach ($registros[$i] as $key => $value) {
                            if ($key != "id_locacao"){
                                echo"<td>$value</td>";
                            }
                        }
                        echo"<td><a href=\"../back/devolveLocacao.php?idAluno=$idAluno&locacao=".$registros[$i]['id_locacao']."\">Devolver</a></td>";
                        echo"</tr>";
                    }
                    echo"</table>";
                } else{
                    echo"Aluno não possui locações";
                }
            ?>
        </table>
    </section>
</body>

</html>