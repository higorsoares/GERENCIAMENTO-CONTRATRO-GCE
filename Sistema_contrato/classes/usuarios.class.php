<?php

class Usuarios{
	private $pdo;

	public function __construct(){
		//$this->pdo = new PDO('mysql:dbname=sistema_contrato;host=localhost;','root','');
		$this->pdo = new PDO('mysql:dbname=id9889481_sistema_contrato;host=localhost;','igor','itr12909012');

	}

	public function cadastrar($nome, $email,$senha, $telefone){
		if($this->VerificaUsuario($email) == false){
			$sql = 'INSERT INTO usuarios SET nome = :nome , email = :email, senha =  :senha , telefone = :telefone';
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome',$nome);
			$sql->bindValue(':email',$email);
			$sql->bindValue(':senha',md5($senha));
			$sql->bindValue(':telefone',$telefone);
			$sql->execute();
		}else{
			return false;
		}
		
	}

	public function VerificaUsuario($email){
		$sql = 'SELECT * FROM usuarios WHERE email = :email';
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email',$email);
		$sql->execute();
		
		if($sql->rowCount() > 0){
			$sql->fecth();
			return true;
			//echo "usuarios ja cadastrado";
		}else{
			return false;
			//echo 'nem um usuario cadastrado';
		}


	}


	public function login($user , $senha){
		//global $pdo;
		//$ret = array();
		$sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":nome",$user);
		$sql->bindValue(":senha",md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0){
			$dado = $sql->fetch();
				$_SESSION['cLogin'] = $dado['id'];

				return $dado['id'];

		}else{
			return false;
		}




	}

}

?>

