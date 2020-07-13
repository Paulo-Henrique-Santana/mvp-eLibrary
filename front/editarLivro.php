<?php
    require_once '../back/classes/CrudLivro.php';
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
    <meta charset="utf-8">
    <title>sei la</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="material-icons">arrow_back</i></a>
        <form method="POST">
        <center><h2>sei la</h2></center> 
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
                if(isset($_POST['livro']) && isset($_POST['autor']) && isset($_POST['editora']) && isset($_POST['exemplares'])){
                    if($_POST['livro'] == $livro && $_POST['autor'] == $autor && $_POST['editora'] == $editora && $_POST['exemplares'] == $exemplares){
                        echo "nenhum campo foi alterado<br>";
                    } else{
                        echo "algum campo alterado";
                    }
                }
            ?>
            <button>Editar</button>
        </form>
    </section>
</body>

</html>