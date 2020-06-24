<?php
    include '../back/classes/Locacao.php';
    session_start();
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
        <a href="index.html"><i class="material-icons">arrow_back</i></a>
        <form method="POST">
            <br>
            <input type="text" name="rg" placeholder="Digite seu RG" required>
            <?php 
                if (isset($_POST['rg']) && isset($_POST['acao'])){
                    $l = new Locacao;
                    if ($_POST['acao'] == "alugar"){
                        if ($l->validaRg($_POST['rg']) == false){
                            $_SESSION['validaRG'] = "rg n cadastrado";
                        } else if($l->verificaLocacoesAluno($_POST['rg']) >= 3){
                            $_SESSION['validaRG'] = "Aluno já possui 3 livros alugados";
                        } else{
                            $idAluno = $l->validaRg($_POST['rg']);
                            $locacoesAluno = $l->verificaLocacoesAluno($_POST['rg']);
                            header("location: locacao.php?idAluno=$idAluno&locacoes=$locacoesAluno");
                        }
                    }
                    else {
                        if ($l->validaRg($_POST['rg']) == false){
                            $_SESSION['validaRG'] = "rg n cadastrado";
                        } else {
                            echo "devolver";
                        }
                    }
                }
                if(isset($_SESSION['validaRG'])){
                    echo "<br>".$_SESSION['validaRG']."<br>";
                    unset($_SESSION['validaRG']);
                }
            ?>
            <button name="acao" value="alugar">Realizar Locação</button>
            <button name="acao" value="devolver">Devolver</button>
        </form>
    </section>
</body>

</html>