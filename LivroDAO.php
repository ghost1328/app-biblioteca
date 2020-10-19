<?php
require_once('Livro.php');

class LivroDAO {
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

    function inserir(Livro $livro){
        try{
            $stmt = $this->pdo->prepare("INSERT INTO livros (isbn, titulo, autor, editora, ano)
            VALUES (:isbn, :titulo, :autor, :editora, :ano)");
            $stmt->bindParam(':isbm', $livro->getIsbn());
            $stmt->bindParam(':titulo', $livro->getTitulo());
            $stmt->bindParam(':autor', $livro->getAutor());
            $stmt->bindParam(':editora', $livro->getEditora());
            $stmt->bindParam(':ano', $livro->getAno());
            $stmt->execute();
        } 
        catch(PDOException $e)
        {
            echo "Statement failed: " . $e->getMessage();
        }
    
    }
    
    function listar(){
        $listaLivros = array();
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM livros");
            $stmt->execute();
            $listaLivros = $stmt->fetchAll(
                PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Livro', [0,0,'',0,0]);
            return $listaLivros;
        }
        catch(PDOException $e)
        {
            echo "Statement failed: " . $e->getMessage();
        }
    }
    
    function buscarPorIsbn($isbn){
        $q = "SELECT * FROM livros WHERE isbn=:isbn";
        $comando = $this->pdo->prepare($q);
        $comando->bindParam(":isbn", $isbn);
        $comando->execute();
        $comando->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Livro', [0,0,'',0,0]);
        $obj = $comando->fetch();
        return($obj);
    
    }

    function buscarPorTitulo($titulo){
        $q = "SELECT * FROM livros WHERE titulo=:titulo";
        $comando = $this->pdo->prepare($q);
        $comando->bindParam(":titulo", $titulo);
        $comando->execute();
        $comando->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Livro', [0,0,'',0,0]);
        $obj = $comando->fetch();
        return($obj);
    
    }
    
    function deletar($isbn)
    {
        $qdeletar = "DELETE FROM livros WHERE isbn=:isbn";
        $comando = $this->pdo->prepare($qdeletar);
    
        $comando->bindParam(':isbn',$isbn);
    
        $comando->execute();
    }
    
    
}
?>