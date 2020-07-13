<?php
	require_once '../back/classes/CrudLivro.php';
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
  <head>
  <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>Pesquisa livro</title>
  </head>
  <body>
    <section>
		<a href="index.html"><i class="material-icons">arrow_back</i></a>
		<form method="post">
			<center><h2>Pesquisar Livro</h2></center> <br>
			<input type="text" name="pesquisa" id=""> <br>
			<button>Pesquisar</button>
		</form>
      	<?php
		if (isset($_POST['pesquisa'])){
			$l = new CrudLivro;
			$livros = $l->pesquisarNomeLivro($_POST['pesquisa']);
			if (count($livros) > 0){
				echo '<table style="width:100%;">
				<tr>
				
				  <th>Livro</th>
				  <th>Autor</th>
				  <th>Editora</th>
				  <th>Exemplares</th>
				  <th colspan="2">AÇÃO</th>
				  </tr>';
	  
				  for ($i=0; $i < count($livros); $i++){
					echo "<tr style='text-align:center;'>";
					foreach($livros[$i] as $key => $value2){
						if ($key != "id_livro")
						echo "<td>$value2</td>";
					}
					?>
					<td><a href="editarLivro.php?<?php echo "id=".$livros[$i]['id_livro'].
															"&livro=".$livros[$i]['nome_livro'].
															"&autor=".$livros[$i]['nome_autor'].
															"&editora=".$livros[$i]['nome_editora'].
															"&exemplares=".$livros[$i]['qtd_exemplar'];?>">Editar</a>
					</tr>
					<?php
				}
				echo "</table>";
			}
			else{
				echo"Nenhum livro encontrado";
			}
		}
		?>
    </section>
  </body>
</html>
