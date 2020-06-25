<?php
    include '../back/classes/Locacao.php';
    $l = new Locacao;
    $idAluno = $_GET['idAluno'];
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
        <table>
            <tr>
                <th>Livro</th>
                <th>Data de Locação</th>
                <th>Data de Entrega</th>
                <th>Situação</th>
            </tr>
            <?php
                $registros = $l->listarLocacoesAluno($idAluno);
                foreach ($registros as $key => $value) {
                    echo"<tr>";
                    foreach ($value as $key => $value) {
                        echo"<td>$value</td>";
                    }
                    echo'<td><a href="#">Devolver</a></td>';
                    echo"</tr>";
                }
            ?>
        </table>
    </section>
</body>

</html>