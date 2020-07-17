<?php
    require_once '../back/classes/Aluno.php';
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
			<center><h2>Pesquisar Aluno</h2></center><br>
			<input type="text" name="pesquisa" id=""> <br>
			<button>Pesquisar</button>
		</form>
        <?php
			if (isset($_POST['pesquisa'])){
				$aluno = new Aluno;
				$registros = $aluno->pesquisarRaAluno($_POST['pesquisa']);
				if (count($registros) > 0){
					echo '<table style="width: 100%; text-align:center;">
					<tr style="width: 100%;">
					  <th>Nome</th>
					  <th>RA</th>
					  <th>Telefone</th>
					  <th>Editar</th>
				  	</tr>';
					for ($i=0; $i < count($registros); $i++){
						echo "<tr>";
						foreach ($registros[$i] as $key => $value2) {
							if ($key != "id_aluno"){
								echo "<td style='text-align:center;'>$value2</td>";
							}
						}
						?>
						<td><a href="editarAluno.php?<?php echo "id=".$registros[$i]['id_aluno'].
																"&nome=".$registros[$i]['nome_aluno'].
																"&ra=".$registros[$i]['ra_aluno'].
																"&telefone=".$registros[$i]['telefone_aluno']; ?>">Editar</a>
						</tr>
						<?php
					}
					echo "</table>";
				}
				else{
					echo"<p style='text-align:center; color:red; font-size:1.3em;'>Nenhum aluno encontrado</p>";
				}
			}
		?>
    </section>
</body>
</html>