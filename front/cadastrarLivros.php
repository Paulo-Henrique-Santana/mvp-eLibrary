<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="icon" href=" https://pngimage.net/wp-content/uploads/2018/06/livro-icon-png.png">
    <title>Cadastro Livro</title>
    <link rel="stylesheet" href="style/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <section>
        <div>
            <a href="index.html"><i class="  material-icons">arrow_back</i></a>
        </div>
        <form method="POST" action="../back/cadastraLivro.php">

            <h2>Nome do Livro:</h2> <input type="text" name="nomeLivro" required>
            <br>
            <h2>Nome do Autor:</h2> <input type="text" name="nomeAutor" required>
            <br>
            <h2>Nome da Editora:</h2> <input type="text" name="nomeEditora" required>
            <br>
            <h2>Qtd:</h2> <input type="number" name="qtd" required> <br>
            <?php 
                if(isset($_SESSION['cadastraLivro'])){
                    echo "<br>".$_SESSION['cadastraLivro']."<br>";
                    unset($_SESSION['cadastraLivro']);
                }
            ?>
            <button>Cadastrar</button>

        </form>
    </section>
</body>

</html>