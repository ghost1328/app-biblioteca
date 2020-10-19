<?php 
class Livro{
    private $isbn, $titulo, $autor, $editora, $ano;

    public function __construct($isbn, $titulo, $autor, $editora, $ano){
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editora = $editora;
        $this->ano = $ano;
    }

    public function getIsbn(){
        return $this->isbn;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getEditora(){
        return $this->editora;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
}
?>