<?php
	session_start();

	global $pdo;

	try {
		//$pdo = new PDO('mysql:dbname=sistema_contrato; host=localhost;','root','');
		$this->pdo = new PDO('mysql:dbname=id9889481_sistema_contrato;host=localhost;','igor','itr12909012');
	} catch (PDOException $e) {
		echo "FALHOU: ".$e->getMessage();
		exit;
	}


?>