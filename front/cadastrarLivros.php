<?php
    require_once '../back/classes/CrudLivro.php';
    session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="icon" href=" https://pngimage.net/wp-content/uploads/2018/06/livro-icon-png.png">
    <title>Cadastro de Livro</title>
    <link rel="stylesheet" href="style/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../back/teste.js"></script>
</head>

<body>
    <section>
        <div>
            <a href="index.html"><i class="  material-icons">arrow_back</i></a>
        </div>
        <form method="POST">
        <center><h2>Cadastro de Livro</h2></center> <br>


            <h2>Nome do Livro:</h2> <input type="text" name="nomeLivro" required>
            <br>
            <h2>Nome do Autor:</h2> <input type="text" name="nomeAutor" required>
            <br>
            <h2>Nome da Editora:</h2> <input type="text" name="nomeEditora" required>
            <br>
            <h2>Qtd:</h2> <input type="number" name="qtd" required> <br>
            <?php 
                if (isset($_POST["nomeLivro"]) && isset($_POST["nomeAutor"]) && isset($_POST["nomeEditora"]) && isset($_POST["qtd"])) {
                    $l = new CrudLivro;
                    $l->setNomeLivro($_POST["nomeLivro"]);
                    $l->setNomeAutor($_POST["nomeAutor"]);
                    $l->setNomeEditora($_POST["nomeEditora"]);
                    $l->setQtdExemplar($_POST["qtd"]);
                    if ($l->cadastraLivro() == false){
                        echo "<p class='msgErro'>Livro já foi cadastrado</p>";
                    } else{
                        echo "<p class='msgSucesso'>Livro cadastrado com sucesso</p>";
                    }
                }

            ?>
            <button>Cadastrar</button>

        </form>
    </section>
</body>

</html>