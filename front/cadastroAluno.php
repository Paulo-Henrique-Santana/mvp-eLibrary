<?php
    require_once '../back/classes/Aluno.php';
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
    <title>Cadastro de Aluno</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="  material-icons">arrow_back</i></a>
        <form method="POST">
        <center><h2>Cadastro de Aluno</h2></center> <br>

            <h2>Nome :</h2> <input type="text" name="nome" required>
            <br>
            <h2>RA : </h2> <input type="number" name="ra" required>
            <br>
            <h2>Telefone :</h2> <input type="tel" name="telefone" maxlength="15" required>
            <br>
            <?php 
                if (isset($_POST['nome']) && isset($_POST['ra']) && isset($_POST['telefone'])){
                    $a = new Aluno;
                    $a->setNome($_POST['nome']);
                    $a->setRa($_POST['ra']);
                    $a->setTelefone($_POST['telefone']);
                    if ($a->validaRa() == true) {
                        echo "<p class='msgErro'>RA já cadastrado</p>";
                    }elseif ($a->validaTelefone() == true) {
                        echo "<p class='msgErro'>Telefone já cadastrado</p>";
                    }elseif ($a->validaRa() == false && $a->validaTelefone() == false) {
                        $a->cadastraAluno();
                        echo "<p class='msgSucesso'>Aluno cadastrado com sucesso</p>";
                    }
                }
            ?>
            <button>Enivar</button>
        </form>
    </section>
</body>

</html>