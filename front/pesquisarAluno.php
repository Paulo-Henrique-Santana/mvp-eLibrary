<?php
    include_once '../back/classes/Aluno.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>Pesquisar Aluno</title>
</head>
<body>
    <section>
        <a href="index.html"><i class="material-icons">arrow_back</i></a>
        <form method="post">
			<input type="text" name="pesquisa" id="">
			<button>Pesquisar</button>
		</form>
        <?php
			if (isset($_POST['pesquisa'])){
				$aluno = new Aluno;
				$registros = $aluno->pesquisarNomeAluno($_POST['pesquisa']);
				if (count($registros) > 0){
					echo '<table>
					<tr>
					  <th>Nome</th>
					  <th>RG</th>
					  <th>Telefone</th>
				  	</tr>';
		  
					foreach($registros as $key => $value){
						echo "<tr>";
						foreach($value as $key => $value2){
							if ($key != "id_aluno")
							echo "<td>$value2</td>";
						}
						echo "<td><a href='#'>[Editar]</a></td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				else{
					echo"Nenhum aluno encontrado";
				}
			}
		?>
    </section>
</body>
</html>