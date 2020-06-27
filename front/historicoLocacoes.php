<?php
  include_once '../back/classes/Locacao.php';
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
  <head>
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>Locação</title>
  </head>
  <body>
    <section>
      <table>
        <tr>
          <th>Livro</th>
          <th>Aluno</th>
          <th>Data da Locação</th>
          <th>Data de Entrega</th>
          <th>Situação</th>
        </tr>
        <?php
          $l = new Locacao;
          $locacoes = $l->listarLocacoes();
          foreach ($locacoes as $key => $value) {
            echo "<tr>";
            foreach ($value as $key => $value) {
              echo "<td>$value</td>";
            }
            echo "</tr>";
          }
        ?>
      </table>
    </section>
  </body>
</html>
