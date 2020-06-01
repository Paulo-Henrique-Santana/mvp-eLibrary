<?php
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
        <form method="POST" action="../back/cadastraAluno.php">
            <h2>Nome :</h2> <input type="text" name="nome">
            <br>
            <h2>RG : </h2> <input type="number" name="rg">
            <br>
            <h2>Numero :</h2> <input type="tel" name="telefone" maxlength="15">
            <!-- pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" -->
            <br>
            <?php 
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