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
    <meta charset="utf-8">
    <title>Locação de livros</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="material-icons">arrow_back</i></a>
        <form method="POST">
        <h2>Locaçao de livros</h2>
            <br>
            <input type="text" name="rg" placeholder="Digite seu RG" required>
            <?php 
                if (isset($_POST['rg']) && isset($_POST['acao'])){
                    $l = new Locacao;
                    if ($l->validaRg($_POST['rg']) == false) {
                        echo $_SESSION['validaRG'] = "RG não cadastrado";
                        unset($_SESSION['validaRG']);
                    } else {
                        $idAluno = $l->validaRg($_POST['rg']);
                        if ($_POST['acao'] == "alugar") {
                            if($l->verificaLocacoesAluno($_POST['rg']) >= 3){
                                echo $_SESSION['validaRG'] = "Aluno já possui 3 livros alugados";
                                unset($_SESSION['validaRG']);
                            } else{
                                $locacoesAluno = $l->verificaLocacoesAluno($_POST['rg']);
                                header("location: locacao.php?idAluno=$idAluno&locacoes=$locacoesAluno");
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