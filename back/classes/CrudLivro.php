<?php

require_once 'Livro.php';

Class CrudLivro extends Livro
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=biblioteca; host=localhost', 'root', '');
    }

    private function validaLivro()
    {
        $pesquisa = $this->pdo->query("SELECT id_livro FROM livro WHERE nome_livro = '$this->nomeLivro'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        return $resultado["id_livro"];
    }
    
    private function validaAutor()
    {
        $pesquisa = $this->pdo->query("SELECT id_autor FROM autor WHERE nome_autor = '$this->nomeAutor'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        return $resultado["id_autor"];
    }

    private function validaEditora()
    {
        $pesquisa = $this->pdo->query("SELECT id_editora FROM editora WHERE nome_editora = '$this->nomeEditora'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        return $resultado["id_editora"];
    }

    private function cadastraAutor()
    {
        $this->pdo->query("INSERT INTO autor(nome_autor) VALUES('$this->nomeAutor')");
    }

    private function cadastraEditora()
    {
        $this->pdo->query("INSERT INTO editora(nome_editora) VALUES('$this->nomeEditora')");
    }

    private function cadastraExemplar()
    {
        $pesquisa = $this->pdo->query("SELECT count(id_livro) as 'ultimo_id_livro' from livro");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        $livro = $resultado["ultimo_id_livro"];
        for($n = 0; $n < $this->qtdExemplar; $n++){
            $this->pdo->query("INSERT INTO exemplar(id_livro) VALUES($livro)");
        }
    }

    public function cadastraLivro()
    {

        $autor = $this->validaAutor();
        $editora = $this->validaEditora();
        $livro = $this->validaLivro();

        if($autor == true && $editora == true && $livro == true){
            return false;
        }
        else if($autor == true && $editora == true){
            $this->pdo->query("INSERT INTO livro(nome_livro, id_autor, id_editora) 
            VALUES('$this->nomeLivro', '$autor', '$editora') ");
            $this->cadastraExemplar();
            return true;
        }
        else if($autor == false && $editora == true){
            $this->cadastraAutor();
            $this->pdo->query("INSERT INTO livro(nome_livro, id_autor, id_editora) 
            VALUES('$this->nomeLivro', (SELECT count(id_autor) from autor), '$editora') ");
            $this->cadastraExemplar();
            return true;
        }
        else if($autor == true && $editora == false){
            $this->cadastraEditora();
            $this->pdo->query("INSERT INTO livro(nome_livro, id_autor, id_editora) 
            VALUES('$this->nomeLivro', '$autor', (SELECT count(id_editora) from editora)) ");
            $this->cadastraExemplar();
            return true;
        }
        else{
            $this->cadastraAutor();
            $this->cadastraEditora();
            $this->pdo->query("INSERT INTO livro(nome_livro, 
                                         id_autor, 
                                         id_editora) 
                             VALUES('$this->nomeLivro', 
                             (SELECT count(id_autor) from autor), 
                             (SELECT count(id_editora) from editora))");
            $this->cadastraExemplar();
            return true;
        }
    }

    public function listarLivros()
    {   
        $pesquisa = $this->pdo->query("SELECT livro.id_livro,
                                            nome_livro,
                                            nome_editora,
                                            nome_autor,
                                            count(id_exemplar)  
                                    FROM livro 
                                    INNER JOIN editora 
                                    ON editora.id_editora = livro.id_editora
                                    INNER JOIN autor
                                    ON autor.id_autor = livro.id_autor
                                    INNER JOIN exemplar
                                    ON livro.id_livro = exemplar.id_livro
                                    GROUP BY id_livro
                                    ORDER BY nome_livro ASC");
        $livros = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $livros;
    }

    public function pesquisarNomeLivro($nomeLivro)
    {
        $pesquisa = $this->pdo->query("SELECT livro.id_livro,
                                                nome_livro,
                                                nome_autor,
                                                nome_editora,
                                                count(id_exemplar) 'qtd_exemplar'
                                        FROM livro 
                                        INNER JOIN editora 
                                        ON editora.id_editora = livro.id_editora
                                        INNER JOIN autor
                                        ON autor.id_autor = livro.id_autor
                                        INNER JOIN exemplar
                                        ON livro.id_livro = exemplar.id_livro
                                        WHERE nome_livro LIKE '%$nomeLivro%'
                                        GROUP BY id_livro");
        $livros = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $livros;
    }

    public function atualizarLivro($id, $livro, $autor, $editora)
    {
        $this->pdo->query("UPDATE livro SET nome_livro = '$livro' WHERE id_livro = '$id'");
        $this->pdo->query("UPDATE autor SET nome_autor = '$autor' WHERE id_autor = (SELECT id_autor FROM livro WHERE id_livro = '$id')");
        $this->pdo->query("UPDATE editora SET nome_editora = '$editora' WHERE id_editora = (SELECT id_editora FROM livro WHERE id_livro = '$id')");
    }

    public function listarExemplares($idLivro)
    {
        $pesquisa = $this->pdo->query("SELECT exemplar.id_exemplar,
                                                nome_livro,
                                                situacao_locacao,
                                                nome_aluno
                                        FROM exemplar
                                        LEFT JOIN locacao ON exemplar.id_exemplar = locacao.id_exemplar
                                        INNER JOIN livro ON livro.id_livro = exemplar.id_livro
                                        LEFT JOIN status_locacao ON status_locacao.id_status_locacao = locacao.id_status_locacao
                                        LEFT JOIN aluno ON aluno.id_aluno = locacao.id_aluno
                                        WHERE livro.id_livro = '$idLivro'
                                        ORDER BY situacao_locacao DESC");
        $exemplares = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $exemplares;
    }

    public function adicionarExemplar($idLivro){
        $this->pdo->query("INSERT INTO exemplar(id_livro) VALUES($idLivro)");
    }
}

?>