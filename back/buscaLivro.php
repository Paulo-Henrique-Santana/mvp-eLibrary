<?php
	//Incluir a conexão com banco de dados
    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "biblioteca";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	//Recuperar o valor da palavra
	$cursos = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$cursos = "SELECT nome_livro FROM livro WHERE nome_livro LIKE '%$cursos%'";
	$resultado_cursos = mysqli_query($conn, $cursos);
	
	if(mysqli_num_rows($resultado_cursos) <= 0){
		echo "Nenhum curso encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_cursos)){
			echo "<li>".$rows['nome_livro']."</li>";
		}
	}
?>