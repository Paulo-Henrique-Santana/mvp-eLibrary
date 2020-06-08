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
            $this->idAluno = $resultado["id_aluno"];
            return true;
        } else{
            return false;
        }
    }

    public function verificaLocacoesAluno()
    {
        $pesquisa = $this->pdo->query("SELECT count(id_locacao) AS qtd_locacoes 
                                        FROM locacao 
                                        WHERE id_aluno = '$this->idAluno'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        if ($resultado["qtd_locacoes"] == 3)
        {
            return false;
        } else{
            return true;
        }
    }

    public function pesquisaExemplarDisponivel($idLivro)
    {
        $pesquisa = $this->pdo->query("SELECT id_exemplar
                                        FROM exemplar
                                        WHERE id_livro = 3
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
                                        WHERE situacao_locacao <> 'entregue'
                                        ORDER BY situacao_locacao DESC");
        $locacoes = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $locacoes;
    }
}



