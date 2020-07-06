<?php
    require_once '../back/classes/Locacao.php';
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">

  <head>
  <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
 
    <title>Histórico de locação</title>
  </head>
  <body>
    <section>
      
      <a href="index.html"><i class="  material-icons">arrow_back</i></a>
      <br>
      <form action="">
     <center><h2>Historico de locaçao</h2></center> <br>
      <table  style="width: 100%;">
      
        <tr>
          <th>Livro</th>
          <th>Aluno</th>
          <th>Data da Locação</th>
          <th>Data de Entrega</th>
          <th>Situação</th>
        </tr>
        <?php
          $locacao = new Locacao;
          $locacao->atualizarSituacaoLocacao();
          $locacoes = $locacao->listarLocacoes();
          foreach ($locacoes as $key => $value) {
            echo "<tr>";
            foreach ($value as $key => $value) {
              echo "<td>$value</td>";
            }
            echo "</tr>";
          }
        ?>
      </table>
      </form>
    </section>
  </body>
</html>
