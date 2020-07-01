<?php

Class Aluno
{
    private $id;
    private $nome;
    private $telefone;
    private $rg;
    private $pdo;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=biblioteca; host=localhost', 'root', '');
    }

    public function validaRg()
    {
        $pesquisa = $this->pdo->query("SELECT id_aluno FROM aluno WHERE rg_aluno = '$this->rg'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        if ($resultado["id_aluno"]){
            return $resultado["id_aluno"];
        } else{
            return false;
        }
    }

    public function validaTelefone()
    {
        $pesquisa = $this->pdo->query("SELECT id_aluno FROM aluno WHERE telefone_aluno = '$this->telefone'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        if ($resultado["id_aluno"]){
            return true;
        } else{
            return false;
        }
    }

    public function cadastraAluno()
    {
        $this->pdo->query("INSERT INTO aluno(nome_aluno, telefone_aluno, rg_aluno) VALUES('$this->nome', '$this->telefone', '$this->rg')");

    }

    public function pesquisarNomeAluno($nome)
    {
        $pesquisa = $this->pdo->query("SELECT id_aluno,
                                  nome_aluno,
                                  rg_aluno,
                                  telefone_aluno
                            FROM aluno
                            WHERE nome_aluno LIKE '%$nome%'");
        $resultado = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
        
    }
    


}

?>