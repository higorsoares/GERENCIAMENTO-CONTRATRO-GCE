<?php
require 'classes/usuarios.class.php';
require 'classes/contrato.class.php';
require 'classes/categoria.class.php';

/*
$cat = new Categoria();



$ret = $cat->getCategoria();

var_dump($ret);
*/














$cont = new Contrato();

$ret = $cont->getId('8');
var_dump($ret);



?>