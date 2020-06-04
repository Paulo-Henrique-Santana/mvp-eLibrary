<?php
    include '../back/classes/Aluno.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
<head>

    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>Cadastro Aluno</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="  material-icons">arrow_back</i></a>
        <form method="POST">
            <h2>Nome :</h2> <input type="text" name="nome" required>
            <br>
            <h2>RG : </h2> <input type="number" name="rg" required>
            <br>
            <h2>Numero :</h2> <input type="tel" name="telefone" maxlength="15" required>
            <br>
            <?php 
                if (isset($_POST['nome']) && isset($_POST['rg']) && isset($_POST['telefone'])){
                    $a = new Aluno;
                    $a->setNome($_POST['nome']);
                    $a->setRg($_POST['rg']);
                    $a->setTelefone($_POST['telefone']);
                    if ($a->validaRg() == true) {
                        $_SESSION['cadastraAluno'] = "Esse RG já está cadastrado";
                    }elseif ($a->validaTelefone() == true) {
                        $_SESSION['cadastraAluno'] = "Esse Telefone já foi cadastrado";
                    }elseif ($a->validaRg() == false && $a->validaTelefone() == false) {
                        $a->cadastraAluno();
                        $_SESSION['cadastraAluno'] = "Aluno cadastrado com sucesso";
                    }
                }

                if(isset($_SESSION['cadastraAluno'])){
                    echo "<br>".$_SESSION['cadastraAluno']."<br>";
                    unset($_SESSION['cadastraAluno']);
                }
            ?>
            <button>Enivar</button>
        </form>
    </section>
</body>

</html>