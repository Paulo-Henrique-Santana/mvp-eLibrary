<?php
    require_once '../back/classes/Aluno.php';
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
            <h2>RA : </h2> <input type="number" name="ra" value="<?php echo $ra; ?>" required>
            <br>
            <h2>Numero :</h2> <input type="tel" name="telefone" value="<?php echo $tel; ?>" maxlength="15" required>
            <br>
            <?php 
                if(isset($_POST['nome']) && isset($_POST['ra']) && isset($_POST['telefone'])){
                    if($nome == $_POST['nome'] && $ra == $_POST['ra'] && $tel == $_POST['telefone']){
                        echo "Nenhum campo foi alterado<br>";
                    } else{
                        $aluno = new Aluno;
                        $aluno->atualizarDados($id, $_POST['nome'], $_POST['ra'], $_POST['telefone']);
                        echo  "<p style='text-align:center; color:green; font-size:1.3em;'>Aluno editado com sucesso <p> <br>" ; 
                    }
                }
            ?>
            <button>Editar</button>
        </form>
    </section>
</body>

</html>