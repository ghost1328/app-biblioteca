<?php 
class Cliente{
    private $matricula, $nome, $telefone;

    public function __construct($matricula, $nome, $telefone){
        $this->matricula = $matricula;
        $this->nome = $nome;
        $this->telefone = $telefone;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

}
?>