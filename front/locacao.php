<!DOCTYPE html>
<html lang="pt/br" dir="ltr">

<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>pesquisaAluno</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="  material-icons">arrow_back</i></a>
        <form method="post">
            <h2>Pesquisar livro</h2>
            <input type="radio" name="tipo" value="livro" checked>Livro
            <input type="radio" name="tipo" value="autor">Autor
            <br>
            <input type="text" name="pesquisa"> <br>
            <button>Pesquisar</button>
            <button type="reset">Limpar</button>
        </form>
        <form action="">
            <h2>Resultados da pesquisa</h2>
            <table style="width: 100%;" id="table_resultados_pesquisa">
                <tr>
                    <th>Livro</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Exemplares </th>
                    <th>Alugar</th>
                </tr>
                <?php
                    include '../back/classes/CrudLivro.php';

                    if (isset($_POST['tipo']) || isset($_POST['pesquisa'])){
                        $tipo = $_POST['tipo'];
                        $pesquisa = $_POST['pesquisa'];

                        if ($tipo == "livro"){
                            $l = new CrudLivro;
                            $livros = $l->buscarNomeLivro($pesquisa);
                        } else if($tipo == "autor"){
                            $l = new CrudLivro;
                            $livros = $l->buscarNomeAutor($pesquisa);
                        }

                        for ($i = 0; $i < count($livros); $i++) {
                            echo "<tr>";
                            foreach ($livros[$i] as $key => $value) {
                                if ($key != "id_livro") {
                                    echo "<td>$value</td>";
                                }
                            }
                            ?>
                            <th><a href="locacao.php?idLivro=<?php echo $livros[$i]['id_livro'];?>">Alugar</a></th>
                            <?php
                            echo "</tr>";
                        }
                    }
                    
                ?>
             </table>
             <br>
             <table style="width: 100%;">
             <h2>Confirmação</h2>
             <tr>
                    <th>Livro </th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Confirmar</th>
                </tr>
             </table>
        </form>
    </section>
</body>

</html>