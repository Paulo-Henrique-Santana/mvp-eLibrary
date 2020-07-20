<?php
    session_start();
    $id = $_GET['id'];
    $livro = $_GET['livro'];
    $autor = $_GET['autor'];
    $editora = $_GET['editora'];
    $exemplares = $_GET['exemplares'];
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <script src="../back/teste.js"></script>
    <meta charset="utf-8">
    <title>Editar Livro</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="material-icons">arrow_back</i></a>
        <form method="POST" action="../back/editaLivro.php?<?php echo "id=$id&livro=$livro&autor=$autor&editora=$editora&exemplares=$exemplares" ?>">
        <center><h2>Editar Livro</h2></center> 
        <br>
            <h2>Nome do Livro:</h2> <input type="text" name="livro" value="<?php echo $livro; ?>" required>
            <br>
            <h2>Nome do Autor:</h2> <input type="text" name="autor" value="<?php echo $autor; ?>" required>
            <br>
            <h2>Nome da Editora:</h2> <input type="text" name="editora" value="<?php echo $editora; ?>" required>
            <br>
            <h2>Qtd:</h2> <input type="number" name="exemplares" value="<?php echo $exemplares; ?>" required>
            <br>
            <?php 
                if (isset($_SESSION['aviso'])) {
                    echo $_SESSION['aviso'];
                    unset($_SESSION['aviso']);
                }
            ?>
            <button>Editar</button>
        </form>
    </section>
</body>

</html>