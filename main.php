<?php 
require_once('Livro.php');
require_once('LivroDAO.php');
require_once('Cliente.php');
require_once('ClienteDAO.php');



$dao = new LivroDAO();
//$dao->inserir(new Livro());
//$dao->deletar();
print_r($dao->buscarPorIsbn(13));
print_r($dao->buscarPorTitulo('Maus'));
 print_r($dao->listar());

$dao = new ClienteDAO();
//$dao->inserir(new Cliente());
//$dao->atualizar(1,new Cliente());
//$dao->deletar(9);
print_r($dao->buscarPorMatricula(1));
 print_r($dao->listar());
?>