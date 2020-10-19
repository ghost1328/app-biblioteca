<?php
require_once('Cliente.php');

class ClienteDAO {
    private $pdo;

    public function __construct(){ 
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $databasename = "tema_biblioteca";       
        try{
            $this->pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function inserir(Cliente $cliente){
        try{
            $stmt = $this->pdo->prepare("INSERT INTO clientes (matricula, nome, telefone)
            VALUES (:matricula, :nome, :telefone)");
            $stmt->bindParam(':matricula', $cliente->getMatricula());
            $stmt->bindParam(':nome', $cliente->getNome());
            $stmt->bindParam(':telefone', $cliente->getTelefone());
            $stmt->execute();
        } 
        catch(PDOException $e)
        {
            echo "Statement failed: " . $e->getMessage();
        }
    
    }
    
    function listar(){
        $listaClientes = array();
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM clientes");
            $stmt->execute();
            $listaClientes = $stmt->fetchAll(
                PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cliente', [0,'',0]);
            return $listaClientes;
        }
        catch(PDOException $e)
        {
            echo "Statement failed: " . $e->getMessage();
        }
    }
    
    function buscarPorMatricula($matricula){
        $q = "SELECT * FROM clientes WHERE matricula=:matricula";
        $comando = $this->pdo->prepare($q);
        $comando->bindParam(":matricula", $matricula);
        $comando->execute();
        $comando->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cliente', [0,'',0]);
        $obj = $comando->fetch();
        return($obj);
    
    }
    
    function deletar($matricula)
    {
        $qdeletar = "DELETE FROM clientes WHERE matricula=:matricula";
        $comando = $this->pdo->prepare($qdeletar);
    
        $comando->bindParam(':matricula',$matricula);
    
        $comando->execute();
    }
    
    function atualizar($matricula,Cliente $clienteAlterado)
    {    
        $qAtualizar = "UPDATE clientes SET nome=:nome, telefone=:telefone WHERE matricula=:matricula";            
        $comando = $this->pdo->prepare($qAtualizar);
    
        $comando->bindValue(":nome",$clienteAlterado->getNome());
        $comando->bindValue(":telefone",$clienteAlterado->getTelefone());
        $comando->bindParam(":matricula",$matricula);
        $comando->execute();       
    }
}
?>