<?php
require 'classes/contrato.class.php';
$contract = new Contrato();

$ret = $contract->agenda();



echo json_encode($ret);
?>