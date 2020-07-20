<?php
    session_start();
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $ra = $_GET['ra'];
    $tel = $_GET['telefone'];
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <script src="../back/teste.js"></script>
    <meta charset="utf-8">
    <title>Editar Aluno</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="material-icons">arrow_back</i></a>
        <form method="POST" action="../back/editaAluno.php?<?php echo "id=$id&nome=$nome&ra=$ra&telefone=$tel" ?>">
        <center><h2>Editar Aluno</h2></center> 
        <br>
            <h2>Nome :</h2> <input type="text" name="nome" value="<?php echo $nome; ?>" required>
            <br>
            <h2>RA : </h2> <input type="number" name="ra" value="<?php echo $ra; ?>" required>
            <br>
            <h2>Numero :</h2> <input type="tel" name="telefone" value="<?php echo $tel; ?>" maxlength="15" required>
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