<?php
session_start();
require 'classes/contrato.class.php';
$contract = new Contrato();
if(isset($_POST['txtCategoria']) && !empty($_POST['txtCategoria'])){
	$txtCategoria = $_POST['txtCategoria'];
    $rest = $contract->getIdCategoria($txtCategoria);

    header('Content-Type: application/json');
    echo json_encode($rest, JSON_PRETTY_PRINT);
}else{

$retorno  = array(
	'razao_social' => 'Nem um registro', 
	'nome_responsavel' => 'Nem um registro',
	'telefone_contato' => 'Nem um registro',
	'descricao' => 'Nem um registro',
	'dh_cadastro' => 'Nem um registro',

);

header('Content-Type: application/json');
echo json_encode($retorno);


}

