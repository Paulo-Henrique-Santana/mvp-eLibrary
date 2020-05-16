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

    public function verificaLocacoesAluno($rg)
    {
        $pesquisa = $this->pdo->query("SELECT count(id_locacao) AS qtd_locacoes 
                                        FROM locacao 
                                        WHERE id_aluno = '$this->idAluno'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        if ($resultado["qtd_locacoes"] >= 3)
        {
            return false;
        } else{
            return $resultado["qtd_locacoes"];
        }
    }
}



