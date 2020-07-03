<?php

Class Locacao
{
    private $idAluno;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=biblioteca; host=localhost', 'root', '');
    }

    public function validaRg($rg)
    {
        $pesquisa = $this->pdo->query("SELECT id_aluno FROM aluno WHERE rg_aluno = '$rg'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        if ($resultado["id_aluno"]){
            return $resultado["id_aluno"];
        } else{
            return false;
        }
    }

    public function verificaLocacoesAluno($rg)
    {
        $pesquisa = $this->pdo->query("SELECT count(id_locacao) AS qtd_locacoes 
                                        FROM locacao 
                                        INNER JOIN aluno
                                        ON aluno.id_aluno = locacao.id_aluno
                                        WHERE rg_aluno = '$rg'
                                        AND id_status_locacao <> 2");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        return $resultado["qtd_locacoes"];

    }

    public function pesquisaExemplarDisponivel($idLivro)
    {
        $pesquisa = $this->pdo->query("SELECT id_exemplar
                                        FROM exemplar
                                        WHERE id_livro = $idLivro
                                        AND id_exemplar NOT IN(SELECT id_exemplar
                                                                FROM locacao
                                                                WHERE id_status_locacao = 1
                                                                OR id_status_locacao = 3)
                                        LIMIT 1");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        return $resultado['id_exemplar'];
    }

    public function listarLocacoes()
    {
        $pesquisa = $this->pdo->query("SELECT nome_livro,
                                                nome_aluno,
                                                dt_locacao,
                                                dt_entrega,
                                                situacao_locacao
                                        FROM livro
                                        INNER JOIN exemplar
                                        ON livro.id_livro = exemplar.id_livro
                                        INNER JOIN locacao
                                        ON exemplar.id_exemplar = locacao.id_exemplar
                                        INNER JOIN aluno
                                        ON aluno.id_aluno = locacao.id_aluno
                                        INNER JOIN status_locacao
                                        ON status_locacao.id_status_locacao = locacao.id_status_locacao
                                        ORDER BY situacao_locacao DESC");
        $locacoes = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $locacoes;
    }

    public function inserirLocacao($idAluno, $idExemplar)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dtLocacao = date('Y/m/d');
        $dtEntrega = date('Y/m/d', strtotime(' + 7 days'));
        $this->pdo->query("INSERT INTO locacao(dt_locacao, dt_entrega, id_aluno, id_status_locacao, id_exemplar)
        VALUES('$dtLocacao', '$dtEntrega', '$idAluno', 1, '$idExemplar')");
    }

    public function listarLocacoesAluno($id)
    {
        $pesquisa = $this->pdo->query("SELECT   id_locacao,
                                                nome_livro,
                                                dt_locacao,
                                                dt_entrega,
                                                situacao_locacao
                                        FROM status_locacao
                                        INNER JOIN locacao
                                        ON status_locacao.id_status_locacao = locacao.id_status_locacao
                                        INNER JOIN exemplar
                                        ON exemplar.id_exemplar = locacao.id_exemplar
                                        INNER JOIN livro
                                        ON livro.id_livro = exemplar.id_livro
                                        INNER JOIN aluno
                                        ON aluno.id_aluno = locacao.id_aluno
                                        WHERE aluno.id_aluno = $id
                                        AND locacao.id_status_locacao <> 2");
        $resultado = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function devolverLocacao($idLocacao)
    {
        $pesquisa = $this->pdo->query("UPDATE locacao SET id_status_locacao = 2 WHERE id_locacao = $idLocacao");
    }

    public function buscarNomeLivro($nomeLivro)
    {
        $pesquisa = $this->pdo->query("SELECT livro.id_livro,
                                                nome_livro,
                                                nome_autor,
                                                nome_editora,
                                                count(id_exemplar)
                                       FROM livro 
                                       INNER JOIN editora 
                                       ON editora.id_editora = livro.id_editora
                                       INNER JOIN autor
                                       ON autor.id_autor = livro.id_autor
                                       INNER JOIN exemplar
                                       ON livro.id_livro = exemplar.id_livro
                                       WHERE id_exemplar NOT IN (SELECT id_exemplar
                                        							 FROM locacao
																 WHERE id_status_locacao = 1
																 OR id_status_locacao = 3)
                                       AND nome_livro LIKE '%$nomeLivro%'
                                       GROUP BY id_livro");
        $livros = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $livros;
    }

    public function buscarNomeAutor($nomeAutor)
    {
        $pesquisa = $this->pdo->query("SELECT livro.id_livro,
                                                nome_livro,
                                                nome_autor,
                                                nome_editora,
                                                count(id_exemplar)
                                        FROM livro 
                                        INNER JOIN editora 
                                        ON editora.id_editora = livro.id_editora
                                        INNER JOIN autor
                                        ON autor.id_autor = livro.id_autor
                                        INNER JOIN exemplar
                                        ON livro.id_livro = exemplar.id_livro
                                        WHERE id_exemplar NOT IN (SELECT id_exemplar
                                                                FROM locacao
                                                                WHERE id_status_locacao = 1
                                                                OR id_status_locacao = 3)
                                        AND nome_autor LIKE '%$nomeAutor%'
                                        GROUP BY id_livro");
        $livros = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $livros;
    }

}



