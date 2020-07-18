<?php

Class Aluno
{
    private $id;
    private $nome;
    private $telefone;
    private $ra;
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

    public function setRa($ra)
    {
        $this->ra = $ra;
    }

    public function getRa()
    {
        return $this->ra;
    }

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=biblioteca; host=localhost', 'root', '');
    }

    public function validaRa()
    {
        $pesquisa = $this->pdo->query("SELECT id_aluno FROM aluno WHERE ra_aluno = '$this->ra'");
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
        $this->pdo->query("INSERT INTO aluno(nome_aluno, telefone_aluno, ra_aluno) VALUES('$this->nome', '$this->telefone', '$this->ra')");

    }

    public function pesquisarRaAluno($ra)
    {
        $pesquisa = $this->pdo->query("SELECT id_aluno,
                                  nome_aluno,
                                  ra_aluno,
                                  telefone_aluno
                            FROM aluno
                            WHERE ra_aluno LIKE '%$ra%'");
        $resultado = $pesquisa->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    
    public function atualizarDados($nome, $ra, $telefone)
    {
        $this->pdo->query("UPDATE aluno SET nome_aluno = '$nome', telefone_aluno = '$telefone', ra_aluno = '$ra' WHERE ra_aluno = '$ra'");
    }

}

?>