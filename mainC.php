<?php 
require_once('Cliente.php');
require_once('ClienteDAO.php');


$dao = new ClienteDAO();
$dao->inserir(new Cliente(0,"Carla",955555555));
$dao->atualizar(4,new Cliente(4,"Vanessa",944444444));
//$dao->deletar(9);
print_r($dao->buscarPorMatricula(1));
 print_r($dao->listar());
?>