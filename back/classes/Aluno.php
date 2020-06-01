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
        return $resultado["id_aluno"];
    }

    public function validaTelefone()
    {
        $pesquisa = $this->pdo->query("SELECT id_aluno FROM aluno WHERE rg_aluno = '$this->telefone'");
        $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);
        return $resultado["id_aluno"];
    }

    public function cadastraAluno()
    {
        if ($this->validaRg() && $this->validaTelefone() == false){
            echo "rg já cadastrado";
            return false;
        } 
        else if ($this->validaTelefone() && $this->validaRg() == false){
            echo "telefone já cadastrado";
            return false;
        }
        else if ($this->validaRg() && $this->validaTelefone()){
            return false;
        } else{
            $this->pdo->query("INSERT INTO aluno(nome_aluno, telefone_aluno, rg_aluno) VALUES('$this->nome', '$this->telefone', '$this->rg')");
            return true;
        }
    }
    


}

?>