<?php 

session_start();
require_once '../back/classes/Aluno.php';

$id = $_GET['id'];
$nome = $_GET['nome'];
$ra = $_GET['ra'];
$tel = $_GET['telefone'];

if (isset($_POST['nome']) && isset($_POST['ra']) && isset($_POST['telefone'])) {
    if ($nome == $_POST['nome'] && $ra == $_POST['ra'] && $tel == $_POST['telefone']) {
        $_SESSION['aviso'] = "<p style='text-align:center; color:red; font-size:1.3em;'>Nenhum campo foi alterado</p> <br>";
        header("location: ../front/editarAluno.php?id=$id&nome=".$_POST['nome']."&ra=".$_POST['ra']."&telefone=".$_POST['telefone']);
    } else {
        $aluno = new Aluno;
        $aluno->atualizarDados($_POST['nome'], $_POST['ra'], $_POST['telefone']);
        $_SESSION['aviso'] = "<p style='text-align:center; color:green; font-size:1.3em;'>Dados editados com sucesso</p> <br>";
        header("location: ../front/editarAluno.php?id=$id&nome=".$_POST['nome']."&ra=".$_POST['ra']."&telefone=".$_POST['telefone']);
    }
}
