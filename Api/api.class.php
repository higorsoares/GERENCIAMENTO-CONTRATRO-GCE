<?php
 class Api{


 	private $pdo;


 	public function __construct(){
 		//$this->pdo = new PDO('mysql:dbname=contratov5;host=localhost;','root','');
$this->pdo = new PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');
//$this->pdo = new PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');
//$this->pdo = new PDO('mysql:dbname=contratov3;host=localhost;','root','');

//$this->pdo = new PDO("mysql:dbname=contratov2;host=localhost;","root",""); 		
//$this->pdo = new PDO('mysql:dbname=id9889481_sistema_contrato;host=localhost;','id9889481_igor','');

//$this->pdo = new PDO('mysql:dbname=id9889481_contratov3;host=localhost;','id9889481_igor','itr12909012');
 		
 	}
 
 	public function Lista(){
 		//s$dado = array();
 		$sql = "SELECT 
 		--(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 1) AS CONTAR_CONCLUIDO ,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 2) AS DOCUMENT_ENVIADO ,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 3) AS DOCUMENT_PENDENTE ,
 		--(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 4) AS CONTRA_FINANCEIRO ,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 5) AS PAGO,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 6) AS AVISTA";
 		$sql = $this->pdo->query($sql);

 		$sql->execute();

 		if($sql->rowCount() > 0){
 			$dado = $sql->fetch();
 			
 				$dados[] = array(
 					//"ctrCom" => $dado['CONTAR_CONCLUIDO'],
 					"ctrEnv" => $dado['DOCUMENT_ENVIADO'],
 					"ctrPend" => $dado['DOCUMENT_PENDENTE'],
 					//"ctrFin" => $dado['CONTRA_FINANCEIRO'],
 					"ctrPg" => $dado['PAGO'],
 					"ctrAv" => $dado['AVISTA'],


 				);
 			
 		}
 		
 		return $dados;

 	}


public function ListaDate($data1 , $data2){
 		//s$dado = array();
 		$sql = "SELECT 
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 1 AND dh_cadastro BETWEEN '$data1 00:00:00' AND '$data2 23:59:00' ) AS CONTAR_CONCLUIDO ,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 2 AND dh_cadastro BETWEEN '$data1 00:00:00' AND '$data2 23:59:00' ) AS DOCUMENT_ENVIADO ,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 3 AND dh_cadastro BETWEEN '$data1 00:00:00' AND '$data2 23:59:00' ) AS DOCUMENT_PENDENTE ,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 4 AND dh_cadastro BETWEEN '$data1 00:00:00' AND '$data2 23:59:00' ) AS CONTRA_FINANCEIRO ,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 5 AND dh_cadastro BETWEEN '$data1 00:00:00' AND '$data2 23:59:00' ) AS PAGO,
 		(SELECT COUNT(id_situacao) FROM empresas WHERE id_situacao = 6 AND dh_cadastro BETWEEN '$data1 00:00:00' AND '$data2 23:59:00' ) AS AVISTA";
 		$sql = $this->pdo->query($sql);

 		$sql->execute();

 		if($sql->rowCount() > 0){
 			$dado = $sql->fetch();
 			
 				$dados[] = array(
 					"ctrCom" => $dado['CONTAR_CONCLUIDO'],
 					"ctrEnv" => $dado['DOCUMENT_ENVIADO'],
 					"ctrPend" => $dado['DOCUMENT_PENDENTE'],
 					"ctrFin" => $dado['CONTRA_FINANCEIRO'],
 					"ctrPg" => $dado['PAGO'],
 					"ctrAv" => $dado['AVISTA'],


 				);
 			
 		}
 		
 		return $dados;

 	}







 }


?>