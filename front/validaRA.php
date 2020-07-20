<?php
    require_once '../back/classes/Locacao.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <script src="../back/teste.js"></script>
    <meta charset="utf-8">
    <title>Locação de livros</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="material-icons">arrow_back</i></a>
        <form method="POST">
        <h2>Locação de Livros</h2>
            <br>
            <input type="text" name="ra" placeholder="Digite o RA do aluno" required>
            <?php 
                if (isset($_POST['ra']) && isset($_POST['acao'])){
                    $ra = $_POST['ra'];
                    $l = new Locacao;
                    if ($l->validaRa($_POST['ra']) == false) {
                        echo "<br><p class='msgErro'>RA não cadastrado</p>";
                    } else {
                        $idAluno = $l->validaRa($ra);
                        if ($_POST['acao'] == "alugar") {
                            if($l->verificaLocacoesAluno($ra) >= 3){
                                echo "<br><p class='msgErro'>Aluno já possui 3 livros alugados</p>";
                            } else{
                                $locacoesAluno = $l->verificaLocacoesAluno($ra);
                                header("location: locacao.php?idAluno=$idAluno&ra=$ra&locacoes=$locacoesAluno");
                            }
                        }
                        else {
                            header("location: devolverLivro.php?idAluno=$idAluno");
                        }
                    }
                }
            ?>
            <br>
            <button name="acao" value="alugar">Realizar Locação</button>
            <button name="acao" value="devolver">Devolver</button>
        </form>
    </section>
</body>

</html>