<?php
    require_once '../back/classes/Aluno.php';
    session_start();
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $rg = $_GET['rg'];
    $tel = $_GET['telefone'];
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>Editar Aluno</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="material-icons">arrow_back</i></a>
        <form method="POST">
        <center><h2>Editar Aluno</h2></center> 
        <br>
            <h2>Nome :</h2> <input type="text" name="nome" value="<?php echo $nome; ?>" required>
            <br>
            <h2>RG : </h2> <input type="number" name="rg" value="<?php echo $rg; ?>" required>
            <br>
            <h2>Numero :</h2> <input type="tel" name="telefone" value="<?php echo $tel; ?>" maxlength="15" required>
            <br>
            <?php 
                if(isset($_POST['nome']) && isset($_POST['rg']) && isset($_POST['telefone'])){
                    if($nome == $_POST['nome'] && $rg == $_POST['rg'] && $tel == $_POST['telefone']){
                        echo "nenhum campo foi alterado<br>";
                    } else{
                        $aluno = new Aluno;
                        $aluno->atualizarDados($id, $_POST['nome'], $_POST['rg'], $_POST['telefone']);
                        header('location: pesquisarAluno.php');
                    }
                }
            ?>
            <button>Editar</button>
        </form>
    </section>
</body>

</html>